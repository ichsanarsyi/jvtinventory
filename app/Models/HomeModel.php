<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_catatan')->get();
    }

    public function addData($data)
    {
        return DB::table('tbl_catatan')->insert($data);
    }

    public function editData($id_catatan, $data)
    {
        return DB::table('tbl_catatan')->where('id_catatan', $id_catatan)->update($data);
    }
    
    public function deleteData($id_catatan)
    {
        return DB::table('tbl_catatan')->where('id_catatan', $id_catatan)->delete();
    }
}
