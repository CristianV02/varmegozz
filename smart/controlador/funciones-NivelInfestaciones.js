// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosNivelInfestaciones() {
    nivel = $('#nivel').val();
    cadena = "nivel=" + nivel;

    let mensaje_si = "El nivel de infestación se registró correctamente.";
    let mensaje_no = "Error, NO se registró el nivel de infestación.";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-NivelInfestaciones.php?accion=registrar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaNivelInfestaciones();
            }
        }
    });
}
// Función para cargar información  a modificar
function agregarformNivelInfestaciones(datos) {
    d = datos.split('||');
    $('#codigou').val(d[0]);
    $('#nivelu').val(d[1]);
    // $('#id_inveu').val(d[2]);

}
// Función para modificar 
function modificarNivelInfestaciones() {
    codigo = $('#codigou').val();
    nivel = $('#nivelu').val();
    // id_inve= $('#id_inveu').val();

    cadena = "codigo=" + codigo +
        "&nivel=" + nivel;
    // "&id_inve=" + id_inve;


    accion = "modificar";
    mensaje_si = "Un nivel se ha modificado con exito";
    mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-NivelInfestaciones.php?accion=modificar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaNivelInfestaciones();
                // $('#tabla').load('../administrador/Mecanismo.php');
                //location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaNivelInfestaciones() {
    $.ajax({
        type: "POST",
        url: "../administrador/nivel-infestacion.php",
        async: true,
        success: function (respuesta) {
            $("#tablaNivelInfestaciones").html("");
            $("#tablaNivelInfestaciones").html(respuesta);
      location.reload();
        },
        error: function (request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoNivelInfestaciones() {

    codigo = $('#codigou').val();

    alertify.confirm('Eliminar periodo', ' ¿Está seguro de eliminar un inventario de un nivel ' + codigo + '?',
        function () {
            eliminarDatosNivelInfestaciones(codigo)
        },
        function () {
            alertify.error('Error, no se ha eliminado un inventario de un nivel ' + codigo)
        });

}

function eliminarDatosNivelInfestaciones(codigo) {
    cadena = "codigo=" + codigo;
    mensaje_si = "Los datos se han borrado correctamente.";
    mensaje_no = "Error.. NO se eliminó el dato.";
    $.ajax({
        type: "POST",
        url: "../modelo/acciones-NivelInfestaciones.php?accion=eliminar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaNivelInfestaciones();
                //  $('#tabla').load('../administrador/inventario-mecanismo.php');
                // location.reload();

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
