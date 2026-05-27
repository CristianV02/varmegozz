// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosMecanismo() {
    nombre = $('#nombre').val();
    tipo = $('#tipo').val();

    cadena = "&nombre=" + nombre +
        "&tipo=" + tipo;

    accion = "registrar";
    mensaje_si = "El mecanismo registrada correctamente.";
    mensaje_no = "Error, NO se registró el mecanismo.";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-mecanismo.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaMecanismo();
                location.reload();


            }
        }
    });
}
// Función para cargar información  a modificar
function agregarformMecanismo(datos) {
    d = datos.split('||');
    $('#codigou').val(d[0]);
    $('#nombreu').val(d[1]);
    $('#tipou').val(d[2]);

}
// Función para modificar 
function modificarMecanismo() {
    codigo = $('#codigou').val();
    nombre = $('#nombreu').val();
    tipo = $('#tipou').val();

    cadena = "codigo=" + codigo +
        "&nombre=" + nombre +
        "&tipo=" + tipo;


    accion = "modificar";
    mensaje_si = "un mecanismo se ha modificado con exito";
    mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-mecanismo.php?accion=modificar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaMecanismo();
                // $('#tabla').load('../administrador/Mecanismo.php');
                //location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaMecanismo() {
    $.ajax({
        type: "POST",
        url: "../administrador/mecanismo.php",
        async: true,
        success: function(respuesta) {
            $("#tablaMecanismo").html("");
            $("#tablaMecanismo").html(respuesta);
      location.reload();
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoMecanismo() {

    codigo = $('#codigou').val();

    alertify.confirm('Eliminar periodo', ' ¿Está seguro de eliminar un mecanismo ' + codigo + '?',
        function() {
            eliminarDatosMecanismo(codigo)
        },
        function() {
            alertify.error('Error, no se ha eliminado un mecanismo ' + codigo)
        });

}

function eliminarDatosMecanismo(codigo) {
    cadena = "codigo=" + codigo;

    mensaje_si = "un mecanismo se ha eliminado con exito";
    mensaje_no = "Error de registro";
    $.ajax({
        type: "POST",
        url: "../modelo/acciones-mecanismo.php?accion=eliminar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                
                cargarTablaMecanismo();
                //  $('#tabla').load('../administrador/Sustancias.php');
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
