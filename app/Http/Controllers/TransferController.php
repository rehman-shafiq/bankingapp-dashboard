<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function transferView()
    {
        return view('transfer');
    }
}
