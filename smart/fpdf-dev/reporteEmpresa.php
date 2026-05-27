<?php
require_once '../modelo/val-admin.php';
include '../fpdf/fpdf.php';
include 'exfpdf.php';
include 'easyTable.php';
// Instancias
//Contantes y Variables

if (isset($_GET['accion'])) {
  $accion = $_GET['accion'];
  if ($accion == 'registrar') {
    $reporteEmpresa = $_POST['reporteEmpresa'];
    $reporteMes1 = $_POST['reporteMes1'];
    $reporteAnho1 = $_POST['reporteAnho1'];
    $reporteMes2 = $_POST['reporteMes2'];
    $reporteAnho2 = $_POST['reporteAnho2'];
    $reporteMes3 = $_POST['reporteMes3'];
    $reporteAnho3 = $_POST['reporteAnho3'];
  }
}

if (isset($_GET['reporteEmpresa'])) {
  $reporteEmpresa = $_GET['reporteEmpresa'];
  $reporteMes1 = $_GET['reporteMes1'];
  $reporteAnho1 = $_GET['reporteAnho1'];
  $reporteMes2 = $_GET['reporteMes2'];
  $reporteAnho2 = $_GET['reporteAnho2'];
  $reporteMes3 = $_GET['reporteMes3'];
  $reporteAnho3 = $_GET['reporteAnho3'];
}

$mesesReporte = ['No Aplica', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];


// if (!isset($_SESSION['canvasTratamiento']) || empty($_SESSION['canvasTratamiento'])) {
// echo "Error: No hay datos de imagen en la sesión.";
// } else {
// $canvasTratamiento = $_SESSION['canvasTratamiento'];
$reporteInfestacion1 = isset($_SESSION['grafica1']) ? $_SESSION['grafica1'] : null;
$reporteInfestacion2 = isset($_SESSION['grafica2']) ? $_SESSION['grafica2'] : null;
$reporteInfestacion3 = isset($_SESSION['grafica3']) ? $_SESSION['grafica3'] : null;
$reporteSustancias1 = isset($_SESSION['grafica4']) ? $_SESSION['grafica4'] : null;
$reporteSustancias2 = isset($_SESSION['grafica5']) ? $_SESSION['grafica5'] : null;
$reporteSustancias3 = isset($_SESSION['grafica6']) ? $_SESSION['grafica6'] : null;
// }



class MyPDF extends exFPDF
{
  // Función para definir el encabezado
  function Header()
  {
    //IMÁGENES FONDO
    $this->Image('../imagenes/hormiga.png', 0, 0, 40, 40, 'PNG');
    $this->Image('../imagenes/aranha.png', 185, 10, 25, 25, 'PNG');
    $this->Image('../imagenes/aranha.png', 185, 10, 25, 25, 'PNG');
    $this->Image('../imagenes/hormiga.png', 170, 50, 15, 15, 'PNG');
    $this->Image('../imagenes/aranha90.png', -3, 110, 15, 15, 'PNG');
    $this->Image('../imagenes/hormiga.png', 195, 130, 15, 15, 'PNG');
    $this->Image('../imagenes/hormiga.png', -1, 170, 15, 15, 'PNG');
    $this->Image('../imagenes/aranha90.png', 195, 200, 15, 15, 'PNG');
    $this->Image('../imagenes/aranha90.png', -5, 235, 25, 25, 'PNG');
    $this->Image('../imagenes/hormiga.png', 180, 235, 25, 25, 'PNG');
    $this->Image('../imagenes/raton.png', 30, 275, 15, 15, 'PNG');
    $this->Image('../imagenes/raton.png', 160, 275, 15, 15, 'PNG');
    //LOGOS
    $this->Image('../imagenes/logo-jaziz-BG.png', 60, 10, 90, 40, 'PNG');
    $this->Ln(40);
    //TÍTULO DOCUMENTO
    $this->SetFont('helvetica', 'B', 20);
    // Movernos a la derecha
    $this->Cell(90);
    $this->Cell(10, 10, 'INFORME DE ESTADO', 0, 0, 'C');
    $this->Ln(10);
  }
  // Pie de página
  function Footer()
  {
    //IMAGEN FOOTER
    $y = $this->SetY(-35);
    $this->Image('../imagenes/NPMA.png', 85, $y, 40, 15, 'PNG');

    // Arial italic 8
    $this->SetFont('Arial', 'B', 10);
    // Movernos a la derecha
    $this->Cell(90);
    $this->Cell(10, 10, iconv("UTF-8", "CP1252", 'Considere el medio ambiente antes de imprimir este documento'), 0, 0, 'C');
  }
}

/*** INICIO DEL PDF ***/
$pdf = new MyPDF();
$pdf->AddPage();
// Establecer márgenes
$pdf->SetMargins(10, 10, 10); // Márgenes (izquierda, superior, derecha)
$pdf->SetAutoPageBreak(true, 40); // Auto salto de página con margen inferior de 20 mm

//INFORMACION BÁSICA
{
  $pdf->SetFont('helvetica', '', 8);
  $table = new easyTable($pdf, '%{30, 20, 30, 20}', 'align:R; border:1;');
  $table->easyCell(iconv("UTF-8", "CP1252", 'INFORMACIÓN BÁSICA'), 'align:C; colspan:4; bgcolor:#ef5B0c; font-style:B; font-color:#FFFFFF;');
  $table->printRow();
  $table->easyCell('NOMBRE DEL ESTABLECIMIENTO:', 'font-style:B; bgcolor:#D4F6CC;');
  $table->easyCell(iconv("UTF-8", "CP1252", $reporteEmpresa), 'font-style:I; colspan:3;');
  $table->printRow();
  $table->endTable(0);
}

//INFORMACION DE LAS GRAFICAS
{
  $pdf->SetFont('helvetica', '', 8);
  $table = new easyTable($pdf, '%{50, 50}', 'align:R; border:1');
  $table->printRow(2);
  $table->easyCell(iconv("UTF-8", "CP1252", 'GRÁFICAS'), 'align:C; colspan:4; bgcolor:#ef5B0c; font-style:B; font-color:#FFFFFF;');
  $table->printRow(2);
  $table->easyCell(iconv("UTF-8", "CP1252", 'NIVEL DE INFESTACIÓN'), 'align:C; valign:M; bgcolor:#D4F6CC;font-style:B');
  $table->easyCell('SUSTANCIAS', 'align:C; valign:M; bgcolor:#D4F6CC;font-style:B');
  $table->printRow(2);
  //Se trae las imágenes de los niveles de infestación
  $tempReporteInfestacion1 = 'canvas_temp1.png';
  $dataReporteInfestacion1 = base64_decode(str_replace('data:image/png;base64,', '', $reporteInfestacion1));
  file_put_contents($tempReporteInfestacion1, $dataReporteInfestacion1);

  $tempReporteInfestacion2 = 'canvas_temp2.png';
  $dataReporteInfestacion2 = base64_decode(str_replace('data:image/png;base64,', '', $reporteInfestacion2));
  file_put_contents($tempReporteInfestacion2, $dataReporteInfestacion2);

  $tempReporteInfestacion3 = 'canvas_temp3.png';
  $dataReporteInfestacion3 = base64_decode(str_replace('data:image/png;base64,', '', $reporteInfestacion3));
  file_put_contents($tempReporteInfestacion3, $dataReporteInfestacion3);

  //Se trae las imágenes de las sustancias
  $tempSustancias1 = 'canvas_temp4.png';
  $datareporteSustancias1 = base64_decode(str_replace('data:image/png;base64,', '', $reporteSustancias1));
  file_put_contents($tempSustancias1, $datareporteSustancias1);

  $tempSustancias2 = 'canvas_temp5.png';
  $datareporteSustancias2 = base64_decode(str_replace('data:image/png;base64,', '', $reporteSustancias2));
  file_put_contents($tempSustancias2, $datareporteSustancias2);

  $tempSustancias3 = 'canvas_temp6.png';
  $datareporteSustancias3 = base64_decode(str_replace('data:image/png;base64,', '', $reporteSustancias3));
  file_put_contents($tempSustancias3, $datareporteSustancias3);

  // Agrega la imagen al archivo PDF
  $table->easyCell(iconv("UTF-8", "CP1252", 'FECHA DE LA GRÁFICA:'), 'font-style:B; bgcolor:#D4F6CC;');
  $table->easyCell(iconv("UTF-8", "CP1252", $mesesReporte[$reporteMes1] . " - " . $reporteAnho1), 'align:C; colspan:4; font-style:B');
  $table->printRow(2);
  $table->easyCell('', 'img:' . $tempReporteInfestacion1 . ', w100, h50; fitbox; align:C; valign:M;');
  $table->easyCell('', 'img:' . $tempSustancias1 . ', w100, h50; fitbox; align:C; valign:M;');
  $table->printRow();

  $table->easyCell(iconv("UTF-8", "CP1252", 'FECHA DE LA GRÁFICA:'), 'font-style:B; bgcolor:#D4F6CC;');
  $table->easyCell(iconv("UTF-8", "CP1252", $mesesReporte[$reporteMes2] . " - " . $reporteAnho2), 'align:C; colspan:4; font-style:B');
  $table->printRow(2);
  $table->easyCell('', 'img:' . $tempReporteInfestacion2 . ', w100, h50; align:C; valign:M;');
  $table->easyCell('', 'img:' . $tempSustancias2 . ', w100, h50; fitbox; align:C; valign:M;');
  $table->printRow();
  $table->easyCell(iconv("UTF-8", "CP1252", 'FECHA DE LA GRÁFICA:'), 'font-style:B; bgcolor:#D4F6CC;');
  $table->easyCell(iconv("UTF-8", "CP1252", $mesesReporte[$reporteMes3] . " - " . $reporteAnho3), 'align:C; colspan:4; font-style:B');
  $table->printRow(2);
  $table->easyCell('', 'img:' . $tempReporteInfestacion3 . ', w100, h50; align:C; valign:M;');
  $table->easyCell('', 'img:' . $tempSustancias3 . ', w100, h50; fitbox; align:C; valign:M;');

  $table->printRow();

  $table->endTable();
}

$pdf->Output();
// Eliminar el archivo temporal después de generar el PDF
unlink($tempTratamientos);
exit;
/*** FIN DEL PDF ***/
