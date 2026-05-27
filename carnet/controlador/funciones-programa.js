function agregarDatosPrograma() {
    nombre_del_programa = $('#nombre_del_programa').val();
    cod_facultad = $('#cod_facultad').val();

    cadena = "nombre_del_programa=" + nombre_del_programa +
        "&cod_facultad=" + cod_facultad;

    accion = "registrar";
    mensaje_si = "Los datos  se han registrado correctamente.";
    mensaje_no = "Error, NO se registró los datos.";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesPrograma.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaPrograma();
                //$('#tabla').load("../administrador/redConocimiento.php");
                location.reload();
            }
        }

    });
}
// Función para cargar información  a modificar
function agregarFormPrograma(datos) {
    d = datos.split('||');
    $('#id_programau').val(d[0]);
    $('#nombre_del_programau').val(d[1]);
    $('#cod_facultadu').val(d[2]);
}
// Función para modificar 
function modificarPrograma() {
    id_programa = $('#id_programau').val();
    nombre_del_programa = $('#nombre_del_programau').val();
    cod_facultad = $('#cod_facultadu').val();

    cadena = "id_programa=" + id_programa +
        "&nombre_del_programa=" + nombre_del_programa +
        "&cod_facultad=" + cod_facultad;

    accion = "modificar";
    mensaje_si = "los datos  se han modificado con exito";
    mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesPrograma.php?accion=modificar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaPrograma();
                // $('#tabla').load("../administrador/redConocimiento.php");
                location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaPrograma() {
    $.ajax({
        type: "POST",
        url: "../administrador/programa.php",
        async: true,
        success: function(respuesta) {
            //console.log(respuesta);
            $("#tablaPrograma").html("");
            $("#tablaPrograma").html(respuesta);
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoPrograma() {
    id_programa = $('#id_programau').val();
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        eliminarDatosPrograma(id_programa);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminarDatosPrograma(id_programa) {
    cadena = "id_programa=" + id_programa;
    accion = "eliminar";
    mensaje_si = "Los datos se han borrado correctamente.";
    mensaje_no = "Error.. NO se eliminólos datos.";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesPrograma.php?accion=eliminar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaPrograma();
                // $('#tabla').load("../administrador/redConocimiento.php");
                location.reload();
            }
        }
    });
}