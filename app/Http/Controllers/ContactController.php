<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\contactform;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact'); 
    }

    public function submitContactForm(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

      

       
        Mail::to('admin@example.com')->send(new contactform(
            $request->name,
            $request->email,
            $request->message
        ));

      
        return back()->with('parfait', 'votre message a été envoyé avec succès');
    }
}
