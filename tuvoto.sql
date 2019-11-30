-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2019 a las 05:27:35
-- Versión del servidor: 8.0.13
-- Versión de PHP: 7.3.9

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
  `Cedula` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `candidatos`
--

INSERT INTO `candidatos` (`IdCandidato`, `IdPartido`, `IdNivel`, `Nombres`, `Apellidos`, `Cedula`) VALUES
(1, 1, 1, 'FREDDY', 'SOTO FERMIN', '402-0041396-7');

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
  `Active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `elecciones`
--

INSERT INTO `elecciones` (`IdEleccion`, `Nombre`, `FechaInicio`, `FechaFin`, `HoraInicio`, `HoraFin`, `Active`) VALUES
(1, '2020', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `IdNivel` int(11) NOT NULL,
  `IdEleccion` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`IdNivel`, `IdEleccion`, `Nombre`) VALUES
(1, 1, 'Diputado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `IdPartido` int(11) NOT NULL,
  `IdEleccion` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Color` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`IdPartido`, `IdEleccion`, `Nombre`, `Color`) VALUES
(1, 1, 'PLD', 'Morado'),
(2, 1, 'Diputado', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `Contrasena` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `IdRol`, `Cedula`, `Nombres`, `Apellidos`, `Contrasena`) VALUES
(2, 1, '402-3800818-5', 'BETEL', 'DE LA CRUZ DE LA CRUZ', 'mariposab'),
(3, 2, '001-0123141-3', 'MARIA', 'FERMIN BETANCOURT', 'serenidad'),
(4, 1, '402-0041396-7', 'FREDDY', 'SOTO FERMIN', 'fsoto123');

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
  ADD UNIQUE KEY `idx_usuario` (`Cedula`),
  ADD KEY `fk_Usuario_Rol` (`IdRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `IdCandidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `elecciones`
--
ALTER TABLE `elecciones`
  MODIFY `IdEleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `IdNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `IdPartido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD CONSTRAINT `fk_Candidato_Nivel` FOREIGN KEY (`IdNivel`) REFERENCES `niveles` (`idnivel`),
  ADD CONSTRAINT `fk_Candidato_Partido` FOREIGN KEY (`IdPartido`) REFERENCES `partidos` (`idpartido`);

--
-- Filtros para la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD CONSTRAINT `fk_Niveles_Eleccion` FOREIGN KEY (`IdEleccion`) REFERENCES `elecciones` (`ideleccion`);

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `fk_Partido_Eleccion` FOREIGN KEY (`IdEleccion`) REFERENCES `elecciones` (`ideleccion`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuario_Rol` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
