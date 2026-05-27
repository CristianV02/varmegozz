// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#usuario').val();
//     $('#contrasena').val();
// }

function agregardatosReportes() {
    let tipo_doc = $('#tipo_doc').val();
    let usuario = $('#usuario').val();
    let nombre_apellido = $('#nombre_apellido').val();
    let fecha_de_inicio = $('#fecha_de_inicio').val();
    let hora_de_inicio = $('#hora_de_inicio').val();
    let fecha_fin = $('#fecha_fin').val();
    let hora_fin = $('#hora_fin').val();
    let cantidad_mecanismo = $('#cantidad_mecanismo').val();
    let cantidad_de_sustancia = $('#cantidad_de_sustancia').val();
    let cantidad_de_hallazgo = $('#cantidad_de_hallazgo').val();
    let ver_pdf = $('#ver_pdf').val();

    let cadena = "tipo_doc = " + tipo_doc +
        "&usuario=" + usuario +
        "&nombre_apellido=" + nombre_apellido +
        "&fecha_de_inicio=" + fecha_de_inicio +
        "&hora_de_inicio=" + hora_de_inicio +
        "&fecha_fin=" + fecha_fin +
        "&hora_fin=" + hora_fin +
        "&cantidad_mecanismo=" + cantidad_mecanismo +
        "&cantidad_de_sustancia=" + cantidad_de_sustancia +
        "&cantidad_de_hallazgo=" + cantidad_de_hallazgo +
        "&ver_pdf=" + ver_pdf;

    let mensaje_si = "Un reporte fue registrado correctamente.";
    let mensaje_no = "Error, NO se registró un reporte.";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-Reportes.php?accion=registrar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaReportes();
                //$('#tabla').load('../administrador/usuarios.php');
                // location.reload();


            }
        }
    });
}
// Función para cargar información  a modificar
function agregarformReportes(datos) {
    d = datos.split('||');
    $('#codigou').val(d[0]);
    $('#tipo_docu').val(d[1]);
    $('#usuariou').val(d[2]);
    $('#nombre_apellidou').val(d[3]);
    $('#fecha_de_iniciou').val(d[4]);
    $('#hora_de_iniciou').val(d[5]);
    $('#fecha_finu').val(d[6]);
    $('#hora_finu').val(d[7]);
    $('#cantidad_mecanismou').val(d[8]);
    $('#cantidad_de_sustanciau').val(d[9]);
    $('#cantidad_de_hallazgou').val(d[10]);
    $('#ver_pdfu').val(d[11]);
}
// Función para modificar 
function modificarReportes() {
    let codigo = $('#codigou').val();
    let tipo_doc = $('#tipo_docu').val();
    let usuario = $('#usuariou').val();
    let nombre_apellido = $('#nombre_apellidou').val();
    let fecha_de_inicio = $('#fecha_de_iniciou').val();
    let hora_de_inicio = $('#hora_de_iniciou').val();
    let fecha_fin = $('#fecha_finu').val();
    let hora_fin = $('#hora_finu').val();
    let cantidad_mecanismo = $('#cantidad_mecanismou').val();
    let cantidad_de_sustancia = $('#cantidad_de_sustanciau').val();
    let cantidad_de_hallazgo = $('#cantidad_de_hallazgou').val();
    let ver_pdf = $('#ver_pdfu').val();


    let cadena = "codigo=" + codigo +
        "&tipo_doc=" + tipo_doc +
        "&usuario=" + usuario +
        "&nombre_apellido=" + nombre_apellido +
        "&fecha_de_inicio=" + fecha_de_inicio +
        "&hora_de_inicio=" + hora_de_inicio +
        "&fecha_fin=" + fecha_fin +
        "&hora_fin=" + hora_fin +
        "&cantidad_mecanismo=" + cantidad_mecanismo +
        "&cantidad_de_sustancia=" + cantidad_de_sustancia +
        "&cantidad_de_hallazgo=" + cantidad_de_hallazgo +
        "&ver_pdf=" + ver_pdf;
    let mensaje_si = "un reporte fue modificado con exito";
    let mensaje_no = "Error de registro de un reporte";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-Reportes.php?accion=modificar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaReportes();
                // $('#tabla').load('../administrador/usuarios.php');
                //location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaReportes() {
    $.ajax({
        type: "POST",
        url: "../administrador/Reportes.php",
        async: true,
        success: function (respuesta) {
            // console.log(respuesta);
            $("#tablaReportes").html("");
            $("#tablaReportes").html(respuesta);
            location.reload();
        },
        error: function (request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoReportes() {

    codigo = $('#codigou').val();
    identificacion = $('#identificacionu').val();

    alertify.confirm('Eliminar periodo', ' ¿Está seguro de eliminar el usuario ' + identificacion + '?',
        function () {
            eliminarDatosReportes(codigo, identificacion)
        },
        function () {
            alertify.error('Error, no se ha eliminado el usuario ' + identificacion)
        });

}

function eliminarDatosReportes(codigo,) {
    cadena = "codigo=" + codigo;
    mensaje_si = "El reporte se ha eliminado con exito";
    mensaje_no = "Error de eliminacion";
    $.ajax({
        type: "POST",
        url: "../modelo/acciones-Reportes.php?accion=eliminar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaReportes();
                //  $('#tabla').load('../administrador/usuarios.php');
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