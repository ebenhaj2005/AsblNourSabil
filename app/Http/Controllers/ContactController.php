<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }
    
        public function submitContactForm(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required'
            ]);
            return redirect()->back()->with('success', 'Form submitted successfully!');
        }
    }
?>
