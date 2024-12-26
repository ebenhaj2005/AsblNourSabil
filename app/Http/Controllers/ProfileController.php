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

     public function showPublicProfile($username)
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
        dd($request->all());
        $user->bio = $request->input('bio');
    
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
        $user = $request->user();

        // Validate the visibility field
        $request->validate([
            'visibility' => ['required', 'in:username,name_surname'],
        ]);

        // Check if the username is changed and validate it for uniqueness
        if ($request->input('username') !== $user->username) {
            $request->validate([
                'username' => [
                    'required',
                    'string',
                    'max:255',
                    'unique:users,username,' . $user->id, // Exclude the current user from uniqueness check 
                    
                ],
            ]);
        }

        

        // Fill the validated data (including username, email, visibility, etc.)
        $user->fill($request->validated());

        // If email is changed, reset the verified_at field
        if ($request->user()->isDirty('email')) {
            $user->email_verified_at = null;
        }
      
        // Save the updated user data
        $user->save();

        // Flash success message
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