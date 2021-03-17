<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserModel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->User = new User();
        $this->middleware('auth');
    }

    public function indexAdmin()
    {   
        $this->UserModel = new UserModel();
        $data = [
            'user' => $this->UserModel->allDataAdmin()
        ];
        return view('user.v_user', $data);
    }
    public function indexUser()
    {   
        $this->UserModel = new UserModel();
        $data = [
            'user' => $this->UserModel->allDataUser()
        ];
        return view('user.v_user', $data);
    }
}
