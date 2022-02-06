<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $project =[

           ['title'=>'Proyecto 1','description'=>'proyecto nuevo de trinca', 'user_id'=> 2],
           ['title'=>'Proyecto 2','description'=>'proyecto nuevo de 2', 'user_id'=> 2],
           ['title'=>'Proyecto 3','description'=>'proyecto nuevo de 3', 'user_id'=> 1],
           ['title'=>'Proyecto 4','description'=>'proyecto nuevo de 4', 'user_id'=> 1]
       ];

        DB::table('project')->insert($project);
    }
}
