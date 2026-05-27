// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#usuario').val();
//     $('#contrasena').val();
// }

function agregardatosDocUsuario() {
  let nombre = $("#nombre").val();
  let descripcion = $("#descripcion").val();
  let id_cliente = $("#id_cliente").val();

  let cadena =
    "nombre=" + nombre +
    "&descripcion=" + descripcion +
    "&id_cliente=" + id_cliente;

  let mensaje_si = "El documento se registró correctamente.";
  let mensaje_no = "Error, NO se registró el documento.";

  $.ajax({
    type: "POST",
    url: "../modelo/accionesDocUsuario.php?accion=registrar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaDocUsuario();
      }
    },
  });
}
// Función para cargar información  a modificar
function agregarformDocUsuario(datos) {
  d = datos.split("||");
  $("#codigou").val(d[0]);
  $("#nombreu").val(d[1]);
  $("#descripcionu").val(d[2]);
  $("#id_clienteu").val(d[4]);
}
// Función para modificar
function modificarDocUsuario() {
  let codigo = $("#codigou").val();
  let nombre = $("#nombreu").val();
  let descripcion = $("#descripcionu").val();
  let id_cliente = $("#id_clienteu").val();

  let cadena =
    "codigo=" + codigo +
    "&nombre=" + nombre +
    "&descripcion=" + descripcion +
    "&id_cliente=" + id_cliente;

  let mensaje_si = "El usuario modificado con exito";
  let mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/accionesDocUsuario.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaDocUsuario();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaDocUsuario() {
  $.ajax({
    type: "POST",
    url: "../administrador/docUsuarios.php",
    async: true,
    success: function (respuesta) {
      $("#tablaDocUsuarios").html("");
      $("#tablaDocUsuarios").html(respuesta);
      location.reload();

    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoDocUsuario() {
  let codigo = $("#codigou").val();
  let nombre = $("#nombreu").val();

  alertify.confirm(
    "Eliminar documento",
    " ¿Está seguro de eliminar el documento " + nombre + "?",
    function () {
      eliminarDatosDoc(codigo);
    },
    function () {
      alertify.error("Error, no se ha eliminado el documento " + nombre);
    }
  );
}

function eliminarDatosDoc(codigo) {
  cadena = "codigo=" + codigo;
  mensaje_si = "El documento se ha eliminado con exito";
  mensaje_no = "Error de eliminacion";
  $.ajax({
    type: "POST",
    url: "../modelo/accionesDocUsuario.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaDocUsuario();
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
