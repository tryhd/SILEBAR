<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Warga Test',
            'email' => 'warga@test.com',
            'password' => Hash::make('12345678'),
            'status'=>'Aktif',
            'role'=>'Warga',
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => Hash::make('12345678'),
            'status'=>'Aktif',
            'role'=>'Admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Kecamatan Test',
            'email' => 'kecamatan@test.com',
            'password' => Hash::make('12345678'),
            'status'=>'Aktif',
            'role'=>'Kecamatan',
        ]);
        DB::table('users')->insert([
            'name' => 'NonAktif Test',
            'email' => 'nonaktif@test.com',
            'password' => Hash::make('12345678'),
            'status'=>'NonAktif',
            'role'=>'Kecamatan',
        ]);
    }
}
