<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // carga la vista para los usuarios bloqueados 
    public function blocked(){
        return view('blocked');
    }
}
