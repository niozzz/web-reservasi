<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\SettingModel;

class HomepageController extends Controller
{
    // public function __construct()
    // {
    //     $this-> SettingModel = new SettingModel();
    // }

    public function index()
    {
        return view('homepage');
    }

    // public function slogan1()
    // {

    // }
}
