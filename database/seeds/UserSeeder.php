<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('role')->insert([
            [
                'role' => 'admin',
            ],
            [
                'role' => 'user'
            ]
        ]);

        DB::table('kecamatan')->insert([
            [
                'kecamatan' => 'Jeruk Legi',
                'desa' => 'Brebeg',
            ],
            [
                'kecamatan' => 'Kroya',
                'desa' => 'Karangmangu'
            ]
        ]);

        DB::table('enumerator')->insert([
            [
                'enumerator' => 'Petugas TPI',
            ],
            [
                'enumerator' => '(Non TPI) Pengepul',
            ],
            [
                'enumerator' => '(Non TPI) Penyalur',
            ],
            [
                'enumerator' => '(Non TPI) Nelayan',
            ],
        ]);



        $admin_id = DB::table('users')->insertGetId([
            'nip' => '12345678',
            'nama' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'telp' => '08212233',
            'alamat' => 'Purwokerto',
            'foto' => 'img/foto/avatar.png',
        ]);

        DB::table('role_user')->insert([
            'user_id' => $admin_id,
            'role_id' => 1
        ]);

        DB::table('wilayah_kerja')->insert([
            'user_id' => $admin_id,
            'kecamatan_id' => 1
        ]);

        $peng = DB::table('users')->insertGetId([
            'nip' => '123456',
            'nama' => 'Lingga',
            'username' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('user'),
            'telp' => '08212233',
            'alamat' => 'Purwokerto',
            'foto' => 'img/foto/avatar.png',
        ]);

        DB::table('role_user')->insert([
            'user_id' => $peng,
            'role_id' => 2
        ]);

        DB::table('wilayah_kerja')->insert([
            'user_id' => $peng,
            'kecamatan_id' => 2
        ]);

        DB::table('enumerator_user')->insert([
            'user_id' => $peng,
            'enumerator_id' => 1,
        ]);

        // $faker = Faker::create('id_ID');
        // $gender = $faker->randomElement(['male','female']);

        // for($i = 0; $i < 10; $i++) {
        //     $user_id = DB::table('users')->insertGetId([
        //         'nip' => $i,
        //         'nama' => $faker->name($gender),
        //         'username' => $faker->username,
        //         'email' => $faker->email(),
        //         'password' => Hash::make('1234'),
        //         'telp' => $faker->phoneNumber,
        //         'alamat' => $faker->address,
        //         'foto' => 'img/foto/avatar.png',
        //     ]);

        //     DB::table('role_user')->insert([
        //         'user_id' => $user_id,
        //         'role_id' => 2
        //     ]);

        //     DB::table('wilayah_kerja')->insert([
        //         'user_id' => $user_id,
        //         'kecamatan_id' => 1
        //     ]);


        //     if($i === 0) {
        //         DB::table('enumerator_user')->insert([
        //             'user_id' => $user_id,
        //             'enumerator_id' => 2,
        //         ]);
        //     }

        //     if($i === 1) {
        //         DB::table('enumerator_user')->insert([
        //             'user_id' => $user_id,
        //             'enumerator_id' => 3,
        //         ]);
        //     }

        //     if($i === 2) {
        //         DB::table('enumerator_user')->insert([
        //             'user_id' => $user_id,
        //             'enumerator_id' => 4,
        //         ]);
        //     }

        //     if($i === 3) {
        //         DB::table('enumerator_user')->insert([
        //             'user_id' => $user_id,
        //             'enumerator_id' => 2,
        //         ]);
        //     }

        //     if($i === 4) {
        //         DB::table('enumerator_user')->insert([
        //             'user_id' => $user_id,
        //             'enumerator_id' => 3,
        //         ]);
        //     }

        //     if($i === 5) {
        //         DB::table('enumerator_user')->insert([
        //             'user_id' => $user_id,
        //             'enumerator_id' => 4,
        //         ]);
        //     }

        //     if($i === 6) {
        //         DB::table('enumerator_user')->insert([
        //             'user_id' => $user_id,
        //             'enumerator_id' => 2,
        //         ]);
        //     }

        //     if($i === 7) {
        //         DB::table('enumerator_user')->insert([
        //             'user_id' => $user_id,
        //             'enumerator_id' => 3,
        //         ]);
        //     }

        //     if($i === 8) {
        //         DB::table('enumerator_user')->insert([
        //             'user_id' => $user_id,
        //             'enumerator_id' => 4,
        //         ]);
        //     }

        //     if($i === 9) {
        //         DB::table('enumerator_user')->insert([
        //             'user_id' => $user_id,
        //             'enumerator_id' => 4,
        //         ]);
        //     }


        // }
    }
}
