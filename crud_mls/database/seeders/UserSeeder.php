<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //
        $user =[
            [
                'role'=>'admin',
                'name'=> 'Maite',
                'email'=>'maiteladaria@gmail.com',
                'password'=>Hash::make('12345678')
            ],
            [
                'role'=>'user',
                'name'=> 'Maria',
                'email'=>'maria@gmail.com',
                'password'=>Hash::make('12345678')
            ]
        ];
        DB::table('users')->insert($user);
    }
}
