<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hotelsController;
use App\Http\Controllers\habitacionesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [hotelsController::class, 'show'])->name('inicio');

Route::get('/nuevohotel', function () {
    return view('nuevohotel');
})->name("nuevohotel");

Route::get("/editarhotel/{id}",[hotelsController::class,"edit"])->name("editarhotel");
Route::post("/modificarhotel/{id}",[hotelsController::class,"update"])->name("modificarhotel");
Route::post("/eliminarhotel/{id}",[hotelsController::class,"delete"])->name("eliminarhotel");

Route::get("/mostrarhabitaciones/{id}",[habitacionesController::class,"mostrarhabitaciones"])->name("mostrarhabitaciones");
Route::post("/eliminarhabitacion/{id}",[habitacionesController::class,"eliminarhabitacion"])->name("eliminarhabitacion");
Route::post("/crearhabitacion/{id}",[habitacionesController::class,"crearhabitacion"])->name("crearhabitacion");