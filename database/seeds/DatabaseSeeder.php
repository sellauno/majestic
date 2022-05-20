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
        
        DB::table('posisi')->insert([
            
            [
                'posisi' => 'KOL officer',
            ],
            [
                'posisi' => 'Finance',
            ],
            [
                'posisi' => 'Graphic Designer',
            ],
            [
                'posisi' => 'Creative Director',
            ],

        ]);
    }
}
