<?php
// Verificamos si se han enviado los datos del formulario
if(isset($_POST['codReporte']) && isset($_FILES['firmaData'])) {
    // Ruta donde se guardará la firma
    $target_dir = "../imagenes/firmas/";
    
    // Obtener el código de reporte y el archivo de la firma del formulario
    $codReporte = $_POST['codReporte'];
    $cod = $_POST['cod'];
    // $cod = 0;
    $firmaData = $_FILES['firmaData'];
    // echo "datos1= " . $codReporte . "-" . $cod;
    // Nombre de archivo para la firma
    $target_file = $target_dir . "Firma-" . $codReporte . "-" . $cod . ".png";
    
    // Movemos el archivo desde el directorio temporal al directorio de destino
    if (move_uploaded_file($firmaData["tmp_name"], $target_file)) {
        // Éxito al guardar la firma
        echo $r =1;
        // echo json_encode(array("mensaje" => "Firma guardada correctamente."));
    } else {
        // Error al guardar la firma
        echo json_encode(array("mensaje" => "Error al guardar la firma."));
    }
} else {
    // No se han recibido los datos del formulario
    echo json_encode(array("mensaje" => "No se recibieron los datos del formulario."));
}
?>