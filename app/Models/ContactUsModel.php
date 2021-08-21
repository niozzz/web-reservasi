<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContactUsModel extends Model
{
    public function tambahData($data)
    {
        DB::table('tb_contactus')->insert($data);
    }

    public function getAllData()
    {
        return DB::table('tb_contactus')->get();
    }

    public function getDataById($id)
    {
        return DB::table('tb_contactus')
            ->where('id_contact', $id)
            ->first();
    }

    public function hapusData($id)
    {
        DB::table('tb_contactus')
            ->where('id_contact', $id)
            ->delete();
    }
}
