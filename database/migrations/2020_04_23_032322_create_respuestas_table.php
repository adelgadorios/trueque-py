<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id('resp_id');
            $table->string('resp_calle1');
            $table->string('resp_calle2')->nullable();
            $table->string('resp_est');

            $table->foreignId('resp_pub_id')
                ->references('pub_id')
                ->on('publicaciones')
                ->onDelete('cascade');

            $table->foreignId('resp_user_id')
                ->references('id')
                ->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas');
    }
}
