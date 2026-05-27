-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2024 a las 05:13:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mantenimiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_tecnica`
--

CREATE TABLE `ficha_tecnica` (
  `codigo` int(11) NOT NULL,
  `nombre_propietario` varchar(45) NOT NULL,
  `identificacion` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `datos_compu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ficha_tecnica`
--

INSERT INTO `ficha_tecnica` (`codigo`, `nombre_propietario`, `identificacion`, `telefono`, `datos_compu`) VALUES
(1, 'cristian', '1093292760', '3146684319', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `codigo` int(11) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `referencia` varchar(200) NOT NULL,
  `disco_duro` varchar(200) NOT NULL,
  `memoria_ram` varchar(200) NOT NULL,
  `tarjeta_de_video` varchar(200) NOT NULL,
  `monitor` varchar(200) NOT NULL,
  `nombre_board` varchar(200) NOT NULL,
  `puertos_audio_voz` varchar(200) NOT NULL,
  `chip_set_motherboard` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `microprocesador` varchar(200) NOT NULL,
  `capacidad` varchar(200) NOT NULL,
  `tipo_capacidad` varchar(200) NOT NULL,
  `unid_cd_dvd` varchar(200) NOT NULL,
  `teclado` varchar(200) NOT NULL,
  `puerto_usb` varchar(200) NOT NULL,
  `ranuras_para_memorias_ram` varchar(200) NOT NULL,
  `tipo_de_bios` varchar(200) NOT NULL,
  `lector_de_tarjeta` varchar(200) NOT NULL,
  `ranura_pci` varchar(200) NOT NULL,
  `aceleradora` varchar(200) NOT NULL,
  `placa_de_red` varchar(200) NOT NULL,
  `version_de_bios` varchar(200) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `realizo` varchar(200) NOT NULL,
  `recibio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informe`
--

INSERT INTO `informe` (`codigo`, `marca`, `referencia`, `disco_duro`, `memoria_ram`, `tarjeta_de_video`, `monitor`, `nombre_board`, `puertos_audio_voz`, `chip_set_motherboard`, `modelo`, `microprocesador`, `capacidad`, `tipo_capacidad`, `unid_cd_dvd`, `teclado`, `puerto_usb`, `ranuras_para_memorias_ram`, `tipo_de_bios`, `lector_de_tarjeta`, `ranura_pci`, `aceleradora`, `placa_de_red`, `version_de_bios`, `observaciones`, `realizo`, `recibio`) VALUES
(1, 'Lenovo', '1233556', 'SDD', '12 GB', 'SI', 'SI', 'ASUS', 'SI', 'CPU, GPU, RAM', '12TH GEN', 'INTEL CORE I5', '500', 'GB', 'SI', 'SI', 'SI', '4', 'ROM', 'SI', 'SI', 'SI', 'SI', 'N22ET33W', 'NINGUNA', 'Cristian', 'Pedro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `codigo` int(11) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`codigo`, `rol`) VALUES
(1, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `codigo` int(11) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`codigo`, `sigla`, `nombre`) VALUES
(1, 'CC', 'Cedula de ciudadania');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigo` int(11) NOT NULL,
  `tipo_id` varchar(2) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo`, `tipo_id`, `identificacion`, `nombres`, `apellidos`, `usuario`, `contrasena`, `telefono`, `rol`) VALUES
(1, 'CC', 1093292760, 'Cristian', 'Vargas', 'admin', 'admin', '', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
