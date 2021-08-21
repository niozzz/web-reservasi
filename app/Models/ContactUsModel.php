<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContactUsModel extends Model
{
    public function getAllData()
    {
        return DB::table('tb_contactus')->get();
    }

    public function getDataById($id)
    {
        return DB::table('tb_contactus')
            ->where('id_abt', $id)
            ->first();
    }

    public function hapusData($id)
    {
        DB::table('tb_contactus')
            ->where('id_abt', $id)
            ->delete();
    }
}
