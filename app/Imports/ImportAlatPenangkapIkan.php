<?php

namespace App\Imports;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
class ImportAlatPenangkapIkan implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row) {
            DB::table('jenis_alat_penangkap')->insert([
                'alat_penangkap' => $row[0],
                'kelompok' => $row[1],
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
