<?php
date_default_timezone_set("America/Bogota");
session_start();
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	 if ($accion == 'usuario') {
        $codigo = $_POST['codigo'];
		$nombre_propietario = $_POST['nombre_propietario'];
		$identificacion = $_POST['identificacion'];
		$telefono = $_POST['telefono'];
		

		$sql = "INSERT INTO ficha_tecnica (codigo, nombre_propietario, identificacion, telefono) 
				VALUES (?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $codigo);
		$reg->bindParam(2, $nombre_propietario);
		$reg->bindParam(3, $identificacion);
		$reg->bindParam(4, $telefono);


		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'informe') {
		$codigo = $_POST['codigo'];
		$marca = $_POST['marca'];
		$referencia = $_POST['referencia'];
		$disco_duro = $_POST['disco_duro'];
		$memoria_ram = $_POST['memoria_ram'];
		$tarjeta_de_video = $_POST['tarjeta_de_video'];
		$monitor = $_POST['monitor'];
		$nombre_board = $_POST['nombre_board'];
		$puertos_audio_voz = $_POST['puertos_audio_voz'];
		$chip_set_motherboard = $_POST['chip_set_motherboard'];
		$modelo = $_POST['modelo'];
		$microprocesador = $_POST['microprocesador'];
		$capacidad = $_POST['capacidad'];
		$tipo_capacidad = $_POST['tipo_capacidad'];
		$unid_cd_dvd = $_POST['unid_cd_dvd'];
		$teclado = $_POST['teclado'];
		$puerto_usb = $_POST['puerto_usb'];
		$ranuras_para_memorias_ram = $_POST['ranuras_para_memorias_ram'];
		$tipo_de_bios = $_POST['tipo_de_bios'];
		$lector_de_tarjeta = $_POST['lector_de_tarjeta'];
		$ranura_pci = $_POST['ranura_pci'];
		$aceleradora = $_POST['aceleradora'];
		$placa_de_red = $_POST['placa_de_red'];
		$version_de_bios = $_POST['version_de_bios'];
		$observaciones = $_POST['observaciones'];
		$realizo = $_POST['realizo'];
		$recibio = $_POST['recibio'];
		

		$sql = "INSERT INTO informe (codigo, marca, referencia, disco_duro, memoria_ram, tarjeta_de_video, monitor, nombre_board, puertos_audio_voz, chip_set_motherboard, modelo, microprocesador, capacidad, tipo_capacidad, unid_cd_dvd, teclado, puerto_usb, ranuras_para_memorias_ram, tipo_de_bios, lector_de_tarjeta, ranura_pci, aceleradora, placa_de_red, version_de_bios, observaciones, realizo, recibio) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $codigo);
		$reg->bindParam(2, $marca);
		$reg->bindParam(3, $referencia);
		$reg->bindParam(4, $disco_duro);
		$reg->bindParam(5, $memoria_ram);
		$reg->bindParam(6, $tarjeta_de_video);
		$reg->bindParam(7, $monitor);
		$reg->bindParam(8, $nombre_board);
		$reg->bindParam(9, $puertos_audio_voz);
		$reg->bindParam(10, $chip_set_motherboard);
		$reg->bindParam(11, $modelo);
		$reg->bindParam(12, $microprocesador);
		$reg->bindParam(13, $capacidad);
		$reg->bindParam(14, $tipo_capacidad);
		$reg->bindParam(15, $unid_cd_dvd);
		$reg->bindParam(16, $teclado);
		$reg->bindParam(17, $puerto_usb);
		$reg->bindParam(18, $ranuras_para_memorias_ram);
		$reg->bindParam(19, $tipo_de_bios);
		$reg->bindParam(20, $lector_de_tarjeta);
		$reg->bindParam(21, $ranura_pci);
		$reg->bindParam(22, $aceleradora);
		$reg->bindParam(23, $placa_de_red);
		$reg->bindParam(24, $version_de_bios);
		$reg->bindParam(25, $observaciones);
		$reg->bindParam(26, $realizo);
		$reg->bindParam(27, $recibio);


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