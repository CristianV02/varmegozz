function agregarDatosEstado() {
    id_solicitud = $('#id_solicitud').val();
    fecha = $('#fecha').val();
    hora = $('#hora').val();

    cadena = "id_solicitud=" + id_solicitud +
        "&fecha=" + fecha +
        "&hora=" + hora;

    accion = "registrar";
    mensaje_si = "Los datos  se han registrado correctamente.";
    mensaje_no = "Error, NO se registró los datos.";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesEstado.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaEstado();
                //$('#tabla').load("../administrador/redConocimiento.php");
                location.reload();
            }
        }

    });
}
// Función para cargar información  a modificar
function agregarFormEstado(datos) {
    d = datos.split('||');
    $('#id_registrou').val(d[0]);
    $('#id_solicitudu').val(d[1]);
    $('#fechau').val(d[2]);
    $('#horau').val(d[3]);
}
// Función para modificar 
function modificarEstado() {
    id_registro = $('#id_registrou').val();
    id_solicitud = $('#id_solicitudu').val();
    fecha = $('#fechau').val();
    hora = $('#horau').val();

    cadena = "id_registro=" + id_registro +
        "&id_solicitud=" + id_solicitud +
        "&fecha=" + fecha +
        "&hora=" + hora;

    accion = "modificar";
    mensaje_si = "los datos  se han modificado con exito";
    mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesEstado.php?accion=modificar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaEstado();
                // $('#tabla').load("../administrador/redConocimiento.php");
                location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaEstado() {
    $.ajax({
        type: "POST",
        url: "../administrador/estado.php",
        async: true,
        success: function(respuesta) {
            //console.log(respuesta);
            $("#tablaEstado").html("");
            $("#tablaEstado").html(respuesta);
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoEstado() {
    id_registro = $('#id_registrou').val();
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        eliminarDatosEstado(id_registro);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminarDatosEstado(id_registro) {
    cadena = "id_registro=" + id_registro;
    accion = "eliminar";
    mensaje_si = "Los datos se han borrado correctamente.";
    mensaje_no = "Error.. NO se eliminólos datos.";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesEstado.php?accion=eliminar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaEstado();
                // $('#tabla').load("../administrador/redConocimiento.php");
                location.reload();
            }
        }
    });
}