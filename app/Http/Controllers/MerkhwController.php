<?php

namespace App\Http\Controllers;

use App\Models\MerkhwModel;
use Illuminate\Http\Request;

class MerkhwController extends Controller
{
    public function __construct()
    {
        $this->MerkhwModel = new MerkhwModel();
        $this->middleware('auth');
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

    public function insert2()
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
        return redirect()->to('hardware/addhw');
    }
    public function insert3()
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
        return redirect()->to('hardware/');
    }

    public function update($id_merk_hw)
    {
        Request()->validate([
            'nama_merk_hw' => 'required'
        ],[
            'nama_merk_hw.required' => 'Merk Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_merk_hw' => Request()->nama_merk_hw    
        ];
        
        $this->MerkhwModel->editData($id_merk_hw, $data);       
        return redirect()->route('merkhw')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_merk_hw)
    {
        $this->MerkhwModel->deleteData($id_merk_hw);
        return redirect()->route('merkhw')->with('pesan', 'Data berhasil dihapus.');
    }
}
