<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationModel;
use App\Models\SettingModel;
use App\Http\Controllers\AdminReservationController;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function __construct()
    {
        $this-> ReservationModel = new ReservationModel();
        $this-> SettingModel = new SettingModel();
    }

    public function index()
    {
        $reservasi_link = $this->SettingModel->getDataById('reservasi_link');
        // $levelUser = 0;
        // // dd(auth()->user());
        // if(auth()->user()->level)
        // {
        //     global $levelUser;
        //     $levelUser = Auth::user()->level;
        // }
        $data = [
            'reservasi_link' => $reservasi_link,
            // 'levelUser' => $levelUser
        ];
        return view('reservation', $data);
    }

    public function tampilDataAdmin()
    {
        $dataJSON = [];
        $allData = $this->ReservationModel->getAllDataDisetujui();
        // dd($allData);

        // $max = AdminReservationController::MAX_ORANG;
        // dd($this->ReservationModel->getMaxByTanggal('2021-08-17'));

        
        $semuaTanggal = [];
        foreach ($allData as $data)
        {
            if ($data->title)
            {

                $semuaTanggal[] = $data->start_event;
            }
        }
        $semuaTanggal = array_unique($semuaTanggal);

        $tanggalPenuh = [];
        $tanggalTidakPenuh = [];
        foreach ($semuaTanggal as $tanggal)
        {
            if ($this->ReservationModel->getJumlahByTanggal($tanggal) >= $this->ReservationModel->getMaxByTanggal($tanggal))
            {
                $tanggalPenuh[] = $tanggal;
            }else
            {
                $tanggalTidakPenuh[] = $tanggal;
            }
        }

        

        // $tanggalPenuh = '';
        $tanggalPenuhTerhapus = [];
        foreach ($allData as $data){
            if ($data->title)
            {
                if (!in_array($data->start_event, $tanggalPenuh))
                {
                    // jika ada tanggal penuh yang sudah dieksekusi, maka tanggal penuh selanjutnya akan dihapus
                    if (!in_array($data->start_event, $tanggalPenuhTerhapus))
                    {
    
                        $dataJSON[] = [
                            'id' => $data->id,
                            'title' => $data->title,
                            'start' => $data->start_event,
                            'end' => $data->end_event,
                            'color' => $data->color,
                            'max' => $data->max,
                        ];
                    }
                }else
                {
                    $dataJSON[] = [
                        'id' => $data->id,
                        'title' => 'Penuh',
                        'start' => $data->start_event,
                        'end' => $data->end_event,
                        'color' => '#ff9f89',
                    ];
    
                    while(in_array($data->start_event, $tanggalPenuh))
                    {
                        $tanggalPenuhTerhapus[] = $data->start_event;
                        $cariIndex = array_search($data->start_event, $tanggalPenuh);
                        unset($tanggalPenuh[$cariIndex]);
                    }
    
    
                }
            }
            
        }

        // dd($this->ReservationModel->getJumlahByTanggal('2021-08-17'));
        // dd($this->ReservationModel->getMaxByTanggal('2021-08-17'));
        foreach ($allData as $data){
            if (in_array($data->start_event, $tanggalTidakPenuh))
            {

                $sisaSlot1 = $this->ReservationModel->getMaxByTanggal($data->start_event) - $this->ReservationModel->getJumlahByTanggal($data->start_event);
                
                $dataJSON[] = [
                    'id' => $data->id,
                    'title' => 'Tersisa ' . $sisaSlot1 . " Slot",
                    'start' => $data->start_event,
                    'end' => $data->end_event,
                    'color' => '#ffffff',
                ];
            }elseif(!$data->title)
            {
                $sisaSlot2 = $this->ReservationModel->getJumlahByTanggal($data->start_event);
                $dataJSON[] = [
                    'id' => $data->id,
                    'title' => 'Tersisa ' . $sisaSlot2 . " Slot",
                    'start' => $data->start_event,
                    'end' => $data->end_event,
                    'color' => '#ffffff',
                ];
            }
        }

        echo json_encode($dataJSON);
        // echo json_encode($tanggalPenuh);
    }

    public function tampilDataUser()
    {
        $dataJSON = [];
        $allData = $this->ReservationModel->getAllData();
        // $max = AdminReservationController::MAX_ORANG;
        
        $semuaTanggal = [];
        foreach ($allData as $data)
        {
            if ($data->title)
            {

                $semuaTanggal[] = $data->start_event;
            }
        }
        $semuaTanggal = array_unique($semuaTanggal);

        $tanggalPenuh = [];
        $tanggalTidakPenuh = [];
        foreach ($semuaTanggal as $tanggal)
        {
            if ($this->ReservationModel->getJumlahByTanggal($tanggal) >= $this->ReservationModel->getMaxByTanggal($tanggal))
            {
                $tanggalPenuh[] = $tanggal;
            }else
            {
                $tanggalTidakPenuh[] = $tanggal;
            }
        }




        // $tanggalPenuh = '';
        $tanggalPenuhTerhapus = [];
        foreach ($allData as $data){
            if (!in_array($data->start_event, $tanggalPenuh))
            {
                if (!in_array($data->start_event, $tanggalPenuhTerhapus))
                {

                    // $dataJSON[] = [
                    //     'id' => $data->id,
                    //     'title' => $data->title,
                    //     'start' => $data->start_event,
                    //     'end' => $data->end_event,
                    //     'color' => $data->color,
                    //     'max' => $data->max,
                    // ];
                }
            }else
            {
                $dataJSON[] = [
                    'id' => $data->id,
                    'title' => 'Penuh',
                    'start' => $data->start_event,
                    'end' => $data->end_event,
                    'color' => '#ff9f89',
                ];

                while(in_array($data->start_event, $tanggalPenuh))
                {
                    $tanggalPenuhTerhapus[] = $data->start_event;
                    $cariIndex = array_search($data->start_event, $tanggalPenuh);
                    unset($tanggalPenuh[$cariIndex]);
                }


            }
        }

        // dd($tanggalTidakPenuh);
        foreach ($allData as $data){
            if ($data->status == 'disetujui')
            {

                if (in_array($data->start_event, $tanggalTidakPenuh))
                {
    
                    $sisaSlot = $this->ReservationModel->getMaxByTanggal($data->start_event) - $this->ReservationModel->getJumlahByTanggal($data->start_event);
                    $dataJSON[] = [
                        'id' => $data->id,
                        'title' => 'Tersisa ' . $sisaSlot . " Slot",
                        'start' => $data->start_event,
                        'end' => $data->end_event,
                        'color' => '#ffffff',
                    ];
                }elseif(!$data->title)
                {
                    $sisaSlot = $this->ReservationModel->getJumlahByTanggal($data->start_event);
                    $dataJSON[] = [
                        'id' => $data->id,
                        'title' => 'Tersisa ' . $sisaSlot . " Slot",
                        'start' => $data->start_event,
                        'end' => $data->end_event,
                        'color' => '#ffffff',
                    ];
                }
            }
        }

        echo json_encode($dataJSON);
        // echo json_encode($tanggalPenuh);
    }
}
