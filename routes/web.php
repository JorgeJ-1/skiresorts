<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SkiResortController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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
Route::post('skiResort', [SkiResortController::class, 'store'] )->name('skiResort.store')->middleware('auth');
Route::get('skiResort/create', [SkiResortController::class, 'create'] )->name('skiResort.create')->middleware('auth');
Route::get('skiResort/search', [SkiResortController::class, 'search'] )->name('skiResort.search');
Route::delete('skiResort/purge', [SkiResortController::class, 'purge'] )->name('skiResort.purge')->middleware('auth');
Route::get('skiResort/{skiResort}', [SkiResortController::class, 'show'] )->name('skiResort.show');
Route::put('skiResort/{skiResort}', [SkiResortController::class, 'update'] )->name('skiResort.update')->middleware('auth');
Route::delete('skiResort/{skiResort}', [SkiResortController::class, 'destroy'] )->name('skiResort.destroy')->middleware('auth');
Route::get('skiResort/{skiResort}/delete', [SkiResortController::class, 'delete'] )->name('skiResort.delete')->middleware('auth');
Route::post('skiResort/{skiResort}/deleteImage', [SkiResortController::class, 'deleteImage'] )->name('skiResort.deleteImage')->middleware('auth');
Route::get('skiResort/{skiResort}/edit', [SkiResortController::class, 'edit'] )->name('skiResort.edit')->middleware('auth');
Route::get('skiResort/{skiResort}/restore', [SkiResortController::class, 'restore'] )->name('skiResort.restore')->middleware('auth');



//Route::get('skiResort/{skiResort}/delete', [SkiResortController::class, 'delete'] )->name('skiResort.delete'); // Delete genera una sola ruta

 
Route::get('/contact', [ContactController::class, 'index']) ->name('contact');
Route::post('/contact', [ContactController::class, 'send']) ->name('contact.email');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// rutas para el proceso de verificación por e-mail
Auth::routes(['verify'=>true]);


// grupo de rutas para el administrador, llevarán el prefijo 'admin' 
Route::prefix('admin')->middleware('auth', 'is_admin')->group (function () 
{  
    // usuario
    Route::get('usuario/{user}/detalles', [AdminController::class, 'userShow']) ->name('admin.user.show');
    Route::get('usuarios', [AdminController::class, 'userList'])->name('admin.users');
    Route::get('usuario/buscar', [AdminController::class, 'userSearch'])->name('admin.users.search');
    
    // añadir un rol 
    Route::post('role', [AdminController::class, 'setRole']) ->name('admin.user.setRole');
    // quitar un rol
    Route::delete('role', [AdminController::class, 'removeRole'])->name('admin.user.removeRole');
    
    // usuarios bloqueados
    Route::get('/bloqueado', [UserController::class, 'blocked'])->name('user.blocked');
    
    
    // ver las estaciones de esquí eliminadas (/admin/deletedskiResorts)
    Route::get('deletedskiResorts', [AdminController::class, 'deletedSkiResorts'])->name('admin.deleted.skiResorts');
});


Route::fallback([WelcomeController::class, 'index']);



