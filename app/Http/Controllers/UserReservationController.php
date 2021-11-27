<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationModel;
use App\Models\MenuModel;
use App\Models\SettingModel;
use App\Http\Controllers\AdminReservationController;
use DateTime;

class UserReservationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this-> ReservationModel = new ReservationModel();
        $this-> MenuModel = new MenuModel();
        $this-> SettingModel = new SettingModel();
    }

    public function tanggalPenuh()
    {
        $allData = $this->ReservationModel->getAllDataForUser();

        // mengambil data tanggal penuh
        $semuaTanggal = [];
        foreach ($allData as $data)
        {
            $semuaTanggal[] = $data->start_event;
        }
        $semuaTanggal = array_unique($semuaTanggal);

        $tanggalPenuh = [];
        $tanggalTidakPenuh = [];
        foreach ($semuaTanggal as $tanggal)
        {
            $selisih = AdminReservationController::MAX_ORANG - $this->ReservationModel->getJumlahByTanggal($tanggal);
            if ($selisih <= 0)
            {
                $tanggalPenuh[] = $tanggal;
            }else
            {
                $tanggalTidakPenuh[] = $tanggal;
            }
        }

        return $tanggalPenuh;
    }
    
    public function index()
    {
        $allData = $this->ReservationModel->getAllData();
        $reservasi_link = $this->SettingModel->getDataById('reservasi_link');
        

        // dd($tanggalPenuh);

        $data = [
            'allData' => $allData,
            'reservasi_link' => $reservasi_link,
        ];
        return view('reservation-user/index', $data);
    }

    public function tambah()
    {
        // $allData = $this->ReservationModel->getAllDataForUser();
        $allData = $this->MenuModel->getAllData();
        $data = [
            'allData' => $allData
        ];
        // $data = [
        //     'allData' => $allData
        // ];
        

        return view('reservation-user/tambah', $data);
    }

    public function insert()
    {
        $warna = '#67e793';
        $judul = '';
        $tanggalPenuh = $this->tanggalPenuh();
        
        
        Request()->validate([
            'nama_pemesan' => 'required',
            'tanggal_reservasi' => 'required',
            'jam_reservasi' => 'required',
            'jamSelesai_reservasi' => 'required',
            'jumPeserta_reservasi' => 'required',
            // 'sOrder_reservasi' => 'required',
            'menu_reservasi' => 'required',
        ]);

        if (in_array(Request()->tanggal_reservasi, $tanggalPenuh))
        {
            return redirect()->route('UserReservation')->with('pesan', 'tanggal gagal ditambahkan');
            die;
        }

        if ($this->ReservationModel->getJumlahByTanggal(Request()->tanggal_reservasi) + Request()->jumPeserta_reservasi > AdminReservationController::MAX_ORANG )
        {
            return redirect()->route('UserReservation')->with('pesan', 'jumlah tidak valid');
            die;
        }

        if ((new DateTime(Request()->tanggal_reservasi. " " .Request()->jam_reservasi)) > (new DateTime(Request()->tanggal_reservasi. " " .Request()->jamSelesai_reservasi)))
        {
            return redirect()->route('UserReservation')->with('pesan', 'jam tidak valid');
            die;
        }

            

        $judul = '['. Request()->jam_reservasi . '] ' . Request()->nama_pemesan . ' (' . Request()->jumPeserta_reservasi . ')'; 
        $teksMenu =  nl2br(Request() ->menu_reservasi);
        $teksMenu =  trim($teksMenu);
        $teksMenu = preg_replace('/\r\n|\r|\n\r|\n/m', ' ', $teksMenu);
        $data = [
            'title' => $judul,
            'start_event' => Request()-> tanggal_reservasi,
            'end_event' => Request()-> tanggal_reservasi,
            'jam_selesai' => Request()-> jamSelesai_reservasi,
            'color' => $warna,
            'specific_order' => Request()-> sOrder_reservasi,
            'status' => 'belum disetujui',
            'max' => AdminReservationController::MAX_ORANG,
            'id_pemesan' => auth()->user()->id,
            'menu' => $teksMenu,
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
