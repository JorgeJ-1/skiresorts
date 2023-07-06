<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactController extends Controller
{
    //
    public function index() {
        return view('contact');
    }
    
    //
    public function send(Request $request) {
        $messag = new \stdClass();
        $messag->subject = $request->subject;
        $messag->email = $request->email;
        $messag->name = $request->name; 
        $messag->message = $request->message;
        
        Mail::to('contact@skiresorts.com')->send(new Contact($messag));
        return redirect()
            ->route('portada')
            ->with('success', 'Mensaje enviado correctamente.');
    }
}

