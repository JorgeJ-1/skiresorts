<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkiResort;

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
        //pendiente sustituir los años por año actual
        $request->validate([
            'name' => 'required|max:256',
            'town' => 'required|max:256',
            'country' => 'required|max:256',
            'lifts' => 'required|numeric|between:1,999',
            'slopeKms' => 'required|numeric|between:0,99999',
            'isOpen' => 'boolean'
        ]);
        
        $skiResort = SkiResort::create($request->all());
        
        return redirect()->route('skiResort.show',$skiResort->id)
        ->with('success',"Estación de esquí $skiResort->name añadida correctamente");
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $skiResort = SkiResort::findOrFail($id);
        
        return view('skiResorts.show',['skiResort'=>$skiResort]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $skiResort = SkiResort::findOrFail($id);
        
        return view('skiResorts.update',['skiResort'=>$skiResort]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|max:256',
            'town' => 'required|max:256',
            'country' => 'required|integer',
            'lifts' => 'required|numeric|between:1,999',
            'slopeKms' => 'required|numeric|between:1,99999',
            'isOpen' => 'required|boolean'
        ]);
        
        $skiResort = SkiResort::findOrFail($id);
        $skiResort->update($request->all());
        
        return back()->with('success',"Estación de esquí  $skiResort->name actualizada");
        
    }
    
    /**
     * Delete confirmation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $skiResort=SkiResort::findOrFail($id);
        return view('skiResorts.delete',['skiResort'=>$skiResort]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $skiResort=SkiResort::findOrFail($id);
        
        $skiResort->delete();
        
        return redirect('skiResort')->with('success',"Estación de esquí $skiResort->name eliminada");
        
    }
}
