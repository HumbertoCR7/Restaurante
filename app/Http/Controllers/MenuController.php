<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//se Symfony\Component\HttpFoundation\File\File

class MenuController extends Controller
{
    public function index()
    {
     $datos = menu::get();
     return view('menu', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formsmenu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menu= new menu();
             if($request->hasFile('imagen')){
            $file = $request->file('imagen');
           $destinationpath = 'img/featureds/';
          $filename = time() . '-' . $file->getClientOriginalName();
         $uploadSuccess = $request->file ('imagen')->move($destinationpath, $filename);
        $menu->imagen = $destinationpath . $filename;
       }

        $menu->nomplatillo =$request->input('nomplatillo');
        $menu->ingrediente =$request->input('ingrediente');
        $menu->costo =$request->input('costo');
        $menu->precio =$request->input('precio');
        $menu->save();
        return redirect()->route('menu');
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
        $menu = menu::findOrFail($id);
        return view('menu.index', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $menu = menu::findOrFail($id);
        $menu->nomplatillo =$request->input('nomplatillo');
        $menu->ingrediente =$request->input('ingrediente');
        $menu->costo =$request->input('costo');
        $menu->precio =$request->input('precio');
        $menu->save();
        return redirect()->route('menu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        menu::destroy($id);
        return redirect()->route('menu');
    }
}
