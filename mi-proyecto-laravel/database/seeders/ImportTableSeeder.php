<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ImportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = database_path('paises.sql');
        DB::unprepared(file_get_contents($sql));
    }
}
