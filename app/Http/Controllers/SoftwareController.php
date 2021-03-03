<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoftwareModel;

class SoftwareController extends Controller
{
    // public function __construct()
    // {
    //     $this->SoftwareModel = new SoftwareModel();
    // }

    public function index()
    {
        // $data = [
        //     'software' => $this->SoftwareModel->allData()
        // ];
        return view('software.v_software');
    }
}
