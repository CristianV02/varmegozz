
let myChartTratamientos; // Variable para almacenar la instancia de Chart
let myChartSustancias; // Variable para almacenar la instancia de Chart
function cargarTratamientos(identificacion, establecimiento, mes, anio) {
  console.log(
    "Cargamos los datos de tratamientos según el mes y el año=" + identificacion + " - " + establecimiento + " - " + mes + " - " + anio
  );
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
      console.log("esta es la data=", data);

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
      console.log("esta es la data plagas =", tiposPlagas);
      console.log("esta es la data nivel infestación=", nivelInfestacionActual);
      console.log("esta es la data nivel infestación Numérico=", nivelesInfestacionNumerico);



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

      console.log("Etiquetas del gráfico:", myChartTratamientos.data.labels);
      console.log("Datos del gráfico:", myChartTratamientos.data.datasets[0].data);
    },
    error: function (error) {
      console.error("Error: " + error);
    },
  });
}

function cargarSustancias(identificacion, establecimiento, mes, anio) {
  console.log(
    "Cargamos los datos de tratamientos según el mes y el año=" + identificacion + " - " + establecimiento + " - " + mes + " - " + anio
  );
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
      console.log("esta es la data=", data);

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
      console.log("esta es la data nombre sustancia =", nombreSustancia);
      console.log("esta es la data cantidad sustancia=", cantidadSustancia);

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

      console.log("Etiquetas del gráfico:", myChartSustancias.data.labels);
      console.log("Datos del gráfico:", myChartSustancias.data.datasets[0].data);
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
  tratamientosReporte1(identificacion, reporteEmpresa, reporteMes1, reporteAnho1);

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
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        let url = "../fpdf-dev/reporteEmpresa.php?" + $.param(datos);
        window.open(url, "_blank");
      }
    },
    error: function () {
      alertify.error("Error en la solicitud AJAX.");
    }
  });
}

function tratamientosReporte1(identificacion, establecimiento, mes, anio) {
  console.log(
    "Cargamos los datos de tratamientos1 según el mes y el año=" + identificacion + " - " + establecimiento + " - " + mes + " - " + anio
  );
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
      console.log("esta es la data=", data);

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
  //Envío de gráficas para almacenarlas y pasarlas al PDF
    guardarGraficas();
}

function guardarGraficas() {
  console.log("Guardar Gráficas1");
  let canvasTratamiento = document.getElementById('tratamientos');
  let imgData = canvasTratamiento.toDataURL('image/png'); // Convertir a base64
  console.log("imagen: " + imgData);
  $.ajax({
    type: "POST",
    url: "../modelo/accionesGuardarImagen.php",
    data: {
      canvasTratamiento: imgData,
    },
    success: function (response) {
      console.log("La imagen se envió correctamente al servidor.");
    },
    error: function () {
      console.log("Hubo un error al enviar la imagen al servidor.");
    },
  });
}

