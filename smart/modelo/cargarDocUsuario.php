<?php
require './datos-cargarDocUsuario.php';
$mis_docUsuario = new cargarDocUsuario;

if (isset($_POST["submit"])) {
    // Variables del formulario
    $codigo = $_POST['codigo'];
    $nombre_archivo = $_FILES["archivo"]["name"];
    // Validadmos si llegan los nombres de las imágenes
    if ($nombre_archivo == "" ) {
        echo '<script language = javascript>
        alert ("Debe seleccionar un archivo.")
        self.location="../administrador/docUsuarios.php"
        </script>';
    } else {
        if ($nombre_archivo != "") {
            // LLame a la función CARGAR LOGO
            $cargarArchivo = $mis_docUsuario->cargarArchivoUsuario($codigo, $nombre_archivo);
        }
    }
}
