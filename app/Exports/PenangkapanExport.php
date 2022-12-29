<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class PenangkapanExport implements FromCollection, WithHeadings, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'Jenis Kapal',
            'Alat Penangkap Ikan',
            'Nama Ikan',
            'Jenis Perairan',
            'Nilai Harga Satuan / Kg',
            'Produksi',
            'Nilai',
            'Enumerator',
            'User',
            'Waktu'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 20,
            'D' => 20,
            'E' => 20,
            'F' => 30,
            'G' => 40,
            'H' => 40,
            'I' => 40,
            'J' => 40,

        ];
    }

    public function collection()
    {
        return DB::table('penangkapan')
                        ->select('jeniskapal.jenis_kapal','jenis_alat_penangkap.alat_penangkap','jenisikan.jenis_ikan','jenisikan.jenis_perairan','penangkapan.jumlah_tangkapan','penangkapan.produksi','penangkapan.nilai','enumerator.enumerator','users.nama','penangkapan.created_at')
                        ->leftJoin('users','penangkapan.user_id','=','users.id')
                        ->leftJoin('wilayah_kerja','users.id','=','wilayah_kerja.user_id')
                        ->leftJoin('kecamatan','wilayah_kerja.kecamatan_id','=','kecamatan.id')
                        ->leftJoin('jenis_alat_penangkap','penangkapan.jenis_alat_penangkap_id','=','jenis_alat_penangkap.id')
                        ->leftJoin('jenisikan','penangkapan.jenisikan_id','=','jenisikan.id')
                        ->leftJoin('jeniskapal','penangkapan.jeniskapal_id','=','jeniskapal.id')
                        ->leftJoin('enumerator_user','enumerator_user.user_id','=','users.id')
                        ->leftJoin('enumerator','enumerator_user.enumerator_id','=','enumerator.id')
                        ->get();
    }
}
