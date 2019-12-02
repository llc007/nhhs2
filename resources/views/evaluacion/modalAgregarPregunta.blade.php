{{--    ********************************************--}}
{{--    MODAL: NUEVA PREGUNTA***********************--}}
{{--    ********************************************--}}
<div id="modalAgregarPregunta" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Agregar preguntas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form novalidate class="needs-validation">
                @csrf
                <div class="modal-body">

                    <table id="preguntasAddTable" class="table table-striped table-bordered"
                           style="width:100%; font-size: 12px">
                        <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 62%">Pregunta</th>
                            <th style="width: 20%">Clasificacion</th>
                            <th style="width: 10%">Fecha</th>
                            <th style="width: 3%"> </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($preguntasRestantes as $pr)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pr->pregunta}}</td>
                                <td>{{$pr->tieneClasificacion->nombre}}</td>
                                <td>{{\Carbon\Carbon::parse($pr->created_at)->format('d-m-Y')}}</td>
                                <td>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input myCheckBox" id="p{{$pr->id}}">
                                        <label class="custom-control-label" for="p{{$pr->id}}"></label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <h3 id="preguntasAñadidas"></h3>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
