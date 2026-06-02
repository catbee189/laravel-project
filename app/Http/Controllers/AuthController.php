<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:profiles,email',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|string|max:255|unique:profiles,username',
            'contact_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        Profile::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
        ]);

        return redirect()->route('Login')->with('success', 'Registration successful. Please login.')->withInput();
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = Profile::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Invalid email or password');
    }

    session([
        'user_id' => $user->id,
        'user_name' => $user->name,
    ]);

     session([
            'user_id' => $user->id,
            'name' => $user->name,
            'username' => $user->username,
            'email' => $user->email,
            'contact_number' => $user->contact_number,
            'address' => $user->address,
        ]);

    return redirect('/dashboard')->with('success', 'Login successful');
}
}