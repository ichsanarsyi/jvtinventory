<?php

namespace App\Http\Controllers;

use App\Models\KategorihwModel;
use Illuminate\Http\Request;

class KategorihwController extends Controller
{
    public function __construct()
    {
        $this->KategorihwModel = new KategorihwModel();
    }

    public function index()
    {
        $data = [
            'kategorihw' => $this->KategorihwModel->allData()
        ];
        return view('hardware.v_kategorihw', $data);
    }

    public function insert()
    {
        Request()->validate([
            'nama_kategori_hw' => 'required'
        ],[
            'nama_kategori_hw.required' => 'Kategori Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_kategori_hw' => Request()->nama_kategori_hw    
        ];
        
        $this->KategorihwModel->addData($data);
        return redirect()->route('kategorihw')->with('pesan', 'Data berhasil ditambahkan.');

    }

    public function update($id_kategori)
    {
        Request()->validate([
            'nama_kategori_hw' => 'required'
        ],[
            'nama_kategori_hw.required' => 'Kategori Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_kategori_hw' => Request()->nama_kategori_hw    
        ];
        
        $this->KategorihwModel->editData($id_kategori, $data);       
        return redirect()->route('kategorihw')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_kategori)
    {
        $this->KategorihwModel->deleteData($id_kategori);
        return redirect()->route('kategorihw')->with('pesan', 'Data berhasil dihapus.');
    }
}
