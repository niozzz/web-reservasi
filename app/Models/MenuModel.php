<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenuModel extends Model
{
    public function tambahData($data)
    {
        DB::table('tb_menu')->insert($data);
    }

    public function getAllData()
    {
        return DB::table('tb_menu')->get();
    }

    public function getDataById($id)
    {
        return DB::table('tb_menu')
            ->where('id_menu', $id)
            ->first();
    }

    public function hapusData($id)
    {
        DB::table('tb_menu')
            ->where('id_menu', $id)
            ->delete();
    }

    public function ubahData($id, $data)
    {
        DB::table('tb_menu')
            ->where('id_menu', $id)
            ->update($data);
    }

    public function ubahKategori($kategori1,$kategori2)
    {
        DB::table('tb_menu')
        ->where('kategori_menu', $kategori1)
        ->update($kategori2);
    }
    public function ubahMenu($menu1,$menu2)
    {
        DB::table('tb_menu')
        ->where('jenis_menu', $menu1)
        ->update($menu2);
    }
}
