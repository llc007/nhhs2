<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestaClasificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_clasificacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('clasificacion')->index();
            $table->foreign('clasificacion')
                ->references('id')
                ->on('clasificaciones');

            $table->unsignedBigInteger('encuesta')->index();
            $table->foreign('encuesta')
                ->references('id')
                ->on('encuestas')
                ->onDelete('cascade');

            $table->integer('ponderacion');

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
        Schema::dropIfExists('encuesta_clasificacion');
    }
}
