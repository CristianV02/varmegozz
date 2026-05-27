// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosSustancias() {
  nombre = $("#nombre").val();
  laboratorio = $("#laboratorio").val();
  canti_inventario = $("#canti_inventario").val();
  nivel_riesgo = $("#nivel_riesgo").val();
  fecha_vencimiento = $("#fecha_vencimiento").val();
  registro_sanitario = $("#registro_sanitario").val();

  cadena =
    "nombre=" +
    nombre +
    "&laboratorio=" +
    laboratorio +
    "&canti_inventario=" +
    canti_inventario +
    "&nivel_riesgo=" +
    nivel_riesgo +
    "&fecha_vencimiento=" +
    fecha_vencimiento +
    "&registro_sanitario=" +
    registro_sanitario;


  accion = "registrar";
  mensaje_si = "La sustancias registrada correctamente.";
  mensaje_no = "Error, NO se registró el Apoyo.";

  $.ajax({
    type: "POST",
    url: "../modelo/accionesSustancias.php?accion=registrar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaSustancias();
        //$('#tabla').load('../administrador/Apoyoss.php');
        // location.reload();
      }
    },
  });
}
// Función para cargar información  a modificar
function agregarformSustancias(datos) {
  d = datos.split("||");
  $("#codigou").val(d[0]);
  $("#nombreu").val(d[1]);
  $("#laboratoriou").val(d[2]);
  $("#canti_inventariou").val(d[3]);
  $("#nivel_riesgou").val(d[4]);
  $("#fecha_vencimientou").val(d[5]);
  $("#registro_sanitariou").val(d[6]);
}
// Función para modificar
function modificarSustancias() {
  codigo = $("#codigou").val();
  nombre = $("#nombreu").val();
  laboratorio = $("#laboratoriou").val();
  canti_inventario = $("#canti_inventariou").val();
  nivel_riesgo = $("#nivel_riesgou").val();
  fecha_vencimiento = $("#fecha_vencimientou").val();
  registro_sanitario = $("#registro_sanitariou").val();

  cadena =
    "codigo=" +
    codigo +
    "&nombre=" +
    nombre +
    "&laboratorio=" +
    laboratorio +
    "&canti_inventario=" +
    canti_inventario +
    "&nivel_riesgo=" +
    nivel_riesgo +
    "&fecha_vencimiento=" +
    fecha_vencimiento +
    "&registro_sanitario=" +
    registro_sanitario;

  accion = "modificar";
  mensaje_si = "La sustancias se ha modificado con exito";
  mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/accionesSustancias.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaSustancias();
        // $('#tabla').load('../administrador/Apoyos.php');
        //location.reload();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaSustancias() {
  $.ajax({
    type: "POST",
    url: "../administrador/sustancias.php",
    async: true,
    success: function (respuesta) {
      // console.log(respuesta);
      $("#tablaSustancias").html("");
      $("#tablaSustancias").html(respuesta);
      location.reload();
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoSustancias() {
  codigo = $("#codigou").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar una sustancias " + codigo + "?",
    function () {
      eliminarDatos(codigo);
    },
    function () {
      alertify.error("Error, no se ha eliminado una sustancias " + codigo);
    }
  );
}

function eliminarDatos(codigo) {
  cadena = "codigo=" + codigo;
  mensaje_si = "Los datos se han borrado correctamente.";
  mensaje_no = "Error.. NO se eliminólos datos.";
  $.ajax({
    type: "POST",
    url: "../modelo/accionesSustancias.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaSustancias();
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
