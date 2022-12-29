<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class JenisIkan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenisikan')->insert([
            [
                'jenis_ikan' => 'Kakatua (Bobometopon Muricatum)',
                'kode_fao' => 'BMK',
                'jenis_perairan' => 'Laut',
                'hias' => 'Non Hias',
                'kelompok' => 'Kakatua',
                'kelompok_besar' => 'Karang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenis_ikan' => 'Kerang Bakau (Polymesoda Erosa)',
                'kode_fao' => 'YMF',
                'jenis_perairan' => 'Payau',
                'hias' => 'Hias',
                'kelompok' => 'Kerang',
                'kelompok_besar' => 'Demersal',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
