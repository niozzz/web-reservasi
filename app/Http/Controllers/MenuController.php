<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;

class MenuController extends Controller
{
    public function __construct()
    {
        $this-> MenuModel = new MenuModel();
    }

    public function index()
    {

        $allData = $this->MenuModel->getAllData();

        $data = [
            'allData' => $allData
        ];

        return view('menu', $data);
    }
}
