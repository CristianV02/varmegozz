// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosNombreMecanismo() {
    let nombre_mecanismo = $('#nombre_mecanismo').val();

    let cadena = "&nombre_mecanismo=" + nombre_mecanismo;

    
    let mensaje_si = "El mecanismo registrada correctamente.";
    let mensaje_no = "Error, NO se registró el mecanismo.";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-nombre-mecanismo.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaNombreMecanismo();
                // location.reload();


            }
        }
    });
}
// Función para cargar información  a modificar
function agregarformNombreMecanismo(datos) {
    let d = datos.split('||');
    $('#codigou').val(d[0]);
    $('#nombre_mecanismou').val(d[1]);

}
// Función para modificar 
function modificarNombreMecanismo() {
    let codigo = $('#codigou').val();
    let nombre_mecanismo = $('#nombre_mecanismou').val();

    let cadena = "codigo=" + codigo +
        "&nombre_mecanismo=" + nombre_mecanismo;

    let mensaje_si = "un mecanismo se ha modificado con exito";
    let mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-nombre-mecanismo.php?accion=modificar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaNombreMecanismo();
                // $('#tabla').load('../administrador/Mecanismo.php');
                //location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaNombreMecanismo() {
    $.ajax({
        type: "POST",
        url: "../administrador/nombre_mecanismo.php",
        async: true,
        success: function(respuesta) {
            // console.log(respuesta);
            $("#tablaNombreMecanismo").html("");
            $("#tablaNombreMecanismo").html(respuesta);
      location.reload();
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoNombreMecanismo() {

    codigo = $('#codigou').val();

    alertify.confirm('Eliminar periodo', ' ¿Está seguro de eliminar un mecanismo ' + codigo + '?',
        function() {
            eliminarDatosNombreMecanismo(codigo)
        },
        function() {
            alertify.error('Error, no se ha eliminado un mecanismo ' + codigo)
        });

}

function eliminarDatosNombreMecanismo(codigo) {
    let cadena = "codigo=" + codigo;
    let mensaje_si = "un mecanismo se ha eliminado con exito";
    let mensaje_no = "Error de registro";
    $.ajax({
        type: "POST",
        url: "../modelo/acciones-nombre-mecanismo.php?accion=eliminar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                
                cargarTablaNombreMecanismo();
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
