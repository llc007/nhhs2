<script>
    {{--    ********************************************--}}
    {{--    FUNCIONES DEL MODAL AGREGAR CLASIFICACION***--}}
    {{--    ********************************************--}}
    function ajaxEncuesta(accionCL, idCL = null) {
        if (accionCL == 'eliminar') {
            var data = {
                id: idCL['id']
            };
            var accion = "eliminar";
            var url = 'clasificacion/' + idCL;
            var type = 'DELETE';
        } else {
            var data = {
                nombre: $('#inputEvaluacion').val(),
                descripcion: $("#descripcionEvaluacion").val()
            };
            var accion = "crear";
            var url = 'encuesta/';
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
                $('#modalNuevaEvaluacion').modal('toggle');
                refreshTable('encuestaTable');
                return 'exito';
            } else if (accion === 'eliminar') {
                refreshTable('clasificacionTable');
                return 'exito';
            }
        });
    }
    {{--    ********************************************--}}
    {{--    FUNCIONES DEL MODAL AGREGAR CLASIFICACION***--}}
    {{--    ********************************************--}}
    function ajaxAddPregunta(accionCL, idCL = null) {


            var data = {
                idEncuesta: $('#inputEvaluacion').val(),
                preguntasParaAñadir: $("#descripcionEvaluacion").val()
            };
            var accion = "crear";
            var url = 'encuesta/';
            var type = 'POST';


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
                $('#modalNuevaEvaluacion').modal('toggle');
                refreshTable('encuestaTable');
                return 'exito';
            } else if (accion === 'eliminar') {
                refreshTable('clasificacionTable');
                return 'exito';
            }
        });
    }

</script>
