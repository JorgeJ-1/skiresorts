<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkiResort;
use Facade\FlareClient\View;

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
        
        //
        $totalSkiResorts=SkiResort::count();
        
        //
        return view('skiResorts.list',['skiResorts'=>$skiResorts, 'total'=>$totalSkiResorts]);
        
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
    public function store(Request $request)
    {
        //validación de los datos de entrada
        $request->validate([
            'name' => 'required|max:256',
            'town' => 'required|max:256',
            'country' => 'required|max:256',
            'lifts' => 'required|numeric|between:1,999',
            'slopeKms' => 'required|numeric|between:0,99999',
            'isOpen'=> 'sometimes|boolean'
        ]);

        // Añade los checkbox que el caso de no estar informados no llegan en la response (fusión arrays)
        $skiResort = SkiResort::create($request->all()+['isOpen'=>0]);
        
        // Método alternativo, antes del create informar en la request los campos que faltan
        //$request->request->add(['isOpen'=> $request->post('isOpen',false)]);
        
        // Segundo método alternativo para cargar los checkbox sin seleccionar
        //$skiResort = new SkiResort($request->except(['isOpen']));
        //$skiResort->isOpen = $request->post('isOpen', false);
        //$skiResort->save();


        return redirect()->route('skiResort.show',$skiResort->id)
        ->with('success',"Estación de esquí $skiResort->name añadida correctamente");
        
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
        //
        $request->validate([
            'name' => 'required|max:256',
            'town' => 'required|max:256',
            'country' => 'required|max:256',
            'lifts' => 'required|numeric|between:1,999',
            'slopeKms' => 'required|numeric|between:1,99999'
        ]);

       
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
    public function delete(SkiResort $skiResort)
    {
        //
        //$skiResort=SkiResort::findOrFail($id);
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
        
        // Implicit bilding
        //$skiResort=SkiResort::findOrFail($id);
        
        $skiResort->delete();
        
        return redirect('skiResort')->with('success',"Estación de esquí $skiResort->name eliminada");
        
    }
}
