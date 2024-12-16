<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function showProfile()
    {
  
        if (Auth::check()) {
            $user = Auth::user();
            return view('account', ['user' => $user]);
        } else {
          
            return redirect('/login');
        }
    }
}
