<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
        
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.dashboard')->with('error', 'User not found.');
        }

        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }
    public function update($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.dashboard')->with('error', 'User not found.');
        }

        if (!$user->name) {
            return redirect()->route('admin.dashboard')->with('error', 'User must have a name.');
        }
        
        $user->role = 'admin';
        $user->save();
        return redirect()->route('admin.dashboard')->with('success', 'User promoted to admin.');
    }

    
  
        public function create()
        {
            return view('admin.createuser');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'role' => 'required|in:user,admin',
            ]);
    
            User::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
    
            return redirect()->route('admin.dashboard')->with('success', 'User created successfully.');
        }

    }
    
    
