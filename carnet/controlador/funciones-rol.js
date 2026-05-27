function agregarDatosRol() {
    nombre_del_rol = $('#nombre_del_rol').val();
    permiso = $('#permiso').val();

    cadena = "nombre_del_rol=" + nombre_del_rol +
        "&permiso=" + permiso;

    accion = "registrar";
    mensaje_si = "Los datos  se han registrado correctamente.";
    mensaje_no = "Error, NO se registró los datos.";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesRol.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaRol();
                //$('#tabla').load("../administrador/redConocimiento.php");
                // location.reload();
            }
        }

    });
}
// Función para cargar información  a modificar
function agregarFormRol(datos) {
    d = datos.split('||');
    $('#id_rolu').val(d[0]);
    $('#nombre_del_rolu').val(d[1]);
    $('#permisou').val(d[2]);
}
// Función para modificar 
function modificarRol() {
    id_rol = $('#id_rolu').val();
    nombre_del_rol = $('#nombre_del_rolu').val();
    permiso = $('#permisou').val();

    cadena = "id_rol=" + id_rol +
        "&nombre_del_rol=" + nombre_del_rol +
        "&permiso=" + permiso;

    accion = "modificar";
    mensaje_si = "los datos  se han modificado con exito";
    mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesRol.php?accion=modificar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaRol();
                // $('#tabla').load("../administrador/redConocimiento.php");
                //location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaRol() {
    $.ajax({
        type: "POST",
        url: "../administrador/rol.php",
        async: true,
        success: function(respuesta) {
            //console.log(respuesta);
            $("#tablaRol").html("");
            $("#tablaRol").html(respuesta);
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoRol() {
    codigo = $('#codigou').val();
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        eliminarDatosRol(id_rol);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminarDatosDocumento(id_rol) {
    cadena = "id_rol=" + id_rol;
    accion = "eliminar";
    mensaje_si = "Los datos se han borrado correctamente.";
    mensaje_no = "Error.. NO se eliminólos datos.";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesRol.php?accion=eliminar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaRol();
                // $('#tabla').load("../administrador/redConocimiento.php");
                // location.reload();
            }
        }
    });
}