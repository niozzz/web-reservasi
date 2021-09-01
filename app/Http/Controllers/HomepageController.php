<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingModel;

class HomepageController extends Controller
{
    public function __construct()
    {
        $this-> SettingModel = new SettingModel();
    }

    public function index()
    {
        $reservasi_link = $this->SettingModel->getDataById('reservasi_link');
        $home_slogan1 = $this->SettingModel->getDataById('home_slogan1');
        $home_slogan2 = $this->SettingModel->getDataById('home_slogan2');
        $home_quote1 = $this->SettingModel->getDataById('home_quote1');
        $home_quote2 = $this->SettingModel->getDataById('home_quote2');
        $home_quote3 = $this->SettingModel->getDataById('home_quote3');
        $home_hour1 = $this->SettingModel->getDataById('home_hour1');
        $home_hour2 = $this->SettingModel->getDataById('home_hour2');

        $data = [
            'reservasi_link' => $reservasi_link,
            'home_slogan1' => $home_slogan1,
            'home_slogan2' => $home_slogan2,
            'home_quote1' => $home_quote1,
            'home_quote2' => $home_quote2,
            'home_quote3' => $home_quote3,
            'home_hour1' => $home_hour1,
            'home_hour2' => $home_hour2,
        ];

        return view('homepage', $data);
    }

    // public function slogan1()
    // {

    // }
}
