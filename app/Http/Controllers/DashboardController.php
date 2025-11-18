<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function dashboardview(): View
    {
        return view('dashboard');
    }
}
