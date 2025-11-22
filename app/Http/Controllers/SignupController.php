<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SignupController extends Controller
{
    public function signup(): View
    {
        return view('signup');
    }

    public function signupaction():RedirectResponse
    {
        $validatedata =  request()->validate([
            'name' => 'required |string',
            'email' => 'required |email',
            'phone_number' => 'required |numeric|digits_between:10,15',
            'password' => 'required |min:8|confirmed',
        ]);
        User::create($validatedata);
        return redirect('/signin');
    }
}
