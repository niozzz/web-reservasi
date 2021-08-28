<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationModel;

class UserReservationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this-> ReservationModel = new ReservationModel();
    }
    
    public function index()
    {
        $allData = $this->ReservationModel->getAllDataForUser();

        $data = [
            'allData' => $allData,
        ];
        return view('reservation-user/index', $data);
    }

    public function tambah()
    {
        // $allData = $this->ReservationModel->getAllDataForUser();

        // $data = [
        //     'allData' => $allData
        // ];

        return view('reservation-user/tambah');
    }

    public function insert()
    {
        $warna = '#67e793';
        $judul = '';
        
        Request()->validate([
            'nama_pemesan' => 'required',
            'tanggal_reservasi' => 'required',
            'jam_reservasi' => 'required',
            'jumPeserta_reservasi' => 'required',
            'sOrder_reservasi' => 'required',
        ]);
            

        $judul = '['. Request()->jam_reservasi . '] ' . Request()->nama_pemesan . ' (' . Request()->jumPeserta_reservasi . ')'; 
        $data = [
            'title' => $judul,
            'start_event' => Request()-> tanggal_reservasi,
            'end_event' => Request()-> tanggal_reservasi,
            'color' => $warna,
            'specific_order' => Request()-> sOrder_reservasi,
            'status' => 'belum disetujui',
            'max' => 40,
            'id_pemesan' => auth()->user()->id,
        ];

        $this->ReservationModel->tambahData($data);
        // }
        return redirect()->route('UserReservation')->with('pesan', 'berhasil ditambahkan');
    }

    public function delete($id)
    {

        $this->ReservationModel->hapusData($id);
        return redirect()->route('UserReservation')->with('pesan', 'berhasil dihapus');
    }
}
