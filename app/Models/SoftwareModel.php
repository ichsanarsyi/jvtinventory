<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SoftwareModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_software')
        ->select('*','tbl_software.nama_sw AS nama_sw', 'tbl_software.id_sw AS id_sw')
        ->leftJoin('tbl_merk_sw', 'tbl_merk_sw.id_merk_sw', '=', 'tbl_software.id_merk_sw')
        ->leftJoin('tbl_jenis_lisensi', 'tbl_jenis_lisensi.id_jenis_lisensi', '=', 'tbl_software.id_jenis_lisensi')
        ->leftJoin('tbl_hardware', 'tbl_hardware.id_hw', '=', 'tbl_software.id_hw')
        ->leftJoin('software_day_left', 'software_day_left.id_sw', '=', 'tbl_software.id_sw')
        ->get();
    }

    public function detailData($id_sw)
    {
        return DB::table('tbl_software')
        ->select('*','tbl_software.nama_sw AS nama_sw', 'tbl_software.id_sw AS id_sw')
        ->leftJoin('tbl_merk_sw', 'tbl_merk_sw.id_merk_sw', '=', 'tbl_software.id_merk_sw')
        ->leftJoin('tbl_jenis_lisensi', 'tbl_jenis_lisensi.id_jenis_lisensi', '=', 'tbl_software.id_jenis_lisensi')
        ->leftJoin('tbl_hardware', 'tbl_hardware.id_hw', '=', 'tbl_software.id_hw')
        ->leftJoin('software_day_left', 'software_day_left.id_sw', '=', 'tbl_software.id_sw')
        ->where('tbl_software.id_sw', $id_sw)->first();
    }
    
        
    public function logData()
    {
        return DB::table('log_software')
        ->select('*','log_software.id_sw_lama','tbl_software.nama_sw AS nama_sw')
        ->leftJoin('tbl_software', 'tbl_software.id_sw', '=', 'log_software.id_sw_lama')
        ->get();
    }

    public function allMerk()
    {
        return DB::table('tbl_merk_sw')->get();
    }

    public function allLisensi()
    {
        return DB::table('tbl_jenis_lisensi')->get();
    }

    public function allHardware()
    {
        return DB::table('tbl_hardware')->get();
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

    public function filterbydate($fromdate, $todate)
    {
        return DB::table('tbl_software')
        ->leftJoin('tbl_merk_sw', 'tbl_merk_sw.id_merk_sw', '=', 'tbl_software.id_merk_sw')
        ->leftJoin('tbl_jenis_lisensi', 'tbl_jenis_lisensi.id_jenis_lisensi', '=', 'tbl_software.id_jenis_lisensi')
        ->leftJoin('tbl_hardware', 'tbl_hardware.id_hw', '=', 'tbl_software.id_hw')
        ->leftJoin('software_day_left', 'software_day_left.id_sw', '=', 'tbl_software.id_sw')
        // ->select()
        ->where('tgl_pembelian', '>=', $fromdate)
        ->where('tgl_pembelian', '<=', $todate)
        ->get();
    }
}
