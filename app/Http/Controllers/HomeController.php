<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    // percabangan
    public function index()
    {
        return redirect()->route('Dashboard');
    }
}
