<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([

            [
                'cat_categoria' => 'motor'
            ],
            [
                'cat_categoria' => 'inmuebles'
            ],
            [
            'cat_categoria' => 'telefonos'
            ],
            [
                'cat_categoria' => 'electronica'
            ],
            [
                'cat_categoria' => 'hogar'
            ],
            [
                'cat_categoria' => 'servicios'
            ],
            [
                'cat_categoria' => 'hobbies'
            ],
            [
                'cat_categoria' => 'deportes'
            ], [
                'cat_categoria' => 'herramientas'
            ],
            ]);
    }
}
