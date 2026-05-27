// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#usuario').val();
//     $('#contrasena').val();
// }

function agregardatosEmpresa() {
  NITRUT = $("#NITRUT").val();
  numero = $("#numero").val();
  nombre_empresa = $("#nombre_empresa").val();
  direccion = $("#direccion").val();
  info_usuario = $("#nombre_usuario").val().split(" - ");
  identificacion = info_usuario[0];
  nombre_usuario = info_usuario[1];
  telefono = $("#telefono").val();
  correo = $("#correo").val();
  cargo = $("#cargo").val();

  cadena =
    "&NITRUT=" +
    NITRUT +
    "&numero=" +
    numero +
    "&nombre_empresa=" +
    nombre_empresa +
    "&direccion=" +
    direccion +
    "&identificacion=" +
    identificacion +
    "&nombre_usuario=" +
    nombre_usuario +
    "&telefono=" +
    telefono +
    "&correo=" +
    correo +
    "&cargo=" +
    cargo;

  accion = "registrar";
  mensaje_si = "La empresa registrado correctamente.";
  mensaje_no = "Error, NO se registró la empresa.";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-empresa.php?accion=registrar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaEmpresa();
        //$('#tabla').load('../administrador/empresa.php');
        // location.reload();
      }
    },
  });
}
// Función para cargar información  a modificar
function agregarformEmpresa(datos) {
  d = datos.split("||");
  console.log(d);
  $("#codigou").val(d[0]);
  $("#NITRUTu").val(d[1]);
  $("#numerou").val(d[2]);
  $("#nombre_empresau").val(d[3]);
  $("#direccionu").val(d[4]);
  $("#nombre_usuariou").val(d[5] + " - " + d[6]);
  $("#telefonou").val(d[7]);
  $("#correou").val(d[8]);
  $("#cargou").val(d[9]);
}
// Función para modificar
function modificarEmpresa() {
  codigo = $("#codigou").val();
  NITRUT = $("#NITRUTu").val();
  numero = $("#numerou").val();
  nombre_empresa = $("#nombre_empresau").val();
  direccion = $("#direccionu").val();
  info_usuario = $("#nombre_usuariou").val().split(" - ");
  identificacion = info_usuario[0];
  nombre_usuario = info_usuario[1];
  telefono = $("#telefonou").val();
  correo = $("#correou").val();
  cargo = $("#cargou").val();

  cadena =
    "codigo=" +
    codigo +
    "&NITRUT=" +
    NITRUT +
    "&numero=" +
    numero +
    "&nombre_empresa=" +
    nombre_empresa +
    "&direccion=" +
    direccion +
    "&identificacion=" +
    identificacion +
    "&nombre_usuario=" +
    nombre_usuario +
    "&telefono=" +
    telefono +
    "&correo=" +
    correo +
    "&cargo=" +
    cargo;

  accion = "modificar";
  mensaje_si = "El usuario modificado con exito";
  mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-empresa.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaEmpresa();
        // $('#tabla').load('../administrador/Empresa.php');
        //location.reload();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaEmpresa() {
  $.ajax({
    type: "POST",
    url: "../administrador/empresa.php",
    async: true,
    success: function (respuesta) {
      // console.log(respuesta);
      $("#tablaEmpresa").html("");
      $("#tablaEmpresa").html(respuesta);
      location.reload();
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoEmpresa() {
  console.log("hola");
  codigo = $("#codigou").val();
  numero = $("#numerou").val();
  nombre = $("#nombre_empresau").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar la empresa " + nombre + "?",
    function () {
      eliminarDatosEmpresa(codigo, numero);
    },
    function () {
      alertify.error("Error, no se ha eliminado la empresa " + nombre);
    }
  );
}

function eliminarDatosEmpresa(codigo, numero) {
  cadena = "codigo=" + codigo + "&numero=" + numero;
  mensaje_si = "La empresa se ha eliminado con exito";
  mensaje_no = "Error de eliminacion";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-empresa.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaEmpresa();
        //  $('#tabla').load('../administrador/usuarios.php');
        // location.reload();
      }
    },
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
