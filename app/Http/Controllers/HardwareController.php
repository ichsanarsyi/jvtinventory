<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HardwareModel;

class HardwareController extends Controller
{
    public function __construct()
    {
        $this->HardwareModel = new HardwareModel();
    }
    
    public function atWorkstations()
    {
        $data = [
            'workstations' => $this->HardwareModel->workstations()
        ];
        return view('hardware.v_workstations', $data);
    }
    
    public function detail($id_hw)
    {
        if (!$this->HardwareModel->detailData($id_hw))
        {
            abort(404);
        }
        $data = [
            'hardware' => $this->HardwareModel->detailData($id_hw)
        ];
        return view('hardware.v_detailhw', $data);
    }
    
    public function add()
    {
        return view('hardware.v_addhw');
    }
}
