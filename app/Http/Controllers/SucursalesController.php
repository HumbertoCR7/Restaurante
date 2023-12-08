<?php

namespace App\Http\Controllers;

use App\Models\sucursales;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $datos = sucursales::get();
     return view('sucursal', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos = User::get();
        return view('formssucursal', compact('datos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sucursales = new sucursales();
        $sucursales->nombre =$request->input('nombre');
        $sucursales->responsable =$request->input('responsable');
        $sucursales->nomtrabajador =$request->input('nomtrabajador');
        $sucursales->apetrabajador =$request->input('apetrabajador');
        $sucursales->save();

        return redirect()->route('sucursal');
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
        $sucursales = sucursales::findOrFail($id);
        return view('sucursal.index', compact('sucursales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sucursales = sucursales::findOrFail($id);
        $sucursales->nombre =$request->input('nombre');
        $sucursales->responsable =$request->input('responsable');
        $sucursales->nomtrabajador =$request->input('nomtrabajador');
        $sucursales->apetrabajador =$request->input('apetrabajador');
        $sucursales->save();
        return redirect()->route('sucursal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        sucursales::destroy($id);
        return redirect()->route('sucursal');
    }
}
