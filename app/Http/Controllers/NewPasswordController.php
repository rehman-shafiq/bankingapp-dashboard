<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NewPasswordController extends Controller
{
    public function newpassword($token): View
    {
         $email = request()->get('email');

        return view('newpassordform', compact('token', 'email'));
    }
    public function newpasswordaction(){
        {
        $validatedData = request()->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|confirmed|min:8|max:16',
        ]);

        $data = PasswordResetToken::where('email', '=', $validatedData['email'])->first();

        $exists = Hash::check($validatedData['token'], $data['token']);

        if ($exists === true) {
            User::where('email', '=', $validatedData['email'])
                ->update([
                    'password' => bcrypt($validatedData['password'])
                ]);

            return redirect()->route('welcome.view')->with('status', true);
        }

        return back()->withErrors(['email' => 'Invalid token or email']);
    }
    }

}
