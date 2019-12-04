-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 06:23 AM
-- Server version: 8.0.13
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuvoto`
--
CREATE DATABASE IF NOT EXISTS `tuvoto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `tuvoto`;

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `PorcentajeVotos` () RETURNS INT(11) BEGIN
declare prueba int;
set prueba = TotalVotos();
select (count(IdCandidato) / prueba) into @total from votaciones_detalle;
RETURN @total;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `TotalVotos` () RETURNS INT(11) BEGIN

select count(IdVotacion) into @total from votaciones_detalle;
RETURN @total;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `candidatos`
--

CREATE TABLE `candidatos` (
  `IdCandidato` int(11) NOT NULL,
  `IdPartido` int(11) NOT NULL,
  `IdNivel` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Cedula` varchar(13) NOT NULL,
  `Active` bit(1) DEFAULT b'1',
  `Foto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `candidatos`
--

INSERT INTO `candidatos` (`IdCandidato`, `IdPartido`, `IdNivel`, `Nombres`, `Apellidos`, `Cedula`, `Active`, `Foto`) VALUES
(2, 2, 2, 'MARIA', 'FERMIN BETANCOURT', '001-0123141-3', b'1', NULL),
(3, 2, 3, 'BETEL', 'DE LA CRUZ DE LA CRUZ', '402-3800818-5', b'1', NULL),
(4, 2, 4, 'ROBERT', 'SOTO FERMIN', '402-1325841-7', b'1', NULL),
(5, 3, 5, 'MARIA', 'SOTO FERMIN', '402-2251856-1', b'1', NULL),
(6, 2, 4, 'MARELVIS', 'SOTO ORTIZ', '402-2581910-7', b'1', NULL),
(10, 3, 2, 'FREDDY', 'SOTO FERMIN', '402-0041396-7', b'1', 'http://173.249.49.169:88/api/test/foto/40200413967');

-- --------------------------------------------------------

--
-- Table structure for table `elecciones`
--

CREATE TABLE `elecciones` (
  `IdEleccion` int(11) NOT NULL,
  `Nombre` varchar(75) NOT NULL,
  `FechaInicio` datetime DEFAULT NULL,
  `FechaFin` datetime DEFAULT NULL,
  `HoraInicio` time DEFAULT NULL,
  `HoraFin` time DEFAULT NULL,
  `Active` bit(1) DEFAULT b'0',
  `Eliminado` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `elecciones`
--

INSERT INTO `elecciones` (`IdEleccion`, `Nombre`, `FechaInicio`, `FechaFin`, `HoraInicio`, `HoraFin`, `Active`, `Eliminado`) VALUES
(3, '2020', '2019-12-04 02:00:00', '2019-12-04 10:08:00', '10:30:00', '12:30:00', b'1', b'0'),
(4, 'fsdsd', '2019-11-26 00:00:00', '2019-12-11 00:00:00', '00:00:00', '00:00:00', b'0', b'0'),
(5, 'ddffd', '2020-12-05 10:15:00', '2020-12-05 12:30:00', '00:00:00', '00:00:00', b'0', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `niveles`
--

CREATE TABLE `niveles` (
  `IdNivel` int(11) NOT NULL,
  `IdEleccion` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `niveles`
--

INSERT INTO `niveles` (`IdNivel`, `IdEleccion`, `Nombre`, `Active`) VALUES
(2, 3, 'Presidente', b'1'),
(3, 3, 'Diputado', b'1'),
(4, 3, 'Senador', b'1'),
(5, 3, 'Refgidor', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `partidos`
--

CREATE TABLE `partidos` (
  `IdPartido` int(11) NOT NULL,
  `IdEleccion` int(11) NOT NULL,
  `Siglas` varchar(10) DEFAULT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Color` varchar(25) DEFAULT NULL,
  `Active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `partidos`
--

INSERT INTO `partidos` (`IdPartido`, `IdEleccion`, `Siglas`, `Nombre`, `Color`, `Active`) VALUES
(2, 3, 'PRM', 'Partido Revolucionario Moderno', 'azul', b'1'),
(3, 3, 'pld', 'Partido de la liberacion dominicana', 'morado', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`IdRol`, `Nombre`) VALUES
(1, 'Admin'),
(2, 'Facilitador');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `IdRol` int(11) NOT NULL,
  `Cedula` varchar(13) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Contrasena` varchar(200) DEFAULT NULL,
  `Active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `IdRol`, `Cedula`, `Nombres`, `Apellidos`, `Contrasena`, `Active`) VALUES
(2, 1, '402-0041396-7', 'FREDDY', 'SOTO FERMIN', '12345678', b'1'),
(3, 2, '001-0123141-3', 'MARIA', 'FERMIN BETANCOURT', '12345678', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `votaciones`
--

CREATE TABLE `votaciones` (
  `IdVotacion` int(11) NOT NULL,
  `Cedula` varchar(13) NOT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `IdEleccion` int(11) NOT NULL,
  `Active` bit(1) DEFAULT b'1',
  `FechaNacimiento` date DEFAULT NULL,
  `Foto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `votaciones`
--

INSERT INTO `votaciones` (`IdVotacion`, `Cedula`, `Nombres`, `Apellidos`, `IdEleccion`, `Active`, `FechaNacimiento`, `Foto`) VALUES
(1, '402-0041396-7', 'FREDDY', 'SOTO FERMIN', 3, b'1', '2000-01-19', 'http://173.249.49.169:88/api/test/foto/40200413967'),
(2, '001-0123141-3', 'MARIA', 'FERMIN BETANCOURT', 3, b'1', '1967-01-05', 'http://173.249.49.169:88/api/test/foto/00101231413');

-- --------------------------------------------------------

--
-- Table structure for table `votaciones_detalle`
--

CREATE TABLE `votaciones_detalle` (
  `IdVotacion` int(11) NOT NULL,
  `IdNivel` int(11) NOT NULL,
  `IdCandidato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `votaciones_detalle`
--

INSERT INTO `votaciones_detalle` (`IdVotacion`, `IdNivel`, `IdCandidato`) VALUES
(1, 2, 1),
(1, 3, 3),
(1, 4, 6),
(1, 5, 5),
(2, 2, 2),
(2, 3, 3),
(2, 4, 4),
(2, 5, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`IdCandidato`),
  ADD UNIQUE KEY `idx_candidato_cedula` (`Cedula`),
  ADD KEY `fk_Candidato_Partido` (`IdPartido`),
  ADD KEY `fk_Candidato_Nivel` (`IdNivel`);

--
-- Indexes for table `elecciones`
--
ALTER TABLE `elecciones`
  ADD PRIMARY KEY (`IdEleccion`);

--
-- Indexes for table `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`IdNivel`),
  ADD KEY `fk_Niveles_Eleccion` (`IdEleccion`);

--
-- Indexes for table `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`IdPartido`),
  ADD KEY `fk_Partido_Eleccion` (`IdEleccion`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `idx_usuario_cedula` (`Cedula`),
  ADD KEY `fk_Usuario_Rol` (`IdRol`);

--
-- Indexes for table `votaciones`
--
ALTER TABLE `votaciones`
  ADD PRIMARY KEY (`IdVotacion`),
  ADD UNIQUE KEY `idx_votaciones_cedula` (`Cedula`),
  ADD KEY `fk_votaciones_elecciones` (`IdEleccion`);

--
-- Indexes for table `votaciones_detalle`
--
ALTER TABLE `votaciones_detalle`
  ADD PRIMARY KEY (`IdVotacion`,`IdNivel`,`IdCandidato`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `IdCandidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `elecciones`
--
ALTER TABLE `elecciones`
  MODIFY `IdEleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `niveles`
--
ALTER TABLE `niveles`
  MODIFY `IdNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `partidos`
--
ALTER TABLE `partidos`
  MODIFY `IdPartido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `votaciones`
--
ALTER TABLE `votaciones`
  MODIFY `IdVotacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidatos`
--
ALTER TABLE `candidatos`
  ADD CONSTRAINT `fk_Candidato_Nivel` FOREIGN KEY (`IdNivel`) REFERENCES `niveles` (`idnivel`),
  ADD CONSTRAINT `fk_Candidato_Partido` FOREIGN KEY (`IdPartido`) REFERENCES `partidos` (`idpartido`);

--
-- Constraints for table `niveles`
--
ALTER TABLE `niveles`
  ADD CONSTRAINT `fk_Niveles_Eleccion` FOREIGN KEY (`IdEleccion`) REFERENCES `elecciones` (`IdEleccion`);

--
-- Constraints for table `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `fk_Partido_Eleccion` FOREIGN KEY (`IdEleccion`) REFERENCES `elecciones` (`IdEleccion`);

--
-- Constraints for table `votaciones`
--
ALTER TABLE `votaciones`
  ADD CONSTRAINT `fk_votaciones_elecciones` FOREIGN KEY (`IdEleccion`) REFERENCES `elecciones` (`ideleccion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
