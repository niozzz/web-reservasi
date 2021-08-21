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

    public function insert()
    {
        Request()->validate([
            'nama_contact' => 'required',
            'email_contact' => 'required',
            'subject_contact' => 'required',
            'pesan_contact' => 'required',
        ]);

        $data = [
            'nama_contact' => Request()->nama_contact,
            'email_contact' => Request()->email_contact,
            'subject_contact' => Request()->subject_contact,
            'pesan_contact' => Request()->pesan_contact,
            'tanggal_contact' => Request()->tanggal_contact,
        ];

        $this->ContactUsModel->tambahData($data);
        return redirect()->route('Contact')->with('pesan', 'berhasil ditambahkan');
    }
}
