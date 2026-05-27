-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2025 a las 22:25:47
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
-- Base de datos: `proyecto_cami`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `cedelaUsuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `idtipocita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctora`
--

CREATE TABLE `doctora` (
  `iddoctora` int(11) NOT NULL,
  `idagenda` int(11) NOT NULL,
  `tipodiagnostico` varchar(45) NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `diagnostico` text NOT NULL,
  `evidencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermera`
--

CREATE TABLE `enfermera` (
  `idenfermera` int(11) NOT NULL,
  `idagenda` int(11) NOT NULL,
  `hipertencion` varchar(50) NOT NULL,
  `diabetes` varchar(50) NOT NULL,
  `peso` int(3) NOT NULL,
  `altura` int(3) NOT NULL,
  `IMC` int(11) NOT NULL,
  `tipoIMC` varchar(45) NOT NULL,
  `evidencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiseterapeutica`
--

CREATE TABLE `fiseterapeutica` (
  `idfiseterapeutica` int(11) NOT NULL,
  `idagenda` int(11) NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `avances` varchar(100) NOT NULL,
  `evidencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `psicologa`
--

CREATE TABLE `psicologa` (
  `idpsicologa` int(11) NOT NULL,
  `idagenda` int(11) NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `diagnostico` text NOT NULL,
  `tiporiesgo` varchar(50) NOT NULL,
  `tiporemision` varchar(50) NOT NULL,
  `evidencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodecita`
--

CREATE TABLE `tipodecita` (
  `idtipocita` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `cedulatrabaj` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `edad` int(3) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `CN` varchar(45) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `Eps` varchar(45) NOT NULL,
  `Arl` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedulaUsuario` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `telefono` int(11) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctora`
--
ALTER TABLE `doctora`
  ADD PRIMARY KEY (`iddoctora`);

--
-- Indices de la tabla `enfermera`
--
ALTER TABLE `enfermera`
  ADD PRIMARY KEY (`idenfermera`);

--
-- Indices de la tabla `fiseterapeutica`
--
ALTER TABLE `fiseterapeutica`
  ADD PRIMARY KEY (`idfiseterapeutica`);

--
-- Indices de la tabla `psicologa`
--
ALTER TABLE `psicologa`
  ADD PRIMARY KEY (`idpsicologa`);

--
-- Indices de la tabla `tipodecita`
--
ALTER TABLE `tipodecita`
  ADD PRIMARY KEY (`idtipocita`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`cedulatrabaj`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedulaUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipodecita`
--
ALTER TABLE `tipodecita`
  MODIFY `idtipocita` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
