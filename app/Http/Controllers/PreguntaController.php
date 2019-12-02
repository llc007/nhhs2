<?php

namespace App\Http\Controllers;

use App\Alternativa;
use App\AlternativaPregunta;
use App\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PreguntaController extends Controller
{

    public function __construct()
    {
        $this->middleware('has.role:directivo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create(array $data)
    {


    }



    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data = \request()->all();


        $pr = new Pregunta();
        $pr->pregunta = $data['pregunta'];
        $pr->clasificacion = $data['clasificacion'];
        $pr->save();

        $puntajes = $data['puntajes'];
        $i=0;
        foreach ($data['alternativas'] as $a){
            $alternativa = Alternativa::firstOrNew(['alternativa' => $a]);
            $alternativa->save();
            $alternativaPregunta = new AlternativaPregunta();
            $alternativaPregunta->pregunta = $pr->id;
            $alternativaPregunta->alternativa = $alternativa->id;
            $alternativaPregunta->puntaje = $puntajes[$i];
            $alternativaPregunta->save();
            $i++;
        }




        return $data;


    }


    /**
     * Display the specified resource.
     *
     * @param \App\Pregunta $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Pregunta $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Pregunta $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Pregunta $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //



//        if(Pregunta::destroy($id)){
//            AlternativaPregunta::where('pregunta',$id)->delete();
//        }
        $boorar =  AlternativaPregunta::where('pregunta',$id)->delete();
        Pregunta::destroy($id);

        return $id;
    }
}
