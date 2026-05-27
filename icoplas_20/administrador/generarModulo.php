<?php


// *********** COMENTAR ESTA LÍNEA PARA QUE EL CÓDIGO FUNCIONE, SE HACE A MANERA DE PREVENCIÓN ***********

exit ("Quitar esta línea para usar el código, se hace de manera preventiva");

// *******************************************************************************************************

require_once '../connection/conexion.php';

if (!isset($argv[1])) {
    exit("❗Debes indicar el nombre de la tabla. Ej: php generarModulo.php usuarios\n");
}

$nombre = strtolower($argv[1]);
$nombre_mayus = ucfirst($nombre);
$jsNombre = str_replace('_', '-', $nombre);

// Obtener campos de la tabla
$db = new Conexion();
$stmt = $db->prepare("DESCRIBE $nombre");
$stmt->execute();
$campos = $stmt->fetchAll(PDO::FETCH_COLUMN);
$columnaBD = $campos[0];

// Crear archivos
$archivos = [
    // "$nombre.php" => generarPrincipal($nombre_mayus),
    "./views/admin/vista$nombre_mayus.php" => generarVista($nombre_mayus, $campos),
    // "./windows/modal$nombre_mayus.php" => generarModal($nombre_mayus, $campos),
    // "../controllers/funciones$nombre_mayus.js" => generarFuncionesJS($nombre, $nombre_mayus, $campos),
    // "../models/datos$nombre_mayus.php" => generarDatos($nombre, $nombre_mayus, $columnaBD),
    // "../models/acciones$nombre_mayus.php" => generarAcciones($nombre, $campos, $columnaBD),
];

foreach ($archivos as $ruta => $contenido) {
    $dir = dirname($ruta);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    file_put_contents($ruta, $contenido);
    echo "✅ Archivo creado: $ruta\n";
}

// Funciones generadoras
function generarPrincipal($nombre_mayus)
{
    return <<<HTML
    <?php
    require_once '../models/val-admin.php';
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
    \t<meta charset="UTF-8">
    \t<meta http-equiv="X-UA-Compatible" content="IE=edge">
    \t<meta name="viewport" content="width=device-width, initial-scale=1.0">
    \t<title>$nombre_mayus</title>
    \t<?php
    \tinclude_once '../assets/lib/lib_css.php';
    \t?>
    </head>

    <body>
    \t<div>
    \t\t<div id="tabla$nombre_mayus"></div>
    \t</div>
    \t<?php
    \tinclude_once './windows/modal$nombre_mayus.php';
    \t?>
    \t<?php
    \tinclude_once '../assets/lib/lib_js.php';
    \t?>
    \t<script src="../controllers/funciones$nombre_mayus.js"></script>
    \t<script>
    \t\t\$(document).ready(function() {
    \t\t\t$('#tabla$nombre_mayus').load('./views/admin/vista$nombre_mayus.php');
    \t\t\t\$('#agregarNuevo$nombre_mayus').click(function() {
    \t\t\t\tagregardatos$nombre_mayus();
    \t\t\t});
    \t\t\t\$('#actualizaDatos$nombre_mayus').click(function() {
    \t\t\t\tmodificar$nombre_mayus();
    \t\t\t});
    \t\t\t\$('#eliminarDatos$nombre_mayus').click(function() {
    \t\t\t\tpreguntarSiNo();
    \t\t\t});
    \t\t});
    \t</script>
    </body>

    </html>
    HTML;
}

function generarVista($nombre_mayus, $campos)
{
    $thead = implode('', array_map(fn($c) => "\t\t\t\t<th>$c</th>\n", $campos));
    $datosConcatenados = "\$datos = " . implode(" . \"||\" .\n\t\t\t\t\t", array_map(fn($c) => "\$data['$c']", $campos)) . ";";
    $tbody = implode("\n", array_map(fn($c) =>
    "\t\t\t\t\t<td>\n" .
        "\t\t\t\t\t\t<div class=\"text-center\">\n" .
        "\t\t\t\t\t\t\t<?php echo \$data['$c']; ?>\n" .
        "\t\t\t\t\t\t</div>\n" .
        "\t\t\t\t\t</td>", $campos));

    $botonEditar =
        "\t\t\t\t\t<td>\n" .
        "\t\t\t\t\t\t<div class=\"text-center\">\n" .
        "\t\t\t\t\t\t\t<button class=\"btn btn-primary bi bi-pencil-fill\" data-bs-toggle=\"modal\" data-bs-target=\"#modalEdicion{$nombre_mayus}\" onclick=\"agregarform{$nombre_mayus}('<?php echo  \$datos ?>')\"></button>\n" .
        "\t\t\t\t\t\t</div>\n" .
        "\t\t\t\t\t</td>\n" .
        "\t\t\t\t</tr>\n" .
        "\t\t\t<?php\n" .
        "\t\t\t\$cant$nombre_mayus++;\n" .
        "\t\t\t}\n" .
        "\t\t\t?>";

    $botonCrear = "\t<button class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#modalNuevo{$nombre_mayus}\" onclick=\"agregarFormNuevo{$nombre_mayus}()\">Crear $nombre_mayus</button>";

    return <<<HTML
    <?php
    require_once '../../../models/val-admin.php';
    require_once '../../../models/datos$nombre_mayus.php';
    // Instancias
    \$mis$nombre_mayus = new Mis$nombre_mayus();
    ?>
    <!-- Vista tabla de $nombre_mayus -->
    <div class="table-responsive">
    \t<table id="example" class="table table-striped table-bordered">
    \t\t<thead>
    \t\t\t<tr>
    $thead
    \t\t\t\t<th>Editar</th>
    \t\t</thead>
    \t\t<tbody>
    \t\t\t<?php
    \t\t\t\$res = \$mis{$nombre_mayus}->view{$nombre_mayus}();
    \t\t\t\$cant$nombre_mayus = 1;
    \t\t\tforeach (\$res as \$data) {
    \t\t\t\t// Datos para enviar
    \t\t\t\t$datosConcatenados
    \t\t\t?>
    \t\t\t<tr>
    $tbody
    $botonEditar
    \t\t</tbody>
    \t</table>
    $botonCrear
    </div>
    HTML;
}

function generarModal($nombre_mayus, $campos)
{
    $inputsCrear = "";
    foreach ($campos as $campo) {
        $inputsCrear .= "\t\t\t\t<div class=\"form-group\">\n";
        $inputsCrear .= "\t\t\t\t\t<label for=\"$campo\">$campo</label>\n";
        $inputsCrear .= "\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"$campo\" name=\"$campo\">\n";
        $inputsCrear .= "\t\t\t\t</div>\n";
    }

    $inputsEditar = "";
    foreach ($campos as $campo) {
        $inputsEditar .= "\t\t\t\t<div class=\"form-group\">\n";
        $inputsEditar .= "\t\t\t\t\t<label for=\"{$campo}u\">$campo</label>\n";
        $inputsEditar .= "\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"{$campo}u\" name=\"{$campo}u\">\n";
        $inputsEditar .= "\t\t\t\t</div>\n";
    }

    return <<<HTML
    <?php
    require_once '../models/val-admin.php';
    ?>
    <!-- Modal de resgisto $nombre_mayus -->
    <div class="modal fade" id="modalNuevo$nombre_mayus" tabindex="-1" aria-labelledby="myModalLabel">
    \t<div class="modal-dialog">
    \t\t<div class="modal-content">
    \t\t\t<div class="modal-header">
    \t\t\t\t<h5 class="modal-title">Registrar Nuevo $nombre_mayus</h5>
    \t\t\t\t<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    \t\t\t</div>
    \t\t\t<div class="modal-body">
    $inputsCrear
    \t\t\t</div>
    \t\t\t<div class="modal-footer">
    \t\t\t\t<button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="agregarNuevo$nombre_mayus">Crear</button>
    \t\t\t</div>
    \t\t</div>
    \t</div>
    </div>
    <!-- Modal de actualización $nombre_mayus -->
    <div class="modal fade" id="modalEdicion$nombre_mayus" tabindex="-1" aria-labelledby="myModalLabel">
    \t<div class="modal-dialog">
    \t\t<div class="modal-content">
    \t\t\t<div class="modal-header">
    \t\t\t\t<h5 class="modal-title">Actualizar $nombre_mayus</h5>
    \t\t\t\t<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    \t\t\t</div>
    \t\t\t<div class="modal-body">
    $inputsEditar
    \t\t\t</div>
    \t\t\t<div class="modal-footer">
    \t\t\t\t<div class="row">
    \t\t\t\t\t<div class="col col-sm-6 text-left">
    \t\t\t\t\t\t<button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="eliminarDatos$nombre_mayus">
    \t\t\t\t\t\t\tEliminar
    \t\t\t\t\t\t</button>
    \t\t\t\t\t</div>
    \t\t\t\t\t<div class="col col-sm-6 text-right">
    \t\t\t\t\t\t<button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="actualizaDatos$nombre_mayus">
    \t\t\t\t\t\t\tActualizar
    \t\t\t\t\t\t</button>
    \t\t\t\t\t</div>
    \t\t\t\t</div>
    \t\t\t</div>
    \t\t</div>
    \t</div>
    </div>
    HTML;
}

function generarDatos($nombre, $nombre_mayus, $columnaBD)
{
    return <<<PHP
    <?php
    if (!defined('RUTA_CONEXION')) {
    define('RUTA_CONEXION', __DIR__ . '/../connection/conexion.php');
    }
    class Mis$nombre_mayus
    {
        public function view$nombre_mayus()
        {
            require_once RUTA_CONEXION;
            \$conexion = new Conexion();
            \$arreglo = array();
            \$consulta = "SELECT * FROM $nombre ORDER BY $columnaBD ASC";
            \$modules = \$conexion->prepare(\$consulta);
            \$modules->execute();
            \$total = \$modules->rowCount();
            if (\$total > 0) {
                \$i = 0;
                while (\$data = \$modules->fetch(PDO::FETCH_ASSOC)) {
                    \$arreglo[\$i] = \$data;
                    \$i++;
                }
            }
            return \$arreglo;
        }

        public function view{$nombre_mayus}Codigo(\$codigo)
        {
            require_once RUTA_CONEXION;
            \$conexion = new Conexion();
            \$arreglo = array();
            \$consulta = "SELECT * FROM $nombre WHERE $columnaBD = :codigo";
            \$modules = \$conexion->prepare(\$consulta);
            \$modules->bindParam(":codigo", \$codigo);
            \$modules->execute();
            \$total = \$modules->rowCount();
            if (\$total > 0) {
                \$i = 0;
                while (\$data = \$modules->fetch(PDO::FETCH_ASSOC)) {
                    \$arreglo[\$i] = \$data;
                    \$i++;
                }
            }
            return \$arreglo;
        }

        public function count$nombre_mayus()
        {
            require_once RUTA_CONEXION;
            \$conexion = new Conexion();
            \$consulta = "SELECT count($columnaBD) as cant FROM $nombre";
            \$modules = \$conexion->prepare(\$consulta);
            \$modules->execute();
            \$data = \$modules->fetch(PDO::FETCH_ASSOC);
            return \$data['cant'];
        }

        public function max$nombre_mayus()
        {
            require_once RUTA_CONEXION;
            \$conexion = new Conexion();
            \$consecutivo = 0;
            \$sqlcon = "SELECT max($columnaBD) as maximo FROM $nombre";
            \$rescon = \$conexion->prepare(\$sqlcon);
            \$rescon->execute();
            \$rowcon = \$rescon->fetch(PDO::FETCH_ASSOC);
            \$consecutivo = \$rowcon['maximo'];
            \$consecutivo++;
            return \$consecutivo;
        }
    }
    PHP;
}

function generarFuncionesJS($nombre, $nombre_mayus, $campos)
{
    $camposCadena = implode(" + \n\t\t", array_map(fn($c, $i) => ($i === 0 ? "\"$c=\" + $c" : "\"&$c=\" + $c"), $campos, array_keys($campos))) . ';';
    $camposJSAdd = implode(";\n\t", array_map(fn($c) => "let $c = $(\"#$c\").val()", $campos));
    $resetCampos = implode(";\n\t", array_map(fn($c) => "$(\"#$c\").val(\"\")", $campos));
    $llenarCampos = implode(";\n\t", array_map(fn($i, $c) => "$(\"#{$c}u\").val(d[$i])", array_keys($campos), $campos));
    //Edición de datos
    $camposJSMod = implode(";\n\t", array_map(fn($c) => "let $c = $(\"#{$c}u\").val()", $campos));
    return <<<JS
    function agregarFormNuevo$nombre_mayus() {
    \t$resetCampos;
    }
    function agregardatos$nombre_mayus() {
    \t$camposJSAdd;
    \tlet cadena =
    \t\t$camposCadena
    \tlet mensaje_si = "$nombre_mayus registrado correctamente.";
    \tlet mensaje_no = "Error, NO se registró el $nombre.";
    \t\$.ajax({
    \t\ttype: "POST",
    \t\turl: "../models/acciones$nombre_mayus.php?accion=registrar",
    \t\tdata: cadena,
    \t\tsuccess: function (r) {
    \t\t\tconsole.log(r);
    \t\t\tif (r == 0) {
    \t\t\t\tSwal.fire({
    \t\t\t\t\ttitle: "Error!",
    \t\t\t\t\ttext: mensaje_no,
    \t\t\t\t\ticon: "error",
    \t\t\t\t\tconfirmButtonText: "Cerrar",
    \t\t\t\t\ttimer: 2000,
    \t\t\t\t\ttimerProgressBar: true
    \t\t\t\t}).then((result) => {
    \t\t\t\t\tcargarTabla$nombre_mayus();
    \t\t\t\t});
    \t\t\t} else {
    \t\t\t\tSwal.fire({
    \t\t\t\t\ttitle: "Registrado!",
    \t\t\t\t\ttext: mensaje_si,
    \t\t\t\t\ticon: "success",
    \t\t\t\t\tconfirmButtonText: "Cerrar",
    \t\t\t\t\ttimer: 2000,
    \t\t\t\t\ttimerProgressBar: true,
    \t\t\t\t}).then((result) => {
    \t\t\t\t\tcargarTabla$nombre_mayus();
    \t\t\t\t});
    \t\t\t}
    \t\t},
    \t});
    }
    function agregarform$nombre_mayus(datos) {
    \tlet d = datos.split("||");
    \t$llenarCampos;
    }
    function modificar$nombre_mayus() {
    \t$camposJSMod;
    \tlet cadena =
    \t\t$camposCadena
    \tlet mensaje_si = "$nombre_mayus modificado con éxito";
    \tlet mensaje_no = "Error al modificar";
    \t$.ajax({
    \t\ttype: "POST",
    \t\turl: "../models/acciones$nombre_mayus.php?accion=modificar",
    \t\tdata: cadena,
    \t\tsuccess: function (r) {
    \t\t\tconsole.log(r);
    \t\t\tSwal.fire({
    \t\t\t\ttitle: r == 0 ? "Error!" : "Modificado!",
    \t\t\t\ttext: r == 0 ? mensaje_no : mensaje_si,
    \t\t\t\ticon: r == 0 ? "error" : "success",
    \t\t\t\tconfirmButtonText: "Cerrar",
    \t\t\t\ttimer: 2000,
    \t\t\t\ttimerProgressBar: true
    \t\t\t}).then(() => {
    \t\t\t\tcargarTabla$nombre_mayus();
    \t\t\t}).catch(err => console.log("Error del alert"));
    \t\t}
    \t});
    }
    function cargarTabla$nombre_mayus() {
    \t$.ajax({
    \t\ttype: "POST",
    \t\turl: "../app/$nombre.php",
    \t\tasync: true,
    \t\tsuccess: function (respuesta) {
    \t\t\t\$("#tabla$nombre_mayus").html(respuesta);
    \t\t},
    \t\terror: function (request, error) {
    \t\t\tconsole.log("Error en la carga de la tabla:", error);
    \t\t},
    \t});
    }
    function preguntarSiNo() {
    \tlet codigo = \$("#{$campos[0]}u").val();
    \tSwal.fire({
    \t\ttitle: "¿Está seguro de eliminar el $nombre?",
    \t\tshowDenyButton: true,
    \t\tconfirmButtonText: "Eliminar",
    \t\tdenyButtonText: "Cancelar"
    \t}).then((result) => {
    \t\tif (result.isConfirmed) {
    \t\t\teliminarDatos(codigo);
    \t\t} else if (result.isDenied) {
    \t\t\tSwal.fire("Cancelado", "No se ha eliminado el $nombre");
    \t\t}
    \t});
    }
    function eliminarDatos(codigo) {
    \tlet cadena = "codigo=" + codigo;
    \tlet mensaje_si = "El $nombre_mayus borrado correctamente.";
    \tlet mensaje_no = "Error.. NO se eliminó el $nombre_mayus.";
    \t$.ajax({
    \t\ttype: "POST",
    \t\turl: "../models/acciones$nombre_mayus.php?accion=eliminar",
    \t\tdata: cadena,
    \t\tsuccess: function (r) {
    \t\t\tconsole.log(r);
    \t\t\tif (r == 0) {
    \t\t\t\tSwal.fire({
    \t\t\t\t\ttitle: "Error!",
    \t\t\t\t\ttext: mensaje_no,
    \t\t\t\t\ticon: "error",
    \t\t\t\t\tconfirmButtonText: "Cerrar",
    \t\t\t\t\ttimer: 2000,
    \t\t\t\t\ttimerProgressBar: true
    \t\t\t\t}).then((result) => {
    \t\t\t\t\tcargarTabla$nombre_mayus();
    \t\t\t\t}).catch((err) => {
    \t\t\t\t\tconsole.log("Error del alert");
    \t\t\t\t});
    \t\t\t} else {
    \t\t\t\tSwal.fire({
    \t\t\t\t\ttitle: "Eliminado!",
    \t\t\t\t\ttext: mensaje_si,
    \t\t\t\t\ticon: "success",
    \t\t\t\t\tconfirmButtonText: "Cerrar",
    \t\t\t\t\ttimer: 2000,
    \t\t\t\t\ttimerProgressBar: true,
    \t\t\t\t}).then((result) => {
    \t\t\t\t\tcargarTabla$nombre_mayus();
    \t\t\t\t}).catch((err) => {
    \t\t\t\t\tconsole.log("Error del alert");
    \t\t\t\t});
    \t\t\t}
    \t\t},
    \t});
    }
    JS;
}

function generarAcciones($nombre, $campos, $columnaBD)
{
    $camposPOST = implode(";\n\t\t\t$", array_map(fn($c) => "$c = \$_POST['$c']", $campos));

    $insertCampos = implode(",\n\t\t\t\t\t\t\t\t", $campos);
    $insertValues = rtrim(str_repeat('?, ', count($campos)), ', ');
    $bindInsert = implode(";\n\t\t\t", array_map(fn($i) => '$reg->bindParam(' . ($i + 1) . ', $' . $campos[$i] . ')', array_keys($campos)));

    $updateSet = implode(",\n\t\t\t\t\t\t", array_map(fn($c) => "$c=:$c", $campos));
    $bindUpdate = implode(";\n\t\t\t", array_map(fn($c) => '$upd->bindParam(":' . $c . '", $' . $c . ')', $campos));

    return <<<PHP
    <?php
    date_default_timezone_set("America/Bogota");
    require_once '../connection/conexion.php';
    \$conexion = new Conexion();

    if (isset(\$_GET['accion'])) {
        \$accion = \$_GET['accion'];

        if (\$accion == 'registrar') {
            \$$camposPOST;
            \$sql = "INSERT INTO $nombre($insertCampos) VALUES ($insertValues)";
            \$reg = \$conexion->prepare(\$sql);
            $bindInsert;
            echo \$reg->execute() ? 1 : 0;
        } elseif (\$accion == 'modificar') {
            \$$camposPOST;
            \$sql = "UPDATE $nombre SET
                        $updateSet
                    WHERE $columnaBD=:$columnaBD";
            \$upd = \$conexion->prepare(\$sql);
            $bindUpdate;
            echo \$upd->execute() ? 1 : 0;
        } elseif (\$accion == 'eliminar') {
            \$$columnaBD = \$_POST['codigo'];
            \$sql = "DELETE FROM $nombre WHERE $columnaBD = :$columnaBD";
            \$del = \$conexion->prepare(\$sql);
            \$del->bindParam(":$columnaBD", \$$columnaBD);
            echo \$del->execute() ? 1 : 0;
        } else {
            echo 2;
        }
    } else {
        echo 3;
    }
    PHP;
}
