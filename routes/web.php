<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkiResortController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('sportCars', SkiResortController::class); // Genera las rutas automáticamente

Route::get('sportCars/{sportcar}/delete', [SkiResortController::class, 'delete'] )->name('sportCars.delete'); // Delete genera una sola ruta
    