<?php

namespace App\Exports;

use App\Models\SoftwareModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
//styling excel lewat sini tidak berfungsi

class SoftwareLogExport implements FromView
{
    public function view(): View
    {
        $logsoftware = new SoftwareModel();

        return view('software.v_excellogsw', [
            'logsoftware' => $logsoftware->logData()
        ]);
    }
}