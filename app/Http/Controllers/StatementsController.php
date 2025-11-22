<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatementsController extends Controller
{
    public function statementsView()
    {
        return view('statements');
    }
}
