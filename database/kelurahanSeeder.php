<?php

use Illuminate\Database\Seeder;

class kelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelurahan')->insert([
            'nama_kelurahan' => 'Cikande',
        ]);
        DB::table('kelurahan')->insert([
            'nama_kelurahan' => 'Ciptamargi',
        ]);
        DB::table('kelurahan')->insert([
            'nama_kelurahan' => 'Kertamukti',
        ]);
        DB::table('kelurahan')->insert([
            'nama_kelurahan' => 'Kosambibatu',
        ]);
        DB::table('kelurahan')->insert([
            'nama_kelurahan' => 'Mekarpohaci',
        ]);
        DB::table('kelurahan')->insert([
            'nama_kelurahan' => 'Pusaka Jaya Selatan',
        ]);
        DB::table('kelurahan')->insert([
            'nama_kelurahan' => 'Pusaka Jaya Utara',
        ]);
        DB::table('kelurahan')->insert([
            'nama_kelurahan' => 'Rawasari',
        ]);
        DB::table('kelurahan')->insert([
            'nama_kelurahan' => 'Sukaratu',
        ]);
        DB::table('kelurahan')->insert([
            'nama_kelurahan' => 'Tanjungsari',
        ]);
    }
}
