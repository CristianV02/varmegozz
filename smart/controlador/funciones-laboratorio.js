// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosLaboratorio() {
  nombreLaboratorio = $("#nombreLaboratorio").val();

  cadena =
    "nombreLaboratorio=" +
    nombreLaboratorio;


  let mensaje_si = "El laboratorio fue registrado correctamente.";
  let mensaje_no = "Error, NO se registró el laboratorio.";

  $.ajax({
    type: "POST",
    url: "../modelo/accionesLaboratorio.php?accion=registrar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaLaboratorio();
      }
    },
  });
}
// Función para cargar información  a modificar
function agregarformLaboratorio(datos) {
  d = datos.split("||");
  $("#codigou").val(d[0]);
  $("#nombreLaboratoriou").val(d[1]);
}
// Función para modificar
function modificarLaboratorio() {
  codigo = $("#codigou").val();
  nombreLaboratorio = $("#nombreLaboratoriou").val();

  cadena =
    "codigo=" +
    codigo +
    "&nombreLaboratorio=" +
    nombreLaboratorio;

  let mensaje_si = "La Laboratorio se ha modificado con exito";
  let mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/accionesLaboratorio.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaLaboratorio();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaLaboratorio() {
  $.ajax({
    type: "POST",
    url: "../administrador/laboratorio.php",
    async: true,
    success: function (respuesta) {
      $("#tablaLaboratorios").html("");
      $("#tablaLaboratorios").html(respuesta);
        location.reload();
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoLaboratorio() {
  codigo = $("#codigou").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar una Laboratorio " + codigo + "?",
    function () {
      eliminarDatos(codigo);
    },
    function () {
      alertify.error("Error, no se ha eliminado una Laboratorio " + codigo);
    }
  );
}

function eliminarDatos(codigo) {
  cadena = "codigo=" + codigo;
  mensaje_si = "Los datos se han borrado correctamente.";
  mensaje_no = "Error.. NO se eliminó el dato.";
  $.ajax({
    type: "POST",
    url: "../modelo/accionesLaboratorio.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaLaboratorio();
        //  $('#tabla').load('../administrador/Sustancias.php');
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
