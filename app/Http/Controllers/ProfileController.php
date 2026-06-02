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

        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',

            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = Profile::find(session('user_id'));

        if (!$user) {
            return redirect()->route('Login')->with('error', 'User not found');
        }

        // =========================
        // PASSWORD UPDATE (FIXED)
        // =========================
        if ($request->filled('current_password') && $request->filled('new_password')) {

            // check current password
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->with('error', 'Current password is incorrect');
            }

            // update password in DB
            $user->password = Hash::make($request->new_password);
        }

        // =========================
        // UPDATE PROFILE DATA
        // =========================
        $user->name = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->contact_number = $request->contact;
        $user->address = $request->address;

        // SAVE TO DATABASE (IMPORTANT)
        $user->save();

        // =========================
        // UPDATE SESSION
        // =========================
        session([
            'name' => $user->name,
            'username' => $user->username,
            'email' => $user->email,
            'contact_number' => $user->contact_number,
            'address' => $user->address,
        ]);

        return back()->with('success', 'Profile updated successfully');
    }
}