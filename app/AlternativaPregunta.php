<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlternativaPregunta extends Model
{
    //
    protected $table = 'alternativa_pregunta';
    protected $fillable = [
        'pregunta', 'respuesta', 'puntaje',
    ];



}
