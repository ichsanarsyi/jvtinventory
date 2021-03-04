<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SoftwareModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_software')
        ->leftJoin('tbl_merk_sw', 'tbl_merk_sw.id_merk_sw', '=', 'tbl_software.id_merk_sw')
        ->leftJoin('tbl_jenis_lisensi', 'tbl_jenis_lisensi.id_jenis_lisensi', '=', 'tbl_software.id_jenis_lisensi')
        ->get();
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
