<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUsModel;

class AdminContactController extends Controller
{
    public function __construct()
    {
        $this-> ContactUsModel = new ContactUsModel();
    }

    public function index()
    {

        $allData = $this->ContactUsModel->getAllData();

        $data = [
            'allData' => $allData
        ];

        return view('contact/index', $data);
    }

    public function delete($id)
    {

        $this->ContactUsModel->hapusData($id);
        return redirect()->route('Inbox')->with('pesan', 'berhasil dihapus');
    }

    
}
