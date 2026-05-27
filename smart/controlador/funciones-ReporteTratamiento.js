// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosReporteTratamiento() {
    let usuario = $('#usuario').val();
    let tratamiento = $('#tratamiento').val();
    let metodo_control = $('#metodo_control').val();
    let tipo_plagas = $('#tipo_plagas').val();
    let cod_reporte = $('#cod_reporte').val();
    let nivel_infestacion = $('#nivel_infestacion').val();

    let cadena = "usuario=" + usuario +
        "&tratamiento=" + tratamiento +
        "&metodo_control=" + metodo_control +
        "&tipo_plagas=" + tipo_plagas +
        "&cod_reporte=" + cod_reporte +
        "&nivel_infestacion=" + nivel_infestacion;

    let mensaje_si = "El nivel de riegos registrada correctamente.";
    let mensaje_no = "Error, NO se registró el mecanismo.";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-ReporteTratamiento.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaReporteTratamiento();
                //$('#tabla').load('../administrador/mecanismo.php');
                // location.reload();


            }
        }
    });
}
// Función para cargar información  a modificar
function agregarformReporteTratamiento(datos) {
    d = datos.split('||');
    $('#codigou').val(d[0]);
    $('#usuariou').val(d[1]);
    $('#tratamientou').val(d[2]);
    $('#tipo_plagasu').val(d[3]);
    $('#cod_reporteu').val(d[4]);
}
// Función para modificar 
function modificarReporteTratamiento() {
    codigo = $('#codigou').val();
    usuario = $('#usuariou').val();
    tratamiento = $('#tratamientou').val();
    tipo_plagas = $('#tipo_plagasu').val();
    cod_reporte = $('#cod_reporteu').val();

    cadena = "codigo=" + codigo +
        "&usuario=" + usuario +
        "&tratamiento=" + tratamiento +
        "&tipo_plagas=" + tipo_plagas +
        "&cod_reporte=" + cod_reporte;


    accion = "modificar";
    mensaje_si = "Un tratamiento se ha modificado con exito";
    mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-ReporteTratamiento.php?accion=modificar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaReporteTratamiento();
                // $('#tabla').load('../administrador/Mecanismo.php');
                //location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaReporteTratamiento() {
    $.ajax({
        type: "POST",
        url: "../administrador/reporte-tratamiento.php",
        async: true,
        success: function(respuesta) {
            // console.log(respuesta);
            $("#tablaReporteTratamiento").html("");
            $("#tablaReporteTratamiento").html(respuesta);
            location.reload();
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoReporteTratamiento() {

    codigo = $('#codigou').val();

    alertify.confirm('Eliminar periodo', ' ¿Está seguro de eliminar un inventario de un nivel ' + codigo + '?',
        function() {
            eliminarDatosReporteTratamiento(codigo)
        },
        function() {
            alertify.error('Error, no se ha eliminado un inventario de un nivel ' + codigo)
        });

}

function eliminarDatosReporteTratamiento(codigo) {
    cadena = "codigo=" + codigo;

    mensaje_si = "Los datos se han borrado correctamente.";
    mensaje_no = "Error.. NO se eliminólos datos.";
    $.ajax({
        type: "POST",
        url: "../modelo/acciones-ReporteTratamiento.php?accion=eliminar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaReporteTratamiento();
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
