<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        
        DB::table('teams')->insert([
            
            [
                'idProject' => '1',
                'idUser' => '4',
                'jabatan' => 'Penanggung Jawab',
            ],
            [
                'idProject' => '1',
                'idUser' => '5',
                'jabatan' => 'Anggota',
            ],
            [
                'idProject' => '1',
                'idUser' => '6',
                'jabatan' => 'Anggota',
            ]

        ]);
    }
}
