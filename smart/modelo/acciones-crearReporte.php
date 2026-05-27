<?php
date_default_timezone_set("America/Bogota");
session_start();
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'CrearReporte') {
		// $tipo_doc = $_POST['tipo_doc'];
		// $usuario = $_POST['usuario'];
		// $nombre_apellido = $_POST['nombre_apellido'];
		// $fecha_de_inicio = $_POST['fecha_de_inicio'];
		// $hora_de_inicio = $_POST['hora_de_inicio'];
		// $fecha_fin = $_POST['fecha_fin'];
		// $hora_fin = $_POST['hora_fin'];
		// $cantidad_mecanismo = $_POST['cantidad_mecanismo'];
		// $cantidad_de_sustancia = $_POST['cantidad_de_sustancia'];
		// $cantidad_de_hallazgo = $_POST['cantidad_de_hallazgo'];
		// $nivel_de_infestacion = $_POST['nivel_de_infestacion'];
		// $ver_pdf = $_POST['ver_pdf'];
		// $sql = "INSERT INTO reportes (tipo_doc, usuario, nombre_apellido, fecha_de_inicio, hora_de_inicio, fecha_fin, hora_fin, cantidad_mecanismo, cantidad_de_sustancia, cantidad_de_hallazgo, nivel_de_infestacion, ver_pdf) 
		// 		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		// $reg = $conexion->prepare($sql);
		// $reg->bindParam(1, $tipo_doc);
		// $reg->bindParam(2, $usuario);
		// $reg->bindParam(3, $nombre_apellido);
		// $reg->bindParam(4, $fecha_de_inicio);
		// $reg->bindParam(5, $hora_de_inicio);
		// $reg->bindParam(6, $fecha_fin);
		// $reg->bindParam(7, $hora_fin);
		// $reg->bindParam(8, $cantidad_mecanismo);
		// $reg->bindParam(9, $cantidad_de_sustancia);
		// $reg->bindParam(10, $cantidad_de_hallazgo);
		// $reg->bindParam(11, $nivel_de_infestacion);
		// $reg->bindParam(12, $ver_pdf);

		// if ($reg->execute() == TRUE) {
		// 	echo 1;
		// } else {
		// 	echo 0;
		// }
	} else if ($accion == 'usuario') {
		$codigo = $_POST['codigo'];
		$tipo_doc = $_POST['tipo_doc'];
		$usuario = $_POST['usuario'];
		$nombre_apellido = $_POST['nombre_apellido'];
		$nit_empresa = $_POST['nit_empresa'];
		$nombre_empresa = $_POST['nombre_empresa'];
		$fecha_de_inicio = $_POST['fecha_de_inicio'];
		$hora_de_inicio = $_POST['hora_de_inicio'];
		$fecha_fin = $_POST['fecha_fin'];
		$hora_fin = $_POST['hora_fin'];
		$elaborado_por = $_SESSION['nombre'] . " " . $_SESSION['apellido'] ;
		

		$sql = "INSERT INTO reportes (codigo, tipo_doc, usuario, nombre_apellido, nit_empresa, nombre_empresa, fecha_de_inicio, hora_de_inicio, fecha_fin, hora_fin, elaborado_por) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $codigo);
		$reg->bindParam(2, $tipo_doc);
		$reg->bindParam(3, $usuario);
		$reg->bindParam(4, $nombre_apellido);
		$reg->bindParam(5, $nit_empresa);
		$reg->bindParam(6, $nombre_empresa);
		$reg->bindParam(7, $fecha_de_inicio);
		$reg->bindParam(8, $hora_de_inicio);
		$reg->bindParam(9, $fecha_fin);
		$reg->bindParam(10, $hora_fin);
		$reg->bindParam(11, $elaborado_por);


		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'sustancias') {
		require_once './datos-sustancias.php';
		require_once './datos-cantidad.php';
		$mis_Sustancias = new misSustancias;
		$mis_cantidad = new misCantidad;

		$cod_reporte = $_POST['cod_reporte'];
		$usuario = $_POST['usuario'];
		$sustancias = $_POST['sustancias'];
		$cantidad = $_POST['cantidad'];
		$mi_cantidad = $mis_cantidad->viewCantidad($cantidad);
		$valorCantidad = $mi_cantidad[0]['valor'];
		$mediciones = $mi_cantidad[0]['mediciones'];
		$mi_sustancia = $mis_Sustancias->viewSustancia($sustancias);
		$laboratorio = $mi_sustancia[0]['laboratorio'];
		$nivel_riesgo = $mi_sustancia[0]['nivel_riesgo'];
		$fecha_vencimiento = $mi_sustancia[0]['fecha_vencimiento'];
		$registro_sanitario = $mi_sustancia[0]['registro_sanitario'];

		$sql = "INSERT INTO reporte_sustancias (usuario, sustancias, laboratorio, nivel_riesgo, fecha_vencimiento, registro_sanitario, cantidad, mediciones, cod_reporte)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $usuario);
		$reg->bindParam(2, $sustancias);
		$reg->bindParam(3, $laboratorio);
		$reg->bindParam(4, $nivel_riesgo);
		$reg->bindParam(5, $fecha_vencimiento);
		$reg->bindParam(6, $registro_sanitario);
		$reg->bindParam(7, $valorCantidad);
		$reg->bindParam(8, $mediciones);
		$reg->bindParam(9, $cod_reporte);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'mecanismo') {
		$cod_reporte = $_POST['cod_reporte'];
		$usuario = $_POST['usuario'];
		$mecanismo = $_POST['mecanismo'];
		$id_mecanismo = $_POST['id_mecanismo'];
		$estado = $_POST['estado'];

		$sql = "INSERT INTO reporte_mecanismo (cod_reporte, usuario, mecanismo, id_mecanismo, estado)
				VALUES (?, ?, ?, ?, ?)";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $cod_reporte);
		$reg->bindParam(2, $usuario);
		$reg->bindParam(3, $mecanismo);
		$reg->bindParam(4, $id_mecanismo);
		$reg->bindParam(5, $estado);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'tratamiento') {
		$usuario = $_POST['usuario'];
		$tratamiento = $_POST['tratamiento'];
		$metodo_control = $_POST['metodo_control'];
		$tipo_plagas = $_POST['tipo_plagas'];
		$cod_reporte = $_POST['cod_reporte'];
		$nivel_infestacion = $_POST['nivel_infestacion'];


		$sql = "INSERT INTO reporte_tratamiento (usuario, tratamiento, metodo_control, tipo_plagas, cod_reporte, nivel_infestacion)
				VALUES (?, ?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $usuario);
		$reg->bindParam(2, $tratamiento);
		$reg->bindParam(3, $metodo_control);
		$reg->bindParam(4, $tipo_plagas);
		$reg->bindParam(5, $cod_reporte);
		$reg->bindParam(6, $nivel_infestacion);

		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'hallazgo') {
		$cod_reporte = $_POST['cod_reporte'];
		$usuario = $_POST['usuario'];
		$hallazgo = $_POST['hallazgo'];
		$oportunidad_1 = $_POST['oportunidad_1'];
		$oportunidad_2 = $_POST['oportunidad_2'];
		$oportunidad_3 = $_POST['oportunidad_3'];
		$oportunidad_4 = $_POST['oportunidad_4'];

		$sql = "INSERT INTO reporte_hallazgo (usuario, hallazgo, cod_reporte, oportunidad_1, oportunidad_2, oportunidad_3, oportunidad_4)					   
				VALUES (?, ?, ?, ?, ?, ?, ?)";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $usuario);
		$reg->bindParam(2, $hallazgo);
		$reg->bindParam(3, $cod_reporte);
		$reg->bindParam(4, $oportunidad_1);
		$reg->bindParam(5, $oportunidad_2);
		$reg->bindParam(6, $oportunidad_3);
		$reg->bindParam(7, $oportunidad_4);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else {
		echo 2;
	}
} else {
	echo 3;
}
