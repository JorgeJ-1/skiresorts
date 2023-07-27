<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

class IsBlocked
{
    // CONFIGURABLE: nombre de rutas web permitidas para los usuarios bloqueados
    // podríamos sacarlas hacia fichero de configuración (p.e: /config/users.php)
    // permitiremos las operaciones de contacto, logout y user.blocked (evita loop)
    protected $allowed = ['contacto', 'contacto.email', 'user.blocked', 'logout'];
    
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user=$request->user();              // toma el usuario identificado
        $ruta=Route::currentRouteName();    // toma el nombre de la ruta
        
        if($user && $user->hasRole('bloqueado') && !in_array($ruta, $this->allowed)) {
            return redirect()->route('user.blocked');
        }
        
        return $next($request);
    }
}
