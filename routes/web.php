<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SkiResortController;
use App\Http\Controllers\contactController;

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

/*
 * 
 Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [WelcomeController::class, 'index'])->name('portada');

//Route::get('skiResort/search', [SkiResortController::class, 'search'] )->name('skiResort.search');

//Route::resource('skiResort', SkiResortController::class); // Genera las rutas automáticamente


Route::get('skiResort', [SkiResortController::class, 'index'] )->name('skiResort.index');
Route::post('skiResort', [SkiResortController::class, 'store'] )->name('skiResort.store');
Route::get('skiResort/create', [SkiResortController::class, 'create'] )->name('skiResort.create');
Route::get('skiResort/search', [SkiResortController::class, 'search'] )->name('skiResort.search');
Route::get('skiResort/{skiResort}', [SkiResortController::class, 'show'] )->name('skiResort.show');
Route::put('skiResort/{skiResort}', [SkiResortController::class, 'update'] )->name('skiResort.update');
Route::delete('skiResort/{skiResort}', [SkiResortController::class, 'destroy'] )->name('skiResort.destroy');
Route::get('skiResort/{skiResort}/delete', [SkiResortController::class, 'delete'] )->name('skiResort.delete');
Route::get('skiResort/{skiResort}/edit', [SkiResortController::class, 'edit'] )->name('skiResort.edit');

//Route::get('skiResort/{skiResort}/delete', [SkiResortController::class, 'delete'] )->name('skiResort.delete'); // Delete genera una sola ruta

 
Route::get('/contact', [ContactController::class, 'index']) ->name('contact');
Route::post('/contact', [ContactController::class, 'send']) ->name('contact.email');




Route::fallback([WelcomeController::class, 'index']);