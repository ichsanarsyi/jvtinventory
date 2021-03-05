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
            'lokasi' => $this->LokasiModel->allData(),
            'departemen' => $this->LokasiModel->allDepartemen()
        ];
        return view('hardware.v_lokasi', $data);
    }

    public function insert()
    {
        Request()->validate([
            'nama_lokasi' => 'required',
            'id_departemen' => 'required'
        ],[
            'nama_lokasi.required' => 'Lokasi Hardware wajib diisi',
            'id_departemen.required' => 'Departemen Hardware wajib dipilih'
        ]);
        
        $data=[
            'nama_lokasi' => Request()->nama_lokasi,
            'id_departemen' => Request()->id_departemen
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
            'nama_lokasi' => Request()->nama_lokasi,
            'id_departemen' => Request()->id_departemen
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
