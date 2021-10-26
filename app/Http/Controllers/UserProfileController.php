<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileModel;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this-> ProfileModel = new ProfileModel();
        
    }

    public function index()
    {
        $allData = $this->ProfileModel->getAllData();
        $dataProfile = $this->ProfileModel->getDataById(auth()->user()->id);

        $data = [
            'allData' => $allData,
            'dataProfile' => $dataProfile,
        ];
        return view('profile-user/index', $data);
    }

    public function update()
    {
        Request()->validate([
            'name_profile' => 'required',
            'email_profile' => 'required',
            'address_profile' => 'required',
            'phone_profile' => 'required|min:11|max:13|unique:users,phone,'.Request()-> phone_profile,
            
        ]);

        if (Request()->password_profile)
        {
            Request()->validate([
                'password_confirm' => 'required',
                'new_password' => 'min:8',
            ]);

            if (Hash::check(Request()->password_profile, auth()->user()->password))
            {
                if (Request()->password_profile == Request()->password_confirm)
                {
                    $data = [
                        'name' => Request()-> name_profile,
                        'email' => Request()-> email_profile,
                        'address' => Request()-> address_profile,
                        'phone' => Request()-> phone_profile,
                        'password' => Hash::make (Request()-> new_password),
                    ];
    
                    $this->ProfileModel->ubahData(auth()->user()->id,  $data);
                    return redirect()->route('UserProfile')->with('pesan', 'berhasil diubah');
                }else{
                    return redirect()->route('UserProfile')->with('pesan','password konfirmasi tidak cocok');
                }

            }else
            {
                return redirect()->route('UserProfile')->with('pesan','password tidak dikenali');
            }
        }else{
            $data = [
                'name' => Request()-> name_profile,
                'email' => Request()-> email_profile,
                'address' => Request()-> address_profile,
                'phone' => Request()-> phone_profile,
            ];

            $this->ProfileModel->ubahData(auth()->user()->id,  $data);
            return redirect()->route('UserProfile')->with('pesan', 'berhasil diubah');
        }
    }
}
