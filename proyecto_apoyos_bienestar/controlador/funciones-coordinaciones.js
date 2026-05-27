// Función para registrar productos
function agregardatosCoordinaciones() {
    coordinador = $('#coordinador').val();
    padrino_bienestar = $('#padrino_bienestar').val();
    ficha = $('#ficha').val();
    // tipoOferta = $('#tipoOferta').val();
    modalidad = $('#modalidad').val();
    etapaFicha = $('#etapaFicha').val();
    nivelFormacion = $('#nivelFormacion').val();
    programa_formacion = $('#programa_formacion').val();
    fechaInicio = $('#fechaInicio').val();
    fechaFin = $('#fechaFin').val();
    municipio = $('#municipio').val();
    instructor = $('#instructor').val();
    movilInstructor = $('#movilInstructor').val();
    sede = $('#sede').val();
    ambiente = $('#ambiente').val();
    jornada = $('#jornada').val();
    horario = $('#horario').val();
    lider_vocero = $('#lider_vocero').val();
    celular = $('#celular').val();
    correo = $('#correo').val();

cadena = "coordinador=" + coordinador +
        "&padrino_bienestar=" + padrino_bienestar +
        "&ficha=" + ficha +
        // "&tipoOferta=" + tipoOferta +
        "&modalidad=" + modalidad +
        "&etapaFicha=" + etapaFicha +
        "&nivelFormacion=" + nivelFormacion +
        "&programa_formacion=" + programa_formacion +
        "&fechaInicio=" + fechaInicio +
        "&fechaFin=" + fechaFin +
        "&municipio=" + municipio +
        "&instructor=" + instructor +
        "&movilInstructor=" + movilInstructor +
        "&sede=" + sede +
        "&ambiente=" + ambiente +
        "&jornada=" + jornada +
        "&horario=" + horario +
        "&lider_vocero=" + lider_vocero +
        "&celular=" + celular +
        "&correo=" + correo;

accion = "registrar";
mensaje_si = "Los datos  se han registrado correctamente.";
mensaje_no = "Error, NO se registró los datos.";

$.ajax({
type: "POST",
url: "../modelo/acciones-coordinaciones.php?accion=registrar",
data: cadena,
success: function (r) {
    console.log(r);
    if (r == 0) {
        alertify.error(mensaje_no);
    } else {
        alertify.success(mensaje_si);
        cargarTablaCoordinaciones();
        //$('#tabla').load("../administrador/redConocimiento.php");
        // location.reload();
    }
}
});
}
// Función para cargar información  a modificar
function agregarFormCoordinaciones(datos) {
d = datos.split('||');
$('#cod_coordinacionesu').val(d[0]);
$('#coordinadoru').val(d[1]);
$('#padrino_bienestaru').val(d[2]);
$('#fichau').val(d[3]);
// $('#tipoOfertau').val(d[4]);
$('#modalidadu').val(d[4]);
$('#etapaFichau').val(d[5]);
$('#nivelFormacionu').val(d[6]);
$('#programa_formacionu').val(d[7]);
$('#fechaIniciou').val(d[8]);
$('#fechaFinu').val(d[9]);
$('#municipiou').val(d[10]);
$('#instructoru').val(d[11]);
$('#movilInstructoru').val(d[12]);
$('#sedeu').val(d[13]);
$('#ambienteu').val(d[14]);
$('#jornadau').val(d[15]);
$('#horariou').val(d[16]);
$('#lider_vocerou').val(d[17]);
$('#celularu').val(d[18]);
$('#correou').val(d[19]);
}
// Función para modificar 
function modificarCoordinaciones() {
cod_coordinaciones = $('#cod_coordinacionesu').val();
coordinador = $('#coordinadoru').val();
padrino_bienestar = $('#padrino_bienestaru').val();
ficha = $('#fichau').val();
// tipoOferta = $('#tipoOfertau').val();
modalidad = $('#modalidadu').val();
etapaFicha = $('#etapaFichau').val();
nivelFormacion = $('#nivelFormacionu').val();
programa_formacion = $('#programa_formacionu').val();
fechaInicio = $('#fechaIniciou').val();
fechaFin = $('#fechaFinu').val();
municipio = $('#municipiou').val();
instructor = $('#instructoru').val();
movilInstructor = $('#movilInstructoru').val();
sede = $('#sedeu').val();
ambiente = $('#ambienteu').val();
jornada = $('#jornadau').val();
horario = $('#horariou').val();
lider_vocero = $('#lider_vocerou').val();
celular = $('#celularu').val();
correo = $('#correou').val();

cadena = "cod_coordinaciones=" + cod_coordinaciones +
        "&coordinador=" + coordinador +
        "&padrino_bienestar=" + padrino_bienestar +
        "&ficha=" + ficha +
        // "&tipoOferta=" + tipoOferta +
        "&modalidad=" + modalidad +
        "&etapaFicha=" + etapaFicha +
        "&nivelFormacion=" + nivelFormacion +
        "&programa_formacion=" + programa_formacion +
        "&fechaInicio=" + fechaInicio +
        "&fechaFin=" + fechaFin +
        "&municipio=" + municipio +
        "&instructor=" + instructor +
        "&movilInstructor=" + movilInstructor +
        "&sede=" + sede +
        "&ambiente=" + ambiente +
        "&jornada=" + jornada +
        "&horario=" + horario +
        "&lider_vocero=" + lider_vocero +
        "&celular=" + celular +
        "&correo=" + correo;
accion = "modificar";
mensaje_si = "los datos  se han modificado con exito";
mensaje_no = "Error de registro";

$.ajax({
type: "POST",
url: "../modelo/acciones-coordinaciones.php?accion=modificar",
data: cadena,
success: function (r) {
    console.log(r);
    if (r == 0) {
        alertify.error(mensaje_no);
    } else {
        alertify.success(mensaje_si);
        cargarTablaCoordinaciones();
        // $('#tabla').load("../administrador/redConocimiento.php");
        //location.reload();
    }
}
});
}
// Función para cargar información de la vista
function cargarTablaCoordinaciones() {
$.ajax({
type: "POST",
url: "../administrador/coordinaciones.php",
async: true,
success: function (respuesta) {
    //console.log(respuesta);
    $("#tablaCoordinaciones").html("");
    $("#tablaCoordinaciones").html(respuesta);
},
error: function (request, error) {
    alertify.success(error);
}
});
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoCoordinaciones() {
cod_coordinaciones = $('#cod_coordinacionesu').val();
var opcion = confirm("¿Esta seguro de eliminar el registro?");
if (opcion == true) {
eliminardatosCoordinaciones(cod_coordinaciones);
} else {
alert("El proceso de eliminación del registro ha sido cancelado.");
}
}

function eliminardatosCoordinaciones(cod_coordinaciones) {
cadena = "cod_coordinaciones=" + cod_coordinaciones;

accion = "eliminar";
mensaje_si = "Los datos se han borrado correctamente.";
mensaje_no = "Error.. NO se eliminólos datos.";

$.ajax({
type: "POST",
url: "../modelo/acciones-coordinaciones.php?accion=eliminar",
data: cadena,
success: function (r) {
    console.log(r);
    if (r == 0) {
        alertify.error(mensaje_no);
    } else {
        alertify.success(mensaje_si);
        cargarTablaCoordinaciones();
        // $('#tabla').load("../administrador/redConocimiento.php");
        // location.reload();
    }
}
});
}
