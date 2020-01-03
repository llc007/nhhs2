<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaPregunta extends Model
{
    //
    protected $table = 'encuesta_preguntas';
    protected $fillable = ['encuesta', ' pregunta'];

    public function tienePregunta(){
        return $this->hasOne('App\Pregunta','id','pregunta');
    }

}
