<?php
// session_start();
require 'conexion.php';
$conexion = new Conexion();

if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $loginNombre = $_POST["usuario"];
    $loginPassword = $_POST["contrasena"];
    $sql = "SELECT * FROM usuario WHERE usuario=:usuario AND contrasena=:contrasena";
    $modules = $conexion->prepare($sql);
    $modules->bindParam(":usuario", $loginNombre);
    $modules->bindParam(":contrasena", $loginPassword);
    $modules->execute();
    $total = $modules->rowCount();

    if ($total > 0) {
        $row = $modules->fetch(PDO::FETCH_ASSOC);
        if (($row['usuario'] == $loginNombre) && ($row['contrasena'] == $loginPassword)) {
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['nombres_apellidos'] = $row['nombres_apellidos'];
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['id_rol'] = $row['id_rol'];
            header("Location: ../administrador/index.php");
        } else {
            // session_destroy();
            echo '<script language = javascript>
            alert("Datos incorectos del usuario.");
            self.location = "../index.php" 
            </script>';
        }
    } else {
        // session_destroy();
        echo '<script language = javascript>
        alert("Por favor verifique la información registrada.");
        self.location = "../index.php"
        </script>';
    }
} else {
    // session_destroy();
    echo '<script language = javascript>
	alert("Por favor verifique la información registrada.");
	self.location = "../index.php"
	</script>';
}

