<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class JenisAlatTangkap extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_alat_penangkap')->insert([
            [
                'alat_penangkap' => 'Jala',
                'kelompok' => 'Jaring Insang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'alat_penangkap' => 'Pancing Ulur',
                'kelompok' => 'Pancing',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
