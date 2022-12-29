<?php

namespace App\Imports;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;


class ImportJenisIkan implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row) {
            DB::table('jenisikan')->insert([
                'jenis_ikan' => $row[0],
                'kode_fao' => $row[1],
                'jenis_perairan' => $row[2],
                'hias' => $row[3],
                'kelompok' => $row[4],
                'kelompok_besar' => $row[5],
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
