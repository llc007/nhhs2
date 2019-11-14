@extends('layouts.app')

@section('scriptCabecera')
    <script>
        $(document).ready(function () {
            $('.tablaDT').dataTable( {
                "language": {
                    "emptyTable": "Sin datos aún"
                }
            } );
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
                    <div class="card-header">Administrar evaluaciones</div>
                    <div class="card-body">
                        <table id="evaluacionesTable" class="table table-striped table-bordered tablaDT" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($preguntas as $pr)
                                <tr>
                                    <td>{{$pr->pregunta}}</td>
                                    <td>{{$pr->clasificacion}}</td>
                                    <td>{{$pr->created_at}}</td>
                                    <td><a id="btnRemove{{$cl->id}}" onclick="ajaxClasificacion('eliminar', '{{$cl->id}}')"
                                           class="btna material-icons btnRemove" style="color: red">
                                            remove_circle
                                        </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
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
                        <table id="preguntasTable" class="table table-striped table-bordered tablaDT" style="width:100%">
                            <thead>
                            <tr>
                                <th>Pregunta</th>
                                <th>Tipo</th>
                                <th>Fecha creación</th>
                                <th>Administrar</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($preguntas as $pr)
                                <tr>
                                    <td>{{$pr->pregunta}}</td>
                                    <td>{{$pr->clasificacion}}</td>
                                    <td>{{$pr->created_at}}</td>
                                    <td><a id="btnRemove{{$cl->id}}" onclick="ajaxClasificacion('eliminar', '{{$cl->id}}')"
                                           class="btna material-icons btnRemove" style="color: red">
                                            remove_circle
                                        </a></td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Fecha de creación</th>
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
                        <table id="clasificacionTable" class="table table-striped table-bordered tablaDT" style="width:100%">
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
                                    <td><a id="btnRemove{{$cl->id}}" onclick="ajaxClasificacion('eliminar', '{{$cl->id}}')"
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

@endsection

@section('scriptFoot')
    <script>
        //FUNCION QUE VALIDA UN FORMULARIO CON LA CLASE nneds-validation
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                event.preventDefault();
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            event.preventDefault();
                            //Enviar a la funcion de AJAX que guarda la pregunta y respuesta
                            if ($('#submitApretado').val() == 'pregunta') {
                                alert('preg');
                            } else if ($('#submitApretado').val() == 'clasificacion') {
                                ajaxClasificacion();
                            }
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        {{--    ********************************************--}}
        {{--    FUNCION PARA SABER QUE MODELO OCUPO*********--}}
        {{--    ********************************************--}}
        $('#btnNuevaPregunta').click(function () {
            $('#submitApretado').val('pregunta');
        });

        $('#btnNuevaClasificacion').click(function () {
            $('#submitApretado').val('clasificacion');
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

        {{--    ********************************************--}}
        {{--    FUNCIONES DEL MODAL AGREGAR CLASIFICACION***--}}
        {{--    ********************************************--}}

        function ajaxClasificacion(accionCL, idCL = null) {
            if (accionCL == 'eliminar') {
                var data = {
                    id: idCL['id']
                };
                var accion = "eliminar";
                var url = 'clasificacion/'+idCL;
                var type = 'DELETE';
            } else {
                var data = {
                    nombre: $('#nombreClasificacion').val()
                };
                var accion = "crear";
                var url = 'clasificacion/';
                var type = 'POST';

            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: type,
                data: data,
            }).done(function (datos) {
                if (accion === 'crear') {
                    $('#modalNuevaClasificacion').modal('toggle');
                    refreshTable('clasificacionTable');
                    addClasificacionToNuevaPregunta(datos['id'],datos['nombre']);
                    return 'exito';
                }else if(accion === 'eliminar'){
                    refreshTable('clasificacionTable');
                    console.log(datos);
                    removeClasificacionToNuevaPregunta(datos);
                    return 'exito';
                }
            });
        }

        function refreshTable(id) {
            $("#" + id).load(location.href + " #" + id + ">*", "");
        }

        function addClasificacionToNuevaPregunta(id, nombre) {
            $('#clasificacionInput').append(`<option value="${id}">${nombre} </option>`);
        }
        function removeClasificacionToNuevaPregunta(id) {
            $("#clasificacionInput option[value="+id+"]").remove();
        }
    </script>
@endsection

