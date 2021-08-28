<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationModel;
use App\Models\SettingModel;

class ReservationController extends Controller
{

    public function __construct()
    {
        $this-> ReservationModel = new ReservationModel();
        $this-> SettingModel = new SettingModel();
    }

    public function index()
    {
        $settingData = $this->SettingModel->getAllData();

        $data = [
            'settingData' => $settingData,
        ];
        return view('reservation', $data);
    }

    public function tampilDataAdmin()
    {
        $dataJSON = [];
        $allData = $this->ReservationModel->getAllData();
        
        $semuaTanggal = [];
        foreach ($allData as $data)
        {
            $semuaTanggal[] = $data->start_event;
        }
        $semuaTanggal = array_unique($semuaTanggal);

        $max = 40;
        $tanggalPenuh = [];
        $tanggalTidakPenuh = [];
        foreach ($semuaTanggal as $tanggal)
        {
            if ($this->ReservationModel->getJumlahByTanggal($tanggal) >= $max)
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

        foreach ($allData as $data){
            if (in_array($data->start_event, $tanggalTidakPenuh))
            {

                $sisaSlot = $max - $this->ReservationModel->getJumlahByTanggal($data->start_event);
                $dataJSON[] = [
                    'id' => $data->id,
                    'title' => 'Tersisa ' . $sisaSlot . " Slot",
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
        
        $semuaTanggal = [];
        foreach ($allData as $data)
        {
            $semuaTanggal[] = $data->start_event;
        }
        $semuaTanggal = array_unique($semuaTanggal);

        $max = 40;
        $tanggalPenuh = [];
        $tanggalTidakPenuh = [];
        foreach ($semuaTanggal as $tanggal)
        {
            if ($this->ReservationModel->getJumlahByTanggal($tanggal) >= $max)
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

        foreach ($allData as $data){
            if (in_array($data->start_event, $tanggalTidakPenuh))
            {

                $sisaSlot = $max - $this->ReservationModel->getJumlahByTanggal($data->start_event);
                $dataJSON[] = [
                    'id' => $data->id,
                    'title' => 'Tersisa ' . $sisaSlot . " Slot",
                    'start' => $data->start_event,
                    'end' => $data->end_event,
                    'color' => '#ffffff',
                    'display' => 'background'
                ];
            }
        }

        echo json_encode($dataJSON);
        // echo json_encode($tanggalPenuh);
    }
}
