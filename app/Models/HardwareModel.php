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
        ->select('*', DB::raw('IFNULL( tbl_hardware.kode_asset, "-") as kode_asset'),
        DB::raw('IFNULL( tbl_hardware.seri_hw, "-") as seri_hw'))
        ->leftJoin('tbl_merk_hw', 'tbl_merk_hw.id_merk_hw', '=', 'tbl_hardware.id_merk_hw')
        ->leftJoin('tbl_kategori_hw', 'tbl_kategori_hw.id_kategori_hw', '=', 'tbl_hardware.id_kategori_hw')
        ->leftJoin('tbl_lokasi', 'tbl_lokasi.id_lokasi', '=', 'tbl_hardware.id_lokasi')
        ->leftJoin('tbl_kondisi', 'tbl_kondisi.id_kondisi', '=', 'tbl_hardware.id_kondisi')
        ->leftJoin('tbl_departemen', 'tbl_departemen.id_departemen', '=', 'tbl_hardware.id_departemen')
        ->leftJoin('tbl_staff', 'tbl_staff.id_staff', '=', 'tbl_hardware.id_staff')
        ->leftJoin('hardware_day_left', 'hardware_day_left.id_hw', '=', 'tbl_hardware.id_hw')
        ->get();
        
    }
    
    public function logDataLama()
    {
        return DB::table('log_hardware')
        ->select('*'
        ,'log_hardware.id_hw_lama'
        ,'tbl_hardware.nama_hw AS nama_hw'
        ,'tbl_lokasi.nama_lokasi AS nama_lokasi_lama'
        ,'tbl_departemen.nama_departemen AS nama_departemen_lama'
        ,'tbl_staff.nama_staff AS nama_staff_lama'
        ,'tgl_batas_garansi_lama'
        ,'tgl_batas_garansi_baru')
        ->leftJoin('tbl_hardware', 'tbl_hardware.id_hw', '=', 'log_hardware.id_hw_lama')
        ->leftJoin('tbl_merk_hw', 'tbl_merk_hw.id_merk_hw', '=', 'tbl_hardware.id_merk_hw')
        ->leftJoin('tbl_lokasi', 'tbl_lokasi.id_lokasi', '=', 'log_hardware.id_lokasi_lama')
        ->leftJoin('tbl_departemen', 'tbl_departemen.id_departemen', '=', 'log_hardware.id_departemen_lama')
        ->leftJoin('tbl_staff', 'tbl_staff.id_staff', '=', 'log_hardware.id_staff_lama')
        ->get();
    }
    
    public function logDataBaru()
    {
        return DB::table('log_hardware')
        ->select('tbl_lokasi.nama_lokasi AS nama_lokasi_baru'
        ,'tbl_departemen.nama_departemen AS nama_departemen_baru'
        ,'tbl_staff.nama_staff AS nama_staff_baru')
        ->leftJoin('tbl_lokasi', 'tbl_lokasi.id_lokasi', '=', 'log_hardware.id_lokasi_baru')
        ->leftJoin('tbl_departemen', 'tbl_departemen.id_departemen', '=', 'log_hardware.id_departemen_baru')
        ->leftJoin('tbl_staff', 'tbl_staff.id_staff', '=', 'log_hardware.id_staff_baru')
        ->get();
    }

    public function detailData($id_hw)
    {
        return DB::table('tbl_hardware')
        ->select('*', DB::raw('IFNULL( tbl_hardware.kode_asset, "-") as kode_asset')
        , DB::raw('IFNULL( nama_departemen, "-") as nama_departemen')
        , DB::raw('IFNULL( nama_lokasi, "-") as nama_lokasi')
        , DB::raw('IFNULL( nama_kondisi, "-") as nama_kondisi')
        , DB::raw('IFNULL( tbl_hardware.seri_hw, "-") as seri_hw')
        , DB::raw('IFNULL( tbl_hardware.deskripsi_hw, "- Tidak ada Deskripsi -") as deskripsi_hw'))
        ->leftJoin('tbl_merk_hw', 'tbl_merk_hw.id_merk_hw', '=', 'tbl_hardware.id_merk_hw')
        ->leftJoin('tbl_kategori_hw', 'tbl_kategori_hw.id_kategori_hw', '=', 'tbl_hardware.id_kategori_hw')
        ->leftJoin('tbl_lokasi', 'tbl_lokasi.id_lokasi', '=', 'tbl_hardware.id_lokasi')
        ->leftJoin('tbl_kondisi', 'tbl_kondisi.id_kondisi', '=', 'tbl_hardware.id_kondisi')
        ->leftJoin('tbl_departemen', 'tbl_departemen.id_departemen', '=', 'tbl_hardware.id_departemen')
        ->leftJoin('tbl_staff', 'tbl_staff.id_staff', '=', 'tbl_hardware.id_staff')
        ->leftJoin('hardware_day_left', 'hardware_day_left.id_hw', '=', 'tbl_hardware.id_hw')
        ->where('tbl_hardware.id_hw', $id_hw)->first();
    }

    public function swData($id_hw)
    {
        return DB::table('tbl_software')
        ->select('*','tbl_software.nama_sw AS nama_sw', 'tbl_software.id_sw AS id_sw')
        ->leftJoin('tbl_merk_sw', 'tbl_merk_sw.id_merk_sw', '=', 'tbl_software.id_merk_sw')
        ->leftJoin('tbl_jenis_lisensi', 'tbl_jenis_lisensi.id_jenis_lisensi', '=', 'tbl_software.id_jenis_lisensi')
        ->leftJoin('tbl_hardware', 'tbl_hardware.id_hw', '=', 'tbl_software.id_hw')
        ->leftJoin('software_day_left', 'software_day_left.id_sw', '=', 'tbl_software.id_sw')
        ->where('tbl_software.id_hw', $id_hw)->get();
    }
    
    public function allHardware()
    {
        return DB::table('tbl_hardware')->get();
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
