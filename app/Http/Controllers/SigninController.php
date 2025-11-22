<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SigninController extends Controller
{
  public function signin(): View
  {
    return view('signin');
  }

  public function signinaction():RedirectResponse
   {
        $validated = request()->validate([
            'login' => ['required','string'],
            'password' => ['required','string','min:8','max:16'],
        ]);

        $login = trim($validated['login']);
        $password = $validated['password'];

        // Determine if login is an email or phone number
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $login, 'password' => $password];
        } else {
            // normalize phone number to digits only
            $phone = preg_replace('/\D+/', '', $login);
            $credentials = ['phone_number' => $phone, 'password' => $password];
        }

        if (Auth::attempt($credentials, request()->boolean('remember'))) {
            request()->session()->regenerate();
            return redirect()->route('dashboard.view');
        }

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ])->onlyInput('login');
    }
}
