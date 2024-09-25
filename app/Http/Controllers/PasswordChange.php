<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordChange extends Controller
{
    // Display the password change form
    public function showChangePasswordForm()
    {
        return view('Auth.password');
    }

    // Handle password update
    public function updatePassword(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = Auth::user();
        // Ensure $user is an instance of User
        if (!$user instanceof \App\Models\User) {
            return back()->withErrors(['current_password' => 'User not found or invalid user instance.']);
        }

        // Check if the current password matches the user's existing password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided current password does not match our records.']);
        }

        // Update the password and save the user
        $user->password = Hash::make($request->new_password);
        $user->save(); // Save the updated user model

        // Redirect with a success message
        return redirect()->route('login')->with('success', 'Password updated successfully!');
    }
}
