<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MerkswModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_merk_sw')->get();
    }

    public function addData($data)
    {
        return DB::table('tbl_merk_sw')->insert($data);
    }

    public function editData($id_merk_sw, $data)
    {
        return DB::table('tbl_merk_sw')->where('id_merk_sw', $id_merk_sw)->update($data);
    }
    
    public function deleteData($id_merk_sw)
    {
        return DB::table('tbl_merk_sw')->where('id_merk_sw', $id_merk_sw)->delete();
    }
}
