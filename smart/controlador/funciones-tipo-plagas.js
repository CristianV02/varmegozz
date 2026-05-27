// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosTipoplaga() {
    let tratamiento = $('#tratamiento').val();
    let tipo_plaga = $('#tipo_plaga').val();

    let cadena = "tratamiento=" + tratamiento +
        "&tipo_plaga=" + tipo_plaga;

    let accion = "registrar";
    let mensaje_si = "El mecanismo registrada correctamente.";
    let mensaje_no = "Error, NO se registró el mecanismo.";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-tipo-plaga.php?accion=registrar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaTipoplaga();
                location.reload();
            }
        }
    });
}
// Función para cargar información  a modificar
function agregarformTipoplaga(datos) {
    d = datos.split('||');
    $('#codigou').val(d[0]);
    $('#tratamientou').val(d[1]);
    $('#tipo_plagau').val(d[2]);

}
// Función para modificar 
function modificarTipoplaga() {
    codigo = $('#codigou').val();
    tratamiento = $('#tratamientou').val();
    tipo_plaga = $('#tipo_plagau').val();

    cadena = "codigo=" + codigo +
        "&tratamiento=" + tratamiento +
        "&tipo_plaga=" + tipo_plaga;


    accion = "modificar";
    mensaje_si = "un mecanismo se ha modificado con exito";
    mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-tipo-plaga.php?accion=modificar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaTipoplaga();
                location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaTipoplaga() {
    $.ajax({
        type: "POST",
        url: "../administrador/tipo-plagas.php",
        async: true,
        success: function (respuesta) {
            // console.log(respuesta);
            $("#tablaTipoplaga").html("");
            $("#tablaTipoplaga").html(respuesta);
            location.reload();
        },
        error: function (request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoTipoplaga() {

    codigo = $('#codigou').val();

    alertify.confirm('Eliminar periodo', ' ¿Está seguro de eliminar un tipo plaga ' + codigo + '?',
        function () {
            eliminarDatosTipoplaga(codigo)
        },
        function () {
            alertify.error('Error, no se ha eliminado un tipo plaga ' + codigo)
        });

}

function eliminarDatosTipoplaga(codigo) {
    cadena = "codigo=" + codigo;
    mensaje_si = "El tipo plaga se ha eliminado con exito";
    mensaje_no = "Error de eliminacion";
    $.ajax({
        type: "POST",
        url: "../modelo/acciones-tipo-plaga.php?accion=eliminar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaTipoplaga();
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
