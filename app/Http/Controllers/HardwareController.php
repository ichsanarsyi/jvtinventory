<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\HardwareModel;
use App\Exports\HardwareExport;
use App\Exports\HardwareLogExport;

use PDF;
use Excel;

class HardwareController extends Controller
{
    public function __construct()
    {
        $this->HardwareModel = new HardwareModel();
        $this->middleware('auth');
    }
    
    public function index()
     {
         $data = [
            'hardware' => $this->HardwareModel->allData()
         ];
         return view('hardware.v_hardware', $data);
    }

    public function detail($id_hw)
    {
        if (!$this->HardwareModel->detailData($id_hw))
        {
            abort(404);
        }
        $data = [
            'hardware' => $this->HardwareModel->detailData($id_hw)
        ];
        return view('hardware.v_detailhw', $data);
    }

    public function detailLog()
    {
        $datalama = $this->HardwareModel->logDataLama();
        $databaru = $this->HardwareModel->logDataBaru();

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
        return view('hardware.v_loghw')
        ->with('loghardware',$results);
    }
    
    public function add()
    {
        $data = [
            'merk' => $this->HardwareModel->allMerk(),
            'kategori' => $this->HardwareModel->allKategori(),
            'kondisi' => $this->HardwareModel->allKondisi(),
            'lokasi' => $this->HardwareModel->allLokasi(),
            'departemen' => $this->HardwareModel->allDepartemen(),
            'staff' => $this->HardwareModel->allstaff()
        ];
        return view('hardware.v_addhw', $data);
    }
    
    public function insert()
    {
        Request()->validate([
            'nama_hw' => 'required',
            'id_merk_hw' => 'required',
            // 'seri_hw' => 'required',
            'id_kategori_hw' => 'required',
            //'kode_asset' => 'required',
            //'id_kondisi' => 'required',
            // 'harga_hw' => 'required',
            // 'id_lokasi' => 'required',
            // 'id_departemen' => 'required',
            'tgl_beli_hw' => 'required',
            'tgl_batas_garansi' => 'required',
            //'deskripsi_hw' => 'required',
            'id_staff' => 'required'
        ],[
            'nama_hw.required' => 'Nama Hardware wajib diisi',
            'id_merk_hw.required' => 'Merk Hardware wajib diisi',
            'seri_hw.required' => 'Seri Hardware wajib diisi',
            'id_kategori_hw.required' => 'Kategori wajib diisi',
            'harga_hw.required' => 'Harga Hardware wajib diisi',
            'harga_hw.numeric' => 'Harga Hardware berupa angka',
            'lokasi.required' => 'Lokasi wajib diisi',
            'departemen.required' => 'Departemen wajib diisi',
            'tgl_beli_hw.required' => 'Tanggal Beli Hardware wajib diisi',
            'tgl_batas_garansi.required' => 'Tanggal Batas Garansi Hardware wajib diisi',
            'id_staff.required' => 'staff wajib diisi'
        ]);
        
        $data=[
            'nama_hw' => Request()->nama_hw,
            'id_merk_hw' => Request()->id_merk_hw,
            'seri_hw' => Request()->seri_hw,
            'id_kategori_hw' => Request()->id_kategori_hw,
            'kode_asset' => Request()->kode_asset,
            'id_kondisi' => Request()->id_kondisi,
            'harga_hw' => Request()->harga_hw,
            'id_lokasi' => Request()->id_lokasi,
            'id_departemen' => Request()->id_departemen,
            'tgl_beli_hw' => Request()->tgl_beli_hw,
            'tgl_batas_garansi' => Request()->tgl_batas_garansi,
            'id_staff' => Request()->id_staff            
        ];
        
        $this->HardwareModel->addData($data);
        return redirect()->route('hardware')->with('pesan', 'Data berhasil ditambahkan.');

    }
    
    public function edit($id_hw)
    {
        if (!$this->HardwareModel->detailData($id_hw))
        {
            abort(404);
        }
        $data = [
            'hardware' => $this->HardwareModel->detailData($id_hw),
            'merk' => $this->HardwareModel->allMerk(),
            'kategori' => $this->HardwareModel->allKategori(),
            'kondisi' => $this->HardwareModel->allKondisi(),
            'lokasi' => $this->HardwareModel->allLokasi(),
            'departemen' => $this->HardwareModel->allDepartemen(),
            'staff' => $this->HardwareModel->allstaff()
        ];
        return view('hardware.v_edithw', $data);
    }
    
    public function update($id_hw)
    {
        Request()->validate([
            'nama_hw' => 'required',
            //'id_merk_hw' => 'required',
            // 'seri_hw' => 'required',
            'id_kategori_hw' => 'required',
            //'kode_asset' => 'required',
            //'id_kondisi' => 'required',
            'harga_hw' => 'required',
            //'id_lokasi' => 'required',
            //'id_departemen' => 'required',
            'tgl_beli_hw' => 'required',
            'tgl_batas_garansi' => 'required',
            //'deskripsi_hw' => 'required',
            //'id_staff' => 'required'
        ],[
            'nama_hw.required' => 'Nama Hardware wajib diisi',
            'seri_hw.required' => 'Seri Hardware wajib diisi',
            //'kode_asset.required' => 'Kode Asset Hardware wajib diisi',
            'harga_hw.required' => 'Harga Hardware wajib diisi',
            'harga_hw.numeric' => 'Harga Hardware berupa angka',
            'tgl_beli_hw.required' => 'Tanggal Beli Hardware wajib diisi',
            'tgl_batas_garansi.required' => 'Tanggal Batas Garansi Hardware wajib diisi',
            //'deskripsi_hw.required' => 'Tanggal Batas Garansi Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_hw' => Request()->nama_hw,
            'id_merk_hw' => Request()->id_merk_hw,
            'seri_hw' => Request()->seri_hw,
            'id_kategori_hw' => Request()->id_kategori_hw,
            'kode_asset' => Request()->kode_asset,
            'id_kondisi' => Request()->id_kondisi,
            'harga_hw' => Request()->harga_hw,
            'id_lokasi' => Request()->id_lokasi,
            'id_departemen' => Request()->id_departemen,
            'tgl_beli_hw' => Request()->tgl_beli_hw,
            'tgl_batas_garansi' => Request()->tgl_batas_garansi,
            'id_staff' => Request()->id_staff       
        ];
        
        $this->HardwareModel->editData($id_hw, $data);       
        return redirect()->route('hardware')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_hw)
    {
        $this->HardwareModel->deleteData($id_hw);
        return redirect()->route('hardware')->with('pesan', 'Data berhasil dihapus.');
    }

    public function print()
    {
        $data = [
            'hardware' => $this->HardwareModel->allData(),
            'merk' => $this->HardwareModel->allMerk(),
            'kategori' => $this->HardwareModel->allKategori(),
            'kondisi' => $this->HardwareModel->allKondisi(),
            'lokasi' => $this->HardwareModel->allLokasi(),
            'departemen' => $this->HardwareModel->allDepartemen(),
            'staff' => $this->HardwareModel->allstaff()
        ];
        return view('hardware.v_printhw', $data);
    }
    
    public function savepdf()
    {
        $data = [
            'hardware' => $this->HardwareModel->allData(),
            'merk' => $this->HardwareModel->allMerk(),
            'kategori' => $this->HardwareModel->allKategori(),
            'kondisi' => $this->HardwareModel->allKondisi(),
            'lokasi' => $this->HardwareModel->allLokasi(),
            'departemen' => $this->HardwareModel->allDepartemen(),
            'staff' => $this->HardwareModel->allstaff()
        ];

        set_time_limit(300);
        $pdf = PDF::loadView('hardware.v_pdfhw', $data)->setPaper('A4','landscape')
        ;
        return $pdf->stream();
    }

    public function saveexcel()
    {
        return Excel::download(new HardwareExport,'DaftarHardware.xlsx');
    }

    public function printlog()
    {
        $datalama = $this->HardwareModel->logDataLama();
        $databaru = $this->HardwareModel->logDataBaru();

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
        return view('hardware.v_printloghw')->with('loghardware',$results);       
    }
    
    public function savepdflog()
    {
        $datalama = $this->HardwareModel->logDataLama();
        $databaru = $this->HardwareModel->logDataBaru();

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

        set_time_limit(300);
        $pdf = PDF::loadView('hardware.v_pdfloghw', array(
            'loghardware' => $results,
        ))
        ->setPaper('A4','landscape');
        return $pdf->stream();
    }

    public function saveexcellog()
    {
        return Excel::download(new HardwareLogExport,'LogPerubahanHardware.xlsx');
    }

}  
