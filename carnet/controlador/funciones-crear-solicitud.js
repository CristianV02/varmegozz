function agregardatosCrearSolicitud() {
    let cedula = $('#cedula').val();
    
    let cadena = "cedula=" + cedula;

    let mensaje_si = "Una solicitud fue registrado correctamente.";
    let mensaje_no = "Error, NO se registró una solicitud.";

    $.ajax({
        type: "POST",
        url: "../modelo/accioneCrearSolicitud.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaCrearSolicitud();
                //$('#tabla').load('../administrador/usuarios.php');
                // location.reload();


            }
        }
    });
}
function cargarTablaCrearSolicitud() {
    $.ajax({
        type: "POST",
        url: "../administrador/solicitud.php",
        async: true,
        success: function(respuesta) {
            // console.log(respuesta);
            $("#tablaCrearSolicitud").html("");
            $("#tablaCrearSolicitud").html(respuesta);
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}