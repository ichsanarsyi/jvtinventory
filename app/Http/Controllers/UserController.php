<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->UserModel = new User();
        $this->middleware('auth');
    }

    public function index()
    {
        // $data = [
        //     'user' => $this->UserModel->allData()
        // ];
        return view('user.v_user');
    }
}
