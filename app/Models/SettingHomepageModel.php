<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SettingHomepageModel extends Model
{
    public function tambahData($data)
    {
        DB::table('tb_setting')->insert($data);
    }

    public function getAllData()
    {
        return DB::table('tb_setting')->get();
    }

    public function getDataById($id)
    {
        return DB::table('tb_setting')
            ->where('id', $id)
            ->first();
    }

    public function hapusData($id)
    {
        DB::table('tb_setting')
            ->where('id', $id)
            ->delete();
    }

    public function ubahData($id, $data)
    {
        DB::table('tb_setting')
            ->where('id', $id)
            ->update($data);
    }
}
