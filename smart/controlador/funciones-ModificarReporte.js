function agregarformReportes(datos) {
  let d = datos.split("||");
  console.log("datos=" + datos);
  $("#codigou").val(d[0]);
  $("#tipo_documentou").val(d[1]);
  $("#usuariou").val(d[2] + " - " + d[3]);
  $("#fecha_de_iniciou").val(d[4]);
  $("#hora_de_iniciou").val(d[5]);
  $("#fecha_finu").val(d[6]);
  $("#hora_finu").val(d[7]);
}
// Función para modificar
function modificarReportes() {
  codigo = $("#codigou").val();
  tipo_doc = $("#tipo_documentou").val();
  info_usuario = $("#usuariou").val().split(" - ");
  usuario = info_usuario[0];
  nombre_apellido = info_usuario[1];
  fecha_de_inicio = $("#fecha_de_iniciou").val();
  hora_de_inicio = $("#hora_de_iniciou").val();
  fecha_fin = $("#fecha_finu").val();
  hora_fin = $("#hora_finu").val();

  cadena =
    "codigo=" +
    codigo +
    "&tipo_doc=" +
    tipo_doc +
    "&usuario=" +
    usuario +
    "&nombre_apellido=" +
    nombre_apellido +
    "&fecha_de_inicio=" +
    fecha_de_inicio +
    "&hora_de_inicio=" +
    hora_de_inicio +
    "&fecha_fin=" +
    fecha_fin +
    "&hora_fin=" +
    hora_fin;

  accion = "modificar";
  mensaje_si = "un reporte fue modificado con exito";
  mensaje_no = "Error de registro de un reporte";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-Reportes.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        // location.reload();
        cargarTablaReportes();
        // $('#tabla').load('../administrador/usuarios.php');
        //location.reload();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaReportes() {
  $.ajax({
    type: "POST",
    url: "../administrador/reporte.php",
    async: true,
    success: function (respuesta) {
      $("#tablaReportes").html("");
      $("#tablaReportes").html(respuesta);
      location.reload();
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoReportes() {
  codigo = $("#codigou").val();
  identificacion = $("#identificacionu").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar el usuario " + identificacion + "?",
    function () {
      eliminarDatosReportes(codigo, identificacion);
    },
    function () {
      alertify.error("Error, no se ha eliminado el usuario " + identificacion);
    }
  );
}

function eliminarDatosReportes(codigo) {
  cadena = "codigo=" + codigo;
  mensaje_si = "El usuario se ha eliminado con exito";
  mensaje_no = "Error de eliminacion";
  $.ajax({
    type: "POST",
    url: "../modelo/acciones-Reportes.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReportes();
        //  $('#tabla').load('../administrador/usuarios.php');
        // location.reload();
      }
    },
  });
}

function agregarformTratamiento(datos) {
  d = datos.split("||");
  console.log("datos= " + datos);
  $("#codigoTratamientou").val(d[0]);
  $("#usuarioTratamientou").val(d[1]);
  $("#tratamientou").val(d[2]);
  $("#tipo_plagas").val(d[3]);
  $("#cod_reportetratamientou").val(d[4]);
  $("#nivel_infestacion").val(d[5]);
}
// Función para modificar
function modificarReporteTratamiento() {
  codigo = $("#codigoTratamientou").val();
  usuario = $("#usuarioTratamientou").val();
  tratamiento = $("#tratamientou").val();
  tipo_plagas = $("#tipo_plagas").val();
  cod_reporte = $("#cod_reportetratamientou").val();
  nivel_infestacion = $("#nivel_infestacion").val();

  cadena =
    "codigo=" +
    codigo +
    "&usuario=" +
    usuario +
    "&tratamiento=" +
    tratamiento +
    "&tipo_plagas=" +
    tipo_plagas +
    "&cod_reporte=" +
    cod_reporte +
    "&nivel_infestacion=" +
    nivel_infestacion;

  accion = "modificar";
  mensaje_si = "Un tratamiento se ha modificado con exito";
  mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteTratamiento.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteTratamiento();
        // $('#tabla').load('../administrador/Mecanismo.php');
        //location.reload();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaReporteTratamiento() {
  $.ajax({
    type: "POST",
    url: "../administrador/reporte-tratamiento.php",
    async: true,
    success: function (respuesta) {
      // console.log(respuesta);
      $("#tablaReporteTratamiento").html("");
      $("#tablaReporteTratamiento").html(respuesta);
      location.reload();
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoReporteTratamiento() {
  codigo = $("#codigoTratamientou").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar un tratamiento " + codigo + "?",
    function () {
      eliminarDatosReporteTratamiento(codigo);
    },
    function () {
      alertify.error("Error, no se ha eliminado un tratamiento " + codigo);
    }
  );
}

function eliminarDatosReporteTratamiento(codigo) {
  cadena = "codigo=" + codigo;
  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteTratamiento.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error("Tratamiento no se ha podido eliminar");
      } else {
        alertify.success("Tratamiento eliminado del reporte con exito");
        // cargarTablaReporteTratamiento();
        //  $('#tabla').load('../administrador/inventario-mecanismo.php');
        location.reload();
      }
    },
  });
}

function agregarformMecanismo(datos) {
  d = datos.split("||");
  $("#codigomecanismou").val(d[0]);
  $("#cod_reportemecanismou").val(d[1]);
  $("#usuarioMecanismou").val(d[2]);
  $("#mecanismou").val(d[3]);
  $("#id_mecanismou").val(d[4]);
  $("#estadou").val(d[5]);
}
// Función para modificar
function modificarReporteMecanismo() {
  codigo = $("#codigomecanismou").val();
  usuario = $("#usuarioMecanismou").val();
  mecanismo = $("#mecanismou").val();
  id_mecanismo = $("#id_mecanismou").val();
  estado = $("#estadou").val();
  cod_reporte = $("#cod_reportemecanismou").val();

  cadena =
    "codigo=" +
    codigo +
    "&usuario=" +
    usuario +
    "&mecanismo=" +
    mecanismo +
    "&id_mecanismo=" +
    id_mecanismo +
    "&estado=" +
    estado +
    "&cod_reporte=" +
    cod_reporte;

  accion = "modificar";
  mensaje_si = "Un mecanismo se ha modificado con exito";
  mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteMecanismo.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteMecanismo();
        // $('#tabla').load('../administrador/Mecanismo.php');
        //location.reload();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaReporteMecanismo() {
  $.ajax({
    type: "POST",
    url: "../administrador/reporte-mecanismo.php",
    async: true,
    success: function (respuesta) {
      // console.log(respuesta);
      $("#tablaReporteMecanismo").html("");
      $("#tablaReporteMecanismo").html(respuesta);
      location.reload();
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoReporteMecanismo() {
  codigo = $("#codigou").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar un mecanismo de un nivel " + codigo + "?",
    function () {
      eliminarDatosReporteMecanismo(codigo);
    },
    function () {
      alertify.error(
        "Error, no se ha eliminado un mecanismo de un nivel " + codigo
      );
    }
  );
}

function eliminarDatosReporteMecanismo(codigo) {
  cadena = "codigo=" + codigo;

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteMecanismo.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteMecanismo();
        //  $('#tabla').load('../administrador/inventario-mecanismo.php');
        // location.reload();
      }
    },
  });
}

function agregarformSustancias(datos) {
  d = datos.split("||");
  $("#codigosustanciasu").val(d[0]);
  $("#cod_reportesustanciasu").val(d[1]);
  $("#usuarioSustanciasu").val(d[2]);
  $("#sustanciasu").val(d[3]);
  $("#nivel_riesgou").val(d[5]);
  $("#cantidadu").val(d[6]);
  cargarLaboratoriou(d[3]);
}
//Funcion que carga el laboratorio y nivel de riego al cambiar la sustancia
function cargarLaboratoriou(cod_sustancias) {
  console.log("Cargamos los laboratorios según la sustancia=" + cod_sustancias);
  $.ajax({
    url: "../modelo/datos-sustancias.php",
    method: "POST",
    data: { cod_sustancias: cod_sustancias },
    dataType: "json",
    success: function (data) {
      console.log("Respuesta del servidor:", data);
      console.log("Laboratorio:", data[0].laboratorio);
      let tipoProductoSelect = $("#laboratoriou");
      tipoProductoSelect.empty();
      for (const element of data) {
        tipoProductoSelect.append(
          '<option value="' +
            element.laboratorio +
            '">' +
            element.laboratorio +
            "</option>"
        );
      }
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener los laboratorios: " + error);
    },
  });
}
// Función para modificar
function modificarReporteSustancias() {
  let codigo = $("#codigosustanciasu").val();
  let cod_reporte = $("#cod_reportesustanciasu").val();
  let usuario = $("#usuarioSustanciasu").val();
  let sustancias = $("#sustanciasu").val();
  let laboratorio = $("#laboratoriou").val();
  let nivel_riesgo = $("#nivel_riesgou").val();
  let cantidad = $("#cantidadu").val();

  let cadena =
    "codigo=" +
    codigo +
    "&usuario=" +
    usuario +
    "&sustancias=" +
    sustancias +
    "&laboratorio=" +
    laboratorio +
    "&nivel_riesgo=" +
    nivel_riesgo +
    "&cantidad=" +
    cantidad +
    "&cod_reporte=" +
    cod_reporte;

  console.log("cadena=" + cadena);

  let mensaje_si = "Un sustancias se ha modificado con exito";
  let mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteSustancias.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteSustancias();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaReporteSustancias() {
  $.ajax({
    type: "POST",
    url: "../administrador/reporte-sustancias.php",
    async: true,
    success: function (respuesta) {
      $("#tablaReporteSustancias").html("");
      $("#tablaReporteSustancias").html(respuesta);
      location.reload();
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoReporteSustancias() {
  codigo = $("#codigosustanciasu").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar una sustancias de un nivel " + codigo + "?",
    function () {
      eliminarDatosReporteSustancias(codigo);
    },
    function () {
      alertify.error(
        "Error, no se ha eliminado un sustancias de un nivel " + codigo
      );
    }
  );
}

function eliminarDatosReporteSustancias(codigo) {
  cadena = "codigo=" + codigo;

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteSustancias.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error("No se ha podido eliminar la sustancia");
      } else {
        alertify.success("Sustancia eliminada del reporte con exito");
        cargarTablaReporteSustancias();
        //  $('#tabla').load('../administrador/inventario-mecanismo.php');
        // location.reload();
      }
    },
  });
}
// Función para cargar información  a modificar Hallazgo
function agregarformHallazgo(datos) {
  d = datos.split("||");
  $("#codigohallazgou").val(d[0]);
  $("#usuarioHallazgou").val(d[1]);
  $("#hallazgou").val(d[2]);
  $("#cod_reportehallazgou").val(d[3]);
  $("#oportunidad_1u").val(d[5]);
  $("#oportunidad_2u").val(d[7]);
  $("#oportunidad_3u").val(d[9]);
  $("#oportunidad_4u").val(d[11]);
}
// Función para modificar
function modificarReporteHallazgo() {
  codigo = $("#codigohallazgou").val();
  usuario = $("#usuarioHallazgou").val();
  hallazgo = $("#hallazgou").val();
  cod_reporte = $("#cod_reportehallazgou").val();
  oportunidad_1 = $("#oportunidad_1u").val();
  oportunidad_2 = $("#oportunidad_2u").val();
  oportunidad_3 = $("#oportunidad_3u").val();
  oportunidad_4 = $("#oportunidad_4u").val();

  cadena =
    "codigo=" +
    codigo +
    "&usuario=" +
    usuario +
    "&hallazgo=" +
    hallazgo +
    "&oportunidad_1=" +
    oportunidad_1 +
    "&oportunidad_2=" +
    oportunidad_2 +
    "&oportunidad_3=" +
    oportunidad_3 +
    "&oportunidad_4=" +
    oportunidad_4 +
    "&cod_reporte=" +
    cod_reporte;

  accion = "modificar";
  mensaje_si = "Un hallazgo se ha modificado con exito";
  mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteHallazgo.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteHallazgo();
        // $('#tabla').load('../administrador/Mecanismo.php');
        //location.reload();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaReporteHallazgo() {
  $.ajax({
    type: "POST",
    url: "../administrador/reporte-hallazgo.php",
    async: true,
    success: function (respuesta) {
      $("#tablaReporteHallazgo").html("");
      $("#tablaReporteHallazgo").html(respuesta);
      location.reload();
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoReporteHallazgo() {
  codigo = $("#codigohallazgou").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar un inventario de un nivel " + codigo + "?",
    function () {
      eliminarDatosReporteHallazgo(codigo);
    },
    function () {
      alertify.error(
        "Error, no se ha eliminado un inventario de un nivel " + codigo
      );
    }
  );
}

function eliminarDatosReporteHallazgo(codigo) {
  cadena = "codigo=" + codigo;

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteHallazgo.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error("No se ha podido eliminar el hallazgo");
      } else {
        alertify.success("Hallazgo eliminado del reporte con exito");
        cargarTablaReporteSustancias();
        //  $('#tabla').load('../administrador/inventario-mecanismo.php');
        // location.reload();
      }
    },
  });
}
function cargarMetodosControlu(tratamiento){
  console.log("Cargamos los métodos de control del tratamiento=" + tratamiento);
  $.ajax({
    url: "../modelo/datos-metodo_tratamiento.php",
    method: "POST",
    data: { tratamiento: tratamiento },
    dataType: "json",
    success: function (data) {
      let metodo_controlSelect = $("#metodo_control");
      metodo_controlSelect.empty();
      for (let i = 0; i < data.length; i++) {
        metodo_controlSelect.append(
          '<option value="' +
          data[i].metodo_control +
          '">' +
          data[i].metodo_control  +
          "</option>"
        );
      }
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener los metodo de control: " + error);
    },
  });
}

function cargarTipoPlagasu(tratamiento){
  console.log("Cargamos los tipo de plagas del tratamiento=" + tratamiento);
  $.ajax({
    url: "../modelo/datos-tipos-plagas.php",
    method: "POST",
    data: { tratamiento: tratamiento },
    dataType: "json",
    success: function (data) {
      console.log("data" + data);

      let tipo_plagasSelect = $("#tipo_plagasu");
      tipo_plagasSelect.empty();
      for (let i = 0; i < data.length; i++) {
        tipo_plagasSelect.append(
          '<option value="' +
          data[i].tipo_plaga +
          '">' +
          data[i].tipo_plaga  +
          "</option>"
        );
      }
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener los tipos de plagas: " + error);
    },
  });
}


function cargarCantidadu(sustancias){
  console.log("Cargamos cantdad del sustancias=" + sustancias);
  $.ajax({
    url: "../modelo/datos-cantidad.php",
    method: "POST",
    data: { sustancias: sustancias },
    dataType: "json",
    success: function (data) {
      let cantidadSelect = $("#cantidadu");
      cantidadSelect.empty();
      for (let i = 0; i < data.length; i++) {
        cantidadSelect.append(
          '<option value="' +
          data[i].valor +
          '">' +
          data[i].valor  + " " + data[i].mediciones +
          "</option>"
        );
      }
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener las empresas: " + error);
    },
  });
}