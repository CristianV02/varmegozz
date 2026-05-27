-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 31-01-2024 a las 14:24:27
-- Versión del servidor: 8.0.36
-- Versión de PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cesartecnoparque_plagas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidad`
--

CREATE TABLE `cantidad` (
  `codigo` int NOT NULL,
  `cod_sustancias` int DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `cantidad`
--

INSERT INTO `cantidad` (`codigo`, `cod_sustancias`, `valor`) VALUES
(1, 0, '4-5 ml/lt'),
(2, 2, '8-10 ml/lt'),
(3, 4, '1-5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidad_mecanismo_cliente`
--

CREATE TABLE `cantidad_mecanismo_cliente` (
  `codigo` int NOT NULL,
  `cod_mecanismo` int DEFAULT NULL,
  `identificacion_cliente` int DEFAULT NULL,
  `id` int DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `estadoalerta` varchar(45) DEFAULT NULL,
  `estadobateria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `cantidad_mecanismo_cliente`
--

INSERT INTO `cantidad_mecanismo_cliente` (`codigo`, `cod_mecanismo`, `identificacion_cliente`, `id`, `ubicacion`, `estadoalerta`, `estadobateria`) VALUES
(1, 1, 1090476027, 0, 'P.v la mejor', 'DESACTIVADO', 'ALTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `codigo` int NOT NULL,
  `NITRUT` varchar(4) DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `nombre_empresa` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `identificacion` varchar(45) DEFAULT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`codigo`, `NITRUT`, `numero`, `nombre_empresa`, `direccion`, `identificacion`, `nombre_usuario`, `telefono`, `correo`, `cargo`) VALUES
(1, 'NIT', 60542525, 'icoplas', 'aeropuerto', '60381451', 'elizabeth', 3146684319, 'cristianbargas0205@gmail.com', 'cargador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hallazgos`
--

CREATE TABLE `hallazgos` (
  `codigo` int NOT NULL,
  `donde_se_encuentra` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `mejora` varchar(45) DEFAULT NULL,
  `fotos` varchar(45) DEFAULT NULL,
  `identificaciones_cliente` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `hallazgos`
--

INSERT INTO `hallazgos` (`codigo`, `donde_se_encuentra`, `descripcion`, `mejora`, `fotos`, `identificaciones_cliente`) VALUES
(1, 'sala', 'captura de roedor', 'no dejar comidad en cualquier parte para que ', NULL, 60381451),
(2, 'comedor', 'captura de sustancia', 'hacer mas limpieza en casa', NULL, 13445353);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inve_mecanismo`
--

CREATE TABLE `inve_mecanismo` (
  `codigo` int NOT NULL,
  `cod_mecanismo` int DEFAULT NULL,
  `id_inve` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `inve_mecanismo`
--

INSERT INTO `inve_mecanismo` (`codigo`, `cod_mecanismo`, `id_inve`) VALUES
(1, 1, 4),
(5, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanismo`
--

CREATE TABLE `mecanismo` (
  `codigo` int NOT NULL,
  `nombre` varchar(45) DEFAULT 's',
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `mecanismo`
--

INSERT INTO `mecanismo` (`codigo`, `nombre`, `tipo`) VALUES
(1, 'trampa cocodrilo', 'automatizador'),
(4, 'dd', 'uj'),
(5, 'ggd', 'dfddv'),
(6, 'hola mundo', 'hola mundo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanismo_alerta`
--

CREATE TABLE `mecanismo_alerta` (
  `codigo` int NOT NULL,
  `id` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `identificacion_cliente` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `mecanismo_alerta`
--

INSERT INTO `mecanismo_alerta` (`codigo`, `id`, `fecha`, `hora`, `identificacion_cliente`) VALUES
(1, 4, '2023-06-22', '11:19:40', 1093292760),
(2, 3, '2023-06-13', '23:19:40', 60381451),
(3, 3, '2022-04-05', '04:40:50', 232522);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_infestacion`
--

CREATE TABLE `nivel_infestacion` (
  `codigo` int NOT NULL,
  `nivel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `nivel_infestacion`
--

INSERT INTO `nivel_infestacion` (`codigo`, `nivel`) VALUES
(0, 'lll'),
(1, 'llll'),
(2, 'l');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `codigo` int NOT NULL,
  `tipo_doc` varchar(4) DEFAULT NULL,
  `usuario` int DEFAULT NULL,
  `nombre_apellido` varchar(45) DEFAULT NULL,
  `fecha_de_inicio` date DEFAULT NULL,
  `hora_de_inicio` time DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `cantidad_mecanismo` int DEFAULT NULL,
  `cantidad_de_sustancia` int DEFAULT NULL,
  `cantidad_de_hallazgo` int DEFAULT NULL,
  `cantidad_de_mejoras` int DEFAULT NULL,
  `nivel_de_infestacion` varchar(45) DEFAULT NULL,
  `ver_pdf` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`codigo`, `tipo_doc`, `usuario`, `nombre_apellido`, `fecha_de_inicio`, `hora_de_inicio`, `fecha_fin`, `hora_fin`, `cantidad_mecanismo`, `cantidad_de_sustancia`, `cantidad_de_hallazgo`, `cantidad_de_mejoras`, `nivel_de_infestacion`, `ver_pdf`) VALUES
(1, 'CC', 60394525, 'icoplas', '2023-06-27', '12:00:01', '2023-06-29', '20:00:01', 4, 3, 4, 4, 'lll', NULL),
(2, 'TI', 60381451, 'isa', '2023-06-21', '22:04:00', '2023-06-28', '01:03:00', 1, 4, 1, 3, 'l', 'undefined'),
(3, 'CC', 1093292760, 'hola', '2023-07-15', '00:00:00', '2023-07-15', '16:00:00', 4, 3, 4, 0, 'llll', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_hallazgo`
--

CREATE TABLE `reporte_hallazgo` (
  `codigo` int NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `hallazgo` varchar(45) NOT NULL,
  `cod_reporte` int NOT NULL,
  `foto1` varchar(45) NOT NULL,
  `foto2` varchar(45) NOT NULL,
  `observaciones` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reporte_hallazgo`
--

INSERT INTO `reporte_hallazgo` (`codigo`, `usuario`, `hallazgo`, `cod_reporte`, `foto1`, `foto2`, `observaciones`) VALUES
(1, '1', '1', 1, '0', '0', 'hola'),
(2, '60381451', 'comida en el piso', 3, 'undefined', 'undefined', 'no dejar comida '),
(3, '1093292760', 'hol', 3, 'Hallazgo1-3-.png', 'Hallazgo2-3-.png', 'inwomsodmm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_mecanismo`
--

CREATE TABLE `reporte_mecanismo` (
  `codigo` int NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `mecanismo` varchar(45) NOT NULL,
  `cod_reporte` int NOT NULL,
  `id_mecanismo` int NOT NULL,
  `estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reporte_mecanismo`
--

INSERT INTO `reporte_mecanismo` (`codigo`, `usuario`, `mecanismo`, `cod_reporte`, `id_mecanismo`, `estado`) VALUES
(1, '1', '1', 1, 0, 0),
(2, '109385837', 'dd', 3, 3, 0),
(3, '1093292760', 'trampa cocodrilo', 3, 44, 0),
(4, '', 'trampa cocodrilo', 3, 44, 0),
(5, '', '', 0, 0, 0),
(6, '', '', 3, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_sustancias`
--

CREATE TABLE `reporte_sustancias` (
  `codigo` int NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `sustancias` varchar(45) DEFAULT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `cod_reporte` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `reporte_sustancias`
--

INSERT INTO `reporte_sustancias` (`codigo`, `usuario`, `sustancias`, `cantidad`, `cod_reporte`) VALUES
(1, '1', '1', '2', 0),
(2, '2', 'hola', '2', 0),
(3, '3', '4', '4', 0),
(4, '4', '3', '4', 0),
(5, '5', '5', '5', 0),
(9, '1093292760', 'ferror', '1-5', 3),
(10, '60381451', 'cipermetrina', '8-10 ml/lt', 3),
(11, '1093292760', 'cipermetrina', '4-5 ml/lt', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_tratamiento`
--

CREATE TABLE `reporte_tratamiento` (
  `codigo` int NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `tratamiento` varchar(45) NOT NULL,
  `tipo_plagas` varchar(45) NOT NULL,
  `cod_reporte` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reporte_tratamiento`
--

INSERT INTO `reporte_tratamiento` (`codigo`, `usuario`, `tratamiento`, `tipo_plagas`, `cod_reporte`) VALUES
(1, '1093292760', 'fest', 'cucarachas', 1),
(2, '1093292760', 'ras', 'mosco', 3),
(3, '1093292760', 'fest', 'mosco', 3),
(4, '', '', '', 3),
(5, '1093292760', '', '', 1),
(6, '', '', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int NOT NULL,
  `rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sustancias`
--

CREATE TABLE `sustancias` (
  `codigo` int NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `laboratorio` varchar(45) DEFAULT NULL,
  `canti_inventario` int DEFAULT NULL,
  `nivel_riesgo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `sustancias`
--

INSERT INTO `sustancias` (`codigo`, `nombre`, `laboratorio`, `canti_inventario`, `nivel_riesgo`) VALUES
(1, 'cipermetrina', 'Anasac', 2, 'll'),
(2, 'ferror', 'yuy', 3, 'l');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `codigo` int NOT NULL,
  `sigla` varchar(2) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`codigo`, `sigla`, `nombre`) VALUES
(1, 'CC', 'cedula de ciudadania'),
(2, 'TI', 'tarjeta de identiicaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_plagas`
--

CREATE TABLE `tipo_plagas` (
  `codigo` int NOT NULL,
  `tratamiento` varchar(45) NOT NULL,
  `tipo_plaga` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_plagas`
--

INSERT INTO `tipo_plagas` (`codigo`, `tratamiento`, `tipo_plaga`) VALUES
(1, 'fest', 'mosco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `codigo` int NOT NULL,
  `tratamiento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`codigo`, `tratamiento`) VALUES
(1, 'fest'),
(2, 'ras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int NOT NULL,
  `tipo_id` varchar(2) DEFAULT NULL,
  `identificacion` int DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `tipo_id`, `identificacion`, `nombre`, `apellido`, `usuario`, `contrasena`, `telefono`, `correo`, `direccion`, `rol`) VALUES
(1, 'CC', 1093292760, 'santiago', 'vargas', '1093292760', '1093292760', 3146684319, 'cristianbargas0205@gmail.com', 'aeropuerto', 'administrador'),
(2, 'TI', 60381451, 'elizabeth', 'delgado', '60381451', '60381451', 3219268286, 'isa696@gmail.com', 'aeropuerto', 'null'),
(3, 'CC', 1093907566, 'Jaider Adrian', 'Pérez Vega', '1093907566', '1093907566', 3208369106, 'peresjaider473@gmail.com', '1', '1'),
(4, 'CC', 1090476027, 'Diego', 'Landázuri', '1090476027', '1090476027', 3502762794, 'cordinadorjaziz@gmail.com', '', '1'),
(5, 'CC', 1090368245, 'Carlos', 'Díaz', '1090368245', '1090368245', 0, '', '', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cantidad`
--
ALTER TABLE `cantidad`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cantidad_mecanismo_cliente`
--
ALTER TABLE `cantidad_mecanismo_cliente`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
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
-- Indices de la tabla `nivel_infestacion`
--
ALTER TABLE `nivel_infestacion`
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
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cantidad`
--
ALTER TABLE `cantidad`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cantidad_mecanismo_cliente`
--
ALTER TABLE `cantidad_mecanismo_cliente`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `hallazgos`
--
ALTER TABLE `hallazgos`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inve_mecanismo`
--
ALTER TABLE `inve_mecanismo`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mecanismo`
--
ALTER TABLE `mecanismo`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `mecanismo_alerta`
--
ALTER TABLE `mecanismo_alerta`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reporte_hallazgo`
--
ALTER TABLE `reporte_hallazgo`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reporte_mecanismo`
--
ALTER TABLE `reporte_mecanismo`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `reporte_sustancias`
--
ALTER TABLE `reporte_sustancias`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reporte_tratamiento`
--
ALTER TABLE `reporte_tratamiento`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sustancias`
--
ALTER TABLE `sustancias`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_plagas`
--
ALTER TABLE `tipo_plagas`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
