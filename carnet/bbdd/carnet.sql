-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2024 a las 01:14:23
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carnet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `tabla` varchar(45) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_solicitud`
--

CREATE TABLE `datos_solicitud` (
  `id` int(11) NOT NULL,
  `observaciones` varchar(45) NOT NULL,
  `estado_pago` varchar(45) NOT NULL,
  `cod_estudiante` int(11) NOT NULL,
  `correo_institucional` varchar(100) NOT NULL,
  `año_grado` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `numero_recibido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_solicitud`
--

INSERT INTO `datos_solicitud` (`id`, `observaciones`, `estado_pago`, `cod_estudiante`, `correo_institucional`, `año_grado`, `cantidad`, `numero_recibido`) VALUES
(1, 'hola', 'pendiente', 0, '', '0000-00-00', 0, 0),
(2, '', '', 0, '', '2024-01-26', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_registro` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `cod_facultad` int(11) NOT NULL,
  `nombre_de_facultad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`cod_facultad`, `nombre_de_facultad`) VALUES
(0, 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id_programa` int(11) NOT NULL,
  `nombre_del_programa` varchar(45) NOT NULL,
  `cod_facultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_del_rol` varchar(45) NOT NULL,
  `permiso` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_del_rol`, `permiso`) VALUES
(1, 'administrador', ''),
(2, 'sistema', ''),
(3, 'admisiones', ''),
(4, 'jefe_sistema', ''),
(5, 'jefe_admisiones', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `fecha_de_solicitud` date NOT NULL,
  `estado` varchar(45) NOT NULL,
  `nombres` varchar(75) NOT NULL,
  `tipo_usuario` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `realizado_por` varchar(45) NOT NULL,
  `fecha_realizado` date NOT NULL,
  `recibido_por_admisiones` varchar(45) NOT NULL,
  `fecha_de_admisiones` date NOT NULL,
  `entregado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_solicitud`, `fecha_de_solicitud`, `estado`, `nombres`, `tipo_usuario`, `cargo`, `id_usuario`, `id_programa`, `tipo`, `realizado_por`, `fecha_realizado`, `recibido_por_admisiones`, `fecha_de_admisiones`, `entregado`) VALUES
(1, '2023-11-12', 'Pendiente', 'Jhaira Natasha Delgado Romero', 'Estudiante', '', 574514, 0, '', '', '0000-00-00', '', '0000-00-00', ''),
(2, '2023-11-13', 'Pendiente', 'Jhaira Natasha Delgado Romero', 'Estudiante', '', 574514, 1503, '', '', '0000-00-00', '', '0000-00-00', ''),
(3, '2023-11-14', 'Pendiente', 'YULL YAIR RAMIREZ GALVIS', 'Administrativo', '', 1090435511, 0, '', '', '0000-00-00', '', '0000-00-00', ''),
(4, '2023-11-14', 'Pendiente', 'YULL YAIR RAMIREZ GALVIS', 'Administrativo', 'PROFESIONAL ADMINISTRATIVO', 1090435511, 0, '', '', '0000-00-00', '', '0000-00-00', ''),
(5, '2023-12-20', 'Pendiente', 'JOSE SAUL LOZANO LEON', 'Administrativo', 'AUXILIAR ADMINISTRATIVO', 13277910, 0, '', '', '0000-00-00', '', '0000-00-00', ''),
(6, '2023-12-20', 'Pendiente', 'JOSE SAUL LOZANO LEON', 'Administrativo', 'AUXILIAR ADMINISTRATIVO', 13277910, 0, '', '', '0000-00-00', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombres_apellidos` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_usuario`, `nombres_apellidos`, `usuario`, `contrasena`, `id_rol`) VALUES
(1, 1093292760, 'cristian vargas', 'admin', 'admin', 1),
(2, 88230934, 'camila', 'sistema', 'sistema', 2),
(3, 55245042, 'jorge', 'admisiones', 'admisiones', 3),
(4, 0, 'yull ', 'jefesistema', 'jefesistema', 4),
(5, 2, 'jose', 'jefeadmisiones', 'jefeadmisiones', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_solicitud`
--
ALTER TABLE `datos_solicitud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`cod_facultad`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_solicitud`
--
ALTER TABLE `datos_solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
