<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class JenisIkanExport implements FromCollection, WithHeadings, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('jenisikan')
                ->selectRaw('jenis_ikan, kode_fao, jenis_perairan, hias, kelompok, kelompok_besar')
                ->get();
    }

    public function headings(): array
    {
        return [
            'Nama Ikan',
            'Kode FAO',
            'Jenis Perairan',
            'Hias',
            'Kelompok',
            'Kelompok Besar',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 30,
            'F' => 30,
        ];
    }
}
