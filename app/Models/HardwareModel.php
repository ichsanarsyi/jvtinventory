<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HardwareModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_hardware')->get();
    }
    
    public function workstations()
    {
        return DB::table('tbl_hardware')->where('kategori', 'workstations')->get();
    }

    public function detailData($id_hw)
    {
        return DB::table('tbl_hardware')->where('id_hw', $id_hw)->first();
    }
    
    public function addData($data)
    {
        return DB::table('tbl_hardware')->insert($data);
    }
    
    public function editData($id_hw, $data)
    {
        return DB::table('tbl_hardware')->where('id_hw', $id_hw)->update($data);
    }
    
    public function deleteData($id_hw)
    {
        return DB::table('tbl_hardware')->where('id_hw', $id_hw)->delete();
    }
}
