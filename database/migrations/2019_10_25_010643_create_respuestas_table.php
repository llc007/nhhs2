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
            $table->bigIncrements('id');

            $table->unsignedBigInteger('profesor')->index();
            $table->foreign('profesor')
                ->references('id')
                ->on('profesores');

            $table->unsignedBigInteger('encuesta')->index();
            $table->foreign('encuesta')
                ->references('id')
                ->on('encuestas');

            $table->unsignedBigInteger('pregunta')->index();
            $table->foreign('pregunta')
                ->references('id')
                ->on('preguntas')
                ->onDelete('cascade');

            $table->string('respuesta');
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
