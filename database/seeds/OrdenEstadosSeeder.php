<?php

use Illuminate\Database\Seeder;

class OrdenEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orden_estados')->insert([
            [
                'ordest_estado' => 'activa'
            ],
            [
                'ordest_estado' => 'completada'
            ],

        ]);
    }
}
