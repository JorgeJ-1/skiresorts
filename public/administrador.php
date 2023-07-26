
class IsBlocked{ // CONFIGURABLE: nombre de rutas web permitidas para los usuarios bloqueados // podríamos sacarlas hacia fichero de configuración (p.e: /config/users.php) // permitiremos las operaciones de contacto, logout y user.blocked (evita loop) protected $allowed = ['contacto', 'contacto.email', 'user.blocked', 'logout'];
// maneja la petición entrante
public function handle (Request $request, Closure $next){
$user = $request->user();
$ruta = Route::currentRouteName();
// toma el usuario identificado // toma el nombre de la ruta
// si hay usuario, está bloqueado e intenta acceder a una ruta no permitida, // le llevamos a la ruta de bloqueo
if($user && $user->hasRole('bloqueado') && !in_array($ruta, $this->allowed)) return redirect()->route('user.blocked');
return $next($request);
}
}





* The application's route middleware groups. protected $middlewareGroups = [ 'web' => [
\App\Http\Middleware\EncryptCookies::class,
\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
\Illuminate\Session\Middleware\StartSession::class,
// \Illuminate\Session\Middleware\AuthenticateSession::class, \Illuminate\View\Middleware\ShareErrorsFromSession::class,
\App\Http\Middleware\VerifyCsrfToken::class,
\Illuminate\Routing\Middleware\SubstituteBindings::class,
\App\Http\Middleware\IsBlocked::class,
1,
'api' => [
],
];
'throttle: api',
\Illuminate\Routing\Middleware\SubstituteBindings::class,





namespace App\Http\Controllers; class UserController extends Controller{
// carga la vista para los usuarios bloqueados public function blocked(){
return view('blocked');
}
}








@extends ('layouts.master') @section('contenido')
<div class="container row mt-2">
<div class="col-10 alert alert-danger p-4">
<p>Has sido <b>bloqueado</b> por un administrador.</p>
<p>Si no estás de acuerdo o quieres conocer los motivos, contacta mediante el <a href="{{ route('contacto') }}">formulario de contacto</a>.</p>
</div>
<figure class="col-2">
<img class="rounded img-fluid"
alt="Usuario
bloqueado"
src="{{ asset('/images/template/blocked.png') }}">
<figcaption class="figure-caption text-center">Usuario bloqueado</figcaption>
</figure>
</div>
@endsection
















# para paginación BIKES_PER_PAGE=10 USERS_PER_PAGE=10






