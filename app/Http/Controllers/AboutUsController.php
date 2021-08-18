<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\AboutUsModel;

class AboutUsController extends Controller
{

    public function __construct()
    {
        $this-> AboutUsModel = new AboutUsModel();
    }

    public function index()
    {

        $allData = $this->AboutUsModel->getAllData();

        $data = [
            'allData' => $allData
        ];

        return view('aboutus', $data);
    }
}
