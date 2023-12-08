<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use Illuminate\Http\Request;
use App\Models\sucursales;
use App\Models\menu;
use Barryvdh\DomPDF\Facade\Pdf;


class PedidosController extends Controller
{
    public function index()
    {
        $pedidos  = pedidos::get();
     return view('pedidos', compact('pedidos'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos = menu::get();
        $dato = Sucursales::get();
        return view('formspedidos', compact('dato', 'datos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pedido = new pedidos();
        $pedido->nomcliente=$request->input('nomcliente');
        $pedido->nomplatillo =$request->input('nomplatillo');
        $pedido->precio =$request->input('precio');
        $pedido->nummesa =$request->input('nummesa');
        $pedido->save();

        return redirect()->route('pedidos');
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
        $pedido = pedidos::findOrFail($id);
        return view('pedido.index', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pedido = pedidos::findOrFail($id);
        $pedido->nomcliente=$request->input('nomcliente');
        $pedido->nomplatillo =$request->input('nomplatillo');
        $pedido->precio =$request->input('precio');
        $pedido->nummesa =$request->input('nummesa');
        $pedido->save();
        return redirect()->route('pedidos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        pedidos::destroy($id);
        return redirect()->route('pedidos');
    }
}


