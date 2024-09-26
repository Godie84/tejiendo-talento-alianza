<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->insert([
            ['nombre' => 'Desarrollador'],
            ['nombre' => 'Analista'],
            ['nombre' => 'Gerente de Proyecto'],
            ['nombre' => 'Diseñador UX/UI'],
            ['nombre' => 'Tester'],
            ['nombre' => 'Administrador de Sistemas'],
            ['nombre' => 'Soporte Técnico'],
        ]);
    }
}
