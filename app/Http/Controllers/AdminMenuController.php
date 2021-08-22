<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;

class AdminMenuController extends Controller
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

        return view('menu/index', $data);
    }

    // public function detail($id)
    // {
    //     $data = [
    //         'dataKonten' => $this->MenuModel->getDataById($id)
    //     ];
    //     return view('menu/detail', $data);
    // }

    public function tambah()
    {
        return view('menu/tambah');
    }

    public function insert()
    {
        Request()->validate([
            'nama_menu' => 'required',
            'jenis_menu' => 'required',
            'kategori_menu' => 'required',
            'harga_menu' => 'required',
            'gambar_menu' => 'required',
        ]);

        // if (!Request()->gambar_menu) {
        //     $data = [
        //         'judul_abt' => Request()->judul_menu,
        //         'isi_abt' => Request()->isi_menu,
        //         'gbr_abt' => '',
        //     ];

        //     $this->MenuModel->tambahData($data);
        // } else {

        // upload gambar
        $file = Request()->gambar_menu;
        $fileName = date('His-dmY') . '.' . $file->extension();
        $file->move(public_path('template-homepage-cp/gambar/menu'), $fileName);

        $data = [
            'nama_menu' => Request()-> nama_menu,
            'jenis_menu' => Request()-> jenis_menu,
            'kategori_menu' => Request()-> kategori_menu,
            'harga_menu' => Request()-> harga_menu,
            'gbr_menu' => $fileName
        ];

        $this->MenuModel->tambahData($data);
        // }
        return redirect()->route('Menu')->with('pesan', 'berhasil ditambahkan');
    }

    public function delete($id)
    {

        $konten = $this->MenuModel -> getDataById($id);

        if ($konten->gbr_menu <> "") {
            unlink(public_path('template-homepage-cp/gambar/menu/' . $konten->gbr_menu));
        }

        $this->MenuModel->hapusData($id);
        return redirect()->route('Menu')->with('pesan', 'berhasil dihapus');
    }

    // public function ubah($id)
    // {
    //     $data = [
    //         'dataKonten' => $this->MenuModel->getDataById($id)
    //     ];

    //     return view('menu/ubah', $data);
    // }

    // public function update($id)
    // {
    //     $konten = $this->MenuModel->getDataById($id);

    //     Request()->validate([
    //         'judul_menu' => 'required',
    //         'isi_menu' => 'required',
    //     ]);

    //     if (!Request()->gambar_menu) {
    //         $data = [
    //             'judul_abt' => Request()->judul_menu,
    //             'isi_abt' => Request()->isi_menu,
    //         ];

    //         $this->MenuModel->ubahData($id, $data);
    //     } else {

    //         // delete gambar
    //         if ($konten->gbr_abt <> "") {
    //             unlink(public_path('template-homepage-cp/gambar/menuus/' . $konten->gbr_abt));
    //         }

    //         // upload gambar
    //         $file = Request()->gambar_menu;
    //         $fileName = date('His-dmY') . '.' . $file->extension();
    //         $file->move(public_path('template-homepage-cp/gambar/menuus'), $fileName);

    //         $data = [
    //             'judul_abt' => Request()->judul_menu,
    //             'isi_abt' => Request()->isi_menu,
    //             'gbr_abt' => $fileName,
    //         ];

    //         $this->MenuModel->ubahData($id, $data);
    //     }
    //     return redirect()->route('menu')->with('pesan', 'berhasil diubah');
    // }
}
