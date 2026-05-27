<?php
session_start();
if (isset($_POST['grafica1'])) {
    $grafica1 = $_POST['grafica1'];
    $grafica2 = $_POST['grafica2'];
    $grafica3 = $_POST['grafica3'];
    $grafica4 = $_POST['grafica4'];
    $grafica5 = $_POST['grafica5'];
    $grafica6 = $_POST['grafica6'];
    $_SESSION['grafica1'] = $grafica1;
    $_SESSION['grafica2'] = $grafica2;
    $_SESSION['grafica3'] = $grafica3;
    $_SESSION['grafica4'] = $grafica4;
    $_SESSION['grafica5'] = $grafica5;
    $_SESSION['grafica6'] = $grafica6;
    echo "Imagen guardada en sesión correctamente.";
} else {
    echo "Error: No se recibió la imagen.";
}
