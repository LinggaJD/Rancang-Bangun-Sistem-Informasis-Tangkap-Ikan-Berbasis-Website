<?php

namespace App\Imports;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportJenisKapal implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row) {
            DB::table('jeniskapal')->insert([
                'jenis_kapal' => $row[0],
                'deskripsi_kapal' => $row[1],
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
