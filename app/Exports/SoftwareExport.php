<?php

namespace App\Exports;

use App\Models\SoftwareModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

//styling excel lewat sini tidak berfungsi

class SoftwareExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $software = new SoftwareModel();

        return view('software.v_excelsw', [
            'software' => $software->allData()
        ]);
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:K1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(18);
            },
        ];
    }
}
