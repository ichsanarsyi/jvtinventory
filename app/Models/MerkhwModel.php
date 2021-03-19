<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MerkhwModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_merk_hw')->get();
    }

    public function addData($data)
    {
        return DB::table('tbl_merk_hw')->insert($data);
        return DB::table('tbl_merk_hw')->insert2($data);
        return DB::table('tbl_merk_hw')->insert3($data);
    }

    public function editData($id_merk_hw, $data)
    {
        return DB::table('tbl_merk_hw')->where('id_merk_hw', $id_merk_hw)->update($data);
    }
    
    public function deleteData($id_merk_hw)
    {
        return DB::table('tbl_merk_hw')->where('id_merk_hw', $id_merk_hw)->delete();
    }
}
