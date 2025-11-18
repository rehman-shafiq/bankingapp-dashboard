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
        $validatedData = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:16',
        ]);

        if (Auth::attempt($validatedData)) {

            Auth::login(Auth::user());

            return redirect()->route('dashboard.view');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
