<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GalleryModel extends Model
{
    public function tambahData($data)
    {
        DB::table('tb_gallery')->insert($data);
    }

    public function getAllData()
    {
        return DB::table('tb_gallery')->get();
    }

    public function getDataById($id)
    {
        return DB::table('tb_gallery')
            ->where('id_gal', $id)
            ->first();
    }

    public function hapusData($id)
    {
        DB::table('tb_gallery')
            ->where('id_gal', $id)
            ->delete();
    }

    public function ubahData($id, $data)
    {
        DB::table('tb_gallery')
            ->where('id_gal', $id)
            ->update($data);
    }
}
