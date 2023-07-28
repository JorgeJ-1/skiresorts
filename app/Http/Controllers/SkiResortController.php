<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SkiResort;
use App\Http\Requests\SkiResortRequest;
use Facade\FlareClient\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Events\FirstSkiResortCreated;


class SkiResortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
        $skiResorts=SkiResort::orderBy('id','DESC')->paginate(10);
        
        // Con el objetor paginator ya no es necesario pasarle el total
        //$totalSkiResorts=SkiResort::count();
        
        //
        //return view('skiResorts.list',['skiResorts'=>$skiResorts, 'total'=>$totalSkiResorts]);
        return view('skiResorts.list',['skiResorts'=>$skiResorts]);
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        $request->validate([
            'name' => 'max:256',
            'town' => 'max:256',
            'country' => 'max:256',
        ]);
        

        
        $name=$request->input('name','');
        $town=$request->input('town','');
        $country=$request->input('country','');
        
        $skiResorts=SkiResort::where('name','like',"%$name%")
                             ->where('town','like',"%$town%")
                             ->where('country','like',"%$country%")
                             ->orderby('id','desc')  
                             ->paginate(config('paginator.skiresort'))
                             ->appends(['name'=>$name,'town'=>$town,'country'=>$country]);
        //
        return view('skiResorts.list',['skiResorts'=>$skiResorts, 'name'=>$name,'town'=>$town,'country'=>$country]);
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mostrar formulario
        //dd('estoy en el controlador');
        return view('skiResorts.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkiResortRequest $request)
    {
        
        //validación de los datos de entrada (devuelve un array asociativo con los campos y valores validados
        /*
        $request->validate([
            'name' => 'required|max:256',
            'town' => 'required|max:256',
            'country' => 'required|max:256',
            'lifts' => 'required|numeric|between:1,999',
            'slopeKms' => 'required|numeric|between:0,99999',
            'isOpen'=> 'sometimes|boolean',
            'image'=> 'sometimes|file|image|mimes:jpg,png,gif,webp|max:2048'
        ]);
        */

        // Añade los checkbox que el caso de no estar informados no llegan en la response (fusión arrays)
        //$skiResort = SkiResort::create($request->all()+['isOpen'=>0]+['user_id'=>$request->user()->id]);
        
        // Método alternativo, antes del create informar en la request los campos que faltan
        //$request->request->add(['isOpen'=> $request->post('isOpen',false)]);
        
        // Segundo método alternativo para cargar los checkbox sin seleccionar
        //$skiResort = new SkiResort($request->except(['isOpen']));
        //$skiResort->isOpen = $request->post('isOpen', false);
        //$skiResort->save();

        // Recuperar todos los datos excepto la imagen (pone el valor nulo en la imagen)
        $datos =$request->except(['image'])+['isOpen'=>0]+['image'=>NULL];
        $datos['user_id']=$request->user()->id;
        
        // Añade la imagen si llega por la request
        if ($request->hasFile('image')) {
            $ruta= $request->file('image')->store(config('filesystems.skiresortImageDir'));
            /**
            * pendiente añadir gestión de errores
            */
            $datos['image']=pathinfo($ruta, PATHINFO_BASENAME);
        }
        
        $skiResort=SkiResort::create($datos);
                
        // Mensaje de felicitación después de crear la primera moto
        if($request->user()->skiResorts->count()==1){
            FirstSkiResortCreated::dispatch($skiResort, $request->user());
        }
        
        return redirect()->route('skiResort.show',$skiResort->id)
        ->with('success',"Estación de esquí $skiResort->name añadida correctamente")
        ->cookie('lastInsertedId',$skiResort->id,0);
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SkiResort $skiResort)
    {
        // Inyecta el objeto. Le llega el id y realiza el findOrFail automáticamente 
        //$skiResort = SkiResort::findOrFail($id);
        
        return view('skiResorts.show',['skiResort'=>$skiResort]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SkiResort $skiResort)
    {
        //
        //$skiResort = SkiResort::findOrFail($id);
        
        return view('skiResorts.update',['skiResort'=>$skiResort]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkiResort $skiResort)
    {

        // Autorización mediante policie
        if ($request->user()->cant('update',$skiResort)) {
            abort(401,'No eres propietario de la estación de esquí');
        }
        
        // Se elimina la validación explicita al realizarla la clase FormRequest
        /*
        $request->validate([
            'name' => 'required|max:256',
            'town' => 'required|max:256',
            'country' => 'required|max:256',
            'lifts' => 'required|numeric|between:1,999',
            'slopeKms' => 'required|numeric|between:1,99999'
        ]);
        */
       
        //$skiResort = SkiResort::findOrFail($id);
        
        $skiResort->update($request->all()+['isOpen'=>0]);

        return back()->with('success',"Estación de esquí  $skiResort->name actualizada");
        
    }
    
    /**
     * Delete confirmation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, SkiResort $skiResort)
    {
        //
        //$skiResort=SkiResort::findOrFail($id);
        //
        // Se comenta el control por Gates para usar las policies
        // La facade Gates tiene dos métodos estáticos: allows y denies
        /*
        if(Gate::allows('skiresortdelete',$skiResort))
        {
            return view('skiResorts.delete',['skiResort'=>$skiResort]);
        }
        abort(401,'No eres propietario de la estación de esquí');
        */
        // Autorización mediante policie
        if ($request->user()->cannot('delete',$skiResort)) {
            abort(401,'No eres propietario de la estación de esquí');
        }

        return view('skiResorts.delete',['skiResort'=>$skiResort]);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, SkiResort $skiResort)
    {
        
        if (!$request->hasValidSignature()) {
            abort('401','La firma no se pudo validar');
        }
        
        /* Se sustituye la autorización de Gates por Policies
         if(Gate::denies('skiresortdelete',$skiResort))
         {
         abort(401,'No eres propietario de la estación de esquí');
         }
         */
        // Autorización mediante policie
        if ($request->user()->cannot('destroy',$skiResort)) {
            abort(401,'No eres propietario de la estación de esquí');
        }
        
        // Implicit binding
        //$skiResort=SkiResort::findOrFail($id);
        
        $skiResort->delete();
        
        //return redirect('skiResort')->with('success',"Estación de esquí $skiResort->name eliminada");
        return redirect()
        ->route('skiResort.index')
        ->with('success',"Estación de esquí $skiResort->name eliminada");
        
    }
    
    /**
     * Restaura una estación de esquí borrada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, int $id)
    {
        
        if (!$request->hasValidSignature()) {
            abort('401','La firma no se pudo validar');
        }
        
        /* Se sustituye la autorización de Gates por Policies
         if(Gate::denies('skiresortdelete',$skiResort))
         {
         abort(401,'No eres propietario de la estación de esquí');
         }
         */
        
        // Implicit binding no se puede usar porque la moto está borrada
        $skiResort=SkiResort::withoutTrashed()->findOrFail($id);

        // Autorización mediante policie
        if ($request->user()->cannot('restore',$skiResort)) {
            abort(401,'No eres propietario de la estación de esquí');
        }
        
        $skiResort->restore();
        
        //return redirect('skiResort')->with('success',"Estación de esquí $skiResort->name eliminada");
        //return redirect()
        //    ->route('skiResort.index')
        //    ->with('success',"Estación de esquí $skiResort->name eliminada");
        return back()
        ->with('success',"Estación de esquí $skiResort->name ha sido restaurada");
        
    }
    
    /**
     * Restaura una estación de esquí borrada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function purge(Request $request)
    {
        
        if (!$request->hasValidSignature()) {
            abort('401','La firma no se pudo validar');
        }
        
        // Implicit binding no se puede usar porque la moto está borrada
        $skiResort=SkiResort::withoutTrashed()->findOrFail($id);
        
        if ($skiResort->image) {
            Storage::delete(config('filesystems.skiresortImageDir').'/'.$skiResort->image);
            /**
             * Pendiente añadir el control de errores
             */
        }
        
        // Autorización mediante policie
        if ($request->user()->cannot('restore',$skiResort)) {
            abort(401,'No eres propietario de la estación de esquí');
        }
        
       
        $skiResort->purge();
        
        //return redirect('skiResort')->with('success',"Estación de esquí $skiResort->name eliminada");
        //return redirect()
        //    ->route('skiResort.index')
        //    ->with('success',"Estación de esquí $skiResort->name eliminada");
        return back()
        ->with('success',"Estación de esquí $skiResort->name ha sido eliminada definitivamente");
        
    }
    
    //
    public function deleteImage(Request $request, SkiResort $skiResort){
        
        if (!$request->hasValidSignature()) {
            abort('401','La firma no se pudo validar');
        }
        
        // Autorización mediante policie
        if ($request->user()->cannot('restore',$skiResort)) {
            abort(401,'No eres propietario de la estación de esquí');
        }
        
        if ($skiResort->image) {
            Storage::delete(config('filesystems.skiresortImageDir').'/'.$skiResort->image);
            /**
             * Pendiente añadir el control de errores
             */
            $skiResort->image=null;
            $skiResort->update();
        }
        
        return back();
            
    }
    
    
}
