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


    public function makeAdmin($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->role = 'admin';
            $user->save();
            return redirect()->back()->with('success', 'User has been made an admin.');
        }
        return redirect()->back()->with('error', 'User not found.');
    }
}
