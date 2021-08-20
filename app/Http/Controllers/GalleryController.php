<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryModel;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this-> GalleryModel = new GalleryModel();
    }
    
    public function index()
    {
        $allData = $this->GalleryModel->getAllData();

        $data = [
            'allData' => $allData
        ];

        return view('gallery', $data);
    }
}
