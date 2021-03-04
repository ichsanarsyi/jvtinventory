<?php

namespace App\Http\Controllers;

use App\Models\MerkhwModel;
use Illuminate\Http\Request;

class MerkhwController extends Controller
{
    public function __construct()
    {
        $this->MerkhwModel = new MerkhwModel();
    }

    public function index()
    {
        $data = [
            'merkhw' => $this->MerkhwModel->allData()
        ];
        return view('hardware.v_merkhw', $data);
    }

    public function insert()
    {
        Request()->validate([
            'nama_merk_hw' => 'required'
        ],[
            'nama_merk_hw.required' => 'Merk Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_merk_hw' => Request()->nama_merk_hw    
        ];
        
        $this->MerkhwModel->addData($data);
        return redirect()->route('merkhw')->with('pesan', 'Data berhasil ditambahkan.');

    }

    public function update($id_merk_sw)
    {
        Request()->validate([
            'nama_merk_hw' => 'required'
        ],[
            'nama_merk_hw.required' => 'Merk Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_merk_hw' => Request()->nama_merk_hw    
        ];
        
        $this->MerkhwModel->editData($id_merk_sw, $data);       
        return redirect()->route('merkhw')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_merk_sw)
    {
        $this->MerkhwModel->deleteData($id_merk_sw);
        return redirect()->route('merkhw')->with('pesan', 'Data berhasil dihapus.');
    }
}
