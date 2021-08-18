<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUsModel;

class AdminAboutController extends Controller
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

        return view('about/index', $data);
    }

    public function tambah()
    {
        return view('about/tambah');
    }
}
