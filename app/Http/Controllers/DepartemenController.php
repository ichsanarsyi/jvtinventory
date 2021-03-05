<?php

namespace App\Http\Controllers;

use App\Models\DepartemenModel;
use App\Models\LokasiModel;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function __construct()
    {
        $this->DepartemenModel = new DepartemenModel();
    }

    public function index()
    {
        $data = [
            'departemen' => $this->DepartemenModel->allData()
        ];
        return view('hardware.v_departemen', $data);
    }

    public function insert()
    {
        Request()->validate([
            'nama_departemen' => 'required'
        ],[
            'nama_departemen.required' => 'Departemen Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_departemen' => Request()->nama_departemen    
        ];
        
        $this->DepartemenModel->addData($data);
        return redirect()->route('departemen')->with('pesan', 'Data berhasil ditambahkan.');

    }

    public function update($id_departemen)
    {
        Request()->validate([
            'nama_departemen' => 'required'
        ],[
            'nama_departemen.required' => 'Departemen Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_departemen' => Request()->nama_departemen    
        ];
        
        $this->DepartemenModel->editData($id_departemen, $data);       
        return redirect()->route('departemen')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_departemen)
    {
        $this->DepartemenModel->deleteData($id_departemen);
        return redirect()->route('departemen')->with('pesan', 'Data berhasil dihapus.');
    }
}
