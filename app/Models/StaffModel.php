<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StaffModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_staff')->get();
    }

    public function addData($data)
    {
        return DB::table('tbl_staff')->insert($data);
    }

    public function editData($id_staff, $data)
    {
        return DB::table('tbl_staff')->where('id_staff', $id_staff)->update($data);
    }
    
    public function deleteData($id_staff)
    {
        return DB::table('tbl_staff')->where('id_staff', $id_staff)->delete();
    }
}
