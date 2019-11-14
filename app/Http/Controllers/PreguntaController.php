<?php

namespace App\Http\Controllers;

use App\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PreguntaController extends Controller
{
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
        dd("aca");
        return Pregunta::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
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

        dd($this->validate($request, [
            'pregunta' => ['required', 'string', 'max:255'],
        ]));
        dd($this);
        $pregunta = $this->create($request->all());

       dd($pregunta);
//       return $pregunta;

    }

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'pregunta' => ['required', 'string', 'max:255'],
            'respuesta' => ['required', 'string', 'max:255'],
            'puntaje' => ['required', 'numeric'],
        ]);
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
    public function destroy(Pregunta $pregunta)
    {
        //
    }
}
