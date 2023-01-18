<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('prod_id');
            $table->string('prod_titulo');
            $table->timestamps();

            $table->foreignId('prod_pub_id')
                ->references('pub_id')
                ->on('publicaciones')
                ->onDelete('cascade');

            $table->foreignId('prod_resp_id')
                ->references('resp_id')
                ->on('respuestas')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
