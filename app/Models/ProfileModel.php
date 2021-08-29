<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProfileModel extends Model
{
    public function tambahData($data)
    {
        DB::table('users')->insert($data);
    }

    public function getAllData()
    {
        return DB::table('users')->get();
    }

    public function getDataById($id)
    {
        return DB::table('users')
            ->where('id', $id)
            ->first();
    }

    public function hapusData($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->delete();
    }

    public function ubahData($id, $data)
    {
        DB::table('users')
            ->where('id', $id)
            ->update($data);
    }
}
