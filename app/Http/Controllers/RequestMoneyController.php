<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestMoneyController extends Controller
{
    public function requestmoneyView()
    {
        return view('requestmoney');
    }
}
