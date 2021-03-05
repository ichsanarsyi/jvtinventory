<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategorihwModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_kategori_hw')->get();
    }

    public function addData($data)
    {
        return DB::table('tbl_kategori_hw')->insert($data);
    }

    public function editData($id_kategori_hw, $data)
    {
        return DB::table('tbl_kategori_hw')->where('id_kategori_hw', $id_kategori_hw)->update($data);
    }
    
    public function deleteData($id_kategori_hw)
    {
        return DB::table('tbl_kategori_hw')->where('id_kategori_hw', $id_kategori_hw)->delete();
    }
}
