<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReservationModel extends Model
{
    public function tambahData($data)
    {
        DB::table('events')->insert($data);
    }

    public function getAllData()
    {
        return DB::table('events')->get();
    }

    public function getAllDataForUser()
    {
        return DB::table('events')
        ->where('status', 'belum disetujui')
        ->get();
    }

    public function getDataById($id)
    {
        return DB::table('events')
            ->where('id', $id)
            ->first();
    }

    public function getAllEvent()
    {
        return DB::table('events')
            ->select('title')
            ->get();
    }

    public function getDataByTanggal($tanggal)
    {
        return DB::table('events')
            ->where('start_event', $tanggal)
            ->get();
    }

    public function getJumlahByTanggal($tanggal)
    {
        $data = $this->getDataByTanggal($tanggal);

        $tampungJumlah = [];
        $jumlah = 0;
        foreach($data as $data)
        {
            $title = explode(" ", $data->title);
            $title[2] = str_replace(['(',')'],"", $title[2]);
            $title[2] = (int) $title[2];
            // $tampungJumlah[] = $title[2];
            $jumlah += $title[2];
        }

        return $jumlah;


        // return DB::table('events')
        //     ->select('title')
        //     ->where('start_event', $tanggal)
        //     ->count();
    }

    public function hapusData($id)
    {
        DB::table('events')
            ->where('id', $id)
            ->delete();
    }

    public function ubahData($id, $data)
    {
        DB::table('events')
            ->where('id', $id)
            ->update($data);
    }

    public function ubahMAX_ORANG($tanggal, $data)
    {
        DB::table('events')
            ->where('start_event', $tanggal)
            ->update($data);
    }
}
