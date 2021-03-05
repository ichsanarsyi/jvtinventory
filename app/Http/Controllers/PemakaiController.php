<?php

namespace App\Http\Controllers;

use App\Models\PemakaiModel;
use Illuminate\Http\Request;

class PemakaiController extends Controller
{
    public function __construct()
    {
        $this->PemakaiModel = new PemakaiModel();
    }

    public function index()
    {
        $data = [
            'pemakai' => $this->PemakaiModel->allData()
        ];
        return view('hardware.v_pemakai', $data);
    }

    public function insert()
    {
        Request()->validate([
            'nama_pemakai' => 'required'
        ],[
            'nama_pemakai.required' => 'Pemakai Hardware wajib diisi',
            'no_telp_pemakai.required' => 'Nomor Telepon Pemakai wajib diisi'
        ]);
        
        $data=[
            'nama_pemakai' => Request()->nama_pemakai,
            'no_telp_pemakai' => Request()->no_telp_pemakai  
        ];
        
        $this->PemakaiModel->addData($data);
        return redirect()->route('pemakai')->with('pesan', 'Data berhasil ditambahkan.');

    }

    public function update($id_pemakai)
    {
        Request()->validate([
            'nama_pemakai' => 'required',
            'no_telp_pemakai' => 'required'
        ],[
            'nama_pemakai.required' => 'Pemakai Hardware wajib diisi',
            'no_telp_pemakai.required' => 'Nomor Telepon Pemakai wajib diisi'
        ]);
        
        $data=[
            'nama_pemakai' => Request()->nama_pemakai,
            'no_telp_pemakai' => Request()->no_telp_pemakai
        ];
        
        $this->PemakaiModel->editData($id_pemakai, $data);       
        return redirect()->route('pemakai')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_pemakai)
    {
        $this->PemakaiModel->deleteData($id_pemakai);
        return redirect()->route('pemakai')->with('pesan', 'Data berhasil dihapus.');
    }
}
