<?php

namespace App\Http\Controllers;

use App\Models\KondisiModel;
use Illuminate\Http\Request;

class KondisiController extends Controller
{
    public function __construct()
    {
        $this->KondisiModel = new KondisiModel();
    }

    public function index()
    {
        $data = [
            'kondisi' => $this->KondisiModel->allData()
        ];
        return view('hardware.v_kondisi', $data);
    }

    public function insert()
    {
        Request()->validate([
            'nama_kondisi' => 'required'
        ],[
            'nama_kondisi.required' => 'Kondisi Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_kondisi' => Request()->nama_kondisi    
        ];
        
        $this->KondisiModel->addData($data);
        return redirect()->route('kondisi')->with('pesan', 'Data berhasil ditambahkan.');

    }

    public function update($id_kondisi)
    {
        Request()->validate([
            'nama_kondisi' => 'required'
        ],[
            'nama_kondisi.required' => 'Kondisi Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_kondisi' => Request()->nama_kondisi    
        ];
        
        $this->KondisiModel->editData($id_kondisi, $data);       
        return redirect()->route('kondisi')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_kondisi)
    {
        $this->KondisiModel->deleteData($id_kondisi);
        return redirect()->route('kondisi')->with('pesan', 'Data berhasil dihapus.');
    }
}
