<?php

namespace App\Http\Controllers;

use App\Models\LokasiModel;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function __construct()
    {
        $this->LokasiModel = new LokasiModel();
    }

    public function index()
    {
        $data = [
            'lokasi' => $this->LokasiModel->allData()
        ];
        return view('hardware.v_lokasi', $data);
    }

    public function insert()
    {
        Request()->validate([
            'nama_lokasi' => 'required'
        ],[
            'nama_lokasi.required' => 'Lokasi Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_lokasi' => Request()->nama_lokasi    
        ];
        
        $this->LokasiModel->addData($data);
        return redirect()->route('lokasi')->with('pesan', 'Data berhasil ditambahkan.');

    }

    public function update($id_lokasi)
    {
        Request()->validate([
            'nama_lokasi' => 'required'
        ],[
            'nama_lokasi.required' => 'Lokasi Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_lokasi' => Request()->nama_lokasi    
        ];
        
        $this->LokasiModel->editData($id_lokasi, $data);       
        return redirect()->route('lokasi')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_lokasi)
    {
        $this->LokasiModel->deleteData($id_lokasi);
        return redirect()->route('lokasi')->with('pesan', 'Data berhasil dihapus.');
    }
}
