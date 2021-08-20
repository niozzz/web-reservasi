<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryModel;

class AdminGalleryController extends Controller
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

        return view('gallery/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'dataKonten' => $this->GalleryModel->getDataById($id)
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

            $this->GalleryModel->tambahData($data);
        } else {
            // upload gambar
            $file = Request()->gambar_about;
            $fileName = date('His-dmY') . '.' . $file->extension();
            $file->move(public_path('template-homepage-cp/gambar/gallery'), $fileName);

            $data = [
                'judul_abt' => Request()->judul_about,
                'isi_abt' => Request()->isi_about,
                'gbr_abt' => $fileName,
            ];

            $this->GalleryModel->tambahData($data);
        }
        return redirect()->route('About')->with('pesan', 'berhasil ditambahkan');
    }

    public function delete($id)
    {

        $konten = $this->GalleryModel -> getDataById($id);

        if ($konten->gbr_abt <> "") {
            unlink(public_path('template-homepage-cp/gambar/gallery/' . $konten->gbr_abt));
        }

        $this->GalleryModel->hapusData($id);
        return redirect()->route('About')->with('pesan', 'berhasil dihapus');
    }

    public function ubah($id)
    {
        $data = [
            'dataKonten' => $this->GalleryModel->getDataById($id)
        ];

        return view('about/ubah', $data);
    }

    public function update($id)
    {
        $konten = $this->GalleryModel->getDataById($id);

        Request()->validate([
            'judul_about' => 'required',
            'isi_about' => 'required',
        ]);

        if (!Request()->gambar_about) {
            $data = [
                'judul_abt' => Request()->judul_about,
                'isi_abt' => Request()->isi_about,
            ];

            $this->GalleryModel->ubahData($id, $data);
        } else {

            // delete gambar
            if ($konten->gbr_abt <> "") {
                unlink(public_path('template-homepage-cp/gambar/gallery/' . $konten->gbr_abt));
            }

            // upload gambar
            $file = Request()->gambar_about;
            $fileName = date('His-dmY') . '.' . $file->extension();
            $file->move(public_path('template-homepage-cp/gambar/gallery'), $fileName);

            $data = [
                'judul_abt' => Request()->judul_about,
                'isi_abt' => Request()->isi_about,
                'gbr_abt' => $fileName,
            ];

            $this->GalleryModel->ubahData($id, $data);
        }
        return redirect()->route('About')->with('pesan', 'berhasil diubah');
    }
}
