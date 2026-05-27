// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosInventarioMecanismo() {
  nombre_mecanismo = $("#cod_mecanismo").val();
  id_inve = $("#id_inve").val();

  cadena = "nombre_mecanismo=" + nombre_mecanismo + "&id_inve=" + id_inve;

  accion = "registrar";
  mensaje_si = "El inventario del mecanismo registrada correctamente.";
  mensaje_no = "Error, NO se registró el mecanismo.";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-inventario-mecanismo.php?accion=registrar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaInventarioMecanismo();
        //$('#tabla').load('../administrador/mecanismo.php');
        // location.reload();
      }
    },
  });
}
// Función para cargar información  a modificar
function agregarformInventarioMecanismo(datos) {
  d = datos.split("||");
  $("#codigou").val(d[0]);
  $("#cod_mecanismou").val(d[1]);
  $("#id_inveu").val(d[2]);
  $("#esta_asignadou").val(d[3]);

  console.log(d);
}
// Función para modificar
function modificarInventarioMecanismo() {
  codigo = $("#codigou").val();
  nombre_mecanismo = $("#cod_mecanismou").val();
  id_inve = $("#id_inveu").val();
  esta_asignado = $("#esta_asignadou").val();

  cadena =
    "codigo=" +
    codigo +
    "&nombre_mecanismo=" +
    nombre_mecanismo +
    "&id_inve=" +
    id_inve +
    "&esta_asignado=" +
    esta_asignado;

  accion = "modificar";
  mensaje_si = "un mecanismo se ha modificado con exito";
  mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-inventario-mecanismo.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaInventarioMecanismo();
        // $('#tabla').load('../administrador/Mecanismo.php');
        //location.reload();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaInventarioMecanismo() {
  $.ajax({
    type: "POST",
    url: "../administrador/inventario-mecanismo.php",
    async: true,
    success: function (respuesta) {
      // console.log(respuesta);
      $("#tablaInventarioMecanismo").html("");
      $("#tablaInventarioMecanismo").html(respuesta);
      location.reload();
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoInventarioMecanismo() {
  codigo = $("#codigou").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar un inventario de mecanismo " + codigo + "?",
    function () {
      eliminarDatosInventarioMecanismo(codigo);
    },
    function () {
      alertify.error(
        "Error, no se ha eliminado un inventario de mecanismo " + codigo
      );
    }
  );
}

function eliminarDatosInventarioMecanismo(codigo) {
  cadena = "codigo=" + codigo;

  mensaje_si = "Los datos se han borrado correctamente.";
  mensaje_no = "Error.. NO se eliminólos datos.";
  $.ajax({
    type: "POST",
    url: "../modelo/acciones-inventario-mecanismo.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaInventarioMecanismo();
        //  $('#tabla').load('../administrador/inventario-mecanismo.php');
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
