<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionesTable extends Migration
{

    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id('pub_id');
            $table->string('pub_titulo');
            $table->string('pub_descripcion');
            $table->string('pub_cambio')->nullable();
            $table->string('pub_zona');
            $table->string('pub_departamento');
            $table->string('pub_delivery_op');
            $table->timestamps();

            $table->foreignId('pub_user_id')
                ->references('id')
                ->on('users');

            $table->foreignId('pub_cat_id')
                ->nullable()
                ->references('cat_id')
                ->on('categorias')
                ->onDelete('cascade');

            $table->foreignId('pub_est_id')
                ->references('est_id')
                ->on('estados')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('publicaciones');
    }
}
