<?php
namespace App\Http\Controllers; 
class AdminController extends Controller{
    
    public function deletedBikes(){
        
        $bikes= Bike::onlyTrashed()->paginate(config('pagination.bikes', 10));
        
        return view('admin.bikes.deleted', ['bikes' => $bikes]);
    }


    // muestra la lista de usuarios 
    public function userList(){
        $users User:: orderBy('name', 'ASC')->paginate (config('pagination.users', 10));
        
        return view('admin.users.list', ['users' => $users]);
    }
    
    
    // muestra un usuario 
    public function userShow (User $user){
        // carga la vista de detalles
        return view('admin.users.show', ['user'=>$user]);
    }
       
    
    // método que busca usuarios 
    public function userSearch (Request $request){
       
        $request->validate(['name' => 'max: 32', 'email' => 'max: 32']);
        
        // toma los valores que llegan para nombre y email
        $name = $request->input('name','');
        $email = $request->input('email','');
        
        // recupera los resultados, añadimos marca y modelo al paginator
        // para que haga bien los enlaces y se mantenga el filtro al pasar de página 
        $users User:: orderBy('name', 'ASC')
            ->where('name', 'like', "%$name%") 
            ->where('email', 'like',"%$email%") 
            ->paginate (config('pagination.users'))
            ->appends (['name' => $name, 'email' => $email]);
        
        // retorna la vista de lista con el filtro aplicado
        return view('admin.users.list', ['users'=>$users, 'name' => $name, 'email' => $email]);
    }

    
    // añade un rol a un usuario 
    public function setRole(Request $request){
        $role = Role::find($request->input('role_id'));
        $user = User::find($request->input('user_id'));

        try{
            $user->roles ()->attach($role->id, [
                    'created_at' => now(), 
                    'updated_at' => now()
                    ]);
            return back()
                ->with('success', "Rol $role->role añadido a $user->name correctamente.");
        // si no lo consigue... (use Illuminate\Database\QueryException)
        }
        catch(QueryException $e) {
            return back()
                ->withErrors ("No se pudo añadir el rol $role->role a $user->name. Es posible que ya lo tenga.");
        }
    }


    // quita un rol a un usuario 
    public function removeRole(Request $request){
        $role = Role::find($request->input('role_id'));
        $user = User::find($request->input('user_id'));
        // intenta quitar el rol
        try{
            $user->roles ()->detach($role->id);
            return back()
                ->with('success', "Rol $role->role quitado a $user->name correctamente.");
        }
        catch(QueryException $e) {
            return back()
            ->withErrors ("No se pudo quitar el rol $role->role a $user->name.");
        }
    }
  
}

