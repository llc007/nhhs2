<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    //
    protected $table = 'encuestas';
    protected $fillable = ['name', ' description'];


    public function preguntaDeEncuesta(){
        return $this->hasMany('App\EncuestaPregunta','encuesta','id');

    }
}
