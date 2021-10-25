<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allData = $this->MenuModel->getAllData();

        $data = [
            'allData' => $allData,

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
}
