<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    public function welcome(): View
    {
        return view('welcome');
    }
}
