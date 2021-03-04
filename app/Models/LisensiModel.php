<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LisensiModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_jenis_lisensi')->get();
    }

    public function addData($data)
    {
        return DB::table('tbl_jenis_lisensi')->insert($data);
    }

    public function editData($id_jenis_lisensi, $data)
    {
        return DB::table('tbl_jenis_lisensi')->where('id_jenis_lisensi', $id_jenis_lisensi)->update($data);
    }
    
    public function deleteData($id_jenis_lisensi)
    {
        return DB::table('tbl_jenis_lisensi')->where('id_jenis_lisensi', $id_jenis_lisensi)->delete();
    }
}
