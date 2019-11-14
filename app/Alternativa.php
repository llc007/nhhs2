<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
    //
    protected $fillable = [
        'pregunta', 'respuesta', 'puntaje',
    ];
}
