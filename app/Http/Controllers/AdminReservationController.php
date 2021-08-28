<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationModel;
use App\Models\SettingModel;

class AdminReservationController extends Controller
{
    public const MAX_ORANG = 40;

    public function __construct()
    {
        $this->middleware('auth');
        $this-> ReservationModel = new ReservationModel();
        $this-> SettingModel = new SettingModel();
    }

    public function index()
    {
        $allData = $this->ReservationModel->getAllData();
        $settingData = $this->SettingModel->getAllData();

        

        $data = [
            'allData' => $allData,
            'settingData' => $settingData,
            
        ];
        return view('reservation-admin/index', $data);
    }

    public function tambah()
    {
        $allData = $this->ReservationModel->getAllData();

        $data = [
            'allData' => $allData
        ];

        return view('reservation-admin/tambah', $data);
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
            'status' => 'disetujui',
            'max' => 40,
        ];

        $this->ReservationModel->tambahData($data);
        // }
        return redirect()->route('AdminReservation')->with('pesan', 'berhasil ditambahkan');
    }

    public function delete($id)
    {

        $this->ReservationModel->hapusData($id);
        return redirect()->route('AdminReservation')->with('pesan', 'berhasil dihapus');
    }

    public function updateLink()
    {
        Request()->validate([
            'link_reservasi2' => 'required'
        ]);
        
        $data = [
            'reservasi_link' => Request()-> link_reservasi2
        ];

        $this->SettingModel->ubahData($data);
        return redirect()->route('AdminReservation')->with('pesan', 'berhasil diubah');
    }

    // public function ubah($id)
    // {
    //     $data = [
    //         'dataKonten' => $this->ReservationModel->getDataById($id)
    //     ];

    //     return view('reservation/ubah', $data);
    // }

    // public function update($id)
    // {
    //     $konten = $this->ReservationModel->getDataById($id);

    //     $jenisReservation = '';
    //     if (strtolower(Request()->kategori_reservation) == 'coffee')
    //     {

    //         Request()->validate([
    //             'nama_reservation' => 'required',
    //             'jenis_reservation' => 'required',
    //             'kategori_reservation' => 'required',
    //             'harga_reservation' => 'required',
    //         ]);
            
    //         $jenisReservation = strtolower(Request()->jenis_reservation);
    //     }else
    //     {
    //         Request()->validate([
    //             'nama_reservation' => 'required',
    //             'kategori_reservation' => 'required',
    //             'harga_reservation' => 'required',
    //         ]);
    //     }

    //     if (!Request()->gambar_reservation) {
    //         $data = [
    //         'nama_reservation' => Request()-> nama_reservation,
    //         'jenis_reservation' => $jenisReservation,
    //         'kategori_reservation' => strtolower(Request()-> kategori_reservation),
    //         'harga_reservation' => Request()-> harga_reservation,
    //         ];

    //         $this->ReservationModel->ubahData($id, $data);
    //     } else {

    //         // delete gambar
    //         // if ($konten->gbr_reservation <> "") {
    //         //     unlink(public_path('template-homepage-cp/gambar/reservation/' . $konten->gbr_reservation));
    //         // }

    //         // upload gambar
    //         $file = Request()->gambar_reservation;
    //         $fileName = date('His-dmY') . '.' . $file->extension();
    //         $file->move(public_path('template-homepage-cp/gambar/reservation'), $fileName);

    //         $data = [
    //             'nama_reservation' => Request()-> nama_reservation,
    //             'jenis_reservation' => $jenisReservation,
    //             'kategori_reservation' => Request()-> kategori_reservation,
    //             'harga_reservation' => Request()-> harga_reservation,
    //             'gbr_reservation' => $fileName
    //         ];

    //         $this->ReservationModel->ubahData($id, $data);
    //     }
    //     return redirect()->route('Reservation')->with('pesan', 'berhasil diubah');
    // }

    
}
