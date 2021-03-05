<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KondisiModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_kondisi')->get();
    }

    public function addData($data)
    {
        return DB::table('tbl_kondisi')->insert($data);
    }

    public function editData($id_kondisi, $data)
    {
        return DB::table('tbl_kondisi')->where('id_kondisi', $id_kondisi)->update($data);
    }
    
    public function deleteData($id_kondisi)
    {
        return DB::table('tbl_kondisi')->where('id_kondisi', $id_kondisi)->delete();
    }
}
