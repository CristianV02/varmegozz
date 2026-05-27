// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#usuario').val();
//     $('#contrasena').val();
// }

function agregardatosUsuario() {
  tipo_id = $("#tipo_id").val();
  identificacion = $("#identificacion").val();
  nombre = $("#nombre").val();
  apellido = $("#apellido").val();
  usuario = $("#usuario").val();
  contrasena = $("#contrasena").val();
  correo = $("#correo").val();
  telefono = $("#telefono").val();
  direccion = $("#direccion").val();
  rol = $("#rol").val();

  cadena =
    "tipo_id=" +
    tipo_id +
    "&identificacion=" +
    identificacion +
    "&nombre=" +
    nombre +
    "&apellido=" +
    apellido +
    "&usuario=" +
    usuario +
    "&contrasena=" +
    contrasena +
    "&correo=" +
    correo +
    "&telefono=" +
    telefono +
    "&direccion=" +
    direccion +
    "&rol=" +
    rol;

  accion = "registrar";
  mensaje_si = "El usuario registrado correctamente.";
  mensaje_no = "Error, NO se registró el usuario.";

  $.ajax({
    type: "POST",
    url: "../modelo/accionesUsuario.php?accion=registrar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaUsuario();
        location.reload();
      }
    },
  });
}
// Función para cargar información  a modificar
function agregarformUsuario(datos) {
  d = datos.split("||");
  $("#codigou").val(d[0]);
  $("#tipo_idu").val(d[1]);
  $("#identificacionu").val(d[2]);
  $("#nombreu").val(d[3]);
  $("#apellidou").val(d[4]);
  $("#usuariou").val(d[5]);
  $("#contrasenau").val(d[6]);
  $("#correou").val(d[7]);
  $("#telefonou").val(d[8]);
  $("#direccionu").val(d[9]);
  $("#rolu").val(d[10]);
}
// Función para modificar
function modificarUsuario() {
  codigo = $("#codigou").val();
  tipo_id = $("#tipo_idu").val();
  identificacion = $("#identificacionu").val();
  nombre = $("#nombreu").val();
  apellido = $("#apellidou").val();
  usuario = $("#usuariou").val();
  contrasena = $("#contrasenau").val();
  correo = $("#correou").val();
  telefono = $("#telefonou").val();
  direccion = $("#direccionu").val();
  rol = $("#rolu").val();

  cadena =
    "codigo=" +
    codigo +
    "&tipo_id=" +
    tipo_id +
    "&identificacion=" +
    identificacion +
    "&nombre=" +
    nombre +
    "&apellido=" +
    apellido +
    "&usuario=" +
    usuario +
    "&contrasena=" +
    contrasena +
    "&correo=" +
    correo +
    "&telefono=" +
    telefono +
    "&direccion=" +
    direccion +
    "&rol=" +
    rol;

  accion = "modificar";
  mensaje_si = "El usuario modificado con exito";
  mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/accionesUsuario.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaUsuario();
        location.reload();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaUsuario() {
  $.ajax({
    type: "POST",
    url: "../administrador/usuarios.php",
    async: true,
    success: function (respuesta) {
      // console.log(respuesta);
      $("#tablaUsuarios").html("");
      $("#tablaUsuarios").html(respuesta);
      location.reload();
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoUsuario() {
  codigo = $("#codigou").val();
  identificacion = $("#identificacionu").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar el usuario " + identificacion + "?",
    function () {
      eliminarDatos(codigo, identificacion);
    },
    function () {
      alertify.error("Error, no se ha eliminado el usuario " + identificacion);
    }
  );
}

function eliminarDatos(codigo, identificacion) {
  cadena = "codigo=" + codigo + "&identificacion=" + identificacion;
  mensaje_si = "El usuario se ha eliminado con exito";
  mensaje_no = "Error de eliminacion";
  $.ajax({
    type: "POST",
    url: "../modelo/accionesUsuario.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaUsuario();
        //  $('#tabla').load('../administrador/usuarios.php');
        location.reload();
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
