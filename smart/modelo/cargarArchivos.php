<?php
require './cargarArchivoFoto.php';
$mis_fotos = new cargarArchivoFoto;

if (isset($_POST["submit"])) {
    // Variables del formulario
    $codigo = $_POST['codigo'];
    $reporte = $_POST['reporte'];
    $modificar_fotos = $_POST['modificar_fotos'];
    $nombre_archiv_foto1 = $_FILES["foto1"]["name"];
    $nombre_archiv_foto2 = $_FILES["foto2"]["name"];
    $nombre_archiv_foto3 = $_FILES["foto3"]["name"];
    $nombre_archiv_foto4 = $_FILES["foto4"]["name"];
    // Validadmos si llegan los nombres de las imágenes
    if ($nombre_archiv_foto1 == "" && $nombre_archiv_foto2 == "" && $nombre_archiv_foto3 == "" && $nombre_archiv_foto4 == "") {
        echo '<script language = javascript>
        alert ("Debe seleccionar un archivo.")
        self.location="../administrador/Crear_reporte.php"
        </script>';
    } else {
        if ($nombre_archiv_foto1 != "") {
            // LLame a la función CARGAR LOGO
            $cargarfoto1 = $mis_fotos->cargarfoto1($codigo, $reporte, $nombre_archiv_foto1, $modificar_fotos);
        }
        if ($nombre_archiv_foto2 != "") {
            // LLame a la función CARGAR LOGO
            $cargarfoto2 = $mis_fotos->cargarfoto2($codigo, $reporte, $nombre_archiv_foto2, $modificar_fotos);
        }
        if ($nombre_archiv_foto3 != "") {
            // LLame a la función CARGAR LOGO
            $cargarfoto3 = $mis_fotos->cargarfoto3($codigo, $reporte, $nombre_archiv_foto3, $modificar_fotos);
        }
        if ($nombre_archiv_foto4 != "") {
            // LLame a la función CARGAR LOGO
            $cargarfoto4 = $mis_fotos->cargarfoto4($codigo, $reporte, $nombre_archiv_foto4, $modificar_fotos);
        }
    }
}
