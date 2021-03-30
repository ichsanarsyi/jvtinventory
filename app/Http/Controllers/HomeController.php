<?php

namespace App\Http\Controllers;

use App\Models\HomeModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->HomeModel = new HomeModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'catatan' => $this->HomeModel->allData()
        ];
        return view('v_home', $data);
    }

    public function insert()
    { 
        $data=[
            'judul_catatan' => Request()->judul_catatan,  
            'isi_catatan' => Request()->isi_catatan    
        ];
        
        $this->HomeModel->addData($data);
        return redirect()->to('/home')->with('pesan', 'Catatan berhasil ditambahkan.');

    }

    public function update($id_catatan)
    {
        $data=[
            'judul_catatan' => Request()->judul_catatan,  
            'isi_catatan' => Request()->isi_catatan     
        ];
        
        $this->HomeModel->editData($id_catatan, $data);       
        return redirect()->to('/home')->with('pesan', 'Catatan berhasil diedit.');

    }
    
    public function delete($id_catatan)
    {
        $this->HomeModel->deleteData($id_catatan);
        return redirect()->to('/home')->with('pesan', 'Catatan berhasil dihapus.');
    }
}