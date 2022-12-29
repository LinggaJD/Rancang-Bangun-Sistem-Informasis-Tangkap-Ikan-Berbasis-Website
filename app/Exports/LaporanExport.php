<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class LaporanExport implements FromCollection, WithHeadings, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('laporan')
                ->selectRaw('users.nama,users.email,users.username,kecamatan.kecamatan, laporan.laporan, laporan.created_at as laporan_waktu')
                ->leftJoin('users','laporan.user_id','users.id')
                ->leftJoin('wilayah_kerja','users.id','wilayah_kerja.user_id')
                ->leftJoin('kecamatan','wilayah_kerja.kecamatan_id','kecamatan.id')
                ->orderByDesc('laporan.created_at')
                ->get();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'Username',
            'Wilayah',
            'Laporan',
            'Waktu',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 60,
            'F' => 30,
        ];
    }
}
