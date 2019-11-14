{{--    ********************************************--}}
{{--    MODAL: NUEVA PREGUNTA***********************--}}
{{--    ********************************************--}}
<div id="modalNuevaPregunta" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nueva pregunta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form novalidate class="needs-validation">
                @csrf
                <div class="modal-body">
                    <input name="pregunta" class="form-control form-control-lg" type="text"
                           placeholder="Ingrese pregunta" required>
                    <div class="invalid-feedback">
                        Debe ser un nombre valido.
                    </div>
                    <hr>

                    <div id="" class="row">
                        <div class="col-6">
                            <label for="exampleFormControlSelect1">Respuesta</label>
                        </div>
                        <div class="col-3">
                            <label for="exampleFormControlSelect1">Puntos</label>
                        </div>
                        <div class="col-2">
                            <label for="">&nbsp;</label>
                        </div>
                    </div>
                    @if(!isset($respuestasPredefinidas))
                        @php
                            $respuestasPredefinidas = array('Siempre', 'Casi siempre', 'A veces', 'No aplica');
                        @endphp
                    @endif
                    <div id="contenedorRespuestas">
                        @for($j=0;$j<4;$j++)
                            <div name="filaRespuesta[]" class="filaR row @if($j>0) pt-2 @else primero @endif">
                                <div class="col-6">
                                    <input name="respuesta[]" class="form-control form-control" type="text"
                                           value="{{$respuestasPredefinidas[$j]}}" required>
                                    <div class="invalid-feedback">
                                        Debe ser un nombre valido.
                                    </div>
                                </div>
                                <div class="col-3">
                                    <select name="puntaje[]" class="form-control" id="selectPuntaje{{$j}}" required>
                                        @for($i = 5; $i >= 0; $i--)
                                            <option value={{$i}}>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-2">
                                    <div class="pt-1">
                                        <a id="btnRemove{{$j}}" onclick="removeRespuesta(this)"
                                           class="btna material-icons btnRemove">
                                            remove_circle
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                    <div class="row pt-2 container">
                        <button type="button" id="btnNuevaRespuesta" class="btn btn-success col-10 d-flex justify-content-center">
                            <i class="material-icons align-items-center">
                                arrow_drop_down
                            </i>
                            <h5 class="m-0">Añadir</h5>
                            <i class="material-icons align-items-center">
                                arrow_drop_down
                            </i>
                        </button>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <label for="clasificacionInput" class="mb-0"><b>Clasificacion:</b></label>
                        <select id="clasificacionInput" class="form-control ml-2" id="selectClasificacion" required>
                            @foreach($clasificaciones as $cl)
                                <option value={{$cl->id}}>{{$cl->nombre}}</option>
                            @endforeach
                        </select>
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
