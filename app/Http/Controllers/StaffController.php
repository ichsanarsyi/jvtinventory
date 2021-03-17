<?php

namespace App\Http\Controllers;

use App\Models\StaffModel;
use Illuminate\Http\Request;

class staffController extends Controller
{
    public function __construct()
    {
        $this->StaffModel = new StaffModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'staff' => $this->StaffModel->allData()
        ];
        return view('hardware.v_staff', $data);
    }

    public function insert()
    {
        Request()->validate([
            'nama_staff' => 'required'
        ],[
            'nama_staff.required' => 'staff Hardware wajib diisi',
            'no_telp_staff.required' => 'Nomor Telepon staff wajib diisi'
        ]);
        
        $data=[
            'nama_staff' => Request()->nama_staff,
            'no_telp_staff' => Request()->no_telp_staff  
        ];
        
        $this->StaffModel->addData($data);
        return redirect()->route('staff')->with('pesan', 'Data berhasil ditambahkan.');

    }

    public function update($id_staff)
    {
        Request()->validate([
            'nama_staff' => 'required',
            'no_telp_staff' => 'required'
        ],[
            'nama_staff.required' => 'staff Hardware wajib diisi',
            'no_telp_staff.required' => 'Nomor Telepon staff wajib diisi'
        ]);
        
        $data=[
            'nama_staff' => Request()->nama_staff,
            'no_telp_staff' => Request()->no_telp_staff
        ];
        
        $this->StaffModel->editData($id_staff, $data);       
        return redirect()->route('staff')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_staff)
    {
        $this->StaffModel->deleteData($id_staff);
        return redirect()->route('staff')->with('pesan', 'Data berhasil dihapus.');
    }
}
