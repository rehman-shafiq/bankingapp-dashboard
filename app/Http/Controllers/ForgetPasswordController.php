<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;

class ForgetPasswordController extends Controller
{
    public function forgetpassword(): View
    {
        return view('forgetpassword');
    }
    public function forgetpasswordaction(): RedirectResponse
    {
        $validated = request()->validate([
            'email' => ['required', 'email'],
        ]);


        if (User::where('email', '=', $validated['email'])->exists()) {
            $status = Password::sendResetLink($validated);
            return $status === Password::RESET_LINK_SENT
                ? back()->with('status', __($status))
                : back()->withErrors(['email' => __($status)]);
        }
        return back()->withErrors(['email' => 'Email not found']);
    }
}
