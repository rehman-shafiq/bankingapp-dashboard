<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function accountsView():View
    {
        return view('accounts');
    }
}
