<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
        
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'User not found.');
        }

        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }
    public function makeAdmin(User $user)
    {
        if (!$user->name) {
            return redirect()->route('admin.users')->with('error', 'User must have a name.');
        }
        
        $user->role = 'admin';
        $user->save();
        return redirect()->route('admin.users')->with('success', 'User promoted to admin.');
    }
    
}