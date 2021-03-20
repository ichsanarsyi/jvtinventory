<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->User = new User();
        $this->UserModel = new UserModel();
        $this->middleware('auth');
    }

    public function index()
    {   
        $data = [
            'user' => $this->UserModel->allData()
        ];
        return view('user.v_user', $data);
        return view('v_register', $data);
    }

    public $timestamps = true;
    public function update($id)
    {
        
        Request()->validate([
            'name' => 'required',
            'email' => 'required'
        ],[
            'name.required' => 'Nama User wajib diisi',
            'email.required' => 'Email User wajib diisi',
        ]);
        
        $data=[
            'name' => Request()->name,    
            'email' => Request()->email,
            'level' => Request()->level,
        ];

        $this->UserModel->editData($id, $data);       
        return redirect()->route('user')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id)
    {
        $this->UserModel->deleteData($id);
        return redirect()->route('user')->with('pesan', 'Data berhasil dihapus.');
    }
}
