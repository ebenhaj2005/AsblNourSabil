<?php


namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

     public function showPublicProfile(Request $request, $username)
    {
        // Retrieve the user by username or fail if not found
        $user = User::where('username', $username)->first();
        
        // Check if user is found
        if (!$user) {
           abort(404, 'User not found');
        }
    
        // Determine the profile name based on visibility settings
        if ($user->visibility === 'name_surname') {
           $profileName = $user->name . ' ' . $user->surname;
        } else {
           $profileName = $user->username;
        }
       
        $user->bio = $user->bio ?? 'No bio provided';
    
        // Return the view with the user data, profile name, and bio
        return view('public', [
           'user' => $user, 
           'profileName' => $profileName,
           'bio' => $user->bio
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
     
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();

      
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->username = $request->input('username');
        $user->bio = $request->input('bio'); 

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('profile_pictures', $fileName, 'public');
      $user->profile_picture = $filePath;
        }
      
        $user->birthday = $request->input('birthday');
    $user->visibility = $request->input('visibility');

    
    
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

        

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Log the user out before deletion
        Auth::logout();

        // Delete the user record
        $user->delete();

        // Invalidate and regenerate session token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the homepage
        return Redirect::to('/');
    }
}