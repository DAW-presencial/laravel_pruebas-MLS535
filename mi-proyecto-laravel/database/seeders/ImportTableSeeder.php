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
        $sql = public_path('paises.sql');
        DB::table('paises')->index();
    }
}
