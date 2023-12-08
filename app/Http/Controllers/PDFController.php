<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\models\sucursales;
use App\models\pedidos;
use App\models\personal;
use App\models\inventario;
use Illuminate\Http\Request;

class PDFController extends Controller
{
 /**  
  * public function pdf() {
     *   $path = storage_path('resources/views/pedidosPDF.html');
      *  $pdf = pdf::loadFile($path);
    
       * return $pdf->stream();
   * }

*public function pdf(){

 *   $datos = sucursales::all();
  *  $pdf = pdf::loadView('pedidosPDF', compact('datos'));
   * return $pdf->stream();
 *}



 *public function ppdf(){
*frtgrgt
  *  $pedidos  = pedidos::all();
   * $pdf = pdf::loadView('pedidosPDF', compact('pedidos'));
    *return $pdf->stream();
* }
 */

 public function pdf()
    {
        $pedidos = pedidos::all();
        $datos = Sucursales::all();
        $pdf = pdf::loadView('pedidosPDF', compact('pedidos', 'datos'));
        return $pdf->stream();
    }


public function pdfpersonal()
{
    $personal = personal::all();
    $datos = Sucursales::all();
    $pdf = pdf::loadView('personalPDF', compact('personal', 'datos'));
    return $pdf->stream();
}

public function pdfinventario()
{
    $inventario = inventario::all();
    $datos = Sucursales::all();
    $pdf = pdf::loadView('inventarioPDF', compact('inventario', 'datos'));
    return $pdf->stream();
}
}

