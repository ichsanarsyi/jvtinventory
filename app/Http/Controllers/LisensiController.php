<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LisensiModel;

class LisensiController extends Controller
{
    public function __construct()
    {
        $this->LisensiModel = new LisensiModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'lisensi' => $this->LisensiModel->allData()
        ];
        return view('software.v_lisensi', $data);
    }

    public function insert()
    {
        Request()->validate([
            'jenis_lisensi' => 'required'
        ],[
            'jenis_lisensi.required' => 'Jenis Lisensi wajib diisi'
        ]);
        
        $data=[
            'jenis_lisensi' => Request()->jenis_lisensi    
        ];
        
        $this->LisensiModel->addData($data);
        return redirect()->route('lisensi')->with('pesan', 'Data berhasil ditambahkan.');

    }

    public function update($id_jenis_lisensi)
    {
        Request()->validate([
            'jenis_lisensi' => 'required'
        ],[
            'jenis_lisensi.required' => 'Jenis Lisensi wajib diisi'
        ]);
        
        $data=[
            'jenis_lisensi' => Request()->jenis_lisensi    
        ];
        
        $this->LisensiModel->editData($id_jenis_lisensi, $data);       
        return redirect()->route('lisensi')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_jenis_lisensi)
    {
        $this->LisensiModel->deleteData($id_jenis_lisensi);
        return redirect()->route('lisensi')->with('pesan', 'Data berhasil dihapus.');
    }
}
