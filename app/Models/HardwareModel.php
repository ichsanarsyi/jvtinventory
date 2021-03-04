<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HardwareModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_hardware')
        ->leftJoin('tbl_merk_hw', 'tbl_merk_hw.id_merk_hw', '=', 'tbl_hardware.id_merk_hw')
        ->leftJoin('tbl_kategori_hw', 'tbl_kategori_hw.id_kategori_hw', '=', 'tbl_hardware.id_kategori_hw')
        ->leftJoin('tbl_lokasi', 'tbl_lokasi.id_lokasi', '=', 'tbl_hardware.id_lokasi')
        ->leftJoin('tbl_kondisi', 'tbl_kondisi.id_kondisi', '=', 'tbl_hardware.id_kondisi')
        ->leftJoin('tbl_departemen', 'tbl_departemen.id_departemen', '=', 'tbl_hardware.id_departemen')
        ->leftJoin('tbl_pemakai', 'tbl_pemakai.id_pemakai', '=', 'tbl_hardware.id_pemakai')
        ->get();
    }
    
    public function detailData($id_hw)
    {
        return DB::table('tbl_hardware')
        ->leftJoin('tbl_merk_hw', 'tbl_merk_hw.id_merk_hw', '=', 'tbl_hardware.id_merk_hw')
        ->leftJoin('tbl_kategori_hw', 'tbl_kategori_hw.id_kategori_hw', '=', 'tbl_hardware.id_kategori_hw')
        ->leftJoin('tbl_lokasi', 'tbl_lokasi.id_lokasi', '=', 'tbl_hardware.id_lokasi')
        ->leftJoin('tbl_kondisi', 'tbl_kondisi.id_kondisi', '=', 'tbl_hardware.id_kondisi')
        ->leftJoin('tbl_departemen', 'tbl_departemen.id_departemen', '=', 'tbl_hardware.id_departemen')
        ->leftJoin('tbl_pemakai', 'tbl_pemakai.id_pemakai', '=', 'tbl_hardware.id_pemakai')
        ->where('id_hw', $id_hw)->first();
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
