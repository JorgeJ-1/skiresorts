<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Models\User;
use App\Models\Role;
//use App\Models\SkiResort;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        
        $mySkiResorts=$user->skiResorts()->get();
  
        return view('home',['user'=>$user, 'skiResorts'=>$mySkiResorts]);
    }
}
