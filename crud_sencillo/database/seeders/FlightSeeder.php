<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $flight =[
            [
                'name'=>'Mallorca-Cancun',
                'number'=>'3745',
                'date'=>'2022-02-16',
                'description'=>'Vuelo en segunda',
                'size'=>'2',
                'gender'=>'Female',
                'condition'=>'["Coffee","Meal"]',
            ],
            [
                'name'=>'Cancun-Mallorca',
                'number'=>'3746',
                'date'=>'2022-03-16',
                'description'=>'Vuelo en primera',
                'size'=>'2',
                'gender'=>'Male',
                'condition'=>'["Coffee","Dinner"]',
            ]
            ];
        DB::table('flight')->insert($flight);
    }
}
