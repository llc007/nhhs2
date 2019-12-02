{{--    ********************************************--}}
{{--    MODAL: NUEVA PREGUNTA***********************--}}
{{--    ********************************************--}}
<div id="modalNuevaEvaluacion" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nueva evaluacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form novalidate class="needs-validation">
                @csrf
                <div class="modal-body">
                    <input name="evaluacionName" id="inputEvaluacion" class="form-control form-control-lg" type="text"
                           placeholder="Ingrese nombre evaluacion" required>
                    <div class="invalid-feedback">
                        Debe ser un nombre valido.
                    </div>
                    <hr>
                    <div>
                        <textarea name="descripcion" class="form-control" id="descripcionEvaluacion"
                                  rows="3" placeholder="Descripción"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
