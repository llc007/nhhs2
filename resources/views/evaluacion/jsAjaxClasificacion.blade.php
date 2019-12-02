<script>
    {{--    ********************************************--}}
    {{--    FUNCIONES DEL MODAL AGREGAR CLASIFICACION***--}}
    {{--    ********************************************--}}
    function ajaxClasificacion(accionCL, idCL = null) {
        if (accionCL == 'eliminar') {
            var data = {
                id: idCL['id']
            };
            var accion = "eliminar";
            var url = 'clasificacion/' + idCL;
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
                addClasificacionToNuevaPregunta(datos['id'], datos['nombre']);
                return 'exito';
            } else if (accion === 'eliminar') {
                refreshTable('clasificacionTable');
                console.log(datos);
                removeClasificacionToNuevaPregunta(datos);
                return 'exito';
            }
        });
    }

    function addClasificacionToNuevaPregunta(id, nombre) {
        $('#clasificacionInput').append(`<option value="${id}">${nombre} </option>`);
    }

    function removeClasificacionToNuevaPregunta(id) {
        $("#clasificacionInput option[value=" + id + "]").remove();
    }
</script>
