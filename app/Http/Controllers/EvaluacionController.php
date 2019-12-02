<?php

namespace App\Http\Controllers;

use App\Clasificacion;
use App\Encuesta;
use App\Pregunta;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        return view('evaluacion/listaEvaluacion');
    }
    public function admin()
    {
        //
        $encuestas = Encuesta::all();
        $clasificaciones = Clasificacion::all();
        $preguntas = Pregunta::all();

        return view('evaluacion/administrar', compact('encuestas','clasificaciones', 'preguntas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = \request()->all();
        $en = new Encuesta();
        $en->nombre = $data['nombre'];
        $en->descripcion = $data['descripcion'];
        $en->save();


        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //

        $evaluacion = Encuesta::find($id);
        $preguntasRestantes = Pregunta::all();
        return view('evaluacion/administrarEvaluacion', compact('evaluacion','preguntasRestantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Encuesta $encuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encuesta $encuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encuesta $encuesta)
    {
        //
    }
}
