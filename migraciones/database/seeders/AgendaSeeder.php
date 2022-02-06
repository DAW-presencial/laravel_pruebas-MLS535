<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $agenda = [
            ['name' => 'Bernat Smith', 'email' => 'bernat@email.com',
                'phone' => '123456789', 'address' => 'Calle 123', 'user_id'=> '1'],
            ['name' => 'Margalida Johnson', 'email;' =>
                'mjohnson@email.com', 'phone' => '987654321', 'address' => 'Calle calle 321', 'user_id'=> '1'],
            ['name' => 'Miquel Jackson', 'email' =>
                'mjackson@email.com', 'phone' => '123432123', 'address' => 'calle 123, street', 'user_id'=> '1'],
        ];
        DB::table('agenda')->insert($agenda);
    }
}
