<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //
    protected $table = 'preguntas';
    protected $fillable = [
        'pregunta', 'clasificacion',
    ];

    public function tieneClasificacion(){
        return $this->hasOne('App\Clasificacion','id','clasificacion');
    }

    public function tieneAlternativaPregunta(){
        return $this->hasMany('App\AlternativaPregunta','pregunta');
    }
}
