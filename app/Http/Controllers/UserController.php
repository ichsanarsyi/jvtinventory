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

    public function insert()
    {
        Request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'level' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
                'name.required' => 'Nama wajib diisi',
                'email.required' => 'Email wajib diisi',
                'level.required' => 'Level wajib diisi',
                'password.required' => 'Password wajib diisi',
                'password.confirmed' => 'Password tidak cocok',
                ]);
                
                $data=[
                    'name' => Request()->name,    
                    'email' => Request()->email,    
                    'password' => Hash::make(Request()->email), 
                    'level' => Request()->level,  
                ];

                $this->UserModel->addData($data);
                return redirect()->route('user')->with('pesan', 'Data berhasil ditambahkan.');
    }

    public $timestamps = true;
    public function update($id)
    {
        
        Request()->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Nama User wajib diisi'
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
