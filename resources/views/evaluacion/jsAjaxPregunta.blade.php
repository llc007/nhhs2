<script>
    {{--    ********************************************--}}
    {{--    FUNCIONES DEL MODAL AGREGAR CLASIFICACION***--}}
    {{--    ********************************************--}}
    function ajaxPregsunta(accionPR, idPR = null) {
      // console.log($('input[name=respuesta\\[\\]]').val());
        var alternativas = {};
        $.each($('input[name=respuesta\\[\\]]'), function (value) {

            alternativas[value]  = this.value;
        } );
        console.log(alternativas);
    }

    function ajaxPregunta(accionPR, idPR = null) {
        if (accionPR == 'eliminar') {
            var data = {
                id: idPR['id']
            };
            var accion = "eliminar";
            var url = 'preguntas/' + idPR;
            var type = 'DELETE';
        } else {
            var alternativas = {};
            $.each($('input[name=respuesta\\[\\]]'), function (value) {
                alternativas[value]  = this.value;
            } );

            var puntajes = {};
            $.each($('select[name=puntaje\\[\\]]'), function (value) {
                puntajes[value]  = this.value;
            } );

            var data = {
                pregunta: $('#inputPregunta').val(),
                clasificacion: $('#clasificacionInput').val(),
                alternativas: alternativas,
                puntajes: puntajes
            };
            var accion = "crear";
            var url = 'preguntas/';
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
                $('#modalNuevaPregunta').modal('toggle');
                refreshTable('preguntasTable');
                console.log(datos);
                // addClasificacionToNuevaPregunta(datos['id'], datos['nombre']);
                return 'exito';
            } else if (accion === 'eliminar') {
                refreshTable('preguntasTable');
                console.log(datos);
                // removeClasificacionToNuevaPregunta(datos);
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
