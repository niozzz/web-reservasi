<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SettingModel extends Model
{
    public function getAllData()
    {
        return DB::table('tb_setting')->get();
    }

    public function getDataById($id)
    {
        return DB::table('tb_setting')
            ->where('id_setting', $id)
            ->first();
    }

    public function ubahData($id,$data)
    {
        DB::table('tb_setting')
        ->where('id_setting', $id)
        ->update($data);
    }
}
