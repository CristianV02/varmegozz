function agregardatosFacultad() {
    let nombre_de_facultad = $('#nombre_de_facultad').val();

    let cadena = "nombre_de_facultad=" + nombre_de_facultad;

    let mensaje_si = "Los datos  se han registrado correctamente.";
    let mensaje_no = "Error, NO se registró los datos.";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesFacultad.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaFacultad();
                location.reload();
            }
        }

    });
}
// Función para cargar información  a modificar
function agregarFormFacultad(datos) {
   let d = datos.split('||');
    $('#cod_facultadu').val(d[0]);
    $('#nombre_de_facultadu').val(d[1]);
}
// Función para modificar 
function modificarFacultad() {
    let cod_facultad = $('#cod_facultadu').val();
    let nombre_de_facultad = $('#nombre_de_facultadu').val();

    let cadena = "cod_facultad=" + cod_facultad +
        "&nombre_de_facultad=" + nombre_de_facultad;

    let mensaje_si = "los datos  se han modificado con exito";
    let mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesFacultad.php?accion=modificar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaFacultad();
                location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaFacultad() {
    $.ajax({
        type: "POST",
        url: "../administrador/facultad.php",
        async: true,
        success: function(respuesta) {
            //console.log(respuesta);
            $("#tablaFacultad").html("");
            $("#tablaFacultad").html(respuesta);
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoFacultad() {
    cod_facultad = $('#cod_facultadu').val();
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        eliminarDatosFacultad(cod_facultad);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminarDatosFacultad(cod_facultad) {
    let cadena = "cod_facultad=" + cod_facultad;
    let mensaje_si = "Los datos se han borrado correctamente.";
    let mensaje_no = "Error.. NO se eliminólos datos.";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesFacultad.php?accion=eliminar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaFacultad();
                location.reload();
            }
        }
    });
}