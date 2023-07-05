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
        $message = new \stdClass();
        $message->subject = $request->subject;
        $message->email = $request->email;
        $message->name = $request->name; 
        $message->message = $request->message;
        
        Mail::to('contact@skiresorts.com')->send(new Contact($message));
        return redirect()
            ->route('portada')
            ->with('success', 'Mensaje enviado correctamente.');
    }
}

