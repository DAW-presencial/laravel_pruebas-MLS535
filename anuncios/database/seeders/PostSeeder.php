<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $post =[
            [
            'name'=>'Proyecto 1',
            'category'=>'["Bootstrap","JQuery UI"]',
            'date'=>'2022-02-16',
            'number'=>'3',
            'size'=>'2',
            'gender'=>'Female',
            'description'=>'Esto es un seeder',
            'email'=>'maria@maria.com', 'user_id'=> 1,
            'image'=> null
        ],
        [
            'name'=>'Proyecto 2',
            'category'=>'["Bootstrap","JQuery UI"]',
            'date'=>'2022-02-16',
            'number'=>'3',
            'size'=>'2',
            'gender'=>'Female',
            'description'=>'Esto es un seeder',
            'email'=>'maria@maria.com',
            'user_id'=> 1,
            'image'=> null
        ]
        ];
        DB::table('posts')->insert($post);
    }
}
