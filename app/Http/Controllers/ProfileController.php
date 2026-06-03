<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('Login');
        }

        return view('myprofile');
    }

    public function update(Request $request)
    {
        if (!session()->has('user_id')) {
            return redirect()->route('Login');
        }

        // =========================
        // 1. VALIDATION
        // =========================
        $request->validate([
            'fullname'         => 'required|string|max:255',
            'username'         => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'contact'          => 'nullable|string|max:20',
            'address'          => 'nullable|string|max:255',
            
            // Checks if new_password is typed, then current_password becomes required
            'current_password' => 'required_with:new_password|nullable|string',
            'new_password'     => 'nullable|string|min:6|confirmed', 
        ]);

        $user = Profile::find(session('user_id'));

        if (!$user) {
            return redirect()->route('Login')->with('error', 'User not found');
        }

        // =========================
        // 2. PASSWORD UPDATE LOGIC
        // =========================
        // We use $request->filled() to make sure strings aren't empty spaces
        if ($request->filled('current_password') && $request->filled('new_password')) {
            
            // Check if input matches database hash
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withInput()->with('error', 'Current password is incorrect');
            }

            // Set the new hashed password directly to the attribute
            $user->password = Hash::make($request->new_password);
        }

        // =========================
        // 3. UPDATE PROFILE DATA
        // =========================
        $user->name           = $request->fullname;
        $user->username       = $request->username;
        $user->email          = $request->email;
        $user->contact_number = $request->contact;
        $user->address        = $request->address;

        // Save everything to database
        $user->save();

        // =========================
        // 4. UPDATE SESSION
        // =========================
        session([
            'name'           => $user->name,
            'username'       => $user->username,
            'email'          => $user->email,
            'contact_number' => $user->contact_number,
            'address'        => $user->address,
        ]);

        return back()->with('success', 'Profile updated successfully');
    }
}