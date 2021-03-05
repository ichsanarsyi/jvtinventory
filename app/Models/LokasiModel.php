<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LokasiModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_lokasi')->get();
    }

    public function addData($data)
    {
        return DB::table('tbl_lokasi')->insert($data);
    }

    public function editData($id_lokasi, $data)
    {
        return DB::table('tbl_lokasi')->where('id_lokasi', $id_lokasi)->update($data);
    }
    
    public function deleteData($id_lokasi)
    {
        return DB::table('tbl_lokasi')->where('id_lokasi', $id_lokasi)->delete();
    }
}
