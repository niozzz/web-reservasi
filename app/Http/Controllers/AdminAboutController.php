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

    public function insert()
    {
        Request()->validate([
            'judul_about' => 'required',
            'isi_about' => 'required',
        ]);

        if (!Request()->gambar_about) {
            $data = [
                'judul_abt' => Request()->judul_about,
                'isi_abt' => Request()->isi_about,
            ];

            $this->AboutUsModel->tambahData($data);
        } else {
            // upload gambar
            $file = Request()->gambar_about;
            $fileName = date('His-dmY') . '.' . $file->extension();
            $file->move(public_path('template-homepage-cp/gambar/aboutus'), $fileName);

            $data = [
                'judul_abt' => Request()->judul_about,
                'isi_abt' => Request()->isi_about,
                'gbr_abt' => $fileName,
            ];

            $this->AboutUsModel->tambahData($data);
        }
        return redirect()->route('About')->with('pesan', 'Data berhasil diupdate!');


    }
}
