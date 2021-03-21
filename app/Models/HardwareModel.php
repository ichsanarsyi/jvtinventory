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
        ->leftJoin('tbl_staff', 'tbl_staff.id_staff', '=', 'tbl_hardware.id_staff')
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
        ->leftJoin('tbl_staff', 'tbl_staff.id_staff', '=', 'tbl_hardware.id_staff')
        ->leftJoin('hardware_day_left', 'hardware_day_left.id_hw', '=', 'tbl_hardware.id_hw')
        ->where('tbl_hardware.id_hw', $id_hw)->first();
    }
    
    public function allMerk()
    {
        return DB::table('tbl_merk_hw')->get();
    }

    public function allKategori()
    {
        return DB::table('tbl_kategori_hw')->get();
    }

    public function allLokasi()
    {
        return DB::table('tbl_lokasi')->get();
    }

    public function allKondisi()
    {
        return DB::table('tbl_kondisi')->get();
    }

    public function allDepartemen()
    {
        return DB::table('tbl_departemen')->get();
    }

    public function allstaff()
    {
        return DB::table('tbl_staff')->get();
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
    
    public function dayLeftData($id_hw)
    {
        return DB::table('hardware_day_left')->get();
    }
}
