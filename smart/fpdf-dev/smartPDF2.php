<?php

use PhpOffice\PhpSpreadsheet\Writer\Pdf;

require_once '../modelo/val-admin.php';
require_once '../modelo/datos-Reportes.php';
require_once '../modelo/datos-usuarios.php';
require_once '../modelo/datos-empresa.php';
require_once '../modelo/datos-sustancias.php';
require '../modelo/datos-reporte-mecanismo.php';
require '../modelo/datos-reporte-sustancias.php';
require '../modelo/datos-reporte-hallazgo.php';
require '../modelo/datos-reporte-tratamiento.php';
require '../modelo/datos-cantidad_mecanismo_cliente.php';
include '../fpdf/fpdf.php';
include 'exfpdf.php';
include 'easyTable.php';
// Instancias
$mis_Reportes = new misReportes;
$mis_empresas = new misEmpresas;
$mis_CantidadMecanismoCliente = new misCantidadMecanismoCliente();
$mis_usuarios = new misUsuarios;
$mis_Sustancias = new misSustancias;
$mis_ReporteMecanismo = new misReporteMecanismo;
$mis_ReporteSustancias = new misReporteSustancias;
$mis_ReporteHallazgo = new misReporteHallazgo;
$mis_ReporteTratamiento = new misReporteTratamiento;

//Contantes y Variables
if (isset($_GET['codigo'])) {
  $reporte = $_GET['codigo'];
  $reporteUsuario = $mis_Reportes->viewReporteUsuario($reporte);
  $identificacion = $reporteUsuario[0]['usuario'];
  // $miEmpresa = $mis_empresas->viewEmpresaDocumento($identificacion);
  $NITRUT = $reporteUsuario[0]['nit_empresa'];
  $miEmpresa = $mis_empresas->viewEmpresaDocumento1($NITRUT);
  $reporteTratamiento = $mis_ReporteTratamiento->viewReporteTratamiento($reporte);
  $reporteSustancias = $mis_ReporteSustancias->viewReporteSustancia($reporte);
  $reporteMecanismo = $mis_CantidadMecanismoCliente->viewMecanismoClienteReporte($reporte);
  $reporteHallazgo = $mis_ReporteHallazgo->viewReporteHallazgo($reporte);
} else {
  echo "Hola mundo";
}

/*** INICIO DEL PDF ***/ {
  $pdf = new exFPDF();
  $pdf->AddPage();
  $pdf->Header();
  //NÚMERO DE REPORTE
  {
    $pdf->SetFont('helvetica', '', 9);
    $table = new easyTable($pdf, 8, 'border:0;');
    $table->easyCell('', '');
    $table->easyCell('', '');
    $table->easyCell('', '');
    $table->easyCell('', '');
    $table->easyCell('', '');
    $table->easyCell('', '');
    $table->easyCell(iconv("UTF-8", "CP1252", 'N° REPORTE:'), 'font-style:B;align:R; bgcolor:#FFFFFF00; border:0');
    $table->easyCell($reporte, 'font-style:I;');
    $table->printRow();
    $table->endTable(-10);
  }

  //IMÁGENES FONDO
  {
    $pdf->SetFont('helvetica', '', 16);
    $table = new easyTable($pdf, '%{20, 60, 20}', 'align:C; border:0;');
    $table->easyCell('', '');
    $pdf->Image('../imagenes/hormiga.png', 0, 0, 40, 40, 'PNG');
    $pdf->Image('../imagenes/aranha.png', 185, 10, 25, 25, 'PNG');
    $pdf->Image('../imagenes/aranha.png', 185, 10, 25, 25, 'PNG');
    $pdf->Image('../imagenes/hormiga.png', 170, 50, 15, 15, 'PNG');
    $pdf->Image('../imagenes/aranha90.png', -3, 110, 15, 15, 'PNG');
    $pdf->Image('../imagenes/hormiga.png', 195, 130, 15, 15, 'PNG');
    $pdf->Image('../imagenes/hormiga.png', -1, 170, 15, 15, 'PNG');
    $pdf->Image('../imagenes/aranha90.png', 195, 200, 15, 15, 'PNG');
    $pdf->Image('../imagenes/aranha90.png', -5, 235, 25, 25, 'PNG');
    $pdf->Image('../imagenes/hormiga.png', 180, 235, 25, 25, 'PNG');
    $pdf->Image('../imagenes/raton.png', 30, 275, 15, 15, 'PNG');
    $pdf->Image('../imagenes/raton.png', 160, 275, 15, 15, 'PNG');
    $table->printRow();
    $table->endTable();
  }


  //LOGOS
  {
    $pdf->SetFont('helvetica', '', 16);
    $table = new easyTable($pdf, '%{20, 60, 20}', 'align:C; border:0;');
    $table->easyCell('', '');
    $table->easyCell('', 'img:../imagenes/logo-jaziz-BG.png, v40, h40;');
    $table->printRow();
    $table->endTable();
  }

  //TÍTULO DOCUMENTO
  {
    $pdf->SetFont('helvetica', '', 20);
    $table = new easyTable($pdf, 1, 'border:0;');
    $table->easyCell('REPORTE DE VISITA', 'font-style:B;align:C; bgcolor:#FFFFFF00; border:0');
    $table->easyCell($reporte, 'font-style:I;');
    $table->printRow();
    $table->endTable();
  }

  //INFORMACION BÁSICA
  {
    $nombreEmpresa = $reporteUsuario[0]['nombre_empresa'];
    $direccionEmpresa = $miEmpresa[0]['direccion'];
    $correoEmpresa = $miEmpresa[0]['correo'];
    $nombreContacto = $reporteUsuario[0]['nombre_apellido'];
    $telefonoEmpresa = $miEmpresa[0]['telefono'];
    $fechaInicio = $reporteUsuario[0]['fecha_de_inicio'];
    $horaInicio = $reporteUsuario[0]['hora_de_inicio'];
    $fechaHoraIni = $fechaInicio . " - " . $horaInicio;
    $fechaFin = $reporteUsuario[0]['fecha_fin'];
    $horaFin = $reporteUsuario[0]['hora_fin'];
    $fechaHoraFin = $fechaFin . " - " . $horaFin;
    $pdf->SetFont('helvetica', '', 8);
    $table = new easyTable($pdf, '%{30, 20, 30, 20}', 'align:R; border:1;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'INFORMACIÓN BÁSICA'), 'align:C; colspan:4; bgcolor:#ef5B0c; font-style:B; font-color:#FFFFFF;');
    $table->printRow();
    $table->easyCell('NOMBRE DEL ESTABLECIMIENTO:', 'font-style:B; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", $nombreEmpresa), 'font-style:I; colspan:3;');
    $table->printRow();
    $table->easyCell(iconv("UTF-8", "CP1252", 'DIRECCIÓN:'), 'font-style:B; ; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", $direccionEmpresa), 'font-style:I; colspan:3;');
    $table->printRow();
    $table->easyCell(iconv("UTF-8", "CP1252", 'CORREO ELECTRÓNICO:'), 'font-style:B; ; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", $correoEmpresa), 'font-style:I; colspan:3;');
    $table->printRow();
    $table->easyCell('NOMBRE DE CONTACTO:', 'font-style:B; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", $nombreContacto), 'font-style:I');
    $table->easyCell(iconv("UTF-8", "CP1252", 'TELÉFONO:'), 'font-style:B; ; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", $telefonoEmpresa), 'font-style:I;');
    $table->printRow();
    $table->easyCell('FECHA Y HORA DE INICIO:', 'font-style:B; ; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", $fechaHoraIni), 'font-style:I;');
    $table->easyCell('FECHA Y HORA FIN:', 'font-style:B; ; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", $fechaHoraFin), 'font-style:I;');
    $table->printRow();
    $table->endTable(0);
  }

  //REPORTE DE TRATAMIENTOS
  {
    $pdf->SetFont('helvetica', '', 8);
    $table = new easyTable($pdf, 4, 'align:R; border:1;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'TRATAMIENTOS'), 'align:C; colspan:4; bgcolor:#ef5B0c; font-style:B; font-color:#FFFFFF;');
    $table->printRow();
    $table->easyCell(iconv("UTF-8", "CP1252", 'TIPO DE TRATAMIENTO:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'MÉTODO DE CONTROL:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'TIPO DE PLAGA:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'NIVEL DE INFESTACIÓN:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->printRow();
    //SE GENERAN LAS FILAS CON LOS DATOS DE LOS TRATAMIENTOS REALIZADOS EN EL REPORTE
    foreach ($reporteTratamiento as $data) {
      $table->easyCell(iconv("UTF-8", "CP1252", $data['tratamiento']), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['metodo_control']), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['tipo_plagas']), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['nivel_infestacion']), 'font-style:I; align:C;');
      $table->printRow();
    }
    $table->endTable(0);
  }

  //REPORTE DE SUSTANCIAS
  {
    $pdf->SetFont('helvetica', '', 8);
    $table = new easyTable($pdf, 5, 'align:R; border:1;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'SUSTANCIAS'), 'align:C; colspan:5; bgcolor:#ef5B0c; font-style:B; font-color:#FFFFFF;');
    $table->printRow();
    $table->easyCell(iconv("UTF-8", "CP1252", 'NOMBRE DE LA SUSTANCIA:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'LABORATORIO:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'NIVEL DE RIESGO:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'CANTIDAD:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'UNIDADES:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->printRow();
    //SE GENERAN LAS FILAS CON LOS DATOS DE LOS SUSTANCIAS REALIZADOS EN EL REPORTE
    foreach ($reporteSustancias as $data) {
      $sustancia = $mis_Sustancias->viewSustancia($data['sustancias']);
      $table->easyCell(iconv("UTF-8", "CP1252", $sustancia[0]['nombre']), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['laboratorio']), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['nivel_riesgo']), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['cantidad']), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['mediciones']), 'font-style:I; align:C;');
      $table->printRow();
    }
    $table->endTable(0);
  }

  //REPORTE DE MECANISMOS
  {
    $pdf->SetFont('helvetica', '', 8);
    $table = new easyTable($pdf, 4, 'align:R; border:1;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'MECANISMOS'), 'align:C; colspan:4; bgcolor:#ef5B0c; font-style:B; font-color:#FFFFFF;');
    $table->printRow();
    $table->easyCell(iconv("UTF-8", "CP1252", 'NOMBRE DEL MECANISMO:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'ID DEL MECANISMO:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'UBICACIÓN:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'OBSERVACIÓN:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->printRow();
    //SE GENERAN LAS FILAS CON LOS DATOS DE LOS MECANISMOS REALIZADOS EN EL REPORTE
    foreach ($reporteMecanismo as $data) {
      $table->easyCell(iconv("UTF-8", "CP1252", $data['nombre_mecanismo']), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['id']), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['ubicacion']), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['observacion']), 'font-style:I; align:C;');
      $table->printRow();
    }
    $table->endTable(0);
  }

  //REPORTE DE OPORTUNIDAD DE MEJORA
  {
    $pdf->SetFont('helvetica', '', 8);
    $table = new easyTable($pdf, 6, 'align:R; border:1;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'OPORTUNIDAD DE MEJORA'), 'align:C; colspan:6; bgcolor:#ef5B0c; font-style:B; font-color:#FFFFFF;');
    $table->printRow();
    $table->easyCell(iconv("UTF-8", "CP1252", 'ITEM'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'MOTIVO DE LA MEJORA'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'OPORTUNIDAD 1:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'OPORTUNIDAD 2:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'OPORTUNIDAD 3:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'OPORTUNIDAD 4:'), 'font-style:B; align:C; bgcolor:#D4F6CC;');
    $table->printRow(true);
    //SE GENERAN LAS FILAS CON LOS DATOS DE LOS MECANISMOS REALIZADOS EN EL REPORTE
    $cant = 1;
    foreach ($reporteHallazgo as $data) {

      $table->easyCell(iconv("UTF-8", "CP1252", $cant), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['hallazgo']), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['oportunidad_1']), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['oportunidad_2']), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['oportunidad_3']), 'font-style:I; align:C;');
      $table->easyCell(iconv("UTF-8", "CP1252", $data['oportunidad_4']), 'font-style:I; align:C;');
      $table->printRow();
      $table->easyCell(iconv("UTF-8", "CP1252", "EVIDENCIAS FOTOGRÁFICAS"), 'font-style:I; align:C; colspan:2; rowspan:2;  valign:M');
      $table->easyCell('', (($data['foto1']) != "") ? 'img:../img_hallazgos/' . $data['foto1'] . ', w100, h100; rowspan:2;' : 'img:../imagenes/No_img.png, w10, h10; rowspan:2;');
      $table->easyCell('', (($data['foto2']) != "") ? 'img:../img_hallazgos/' . $data['foto2'] . ', w100, h100; rowspan:2;' : 'img:../imagenes/No_img.png, w10, h10; rowspan:2;');
      $table->easyCell('', (($data['foto3']) != "") ? 'img:../img_hallazgos/' . $data['foto3'] . ', w100, h100; rowspan:2;' : 'img:../imagenes/No_img.png, w10, h10; rowspan:2;');
      $table->easyCell('', (($data['foto4']) != "") ? 'img:../img_hallazgos/' . $data['foto4'] . ', w100, h100; rowspan:2;' : 'img:../imagenes/No_img.png, w10, h10; rowspan:2;');
      $table->printRow();
      $table->easyCell("", 'font-style:I; align:C; colspan:2;');
      $table->printRow();
      $cant++;
    }
    $table->endTable();
  }

  //IMAGEN FIRMAS
  {
    $pdf->SetFont('helvetica', '', 12);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $table = new easyTable($pdf, '%{10, 20, 40, 20, 10}', 'align:L{LC}; border:0;');
    $table->easyCell('', '');
    //Comprobamos que las firmas existan, sino se deja en blanco.
    if (file_exists('../imagenes/firmas/Firma-' . $reporte . "-1" . '.png')) {
      $table->easyCell('', 'img:../imagenes/firmas/Firma-' . $reporte . "-1" . '.png, v80, h80;');
    } else {
      $table->easyCell('', '');
    }
    $table->easyCell('', '');
    if (file_exists('../imagenes/firmas/Firma-' . $reporte . "-2" . '.png')) {
      $table->easyCell('', 'img:../imagenes/firmas/Firma-' . $reporte . "-2" . '.png, v80, h80;');
    } else {
      $table->easyCell('', '');
    }
    $table->easyCell('', '');
    $table->printRow();
    $table->endTable(3);
  }


  //TEXTO FIRMAS
  {
    $pdf->SetFont('helvetica', '', 12);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $table = new easyTable($pdf, '%{10, 20, 40, 20, 10}', 'align:L{LC}; border:0;');
    $table->easyCell('', '');
    $pdf->Line($x, $y, $x + 60, $y);
    $table->easyCell('', '');
    $pdf->Line($x + 130, $y, $x + 190, $y);
    $table->easyCell('', '');
    $table->printRow();
    $table->easyCell(iconv("UTF-8", "CP1252", 'Elaborado por:'), 'font-style:B; align:L; colspan:2; bgcolor:#FFFFFF00;');
    $table->easyCell('', '');
    $table->easyCell(iconv("UTF-8", "CP1252", 'Recibido por:'), 'font-style:B; align:L; colspan:2; bgcolor:#FFFFFF00;');
    $table->easyCell('', '');
    $table->printRow();
    $table->easyCell(iconv("UTF-8", "CP1252", $nombre . " " . $apellido), 'font-style:B; align:L; colspan:2; bgcolor:#FFFFFF00;');
    $table->easyCell('', '');
    $table->easyCell(iconv("UTF-8", "CP1252", $nombreContacto), 'font-style:B; align:L; colspan:2; bgcolor:#FFFFFF00;');
    $table->easyCell('', '');
    $table->printRow();
    $table->endTable();
  }


  //IMAGEN FOOTER
  {
    $pdf->SetFont('helvetica', '', 16);
    $table = new easyTable($pdf, 1, 'align:C; border:0;');
    $table->easyCell('', 'img:../imagenes/NPMA.png, v15, h15;');
    // $table->easyCell('', 'img:../imagenes/logo_ids.png, v25, h25;');
    $table->printRow();
    $table->endTable();
  }

  //TEXTO RESOLUCIÓN
  {
    $pdf->SetFont('helvetica', '', 10);
    $table = new easyTable($pdf, 1, 'border:0;');
    $table->easyCell(iconv("UTF-8", "CP1252", 'Considere el medio ambiente antes de imprimir este documento'), 'font-style:B;align:C; bgcolor:#FFFFFF; border:0');
    $table->easyCell($reporte, 'font-style:I;');
    $table->printRow();
    $table->endTable();
  }

  $pdf->AddPage();
  //IMÁGENES FONDO
  {
    $pdf->SetFont('helvetica', '', 16);
    $table = new easyTable($pdf, '%{20, 60, 20}', 'align:C; border:0;');
    $table->easyCell('', '');
    $pdf->Image('../imagenes/hormiga.png', 0, 0, 40, 40, 'PNG');
    $pdf->Image('../imagenes/aranha.png', 185, 10, 25, 25, 'PNG');
    $pdf->Image('../imagenes/aranha.png', 185, 10, 25, 25, 'PNG');
    $pdf->Image('../imagenes/hormiga.png', 170, 50, 15, 15, 'PNG');
    $pdf->Image('../imagenes/aranha90.png', -3, 110, 15, 15, 'PNG');
    $pdf->Image('../imagenes/hormiga.png', 195, 130, 15, 15, 'PNG');
    $pdf->Image('../imagenes/hormiga.png', -1, 170, 15, 15, 'PNG');
    $pdf->Image('../imagenes/aranha90.png', 195, 200, 15, 15, 'PNG');
    $pdf->Image('../imagenes/aranha90.png', -5, 235, 25, 25, 'PNG');
    $pdf->Image('../imagenes/hormiga.png', 180, 235, 25, 25, 'PNG');
    $pdf->Image('../imagenes/raton.png', 30, 275, 15, 15, 'PNG');
    $pdf->Image('../imagenes/raton.png', 160, 275, 15, 15, 'PNG');


    $table->printRow();
    $table->endTable();
  }
  $pdf->Output();
}
/*** FIN DEL PDF ***/
