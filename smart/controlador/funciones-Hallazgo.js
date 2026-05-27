// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosHallazgos() {
    donde_se_encuentra = $('#donde_se_encuentra').val();
    descripcion = $('#descripcion').val();
    mejora = $('#mejora').val();
    fotos = $('#fotos').val();
    identificaciones_cliente = $('#identificaciones_cliente').val();

    cadena = "donde_se_encuentra=" + donde_se_encuentra +
        "&descripcion=" + descripcion +
        "&mejora=" + mejora +
        "&fotos=" + fotos +
        "&identificaciones_cliente=" + identificaciones_cliente;

    accion = "registrar";
    mensaje_si = "El nivel de riegos registrada correctamente.";
    mensaje_no = "Error, NO se registró el mecanismo.";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-Hallazgo.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaHallazgo();
                //$('#tabla').load('../administrador/mecanismo.php');
                // location.reload();


            }
        }
    });
}
// Función para cargar información  a modificar
function agregarformHallazgos(datos) {
    d = datos.split('||');
    $('#codigou').val(d[0]);
    $('#donde_se_encuentrau').val(d[1]);
    $('#descripcionu').val(d[2]);
    $('#mejorau').val(d[3]);
    $('#fotosu').val(d[4]);
    $('#identificaciones_clienteu').val(d[5]);
}
// Función para modificar 
function modificarHallazgos() {
    codigo = $('#codigou').val();
    donde_se_encuentra = $('#donde_se_encuentrau').val();
    descripcion = $('#descripcionu').val();
    mejora = $('#mejorau').val();
    fotos = $('#fotosu').val();
    identificaciones_cliente = $('#identificaciones_clienteu').val();

    cadena = "codigo=" + codigo +
        "&donde_se_encuentra=" + donde_se_encuentra +
        "&descripcion=" + descripcion +
        "&mejora=" + mejora +
        "&fotos=" + fotos +
        "&identificaciones_cliente=" + identificaciones_cliente;

    accion = "modificar";
    mensaje_si = "Un nivel se ha modificado con exito";
    mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-Hallazgo.php?accion=modificar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaHallazgo();
                // $('#tabla').load('../administrador/Mecanismo.php');
                //location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaHallazgo() {
    $.ajax({
        type: "POST",
        url: "../administrador/hallazgos.php",
        async: true,
        success: function(respuesta) {
            // console.log(respuesta);
            $("#tablaHallazgos").html("");
            $("#tablaHallazgos").html(respuesta);
      location.reload();
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoHallazgos() {

    codigo = $('#codigou').val();

    alertify.confirm('Eliminar periodo', ' ¿Está seguro de eliminar un hallazgo ' + codigo + '?',
        function() {
            eliminarDatosHallazgos(codigo)
        },
        function() {
            alertify.error('Error, no se ha eliminado un hallazgo' + codigo)
        });

}

function eliminarDatosHallazgos(codigo) {
    cadena = "codigo=" + codigo;
    
    mensaje_si = "Un hallazgo se ha modificado con exito";
    mensaje_no = "Error de registro";
    $.ajax({
        type: "POST",
        url: "../modelo/acciones-Hallazgo.php?accion=eliminar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaHallazgo();
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