<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MerkswModel;

class MerkswController extends Controller
{
    public function __construct()
    {
        $this->MerkswModel = new MerkswModel();
    }

    public function index()
    {
        $data = [
            'merksw' => $this->MerkswModel->allData()
        ];
        return view('merksw.v_merksw', $data);
    }

    public function insert()
    {
        Request()->validate([
            'nama_merk_sw' => 'required'
        ],[
            'nama_merk_sw.required' => 'Merk Software wajib diisi'
        ]);
        
        $data=[
            'nama_merk_sw' => Request()->nama_merk_sw    
        ];
        
        $this->MerkswModel->addData($data);
        return redirect()->route('merksw')->with('pesan', 'Data berhasil ditambahkan.');

    }

    public function update($id_merk_sw)
    {
        Request()->validate([
            'nama_merk_sw' => 'required'
        ],[
            'nama_merk_sw.required' => 'Merk Software wajib diisi'
        ]);
        
        $data=[
            'nama_merk_sw' => Request()->nama_merk_sw    
        ];
        
        $this->MerkswModel->editData($id_merk_sw, $data);       
        return redirect()->route('merksw')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_merk_sw)
    {
        $this->MerkswModel->deleteData($id_merk_sw);
        return redirect()->route('merksw')->with('pesan', 'Data berhasil dihapus.');
    }
}
