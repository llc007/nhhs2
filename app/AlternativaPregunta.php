<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlternativaPregunta extends Model
{
    //
    protected $table = 'alternativa_pregunta';
    protected $fillable = [
        'pregunta', 'alternativa', 'puntaje',
    ];

    public function tieneAlternativa(){
        return $this->hasOne('App\Alternativa','id','alternativa');
    }

}
