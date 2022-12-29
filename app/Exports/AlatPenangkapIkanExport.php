<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AlatPenangkapIkanExport implements FromCollection, WithHeadings, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('jenis_alat_penangkap')
                ->selectRaw('alat_penangkap, kelompok')
                ->get();
    }

    public function headings(): array
    {
        return [
            'Alat Penangkap Ikan',
            'Kelompok',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,
        ];
    }
}
