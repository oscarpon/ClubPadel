-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2019 a las 13:15:04
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

DROP DATABASE IF EXISTS `abp23`;
CREATE DATABASE `abp23` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `abp23`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abp23`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistenciasclases`
--

CREATE TABLE `asistenciasclases` (
  `nombre` varchar(50) NOT NULL,
  `horario` datetime NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistenciasclases`
--

INSERT INTO `asistenciasclases` (`nombre`, `horario`, `email`) VALUES
('Nombre 1', '2019-10-30 00:00:00', 'mail@mail.com'),
('nombre2', '2019-10-29 00:00:00', 'mail2@mail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeonato`
--

CREATE TABLE `campeonato` (
  `nombre` varchar(25) NOT NULL,
  `fechaFinIns` date NOT NULL,
  `categoria` char(1) NOT NULL,
  `genero` char(1) NOT NULL,
  `estado` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campeonato`
--

INSERT INTO `campeonato` (`nombre`, `fechaFinIns`, `categoria`, `genero`, `estado`) VALUES
('Master Nacasa', '2019-11-02', '2', 'F', 'abierto'),
('Open Brais', '2019-12-08', '1', 'M', 'abierto'),
('Open Mail', '2019-11-08', '1', 'M', 'abierto'),
('Open Nacasa', '2019-11-08', '1', 'F', 'abierto'),
('Open navidad', '2019-12-25', '1', 'F', 'abierto'),
('Open Ourense', '2019-11-01', '1', 'F', 'cerrado'),
('Open Pontevedra', '2019-11-06', '3', 'F', 'abierto'),
('Open Resa', '2019-11-08', '1', 'M', 'abierto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasesformativas`
--

CREATE TABLE `clasesformativas` (
  `nombre` varchar(50) NOT NULL,
  `horario` datetime NOT NULL,
  `entrenador` varchar(50) NOT NULL,
  `codigoPista` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clasesformativas`
--

INSERT INTO `clasesformativas` (`nombre`, `horario`, `entrenador`, `codigoPista`) VALUES
('Clase1', '2019-11-03 00:00:00', 'juan@mail.com', '000001'),
('Clase2', '2019-10-31 00:00:00', 'Entrenador1', '2'),
('Clase2', '2019-11-04 10:00:00', 'pepe@mail.com', '000000'),
('Clase3', '2019-10-31 00:00:00', 'Entrenador1', '2'),
('Clase4', '2019-10-31 00:00:00', 'Entrenador1', '2'),
('Clase5', '2019-10-31 00:00:00', 'Entrenador1', '2'),
('Clase6', '2019-10-31 00:00:00', 'Entrenador1', '2'),
('Clase7', '2019-10-31 00:00:00', 'Entrenador1', '2'),
('Clase8', '2019-10-31 00:00:00', 'Entrenador1', '2'),
('Clase9', '2019-10-31 00:00:00', 'Entrenador1', '2'),
('Master Clas', '2019-10-31 00:00:00', 'Entrenador1', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `miembro1` varchar(50) NOT NULL,
  `miembro2` varchar(50) NOT NULL,
  `nombreCamp` varchar(25) NOT NULL,
  `grupo` char(1) NOT NULL,
  `puntos` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `idContenido` int(6) NOT NULL,
  `titulo` varchar(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`idContenido`, `titulo`, `descripcion`, `email`) VALUES
(15, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(16, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(17, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(18, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(19, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(20, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(21, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(22, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(23, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(24, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(25, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(26, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(27, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(28, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(29, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(30, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(31, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(32, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(33, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(34, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(35, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(36, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(37, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(38, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(39, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(40, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(41, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(42, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(43, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(44, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(45, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(46, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(47, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(48, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(49, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(50, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(51, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(52, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incripcionesclases`
--

CREATE TABLE `incripcionesclases` (
  `nombre` varchar(50) NOT NULL,
  `horario` datetime NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incripcionesclases`
--

INSERT INTO `incripcionesclases` (`nombre`, `horario`, `email`) VALUES
('clase1', '2019-10-30 11:00:00', 'mail1@mail.com'),
('clase1', '2019-10-31 00:00:00', 'albino@mail.com'),
('clase1', '2019-10-31 00:00:00', 'brais@mail.com'),
('clase1', '2019-10-31 00:00:00', 'mail1@mail.com'),
('clase1', '2019-10-31 00:00:00', 'mail2@mail.com'),
('clase1', '2019-10-31 00:00:00', 'marta@mail.com'),
('clase1', '2019-10-31 00:00:00', 'oscar@mail.com'),
('clase1', '2019-10-31 00:00:00', 'raul@mail.com'),
('clase2', '2019-10-30 14:00:00', 'mail1@mail.com'),
('clase3', '2019-10-31 00:00:00', 'mail1@mail.com'),
('clase4', '2019-10-31 00:00:00', 'mail1@mail.com'),
('clase5', '2019-10-31 00:00:00', 'mail1@mail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferprompartidos`
--

CREATE TABLE `oferprompartidos` (
  `email` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `partic1` varchar(50) NOT NULL,
  `partic2` varchar(50) NOT NULL,
  `partic3` varchar(50) NOT NULL,
  `partic4` varchar(50) NOT NULL,
  `numpart` int(1) NOT NULL,
  `tipo` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oferprompartidos`
--

INSERT INTO `oferprompartidos` (`email`, `fecha`, `partic1`, `partic2`, `partic3`, `partic4`, `numpart`, `tipo`) VALUES
('brmartinez@esei.uvigo.es', '2019-11-18 19:00:00', 'Puesto vacio', 'Puesto vacio', 'Puesto vacio', 'Puesto vacio', 0, 'PROM'),
('trelo@gmail.com', '2019-11-18 18:00:00', 'trelo@gmail.com', 'Puesto vacio', 'Puesto vacio', 'Puesto vacio', 1, 'OFER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `email` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `importe` int(3) NOT NULL,
  `pagado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`email`, `fecha`, `importe`, `pagado`) VALUES
('trelo@gmail.com', '2019-11-14 20:16:44', 35, 'N'),
('trelo@gmail.com', '2019-11-14 20:19:18', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:38:53', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:39:08', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:42:09', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:42:15', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:44:41', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:45:08', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:48:44', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:48:52', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:49:01', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:49:12', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:50:14', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:50:22', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:52:39', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:53:11', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:54:45', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:54:54', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:58:25', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:59:26', 35, 'N'),
('trelo@gmail.com', '2019-11-15 13:59:55', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:02:11', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:11:07', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:15:02', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:15:20', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:15:46', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:15:58', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:20:53', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:20:57', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:21:08', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:21:16', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:21:26', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:21:35', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:41:16', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:41:21', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:41:25', 35, 'N'),
('trelo@gmail.com', '2019-11-15 14:41:29', 35, 'N'),
('trelo@gmail.com', '2019-11-15 16:37:14', 35, 'N'),
('trelo@gmail.com', '2019-11-15 16:39:02', 35, 'N'),
('trelo@gmail.com', '2019-11-15 16:39:07', 35, 'N'),
('trelo@gmail.com', '2019-11-15 16:43:33', 25, 'N'),
('trelo@gmail.com', '2019-11-15 16:43:38', 25, 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas`
--

CREATE TABLE `parejas` (
  `miembro1` varchar(50) NOT NULL,
  `miembro2` varchar(50) NOT NULL,
  `genero` char(1) NOT NULL,
  `nivel` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parejas`
--

INSERT INTO `parejas` (`miembro1`, `miembro2`, `genero`, `nivel`) VALUES
('albino@mail.com', 'brais@mail.com', 'M', '1'),
('mail1@mail.com', 'mail2@mail.com', 'M', '3'),
('marta@mail.com', 'mail1@mail.com', 'F', '1'),
('marta@mail.com', 'mail2@mail.com', 'F', '2'),
('oscar@mail.com', 'albino@mail.com', 'M', '2'),
('oscar@mail.com', 'raul@mail.com', 'M', '1'),
('rachid1194@hotmail.com', 'albino@mail.com', 'M', '3'),
('rachid1194@hotmail.com', 'mail1@mail.com', 'M', '3'),
('rachid1194@hotmail.com', 'mail2@mail.com', 'M', '2'),
('rachid1194@hotmail.com', 'pepe@mail.com', 'M', '1'),
('rachid1194@hotmail.com', 'raul@mail.com', 'M', '3'),
('trelo@gmail.com', 'marta@mail.com', 'F', '2'),
('trelo@gmail.com', 'raul@mail.com', 'X', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partcampeonatos`
--

CREATE TABLE `partcampeonatos` (
  `miembro1` varchar(50) NOT NULL,
  `miembro2` varchar(50) NOT NULL,
  `nombreCamp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partcampeonatos`
--

INSERT INTO `partcampeonatos` (`miembro1`, `miembro2`, `nombreCamp`) VALUES
('a@gmail.com', 'b@gmail.com', 'Open Pontevedra'),
('asdf@mail.com', 'afsasdf@mail.com', 'Open Pontevedra'),
('c@gmail.com', 'd@gmail.com', 'Open Pontevedra'),
('correo11@mail.com', 'correo12@mail.com', 'Open Pontevedra'),
('correo13@gmail.com', 'correo14@gmail.com', 'Open Pontevedra'),
('correo15@gmail.com', 'correo16@gmail.com', 'Open Pontevedra'),
('correo17@gmail.com', 'correo18@gmail.com', 'Open Pontevedra'),
('correo19@gmail.com', 'correo20@gmail.com', 'Open Pontevedra'),
('correo1@mail.com', 'correo2@mail.com', 'Open Pontevedra'),
('correo3@mail.com', 'correo4@mail.com', 'Open Pontevedra'),
('correo5@mail.com', 'correo6@mail.com', 'Open Pontevedra'),
('correo7@mail.com', 'correo8@mail.com', 'Open Pontevedra'),
('correo9@mail.com', 'correo10@mail.com', 'Open Pontevedra'),
('ererere@mail.com', 'rgffgfg@gmail.com', 'Open Pontevedra'),
('mail11@mail.com', 'mail12@mail.com', 'Open Pontevedra'),
('mail13@mail.com', 'mail14@mail.com', 'Open Pontevedra'),
('mail15@mail.com', 'mail16@mail.com', 'Open Pontevedra'),
('mail17@mail.com', 'mail18@mail.com', 'Open Pontevedra'),
('mail19@mail.com', 'mail20@mail.com', 'Open Pontevedra'),
('mail1@mail.com', 'mail2@mail.com', 'Open Pontevedra'),
('mail3@mail.com', 'mail4@mail.com', 'Open Pontevedra'),
('mail5@mail.com', 'mail6@mail.com', 'Open Pontevedra'),
('mail7@mail.com', 'mail8@mail.com', 'Open Pontevedra'),
('mail9@mail.com', 'mail10@mail.com', 'Open Pontevedra'),
('trelo@gmail.com', 'marta@mail.com', 'Open Pontevedra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidocamp`
--

CREATE TABLE `partidocamp` (
  `codigoPista` char(6) NOT NULL,
  `fecha` datetime NOT NULL,
  `miembro1Par1` varchar(50) NOT NULL,
  `miembro2Par1` varchar(50) NOT NULL,
  `miembro1Par2` varchar(50) NOT NULL,
  `miembro2Par2` varchar(50) NOT NULL,
  `nombreCamp` varchar(25) NOT NULL,
  `resultado` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `codigoPista` char(6) NOT NULL,
  `fecha` datetime NOT NULL,
  `miembro1Par1` varchar(50) NOT NULL,
  `miembro2Par1` varchar(50) NOT NULL,
  `miembro1Par2` varchar(50) NOT NULL,
  `miembro2Par2` varchar(50) NOT NULL,
  `resultado` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

CREATE TABLE `pistas` (
  `codigoPista` char(6) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`codigoPista`, `fecha`, `tipo`) VALUES
('000000', '2019-11-18 18:00:00', 'INT'),
('000000', '2019-11-18 20:00:00', 'INT'),
('000000', '2019-11-20 14:00:00', 'EXT'),
('000000', '2019-11-20 16:00:00', 'EXT'),
('000001', '2019-11-19 14:00:00', 'INT'),
('000001', '2019-11-19 17:00:00', 'INT'),
('000001', '2019-11-20 14:00:00', 'EXT'),
('000002', '2019-11-18 19:00:00', 'INT'),
('000002', '2019-11-21 09:00:00', 'INT'),
('000002', '2019-11-22 10:00:00', 'EXT'),
('000003', '2019-11-19 09:00:00', 'INT'),
('000003', '2019-11-19 11:00:00', 'EXT'),
('000003', '2019-11-20 11:00:00', 'INT'),
('000003', '2019-11-22 15:00:00', 'EXT'),
('000004', '2019-11-21 13:00:00', 'EXT'),
('000004', '2019-11-22 16:00:00', 'INT'),
('000004', '2019-11-23 10:00:00', 'EXT'),
('000004', '2019-11-23 18:00:00', 'EXT'),
('000008', '2019-11-16 05:00:00', 'INT'),
('000008', '2019-11-24 10:00:00', 'INT'),
('000008', '2019-11-24 17:00:00', 'EXT'),
('000008', '2019-11-25 12:00:00', 'INT'),
('000008', '2019-11-27 10:00:00', 'EXT'),
('000008', '2019-11-27 16:00:00', 'EXT'),
('000009', '2019-11-25 19:00:00', 'EXT'),
('000009', '2019-11-26 15:00:00', 'INT'),
('000009', '2019-11-27 10:00:00', 'INT'),
('000009', '2019-11-27 16:00:00', 'INT'),
('000009', '2019-11-28 10:00:00', 'EXT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `email` varchar(50) NOT NULL,
  `codigoPista` char(6) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `rol` char(1) NOT NULL,
  `genero` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `password`, `nombre`, `apellidos`, `rol`, `genero`) VALUES
('1234@mail.com', '1234', ' Marta', 'Ponte Baquero', 'D', 'M'),
('albino@mail.com', '1234', 'Labino', 'Ponte Baquero', 'D', 'M'),
('brmartinez@esei.uvigo.es', 'hola', 'Brais', 'RM', 'A', 'M'),
('hey@mail.com', '1234', 'hey', 'Ponte Baquero', 'A', 'M'),
('lola@mail.com', '1234', 'lola', 'Ponte Baquero', 'E', 'M'),
('mail1@mail.com', '1234', 'Oscar', 'Ponte Baquero', 'D', 'M'),
('mail2@mail.com', '1234', 'Brais', 'Ponte Baquero', 'D', 'M'),
('Ourense@mail.com', '1234', 'Ourense', 'Ponte Baquero', 'D', 'M'),
('pepe@mail.com', '1234', 'Pepe', 'Ponte Baquero', 'D', 'M'),
('rachid1194@hotmail.com', 'm', 'h', 'r', 'D', 'M'),
('raul@mail.com', '1234', 'Raul', 'Ponte Baquero', 'D', 'M'),
('trelo@gmail.com', 'trelo', 'Trelo', 'olo', 'D', 'O');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistenciasclases`
--
ALTER TABLE `asistenciasclases`
  ADD PRIMARY KEY (`nombre`,`horario`,`email`);

--
-- Indices de la tabla `campeonato`
--
ALTER TABLE `campeonato`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `clasesformativas`
--
ALTER TABLE `clasesformativas`
  ADD PRIMARY KEY (`nombre`,`horario`);

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`miembro1`,`miembro2`,`nombreCamp`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`idContenido`);

--
-- Indices de la tabla `incripcionesclases`
--
ALTER TABLE `incripcionesclases`
  ADD PRIMARY KEY (`nombre`,`horario`,`email`);

--
-- Indices de la tabla `oferprompartidos`
--
ALTER TABLE `oferprompartidos`
  ADD PRIMARY KEY (`email`,`fecha`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`email`,`fecha`);

--
-- Indices de la tabla `parejas`
--
ALTER TABLE `parejas`
  ADD PRIMARY KEY (`miembro1`,`miembro2`);

--
-- Indices de la tabla `partcampeonatos`
--
ALTER TABLE `partcampeonatos`
  ADD PRIMARY KEY (`miembro1`,`miembro2`,`nombreCamp`);

--
-- Indices de la tabla `partidocamp`
--
ALTER TABLE `partidocamp`
  ADD PRIMARY KEY (`codigoPista`,`fecha`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`codigoPista`,`fecha`);

--
-- Indices de la tabla `pistas`
--
ALTER TABLE `pistas`
  ADD PRIMARY KEY (`codigoPista`,`fecha`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`email`,`codigoPista`,`fecha`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `idContenido` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
