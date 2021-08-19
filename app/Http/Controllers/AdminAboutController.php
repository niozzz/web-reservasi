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

    public function detail($id)
    {
        $data = [
            'dataKonten' => $this->AboutUsModel->getDataById($id)
        ];
        return view('about/detail', $data);
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
                'gbr_abt' => '',
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
        return redirect()->route('About')->with('pesan', 'berhasil ditambahkan');
    }

    public function delete($id)
    {

        $konten = $this->AboutUsModel -> getDataById($id);

        if ($konten->gbr_abt <> "") {
            unlink(public_path('template-homepage-cp/gambar/aboutus/' . $konten->gbr_abt));
        }

        $this->AboutUsModel->hapusData($id);
        return redirect()->route('About')->with('pesan', 'berhasil dihapus');
    }

    public function ubah($id)
    {
        $data = [
            'dataKonten' => $this->AboutUsModel->getDataById($id)
        ];

        return view('about/ubah', $data);
    }
}
