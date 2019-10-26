<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestaPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_preguntas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('encuesta')->index();
            $table->foreign('encuesta')
                ->references('id')
                ->on('encuestas')
                ->onDelete('cascade');

            $table->unsignedBigInteger('pregunta')->index();
            $table->foreign('pregunta')
                ->references('id')
                ->on('preguntas');
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
        Schema::dropIfExists('encuesta_preguntas');
    }
}
