<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class JenisKapalExport implements FromCollection, WithHeadings, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('jeniskapal')
                ->selectRaw('jenis_kapal, deskripsi_kapal')
                ->get();
    }

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
