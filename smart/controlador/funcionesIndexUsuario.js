
let myChartTratamientos; // Variable para almacenar la instancia de Chart
let myChartSustancias; // Variable para almacenar la instancia de Chart
let myChartReporte = []; // Ahora es un array
let myChartReporteSustancias = []; // Ahora es un array
const canvasTratamiento = document.getElementById('tratamientos');
let graficas = [];
let graficasSustancias = [];
let canvasReporte = [];
let canvasReporteSustancias = [];

function cargarTratamientos(identificacion, establecimiento, mes, anio) {
  // Destruir la instancia de Chart existente
  if (myChartTratamientos) {
    myChartTratamientos.destroy();
  }
  // Gráfica de plagas
  const ctx = document.getElementById('tratamientos');

  $.ajax({
    url: "../modelo/datos-Reportes.php",
    method: "POST",
    data: {
      sustancias: 0,
      tratamiento: 1,
      identificacion: identificacion,
      establecimiento: establecimiento,
      mes: mes,
      anio: anio
    },
    dataType: "json",
    success: function (data) {
      // Array para almacenar tipos de plagas y niveles de infestación
      var tiposPlagas = [];
      var nivelInfestacionActual = [];
      var nivelesInfestacionNumerico = [];

      // Iterar sobre cada entrada en la data
      for (var i = 0; i < data.length; i++) {
        // Almacenar tipo de plagas y nivel de infestación en los arrays
        tiposPlagas.push(data[i].tipo_plagas);

        // Mapear los niveles de infestación a valores numéricos
        var nivelInfestacionActual = data[i].nivel_infestacion;
        var nivelInfestacionNumerico;

        switch (nivelInfestacionActual) {
          case 'Bajo':
            nivelInfestacionNumerico = 1;
            break;
          case 'Medio':
            nivelInfestacionNumerico = 2;
            break;
          case 'Alto':
            nivelInfestacionNumerico = 3;
            break;
          case 'N/A':
            nivelInfestacionNumerico = 0;
            break;
          default:
            nivelInfestacionNumerico = 0;
        }

        nivelesInfestacionNumerico.push(nivelInfestacionNumerico); // Almacenar el valor numérico
      }
      myChartTratamientos = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: tiposPlagas,
          datasets: [{
            label: 'Nivel',
            data: nivelesInfestacionNumerico,
            borderWidth: 0,
            borderRadius: 5,
            barThickness: tiposPlagas.length <= 4 ? 30 : 15,
            backgroundColor: function (context) {
              var value = context.dataset.data[context.dataIndex];
              return value === 1 ? '#3CCF4E' : (value === 2 ? 'rgb(233, 184, 36)' : 'rgb(216, 63, 49)');
            }
          }]
        },
        options: {
          indexAxis: 'y',
          scales: {
            x: {
              beginAtZero: true,
              ticks: {
                stepSize: 1,
                callback: function (value, index, values) {
                  return value === 0 ? 0 : (value === 1 ? 'Bajo' : (value === 2 ? 'Medio' : 'Alto'));
                }
              }
            },
            y: {
              beginAtZero: true
            }
          },
          responsive: true,
          plugins: {
            legend: {
              display: true,
              labels: {
                generateLabels: function (chart) {
                  return [{
                    text: 'Bajo',
                    fillStyle: '#3CCF4E',
                    hidden: false
                  }, {
                    text: 'Medio',
                    fillStyle: 'rgb(233, 184, 36)',
                    hidden: false
                  }, {
                    text: 'Alto',
                    fillStyle: 'rgb(216, 63, 49)',
                    hidden: false
                  }];
                }
              }
            }
          }
        }
      });
    },
    error: function (error) {
      console.error("Error: " + error);
    },
  });
}

function cargarSustancias(identificacion, establecimiento, mes, anio) {
  // Destruir la instancia de Chart existente
  if (myChartSustancias) {
    myChartSustancias.destroy();
  }
  // Gráfica de Sustancias
  const ctx1 = document.getElementById('sustancias');
  $.ajax({
    url: "../modelo/datos-Reportes.php",
    method: "POST",
    data: {
      sustancias: 1,
      tratamiento: 0,
      identificacion: identificacion,
      establecimiento: establecimiento,
      mes: mes,
      anio: anio
    },
    dataType: "json",
    success: function (data) {
      // Array para almacenar tipos de plagas y niveles de infestación
      var nombreSustancia = [];
      var cantidadSustancia = [];

      // Iterar sobre cada entrada en la data
      for (var i = 0; i < data.length; i++) {
        // Almacenar tipo de plagas y nivel de infestación en los arrays
        nombreSustancia.push(data[i].nombre);

        // Mapear los niveles de infestación a valores numéricos
        cantidadSustancia.push(data[i].cantidad);
      }

      myChartSustancias = new Chart(ctx1, {
        type: 'bar',
        data: {
          labels: nombreSustancia,
          datasets: [{
            label: 'Cantidad',
            data: cantidadSustancia,
            borderWidth: 0,
            borderRadius: 5,
            barThickness: nombreSustancia.length <= 4 ? 30 : 15,
            backgroundColor: [
              '#3CCF4E', // Color para 'Hawker'
              '#3CCF4E', // Color para 'Temprid'
              '#3CCF4E'  // Color para 'Rutto'
            ],
          }]
        },
        options: {
          indexAxis: 'y',
          scales: {
            x: {
              beginAtZero: true,
              ticks: {
                stepSize: 2,
              }
            },
            y: {
              beginAtZero: true
            }
          },
          responsive: true,
        }
      });
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener centros de formación: " + error);
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

function generarReporte(identificacion) {
  reporteEmpresa = $("#reporteEmpresa").val();
  reporteMes1 = $("#reporteMes1").val();
  reporteAnho1 = $("#reporteAnho1").val();
  reporteMes2 = $("#reporteMes2").val();
  reporteAnho2 = $("#reporteAnho2").val();
  reporteMes3 = $("#reporteMes3").val();
  reporteAnho3 = $("#reporteAnho3").val();
  for (let i = 0; i < 3; i++) {
    let reporteMes = $(`#reporteMes${i + 1}`).val();
    let reporteAnho = $(`#reporteAnho${i + 1}`).val();
    tratamientosReporte(identificacion, reporteEmpresa, reporteMes, reporteAnho, i);
    sustanciasReporte(identificacion, reporteEmpresa, reporteMes, reporteAnho, i);
  }

}

function tratamientosReporte(identificacion, establecimiento, mes, anio, index) {
  // Destruir la instancia de Chart si ya existe para el índice actual
  if (myChartReporte[index]) {
    myChartReporte[index].destroy();
    myChartReporte[index] = null;
  }
  // Gráfica de plagas
  const ctx = document.getElementById(`tratamientos${index + 1}`);
  // Limpia todo el canvas
  // const ctx = document.getElementById('tratamientos');

  $.ajax({
    url: "../modelo/datos-Reportes.php",
    method: "POST",
    data: {
      sustancias: 0,
      tratamiento: 1,
      identificacion: identificacion,
      establecimiento: establecimiento,
      mes: mes,
      anio: anio
    },
    dataType: "json",
    success: function (data) {
      // Array para almacenar tipos de plagas y niveles de infestación
      var tiposPlagas = [];
      var nivelInfestacionActual = [];
      var nivelesInfestacionNumerico = [];

      // Iterar sobre cada entrada en la data
      for (var i = 0; i < data.length; i++) {
        // Almacenar tipo de plagas y nivel de infestación en los arrays
        tiposPlagas.push(data[i].tipo_plagas);

        // Mapear los niveles de infestación a valores numéricos
        var nivelInfestacionActual = data[i].nivel_infestacion;
        var nivelInfestacionNumerico;

        switch (nivelInfestacionActual) {
          case 'Bajo':
            nivelInfestacionNumerico = 1;
            break;
          case 'Medio':
            nivelInfestacionNumerico = 2;
            break;
          case 'Alto':
            nivelInfestacionNumerico = 3;
            break;
          case 'N/A':
            nivelInfestacionNumerico = 0;
            break;
          default:
            nivelInfestacionNumerico = 0;
        }

        nivelesInfestacionNumerico.push(nivelInfestacionNumerico); // Almacenar el valor numérico
      }

      myChartReporte[index] = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: tiposPlagas,
          datasets: [{
            label: 'Nivel',
            data: nivelesInfestacionNumerico,
            borderWidth: 0,
            borderRadius: 5,
            barThickness: tiposPlagas.length <= 4 ? 30 : 15,
            backgroundColor: function (context) {
              var value = context.dataset.data[context.dataIndex];
              return value === 1 ? '#3CCF4E' : (value === 2 ? 'rgb(233, 184, 36)' : 'rgb(216, 63, 49)');
            }
          }]
        },
        options: {
          indexAxis: 'y',
          scales: {
            x: {
              beginAtZero: true,
              ticks: {
                stepSize: 1,
                callback: function (value, index, values) {
                  return value === 0 ? 0 : (value === 1 ? 'Bajo' : (value === 2 ? 'Medio' : 'Alto'));
                }
              }
            },
            y: {
              beginAtZero: true
            }
          },
          responsive: true,
          plugins: {
            legend: {
              display: true,
              labels: {
                generateLabels: function (chart) {
                  return [{
                    text: 'Bajo',
                    fillStyle: '#3CCF4E',
                    hidden: false
                  }, {
                    text: 'Medio',
                    fillStyle: 'rgb(233, 184, 36)',
                    hidden: false
                  }, {
                    text: 'Alto',
                    fillStyle: 'rgb(216, 63, 49)',
                    hidden: false
                  }];
                }
              }
            }
          }
        }
      });
      // Convertir la gráfica en imagen y guardarla en el array
      setTimeout(() => {
        canvasReporte[index] = document.getElementById(`tratamientos${index + 1}`);
        graficas[index] = canvasReporte[index].toDataURL('image/png'); // Guardar en el array
      }, 500);
    },
    error: function (error) {
      console.error("Error: " + error);
    },
  });
}

function sustanciasReporte(identificacion, establecimiento, mes, anio, index) {
  // Destruir la instancia de Chart si ya existe para el índice actual
  if (myChartReporteSustancias[index]) {
    myChartReporteSustancias[index].destroy();
    myChartReporteSustancias[index] = null;
  }
  // Gráfica de Sustancias
  const ctx1 = document.getElementById(`sustancias${index + 1}`);
  $.ajax({
    url: "../modelo/datos-Reportes.php",
    method: "POST",
    data: {
      sustancias: 1,
      tratamiento: 0,
      identificacion: identificacion,
      establecimiento: establecimiento,
      mes: mes,
      anio: anio
    },
    dataType: "json",
    success: function (data) {
      // Array para almacenar tipos de plagas y niveles de infestación
      var nombreSustancia = [];
      var cantidadSustancia = [];

      // Iterar sobre cada entrada en la data
      for (var i = 0; i < data.length; i++) {
        // Almacenar tipo de plagas y nivel de infestación en los arrays
        nombreSustancia.push(data[i].nombre);

        // Mapear los niveles de infestación a valores numéricos
        cantidadSustancia.push(data[i].cantidad);
      }

      myChartReporteSustancias = new Chart(ctx1, {
        type: 'bar',
        data: {
          labels: nombreSustancia,
          datasets: [{
            label: 'Cantidad',
            data: cantidadSustancia,
            borderWidth: 0,
            borderRadius: 5,
            barThickness: nombreSustancia.length <= 4 ? 30 : 15,
            backgroundColor: [
              '#3CCF4E', // Color para 'Hawker'
              '#3CCF4E', // Color para 'Temprid'
              '#3CCF4E'  // Color para 'Rutto'
            ],
          }]
        },
        options: {
          indexAxis: 'y',
          scales: {
            x: {
              beginAtZero: true,
              ticks: {
                stepSize: 2,
              }
            },
            y: {
              beginAtZero: true
            }
          },
          responsive: true,
        }
      });
      // Convertir la gráfica en imagen y guardarla en el array
      setTimeout(() => {
        // graficas[index] = myChartReporte[index].toBase64Image(); // Guardar en el array
        canvasReporteSustancias[index] = document.getElementById(`sustancias${index + 1}`);
        graficasSustancias[index] = canvasReporteSustancias[index].toDataURL('image/png'); // Guardar en el array

        if (graficas.length === 3) {
          guardarGraficas(graficas, graficasSustancias); // Llamar la función cuando estén las 3 imágenes
        }
      }, 500);
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener centros de formación: " + error);
    },
  });
}

function guardarGraficas(graficas, graficasSustancias) {
  $.ajax({
    type: "POST",
    url: "../modelo/accionesGuardarImagen.php",
    data: {
      grafica1: graficas[0],
      grafica2: graficas[1],
      grafica3: graficas[2],
      grafica4: graficasSustancias[0],
      grafica5: graficasSustancias[1],
      grafica6: graficasSustancias[2],
    },
    success: function (response) {
      setTimeout(function () {
        generaracion();
      }, 1000);
    },
    error: function () {
      console.log("Hubo un error al enviar la imagen al servidor.");
    },
  });
}

function generaracion() {
  reporteEmpresa = $("#reporteEmpresa").val();
  reporteMes1 = $("#reporteMes1").val();
  reporteAnho1 = $("#reporteAnho1").val();
  reporteMes2 = $("#reporteMes2").val();
  reporteAnho2 = $("#reporteAnho2").val();
  reporteMes3 = $("#reporteMes3").val();
  reporteAnho3 = $("#reporteAnho3").val();

  cadena =
    "reporteEmpresa=" + reporteEmpresa +
    "&reporteMes1=" + reporteMes1 +
    "&reporteAnho1=" + reporteAnho1 +
    "&reporteMes2=" + reporteMes2 +
    "&reporteAnho2=" + reporteAnho2 +
    "&reporteMes3=" + reporteMes3 +
    "&reporteAnho3=" + reporteAnho3;

  let datos = {
    reporteEmpresa: $("#reporteEmpresa").val(),
    reporteMes1: $("#reporteMes1").val(),
    reporteAnho1: $("#reporteAnho1").val(),
    reporteMes2: $("#reporteMes2").val(),
    reporteAnho2: $("#reporteAnho2").val(),
    reporteMes3: $("#reporteMes3").val(),
    reporteAnho3: $("#reporteAnho3").val()
  };
  mensaje_si = "El usuario registrado correctamente.";
  mensaje_no = "Error, NO se cargaron los datos, intente nuevamente.";

  $.ajax({
    type: "POST",
    url: "../fpdf-dev/reporteEmpresa.php?accion=registrar",
    data: datos,
    success: function (r) {
      // console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        let url = "../fpdf-dev/reporteEmpresa.php?" + $.param(datos);
        window.open(url, "_blank");
        // location.reload();
      }
    },
    error: function () {
      alertify.error("Error en la solicitud AJAX.");
    }
  });
}

