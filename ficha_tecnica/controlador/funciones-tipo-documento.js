function agregarDatosDocumento() {
    sigla = $('#sigla').val();
    nombre = $('#nombre').val();

    cadena = "sigla=" + sigla +
        "&nombre=" + nombre;

    accion = "registrar";
    mensaje_si = "Los datos  se han registrado correctamente.";
    mensaje_no = "Error, NO se registró los datos.";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-tipo-documento.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaDocumento();
                //$('#tabla').load("../administrador/redConocimiento.php");
                location.reload();
            }
        }

    });
}
// Función para cargar información  a modificar
function agregarFormDocumentos(datos) {
    d = datos.split('||');
    $('#codigou').val(d[0]);
    $('#siglau').val(d[1]);
    $('#nombreu').val(d[2]);
}
// Función para modificar 
function modificarDocumento() {
    codigo = $('#codigou').val();
    sigla = $('#siglau').val();
    nombre = $('#nombreu').val();

    cadena = "codigo=" + codigo +
        "&sigla=" + sigla +
        "&nombre=" + nombre;

    accion = "modificar";
    mensaje_si = "los datos  se han modificado con exito";
    mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-tipo-documento.php?accion=modificar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaDocumento();
                // $('#tabla').load("../administrador/redConocimiento.php");
                location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaDocumento() {
    $.ajax({
        type: "POST",
        url: "../administrador/tipo-documento.php",
        async: true,
        success: function(respuesta) {
            //console.log(respuesta);
            $("#tablaDocumento").html("");
            $("#tablaDocumento").html(respuesta);
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoDocumento() {
    codigo = $('#codigou').val();
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        eliminarDatosDocumento(codigo);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminarDatosDocumento(codigo) {
    cadena = "codigo=" + codigo;
    accion = "eliminar";
    mensaje_si = "Los datos se han borrado correctamente.";
    mensaje_no = "Error.. NO se eliminólos datos.";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-tipo-documento.php?accion=eliminar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaDocumento();
                // $('#tabla').load("../administrador/redConocimiento.php");
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
