@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Taller excel septimo basico</h6>
                        <div>
{{--                            <button id="btnAddPregunta" type="button" class="btn btn-success btn-sm"--}}
{{--                                    data-toggle="modal"--}}
{{--                                    data-target="#modalAgregarPregunta">Ver notas--}}
{{--                            </button>--}}
                            <button id="btnAddPregunta" type="button" class="btn btn-success btn-sm"
                                        >Ver notas
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column">
                                <h4>Documentos</h4>
                                <a href="/upload/TallerExcel.xlsx">Descargar</a>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection()
