<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DepartemenModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_departemen')
        ->get();
    }

    public function addData($data)
    {
        return DB::table('tbl_departemen')->insert($data);
    }

    public function editData($id_departemen, $data)
    {
        return DB::table('tbl_departemen')->where('id_departemen', $id_departemen)->update($data);
    }
    
    public function deleteData($id_departemen)
    {
        return DB::table('tbl_departemen')->where('id_departemen', $id_departemen)->delete();
    }
}
