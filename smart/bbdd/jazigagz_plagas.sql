-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-02-2025 a las 09:37:39
-- Versión del servidor: 10.6.20-MariaDB-cll-lve
-- Versión de PHP: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jazigagz_plagas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidad`
--

CREATE TABLE `cantidad` (
  `codigo` int(11) NOT NULL,
  `cod_sustancias` int(11) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `mediciones` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `cantidad`
--

INSERT INTO `cantidad` (`codigo`, `cod_sustancias`, `valor`, `mediciones`) VALUES
(1, 1, '0', ' ml x Lt'),
(2, 2, '10', ' ml x Lt'),
(3, 2, '20', 'ml x lt'),
(4, 2, '5 ', ' ml x Lt'),
(5, 3, '8', ' ml x Lt'),
(6, 3, '10', ' ml x Lt'),
(7, 3, '20', ' ml x Lt'),
(8, 4, '4', ' ml x Lt'),
(9, 4, '8', ' ml x Lt'),
(10, 4, '12', ' ml x Lt'),
(11, 4, '16 ', 'ml x lt'),
(13, 5, '8', 'ml x lt'),
(14, 5, '12', ' ml x Lt'),
(15, 7, '25', 'gr'),
(16, 8, '30 ', 'Ml x Lt'),
(17, 7, '50', 'gr'),
(18, 8, '15', 'Ml x Lt'),
(19, 9, '50', 'Ml x Lt'),
(20, 9, '90', 'Ml x Lt'),
(21, 9, '30', 'Ml x Lt'),
(22, 10, '15', 'Ml');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_usuarios`
--

CREATE TABLE `documentos_usuarios` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `archivo` varchar(50) NOT NULL,
  `id_cliente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documentos_usuarios`
--

INSERT INTO `documentos_usuarios` (`codigo`, `nombre`, `descripcion`, `archivo`, `id_cliente`) VALUES
(1, 'RUT DELL AMORE', 'Registro unico tributario', 'Documento-1.pdf', '940415662'),
(2, 'RUT HYM ', 'Registro unico tributario ', 'Documento-2.pdf', '940415662'),
(3, 'RUT MANJAR DEL PAN ', 'Registro unico tributario', 'Documento-3.pdf', '901351205'),
(5, 'CERTIFICADO SANITARIO', 'DELL AMORE ', 'Documento-5.pdf', '940415662'),
(6, 'CERTIFICADO SANITARIO', 'HYM SAS', 'Documento-6.pdf', '940415662'),
(7, 'Ficha tecnica Mecanismos', 'lamapra atrapa insectos Armadiha ', 'Documento-7.pdf', '940415662'),
(8, 'Ficha tecnica sustancias ', 'Alpirix ', 'Documento-8.pdf', '940415662'),
(9, 'Hoja de seguridad sustancias ', 'Alpirix', 'Documento-9.pdf', '940415662'),
(10, 'Factura electrónica ', 'Marzo ', 'Documento-10.pdf', '901351205'),
(11, 'RUT ALIMENTOS LA MARIA ', 'Registro unico tributario', 'Documento-11.pdf', '1090450611'),
(12, 'MANUAL MANEJO ECOLOGICO DE CUCARACHAS ', 'Procedimiento ', 'Documento-12.pdf', '1004966801'),
(13, 'FAC MEP-01-04-24', 'Correspondiente al mes de abril ', 'Documento-13.pdf', '901351205'),
(14, 'FAC MEP-BOMGUSTO-11-04-24', 'Correspondiente al mes de abril ', 'Documento-14.pdf', '1004966801'),
(15, 'FAC MEP-01-04-24', 'Correspondiente al mes de abril ', 'Documento-15.pdf', '940415662'),
(16, 'FACTURA DE VENTA', 'CORRESPONDIENTE AL MES DE DICIEMBRE 2024', 'Documento-16.pdf', '901351205'),
(17, 'FACTURA DE VENTA', 'CORREPONDIENTE AL MES DE DICIEMBRE 2024', 'Documento-17.pdf', '1090518629'),
(18, 'CRONOGRAMA  ', 'APLICACIONES AÑO 2025', 'Documento-18.pdf', '1031128578'),
(20, 'FICHA TECNICA ', 'ALPIRIX ', 'Documento-20.pdf', '60361987'),
(22, 'FICHA TECNICA ', 'ATONIC', 'Documento-22.pdf', '60361987'),
(23, 'FICHA TECNICA ', 'ANTIPETS ', 'Documento-23.pdf', '60361987'),
(24, 'HOJA DE SEGURIDAD ', 'ALPIRIX ', 'Documento-24.pdf', '60361987'),
(25, 'HOJA DE SEGURIDAD ', 'ATONIC', 'Documento-25.pdf', '60361987'),
(26, 'DIAGNÓSTICO', 'Proceso de identificar y evaluacion inicial ', 'Documento-26.pdf', '1031128578'),
(27, 'PLANOS', 'RUTA DE RIESGOS', 'Documento-27.pdf', '1031128578');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hallazgos`
--

CREATE TABLE `hallazgos` (
  `codigo` int(11) NOT NULL,
  `donde_se_encuentra` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `mejora` varchar(45) DEFAULT NULL,
  `fotos` varchar(45) DEFAULT NULL,
  `identificaciones_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inve_mecanismo`
--

CREATE TABLE `inve_mecanismo` (
  `codigo` int(11) NOT NULL,
  `nombre_mecanismo` varchar(30) DEFAULT NULL,
  `id_inve` varchar(30) DEFAULT NULL,
  `esta_asignado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `inve_mecanismo`
--

INSERT INTO `inve_mecanismo` (`codigo`, `nombre_mecanismo`, `id_inve`, `esta_asignado`) VALUES
(1, 'Lampara armadiha - Manual', '95af164e', 1),
(2, 'Trampa cocodrilo - Electrónica', '8b40926b', 1),
(6, 'N/A - N/A', '1a7e0580', 1),
(7, 'N/A - N/A', '11e26c0a', 1),
(8, 'N/A - N/A', '50870283', 1),
(9, 'Trampa cocodrilo - Electrónica', '3f9590a7', 1),
(10, 'Beta - Manual', '2191', 1),
(11, 'Beta - Manual', '2192', 1),
(12, 'Porta cebo  - Manual', '8fe651a4', 1),
(13, 'Porta cebo  - Manual', '3448bc7c', 1),
(14, 'Porta cebo  - Manual', '41fb8c54', 1),
(16, 'luminosa armadiha - Manual', '819', 1),
(84, 'Alpha  - Manual', 'e6dcb297', 1),
(85, 'Alpha  - Manual', '1d79551f', 1),
(97, 'Alpha  - Manual', 'e68c78b1', 1),
(98, 'N/A - N/A', '', 1),
(111, 'Alpha  - Manual', '68f4e984', 1),
(112, 'Lamina gato  - Manual', '61cbfc17', 1),
(113, 'Lamina gato  - Manual', 'b8b1a8bc', 1),
(114, 'Lamina gato  - Manual', '5712fdad', 1),
(115, 'Lamina gato  - Manual', 'e9f1a4d6', 1),
(116, 'Trampa cocodrilo - Electrónica', '1', 1),
(117, 'null', '9950038d', 1),
(130, 'null', 'd5763cbd1', 1),
(146, 'Monitor cucarachas y hormigas ', '59b886431', 1),
(147, 'Monitor cucarachas y hormigas ', '59b886432', 1),
(148, 'Monitor cucarachas y hormigas ', '59b886433', 1),
(149, 'Monitor cucarachas y hormigas ', '59b886434', 1),
(150, 'FlyBag - Manual', 'F1', 1),
(162, 'Estación cebadera todo - Manua', '53791', 1),
(163, 'Estación cebadera todo - Manua', '53792', 1),
(164, 'Luminosa 928 - Manual', '89289', 1),
(259, 'Beta - Manual', '2193', 1),
(382, 'Estación cebadera todo - Manua', '53793', 1),
(383, 'Estación cebadera todo - Manua', '53794', 1),
(384, 'Luminosa 928 - Manual', '6928', 1),
(385, 'luminosa armadiha - Manual', '611', 1),
(386, 'Prueba - Electrónica', '0', 0),
(387, 'Estación cebadera todo - Elect', '8Tecnoparque', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `codigo` int(11) NOT NULL,
  `nombre_laboratorio` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`codigo`, `nombre_laboratorio`) VALUES
(1, 'NULL'),
(2, 'Anasac'),
(3, 'Sinochem Agro'),
(4, 'Catchmaster'),
(5, 'Bayer'),
(6, 'Quimicos del EJE'),
(7, 'Rotam');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanismo`
--

CREATE TABLE `mecanismo` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `mecanismo`
--

INSERT INTO `mecanismo` (`codigo`, `nombre`, `tipo`) VALUES
(1, 'N/A', 'N/A'),
(2, 'Trampa cocodrilo', 'Electrónica'),
(3, 'Trampa cocodrilo', 'Manual'),
(4, 'Beta', 'Electrónica'),
(5, 'Beta', 'Manual'),
(6, 'Multi-captura', 'Electrónica'),
(7, 'Multi-captura', 'Manual'),
(8, 'Beta cocodrilo', 'Electrónica'),
(9, 'Beta cocodrilo', 'Manual'),
(10, 'Lampara armadiha', 'Manual'),
(11, 'Porta cebo ', 'Manual'),
(12, '951a72b9-Alpha', 'Manual'),
(13, '81f0afce-Alpha', 'Manual'),
(14, '77e728e4-Alpha', 'Manual'),
(20, '951a72b9-Alpha', 'Manual'),
(21, '93de9d45-Alpha', 'Manual'),
(22, 'cd8a33e5-gatopapel', 'Manual'),
(23, 'd2d2c949-gatopapel', 'Manual'),
(24, 'df45ab5e-gatopapel', 'Manual'),
(25, '4663706a-gatopapel', 'Manual'),
(26, 'gato de papel ', 'Manual'),
(27, 'Alpha ', 'Manual'),
(28, 'Lamina gato ', 'Manual'),
(29, 'Monitor cucarachas y hormigas', 'Manual'),
(30, 'FlyBag', 'Manual'),
(31, 'Estación cebadera todo', 'Manual'),
(32, 'luminosa armadiha', 'Manual'),
(33, 'Luminosa 928', 'Manual'),
(34, 'Prueba', 'Electrónica'),
(35, 'Estación cebadera todo', 'Electrónica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanismo_alerta`
--

CREATE TABLE `mecanismo_alerta` (
  `codigo` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `identificacion_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_tratamiento`
--

CREATE TABLE `metodo_tratamiento` (
  `codigo` int(11) NOT NULL,
  `metodo_control` varchar(45) NOT NULL,
  `tratamiento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodo_tratamiento`
--

INSERT INTO `metodo_tratamiento` (`codigo`, `metodo_control`, `tratamiento`) VALUES
(1, 'N/A', 'N/A'),
(2, 'Aspersion', 'Dorinsectacion'),
(3, 'Nebulizacion', 'Dorinsectacion'),
(4, 'Termonebulizacion', 'Dorinsectacion'),
(5, 'Gel cebadera', 'Dorinsectacion'),
(6, 'laminado', 'Dorinsectacion'),
(7, 'Deshidratantes', 'Dorinsectacion'),
(8, 'Aplicación de larvicida', 'Dorinsectacion'),
(9, 'Cryogenia', 'Dorinsectacion'),
(10, 'Cebado', 'Roedorizacion '),
(11, 'laminado', 'Roedorizacion '),
(12, 'Smart', 'Roedorizacion '),
(13, 'Sellamiento', 'Roedorizacion '),
(14, 'Limpieza y desinfección', 'Sanetización'),
(15, 'Vapor', 'Sanetización'),
(16, 'Cryogenia', 'Sanetización'),
(17, 'revision de tanques', 'Visita técnica '),
(18, 'Inspección de área', 'Visita técnica '),
(19, 'Lavado de tanques', 'Sanetización'),
(20, 'Instalación de mecanismo', 'Dorinsectación '),
(21, 'Instalación de mecanismo', 'Roedorizacion ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_infestacion`
--

CREATE TABLE `nivel_infestacion` (
  `codigo` int(11) NOT NULL,
  `nivel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `nivel_infestacion`
--

INSERT INTO `nivel_infestacion` (`codigo`, `nivel`) VALUES
(1, 'N/A'),
(2, 'Bajo'),
(3, 'Medio'),
(4, 'Alto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_mecanismo`
--

CREATE TABLE `nombre_mecanismo` (
  `codigo` int(11) NOT NULL,
  `nombre_mecanismo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nombre_mecanismo`
--

INSERT INTO `nombre_mecanismo` (`codigo`, `nombre_mecanismo`) VALUES
(1, 'Trampa cocodrilo'),
(2, 'Beta'),
(3, 'Beta cocodrilo'),
(4, 'Multi-captura'),
(5, 'Lampara armadiha'),
(6, 'N/A'),
(7, 'Porta cebo '),
(9, 'luminosa armadiha'),
(29, 'Alpha '),
(30, 'Lamina gato '),
(32, 'Monitor cucarachas y hormigas'),
(33, 'FlyBag'),
(35, 'Estación cebadera todo'),
(36, 'Luminosa 928'),
(37, 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `codigo` int(11) NOT NULL,
  `tipo_doc` varchar(4) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `nombre_apellido` varchar(45) DEFAULT NULL,
  `nit_empresa` varchar(30) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `fecha_de_inicio` date DEFAULT NULL,
  `hora_de_inicio` time DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `cantidad_mecanismo` int(11) DEFAULT NULL,
  `cantidad_de_sustancia` int(11) DEFAULT NULL,
  `cantidad_de_hallazgo` int(11) DEFAULT NULL,
  `cantidad_de_mejoras` int(11) DEFAULT NULL,
  `elaborado_por` varchar(45) NOT NULL,
  `ver_pdf` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`codigo`, `tipo_doc`, `usuario`, `nombre_apellido`, `nit_empresa`, `nombre_empresa`, `fecha_de_inicio`, `hora_de_inicio`, `fecha_fin`, `hora_fin`, `cantidad_mecanismo`, `cantidad_de_sustancia`, `cantidad_de_hallazgo`, `cantidad_de_mejoras`, `elaborado_por`, `ver_pdf`) VALUES
(1, 'CC', 1111111111, 'Hanni  ', '1111111111', 'Decoffe', '2024-03-21', '20:50:00', '2024-03-21', '22:00:00', NULL, NULL, NULL, NULL, '', NULL),
(2, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-03-31', '10:45:00', '2024-03-31', '11:45:00', NULL, NULL, NULL, NULL, '', NULL),
(3, 'CC', 940415662, 'Paola  ', '901621809', 'DELL AMORE ', '2024-02-02', '22:00:00', '2024-02-02', '23:10:00', NULL, NULL, NULL, NULL, '', NULL),
(4, 'CC', 940415662, 'Paola  ', '900325368', 'SPEZIA', '2024-01-28', '07:06:00', '2024-01-28', '07:45:00', NULL, NULL, NULL, NULL, '', NULL),
(6, 'CC', 940415662, 'Paola  ', '900325368', 'SPEZIA', '2024-03-16', '09:55:00', '2024-03-16', '10:05:00', NULL, NULL, NULL, NULL, '', NULL),
(7, 'CC', 576896370, 'Monica ', '572233877', 'La mejor ', '2024-04-03', '18:09:00', '2024-04-03', '18:35:00', NULL, NULL, NULL, NULL, '', NULL),
(8, 'CC', 940415662, 'Paola  ', '900325368', 'SPEZIA', '2024-02-17', '08:30:00', '2024-02-17', '10:00:00', NULL, NULL, NULL, NULL, '', NULL),
(9, 'CC', 940415662, 'Paola  ', '900325368', 'SPEZIA', '2024-01-20', '07:29:00', '2024-01-20', '08:59:00', NULL, NULL, NULL, NULL, '', NULL),
(10, 'CC', 940415662, 'Paola  ', '900325368', 'SPEZIA', '2024-02-19', '18:00:00', '2024-02-19', '19:00:00', NULL, NULL, NULL, NULL, '', NULL),
(11, 'CC', 940415662, 'Paola  ', '700057432', 'LEONE', '2024-01-20', '06:30:00', '2024-01-20', '07:00:00', NULL, NULL, NULL, NULL, '', NULL),
(12, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-04-06', '07:45:00', '2024-04-06', '08:10:00', NULL, NULL, NULL, NULL, '', NULL),
(13, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-04-08', '21:08:00', '2024-04-08', '21:25:00', NULL, NULL, NULL, NULL, '', NULL),
(14, 'CC', 1004966801, 'María del Mar Montes Gomez', '901227075', 'Inversiones Bomgusto', '2024-04-10', '15:10:00', '2024-04-10', '15:46:00', NULL, NULL, NULL, NULL, '', NULL),
(15, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-04-10', '16:20:00', '2024-04-10', '17:00:00', NULL, NULL, NULL, NULL, '', NULL),
(17, 'CC', 60361987, 'Durfady González Luna ', '901479222', 'Industria alimenticia Goodys', '2024-04-15', '08:15:00', '2024-04-15', '09:30:00', 1, 1, 1, NULL, '', NULL),
(18, 'CC', 60361987, 'Durfady González Luna ', '901479222', 'Industria alimenticia Goodys', '2024-04-18', '17:15:00', '2024-04-18', '18:25:00', NULL, NULL, NULL, NULL, '', NULL),
(19, 'CC', 1111111111, 'Hanni  ', '1111111111', 'Decoffe', '2024-04-18', '20:35:00', '2024-04-18', '21:30:00', NULL, NULL, NULL, NULL, '', NULL),
(20, 'CC', 60361987, 'Durfady González Luna ', '901479222', 'Industria alimenticia Goodys', '2024-04-19', '17:15:00', '2024-04-19', '18:15:00', NULL, NULL, NULL, NULL, '', NULL),
(21, 'CC', 940415662, 'Paola  ', '900325368', 'SPEZIA', '2024-04-22', '18:51:00', '2024-04-22', '19:40:00', NULL, NULL, NULL, NULL, '', NULL),
(22, 'CC', 1090450611, 'Stefanny ', '901585175', 'Alimentos la Maria S.A.S', '2024-02-17', '03:30:00', '2024-02-17', '04:30:00', NULL, NULL, NULL, NULL, '', NULL),
(23, 'CC', 1090450611, 'Stefanny ', '901585175', 'Alimentos la Maria S.A.S', '2024-02-20', '08:30:00', '2024-02-20', '10:05:00', NULL, NULL, NULL, NULL, '', NULL),
(24, 'CC', 1090450611, 'Stefanny ', '901585175', 'Alimentos la Maria S.A.S', '2024-02-26', '08:30:00', '2024-02-26', '09:10:00', NULL, NULL, NULL, NULL, '', NULL),
(25, 'CC', 12345, 'Diego Monoga', '12345', 'Casa', '2024-04-26', '10:15:00', '0000-00-00', '00:00:00', NULL, NULL, NULL, NULL, '', NULL),
(27, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-04-26', '03:00:00', '2024-04-26', '15:40:00', NULL, NULL, NULL, NULL, '', NULL),
(28, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-04-26', '03:00:00', '2024-04-26', '03:40:00', NULL, NULL, NULL, NULL, '', NULL),
(29, 'CC', 60381451, 'elizabeth delgado', '60542525', 'icoplas', '2024-05-02', '16:39:00', '2024-05-03', '16:39:00', NULL, NULL, NULL, NULL, '', NULL),
(31, 'CC', 1111111111, 'Hanni  ', '1111111111', 'Decoffe', '2024-05-06', '20:09:00', '2024-05-06', '20:50:00', NULL, NULL, NULL, NULL, '', NULL),
(32, 'CC', 1004966801, 'María del Mar Montes Gomez', '901227075', 'Inversiones Bomgusto', '2024-05-09', '18:03:00', '2024-05-09', '19:40:00', 1, 2, 1, NULL, '', NULL),
(33, 'CC', 1004966801, 'María del Mar Montes Gomez', '901227075', 'Inversiones Bomgusto', '2024-04-11', '18:00:00', '2024-04-11', '18:35:00', 1, 1, 1, NULL, '', NULL),
(34, 'CC', 1004966801, 'María del Mar Montes Gomez', '901227075', 'Inversiones Bomgusto', '2024-05-01', '10:50:00', '2024-05-01', '11:55:00', NULL, NULL, NULL, NULL, '', NULL),
(35, 'CC', 576896370, 'Monica ', '572233877', 'La mejor ', '2024-05-11', '19:00:00', '2024-05-11', '19:20:00', 1, 2, 1, NULL, '', NULL),
(36, 'CC', 1111111111, 'Hanni  ', '1111111111', 'Decoffe', '2024-05-17', '21:05:00', '2024-05-17', '22:15:00', NULL, NULL, NULL, NULL, '', NULL),
(37, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-04-28', '10:39:00', '2024-04-28', '15:39:00', NULL, NULL, NULL, NULL, '', NULL),
(38, 'CC', 0, 'Dirla Baron', '0', 'casa', '2024-05-18', '12:29:00', '2024-05-18', '13:20:00', NULL, NULL, NULL, NULL, '', NULL),
(41, 'CC', 1091966141, 'Carlos Alberto  Rojas', '', 'Parrilla Express', '2024-05-21', '09:35:00', '2024-05-21', '10:10:00', NULL, NULL, NULL, NULL, '', NULL),
(42, 'CC', 1091966141, 'Carlos Alberto  Rojas', '', 'Parrilla Express', '2024-05-23', '22:30:00', '2024-05-23', '23:11:00', NULL, NULL, NULL, NULL, '', NULL),
(43, 'CC', 576896370, 'Monica ', '572233877', 'La mejor ', '2024-05-31', '19:20:00', '2024-05-31', '19:40:00', NULL, NULL, NULL, NULL, '', NULL),
(44, 'CC', 1091966141, 'Carlos Alberto  Rojas', '', 'Parrilla Express', '2024-06-04', '10:01:00', '2024-06-04', '10:40:00', NULL, NULL, NULL, NULL, '', NULL),
(45, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-06-06', '14:45:00', '2024-06-06', '15:30:00', NULL, NULL, NULL, NULL, '', NULL),
(46, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-06-09', '08:20:00', '2024-06-09', '09:50:00', NULL, NULL, NULL, NULL, '', NULL),
(47, 'CC', 1091966141, 'Carlos Alberto  Rojas', '', 'Parrilla Express', '2024-06-11', '10:00:00', '2024-06-11', '10:15:00', NULL, NULL, NULL, NULL, '', NULL),
(48, 'CC', 901391572, 'Jakeline Bautista', '901391572', 'Naypansas', '2024-06-15', '16:00:00', '2024-06-15', '17:34:00', NULL, NULL, NULL, NULL, '', NULL),
(49, 'CC', 1091966141, 'Carlos Alberto  Rojas', '', 'Parrilla Express', '2024-06-17', '10:40:00', '2024-06-17', '11:00:00', NULL, NULL, NULL, NULL, '', NULL),
(50, 'CC', 1111111111, 'Hanni  ', '1111111111', 'Decoffe', '2024-06-17', '11:00:00', '2024-06-17', '11:47:00', NULL, NULL, NULL, NULL, '', NULL),
(51, 'CC', 901391572, 'Jakeline Bautista', '901391572', 'Naypansas', '2024-06-25', '16:00:00', '2024-06-25', '17:50:00', NULL, NULL, NULL, NULL, '', NULL),
(52, 'CC', 576896370, 'Monica ', '572233877', 'La mejor ', '2024-06-25', '18:20:00', '2024-06-25', '18:50:00', NULL, NULL, NULL, NULL, '', NULL),
(53, 'CC', 576896370, 'Monica ', '572233877', 'La mejor ', '2024-01-20', '18:00:00', '2024-01-20', '18:35:00', NULL, NULL, NULL, NULL, '', NULL),
(54, 'CC', 576896370, 'Monica ', '572233877', 'La mejor ', '2024-02-15', '18:35:00', '2024-02-15', '19:20:00', NULL, NULL, NULL, NULL, '', NULL),
(55, 'CC', 576896370, 'Monica ', '572233877', 'La mejor ', '2024-03-06', '17:39:00', '2024-03-06', '18:15:00', NULL, NULL, NULL, NULL, '', NULL),
(56, 'CC', 576896370, 'Monica ', '572233877', 'La mejor ', '2024-03-18', '18:00:00', '2024-03-18', '18:45:00', NULL, NULL, NULL, NULL, '', NULL),
(57, 'CC', 60361987, 'Durfady González Luna ', '901479222', 'Industria alimenticia Goodys', '2024-07-13', '05:00:00', '2024-07-13', '05:40:00', 0, 0, 0, NULL, 'Diego Landázuri', NULL),
(58, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-07-14', '08:30:00', '2024-07-14', '09:40:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(59, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-07-31', '14:30:00', '2024-07-31', '15:00:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(60, 'CC', 60361987, 'Durfady González Luna ', '901479222', 'Industria alimenticia Goodys', '2024-07-29', '17:00:00', '2024-07-29', '17:40:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(61, 'CC', 1090518629, 'Jairo  Sanguino', '901306351', 'Renova', '2024-07-26', '07:00:00', '2024-07-26', '07:39:00', 0, 1, 1, NULL, 'Diego Landázuri', NULL),
(63, 'CC', 576896370, 'Monica ', '572233877', 'Trinos', '2024-07-24', '06:15:00', '2024-07-24', '06:50:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(64, 'CC', 940415662, 'Paola  ', '700057432', 'LEONE', '2024-07-14', '08:00:00', '2024-07-14', '08:40:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(65, 'CC', 940415662, 'Paola  ', '900325368', 'SPEZIA', '2024-07-15', '05:50:00', '2024-07-15', '07:00:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(66, 'CC', 940415662, 'Paola  ', '900325368', 'SPEZIA', '2024-08-02', '14:30:00', '2024-08-02', '14:58:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(67, 'CC', 901391572, 'Jakeline Bautista', '901391572', 'Naypansas', '2024-08-05', '17:30:00', '2024-08-05', '18:00:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(68, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-08-21', '14:30:00', '2024-08-21', '15:10:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(69, 'CC', 576896370, 'Monica ', '572233877', 'Trinos', '2024-08-22', '18:18:00', '2024-08-22', '07:00:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(70, 'CC', 1, 'Lissy Andrea Zambrano Pérez ', '', 'Casa', '2024-08-29', '17:00:00', '2024-08-29', '19:00:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(72, 'CC', 1090450611, 'Stefanny ', '901585175', 'Alimentos la Maria S.A.S', '2024-08-24', '06:00:00', '2024-08-24', '07:00:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(73, 'CC', 60361987, 'Durfady González Luna ', '901479222', 'Industria alimenticia Goodys', '2024-08-24', '16:00:00', '2024-08-24', '17:10:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(74, 'CC', 12345, 'Diego Monoga', '12345', 'Casa', '2024-09-04', '17:21:00', '2024-09-04', '17:21:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(75, 'CC', 1090450611, 'Stefanny ', '901585175', 'Alimentos la Maria S.A.S', '2024-04-23', '04:00:00', '2024-04-23', '05:10:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(76, 'CC', 576896370, 'Monica ', '572233877', 'Trinos', '2024-09-06', '18:10:00', '2024-09-17', '19:00:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(77, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-09-01', '09:00:00', '2024-09-01', '10:25:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(78, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-09-08', '08:30:00', '2024-09-08', '09:39:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(79, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-09-22', '08:30:00', '2024-09-22', '10:44:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(80, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-09-27', '14:15:00', '2024-09-27', '14:35:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(81, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-10-01', '09:55:00', '2024-10-01', '10:15:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(82, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-10-03', '15:00:00', '2024-10-03', '17:45:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(83, 'CC', 60361987, 'Durfady González Luna ', '901479222', 'Industria alimenticia Goodys', '2024-09-28', '16:00:00', '2024-09-28', '17:30:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(84, 'CC', 940415662, 'Paola  ', '900325368', 'SPEZIA', '2024-09-16', '05:40:00', '2024-09-16', '06:15:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(85, 'CC', 940415662, 'Paola  ', '900325368', 'SPEZIA', '2024-10-02', '05:05:00', '2024-10-02', '05:45:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(86, 'CC', 940415662, 'Paola  ', '900325368', 'SPEZIA', '2024-10-10', '09:30:00', '2024-10-10', '10:10:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(87, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-10-11', '16:00:00', '2024-10-11', '16:33:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(88, 'CC', 901739936, 'Hugo  Montes', '9017399361', 'Centro educativo pensadores creativos ', '2024-09-08', '10:30:00', '2024-09-08', '11:30:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(89, 'CC', 1090518629, 'Jairo  Sanguino', '901306351', 'Renova', '2024-10-24', '19:00:00', '2024-10-24', '19:40:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(90, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-11-24', '07:00:00', '2024-11-24', '07:45:00', 0, 1, 1, NULL, 'Diego Landázuri', NULL),
(91, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-11-25', '09:00:00', '2024-11-25', '09:45:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(92, 'CC', 1031128578, 'Mónica Patricia Romero Sánchez', '10311285781', 'Zoolotcotas ', '2024-11-24', '12:00:00', '2024-11-24', '12:40:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(93, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-12-02', '10:00:00', '2024-12-02', '10:38:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(94, 'CC', 60361987, 'Durfady González Luna ', '901479222', 'Industria alimenticia Goodys', '2024-12-07', '16:00:00', '2024-12-07', '16:15:00', 1, 1, 1, NULL, 'Diego Landázuri', NULL),
(95, 'CC', 1090450611, 'Stefanny ', '901585175', 'Alimentos la Maria S.A.S', '2024-12-08', '07:45:00', '2024-12-08', '08:15:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(96, 'CC', 901351205, 'Ciro Jaimes Medina', '901351205', 'Panaderia el manjar del pan SAS', '2024-12-15', '09:30:00', '2024-12-15', '10:00:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(97, 'CC', 1090450611, 'Stefanny ', '901585175', 'Alimentos la Maria S.A.S', '2024-12-14', '08:22:00', '2024-12-14', '09:01:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(98, 'CC', 1090450611, 'Stefanny ', '901585175', 'Alimentos la Maria S.A.S', '2025-01-22', '07:45:00', '2025-01-22', '08:28:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL),
(99, 'CC', 940415662, 'Paola  ', '900325368', 'SPEZIA', '2025-01-05', '06:00:00', '2025-01-05', '07:13:00', 1, 1, 1, NULL, 'Diego Landázuri', NULL),
(100, 'CC', 940415662, 'Paola  ', '700057432', 'LEONE', '2024-12-05', '06:20:00', '2025-01-05', '07:00:00', NULL, NULL, NULL, NULL, 'Diego Landázuri', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_hallazgo`
--

CREATE TABLE `reporte_hallazgo` (
  `codigo` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `hallazgo` varchar(45) NOT NULL,
  `cod_reporte` int(11) NOT NULL,
  `foto1` varchar(45) NOT NULL,
  `oportunidad_1` varchar(255) NOT NULL,
  `foto2` varchar(45) NOT NULL,
  `oportunidad_2` varchar(255) NOT NULL,
  `foto3` varchar(45) NOT NULL,
  `oportunidad_3` varchar(255) NOT NULL,
  `foto4` varchar(45) NOT NULL,
  `oportunidad_4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reporte_hallazgo`
--

INSERT INTO `reporte_hallazgo` (`codigo`, `usuario`, `hallazgo`, `cod_reporte`, `foto1`, `oportunidad_1`, `foto2`, `oportunidad_2`, `foto3`, `oportunidad_3`, `foto4`, `oportunidad_4`) VALUES
(2, '1111111111', 'Puertas y pisos ', 1, 'Hallazgo1-2-.jpg', 'Se realizó la instalación de material resistente de fácil limpieza en piso de la entrada del establecimiento de punto salón principal Se realizó la instalación de material resistente de fácil limpieza en piso de la entrada del establecimiento de punto sal', 'Hallazgo2-2-.jpeg', 'Se recomienda a realizar limpieza de trampa grasa en área de cocina por frecuentemente diariamente máximo cada 3 días para evitar condiciones favorables que atraigan insectos\n', 'Hallazgo3-2-.jpeg', 'Se aplicó zyrox moscas cebo atrayente mojable no toxico algunos bordes estratégicamente para eliminar moscas por contacto e ingestión ', 'Hallazgo4-2-.jpeg', 'Se.recomiemda esperar 1 hora para volver a ingresar al establecimiento, de igualmente realizar controles periodicos por lo menos cada 15 días '),
(8, '901351205', 'Control cucarachas y hormigas ', 2, 'Hallazgo1-8-.jpg', 'Se evidenció lagartija en etapa temprana en área de bodega hizo contacto con el producto y se aniquilo', 'Hallazgo2-8-.jpg', 'Se evidencia Avistamiento de hormigas en área de producción se aplicó gel ', 'Hallazgo3-8-.jpg', 'Se evidenció presencia se comejen adulto en áreas externas buscando hacer enjambre se aniquilo al entrar en contacto con producto', 'Hallazgo4-8-.jpg', 'Se realizó aspersión en todas las áreas en borde inferior de la pared en relación con el suelo el producto utilizado es un deltametrina lote 061023 fecha de vencimiento 10/2026 se usó 10 mil en total por 2 litros de agua para más de 50 Mts'),
(11, '940415662', 'Procedimiento ', 3, 'Hallazgo1-11-.jpg', 'Se aplicó micro partículas directamente a pisos y paredes ', 'Hallazgo2-11-.jpg', 'Se aplicó cebo germicida no toxico en equipos en parte que entra en contacto con el suelo', 'Hallazgo3-11-.jpg', 'Se evidenció espacios limpios ', 'Hallazgo4-11-.jpg', 'Se recomendó no dejar orificios en paredes ni grietas además de esperar por lo menos 1 hora para volver a ingresar '),
(12, '940415662', 'Superficies ', 4, '', 'Se realizo nebulización en todas las áreas ', '', 'Se evidencio áreas limpias y despejadas ', '', 'Se recomienda esperar al menos 1 hora para volver a ingresar al establecimiento ', '', 'Se aplico mililitros sobre litros en 5 Lts en tocal '),
(14, '940415662', 'Procedimiento ', 6, 'Hallazgo1-14-.jpg', 'Se inspeccionó el lugar y se evidenció insectos aniquilados de los tratamientos anteriores', 'Hallazgo2-14-.jpg', 'Se realizó limpieza de la lámpara ', 'Hallazgo3-14-.jpg', 'Se realizó retiro de la lámina ', 'Hallazgo4-14-.jpg', 'Se realizó instalación de la lámina nueva control ecológico sin sustancias tóxicas '),
(15, '576896370', 'Procedimiento ', 7, 'Hallazgo1-15-.jpg', 'Se evidenció áreas limpias ', 'Hallazgo2-15-.jpg', 'Se recomienda ingresar nuevamente después de 1hora', 'Hallazgo3-15-.jpg', 'N/A', 'Hallazgo4-15-.jpg', 'N/A'),
(16, '940415662', 'Áreas externas ', 8, 'Hallazgo1-16-.jpg', 'Se.evidencio ventanales con envejecimiento debido factor que atrae polilla de madera seca', 'Hallazgo2-16-.jpg', 'Se realizó aspersión en áreas externas en paredes y zonas verdes ', 'Hallazgo3-16-.jpg', 'Se recomienda proteger la madera contra polilla ', 'Hallazgo4-16-.jpg', 'La temperatura y la estación del año puede ser un factor que contribuye a la presencia de las plagas hay que realizar controles contra larvas '),
(17, '940415662', 'Puertas y pisos ', 9, '', 'Se evidenció cria de insectos como polillas en pisos y zonas verdes', '', 'Se recomendó realizar poda de zonas verdes ', '', 'Se evidenció avistamiento alto de cucarachas se recomienda realizar limpieza en sifones externos y trampa grasa ', '', 'N/A'),
(18, '940415662', 'N/A', 10, '', 'N/A', '', 'N/A', '', 'N/A', '', 'N/A'),
(19, '940415662', 'N/A', 11, '', 'Se.evidencio áreas limpias y despejadas ', '', 'Se recomendó Esperar al menos 1 hora después del tratamiento para ingresar ', '', 'Se evidenció presencia de insectos en áreas externas ', '', 'Se recomienda realizar manejo ecológico de plagas y calidad de medio ambiente periodicos'),
(21, '901351205', 'N/A', 12, 'Hallazgo1-21-.jpg', 'N/A', 'Hallazgo2-21-.jpg', 'N/A', 'Hallazgo3-21-.jpg', 'N/A', 'Hallazgo4-21-.jpg', 'N/A'),
(22, '901351205', 'Pisos ', 13, 'Hallazgo1-22-.jpg', 'Se recomienda remover las partidas de polvo que acumula en lugares más difíciles de remover  ', 'Hallazgo2-22-.jpg', 'Se realiza aplicación de gel para control de cucarachas y hormigas  en vitrinas ', 'Hallazgo3-22-.jpg', 'Se realiza aspersión en área de despacho ', 'Hallazgo4-22-.jpg', 'Se recomienda esperar al menos 1 hora para volver al área tratada '),
(23, '1004966801', 'Condiciones de Infraestructura ', 14, 'Hallazgo1-23-.jpg', 'Se evidenció techo falso, que eventualmente queda desprotegido para facilitar la salida de calor, no obstante se facilitaría el acceso de moscas a la zona de producción ', 'Hallazgo2-23-.jpg', 'Se evidenció en área de cuarto de crecimiento estufa con presencia de telaraña', 'Hallazgo3-23-.jpg', 'Se evidenció en salida de cuarto frio la presencia de cucaracha aniquilada ', 'Hallazgo4-23-.jpg', 'En el área de almacenamiento de materia prima se recomienda una adecuada limpieza antes y después del procedimiento '),
(24, '901351205', 'Áreas generales ', 15, 'Hallazgo1-24-.jpg', 'Se evidenció pared en área de cocción resanada con material que facilita la remoción de partículas de suciedad, no obstante se recomienda instalar la tapa que protege el apagador junto a la ventana ', 'Hallazgo2-24-.jpg', 'Se recomienda instalación de Mecanismos de captura para moscas en el balcón del área de cocción para evitar que desde el exterior las moscas ingresen al área mencionada ', 'Hallazgo3-24-.jpg', 'Se evidenció que algunas baldosas de las escaleras presentan daños', 'Hallazgo4-24-.jpg', 'En área social, se evidenció ingreso de avispa.\nTambién se evidencia en el área de despacho específicamente en la Lámpara atrapa insectos Mariposas, avispas y abejas además de moscas '),
(26, '60361987', 'Áreas generales ', 17, 'Hallazgo1-26-.jpg', 'En el área de alistamiento, paquetería y materia prima se evidencia la presencia de Paredes falsas en Materiales como PVC o Drywall, así mismo se evidencia la instalación de Mallas en espacios abiertos y ventanas.', 'Hallazgo2-26-.jpg', 'En el área de bodega y marketing ubicada en la parte trasera de la planta se ha dado avistamiento de Roedores, se recomienda realizar un despeje y organización del area mencionada.', 'Hallazgo3-26-.jpg', 'En el área de Materia prima y oficinas se ha dado avistamiento de cucarachas de distintos tamaños.', '', 'Se menciona por el personal de la planta la presencia de moscas, mosquitos ( horarios después de 4:00 pm)  lagartijas y sapos en las distintas áreas'),
(28, '60361987', 'Condiciones sanitarias ', 18, 'Hallazgo1-28-.jpg', 'Se evidencia áreas limpias y despejadas los elementos estaban cubiertos y protegidos ', 'Hallazgo2-28-.jpg', 'Se evidenció aglomeración de mosquitos en área de pasillos ', 'Hallazgo3-28-.jpg', 'Se realizó nebulizacion en todas las áreas incluyendo oficinas se utilizó 5 litros de agua y de ingrediente activo 40 mil en total ', 'Hallazgo4-28-.jpg', 'Se recomendó Esperar 1 hora para volver a ingresar '),
(29, '1111111111', 'Condiciones sanitarias ', 19, 'Hallazgo1-29-.jpg', 'Se evidenció realización de actividades de limpieza antes del procedimiento no obstante los techos del área de cocina tienen telarañas y las escaleras con apariencia de acumulación de partículas de polvo.', 'Hallazgo2-29-.jpg', 'Se evidenció elementos y equipos protegidos ', 'Hallazgo3-29-.jpg', 'Se evidenció presencia de moscas y mosquitos ', 'Hallazgo4-29-.jpg', 'Se recomendó Esperar una hora para volver a ingresar al establecimiento '),
(30, '60361987', 'Condiciones sanitarias ', 20, 'Hallazgo1-30-.jpg', 'Se recomienda instalar rejillas en sifones en área de producción ', 'Hallazgo2-30-.jpg', 'Se recomienda retirar trampa de roedores que se encuentra en la entrada en mal estado ', 'Hallazgo3-30-.jpg', 'Se aplicó 8 mililitro por litro en 5 litros de agua en total ', 'Hallazgo4-30-.jpg', 'Se recomendó Esperar de 1 a 2 horas para volver a ingresar al establecimiento '),
(31, '940415662', 'Condiciones sanitarias ', 21, 'Hallazgo1-31-.jpg', 'Se evidenció areas despejadas y limpias ', 'Hallazgo2-31-.jpg', 'Se evidenció ranas en pasillo de baños del salón principal ', 'Hallazgo3-31-.jpg', 'Se evidenció salamanqueja en borde de pared del marco de la puerta en salón principal ', 'Hallazgo4-31-.jpg', 'El área de lavado de elementos de limpieza tiene rejillas no obstante el borde de la pared facilita el refugio de.plagas '),
(32, '1090450611', 'Condiciones sanitarias ', 22, 'Hallazgo1-32-.jpg', 'Se.evidencio áreas limpias y despejadas ', 'Hallazgo2-32-.jpg', 'Se realizó procedimiento en áreas en general ', 'Hallazgo3-32-.jpg', 'Se utilizó 4 mil en 2 lts de agua 8 mil en total ', 'Hallazgo4-32-.jpg', 'Se recomienda esperar una hora para volver a ingresar a las instalaciones '),
(35, '1090450611', 'Condiciones sanitarias ', 23, 'Hallazgo1-35-.jpg', 'Se realizó instalación de los mecanismos con sus respectivos láminas ', 'Hallazgo2-35-.jpg', 'N/A', 'Hallazgo3-35-.jpg', 'N/A', 'Hallazgo4-35-.jpg', 'N/A'),
(36, '1090450611', 'Monitoreo a mecanismos ', 24, 'Hallazgo1-36-.jpg', 'Se evidenció lámina de mecanismos roidos los que están terminando el área de recepción en inicio de área de pre producción ', 'Hallazgo2-36-.jpg', 'No se evidenció capturas de roedores.', 'Hallazgo3-36-.jpg', 'Se realizó cambio de láminas adhesivas ', 'Hallazgo4-36-.jpg', 'Se evidenció captura de una cucaracha en mecanismo junto al portón en orientación izquierda '),
(37, '901351205', 'Procedimiento ', 27, 'Hallazgo1-37-.jpg', 'Se realizó limpieza del mecanismo de luz ', 'Hallazgo2-37-.jpg', 'Se realizó retiro de lámina de captura ', 'Hallazgo3-37-.jpg', 'Se realizó cambio de lámina de captura ', 'Hallazgo4-37-.jpg', 'Se dejó funcionando mecanismo de luz en punto de venta '),
(38, '901351205', 'Condiciones sanitarias ', 28, '', 'Se evidenció tanque de producción por la mitad ', '', 'Se evidenció tanque de agua para uso general más abajo de la mitad ', '', 'Se evidenció los otros dos tanques por la mitad ', '', 'Se realizará lavado de los tanques el día domingo 28 de abril del 2024'),
(40, '60381451', 'No dejar comida', 29, '', '', '', '', '', '', '', ''),
(41, '1111111111', 'Condiciones sanitarias ', 31, 'Hallazgo1-41-.jpg', 'Se realizó nebulizacion en área de cocina se evidenció todo bien protegido ', 'Hallazgo2-41-.jpg', 'Se evidenció en área de cocina telarañas y los bordes de paredes con acumulación de suciedad visible ', 'Hallazgo3-41-.jpg', 'Se recomienda realizar remoción de partículas de polvo sobre todo en las partes más difíciles de llegar ', 'Hallazgo4-41-.jpg', 'Se evidenció presencia de moscas y fueron aniquiladas en área de cocina y en área de punto de venta 4 moscas domésticas en total '),
(42, '1004966801', 'Procedimiento ', 32, 'Hallazgo1-42-.jpg', 'Se evidenció presencia de cucarachas de la especie oriental', 'Hallazgo2-42-.jpg', 'Se inició a espolvorear en conectores eléctricos y por guada escobas ', 'Hallazgo3-42-.jpg', 'Se evidenció presencia de Hormigas en toma eléctrica cercano al tanque de refrigeración ', 'Hallazgo4-42-.jpg', 'Se evidenció insectos aniquilados posterior al servicio también se evidenció otros insectos como saltamontes '),
(43, '1004966801', 'Condiciones sanitarias ', 33, '', 'Se evidenció áreas limpias y despejadas ', '', 'Se evidenció presencia de moscas durante el procedimiento ', '', 'Se realizó procedimiento a todas las áreas en general ', '', 'Se recomienda esperar de una hora para volver a ingresar '),
(44, '576896370', 'Procedimientos', 35, 'Hallazgo1-44-.jpg', 'Se evidenció tres mecanismos para control de roedores ', 'Hallazgo2-44-.jpg', 'Se evidenció un mecanismo con una lámina con una captura de cucaracha ', 'Hallazgo3-44-.jpg', 'Se aplica producto por espolvoreo', 'Hallazgo4-44-.jpg', 'Se recomienda ingresar después de una hora '),
(45, '1111111111', 'Condiciones sanitarias ', 36, 'Hallazgo1-45-.jpg', 'Se evidenció mantenimiento a unidades sanitarias de la plaza lo que podría ser un foco que atrae las plagas se realizo la preparación en un (1) Lts de disolvente', 'Hallazgo2-45-.jpg', 'Se evidenció en las zonas externas en los otros locales desechos arrojados directamente en el suelo, después de tratada el área se recomienda esperar una hora  para volver a ingresar ', '', 'Se evidenció tienda de mascotas al lado y establecimiento de comida se recomienda sugerir realizar controles periodicos que beneficie los ambientes de manera conjunta', '', 'No se evidenció presencia de plagas dentro del establecimiento ni en cocina de en punto de venta los factores que inciden en las plagas son ajenos al establecimiento y al apoyo a la gestión '),
(46, '1111111111', 'Se realizó la instalación de material resiste', 1, '', 'Se realizó la instalación de material resistente de fácil limpieza en piso de la entrada del establecimiento de punto salón principal un poco más más se puede', '', 'Se realizó la instalación de material resistente de fácil limpieza en piso de la entrada del establecimiento de punto salón principal ', '', 'Se realizó la instalación de material resistente de fácil limpieza en piso de la entrada del establecimiento de punto salón principal ', '', 'Se realizó la instalación de material resistente de fácil limpieza en piso de la entrada del establecimiento de punto salón principal '),
(47, '1111111111', 'otra más para que pase de hoja', 1, '', 'Se realizó la instalación de material resistente de fácil limpieza en piso de la entrada del establecimiento de punto salón principal ', '', 'Se realizó la instalación de material resistente de fácil limpieza en piso de la entrada del establecimiento de punto salón principal ', '', 'Se realizó la instalación de material resistente de fácil limpieza en piso de la entrada del establecimiento de punto salón principal ', '', 'Se realizó la instalación de material resistente de fácil limpieza en piso de la entrada del establecimiento de punto salón principal '),
(48, '901351205', 'Evidencia ', 37, 'Hallazgo1-48-.jpg', 'Se realizó limpieza y desinfección de 4 tanques ', 'Hallazgo2-48-.jpg', 'Se realizó remoción de partículas de suciedad visible ', 'Hallazgo3-48-.jpg', 'Se aplicó desinfectante para eliminar microorganismos indeseables', 'Hallazgo4-48-.jpg', 'Los tanques quedan vacíos se debe esperar que se llenen '),
(49, '0', 'Condiciones sanitarias ', 38, 'Hallazgo1-49-.jpg', 'Se recomendó realizar limpieza a tanque de agua ', 'Hallazgo2-49-.jpg', 'Se programo limpieza de tanque para el 25 del mes en curso ', 'Hallazgo3-49-.jpg', 'Se realizó tratamiento por todas las áreas ', 'Hallazgo4-49-.jpg', 'Se recomienda esperar entre una y dos horas para volver a ingresar a la vivienda '),
(50, '1091966141', 'Áreas generales ', 40, 'Hallazgo1-50-.jpg', 'Se encuentran excrementos de Roedor en el Área de la cocina, asi mismo se menciona por el personal haber encontrado roedores de distintos tamaños en el área mencionada', 'Hallazgo2-50-.jpg', 'Se evidencia un sifón sin su respectiva rejilla, se recomienda hacer la adecuación pertinente para evitar el posible ingreso de  Insectos por este medio; específicamente \"Cucaracha \" o \"Chiripa\" .', 'Hallazgo3-50-.jpg', 'Se evidencia debajo de las estufas y áreas de cocción de alimentos algunas manchas y salpicaduras de aceite de cocina,  se recomienda la gestión y limpieza de estas; dado que pueden ser causal de la aparición de cucarachas, roedores, moscas y hormigas.', 'Hallazgo4-50-.jpg', 'Se evidencia la presencia de algunos residuos no aprovechables (papel, plásticos) debajo de la estantería\nSe recomienda realizar un despeje, organización y limpieza profunda de cada una de las áreas que componen el establecimiento.'),
(51, '1091966141', 'Áreas generales ', 41, 'Hallazgo1-51-.jpeg', 'Se encuentran excrementos de Roedor en el Área de la cocina, asi mismo se menciona por el personal haber encontrado roedores de distintos tamaños en el área mencionada', 'Hallazgo2-51-.jpeg', 'Se evidencia un sifón sin su respectiva rejilla, se recomienda hacer la adecuación pertinente para evitar el posible ingreso de Insectos por este medio; específicamente \"Cucaracha \" ', 'Hallazgo3-51-.jpeg', 'Se evidencia debajo de las estufas y áreas de cocción de alimentos algunas manchas y salpicaduras de aceite de cocina, se recomienda la gestión y limpieza de estas; dado que pueden ser causal de la aparición de cucarachas, roedores, moscas y hormigas.', 'Hallazgo4-51-.jpeg', 'Se evidencia la presencia de algunos residuos no aprovechables (papel, plásticos) debajo de la estantería Se recomienda realizar un despeje, organización y limpieza profunda de cada una de las áreas que componen el establecimiento.'),
(52, '1091966141', 'Condiciones sanitarias ', 42, 'Hallazgo1-52-.jpg', 'Se evidenció actividades de limpieza antes de iniciar ', 'Hallazgo2-52-.jpg', 'Se realizó espolvoreo en áreas en general  ', 'Hallazgo3-52-.jpg', 'Se recomienda lavar todo muy bien posterior mente', 'Hallazgo4-52-.jpg', 'Se recomienda esperar 1 hora para reingresar al sitio.'),
(53, '576896370', 'Estaciones de cebado control de roedor ', 43, 'Hallazgo1-53-.jpg', 'Se evidenció estaciones de cebado con consumo ', 'Hallazgo2-53-.jpg', 'Se evidenció canastilla con ruta de roedor ', 'Hallazgo3-53-.jpg', 'Se evidenció 3 capturas de cucarachas ', 'Hallazgo4-53-.jpg', 'Cambio de 2 láminas y hay 3 estaciones mini sin cebo '),
(54, '1091966141', 'Condiciones sanitarias ', 44, 'Hallazgo1-54-.jpg', 'Se evidenció canasta de almacenamiento de materia prima Roida ', 'Hallazgo2-54-.jpg', 'Se realizó instalación de 2 estaciones de roedores ', 'Hallazgo3-54-.jpg', 'Se realizara seguimiento para evidenciar capturas ', 'Hallazgo4-54-.jpg', 'Se evidenció ruta de roedor en lateral de pared en estantes'),
(55, '901351205', 'Lámparas atrapa insectos ', 45, 'Hallazgo1-55-.jpeg', 'Se reemplazará bombilla de trampa luminosa 928 ', 'Hallazgo2-55-.jpg', 'Se realizó cambio de lámina 928 se instaló nueva se capturo moscas y avistamiento de abejas ', 'Hallazgo3-55-.jpg', 'Se evidenció camino de hormigas en producción ', 'Hallazgo4-55-.jpg', 'Se aplicó gel en esquinas y tomas eléctricos de protección '),
(56, '901351205', 'Procedimiento ', 46, 'Hallazgo1-56-.jpg', 'Se realizó fumigación área de repostería, producción y horneo', 'Hallazgo2-56-.jpg', 'Se realizó espolvoreo en los guarda escobas tomas eléctricos y debajo de las ruedas de los carritos', 'Hallazgo3-56-.jpg', 'Se evidenció una mosca en producción ', 'Hallazgo4-56-.jpg', 'Se recomienda esperar por lo menos una hora para ingresar a las áreas tratadas '),
(57, '901391572', 'Condiciones sanitarias ', 48, 'Hallazgo1-57-.jpg', 'Se evidenció área de baños, pasillos y paredes y marcos de puertas con anidamiento de plagas ', 'Hallazgo2-57-.jpg', 'Se evidenció baños con huevecillos en paredes y estructura con grietas ', '', 'Se evidenció pared de ladrillo y cemento superficie rustica que dificulta la limpieza ', '', 'Se recomienda realizar mejoras para evitar el anidamiento y refugio de plagas '),
(58, '901391572', 'Condiciones sanitarias ', 51, 'Hallazgo1-58-.jpg', 'Se evidenció adecuaciones en baños sellamientos de grietas ', 'Hallazgo2-58-.jpg', 'Se evidenció sellamiento de grietas en pisos ', 'Hallazgo3-58-.jpg', 'No obstante falta realizar más sellamientos en marcos de puertas ', 'Hallazgo4-58-.jpg', 'Se recomienda realizar limpieza profunda y retirar material contaminado por plagas '),
(59, '576896370', 'Condiciones sanitarias ', 52, 'Hallazgo1-59-.jpg', 'Se evidenció áreas limpias ', 'Hallazgo2-59-.jpg', 'Se realiza actividad de inspección en mecanismos de roedores ', 'Hallazgo3-59-.jpg', 'Se evidenció ruta de roedores y láminas con captura de cucarachas y salamanqueja ', 'Hallazgo4-59-.jpg', 'Se aplicara cebo granulado a los mecanismos que están en área de atención '),
(60, '576896370', 'Cebado', 55, '', 'Se instalo cebos en puntos estratégicos ', '', 'se instalo cebo tomcat con registro sanitario : 0091-98 y registro invima : 2016V-0005096', '', 'Se recomienda no toca ni manipular los cebos ', '', 'se recomienda avisar o contactar en caso de alguna novedad '),
(61, '576896370', 'Levantamiento de roedor', 56, '', 'Se evidencio roedor aniquilado ', '', 'Se realizo el levantamiento del mismo', '', 'Se aplico todos los protocolos de limpieza y desinfección ', '', 'Se recomienda seguir con los controles '),
(62, '60361987', 'Pisos y paredes.', 57, 'Hallazgo1-62-.jpg', 'Se recomienda instalar rejilla en sifones ', 'Hallazgo2-62-.jpg', 'Se realizó nebulización en las áreas ', 'Hallazgo3-62-.jpg', 'Se aplicó espolvoreados en sifones partes internas de refrigeradores', 'Hallazgo4-62-.jpg', 'Se recomienda esperar 1 hora para volver a ingresar '),
(63, '901351205', 'Procedimiento ', 58, 'Hallazgo1-63-.jpg', 'Se realizó control de por nebulización en áreas principales ', 'Hallazgo2-63-.jpg', 'Se aplicó gel eco en área de oficinas y maquinaria de bodega', 'Hallazgo3-63-.jpg', 'Se evidenció cucarachas en oficinas se realizó espolvoreo', '', 'Se recomienda esperar 1 hora para ingresar a las áreas tratadas'),
(64, '901351205', 'Procedimiento ', 59, 'Hallazgo1-64-.jpg', 'Se realizó cambio de láminas ', 'Hallazgo2-64-.jpg', 'Se realizó mantenimiento de lámparas atrapa insectos ', 'Hallazgo3-64-.jpg', 'Se evidenció lámparas con apariencia de partículas de polvo ', 'Hallazgo4-64-.jpg', 'Se dejó funcionando y en buen estado las lámparas '),
(65, '60361987', 'Procedimiento ', 60, 'Hallazgo1-65-.jpg', 'Se realizó instalación de mecanismos ', 'Hallazgo2-65-.jpg', 'Se instaló láminas adhesivas para capturas de roedores ', 'Hallazgo3-65-.jpg', 'Se recomienda no manipular los mecanismos ', 'Hallazgo4-65-.jpg', 'Se instaló 4 mecanismos en total '),
(66, '1090518629', 'Condiciones sanitarias ', 61, 'Hallazgo1-66-.jpg', 'Se evidenció áreas con aparente limpieza ', 'Hallazgo2-66-.jpg', 'Se evidenció acumulación de mosquitos y posible polilla en las lámparas ', 'Hallazgo3-66-.jpg', 'Se realizó nebulización en todas las áreas en general ', 'Hallazgo4-66-.jpg', 'Se recomienda esperar una hora para volver a ingresar '),
(68, '576896370', 'Condiciones sanitarias ', 63, 'Hallazgo1-68-.jpg', '', 'Hallazgo2-68-.jpg', '', 'Hallazgo3-68-.jpg', '', 'Hallazgo4-68-.jpg', ''),
(69, '940415662', 'Condiciones sanitarias ', 64, 'Hallazgo1-69-.jpg', 'Se evidenció polilla dentro en marcos de ventanales ', 'Hallazgo2-69-.jpg', 'Se evidenció acumulación de aguas lluvias ', 'Hallazgo3-69-.jpg', 'Se recomienda realizar controles frecuentes e instalar trampas ecológicos de capturas de insectos ', 'Hallazgo4-69-.jpg', 'Se recomienda esperar una hora para volver a ingresar '),
(70, '940415662', 'Condiciones sanitarias ', 65, 'Hallazgo1-70-.jpg', 'Se evidenció presencia de polilla en los marcos de puertas y ventanas ', 'Hallazgo2-70-.jpg', 'Se evidenció presencia de polilla en áreas externas ', 'Hallazgo3-70-.jpg', 'Se evidenció áreas internas aparentemente despejadas y limpieza ', 'Hallazgo4-70-.jpg', 'Se recomienda esperar una hora para volver a ingresar '),
(71, '940415662', 'Condiciones sanitarias ', 66, 'Hallazgo1-71-.jpeg', 'La lámpara se encuentra en buen estado ', 'Hallazgo2-71-.jpg', 'Se realizó mantenimiento ', 'Hallazgo3-71-.jpeg', 'Se evidenció alta infestación de polilla ', 'Hallazgo4-71-.jpg', 'Se retiró lámina usada '),
(72, '901391572', 'Condiciones sanitarias ', 67, '', 'Infestación alta en el área sanitaria ', '', 'Se evidenció huevecillos en estantes ', '', 'Se evidenció insectos aniquilados en los pisos ', '', 'Se recomienda realizar sellamientos en infraestructuras y posteriormente del servicio esperar una hora para volver a ingresar '),
(73, '901351205', 'Mantenimiento lámparas atrapa insectos ', 68, 'Hallazgo1-73-.jpg', 'se evidenció lámina nacional con más de 50 insectos ', 'Hallazgo2-73-.jpg', 'Se evidenció lámina armadhila con 20 insectos ', 'Hallazgo3-73-.jpg', 'Se realizó limpieza de equipos ', 'Hallazgo4-73-.jpg', 'Se realizó cambio de láminas de captura de moscas '),
(74, '576896370', 'Condiciones sanitarias ', 69, 'Hallazgo1-74-.jpg', 'Se evidenció áreas con aparente limpieza ', 'Hallazgo2-74-.jpg', 'Se recomendó limpiar en lugares difíciles de llegar ', 'Hallazgo3-74-.jpg', 'Se realizó revisión de las estaciones cebaderas y se evidenció un roedor capturado ', 'Hallazgo4-74-.jpg', 'Se recomienda esperar 1 hora para volver a ingresar después de la fumigación '),
(75, '1', 'Superficies', 70, '', 'Se evidenció superficies porosas con grietas ', '', 'Se evidenció bisagras de gaveteros de cocinas occidados', '', 'Se evidenció estructura de láminas con partículas de grasa ', '', 'Se evidenció sifones si protección ni rejilla '),
(76, '1', 'Condiciones sanitarias ', 70, 'Hallazgo1-76-.jpeg', 'Las siguientes condiciones facilitan el refugio de plagas ', 'Hallazgo2-76-.jpeg', 'Las estructuras no garantizan barreras para evitar el ingreso de plagas ', '', 'Se recomienda realizar una limpieza profunda de manera que remueva los huevecillos de las plagas ', '', 'Se recomienda realizar un triple enjuague en las superficies después del tratamiento '),
(78, '1090450611', 'Condiciones sanitarias ', 72, 'Hallazgo1-78-.jpg', 'Se realizó nebulización en todas las áreas ', 'Hallazgo2-78-.jpg', 'Se evidenció áreas despejadas ', 'Hallazgo3-78-.jpg', 'Se evidenció cucarachas en las láminas de capturas ', 'Hallazgo4-78-.jpg', 'Se recomienda realizar limpieza antes de volver a iniciar labores'),
(79, '60361987', 'Procedimiento ', 73, 'Hallazgo1-79-.jpg', 'Se evidenció láminas con captura de cucarachas ', 'Hallazgo2-79-.jpg', 'Se programará reposición de láminas ', 'Hallazgo3-79-.jpg', 'Se evidenció cucarachas aniquiladas posterior a nebulización por pasillos ', 'Hallazgo4-79-.jpg', 'Se recomenda realizar limpieza posterior al tratamiento '),
(80, '1090450611', 'Condiciones sanitarias ', 75, 'Hallazgo1-80-.jpg', 'Se evidenció áreas aparentemente despejadas', 'Hallazgo2-80-.jpg', 'Se evidenció limpieza en las áreas ', 'Hallazgo3-80-.jpg', 'Se recomienda lavar con abundante agua al siguiente día ', 'Hallazgo4-80-.jpg', 'Se recomienda esperar al menos una hora para volver a ingresar '),
(81, '576896370', 'Estaciones de control ', 76, 'Hallazgo1-81-.jpg', 'Se evidenció todas las estaciones con cebos roidos', 'Hallazgo2-81-.jpg', 'Tanto en el área de mostrador como almacén ', 'Hallazgo3-81-.jpg', 'Se evidenció roedor capturado en estación junto a escritorio ', 'Hallazgo4-81-.jpg', 'Se realizó cambio de cebos y láminas de capturas '),
(82, '901351205', 'N/A', 77, 'Hallazgo1-82-.jpg', 'N/A', 'Hallazgo2-82-.jpg', 'N/A', '', 'N/A', '', 'N/A'),
(83, '901351205', 'N/A', 78, 'Hallazgo1-83-.jpg', 'N/A', 'Hallazgo2-83-.jpg', 'N/A', '', 'N/A', '', 'N/A'),
(84, '901351205', 'N/A', 79, 'Hallazgo1-84-.jpg', 'N/A', 'Hallazgo2-84-.jpg', 'N/A', 'Hallazgo3-84-.jpg', 'N/A', '', 'N/A'),
(85, '901351205', 'Condiciones sanitarias ', 80, 'Hallazgo1-85-.jpg', 'Se realizó mantenimiento a lámparas atrapa insectos ', 'Hallazgo2-85-.jpg', 'Se evidenció lámina 928 con más de 50 insectos ', 'Hallazgo3-85-.jpg', 'Se evidenció lámina armadhila con más de 20 insectos', 'Hallazgo4-85-.jpg', 'Se realizó retiro y cambio de láminas '),
(86, '901351205', 'Condiciones sanitarias ', 81, 'Hallazgo1-86-.jpg', 'Se realizó inspección de tanques ', 'Hallazgo2-86-.jpg', 'Se evidenció necesidad de limpieza interna y externa ', 'Hallazgo3-86-.jpg', 'Se evidenció nivel de agua y están llenos ', 'Hallazgo4-86-.jpg', 'Se espera dos días posteriores para realizar la limpieza y desinfección '),
(87, '901351205', 'Procedimiento ', 82, 'Hallazgo1-87-.jpg', 'Se realizó remoción de las partículas de suciedad visible ', 'Hallazgo2-87-.jpg', 'Se realizó enjuague de aplicaciones de agentes desinfectantes ', 'Hallazgo3-87-.jpg', 'Se dejó reposar los desinfectantes y se volvió a enjuagar retirando los residuos ', 'Hallazgo4-87-.jpg', 'Se realizó la limpieza y desinfección de 4 tanques de 2000 litros cada uno '),
(88, '60361987', 'Condiciones sanitarias ', 83, 'Hallazgo1-88-.jpg', 'Se realizó aplicación de germicida 5 Gr y se aplicó espolvoreo en maquinaria.', 'Hallazgo2-88-.jpg', 'Se evidenció cucarachas aniquiladas en pasillos y hormigas en área de producción, la infestación de las cucarachas están en las estructuras de las paredes y debajo del lavamanos de protección ', 'Hallazgo3-88-.jpg', 'Se realizó cambio de láminas en los mecanismos de capturas se evidenció captura de cucarachas.', 'Hallazgo4-88-.jpg', 'Se realizó asperjado y nebulización se recomienda esperar  1 hora para volver a ingresar '),
(89, '60361987', 'Condiciones sanitarias ', 83, 'Hallazgo1-89-.jpg', 'Se evidenció estructuras en condiciones que facilitan el acceso y refugio de plagas ', 'Hallazgo2-89-.jpg', 'Se recomienda realizar mantenimiento a lavamanos de las áreas de producción y cocción ', 'Hallazgo3-89-.jpg', 'Se evidenció excremento se salamanqueja', '', 'Se realizó aplicación germicidas en básculas y mesones.'),
(90, '940415662', 'Procedimiento ', 84, 'Hallazgo1-90-.jpg', 'Se realizó aplicación en los salones.', 'Hallazgo2-90-.jpg', 'Se evidenció losa del techo en cocina despegada ', 'Hallazgo3-90-.jpg', 'Se recomienda esperar una hora y media para volver a ingresar ', 'Hallazgo4-90-.jpg', 'N/A'),
(91, '940415662', 'Procedimiento ', 85, 'Hallazgo1-91-.jpg', 'Se realizó aplicación en ventanales en exteriores ', 'Hallazgo2-91-.jpg', 'Se aplicó en zonas verdes donde anidan las plagas', 'Hallazgo3-91-.jpg', 'Se aplicó en árboles con malezas ', 'Hallazgo4-91-.jpg', 'Se aplicó en todas las áreas externas '),
(92, '940415662', 'Condiciones sanitarias ', 86, 'Hallazgo1-92-.jpg', 'Se evidenció cabas de vino en segundo salón y salón principal con madera deteriorada ', 'Hallazgo2-92-.jpg', 'Se evidenció pared que comunica el salón principal con cocina con camino de comejen ', 'Hallazgo3-92-.jpg', 'Se evidenció techo en salón principal con camino de comejen ', 'Hallazgo4-92-.jpg', 'Se realizó cambio de lámina y mantenimiento de lámpara atrapa insectos '),
(93, '901351205', 'Procedimiento ', 87, '', 'Se realizó mantenimiento a los mecanismos atrapa insectos de luz ', '', '', '', '', '', ''),
(94, '901739936', 'Procedimiento ', 88, 'Hallazgo1-94-.jpg', 'Se realizó instalación de mecanismos de capturas de roedores.', 'Hallazgo2-94-.jpg', 'Se realizó nebulización en por todas las áreas.', 'Hallazgo3-94-.jpg', 'Se recomienda no mantener elementos como cartón o comida en la cocina para evitar atraer plagas ', 'Hallazgo4-94-.jpg', 'Se recomienda esperar 1 hora para volver a ingresar.'),
(95, '1090518629', 'Condiciones sanitarias ', 89, 'Hallazgo1-95-.jpg', 'Se evidenció hormiga en marcos de puertas de entrada de escalera segundo piso ', 'Hallazgo2-95-.jpg', 'Se evidenció hormigas en escritorios y pisos de segundo piso ', 'Hallazgo3-95-.jpg', 'Se evidenció cucarachas en área de microondas, se recomienda realizar señalamiento en tubo del lava platos y pared para evitar ingreso de plagas ', 'Hallazgo4-95-.jpg', 'Se recomienda esperar 2 horas para volver a ingresar a las instalaciones '),
(96, '901351205', 'Procedimiento ', 90, 'Hallazgo1-96-.jpeg', 'Se.realizo servicio en las áreas en general se evidenció presencia de moscas en las áreas ', 'Hallazgo2-96-.jpeg', 'Se evidenció presencia de moscas en el depósito final de residuos ', 'Hallazgo3-96-.jpeg', 'Se realizará el día 25 plan de saneamiento en el depósito final de basuras ', 'Hallazgo4-96-.jpg', 'Se recomienda esperar 1 hora para ingresar nuevamente a las áreas tratadas '),
(97, '901351205', 'Procedimiento ', 91, 'Hallazgo1-97-.jpeg', 'Se realizó cambio de lámina de lámpara atrapa moscas en área de mostrador ', 'Hallazgo2-97-.jpeg', 'Se realizó instalación de mecanismos atrapa moscas en disposición final de residuos ', 'Hallazgo3-97-.jpg', 'Se realizó aplicación de deltametrina en polvo en pisos y paredes de área de entrada del personal ', 'Hallazgo4-97-.jpg', 'Se realizará seguimiento cada 3 días para monitorear el avance del control.'),
(98, '1031128578', 'Procedimiento ', 92, 'Hallazgo1-98-.jpg', 'Se evidenció presencia de palomilla en área de almacenamiento de alimentos para mascotas.', 'Hallazgo2-98-.jpg', 'Se evidenció presencia de moscas en área de patio ', 'Hallazgo3-98-.jpg', 'Se realizó nebulización por las áreas, no se evidenció presencia de hormigas ', 'Hallazgo4-98-.jpg', 'Se recomienda esperar por lo menos una hora para volver a ingresar '),
(99, '901351205', 'Procedimiento ', 93, '', 'Se realizó preparación de 2 frascos atomizadores de 500 mil ', '', 'Se aplicó el producto en superficies de equipos ', '', 'Se recomendó aplicar el producto 2 veces al día ', '', 'El producto es natural y no requiere enjuague '),
(100, '60361987', 'Procedimiento ', 94, 'Hallazgo1-100-.jpg', 'Se evidenció mosca aniquiladas en área lavadero de unidades sanitarias ', 'Hallazgo2-100-.jpg', 'Se evidenció áreas con aparente limpieza ', 'Hallazgo3-100-.jpg', 'Se realizó procedimiento por las áreas en general ', 'Hallazgo4-100-.jpg', 'Se recomienda esperar 1 hora para reingresar a las áreas tratadas '),
(101, '1090450611', 'Procedimiento ', 95, 'Hallazgo1-101-.jpg', 'Se realizó inspección de los mecanismos y se evidenció cebos roidos', 'Hallazgo2-101-.jpg', 'Se realizó limpieza de los mecanismos y se instaló láminas de capturas ', 'Hallazgo3-101-.jpg', ' No obstante no sé evidenció presencia de plagas dentro del establecimiento durante la visita ', 'Hallazgo4-101-.jpg', 'Se realizó nebulización en las áreas se recomienda esperar 1 hora para volver a ingresar '),
(102, '901351205', 'Procedimiento ', 96, 'Hallazgo1-102-.jpeg', 'Se evidenció 1 un moscas en áreas de repostería en producción y horneo ', 'Hallazgo2-102-.jpg', 'Se evidenció 1 un mosquito en repostería ', 'Hallazgo3-102-.jpg', 'Se evidenció disminución de población de moscas se recomienda retirar cartones de huevos ', 'Hallazgo4-102-.jpg', 'No hay disminución de moscas en pasillo principal y mostrador '),
(103, '1090450611', 'Estaciones ', 97, 'Hallazgo1-103-.jpg', 'Se realizó retiro de cebos roidos ', 'Hallazgo2-103-.jpg', 'Se instaló láminas de capturas ', 'Hallazgo3-103-.jpg', 'Se realizo limpieza a estaciones ', 'Hallazgo4-103-.jpg', 'Se realizará monitoreo a estaciones '),
(104, '1090450611', 'Estaciones ', 98, 'Hallazgo1-104-.jpeg', 'Se evidencia estaciones con láminas llenas de insectos ', 'Hallazgo2-104-.jpeg', 'Se evidencia nueva plaga gusano se recomienda programar fumigación ', 'Hallazgo3-104-.jpeg', 'Se realizó cambio de láminas ', 'Hallazgo4-104-.jpeg', 'Se realizó limpieza de estaciones '),
(105, '940415662', 'Tratamiento ', 99, 'Hallazgo1-105-.jpg', 'Se evidencia áreas con aparente limpieza ', 'Hallazgo2-105-.jpg', 'Se evidencia salón sin manteles ni mesas ', '', 'Se evidencia áreas despejadas ', '', 'Se recomienda esperar una hora para volver a ingresar ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_mecanismo`
--

CREATE TABLE `reporte_mecanismo` (
  `codigo` int(11) NOT NULL,
  `cod_reporte` int(11) NOT NULL,
  `nombre_mecanismo` varchar(45) DEFAULT NULL,
  `identificacion_cliente` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `observacion` text NOT NULL,
  `estadoalerta` varchar(45) DEFAULT 'DESACTIVADO',
  `estadobateria` varchar(45) DEFAULT 'ALTA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `reporte_mecanismo`
--

INSERT INTO `reporte_mecanismo` (`codigo`, `cod_reporte`, `nombre_mecanismo`, `identificacion_cliente`, `id`, `ubicacion`, `observacion`, `estadoalerta`, `estadobateria`) VALUES
(24, 12, 'Trampa luminosa armadiha - Man', 901351205, 3, 'Despacho ', 'Se realiza limpieza cambio de lámina y recambio de lámina se evidenció más de 100 moscas y mosquitos capturados', 'DESACTIVADO', 'BAJA'),
(80, 23, '77e728e4-Alpha - Manual', 1090450611, 2147483647, 'Área de.recepcion de materia prima ', 'Se instaló junto al portón en orientación derecha ', 'DESACTIVADO', 'ALTA'),
(82, 23, '81f0afce-Alpha - Manual', 1090450611, 81, 'Área de recepcion de materia prima ', 'A 4 metros de distancia del portón orientación derecha ', 'DESACTIVADO', 'ALTA'),
(84, 23, '93de9d45-Alpha - Manual', 1090450611, 93, 'Área de recepcion de materia prima ', 'Se instaló junto al cuarto frío ', 'DESACTIVADO', 'ALTA'),
(86, 23, '951a72b9-Alpha - Manual', 1090450611, 951, 'Área de recepcion de materia prima ', 'Se instaló junto al portón en orientación izquierda ', 'DESACTIVADO', 'ALTA'),
(87, 23, '4663706a-gatopapel - Manual', 1090450611, 463706, 'Área de recepcion de materia prima ', '', 'DESACTIVADO', 'ALTA'),
(88, 24, '81f0afce-Alpha - Manual', 1090450611, 81, 'Área de recepcion de materia prima ', 'Se realizó revisión ', 'DESACTIVADO', 'ALTA'),
(90, 24, '93de9d45-Alpha - Manual', 1090450611, 93, 'Área de recepcion de materia prima ', 'Se realizó revisión del mecanismo ', 'DESACTIVADO', 'ALTA'),
(92, 24, '951a72b9-Alpha - Manual', 1090450611, 951, 'Área de recepcion de materia prima ', 'Se evidenció realizo revisión de mecanismos ', 'DESACTIVADO', 'ALTA'),
(93, 24, '4663706a-gatopapel - Manual', 1090450611, 463706, 'Área de recepcion de materia prima ', 'Se evidencia captura de insectos ', 'DESACTIVADO', 'ALTA'),
(94, 25, 'gato de papel  - Manual', 12345, 5, 'prueba', '', 'DESACTIVADO', 'ALTA'),
(95, 25, 'gato de papel  - Manual', 12345, 6, 'puerta', '', 'DESACTIVADO', 'ALTA'),
(96, 25, 'gato de papel  - Manual', 12345, 7, 'ventana ', '', 'DESACTIVADO', 'ALTA'),
(97, 27, 'null - undefined', 901351205, 475, 'Mecanismo de luz captura insecto ', 'Se evidenció lámina con más de 50 insectos capturados ', 'DESACTIVADO', 'ALTA'),
(98, 28, 'null - undefined', 901351205, 17835, '', '', 'DESACTIVADO', 'ALTA'),
(106, 31, 'N/A - N/A', 1111111111, 50870283, 'N/A', 'N/A', 'DESACTIVADO', 'ALTA'),
(107, 32, 'N/A - N/A', 1004966801, 8, 'N/A', 'N/A', 'DESACTIVADO', 'ALTA'),
(108, 33, 'N/A - N/A', 1004966801, 8, 'N/A', 'N/A', 'DESACTIVADO', 'ALTA'),
(113, 34, 'Monitor cucarachas y hormigas  - undefined', 1004966801, 59, 'Cocina ', 'En mesón que tiene la batidora ', 'DESACTIVADO', 'ALTA'),
(114, 34, 'Monitor cucarachas y hormigas  - undefined', 1004966801, 59, 'Cocina ', 'En paren donde esta la batidora ', 'DESACTIVADO', 'ALTA'),
(115, 34, 'Monitor cucarachas y hormigas  - undefined', 1004966801, 59, 'Cocina ', 'En pared cerca al congelador ', 'DESACTIVADO', 'ALTA'),
(116, 34, 'Monitor cucarachas y hormigas  - undefined', 1004966801, 59, 'Cocina ', 'En mesón frente a refrigeradores', 'DESACTIVADO', 'ALTA'),
(119, 1, 'Lampara armadiha - Manual', 1111111111, 95, 'prueba', 'esto se debe borrar', 'DESACTIVADO', 'ALTA'),
(120, 37, 'null - undefined', 901351205, 9950038, 'N/A', 'N/A', 'DESACTIVADO', 'ALTA'),
(123, 41, 'N/A - N/A', 1091966141, 2147483647, '', '', 'DESACTIVADO', 'ALTA'),
(124, 42, 'N/A - N/A', 1091966141, 50870283, 'N/A', 'Se instalaran mecanismos para capturar de roedores ', 'DESACTIVADO', 'ALTA'),
(125, 43, 'Porta cebo  - Manual', 576896370, 3448, 'En área de almacenamiento ', '3 porta cebos beta  ', 'DESACTIVADO', 'ALTA'),
(135, 45, 'luminosa armadiha - Manual', 901351205, 819, 'Punto de venta ', 'Se relazó mantenimiento ', 'DESACTIVADO', 'ALTA'),
(136, 45, 'Luminosa 928 - Manual', 901351205, 89289, 'Punto de venta ', 'Se realizo mantenimiento y cambio de lamina ', 'DESACTIVADO', 'ALTA'),
(141, 48, 'N/A - N/A', 901391572, 2147483647, 'N/A', 'N/A', 'DESACTIVADO', 'ALTA'),
(142, 51, 'N/A - N/A', 901391572, 2147483647, 'N/A', '', 'DESACTIVADO', 'ALTA'),
(143, 52, 'N/A - N/A', 576896370, 50870283, '', '', 'DESACTIVADO', 'ALTA'),
(144, 53, 'Lamina gato  - Manual', 576896370, 61, '', '', 'DESACTIVADO', 'ALTA'),
(146, 55, 'N/A - N/A', 576896370, 2147483647, '', '', 'DESACTIVADO', 'ALTA'),
(147, 56, 'N/A - N/A', 576896370, 50870283, '', '', 'DESACTIVADO', 'ALTA'),
(148, 57, 'N/A - N/A', 60361987, 1, '', '', 'DESACTIVADO', 'ALTA'),
(149, 58, 'null - undefined', 901351205, 53791, 'N/A', 'N/A', 'DESACTIVADO', 'ALTA'),
(150, 59, 'Lampara armadiha - Manual', 901351205, 95, 'Mostrador ', 'Se evidenció captura de mosca 1 grande 4 pequeñas', 'DESACTIVADO', 'ALTA'),
(151, 59, 'Luminosa 928 - Manual', 901351205, 89289, 'Mostrador ', 'Se realizó cambio de bombilla y funciona bien ', 'DESACTIVADO', 'ALTA'),
(152, 60, 'Estación cebadera todo - Manua', 60361987, 53791, 'Área de cuarto fuera de uso', '', 'DESACTIVADO', 'ALTA'),
(153, 60, 'Estación cebadera todo - Manua', 60361987, 53792, 'Área de.cuarto fuera de.uso ', '', 'DESACTIVADO', 'ALTA'),
(154, 60, 'Estación cebadera todo - Manua', 60361987, 53793, 'Área de alistamiento ', '', 'DESACTIVADO', 'ALTA'),
(155, 60, 'Estación cebadera todo - Manua', 60361987, 53794, 'Pasillo área de.alistamiento ', '', 'DESACTIVADO', 'ALTA'),
(160, 63, 'Beta - Manual', 576896370, 2191, '', 'Se realizó limpieza ', 'DESACTIVADO', 'ALTA'),
(161, 63, 'Beta - Manual', 576896370, 2192, '', 'Se retiró lámina con captura de cucarachas ', 'DESACTIVADO', 'ALTA'),
(162, 63, 'Beta - Manual', 576896370, 2193, '', 'Se realizó limpieza y mantenimiento ', 'DESACTIVADO', 'ALTA'),
(165, 66, 'Lampara armadiha - Manual', 940415662, 95, 'Salón principal ', 'Se realizó cambio de lámina ', 'DESACTIVADO', 'ALTA'),
(166, 67, 'Alpha  - Manual', 901391572, 68, '', '', 'DESACTIVADO', 'ALTA'),
(167, 68, 'Luminosa 928 - Manual', 901351205, 6928, 'Exhibicion', 'Se evidencio partículas de polvo en el lugar donde reposan las lamparas.', 'DESACTIVADO', 'ALTA'),
(168, 68, 'luminosa armadiha - Manual', 901351205, 611, 'Exhibicion', 'Se recomienda limpiar las partículas de polvo visibles.', 'DESACTIVADO', 'ALTA'),
(169, 69, 'Lamina gato  - Manual', 576896370, 5712, 'Archivo ', 'Se evidenció un roedor capturado se realizó cambio de lámina ', 'DESACTIVADO', 'ALTA'),
(174, 73, 'Estación cebadera todo - Manua', 60361987, 53791, '', 'Se evidenció lámina con captura de cucarachas', 'DESACTIVADO', 'ALTA'),
(175, 73, 'Estación cebadera todo - Manua', 60361987, 53792, '', 'Se evidenció lámina con captura de cucarachas ', 'DESACTIVADO', 'ALTA'),
(176, 74, 'Prueba - Electrónica', 12345, 0, '', '', 'DESACTIVADO', 'ALTA'),
(183, 80, 'luminosa armadiha - Manual', 901351205, 819, 'Exhibición ', 'Se evidencio capturas', 'DESACTIVADO', 'ALTA'),
(186, 80, 'Luminosa 928 - Manual', 901351205, 89289, 'Exhibicion', 'Se evidencio capturas.', 'DESACTIVADO', 'ALTA'),
(188, 83, 'Estación cebadera todo - Manua', 60361987, 53791, 'Almacen ', 'Se instaló lámina adhesivo ', 'DESACTIVADO', 'ALTA'),
(189, 83, 'Estación cebadera todo - Manua', 60361987, 53792, 'Área de producción ', 'Se instaló una lámina adhesivo ', 'DESACTIVADO', 'ALTA'),
(190, 83, 'Estación cebadera todo - Manua', 60361987, 53793, 'Área de material fuera de uso ', 'Se instaló lámina adhesivo ', 'DESACTIVADO', 'ALTA'),
(193, 86, 'luminosa armadiha - Manual', 940415662, 819, 'Salón principal ', 'Se realizó cambio de lámina ', 'DESACTIVADO', 'ALTA'),
(194, 87, 'Prueba - Electrónica', 901351205, 0, 'Área de exhibición ', 'Se realizó cambio de láminas ', 'DESACTIVADO', 'ALTA'),
(195, 88, 'Estación cebadera todo - Manua', 901739936, 53794, 'Más  cocodrilo ', 'instalada en área de cocina debajo del mesón', 'DESACTIVADO', 'ALTA'),
(200, 93, 'Prueba - Electrónica', 901351205, 0, '', '', 'DESACTIVADO', 'ALTA'),
(203, 96, 'Prueba - Electrónica', 901351205, 0, '', '', 'DESACTIVADO', 'ALTA'),
(204, 97, 'Prueba - Electrónica', 1090450611, 0, 'Recepción ', 'Se evidencia estaciones con cebo alta mente roidos', 'DESACTIVADO', 'ALTA'),
(205, 98, 'Prueba - Electrónica', 1090450611, 0, 'Recepción ', 'Se evidencia estaciones con captura de insectos ', 'DESACTIVADO', 'ALTA'),
(206, 99, 'Prueba - Electrónica', 940415662, 0, '', '', 'DESACTIVADO', 'ALTA'),
(207, 100, 'Prueba - Electrónica', 940415662, 0, '', '', 'DESACTIVADO', 'ALTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_sustancias`
--

CREATE TABLE `reporte_sustancias` (
  `codigo` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `sustancias` varchar(45) DEFAULT NULL,
  `laboratorio` varchar(45) NOT NULL,
  `nivel_riesgo` varchar(10) NOT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `mediciones` varchar(45) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `registro_sanitario` varchar(45) NOT NULL,
  `cod_reporte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `reporte_sustancias`
--

INSERT INTO `reporte_sustancias` (`codigo`, `usuario`, `sustancias`, `laboratorio`, `nivel_riesgo`, `cantidad`, `mediciones`, `fecha_vencimiento`, `registro_sanitario`, `cod_reporte`) VALUES
(1, '1111111111', '2', 'Quimicos del EJE', 'III', '10', '', '0000-00-00', '', 1),
(2, '901351205', '2', 'Quimicos del EJE', 'III', '5 ', '', '0000-00-00', '', 2),
(3, '60381451', '2', 'Quimicos del EJE', 'III', '5 ', 'ml', '0000-00-00', '', 3),
(4, '901351205', '2', 'Quimicos del EJE', 'III', '20', 'ml x lt', '2024-04-10', '447115194', 28),
(5, '901351205', '2', 'Quimicos del EJE', 'III', '5 ', ' ml x Lt', '2024-04-10', '447115194', 28),
(14, '60381451', '2', 'NULL', 'N/A', '10', ' ml x Lt', '2024-04-20', '5937643', 29),
(18, '1111111111', '5', 'Anasac', 'III', '8', 'ml x lt', '0000-00-00', '0', 31),
(21, '1004966801', '3', 'Sinochem Agro', 'III', '10', ' ml x Lt', '2026-03-09', '20230525', 32),
(22, '1004966801', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 32),
(23, '1004966801', '4', 'Anasac', 'III', '8', ' ml x Lt', '0000-00-00', '0', 33),
(25, '1004966801', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 34),
(26, '576896370', '2', 'Quimicos del EJE', 'III', '5 ', ' ml x Lt', '2024-04-10', '447115194', 35),
(27, '576896370', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 35),
(29, '1111111111', '8', 'Anasac', 'III', '15', 'Ml', '2026-06-10', '3702018', 36),
(30, '1111111111', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 36),
(31, '901351205', '9', 'Anasac', 'IV', '50', 'Ml x Lt', '2026-04-28', '20421', 37),
(32, '0', '8', 'Anasac', 'III', '15', 'Ml x Lt', '2026-06-10', '3702018', 38),
(33, '0', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 38),
(35, '1091966141', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 41),
(36, '1091966141', '8', 'Anasac', 'III', '30 ', 'Ml x Lt', '2026-06-10', '3702018', 42),
(37, '1091966141', '7', 'Rotam', 'III', '50', 'gr', '2025-03-09', '2022031001', 42),
(38, '576896370', '10', 'Anasac', 'III', '15', 'Ml', '2026-05-31', '1982003', 43),
(39, '1091966141', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 44),
(40, '901351205', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 45),
(42, '901351205', '10', 'Anasac', 'III', '15', 'Ml', '2026-05-31', '1982003', 46),
(43, '901351205', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 46),
(44, '1091966141', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 47),
(45, '901391572', '3', 'Sinochem Agro', 'III', '20', ' ml x Lt', '2026-03-09', '20230525', 48),
(46, '1091966141', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 49),
(47, '901391572', '10', 'Anasac', 'III', '15', 'Ml', '2026-05-31', '1982003', 51),
(48, '901391572', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 51),
(49, '576896370', '10', 'Anasac', 'III', '15', 'Ml', '2026-05-31', '1982003', 52),
(50, '576896370', '5', 'Anasac', 'III', '8', 'ml x lt', '0000-00-00', '0', 53),
(51, '576896370', '10', 'Anasac', 'III', '15', 'Ml', '2026-05-31', '1982003', 54),
(52, '576896370', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 55),
(53, '576896370', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 56),
(54, '60361987', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 57),
(55, '60361987', '2', 'Quimicos del EJE', 'III', '10', ' ml x Lt', '2024-04-10', '447115194', 57),
(57, '901351205', '3', 'Sinochem Agro', 'III', '8', ' ml x Lt', '2026-03-09', '20230525', 58),
(58, '901351205', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 59),
(60, '1090518629', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 61),
(62, '576896370', '3', 'Sinochem Agro', 'III', '8', ' ml x Lt', '2026-03-09', '20230525', 63),
(63, '940415662', '2', 'Quimicos del EJE', 'III', '10', ' ml x Lt', '2024-04-10', '447115194', 64),
(64, '940415662', '10', 'Anasac', 'III', '15', 'Ml', '2026-05-31', '1982003', 65),
(65, '940415662', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 66),
(66, '901391572', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 67),
(67, '901351205', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 68),
(68, '576896370', '8', 'Anasac', 'III', '30 ', 'Ml x Lt', '2026-06-10', '3702018', 69),
(71, '1', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 70),
(72, '1', '3', 'Sinochem Agro', 'III', '8', ' ml x Lt', '2026-03-09', '20230525', 70),
(74, '1090450611', '3', 'Sinochem Agro', 'III', '8', ' ml x Lt', '2026-03-09', '20230525', 72),
(75, '60361987', '3', 'Sinochem Agro', 'III', '8', ' ml x Lt', '2026-03-09', '20230525', 73),
(77, '60361987', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 73),
(78, '12345', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 74),
(80, '1090450611', '5', 'Anasac', 'III', '8', 'ml x lt', '0000-00-00', '0', 75),
(81, '576896370', '3', 'Sinochem Agro', 'III', '8', ' ml x Lt', '2026-03-09', '20230525', 76),
(82, '901351205', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 77),
(83, '901351205', '10', 'Anasac', 'III', '15', 'Ml', '2026-05-31', '1982003', 78),
(84, '901351205', '4', 'Anasac', 'III', '4', ' ml x Lt', '0000-00-00', '0', 79),
(85, '901351205', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 80),
(86, '901351205', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 81),
(87, '901351205', '9', 'Anasac', 'IV', '50', 'Ml x Lt', '2026-04-28', '20421', 82),
(88, '60361987', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 83),
(89, '60361987', '4', 'Anasac', 'III', '12', ' ml x Lt', '0000-00-00', '0', 83),
(90, '940415662', '3', 'Sinochem Agro', 'III', '10', ' ml x Lt', '2026-03-09', '20230525', 84),
(91, '940415662', '3', 'Sinochem Agro', 'III', '10', ' ml x Lt', '2026-03-09', '20230525', 85),
(92, '940415662', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 86),
(93, '901351205', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 87),
(94, '901739936', '8', 'Anasac', 'III', '30 ', 'Ml x Lt', '2026-06-10', '3702018', 88),
(95, '1090518629', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 89),
(96, '1090518629', '4', 'Anasac', 'III', '4', ' ml x Lt', '0000-00-00', '0', 89),
(97, '901351205', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 90),
(98, '901351205', '7', 'Rotam', 'III', '25', 'gr', '2025-03-09', '2022031001', 91),
(99, '1031128578', '8', 'Anasac', 'III', '15', 'Ml x Lt', '2026-06-10', '3702018', 92),
(100, '901351205', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 93),
(101, '60361987', '10', 'Anasac', 'III', '15', 'Ml', '2026-05-31', '1982003', 94),
(102, '1090450611', '10', 'Anasac', 'III', '15', 'Ml', '2026-05-31', '1982003', 95),
(103, '901351205', '9', 'Anasac', 'IV', '50', 'Ml x Lt', '2026-04-28', '20421', 96),
(104, '1090450611', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 97),
(105, '1090450611', '1', 'NULL', 'N/A', '0', ' ml x Lt', '2024-04-20', '5937643', 98),
(106, '940415662', '8', 'Anasac', 'III', '30 ', 'Ml x Lt', '2026-06-10', '3702018', 99),
(107, '940415662', '8', 'Anasac', 'III', '30 ', 'Ml x Lt', '2026-06-10', '3702018', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_tratamiento`
--

CREATE TABLE `reporte_tratamiento` (
  `codigo` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `tratamiento` varchar(45) NOT NULL,
  `metodo_control` varchar(30) NOT NULL,
  `tipo_plagas` varchar(100) NOT NULL,
  `cod_reporte` int(11) NOT NULL,
  `nivel_infestacion` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reporte_tratamiento`
--

INSERT INTO `reporte_tratamiento` (`codigo`, `usuario`, `tratamiento`, `metodo_control`, `tipo_plagas`, `cod_reporte`, `nivel_infestacion`) VALUES
(5, '12345', 'Dorinsectacion', 'Aspersion', 'null', 0, 'null'),
(11, '1111111111', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 1, 'Bajo'),
(18, '901351205', 'Dorinsectación ', 'Aspersion', 'Cucarachas y hormigas', 2, 'Bajo'),
(21, '940415662', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 3, 'Bajo'),
(22, '940415662', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 4, 'Medio'),
(23, '940415662', 'Dorinsectación ', 'laminado', 'Gorgojo, polillas y palomillas', 0, 'Alto'),
(24, '940415662', 'Dorinsectación ', 'laminado', 'Gorgojo, polillas y palomillas', 6, 'Alto'),
(25, '576896370', 'Dorinsectación ', 'Aspersion', 'Moscas, mosquitos y zancudos', 7, 'Bajo'),
(26, '940415662', 'Dorinsectación ', 'Nebulizacion', 'Gorgojo, polillas y palomillas', 8, 'Alto'),
(27, '940415662', 'Dorinsectación ', 'Nebulizacion', 'Gorgojo, polillas y palomillas', 9, 'Alto'),
(28, '940415662', 'Dorinsectación ', 'Nebulizacion', 'Cucarachas y hormigas', 9, 'Alto'),
(29, '940415662', 'Dorinsectación ', 'Aspersion', 'Gorgojo, polillas y palomillas', 10, 'Medio'),
(30, '940415662', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 11, 'Bajo'),
(35, '901351205', 'N/A', 'null', 'Moscas, mosquitos y zancudos', 12, 'Medio'),
(36, '901351205', 'Dorinsectación ', 'Aspersion', 'Cucarachas y hormigas', 13, 'Bajo'),
(39, '1004966801', 'N/A', 'null', 'null', 14, 'N/A'),
(40, '901351205', 'N/A', 'null', 'null', 15, 'N/A'),
(42, '60361987', 'Visita técnica ', 'null', 'undefined', 0, 'Medio'),
(45, '60361987', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 18, 'Alto'),
(46, '1111111111', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 19, 'Bajo'),
(47, '60361987', 'Dorinsectación ', 'Nebulizacion', 'Cucarachas y hormigas', 20, 'Medio'),
(48, '940415662', 'Dorinsectación ', 'Nebulizacion', 'Cucarachas y hormigas', 21, 'Medio'),
(49, '1090450611', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 22, 'Bajo'),
(66, '1090450611', 'Roedorizacion ', 'Cebado', 'Roedores doméstico, tejado y noruega', 23, 'N/A'),
(67, '1090450611', 'Roedorizacion ', 'laminado', 'Roedores doméstico, tejado y noruega', 24, 'Bajo'),
(68, '12345', 'Roedorizacion ', 'Cebado', 'Roedores doméstico, tejado y noruega', 25, 'N/A'),
(69, '901351205', 'N/A', 'N/A', 'N/A', 27, 'Medio'),
(70, '901351205', 'Visita técnica ', 'revision de tanques', 'Moho,virus y bacterias ', 28, 'N/A'),
(83, '60381451', 'N/A', 'revision de tanques', 'undefined', 0, 'N/A'),
(87, '1111111111', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 31, 'Medio'),
(89, '1004966801', 'Dorinsectación ', 'Aspersion', 'Cucarachas y hormigas', 32, 'Medio'),
(90, '1004966801', 'Dorinsectación ', 'Nebulizacion', 'Cucarachas y hormigas', 33, 'Medio'),
(92, '1004966801', 'Dorinsectación ', 'laminado', 'Cucarachas y hormigas', 34, 'Medio'),
(93, '576896370', 'Dorinsectación ', 'Aspersion', 'Cucarachas y hormigas', 35, 'Bajo'),
(95, '1111111111', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 36, 'Bajo'),
(96, '901351205', 'Sanetización', 'Limpieza y desinfección', 'Virus,mohos y bacterias', 37, 'Bajo'),
(97, '0', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 38, 'Medio'),
(100, '1091966141', 'N/A', 'null', 'null', 41, 'N/A'),
(101, '1091966141', 'Dorinsectación ', 'Nebulizacion', 'Cucarachas y hormigas', 42, 'Medio'),
(102, '576896370', 'Roedorizacion ', 'laminado', 'Roedores doméstico, tejado y noruega', 43, 'Alto'),
(103, '576896370', 'Dorinsectación ', 'Aspersion', 'Cucarachas y hormigas', 43, 'Bajo'),
(104, '1091966141', 'Roedorizacion ', 'Cebado', 'Roedores doméstico, tejado y noruega', 44, 'Medio'),
(105, '901351205', 'Dorinsectación ', 'laminado', 'Moscas, mosquitos y zancudos', 45, 'Medio'),
(107, '901351205', 'Dorinsectación ', 'Nebulizacion', 'Cucarachas y hormigas', 46, 'Medio'),
(108, '1091966141', 'Roedorizacion ', 'Cebado', 'Roedores doméstico, tejado y noruega', 47, 'Medio'),
(109, '901391572', 'Dorinsectación ', 'Aspersion', 'Cucarachas y hormigas', 48, 'Alto'),
(110, '1091966141', 'Roedorizacion ', 'Cebado', 'Roedores doméstico, tejado y noruega', 49, 'Medio'),
(111, '901391572', 'Dorinsectación ', 'Aspersion', 'Cucarachas y hormigas', 51, 'Alto'),
(112, '576896370', 'Dorinsectación ', 'Aspersion', 'Moscas, mosquitos y zancudos', 52, 'Bajo'),
(113, '576896370', 'Dorinsectación ', 'Aspersion', 'Moscas, mosquitos y zancudos', 53, 'Bajo'),
(114, '576896370', 'Dorinsectación ', 'Aspersion', 'Moscas, mosquitos y zancudos', 54, 'Bajo'),
(115, '576896370', 'Roedorizacion ', 'Cebado', 'Roedores doméstico, tejado y noruega', 55, 'Bajo'),
(116, '576896370', 'Roedorizacion ', 'Cebado', 'Roedores doméstico, tejado y noruega', 56, 'Bajo'),
(117, '60361987', 'Dorinsectación ', 'Nebulizacion', 'Cucarachas y hormigas', 57, 'Medio'),
(119, '901351205', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 58, 'Bajo'),
(120, '901351205', 'Dorinsectación ', 'laminado', 'Moscas, mosquitos y zancudos', 59, 'Bajo'),
(121, '60361987', 'Instalación de mecanismos ', 'null', 'Roedor doméstico,rata noruega, rata de tejado', 60, 'Bajo'),
(122, '1090518629', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 61, 'Bajo'),
(125, '576896370', 'Dorinsectación ', 'Aspersion', 'Cucarachas y hormigas', 63, 'Bajo'),
(126, '576896370', 'Roedorizacion ', 'Cebado', 'Roedores doméstico, tejado y noruega', 63, 'Bajo'),
(127, '940415662', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 64, 'Medio'),
(128, '940415662', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 65, 'Alto'),
(129, '940415662', 'Dorinsectación ', 'laminado', 'Moscas, mosquitos y zancudos', 66, 'Alto'),
(130, '901391572', 'Dorinsectación ', 'Aspersion', 'Cucarachas y hormigas', 67, 'Medio'),
(131, '901351205', 'N/A', 'N/A', 'N/A', 68, 'N/A'),
(132, '576896370', 'Dorinsectación ', 'Aspersion', 'Cucarachas y hormigas', 69, 'Bajo'),
(134, '1', 'Dorinsectación ', 'Aspersion', 'Cucarachas y hormigas', 70, 'Alto'),
(136, '1090450611', 'Dorinsectación ', 'Nebulizacion', 'Cucarachas y hormigas', 72, 'Bajo'),
(137, '60361987', 'Dorinsectación ', 'Nebulizacion', 'Cucarachas y hormigas', 73, 'Medio'),
(138, '12345', 'N/A', 'null', 'null', 74, 'N/A'),
(140, '1090450611', 'Dorinsectación ', 'Nebulizacion', 'Cucarachas y hormigas', 75, 'Bajo'),
(141, '576896370', 'Dorinsectación ', 'Aspersion', 'Moscas, mosquitos y zancudos', 76, 'Bajo'),
(142, '901351205', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 77, 'Bajo'),
(143, '901351205', 'Dorinsectación ', 'Nebulizacion', 'Cucarachas y hormigas', 78, 'Bajo'),
(144, '901351205', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 79, 'Bajo'),
(145, '901351205', 'N/A', 'null', 'null', 80, 'N/A'),
(146, '901351205', 'Visita técnica ', 'revision de tanques', 'Moho,virus y bacterias ', 81, 'Bajo'),
(147, '901351205', 'Sanetización', 'Limpieza y desinfección', 'Virus,mohos y bacterias', 82, 'Bajo'),
(148, '60361987', 'Dorinsectación ', 'Aspersion', 'Cucarachas y hormigas', 83, 'Medio'),
(149, '60361987', 'Dorinsectación ', 'Nebulizacion', 'Cucarachas y hormigas', 83, 'Medio'),
(150, '60361987', 'Roedorizacion ', 'laminado', 'Roedores doméstico, tejado y noruega', 83, 'Bajo'),
(151, '940415662', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 84, 'Medio'),
(152, '940415662', 'Dorinsectación ', 'Aspersion', 'Moscas, mosquitos y zancudos', 85, 'Medio'),
(153, '940415662', 'Visita técnica ', 'Inspección de área', 'Moho,virus y bacterias ', 86, 'N/A'),
(154, '901351205', 'N/A', 'null', 'null', 87, 'N/A'),
(155, '901739936', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 88, 'Bajo'),
(156, '1090518629', 'Dorinsectación ', 'Nebulizacion', 'Cucarachas y hormigas', 89, 'Bajo'),
(157, '901351205', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 90, 'Medio'),
(158, '901351205', 'Dorinsectación ', 'laminado', 'Moscas, mosquitos y zancudos', 91, 'Medio'),
(159, '901351205', 'Dorinsectación ', 'Instalación de mecanismo', 'Moscas, mosquitos y zancudos', 91, 'Medio'),
(160, '1031128578', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 92, 'Bajo'),
(161, '1031128578', 'Dorinsectación ', 'Nebulizacion', 'Gorgojo, polillas y palomillas', 92, 'Bajo'),
(162, '901351205', 'Dorinsectación ', 'Aplicación de larvicida', 'Moscas, mosquitos y zancudos', 93, 'Alto'),
(163, '60361987', 'Dorinsectación ', 'Nebulizacion', 'Cucarachas y hormigas', 94, 'Bajo'),
(164, '1090450611', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 95, 'Bajo'),
(165, '1090450611', 'Roedorizacion ', 'Cebado', 'Roedores doméstico, tejado y noruega', 95, 'Medio'),
(166, '901351205', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 96, 'Bajo'),
(167, '1090450611', 'Roedorizacion ', 'laminado', 'Roedores doméstico, tejado y noruega', 97, 'Medio'),
(168, '1090450611', 'Roedorizacion ', 'laminado', 'Roedores doméstico, tejado y noruega', 98, 'Bajo'),
(169, '940415662', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 99, 'Bajo'),
(170, '940415662', 'Dorinsectación ', 'Nebulizacion', 'Moscas, mosquitos y zancudos', 100, 'Bajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(2, 'usuario'),
(3, 'tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sustancias`
--

CREATE TABLE `sustancias` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `laboratorio` varchar(45) DEFAULT NULL,
  `canti_inventario` int(11) DEFAULT NULL,
  `nivel_riesgo` varchar(10) DEFAULT NULL,
  `fecha_vencimiento` date NOT NULL,
  `registro_sanitario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `sustancias`
--

INSERT INTO `sustancias` (`codigo`, `nombre`, `laboratorio`, `canti_inventario`, `nivel_riesgo`, `fecha_vencimiento`, `registro_sanitario`) VALUES
(1, 'N/A', 'NULL', 0, 'N/A', '2024-04-20', 5937643),
(2, 'Parcero ', 'Quimicos del EJE', 30, 'III', '2024-04-10', 447115194),
(3, 'Rutto', 'Sinochem Agro', 120, 'III', '2026-03-09', 20230525),
(4, 'Alpirix', 'Anasac', 200, 'III', '0000-00-00', 0),
(5, 'Hawker', 'Anasac', 0, 'III', '0000-00-00', 0),
(7, 'Antipest', 'Rotam', 200, 'III', '2025-03-09', 2022031001),
(8, 'Hawker plus ', 'Anasac', 20, 'III', '2026-06-10', 3702018),
(9, 'Dryquat', 'Anasac', 200, 'IV', '2026-04-28', 20421),
(10, 'Atonic', 'Anasac', 50, 'III', '2026-05-31', 1982003);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `codigo` int(11) NOT NULL,
  `sigla` varchar(2) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`codigo`, `sigla`, `nombre`) VALUES
(1, 'CC', 'cédula de ciudadanía'),
(2, 'TI', 'tarjeta de identificación'),
(3, 'TE', 'tramite de registro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_establecimiento`
--

CREATE TABLE `tipo_establecimiento` (
  `codigo` int(11) NOT NULL,
  `NITRUT` varchar(4) DEFAULT NULL,
  `numero` varchar(30) DEFAULT NULL,
  `nombre_empresa` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `identificacion` varchar(60) DEFAULT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `tipo_establecimiento`
--

INSERT INTO `tipo_establecimiento` (`codigo`, `NITRUT`, `numero`, `nombre_empresa`, `direccion`, `identificacion`, `nombre_usuario`, `telefono`, `correo`, `cargo`) VALUES
(1, 'NIT', '60542525', 'icoplas', 'aeropuerto', '60381451', 'elizabeth', 3146684319, 'cristianbargas0205@gmail.com', 'cargador'),
(2, 'FGDS', '325364353', 'CVBFHXFFD', 'Calle 21 #2-39', '3344434545', '', 0, '', ''),
(3, 'NIT', '12345', 'Casa', 'Calle 124#45-89 Jardín', '12345', 'Diego Monoca', 5762931, 'casa@empresa.com', 'Dueño'),
(4, 'NIT', '899000231', 'Arturo Calle', 'Jardín Plaza', '12345', 'Diego Monoca', 123456, '', 'Dueño'),
(5, 'NIT', '123553', 'CVBFHXFFD', 'Calle 2 #2-39 Barrio Porvenir', '60381451', 'elizabeth delgado', 3146684319, 'cristianvargas0205@gmail.com', ''),
(6, 'NIT', '900325368', 'SPEZIA', 'AV 1 E 18 18 CAOBOS', '940415662', 'Paola  ', 3118274576, 'speziafacturas@outlook.com', 'Sede principal '),
(7, 'NIT', '901621809', 'DELL AMORE ', 'AVIAL OCCIDENTAL JARDIN PLAZA LC R 15', '940415662', 'Paola  ', 3204966213, 'DELLAMORE2022@GMAIL.COM', 'Sede jardin plaza'),
(8, 'NIT', '1111111111', 'Decoffe', 'Via antigua bocono', '1111111111', 'Hanni  ', 3213809484, 'hanin.mora@gmail.com', 'Sede principal '),
(9, 'NIT', '901351205', 'Panaderia el manjar del pan SAS', 'AV 10 MZ 0 LOCAL 17 CAMPIÑA', '901351205', 'Ciro Jaimes Medina', 5950606, 'Panaderiaelmanjardelpansas@gmail.com', 'Sede principal '),
(10, 'NIT', '10904760271', 'Casa ', '', '1090476027', 'Diego Landázuri', 0, 'cordinadorjaziz@gmail.com', 'Na'),
(11, 'NIT', '572233877', 'Trinos', 'Cr 4 # 31', '576896370', 'Monica ', 3102233877, 'trinossas@gmail.com', 'Sede'),
(12, 'NIT', '700057432', 'LEONE', 'Av 1 E 18 18 Caobos ', '940415662', 'Paola  ', 5940606, 'Kelvinramirezfacturacion@gmail.com', ''),
(13, 'NIT', '901227075', 'Inversiones Bomgusto', 'Avenida 0 #19-52 barrio Blanco', '1004966801', 'María del Mar Montes Gomez', 3028421026, 'Bonngusto2018@gmail.com', 'Ingeniera Alimentos '),
(14, 'NIT', '901479222', 'Industria alimenticia Goodys', 'Calle 26 # 0-52 San Rafael ', '60361987', 'Durfady González Luna ', 3222024908, 'Contabilidadheladosgoodys@hotmail.com', 'Usuario'),
(15, 'NIT', '901585175', 'Alimentos la Maria S.A.S', 'CL 23 12 76 BRR LA LIBERTAD', '1090450611', 'Stefanny ', 3016114485, 'alimentoslamaria2022@gmail.com', 'Dueño '),
(16, 'NIT', '0', 'casa', 'Brr Govica 9e 39', '0', 'Dirla Baron', 3208043881, 'nnnn@gmail.com', 'Encargada de la vivienda '),
(17, 'NIT', '', 'Parrilla Express', 'Antigua Via Bocono ', '1091966141', 'Carlos Alberto  Rojas', 3134102982, 'angyeurbina03@gmail.com', 'Administración '),
(18, 'NIT', '901391572', 'Naypansas', 'Av 4 # 87 Brr latino ', '901391572', 'Jakeline Bautista', 0, 'jakelinebautista31@gmail.com', 'Sede principal '),
(19, 'NIT', '901306351', 'Renova', 'Cl 17 1E 118 Brr Caobos', '1090518629', 'Jairo  Sanguino', 3002105060, 'directoradministrativo@renovaf.com', 'Principal '),
(20, 'NIT', '', 'Casa', 'CLL 1 # 1-45 chaoineros', '1', 'Lissy Andrea Zambrano Pérez ', 3214267655, '', ''),
(21, 'NIT', '9017399361', 'Centro educativo pensadores creativos ', 'Av 7A # 8-12 prados del este', '901739936', 'Hugo  Montes', 3178306923, 'aelandazuri@gmail.com', 'Sede principal '),
(22, 'NIT', '1029384756', 'Zoolomascotas', 'Av 30 2 16 Urb santa clara', '214748364', 'Mónica Patricia Romero Sánchez', 3212693688, 'Monik.mv@hotmail.com', 'Sede principal'),
(23, 'NIT', '10311285781', 'Zoolotcotas ', 'Av 30 2 16 Urb santa clara', '1031128578', 'Mónica Patricia Romero Sánchez', 0, '', 'Sede principal ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_plagas`
--

CREATE TABLE `tipo_plagas` (
  `codigo` int(11) NOT NULL,
  `tratamiento` varchar(45) NOT NULL,
  `tipo_plaga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_plagas`
--

INSERT INTO `tipo_plagas` (`codigo`, `tratamiento`, `tipo_plaga`) VALUES
(1, 'N/A', 'N/A'),
(2, 'Dorinsectacion', 'Moscas, mosquitos y zancudos'),
(3, 'Dorinsectacion', 'Cucarachas y hormigas'),
(4, 'Dorinsectacion', 'Gorgojo, polillas y palomillas'),
(5, 'Dorinsectacion', 'Chinches'),
(6, 'Dorinsectacion', 'Comejen'),
(7, 'Roedorizacion ', 'Roedores doméstico, tejado y noruega'),
(8, 'Sanetización', 'Virus,mohos y bacterias'),
(13, 'Visita técnica ', 'Moho,virus y bacterias '),
(15, 'Instalación de mecanismos ', 'Roedor doméstico,rata noruega, rata de tejado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `codigo` int(11) NOT NULL,
  `tratamiento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`codigo`, `tratamiento`) VALUES
(1, 'N/A'),
(2, 'Dorinsectación '),
(3, 'Roedorizacion '),
(4, 'Sanetización'),
(6, 'Visita técnica '),
(7, 'Instalación de mecanismos ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(11) NOT NULL,
  `tipo_id` varchar(2) DEFAULT NULL,
  `identificacion` varchar(60) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `telefono` double DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `tipo_id`, `identificacion`, `nombre`, `apellido`, `usuario`, `contrasena`, `telefono`, `correo`, `direccion`, `rol`) VALUES
(1, 'CC', '1093292760', 'santiago', 'vargas', 'admin', 'admin', 3146684319, 'cristianbargas0205@gmail.com', 'aeropuerto', 'administrador'),
(2, 'TI', '60381451', 'elizabeth', 'delgado', '60381451', '60381451', 3219268286, 'isa696@gmail.com', 'aeropuerto', 'usuario'),
(3, 'CC', '1090368245', 'Carlos', 'Díaz', '1090368245', '1090368245', 3017947006, 'crdiaz@sena.edu.co', 'ninguna', 'administrador'),
(4, 'CC', '1090476027', 'Diego', 'Landázuri', '1090476027', '3193036362', 123456789, 'yo1@yo.com', '', 'administrador'),
(5, 'CC', '12345', 'Diego', 'Monoga', '12345', '12345', 123456, 'yo@yo.com', '', 'usuario'),
(6, 'CC', '123456789', 'Carlos', 'Quintero', '123456789', '123456789', 123456789, 'yo1@yo.com', '', 'usuario'),
(7, 'CC', '1093292760', 'cristian', 'delgado', '1093292760', '1093292760', 3146684319, 'cristiansantiagovargasdelgado@gmail.com', 'cll 21 ·2-39 ', 'tecnico'),
(8, 'CC', '1091670700', 'Carlos', 'Mario', '1091670700', '1091670700', 0, 'cmcp93@gmail.com', 'tecnoparque', 'administrador'),
(9, 'CC', '940415662', 'Paola ', '', 'HYMSAS', '900325368', 0, 'speziafacturas@outlook.com', 'AV 1 E 18 18 CAOBOS', 'usuario'),
(10, 'CC', '1111111111', 'Hanni ', '', 'Decoffe', 'Decoffe123', 3213809484, 'hanin.mora@gmail.com', 'Via antigua bovono ', 'usuario'),
(11, 'CC', '901351205', 'Ciro', 'Jaimes Medina', 'Panaderiaelmanjar', '901351205', 313, 'Panaderiaelmanjardelpansas@gmail.com', 'AV 10 MZ 0 LOCAL 17 CAMPIÑA', 'usuario'),
(12, 'CC', '576896370', 'Monica', '', 'Trinossas', 'Trinossas4', 3106896370, 'trinossas@gmail.com', 'Cr 4 # 31', 'usuario'),
(13, 'CC', '60394525', 'johana', 'rojas', '60394525', '60394525', 3209746340, 'clasdel@oultok.com', 'Calle 2 #2-39 Barrio Porvenir', 'usuario'),
(18, 'CC', '1004966801', 'María del Mar', 'Montes Gomez', '1234', '1234', 3003884868, 'Mariadelmarmmontes@gmail.com', 'Avenida 0 #19-52 barrio Blanco', 'usuario'),
(19, 'CC', '60361987', 'Durfady', 'González Luna ', 'Heladeria', 'sanrafael26', 3208077839, 'Dulfay.logisticagoodys@hotmail.com', 'Calle 26 # 0-52 San Rafael ', 'usuario'),
(20, 'CC', '1090450611', 'Stefanny', '', 'INGcaryeli', 'caryeli0611', 3188158157, ' caryeli1331@gmail.com', 'calle 5n #12b -135 apto 207 reservas del Sama', 'usuario'),
(25, 'CC', '0', 'Dirla', 'Baron', '0000000000', '0000000000', 3208043881, 'nnnn@gmail.com', 'Brr Govica 9e 39', 'usuario'),
(26, 'CC', '0', 'Andrea ', 'Parra', 'Andrea', '', 316, 'cordinador@jaizzbiologico.com', 'Sabana patios ', 'administrador'),
(27, 'CC', '1091966141', 'Carlos Alberto ', 'Rojas', 'Parrilla Express', '123', 3134102082, 'angyeurbina03@gmail.com', 'Antigua Via Bocono ', 'usuario'),
(30, 'CC', '901391572', 'Jakeline', 'Bautista', 'Neypan', 'neypan123', 300242340, 'jakelinebautista31@gmail.com', 'Av 4 tanques ', 'usuario'),
(31, 'CC', '1090518629', 'Jairo ', 'Sanguino', '1090518629', 'Renova1090518629', 3006883673, 'directoradministrativo@renovaf.com', 'Cl 17 1E 118 Brr Caobos', 'usuario'),
(32, 'CC', '1', 'Lissy Andrea', 'Zambrano Pérez ', 'LissyPérez', 'ZambranoPrerez3214267655', 3214267655, '', 'CLL 1 # 1-45 chaoineros', 'usuario'),
(33, 'CC', '901739936', 'Hugo ', 'Montes', 'Hugomontes', 'Hugomontes123', 3178306923, '', 'prados del este', 'usuario'),
(34, 'CC', '1031128578', 'Mónica Patricia', 'Romero Sánchez', 'Zoolotcotas', 'zoolot123', 3212693688, 'Monik.mv@hotmail.com', 'Av 30 2 16 Urb santa clara ', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cantidad`
--
ALTER TABLE `cantidad`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `documentos_usuarios`
--
ALTER TABLE `documentos_usuarios`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `hallazgos`
--
ALTER TABLE `hallazgos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `inve_mecanismo`
--
ALTER TABLE `inve_mecanismo`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `id_inve` (`id_inve`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `mecanismo`
--
ALTER TABLE `mecanismo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `mecanismo_alerta`
--
ALTER TABLE `mecanismo_alerta`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `metodo_tratamiento`
--
ALTER TABLE `metodo_tratamiento`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `nivel_infestacion`
--
ALTER TABLE `nivel_infestacion`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `nombre_mecanismo`
--
ALTER TABLE `nombre_mecanismo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `reporte_hallazgo`
--
ALTER TABLE `reporte_hallazgo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `reporte_mecanismo`
--
ALTER TABLE `reporte_mecanismo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `reporte_sustancias`
--
ALTER TABLE `reporte_sustancias`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `reporte_tratamiento`
--
ALTER TABLE `reporte_tratamiento`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sustancias`
--
ALTER TABLE `sustancias`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `tipo_establecimiento`
--
ALTER TABLE `tipo_establecimiento`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `tipo_plagas`
--
ALTER TABLE `tipo_plagas`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cantidad`
--
ALTER TABLE `cantidad`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `documentos_usuarios`
--
ALTER TABLE `documentos_usuarios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `hallazgos`
--
ALTER TABLE `hallazgos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inve_mecanismo`
--
ALTER TABLE `inve_mecanismo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mecanismo`
--
ALTER TABLE `mecanismo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `mecanismo_alerta`
--
ALTER TABLE `mecanismo_alerta`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodo_tratamiento`
--
ALTER TABLE `metodo_tratamiento`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `nivel_infestacion`
--
ALTER TABLE `nivel_infestacion`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `nombre_mecanismo`
--
ALTER TABLE `nombre_mecanismo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `reporte_hallazgo`
--
ALTER TABLE `reporte_hallazgo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `reporte_mecanismo`
--
ALTER TABLE `reporte_mecanismo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT de la tabla `reporte_sustancias`
--
ALTER TABLE `reporte_sustancias`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `reporte_tratamiento`
--
ALTER TABLE `reporte_tratamiento`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sustancias`
--
ALTER TABLE `sustancias`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_establecimiento`
--
ALTER TABLE `tipo_establecimiento`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tipo_plagas`
--
ALTER TABLE `tipo_plagas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
