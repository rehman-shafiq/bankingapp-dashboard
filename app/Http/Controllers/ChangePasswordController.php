<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function passwordchangeaction()
    {
        $validated = request()->validate([
            'current_password' => ['required', 'string', 'min:8', 'max:16'],
            'password' => ['required', 'string', 'min:8', 'max:16', 'confirmed', 'different:current_password'],
        ]);

        if (!Hash::check($validated['current_password'], Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'The provided current password is incorrect.']);
        }

        $user = Auth::user();
        $user->password = Hash::make($validated['password']);
        $user->save();

        return back()->with('status', 'Password changed successfully.');
    }
}
