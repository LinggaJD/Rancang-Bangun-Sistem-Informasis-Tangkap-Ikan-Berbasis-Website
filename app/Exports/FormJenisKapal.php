<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class FormJenisKapal implements  WithHeadings, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function headings(): array
    {
        return [
            'Jenis Kapal',
            'Deskripsi Kapal',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 60,
        ];
    }
}
