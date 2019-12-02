@extends('layouts.app')

@section('scriptCabecera')
    <script>
        $(document).ready(function () {
            $('.tablaDT').dataTable({
                "language": {
                    "emptyTable": "Sin datos aún"
                }
            });

            $('#preguntasAddTable').dataTable({
                "autoWidth": false
            });
            $('#evaluacionesTable').dataTable();
            $('#clasificacionTable').dataTable();


        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Administrar evaluacion</h6>
                        <div>
                            <button id="btnAddPregunta" type="button" class="btn btn-success btn-sm"
                                    data-toggle="modal"
                                    data-target="#modalAgregarPregunta">Agregar preguntas
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <h4>{{$evaluacion->nombre}}</h4>
                            <h5>{{$evaluacion->descripcion}}</h5>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-4">
        <p>Formulario abierto</p>
        <input class="form-control" type="text" id="submitApretado">
    </div>
    @extends('evaluacion.modalAgregarPregunta')
@endsection

@section('scriptFoot')
    {{--Se añade la opcion para validar el formulario con clase needs-validation--}}
    @extends('util.validaFormulario')
    {{--    Validar formularios--}}
    @section('instruccionDespuesDeValidar')
        //Enviar a la funcion de AJAX que guarda la pregunta y respuesta
        if ($('#submitApretado').val() == 'addP') {
        ajaxAddPregunta();
        } else if ($('#submitApretado').val() == 'clasificacion') {
        ajaxClasificacion();
        }
    @endsection
    @extends('evaluacion.jsAjaxEncuesta')

<script>
    $('#btnAddPregunta').click(function () {
        $('#submitApretado').val('addP');
    });

    var preguntas = [];


    //Revisa que CB esta presionado y saca la id de la pregunta asociada.
    $('.myCheckBox').click(function () {
        var mystring = $(this).attr('id');
        mystring = mystring.replace('p','');
        id = parseInt(mystring);

        if(preguntas[id]!=id){
            preguntas[id]=id;
        }else{
            preguntas[id]=null;
        }

        var limpio = new Array();
        for (var i = 0, j = preguntas.length; i < j; i++) {
            if (preguntas[i]) {
                limpio.push(preguntas[i]);
            }
        }
        if(limpio.length==0){
            $('#preguntasAñadidas').html("");
        }else{
            $('#preguntasAñadidas').html(limpio.length);
        }
        // console.info(limpio);
        console.info(preguntas);

    });



</script>
@endsection

