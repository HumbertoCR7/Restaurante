<?php

namespace App\Http\Controllers;

use App\Models\inventario;
use Illuminate\Http\Request;
use App\Models\sucursales;

class InventarioController extends Controller
{
    public function index()
    {
     $inventario = inventario::get();
     return view('inventario', compact('inventario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos = Sucursales::get();
        return view('formsinventario', compact('datos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inventario= new inventario();
        $inventario->codigo =$request->input('codigo');
        $inventario->tipo =$request->input('tipo');
        $inventario->nombre =$request->input('nombre');
        $inventario->cantidad =$request->input('cantidad');
        $inventario->opcion =$request->input('opcion');
        $inventario->save();

        return redirect()->route('inventario');
    }
     /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pedido = inventario::findOrFail($id);
        return view('inventario.index', compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $inventario = inventario::findOrFail($id);
        $inventario= new inventario();
        $inventario->codigo =$request->input('codigo');
        $inventario->tipo =$request->input('tipo');
        $inventario->nombre =$request->input('nombre');
        $inventario->cantidad =$request->input('cantidad');
        $inventario->opcion =$request->input('opcion');
        $inventario->save();
        return redirect()->route('inventario');
        
    }  
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        inventario::destroy($id);
        return redirect()->route('inventario');
    }
}
