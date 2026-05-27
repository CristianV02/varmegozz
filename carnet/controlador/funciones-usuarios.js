// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#usuario').val();
//     $('#contrasena').val();
// }

function agregarDatosUsuario() {
  id_usuario = $("#id_usuario").val();
  nombres_apellidos = $("#nombres_apellidos").val();
  usuario = $("#usuario").val();
  contrasena = $("#contrasena").val();
  id_rol = $("#id_rol").val();

  cadena ="id_usuario=" + id_usuario +
  "&nombres_apellidos=" + nombres_apellidos +
    "&usuario=" + usuario +
    "&contrasena=" + contrasena +
    "&id_rol=" + id_rol;

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
        // location.reload();
      }
    },
  });
}
// Función para cargar información  a modificar
function agregarformUsuario(datos) {
  d = datos.split("||");
  $("#idu").val(d[0]);
  $("#id_usuariou").val(d[1]);
  $("#nombres_apellidosu").val(d[2]);
  $("#usuariou").val(d[3]);
  $("#contrasenau").val(d[4]);
  $("#id_rolu").val(d[5]);
}
// Función para modificar
function modificarUsuario() {
  id = $("#idu").val();
  id_usuario = $("#id_usuariou").val();
  nombres_apellidos = $("#nombres_apellidosu").val();
  usuario = $("#usuariou").val();
  contrasena = $("#contrasenau").val();
  id_rol = $("#id_rolu").val();

  cadena ="id=" + id +
  "&id_usuario=" + id_usuario +
    "&nombres_apellidos=" + nombres_apellidos +
    "&usuario=" + usuario +
    "&contrasena=" + contrasena +
    "&id_rol=" + id_rol;

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
        // $('#tabla').load('../administrador/usuarios.php');
        //location.reload();
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
      $("#tablaUsuario").html("");
      $("#tablaUsuario").html(respuesta);
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoUsuario() {
  id = $("#idu").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar el usuario " + id + "?",
    function () {
      eliminarDatos(id_usuario);
    },
    function () {
      alertify.error("Error, no se ha eliminado el usuario " + id);
    }
  );
}

function eliminarDatos(id_usuario) {
  cadena = "id=" + id;
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
        // location.reload();
      }
    },
  });
}
