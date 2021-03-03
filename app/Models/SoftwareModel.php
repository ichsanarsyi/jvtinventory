<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SoftwareModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_software')->get();
    }

    public function detailData($id_sw)
    {
        return DB::table('tbl_software')->where('id_sw', $id_sw)->first();
    }
    
    public function addData($data)
    {
        return DB::table('tbl_software')->insert($data);
    }
    
    public function editData($id_sw, $data)
    {
        return DB::table('tbl_software')->where('id_sw', $id_sw)->update($data);
    }
    
    public function deleteData($id_sw)
    {
        return DB::table('tbl_software')->where('id_sw', $id_sw)->delete();
    }
}
