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

    public function allHardware($id_kategori_hw5,$id_kategori_hw6)
    {
        return DB::table('tbl_hardware')
        ->select('*', DB::raw('IFNULL( tbl_hardware.kode_asset, "-") as kode_asset'),
        DB::raw('IFNULL( tbl_hardware.seri_hw, "-") as seri_hw'))
        ->leftJoin('tbl_merk_hw', 'tbl_merk_hw.id_merk_hw', '=', 'tbl_hardware.id_merk_hw')
        ->leftJoin('tbl_kategori_hw', 'tbl_kategori_hw.id_kategori_hw', '=', 'tbl_hardware.id_kategori_hw')
        ->leftJoin('tbl_lokasi', 'tbl_lokasi.id_lokasi', '=', 'tbl_hardware.id_lokasi')
        ->leftJoin('tbl_kondisi', 'tbl_kondisi.id_kondisi', '=', 'tbl_hardware.id_kondisi')
        ->leftJoin('tbl_departemen', 'tbl_departemen.id_departemen', '=', 'tbl_hardware.id_departemen')
        ->leftJoin('tbl_staff', 'tbl_staff.id_staff', '=', 'tbl_hardware.id_staff')
        ->leftJoin('hardware_day_left', 'hardware_day_left.id_hw', '=', 'tbl_hardware.id_hw')
        ->where('tbl_hardware.id_kategori_hw',$id_kategori_hw5)
        ->orWhere('tbl_hardware.id_kategori_hw',$id_kategori_hw6)
        ->get();
    }

    public function allMerkHw($id_merk_hw)
    {
        return DB::table('tbl_merk_hw')
        ->select('nama_merk_hw')
        ->where('tbl_merk_hw.id_merk_hw',$id_merk_hw)
        ->first();
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
