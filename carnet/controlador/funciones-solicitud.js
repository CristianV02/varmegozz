// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#usuario').val();
//     $('#contrasena').val();
// }

function agregarDatosSolicitud() {
    let cedula = $('#cedula').val();
    let codigo = $('#codigo').val();
    let tipo = $('#tipo').val();
    let estado = $('#estado').val();
    let realizado_por = $('#realizado_por').val();
    let fecha_realizado = $('#fecha_realizado').val();
    let recibido_por_admisiones = $('#realizado_por_admisiones').val();
    let fecha_de_admisiones = $('#fecha_de_admisiones').val();
    let entregado = $('#entregado').val();

    let cadena = "cedula=" + cedula +
        "&codigo=" + codigo +
        "&estado=" + estado +
        "&realizado_por=" + realizado_por +
        "&fecha_realiado=" + fecha_realizado +
        "&realizado_por_admisiones=" + recibido_por_admisiones +
        "&fecha_de_admisiones=" + fecha_de_admisiones +
        "&entregado=" + entregado +
        "&tipo=" + tipo;

    let mensaje_si = "Una solicitud fue registrado correctamente.";
    let mensaje_no = "Error, NO se registró una solicitud.";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesSolicitud.php?accion=registrar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaSolicitud();
                //$('#tabla').load('../administrador/usuarios.php');
                // location.reload();


            }
        }
    });
}
// Función para cargar información  a modificar
function agregarformSolicitud(datos) {
    d = datos.split('||');
    $('#id_solicitudu').val(d[0]);
    $('#fecha_de_solicitudu').val(d[1]);
    $('#estadou').val(d[2]);
    $('#nombresu').val(d[3]);
    $('#tipo_usuariou').val(d[4]);
    $('#cargou').val(d[5]);
    $('#id_usuariou').val(d[6]);
    $('#id_programau').val(d[7]);
    $('#tipou').val(d[8]);
    $('#realizado_poru').val(d[9]);
    $('#fecha_realizadou').val(d[10]);
    $('#recibido_por_admisionesu').val(d[11]);
    $('#fecha_de_admisionesu').val(d[12]);
    $('#entregadou').val(d[13]);
}
// Función para modificar 
function modificarSolicitud() {
    id_solicitud = $('#id_solicitudu').val();
    fecha_de_solicitud = $('#fecha_de_solicitudu').val();
    estado = $('#estadou').val();
    nombres = $('#nombresu').val();
    tipo_usuario = $('#tipo_usuariou').val();
    cargo = $('#cargou').val();
    id_usuario = $('#id_usuariou').val();
    id_programa = $('#id_programau').val();
    tipo = $('#tipou').val();
    realizado_por = $('#realizado_poru').val();
    fecha_realizado = $('#fecha_realizadou').val();
    recibido_por_admisiones = $('#recibido_por_admisionesu').val();
    fecha_de_admisiones = $('#fecha_de_admisionesu').val();
    entregado = $('#entregadou').val();


    cadena = "id_solicitud=" + id_solicitud +
        "&fecha_de_solicitud=" + fecha_de_solicitud +
        "&estado=" + estado +
        "&nombres=" + nombres +
        "&tipo_usuario=" + tipo_usuario +
        "&cargo=" + cargo +
        "&id_usuario=" + id_usuario +
        "&id_programa=" + id_programa +
        "&tipo=" + tipo +
        "&realizado_por=" + realizado_por +
        "&fecha_realizado=" + fecha_realizado +
        "&recibido_por_admisiones=" + recibido_por_admisiones +
        "&fecha_de_admisiones=" + fecha_de_admisiones +
        "&entregado=" + entregado;

    accion = "modificar";
    mensaje_si = "una solicitud fue modificado con exito";
    mensaje_no = "Error de registro de una solicitud";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesSolicitud.php?accion=modificar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaSolicitud();
                // $('#tabla').load('../administrador/usuarios.php');
                //location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaSolicitud() {
    $.ajax({
        type: "POST",
        url: "../administrador/solicitud.php",
        async: true,
        success: function (respuesta) {
            // console.log(respuesta);
            $("#tablaSolicitud").html("");
            $("#tablaSolicitud").html(respuesta);
        },
        error: function (request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoSolicitud() {

    id_solicitud = $('#id_solicitudu').val();

    alertify.confirm('Eliminar periodo', ' ¿Está seguro de eliminar la solicitud ' + id_solicitud + '?',
        function () {
            eliminarDatosSolicitud(id_solicitud)
        },
        function () {
            alertify.error('Error, no se ha eliminado la solicitud ' + id_solicitud)
        });

}

function eliminarDatosSolicitud(id_solicitud,) {
    cadena = "id_solicitud=" + id_solicitud;
    mensaje_si = "La solicitud se ha eliminado con exito";
    mensaje_no = "Error de eliminacion";
    $.ajax({
        type: "POST",
        url: "../modelo/accionesSolicitud.php?accion=eliminar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaSolicitud();
                //  $('#tabla').load('../administrador/usuarios.php');
                // location.reload();

            }
        }
    });
}