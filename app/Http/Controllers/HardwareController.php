<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HardwareModel;

class HardwareController extends Controller
{
    public function __construct()
    {
        $this->HardwareModel = new HardwareModel();
    }
    
    public function atWorkstations()
    {
        $data = [
            'workstations' => $this->HardwareModel->workstations()
        ];
        return view('hardware.v_workstations', $data);
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
    
    public function add()
    {
        return view('hardware.v_addhw');
    }
    
    public function insert()
    {
        Request()->validate([
            'nama_hw' => 'required',
            'merk_hw' => 'required',
            'seri_hw' => 'required',
            'kategori' => 'required',
            'harga_hw' => 'required',
            'lokasi' => 'required',
            'departemen' => 'required',
            'tgl_beli_hw' => 'required',
            'tgl_batas_garansi' => 'required',
            'id_pemakai' => 'required'
        ],[
            'nama_hw.required' => 'Nama Hardware wajib diisi',
            'merk_hw.required' => 'Merk Hardware wajib diisi',
            'seri_hw.required' => 'Seri Hardware wajib diisi',
            'kategori.required' => 'Kategori wajib diisi',
            'harga_hw.required' => 'Harga Hardware wajib diisi',
            'lokasi.required' => 'Lokasi wajib diisi',
            'departemen.required' => 'Departemen wajib diisi',
            'tgl_beli_hw.required' => 'Tanggal Beli Hardware wajib diisi',
            'tgl_batas_garansi.required' => 'Tanggal Batas Garansi Hardware wajib diisi',
            'id_pemakai.required' => 'Pemakai wajib diisi'
        ]);
        
        $data=[
            'nama_hw' => Request()->nama_hw,
            'merk_hw' => Request()->merk_hw,
            'seri_hw' => Request()->seri_hw,
            'kategori' => Request()->kategori,
            'harga_hw' => Request()->harga_hw,
            'lokasi' => Request()->lokasi,
            'departemen' => Request()->departemen,
            'tgl_beli_hw' => Request()->tgl_beli_hw,
            'tgl_batas_garansi' => Request()->tgl_batas_garansi,
            'id_pemakai' => Request()->id_pemakai            
        ];
        
        $this->HardwareModel->addData($data);
        return redirect()->route('workstations')->with('pesan', 'Data berhasil ditambahkan.');

    }
    
    public function edit($id_hw)
    {
        if (!$this->HardwareModel->detailData($id_hw))
        {
            abort(404);
        }
        $data = [
            'hardware' => $this->HardwareModel->detailData($id_hw)
        ];
        return view('hardware.v_edithw', $data);
    }
    
    public function update($id_hw)
    {
        Request()->validate([
            'nama_hw' => 'required',
            'merk_hw' => 'required',
            'seri_hw' => 'required',
            'harga_hw' => 'required',
            'tgl_beli_hw' => 'required',
            'tgl_batas_garansi' => 'required'
        ],[
            'nama_hw.required' => 'Nama Hardware wajib diisi',
            'merk_hw.required' => 'Merk Hardware wajib diisi',
            'seri_hw.required' => 'Seri Hardware wajib diisi',
            'harga_hw.required' => 'Harga Hardware wajib diisi',
            'tgl_beli_hw.required' => 'Tanggal Beli Hardware wajib diisi',
            'tgl_batas_garansi.required' => 'Tanggal Batas Garansi Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_hw' => Request()->nama_hw,
            'merk_hw' => Request()->merk_hw,
            'seri_hw' => Request()->seri_hw,
            'harga_hw' => Request()->harga_hw,
            'tgl_beli_hw' => Request()->tgl_beli_hw,
            'tgl_batas_garansi' => Request()->tgl_batas_garansi     
        ];
        
        $this->HardwareModel->editData($id_hw, $data);       
        return redirect()->route('workstations')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_hw)
    {
        $this->HardwareModel->deleteData($id_hw);
        return redirect()->route('workstations')->with('pesan', 'Data berhasil dihapus.');
    }
    
}  
