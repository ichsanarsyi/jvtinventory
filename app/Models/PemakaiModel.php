<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PemakaiModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_pemakai')->get();
    }

    public function addData($data)
    {
        return DB::table('tbl_pemakai')->insert($data);
    }

    public function editData($id_pemakai, $data)
    {
        return DB::table('tbl_pemakai')->where('id_pemakai', $id_pemakai)->update($data);
    }
    
    public function deleteData($id_pemakai)
    {
        return DB::table('tbl_pemakai')->where('id_pemakai', $id_pemakai)->delete();
    }
}
