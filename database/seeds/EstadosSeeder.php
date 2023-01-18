<?php

use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            [
                'est_estados' => 'activa'
            ],
            [
                'est_estados' => 'inactiva'
            ],
            [
                'est_estados' => 'eliminada'
            ],

        ]);
    }

}
