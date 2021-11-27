<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingHomepageModel;
use App\Models\SettingModel;

class SettingHomepageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this-> SettingHomepageModel = new SettingHomepageModel();
        $this-> SettingModel = new SettingModel();
    }

    public function index()
    {
        // $allData = $this->SettingHomepageModel->getAllData();
        $allData = $this->SettingModel->getAllData();

        // dd($allData)
;
        $data = [
            'allData' => $allData,
        ];
        return view('admin.setting.homepage.index', $data);
    }

    public function ubah($id)
    {
        $settingData = $this->SettingModel->getDataById($id);

        // dd($settingData)
;
        $data = [
            'settingData' => $settingData,
        ];
        return view('admin.setting.homepage.ubah', $data);
    }

    public function update($id)
    {
        $data = [];
        
        $settingData = $this->SettingModel->getDataById($id);
        // dd($settingData->id_setting);


        $pecahanTeks = explode("/", Request()->teks);
        if (count($pecahanTeks) !== 2 && (($settingData->id_setting == "home_hour1") || ($settingData->id_setting == "home_hour1")))
        {
            return redirect()->route('SettingHomepage')->with('pesan', 'tidak berhasil diubah');
            die;
        }

        // dd(Request()->hide);
        if (Request()-> hide == 'YES' || Request()-> hide == NULL)
        {

            Request()->validate([
                'teks' => 'required'
            ]);

            $hide = 'NO';
            if (Request()-> hide == 'YES')
            {
                global $hide;
                $hide = 'YES';
            }
            
            $data = [
                'teks' => Request()-> teks,
                'hide' => $hide,
            ];
        }else
        {

            Request()->validate([
                'teks' => 'required'
            ]);
            
            $data = [
                'teks' => Request()-> teks,
            ];
        }

        $this->SettingModel->ubahData($id,$data);
        return redirect()->route('SettingHomepage')->with('pesan', 'berhasil diubah');
    }

    // public function updateSlogan1()
    // {
    //     Request()->validate([
    //         'home_slogan1' => 'required'
    //     ]);
        
    //     $data = [
    //         'home_slogan1' => Request()-> home_slogan1
    //     ];

    //     $this->SettingModel->ubahData($data);
    //     return redirect()->route('SettingHomepage')->with('pesan', 'berhasil diubah');
    // }
}
