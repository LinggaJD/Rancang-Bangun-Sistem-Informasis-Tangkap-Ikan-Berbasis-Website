<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengumuman')->insert([
            'isi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan aliquet neque purus pretium. Pretium cras egestas diam risus lobortis. Amet, tristique consequat amet turpis sapien viverra. Lobortis dictumst tortor quis ac amet diam gravida eget. Porta tortor, amet id ac faucibus sit turpis integer. Vestibulum rutrum eu at vitae.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
