<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    // percabangan
    public function index()
    {
        if (auth()->user()->level == 1)
        {
            return redirect()->route('Dashboard');
        }elseif (auth()->user()->level == 2)
        {
            return redirect()->route('UserReservation');
        }

    }
}
