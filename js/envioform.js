$(document).ready(function () {
    $("#btn-form").on("click", function () {


        error = "";
        nombre = $("#nombre").val();
        correo = $("#correo").val();
        tel = $("#telefono").val();
        mensaje = $("#mensaje").val();

        if (nombre == "") {
            error += "*Ingresa un nombre valido \n "
        }
        if (correo == "") {
            error += "*Ingresa un correo valido   \n "
        }
        if (tel == "") {
            error += "*Ingresa un telefono valido \n "
        }

        if (error != "") {
            toastr.warning(error);
            return;
        }
        var datos = new FormData();
        datos.append("nombre", nombre);
        datos.append("correo", correo);
        datos.append("tel", tel);
        datos.append("mensaje", mensaje);
        $.ajax({
            url: 'correo.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function () {
                $("#btn-form").prop('disabled', true);

            },
            success: function (respuesta) {
                $("#btn-form").prop('disabled', false);
                $("#nombre").val('');
                $("#correo").val('');
                $("#telefono").val('');
                $("#mensaje").val('');

                if (respuesta == '1') {
                    toastr.success("Tu mensaje fue enviado correctamente", "Muy bien");
                }
                else {
                    toastr.error("Tuvimos problemas al intentar enviar el mensaje, intenta mas tarde.");
                }

            }
        })

    })
});
