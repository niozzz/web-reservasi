<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationModel;
use App\Models\SettingModel;
use App\Models\ProfileModel;

class AdminReservationController extends Controller
{
    public const MAX_ORANG = 40;

    public function __construct()
    {
        $this->middleware('auth');
        $this-> ReservationModel = new ReservationModel();
        $this-> SettingModel = new SettingModel();
        $this-> ProfileModel = new ProfileModel();
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
            $selisih = self::MAX_ORANG - $this->ReservationModel->getJumlahByTanggal($tanggal);
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
        $allProfile = $this->ProfileModel->getAllData();

        // dd($allProfile);

        $data = [
            'allData' => $allData,
            'reservasi_link' => $reservasi_link,
            'allProfile' => $allProfile,
            
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
        $tanggalPenuh = $this->tanggalPenuh();
        
        Request()->validate([
            'nama_pemesan' => 'required',
            'tanggal_reservasi' => 'required',
            'jam_reservasi' => 'required',
            'jumPeserta_reservasi' => 'required',
            'sOrder_reservasi' => 'required',
        ]);

        if (in_array(Request()->tanggal_reservasi, $tanggalPenuh))
        {
            return redirect()->route('AdminReservation')->with('pesan', 'tanggal gagal ditambahkan');
            die;
        }

        if ($this->ReservationModel->getJumlahByTanggal(Request()->tanggal_reservasi) + Request()->jumPeserta_reservasi > self::MAX_ORANG )
        {
            return redirect()->route('AdminReservation')->with('pesan', 'jumlah tidak valid');
            die;
        }
            

        $judul = '['. Request()->jam_reservasi . '] ' . Request()->nama_pemesan . ' (' . Request()->jumPeserta_reservasi . ')'; 
        $data = [
            'title' => $judul,
            'start_event' => Request()-> tanggal_reservasi,
            'end_event' => Request()-> tanggal_reservasi,
            'color' => $warna,
            'specific_order' => Request()-> sOrder_reservasi,
            'status' => 'belum disetujui',
            'max' => self::MAX_ORANG,
            'id_pemesan' => auth()->user()->id,
        ];

        $this->ReservationModel->tambahData($data);
        
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
            'teks' => Request()-> link_reservasi2
        ];

        $this->SettingModel->ubahData('reservasi_link',$data);
        return redirect()->route('AdminReservation')->with('pesan', 'berhasil diubah');
    }

    public function updateSlot()
    {

        $warna = '#67e793';
        $judul = '';

        Request()->validate([
            'jumlah_maksimal' => 'required',
            'tanggal_reservasi' => 'required',
        ]);

        $dataReservasi = $this->ReservationModel->getDataByTanggal(Request()->tanggal_reservasi);

        // dd($dataReservasi);

        if (count($dataReservasi) ==  0)
        {
            $data = [
                'title' => $judul,
                'start_event' => Request()-> tanggal_reservasi,
                'end_event' => Request()-> tanggal_reservasi,
                'color' => $warna,
                'specific_order' => '',
                'status' => '',
                'max' => Request()->jumlah_maksimal,
            ];

            $this->ReservationModel->tambahData($data);
        
            return redirect()->route('AdminReservation')->with('pesan', 'berhasil ditambahkan');
        }else
        {

            $data = [
                'max' => Request()->jumlah_maksimal
            ];
    
            $this->ReservationModel->ubahMAX_ORANG(Request()-> tanggal_reservasi,$data);
            return redirect()->route('AdminReservation')->with('pesan', 'berhasil diubah');
        }

        
        
        
    }

    public function confirm()
    {
        $dataEvent = $this-> ReservationModel -> getDataById(Request()->id_event);
        $jumlahPeserta = $this->ReservationModel->getJumlahByTanggal($dataEvent->start_event);

        if ($jumlahPeserta + Request()->jumlahPeserta <= Request()->max){
            $data = [
                'status' => 'disetujui'
            ];
    
            $this->ReservationModel->ubahData(Request()->id_event, $data);
            return redirect()->route('AdminReservation')->with('pesan', 'berhasil diubah');
        }else
        {
            return redirect()->route('AdminReservation')->with('pesan', 'tanggal gagal ditambahkan');
        }
        
        
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
