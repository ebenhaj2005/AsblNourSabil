<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
  
    public function showProfile()
    {
        $user = Auth::user();
        return view('Account', ['user' => $user]);
    }
}
