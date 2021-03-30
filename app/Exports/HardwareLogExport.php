<?php

namespace App\Exports;

use App\Models\HardwareModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
//styling excel lewat sini tidak berfungsi

class HardwareLogExport implements FromView
{
    public function view(): View
    {
        $loghardware = new HardwareModel();

        $datalama = $loghardware->logDataLama();
        $databaru = $loghardware->logDataBaru();

        $databaru=$databaru->toArray();
        $results=array();
        foreach($datalama as $key=>$data)
        {
            $newarr=array();
            $newarr['id_hw_lama']=$data->id_hw_lama;
            $newarr['kode_asset']=$data->kode_asset;
            $newarr['nama_hw']=$data->nama_hw;
            $newarr['nama_merk_hw']=$data->nama_merk_hw;
            $newarr['seri_hw']=$data->seri_hw;
            $newarr['nama_lokasi_lama']=$data->nama_lokasi_lama;
            $newarr['nama_lokasi_baru']=$databaru[$key]->nama_lokasi_baru;
            $newarr['nama_departemen_lama']=$data->nama_departemen_lama;
            $newarr['nama_departemen_baru']=$databaru[$key]->nama_departemen_baru;
            $newarr['tgl_batas_garansi_lama']=$data->tgl_batas_garansi_lama;
            $newarr['tgl_batas_garansi_baru']=$data->tgl_batas_garansi_baru;
            $newarr['nama_staff_lama']=$data->nama_staff_lama;
            $newarr['nama_staff_baru']=$databaru[$key]->nama_staff_baru;
            $newarr['waktu_ubah']=$data->waktu_ubah;
            $results[]=$newarr;
        }
        return view('hardware.v_excelloghw')
        ->with('loghardware',$results);
    }
}