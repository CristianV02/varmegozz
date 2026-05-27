<?php

class cargarArchivoFoto
{

    // Retorna una empresa por id de la empresa
    function cargarfoto1($codigo, $reporte, $nombre_archiv_foto1, $modificar_fotos)
    {
        $ruta = ($modificar_fotos == "m") ? "Modificar-reporte.php" : "Crear-reporte.php";

        require_once 'conexion.php';
        $conexion = new Conexion();
        $target_dir = "../img_hallazgos/";
        $nombre_archivo = $nombre_archiv_foto1;
        $target_file = $target_dir . basename($nombre_archivo);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $error = "";
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            // Variables del formulario
            // $codigo = $_POST['codigo'];
            // Varificamos si el archivo subido es una imagen
            $check = getimagesize($_FILES["foto1"]["tmp_name"]);
            if ($check !== false) {
                echo "<br/>File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $error += "<br/>- El archivo no es una imagen.";
                echo "<br/>- File is not an image.";
                $uploadOk = 0;
                echo '<script language = javascript>
                alert ("El archivo no es un formato de imagen.")
                var reporte = "' . $reporte . '";
                self.location="../administrador/'. $ruta . '?reporte=" + reporte;
                </script>';
            }
        } else {
            echo '<script language = javascript>
            alert ("La información no corresponde, por favor verifique.")
            self.location="../administrador/'. $ruta . '"
            </script>';
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $error += "<br/>- El archivo no existe.";
            echo "<br/>- Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size - 500KB
        if ($_FILES["foto1"]["size"] > 10000000) {
            $error += "<br/>- El archivo es demasiado grande.";
            echo "- Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $error += "<br/>- El archivo no es un formato de imagen permitido, solo JPG, JPEG, PNG & GIF son permitidos.";
            echo "- Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<br/>- Sorry, your file was not uploaded.";
            echo '<script language = javascript>
            alert ("Por favor verifique la infomación a registrar\n"' . $error . '")
            self.location="../administrador/'. $ruta . '"
            </script>';
            // if everything is ok, try to upload file
        } else {
            // Nuevo nombre del archivo
            $nuevo_nombre_hallazgo = "Hallazgo1-" . $codigo . "-" . "." . $imageFileType;
            $new_target_file = $target_dir . basename($nuevo_nombre_hallazgo);
            echo "<br/>Codigo: " . $codigo;
            echo "<br/>Nombre Hallazgo: " . $nombre_archiv_foto1;
            echo "<br/>Nuevo Hallazgo: " . $nuevo_nombre_hallazgo;
            if (move_uploaded_file($_FILES["foto1"]["tmp_name"], $new_target_file)) {
                echo "<br/>El archivo se ha subido correctamente...";
                echo "The file " . htmlspecialchars(basename($nombre_archiv_foto1)) . " has been uploaded.";
                // Sentencias SQL - UPDATE
                $sql = "UPDATE reporte_hallazgo SET
					   foto1=:foto1
				WHERE codigo = :codigo;";
                $uptd = $conexion->prepare($sql);
                $uptd->bindParam(":foto1", $nuevo_nombre_hallazgo);
                $uptd->bindParam(":codigo", $codigo);
                if ($uptd->execute()) {
                    echo '<script language = javascript>
                    alert ("Los archivos se cargaron correctamente.")
                    self.location="../administrador/'. $ruta . '?reporte=' . $reporte .'";
                    </script>';
                    
                } else {
                    echo '<script language = javascript>
                    alert ("Los archivos se cargaron correctamente.")
                    self.location="../administrador/'. $ruta . '?reporte=' . $reporte .'";
                    </script>';
                }
            } else {
                echo "<br/>Sorry, there was an error uploading your file.";
                echo '<script language = javascript>
                    alert ("Los archivos se cargaron correctamente.")
                    self.location="../administrador/'. $ruta . '?reporte=' . $reporte .'";
                    </script>';
            }
        }
    }

    function cargarfoto2($codigo, $reporte, $nombre_archiv_foto2, $modificar_fotos)
    {
        $ruta = ($modificar_fotos == "m") ? "Modificar-reporte.php" : "Crear-reporte.php";

        require_once 'conexion.php';
        $conexion = new Conexion();
        $target_dir = "../img_hallazgos/";
        $nombre_archivo = $nombre_archiv_foto2;
        $target_file = $target_dir . basename($nombre_archivo);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $error = "";
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            // Variables del formulario
            // $codigo = $_POST['codigo'];
            // Varificamos si el archivo subido es una imagen
            $check = getimagesize($_FILES["foto2"]["tmp_name"]);
            if ($check !== false) {
                echo "<br/>File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $error += "<br/>- El archivo no es una imagen.";
                echo "<br/>- File is not an image.";
                $uploadOk = 0;
                echo '<script language = javascript>
                alert ("El archivo no es un formato de imagen.")
                var reporte = "' . $reporte . '";
                self.location="../administrador/'. $ruta . '?reporte=" + reporte;
                </script>';
            }
        } else {
            echo '<script language = javascript>
            alert ("La información no corresponde, por favor verifique.")
            self.location="../administrador/'. $ruta . '"
            </script>';
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $error += "<br/>- El archivo no existe.";
            echo "<br/>- Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size - 500KB
        if ($_FILES["foto2"]["size"] > 10000000) {
            $error += "<br/>- El archivo es demasiado grande.";
            echo "- Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $error += "<br/>- El archivo no es un formato de imagen permitido, solo JPG, JPEG, PNG & GIF son permitidos.";
            echo "- Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<br/>- Sorry, your file was not uploaded.";
            echo '<script language = javascript>
            alert ("Por favor verifique la infomación a registrar\n"' . $error . '")
            self.location="../administrador/'. $ruta . '"
            </script>';
            // if everything is ok, try to upload file
        } else {
            // Nuevo nombre del archivo
            $nuevo_nombre_hallazgo = "Hallazgo2-" . $codigo . "-" . "." . $imageFileType;
            $new_target_file = $target_dir . basename($nuevo_nombre_hallazgo);
            echo "<br/>Codigo: " . $codigo;
            echo "<br/>Nombre Hallazgo: " . $nombre_archiv_foto2;
            echo "<br/>Nuevo Hallazgo: " . $nuevo_nombre_hallazgo;
            if (move_uploaded_file($_FILES["foto2"]["tmp_name"], $new_target_file)) {
                echo "<br/>El archivo se ha subido correctamente...";
                echo "The file " . htmlspecialchars(basename($nombre_archiv_foto2)) . " has been uploaded.";
                // Sentencias SQL - UPDATE
                $sql = "UPDATE reporte_hallazgo SET 
					   foto2=:foto2
				WHERE codigo = :codigo;";
                $uptd = $conexion->prepare($sql);
                $uptd->bindParam(":foto2", $nuevo_nombre_hallazgo);
                $uptd->bindParam(":codigo", $codigo);
                if ($uptd->execute()) {
                    echo '<script language = javascript>
                    alert ("Los archivos se cargaron correctamente.")
                    self.location="../administrador/'. $ruta . '?reporte=' . $reporte .'";
                    </script>';
                } else {
                    echo '<script language = javascript>
                    alert ("Los archivos se cargaron correctamente.")
                    const reporte = <?php echo $reporte;?>;
                    window.location.href=`../administrador/'. $ruta . '?reporte=${reporte}`;
                    </script>';
                }
            } else {
                echo "<br/>Sorry, there was an error uploading your file.";
                echo '<script language = javascript>
                    alert ("Los archivos se cargaron correctamente.")
                    const reporte = <?php echo $reporte;?>;
                    window.location.href=`../administrador/'. $ruta . '?reporte=${reporte}`;
                    </script>';
            }
        }
    }

    function cargarfoto3($codigo, $reporte, $nombre_archiv_foto3, $modificar_fotos)
    {
        $ruta = ($modificar_fotos == "m") ? "Modificar-reporte.php" : "Crear-reporte.php";

        require_once 'conexion.php';
        $conexion = new Conexion();
        $target_dir = "../img_hallazgos/";
        $nombre_archivo = $nombre_archiv_foto3;
        $target_file = $target_dir . basename($nombre_archivo);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $error = "";
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            // Variables del formulario
            // $codigo = $_POST['codigo'];
            // Varificamos si el archivo subido es una imagen
            $check = getimagesize($_FILES["foto3"]["tmp_name"]);
            if ($check !== false) {
                echo "<br/>File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $error += "<br/>- El archivo no es una imagen.";
                echo "<br/>- File is not an image.";
                $uploadOk = 0;
                echo '<script language = javascript>
                alert ("El archivo no es un formato de imagen.")
                var reporte = "' . $reporte . '";
                self.location="../administrador/'. $ruta . '?reporte=" + reporte;
                </script>';
            }
        } else {
            echo '<script language = javascript>
            alert ("La información no corresponde, por favor verifique.")
            self.location="../administrador/'. $ruta . '"
            </script>';
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $error += "<br/>- El archivo no existe.";
            echo "<br/>- Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size - 500KB
        if ($_FILES["foto3"]["size"] > 100000000000) {
            $error += "<br/>- El archivo es demasiado grande.";
            echo "- Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $error += "<br/>- El archivo no es un formato de imagen permitido, solo JPG, JPEG, PNG & GIF son permitidos.";
            echo "- Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<br/>- Sorry, your file was not uploaded.";
            echo '<script language = javascript>
            alert ("Por favor verifique la infomación a registrar\n"' . $error . '")
            self.location="../administrador/'. $ruta . '"
            </script>';
            // if everything is ok, try to upload file
        } else {
            // Nuevo nombre del archivo
            $nuevo_nombre_hallazgo = "Hallazgo3-" . $codigo . "-" . "." . $imageFileType;
            $new_target_file = $target_dir . basename($nuevo_nombre_hallazgo);
            echo "<br/>Codigo: " . $codigo;
            echo "<br/>Nombre Hallazgo: " . $nombre_archiv_foto3;
            echo "<br/>Nuevo Hallazgo: " . $nuevo_nombre_hallazgo;
            if (move_uploaded_file($_FILES["foto3"]["tmp_name"], $new_target_file)) {
                echo "<br/>El archivo se ha subido correctamente...";
                echo "The file " . htmlspecialchars(basename($nombre_archiv_foto3)) . " has been uploaded.";
                // Sentencias SQL - UPDATE
                $sql = "UPDATE reporte_hallazgo SET 
					   foto3=:foto3
				WHERE codigo = :codigo;";
                $uptd = $conexion->prepare($sql);
                $uptd->bindParam(":foto3", $nuevo_nombre_hallazgo);
                $uptd->bindParam(":codigo", $codigo);
                if ($uptd->execute()) {
                    echo '<script language = javascript>
                    alert ("Los archivos se cargaron correctamente.")
                    self.location="../administrador/'. $ruta . '?reporte=' . $reporte .'";
                    </script>';
                } else {
                    echo '<script language = javascript>
                    alert ("Error... Los archivos NO se cargaron correctamente.")
                    self.location="../administrador/'. $ruta . '"
                    </script>';
                }
            } else {
                echo "<br/>Sorry, there was an error uploading your file.";
                echo '<script language = javascript>
                alert ("Por favor verifique la infomación a registrar.")
                self.location="../administrador/'. $ruta . '"
                </script>';
            }
        }
    }

    function cargarfoto4($codigo, $reporte, $nombre_archiv_foto4, $modificar_fotos)
    {
        $ruta = ($modificar_fotos == "m") ? "Modificar-reporte.php" : "Crear-reporte.php";

        require_once 'conexion.php';
        $conexion = new Conexion();
        $target_dir = "../img_hallazgos/";
        $nombre_archivo = $nombre_archiv_foto4;
        $target_file = $target_dir . basename($nombre_archivo);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $error = "";
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            // Variables del formulario
            // $codigo = $_POST['codigo'];
            // Varificamos si el archivo subido es una imagen
            $check = getimagesize($_FILES["foto4"]["tmp_name"]);
            if ($check !== false) {
                echo "<br/>File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $error += "<br/>- El archivo no es una imagen.";
                echo "<br/>- File is not an image.";
                $uploadOk = 0;
                echo '<script language = javascript>
                alert ("El archivo no es un formato de imagen.")
                var reporte = "' . $reporte . '";
                self.location="../administrador/'. $ruta . '?reporte=" + reporte;
                </script>';
            }
        } else {
            echo '<script language = javascript>
            alert ("La información no corresponde, por favor verifique.")
            self.location="../administrador/'. $ruta . '"
            </script>';
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $error += "<br/>- El archivo no existe.";
            echo "<br/>- Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size - 500KB
        if ($_FILES["foto4"]["size"] > 100000000000) {
            $error += "<br/>- El archivo es demasiado grande.";
            echo "- Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $error += "<br/>- El archivo no es un formato de imagen permitido, solo JPG, JPEG, PNG & GIF son permitidos.";
            echo "- Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<br/>- Sorry, your file was not uploaded.";
            echo '<script language = javascript>
            alert ("Por favor verifique la infomación a registrar\n"' . $error . '")
            self.location="../administrador/'. $ruta . '"
            </script>';
            // if everything is ok, try to upload file
        } else {
            // Nuevo nombre del archivo
            $nuevo_nombre_hallazgo = "Hallazgo4-" . $codigo . "-" . "." . $imageFileType;
            $new_target_file = $target_dir . basename($nuevo_nombre_hallazgo);
            echo "<br/>Codigo: " . $codigo;
            echo "<br/>Nombre Hallazgo: " . $nombre_archiv_foto4;
            echo "<br/>Nuevo Hallazgo: " . $nuevo_nombre_hallazgo;
            if (move_uploaded_file($_FILES["foto4"]["tmp_name"], $new_target_file)) {
                echo "<br/>El archivo se ha subido correctamente...";
                echo "The file " . htmlspecialchars(basename($nombre_archiv_foto4)) . " has been uploaded.";
                // Sentencias SQL - UPDATE
                $sql = "UPDATE reporte_hallazgo SET
					   foto4=:foto4
				WHERE codigo = :codigo;";
                $uptd = $conexion->prepare($sql);
                $uptd->bindParam(":foto4", $nuevo_nombre_hallazgo);
                $uptd->bindParam(":codigo", $codigo);
                if ($uptd->execute()) {
                    echo '<script language = javascript>
                    alert ("Los archivos se cargaron correctamente.")
                    self.location="../administrador/'. $ruta . '?reporte=' . $reporte .'";
                    </script>';
                } else {
                    echo '<script language = javascript>
                    alert ("Los archivos se cargaron correctamente.")
                    const reporte = <?php echo $reporte;?>;
                    window.location.href=`../administrador/'. $ruta . '?reporte=${reporte}`;
                    </script>';
                }
            } else {
                echo "<br/>Sorry, there was an error uploading your file.";
                echo '<script language = javascript>
                    alert ("Los archivos se cargaron correctamente.")
                    const reporte = <?php echo $reporte;?>;
                    window.location.href=`../administrador/'. $ruta . '?reporte=${reporte}`;
                    </script>';
            }
        }
    }
}
