<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\ContactUsModel;

class AdminController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    public function __construct()
    {
        $this->middleware('auth');
        $this-> MenuModel = new MenuModel();
        $this-> ContactUsModel = new ContactUsModel();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // menu data
        $allData = $this->MenuModel->getAllData();

        // contact data
        $allContactData = $this->ContactUsModel->getAllData();

        $data = [
            'allData' => $allData,
            'allContactData' => $allContactData,

        ];
        return view('dashboard/admin', $data);
    }

    public function ubahKategori()
    {
        Request()->validate([
            'nama_kategori2' => 'required'
        ]);
        
        $data = [
            'kategori_menu' => Request()-> nama_kategori2
        ];

        $this->MenuModel->ubahKategori(Request()-> nama_kategori1,$data);
        return redirect()->route('Dashboard')->with('pesan', 'berhasil diubah');
    }

    public function ubahMenu()
    {
        Request()->validate([
            'nama_menu2' => 'required'
        ]);
        
        $data = [
            'jenis_menu' => Request()-> nama_menu2
        ];

        $this->MenuModel->ubahMenu(Request()-> nama_menu1,$data);
        return redirect()->route('Dashboard')->with('pesan', 'berhasil diubah');
    }
}
