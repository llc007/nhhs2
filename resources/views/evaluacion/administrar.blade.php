@extends('layouts.app')

@section('scriptCabecera')
    <script>
        $(document).ready(function () {
            $('.tablaDT').dataTable({
                "language": {
                    "emptyTable": "Sin datos aún"
                }
            });
            $('#evaluacionesTable').dataTable();
            $('#preguntasTable').dataTable();

            $('#clasificacionTable').dataTable();


        });
    </script>
@endsection

@section('content')
    <style>
        .btna:hover {
            cursor: pointer;
        }
    </style>

    {{--    ********************************************--}}
    {{--    TABLA: ADMINISTRAR EVALUACIONES*************--}}
    {{--    ********************************************--}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Administrar evaluaciones</h6>
                        <div>
                            <button id="btnNuevaEncuesta" type="button" class="btn btn-success btn-sm"
                                    data-toggle="modal"
                                    data-target="#modalNuevaEvaluacion">Nueva evaluacion
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="encuestaTable" class="table table-striped table-bordered tablaDT"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Evaluacion</th>
                                <th>Descripcion</th>
                                <th>Fecha Creacion</th>
                                <th>Administrar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($encuestas as $en)
                                <tr>
                                    <td>{{$en->id}}</td>
                                    <td>{{$en->nombre}}</td>
                                    <td>{{$en->descripcion}}</td>
                                    <td>{{$en->created_at}}</td>
                                    <td><a id="btnRemove{{$en->id}}"
                                           href="encuesta/{{$en->id}}"
                                           class="btna material-icons btnRemove" style="color: cornflowerblue">
                                            edit
                                        </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Evaluacion</th>
                                <th>N° Preguntas</th>
                                <th>Fecha Creacion</th>
                                <th>Administrar</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--    ********************************************--}}
    {{--    TABLA: ADMINISTRAR PREGUNTAS****************--}}
    {{--    ********************************************--}}
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Administrar preguntas</h6>
                        <div>
                            <button id="btnNuevaPregunta" type="button" class="btn btn-success btn-sm"
                                    data-toggle="modal"
                                    data-target="#modalNuevaPregunta">Nueva pregunta
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="preguntasTable" class="table table-striped table-bordered tablaDT"
                               style="width:100%; font-size: 12px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th style="width: 50%">Pregunta</th>
                                <th style="width: 10%">Clasificacion</th>
                                <th style="width: 15%">Fecha</th>
                                <th >Administrar</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($preguntas as $pr)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$pr->pregunta}}</td>
                                    <td>{{$pr->tieneClasificacion->nombre}}</td>
                                    <td>{{\Carbon\Carbon::parse($pr->created_at)->format('d-m-Y')}}</td>
                                    <td><a id="btnRemove{{$pr->id}}"
                                           onclick="ajaxPregunta('eliminar', '{{$pr->id}}')"
                                           class="btna material-icons btnRemove" style="color: red">
                                            remove_circle
                                        </a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    ********************************************--}}
    {{--    TABLA: ADMINISTRAR CLASIFICACIONES**********--}}
    {{--    ********************************************--}}
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Administrar clasificaciones</h6>
                        <div>
                            <button id="btnNuevaClasificacion" type="button" class="btn btn-success btn-sm"
                                    data-toggle="modal"
                                    data-target="#modalNuevaClasificacion">Nueva clasificación
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="clasificacionTable" class="table table-striped table-bordered tablaDT"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>Clasificacion</th>
                                <th>Fecha creación</th>
                                <th>Eliminar</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clasificaciones as $cl)
                                <tr>
                                    <td>{{$cl->nombre}}</td>
                                    <td>{{$cl->created_at}}</td>
                                    <td><a id="btnRemove{{$cl->id}}"
                                           onclick="ajaxClasificacion('eliminar', '{{$cl->id}}')"
                                           class="btna material-icons btnRemove" style="color: red">
                                            remove_circle
                                        </a></td>

                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Clasificacion</th>
                                <th>Fecha de creación</th>
                                <th>Eliminar</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-4">
        <p>Formulario abierto</p>
        <input class="form-control" type="text" id="submitApretado">
    </div>
    @extends('evaluacion.modalNuevaPregunta')
    @extends('evaluacion.modalNuevaClasificacion')
    @extends('evaluacion.modalNuevaEvaluacion')

@endsection

@section('scriptFoot')
    {{--Se añade la opcion para validar el formulario con clase needs-validation--}}
    @extends('util.validaFormulario')
    {{--    Validar formularios--}}
@section('instruccionDespuesDeValidar')
    //Enviar a la funcion de AJAX que guarda la pregunta y respuesta
    if ($('#submitApretado').val() == 'pregunta') {
    ajaxPregunta();
    } else if ($('#submitApretado').val() == 'clasificacion') {
    ajaxClasificacion();
    }else if ($('#submitApretado').val() == 'encuesta') {
    ajaxEncuesta();
    }
@endsection

@extends('evaluacion.jsAjaxClasificacion')
@extends('evaluacion.jsAjaxPregunta')
@extends('evaluacion.jsAjaxEncuesta')
<script>
    {{--    ********************************************--}}
    {{--    FUNCION PARA SABER QUE MODELO OCUPO*********--}}
    {{--    ********************************************--}}
    $('#btnNuevaPregunta').click(function () {
        $('#submitApretado').val('pregunta');
    });
    $('#btnNuevaClasificacion').click(function () {
        $('#submitApretado').val('clasificacion');
    });
    $('#btnNuevaEncuesta').click(function () {
        $('#submitApretado').val('encuesta');
    });


    {{--    ********************************************--}}
    {{--    FUNCIONES DEL MODAL AGREGAR PREGUNTA**********--}}
    {{--    ********************************************--}}

    {{--     LLENAR POR DEFAULT EL SELECT DE PUNTAJE DE NUEVA PREGUNTA   --}}
    $(document).ready(function () {
        document.getElementById('selectPuntaje0').value = 3;
        document.getElementById('selectPuntaje1').value = 2;
        document.getElementById('selectPuntaje2').value = 1;
        document.getElementById('selectPuntaje3').value = 0;
    });

    //AGREGA FILA DE RESPUESTAS
    $('#btnNuevaRespuesta').click(function () {
        //Clonamos la ultima fila de respuestas
        var ultimaFila = $('#contenedorRespuestas div.filaR:last');
        ultimaFila.clone().appendTo("#contenedorRespuestas");

        //Agregamos la clase pt-2 si clonamos el primero
        //y ponemos el boton eliminar
        if ($('#contenedorRespuestas div.filaR:last.primero')) {
            $('#contenedorRespuestas div.filaR:last.primero').addClass('pt-2');
            $('.btnRemove').show();
        }
    });

    //REMUEVE FILA DE RESPUESTAS
    function removeRespuesta($this) {
        $($this).parents('.row').remove();
        var numItems = $('.btnRemove').length;
        if (numItems == 1) {
            $('.btnRemove').hide();
            // $('.btna').remove();
        }
    }

    //Refresca una tabla. recibe el id de la tabla por parametro
    function refreshTable(id) {
        $("#" + id).load(location.href + " #" + id + ">*", "");
    }
</script>
@endsection

