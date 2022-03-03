<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('musicians')->insert([
        [
            'nombre' => 'Maestre',
            'categoria' => 'En una banda',
            'salario' => '2450',
            'experiencia' => 'avanzado',
            'descripcion' => 'Bajista y compositor del grupo Tantrum.',
            'fecha' => '2012-05-01',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
            [
                'nombre' => 'Miguel',
                'categoria' => 'En una banda',
                'salario' => '2500',
                'experiencia' => 'avanzado',
                'descripcion' => 'Guitarrista y compositor del grupo Tantrum.',
                'fecha' => '2013-06-12',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Eloy',
                'categoria' => 'En una banda',
                'salario' => '2530',
                'experiencia' => 'avanzado',
                'descripcion' => 'Baterista y compositor del grupo Tantrum',
                'fecha' => '2015-01-26',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'JimiVanYoung',
                'categoria' => 'Solista',
                'salario' => '1900',
                'experiencia' => 'intermedio',
                'descripcion' => 'Cantante por libre',
                'fecha' => '2017-08-14',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
            ]);
    }
}
