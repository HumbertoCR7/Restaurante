<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SucursalesController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('auth');
});

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//PDF
Route::get("/pedidosPDF",[PDFController::class,"pdf"])->name("pedidosPDF.pdf")->middleware('auth');
Route::get("/personalPDF",[PDFController::class,"pdfpersonal"])->name("personalPDF.pdf")->middleware('auth');
Route::get("/inventariolPDF",[PDFController::class,"pdfinventario"])->name("inventarioPDF.pdf")->middleware('auth');

//layout
Route::view('layout', 'layout') ->name('layout')->middleware('auth');

//agregarSucursal
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

//home
Route::view('home', 'home') ->name('home')->middleware('auth');


//menu
Route::get("/menu",[MenuController::class,"index"])->name("menu")->middleware('auth');
Route::get("/formsmenu",[MenuController::class,"create"])->name("menu.create")->middleware('auth');
Route::post("/menu/store",[MenuController::class,"store"])->name("menu.store")->middleware('auth');
Route::post("/menu/{id}/edit",[MenuController::class,"edit"])->name("menu.edit")->middleware('auth');
Route::put('/menu/{id}',[MenuController::class,'update'])->name('menu.update')->middleware('auth');
Route::delete('/eliminar-menu/{id}',[MenuController::class,'destroy'])->name('menu.destroy')->middleware('auth');


//inventario
Route::get("/inventario",[InventarioController::class,"index"])->name("inventario")->middleware('auth');
Route::get("/formsinventario",[InventarioController::class,"create"])->name("inventario.create")->middleware('auth');
Route::post("/inventario/store",[InventarioController::class,"store"])->name("inventario.store")->middleware('auth');
Route::post("/inventario/{id}/edit",[InventarioController::class,"edit"])->name("inventario.edit")->middleware('auth');
Route::put('/inventario/{id}',[InventarioController::class,'update'])->name('inventario.update')->middleware('auth');
Route::delete('/eliminar-inventario/{id}',[InventarioController::class,'destroy'])->name('inventario.destroy')->middleware('auth');


//personal
Route::get("/personal",[PersonalController::class,"index"])->name("personal")->middleware('auth');
Route::get("/formspersonal",[PersonalController::class,"create"])->name("personal.create")->middleware('auth');
Route::post("/personal/store",[PersonalController::class,"store"])->name("personal.store")->middleware('auth');
Route::post("/personal/{id}/edit",[PersonalController::class,"edit"])->name("personal.edit")->middleware('auth');
Route::put('/personal/{id}',[PersonalController::class,'update'])->name('personal.update')->middleware('auth');
Route::delete('/eliminar-personal/{id}',[PersonalController::class,'destroy'])->name('personal.destroy')->middleware('auth');


//pedidos
Route::get("/pedidos",[PedidosController::class,"index"])->name("pedidos")->middleware('auth');
Route::get("/formspedidos",[PedidosController::class,"create"])->name("pedidos.create")->middleware('auth');
Route::post("/pedidos/store",[PedidosController::class,"store"])->name("pedidos.store")->middleware('auth');
Route::post("/pedidos/{id}/edit",[PedidosController::class,"edit"])->name("pedidos.edit")->middleware('auth');
Route::put('/pedidos/{id}',[PedidosController::class,'update'])->name('pedidos.update')->middleware('auth');
Route::delete('/eliminar-pedidos/{id}',[PedidosController::class,'destroy'])->name('pedidos.destroy')->middleware('auth');


//sucursales
Route::get("/sucursal",[sucursalesController::class,"index"])->name("sucursal")->middleware('auth');
Route::get("/formssucursal",[sucursalesController::class,"create"])->name("sucursal.create")->middleware('auth');
Route::post("/sucursales/store",[sucursalesController::class,"store"])->name("sucursal.store")->middleware('auth');
Route::post("/sucursal/{id}/edit",[sucursalesController::class,"edit"])->name("sucursal.edit")->middleware('auth');
Route::put('/sucursal/{id}',[sucursalesController::class,'update'])->name('sucursal.update')->middleware('auth');
Route::delete('/eliminar-sucursal/{id}',[sucursalesController::class,'destroy'])->name('sucursal.destroy')->middleware('auth');

