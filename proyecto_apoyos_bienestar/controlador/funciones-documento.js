// // Información del formulario
// var cmp_nombre_redconocimiento = document.getElementById('nombre_redConocimiento');
// // Información para capturar los errores
// var errornombreredconocimiento = document.getElementById('errornombreredconocimiento');

// errornombreredconocimiento.style.color = 'red';

// function initRedconocimiento() {
//     $('#guardarNuevoRedConocimiento').click(function (evt) {
//         evt.preventDefault();
//         validarRedconocimiento();
//     });
// }

// function validarRedconocimiento() {

//     var mensajeredconocimiento = [];

//     restriccion = 0;

//     if (cmp_nombre_redconocimiento.value === null || cmp_nombre_redconocimiento.value === '') {
//         restriccion++;
//         mensajeredconocimiento.push('Debe seleccionar el nombre de la red de conocimiento.');
//         cmp_nombre_redconocimiento.focus();
//     } else {
//         console.log("TODOS LOS CAMPOS ESTAN LLENOS");
//     }

//     // Verifica que todos los campos estén diligenciados
//     if (restriccion < 1) {
//         console.log("Vamos a registrar la red de conocimiento...");
//         agregarDatosRedConocimiento(cmp_nombre_redconocimiento.value);
//     } else {
//         console.log("Debe continuar revisando por favor...");

//         errornombreredconocimiento.innerHTML = mensajeredconocimiento;
//     }

// }
// Función para registrar productos
function agregarDatosDocumento() {
    nombre = $('#nombre').val();
    sigla = $('#sigla').val();

cadena = "nombre=" + nombre +
         "&sigla=" + sigla;

accion = "registrar";
mensaje_si = "Los datos  se han registrado correctamente.";
mensaje_no = "Error, NO se registró los datos.";

$.ajax({
type: "POST",
url: "../modelo/acciones-documento.php?accion=registrar",
data: cadena,
success: function (r) {
    console.log(r);
    if (r == 0) {
        alertify.error(mensaje_no);
    } else {
        alertify.success(mensaje_si);
        cargarTablaDocumento();
        //$('#tabla').load("../administrador/redConocimiento.php");
        // location.reload();
    }
}
});
}
// Función para cargar información  a modificar
function agregarFormDocumentos(datos) {
d = datos.split('||');
$('#id_tipo_documentou').val(d[0]);
$('#nombreu').val(d[1]);
$('#siglau').val(d[2]);
}
// Función para modificar 
function modificarDocumento() {
id_tipo_documento = $('#id_tipo_documentou').val();
nombre = $('#nombreu').val();
sigla = $('#siglau').val();

cadena = "id_tipo_documento=" + id_tipo_documento +
            "&nombre=" + nombre +
            "&sigla=" + sigla;

accion = "modificar";
mensaje_si = "los datos  se han modificado con exito";
mensaje_no = "Error de registro";

$.ajax({
type: "POST",
url: "../modelo/acciones-documento.php?accion=modificar",
data: cadena,
success: function (r) {
    console.log(r);
    if (r == 0) {
        alertify.error(mensaje_no);
    } else {
        alertify.success(mensaje_si);
        cargarTablaDocumento();
        // $('#tabla').load("../administrador/redConocimiento.php");
        //location.reload();
    }
}
});
}
// Función para cargar información de la vista
function cargarTablaDocumento() {
$.ajax({
type: "POST",
url: "../administrador/documento.php",
async: true,
success: function (respuesta) {
    //console.log(respuesta);
    $("#tablaDocumento").html("");
    $("#tablaDocumento").html(respuesta);
},
error: function (request, error) {
    alertify.success(error);
}
});
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoDocumento() {
id_tipo_documento = $('#id_tipo_documentou').val();
var opcion = confirm("¿Esta seguro de eliminar el registro?");
if (opcion == true) {
eliminardatosDocumento(id_tipo_documento);
} else {
alert("El proceso de eliminación del registro ha sido cancelado.");
}
}

function eliminardatosDocumento(id_tipo_documento) {
cadena = "id_tipo_documento=" + id_tipo_documento;

accion = "eliminar";
mensaje_si = "Los datos se han borrado correctamente.";
mensaje_no = "Error.. NO se eliminólos datos.";

$.ajax({
type: "POST",
url: "../modelo/acciones-documento.php?accion=eliminar",
data: cadena,
success: function (r) {
    console.log(r);
    if (r == 0) {
        alertify.error(mensaje_no);
    } else {
        alertify.success(mensaje_si);
        cargarTablaDocumento();
        // $('#tabla').load("../administrador/redConocimiento.php");
        // location.reload();
    }
}
});
}
