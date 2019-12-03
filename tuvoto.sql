-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2019 a las 22:07:23
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tuvoto`
--
CREATE DATABASE IF NOT EXISTS `tuvoto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tuvoto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

CREATE TABLE `candidatos` (
  `IdCandidato` int(11) NOT NULL,
  `IdPartido` int(11) NOT NULL,
  `IdNivel` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Cedula` varchar(13) NOT NULL,
  `Active` bit(1) DEFAULT b'1',
  `Foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `candidatos`
--

INSERT INTO `candidatos` (`IdCandidato`, `IdPartido`, `IdNivel`, `Nombres`, `Apellidos`, `Cedula`, `Active`, `Foto`) VALUES
(1, 2, 2, 'FREDDY', 'SOTO FERMIN', '402-0041396-7', b'1', NULL),
(2, 2, 2, 'MARIA', 'FERMIN BETANCOURT', '001-0123141-3', b'1', NULL),
(3, 2, 3, 'BETEL', 'DE LA CRUZ DE LA CRUZ', '402-3800818-5', b'1', NULL),
(4, 2, 4, 'ROBERT', 'SOTO FERMIN', '402-1325841-7', b'1', NULL),
(5, 3, 5, 'MARIA', 'SOTO FERMIN', '402-2251856-1', b'1', NULL),
(6, 2, 4, 'MARELVIS', 'SOTO ORTIZ', '402-2581910-7', b'1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elecciones`
--

CREATE TABLE `elecciones` (
  `IdEleccion` int(11) NOT NULL,
  `Nombre` varchar(75) NOT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL,
  `HoraInicio` datetime DEFAULT NULL,
  `HoraFin` datetime DEFAULT NULL,
  `Active` bit(1) DEFAULT b'0',
  `Eliminado` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `elecciones`
--

INSERT INTO `elecciones` (`IdEleccion`, `Nombre`, `FechaInicio`, `FechaFin`, `HoraInicio`, `HoraFin`, `Active`, `Eliminado`) VALUES
(3, '2020', '2020-12-05', '2020-12-05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', b'1', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `IdNivel` int(11) NOT NULL,
  `IdEleccion` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`IdNivel`, `IdEleccion`, `Nombre`, `Active`) VALUES
(2, 3, 'Presidente', b'1'),
(3, 3, 'Diputado', b'1'),
(4, 3, 'Senador', b'1'),
(5, 3, 'Refgidor', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `IdPartido` int(11) NOT NULL,
  `IdEleccion` int(11) NOT NULL,
  `Siglas` varchar(10) DEFAULT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Color` varchar(25) DEFAULT NULL,
  `Active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`IdPartido`, `IdEleccion`, `Siglas`, `Nombre`, `Color`, `Active`) VALUES
(2, 3, 'PRM', 'Partido Revolucionario Moderno', 'azul', b'1'),
(3, 3, 'pld', 'Partido de la liberacion dominicana', 'morado', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IdRol`, `Nombre`) VALUES
(1, 'Admin'),
(2, 'Facilitador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `IdRol` int(11) NOT NULL,
  `Cedula` varchar(13) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Contrasena` varchar(200) DEFAULT NULL,
  `Active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `IdRol`, `Cedula`, `Nombres`, `Apellidos`, `Contrasena`, `Active`) VALUES
(2, 1, '402-0041396-7', 'FREDDY', 'SOTO FERMIN', '12345678', b'1'),
(3, 2, '001-0123141-3', 'MARIA', 'FERMIN BETANCOURT', '12345678', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votaciones`
--

CREATE TABLE `votaciones` (
  `IdVotacion` int(11) NOT NULL,
  `Cedula` varchar(13) NOT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `IdEleccion` int(11) NOT NULL,
  `Active` bit(1) DEFAULT b'1',
  `FechaNacimiento` date DEFAULT NULL,
  `Foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `votaciones`
--

INSERT INTO `votaciones` (`IdVotacion`, `Cedula`, `Nombres`, `Apellidos`, `IdEleccion`, `Active`, `FechaNacimiento`, `Foto`) VALUES
(1, '001-0123141-3', 'MARIA', 'FERMIN BETANCOURT', 3, b'1', '1967-01-05', 'http://173.249.49.169:88/api/test/foto/00101231413'),
(2, '402-3800818-5', 'BETEL', 'DE LA CRUZ DE LA CRUZ', 3, b'1', '1999-03-19', 'http://173.249.49.169:88/api/test/foto/40238008185'),
(3, '402-2581910-7', 'MARELVIS', 'SOTO ORTIZ', 3, b'1', '1996-06-08', 'http://173.249.49.169:88/api/test/foto/40225819107');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votaciones_detalle`
--

CREATE TABLE `votaciones_detalle` (
  `IdVotacion` int(11) NOT NULL,
  `IdNivel` int(11) NOT NULL,
  `IdCandidato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `votaciones_detalle`
--

INSERT INTO `votaciones_detalle` (`IdVotacion`, `IdNivel`, `IdCandidato`) VALUES
(1, 2, 2),
(1, 3, 3),
(1, 4, 4),
(1, 5, 5),
(2, 2, 2),
(2, 3, 3),
(2, 4, 4),
(2, 5, 5),
(3, 2, 2),
(3, 3, 3),
(3, 4, 4),
(3, 5, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`IdCandidato`),
  ADD UNIQUE KEY `idx_candidato_cedula` (`Cedula`),
  ADD KEY `fk_Candidato_Partido` (`IdPartido`),
  ADD KEY `fk_Candidato_Nivel` (`IdNivel`);

--
-- Indices de la tabla `elecciones`
--
ALTER TABLE `elecciones`
  ADD PRIMARY KEY (`IdEleccion`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`IdNivel`),
  ADD KEY `fk_Niveles_Eleccion` (`IdEleccion`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`IdPartido`),
  ADD KEY `fk_Partido_Eleccion` (`IdEleccion`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `idx_usuario_cedula` (`Cedula`),
  ADD KEY `fk_Usuario_Rol` (`IdRol`);

--
-- Indices de la tabla `votaciones`
--
ALTER TABLE `votaciones`
  ADD PRIMARY KEY (`IdVotacion`),
  ADD UNIQUE KEY `idx_votaciones_cedula` (`Cedula`),
  ADD KEY `fk_votaciones_elecciones` (`IdEleccion`);

--
-- Indices de la tabla `votaciones_detalle`
--
ALTER TABLE `votaciones_detalle`
  ADD PRIMARY KEY (`IdVotacion`,`IdNivel`,`IdCandidato`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `IdCandidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `elecciones`
--
ALTER TABLE `elecciones`
  MODIFY `IdEleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `IdNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `IdPartido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `votaciones`
--
ALTER TABLE `votaciones`
  MODIFY `IdVotacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD CONSTRAINT `fk_Candidato_Nivel` FOREIGN KEY (`IdNivel`) REFERENCES `niveles` (`IdNivel`),
  ADD CONSTRAINT `fk_Candidato_Partido` FOREIGN KEY (`IdPartido`) REFERENCES `partidos` (`IdPartido`);

--
-- Filtros para la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD CONSTRAINT `fk_Niveles_Eleccion` FOREIGN KEY (`IdEleccion`) REFERENCES `elecciones` (`IdEleccion`);

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `fk_Partido_Eleccion` FOREIGN KEY (`IdEleccion`) REFERENCES `elecciones` (`IdEleccion`);

--
-- Filtros para la tabla `votaciones`
--
ALTER TABLE `votaciones`
  ADD CONSTRAINT `fk_votaciones_elecciones` FOREIGN KEY (`IdEleccion`) REFERENCES `elecciones` (`IdEleccion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
