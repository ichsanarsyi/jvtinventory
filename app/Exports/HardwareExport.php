<?php

namespace App\Exports;

use App\Models\HardwareModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

//styling excel lewat sini tidak berfungsi

class HardwareExport implements FromView
{
    public function view(): View
    {
        $hardware = new HardwareModel();

        return view('hardware.v_excelhw', [
            'hardware' => $hardware->allData()
        ]);
    }
}
