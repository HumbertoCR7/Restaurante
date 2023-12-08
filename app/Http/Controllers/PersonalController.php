<?php

namespace App\Http\Controllers;

use App\Models\personal;
use App\Models\sucursales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    public function index()
    {
     $personal = personal::get();
     return view('personal', compact('personal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos = Sucursales::get();
        return view('formspersonal', compact('datos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $personal= new personal();
        $personal->nombre =$request->input('nombre');
        $personal->apellido =$request->input('apellido');
        $personal->curp =$request->input('curp');
        $personal->cargo =$request->input('cargo');
        $personal->numerotel =$request->input('numerotel');
        $personal->edad =$request->input('edad');
        $personal->save();

        return redirect()->route('personal');
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
        $personal = personal::findOrFail($id);
        return view('personal', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $personal = personal::findOrFail($id);
        $personal->nombre =$request->input('nombre');
        $personal->apellido =$request->input('apellido');
        $personal->curp =$request->input('curp');
        $personal->cargo =$request->input('cargo');
        $personal->numerotel =$request->input('numerotel');
        $personal->edad =$request->input('edad');
        $personal->save();
        return redirect()->route('personal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        personal::destroy($id);
        return redirect()->route('personal');
    }
}
