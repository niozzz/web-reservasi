<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AboutUsModel extends Model
{
    public function tambahData($data)
    {
        DB::table('tb_aboutus')->insert($data);
    }

    public function getAllData()
    {
        return DB::table('tb_aboutus')->get();
    }

    public function getDataById($id)
    {
        return DB::table('tb_aboutus')
            ->where('id_abt', $id)
            ->first();
    }

    public function hapusData($id)
    {
        DB::table('tb_aboutus')
            ->where('id_abt', $id)
            ->delete();
    }
}
