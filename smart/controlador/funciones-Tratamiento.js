// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosTratamiento() {
    let tratamiento = $('#tratamiento').val();

    let cadena = "tratamiento=" + tratamiento;

    let mensaje_si = "El mecanismo registrada correctamente.";
    let mensaje_no = "Error, NO se registró el mecanismo.";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-tratamiento.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaTratamiento();
                location.reload();


            }
        }
    });
}
// Función para cargar información  a modificar
function agregarformTratamiento(datos) {
    let d = datos.split('||');
    $('#codigou').val(d[0]);
    $('#tratamientou').val(d[1]);

}
// Función para modificar 
function modificarTratamiento() {
    let codigo = $('#codigou').val();
    let tratamiento = $('#tratamientou').val();

    let cadena = "codigo=" + codigo +
        "&tratamiento=" + tratamiento;

    let mensaje_si = "un mecanismo se ha modificado con exito";
    let mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-tratamiento.php?accion=modificar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaTratamiento();
                // location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaTratamiento() {
    $.ajax({
        type: "POST",
        url: "../administrador/tratamiento.php",
        async: true,
        success: function(respuesta) {
            $("#tablaTratamiento").html("");
            $("#tablaTratamiento").html(respuesta);
            location.reload();
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoTratamiento() {

    codigo = $('#codigou').val();

    alertify.confirm('Eliminar periodo', ' ¿Está seguro de eliminar un tipo plaga ' + codigo + '?',
        function() {
            eliminarDatosTratamiento(codigo)
        },
        function() {
            alertify.error('Error, no se ha eliminado un tipo plaga ' + codigo)
        });

}

function eliminarDatosTratamiento(codigo) {
    let cadena = "codigo=" + codigo;
    let mensaje_si = "El tratamiento se ha eliminado con exito";
    let mensaje_no = "Error de eliminacion";
    $.ajax({
        type: "POST",
        url: "../modelo/acciones-tratamiento.php?accion=eliminar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaTratamiento();
                location.reload();

            }
        }
    });
}

function mostrarOcultar(event) {
    event.stopPropagation();
    var navbarCollapse = document.getElementById("navbarSupportedContent");
    if (navbarCollapse.style.display === "none") {
        navbarCollapse.style.display = "block"; // Si está oculto, mostrarlo
    } else {
        navbarCollapse.style.display = "none"; // Si está visible, ocultarlo
    }
}
