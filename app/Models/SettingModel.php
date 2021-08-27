<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SettingModel extends Model
{
    public function getAllData()
    {
        return DB::table('tb_setting')->first();
    }

    public function ubahData($data)
    {
        DB::table('tb_setting')
            ->update($data);
    }
}
