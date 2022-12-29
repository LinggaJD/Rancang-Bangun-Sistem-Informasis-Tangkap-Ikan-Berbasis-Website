<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class JenisKapal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jeniskapal')->insert([
            [
                'jenis_kapal' => 'kapal motor',
                'deskripsi_kapal' => 'kapal besar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenis_kapal' => 'perahu',
                'deskripsi_kapal' => 'kapal kecil',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
