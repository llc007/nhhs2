<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativaPreguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternativa_pregunta', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('pregunta')->index();
            $table->foreign('pregunta')
                ->references('id')
                ->on('preguntas');

            $table->string('respuesta');
            $table->integer('puntaje')
            ->nullable();
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
        Schema::dropIfExists('alternativa_pregunta');
    }
}
