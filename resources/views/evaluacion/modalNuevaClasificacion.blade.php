{{--    ********************************************--}}
{{--    MODAL: NUEVA CLASIFICACION***********************--}}
{{--    ********************************************--}}
<div id="" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nueva clasificación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalNuevaClasificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nueva clasificación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form novalidate class="needs-validation">
                @csrf
                <div class="modal-body">
                    <div id="" class="row">
                        <div class="col-6">
                            <label for="exampleFormControlSelect1">Nombre</label>
                        </div>
                    </div>
                    <div id="contenedorClasificacion">
                        <div name="clasificacion" class="filaR row primero">
                            <div class="col-12">
                                <input id="nombreClasificacion" class="form-control form-control" type="text"
                                       placeholder="Ingrese clasificacion" required>
                                <div class="invalid-feedback">
                                    Debe ser un nombre valido.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
