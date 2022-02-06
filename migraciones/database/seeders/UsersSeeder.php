<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            ['name' => 'Maite Ladaria', 'email' => 'maiteladaria@email.com',
                'password' => Hash::make('12345678'), 'role' => 'admin'],
            ['name' => 'Mario Vaquerizo', 'email' => 'vaquerizostyle@email.com',
                'password' => Hash::make('12345678'), 'role' => 'user']

        ];
        DB::table('users')->insert($users);
    }
}
