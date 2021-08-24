<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    public function index()
    {
        return view('reservation-admin/index');
    }
}
