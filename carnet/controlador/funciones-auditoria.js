function agregarDatosAuditoria() {
    descripcion = $('#descripcion').val();
    usuario = $('#usuario').val();
    tabla = $('#tabla').val();
    fecha = $('#fecha').val();

    cadena = "descripcion=" + descripcion +
        "&usuario=" + usuario +
        "&tabla=" + tabla +
        "&fecha=" + fecha;


    accion = "registrar";
    mensaje_si = "Los datos  se han registrado correctamente.";
    mensaje_no = "Error, NO se registró los datos.";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesAuditoria.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaAuditoria();
                //$('#tabla').load("../administrador/redConocimiento.php");
                location.reload();
            }
        }

    });
}
// Función para cargar información  a modificar
function agregarFormAuditoria(datos) {
    d = datos.split('||');
    $('#idu').val(d[0]);
    $('#descripcionu').val(d[1]);
    $('#usuariou').val(d[3]);
    $('#tablau').val(d[4]);
    $('#fechau').val(d[5]);
}
// Función para modificar 
function modificarAuditoria() {
    id = $('#idu').val();
    descripcion = $('#descripcionu').val();
    usuario = $('#usuariou').val();
    tabla = $('#tablau').val();
    fecha = $('#fechau').val();

    cadena = "id=" + id +
        "&descripcion=" + descripcion +
        "&usuario=" + usuario +
        "&tabla=" + tabla +
        "&fecha=" + fecha;

    accion = "modificar";
    mensaje_si = "los datos  se han modificado con exito";
    mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesAuditoria.php?accion=modificar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaAuditoria();
                // $('#tabla').load("../administrador/redConocimiento.php");
                location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaAuditoria() {
    $.ajax({
        type: "POST",
        url: "../administrador/auditoria.php",
        async: true,
        success: function(respuesta) {
            //console.log(respuesta);
            $("#tablaAuditoria").html("");
            $("#tablaAuditoria").html(respuesta);
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoAuditoria() {
    id = $('#idu').val();
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        eliminarDatosAuditoria(id);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminarDatosAuditoria(id) {
    cadena = "id=" + id;
    accion = "eliminar";
    mensaje_si = "Los datos se han borrado correctamente.";
    mensaje_no = "Error.. NO se eliminólos datos.";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesAuditoria.php?accion=eliminar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaAuditoria();
                // $('#tabla').load("../administrador/redConocimiento.php");
                location.reload();
            }
        }
    });
}