-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2020 a las 10:39:59
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

DROP DATABASE IF EXISTS `abp23`;
CREATE DATABASE `abp23` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;



USE `abp23`;



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


SET GLOBAL event_scheduler="ON";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abp23`
--

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
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `miembro1` varchar(50) NOT NULL,
  `miembro2` varchar(50) NOT NULL,
  `nombreCamp` varchar(25) NOT NULL,
  `grupo` char(1) NOT NULL,
  `puntos` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`miembro1`, `miembro2`, `nombreCamp`, `grupo`, `puntos`) VALUES
('a@gmail.com', 'b@gmail.com', 'Open Pontevedra', '1', 21),
('asdf@mail.com', 'afsasdf@mail.com', 'Open Pontevedra', '1', 0),
('c@gmail.com', 'd@gmail.com', 'Open Pontevedra', '1', 0),
('correo11@mail.com', 'correo12@mail.com', 'Open Pontevedra', '1', 0),
('correo13@gmail.com', 'correo14@gmail.com', 'Open Pontevedra', '1', 0),
('correo15@gmail.com', 'correo16@gmail.com', 'Open Pontevedra', '1', 0),
('correo17@gmail.com', 'correo18@gmail.com', 'Open Pontevedra', '1', 0),
('correo19@gmail.com', 'correo20@gmail.com', 'Open Pontevedra', '1', 0),
('correo1@mail.com', 'correo2@mail.com', 'Open Pontevedra', '1', 0),
('correo3@mail.com', 'correo4@mail.com', 'Open Pontevedra', '1', 0),
('correo5@mail.com', 'correo6@mail.com', 'Open Pontevedra', '1', 5),
('correo7@mail.com', 'correo8@mail.com', 'Open Pontevedra', '1', 12),
('correo9@mail.com', 'correo10@mail.com', 'Open Pontevedra', '2', 0),
('ererere@mail.com', 'rgffgfg@gmail.com', 'Open Pontevedra', '2', 0),
('mail11@mail.com', 'mail12@mail.com', 'Open Pontevedra', '2', 0),
('mail13@mail.com', 'mail14@mail.com', 'Open Pontevedra', '2', 0),
('mail15@mail.com', 'mail16@mail.com', 'Open Pontevedra', '2', 0),
('mail17@mail.com', 'mail18@mail.com', 'Open Pontevedra', '2', 0),
('mail19@mail.com', 'mail20@mail.com', 'Open Pontevedra', '2', 0),
('mail1@mail.com', 'mail2@mail.com', 'Open Pontevedra', '2', 0),
('mail3@mail.com', 'mail4@mail.com', 'Open Pontevedra', '2', 0),
('mail5@mail.com', 'mail6@mail.com', 'Open Pontevedra', '2', 0),
('mail7@mail.com', 'mail8@mail.com', 'Open Pontevedra', '2', 0),
('mail9@mail.com', 'mail10@mail.com', 'Open Pontevedra', '2', 0),
('trelo@gmail.com', 'marta@mail.com', 'Open Pontevedra', '3', 0);

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
(52, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(53, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(54, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(55, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuelasdeportivas`
--

CREATE TABLE `escuelasdeportivas` (
  `nombre` varchar(50) NOT NULL,
  `horario` datetime NOT NULL,
  `entrenador` varchar(50) NOT NULL,
  `codigoPista` char(6) NOT NULL,
  `periodicidad` int(2) NOT NULL,
  `minInscritos` int(2) NOT NULL,
  `maxInscritos` int(2) NOT NULL,
  `estado` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `escuelasdeportivas`
--

INSERT INTO `escuelasdeportivas` (`nombre`, `horario`, `entrenador`, `codigoPista`, `periodicidad`, `minInscritos`, `maxInscritos`, `estado`) VALUES
('Clase1', '2019-11-03 00:00:00', 'juan@mail.com', '000001', 3, 2, 10, 'abierto'),
('Clase2', '2019-10-31 00:00:00', 'Entrenador1', '2', 5, 5, 15, 'abierto'),
('Clase2', '2019-11-04 10:00:00', 'pepe@mail.com', '000000', 6, 2, 20, 'progreso'),
('Clase3', '2019-10-31 00:00:00', 'Entrenador1', '2', 2, 10, 30, 'cerrado'),
('Clase4', '2019-10-31 00:00:00', 'Entrenador1', '2', 1, 4, 11, 'progreso'),
('Clase5', '2019-10-31 00:00:00', 'Entrenador1', '2', 3, 1, 2, 'abierto'),
('Clase6', '2019-10-31 00:00:00', 'Entrenador1', '2', 5, 5, 15, 'progreso'),
('Clase7', '2019-10-31 00:00:00', 'Entrenador1', '2', 4, 2, 9, 'abierto'),
('Clase8', '2019-10-31 00:00:00', 'Entrenador1', '2', 3, 4, 18, 'cerrado'),
('Clase9', '2019-10-31 00:00:00', 'Entrenador1', '2', 2, 5, 22, 'cerrado'),
('Master Clas', '2019-10-31 00:00:00', 'Entrenador1', '2', 1, 1, 6, 'cerrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcionesclases`
--

CREATE TABLE `inscripcionesclases` (
  `nombre` varchar(50) NOT NULL,
  `horario` datetime NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('brmartinez@esei.uvigo.es', '2019-11-19 09:00:00', 'trelo@gmail.com', 'Puesto vacio', 'Puesto vacio', 'Puesto vacio', 1, 'PROM'),
('trelo@gmail.com', '2019-11-18 18:00:00', 'trelo@gmail.com', 'Puesto vacio', 'Puesto vacio', 'Puesto vacio', 1, 'OFER'),
('trelo@gmail.com', '2019-11-19 09:00:00', 'Puesto vacio', 'Puesto vacio', 'Puesto vacio', 'Puesto vacio', 0, 'OFER');

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
('rachid1194@hotmail.com', '2020-01-14 18:17:22', 30, 'N'),
('rachid1194@hotmail.com', '2020-01-14 18:19:40', 30, 'N'),
('rachid1194@hotmail.com', '2020-01-14 18:22:55', 30, 'N'),
('rachid1194@hotmail.com', '2020-01-14 18:25:05', 30, 'N'),
('rachid1194@hotmail.com', '2020-01-14 18:26:24', 30, 'N'),
('rachid1194@hotmail.com', '2020-01-14 18:26:39', 30, 'N'),
('rachid1194@hotmail.com', '2020-01-14 18:35:38', 30, 'N'),
('rachid1194@hotmail.com', '2020-01-14 18:36:14', 30, 'N'),
('rachid1194@hotmail.com', '2020-01-14 18:36:43', 30, 'N'),
('rachid1194@hotmail.com', '2020-01-15 09:45:43', 30, 'N'),
('rachid1194@hotmail.com', '2020-01-15 09:53:14', 30, 'N'),
('rachid1194@hotmail.com', '2020-01-15 09:57:44', 30, 'N'),
('rachid1194@hotmail.com', '2020-01-15 09:58:27', 30, 'N'),
('trelo@gmail.com', '2019-11-14 20:16:44', 35, 'S'),
('trelo@gmail.com', '2019-11-14 20:19:18', 35, 'S'),
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
('trelo@gmail.com', '2019-11-15 16:43:38', 25, 'N'),
('trelo@gmail.com', '2019-11-18 17:05:22', 35, 'N'),
('trelo@gmail.com', '2019-11-18 17:08:26', 35, 'N'),
('trelo@gmail.com', '2019-11-18 17:11:08', 35, 'N'),
('trelo@gmail.com', '2019-11-18 17:11:29', 35, 'N'),
('trelo@gmail.com', '2019-11-18 17:15:35', 12, 'N'),
('trelo@gmail.com', '2019-11-18 17:15:53', 12, 'N'),
('trelo@gmail.com', '2019-11-18 17:15:57', 12, 'N'),
('trelo@gmail.com', '2019-11-18 17:20:33', 25, 'N'),
('trelo@gmail.com', '2019-11-22 23:15:23', 25, 'N');

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
('trelo@gmail.com', 'rachid1194@hotmail.com', 'X', '1'),
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
('albion@gmail.es', 'labino@gmail.es', 'Open Pontevedra'),
('carmenlomana@gmail.es', 'geforcegtx@gmail.es', 'Open Pontevedra'),
('charlie@gmail.es', 'godofredo@gmail.es', 'Open Pontevedra'),
('gorgue@gmail.es', 'alibon@gmail.es', 'Open Pontevedra'),
('gumersindo@gmail.es', 'rigoberto@gmail.es', 'Open Pontevedra'),
('humbertocarrillo@gmail.es', 'phpmyadmin@gmail.es', 'Open Pontevedra'),
('jorgecalvinho@gmail.es', 'davidlorenzo@gmail.es', 'Open Pontevedra'),
('labion@gmail.es', 'ojka@gmail.es', 'Open Pontevedra'),
('maceta@gmail.es', 'louisolta@gmail.es', 'Open Pontevedra'),
('manololama@gmail.es', 'fernandoalonso@gmail.es', 'Open Pontevedra'),
('melchor@gmail.es', 'gaspar@gmail.es', 'Open Pontevedra'),
('mika@gmail.es', 'morgan@gmail.es', 'Open Pontevedra'),
('moreno19@gmail.es', 'apreverte@gmail.es', 'Open Pontevedra'),
('nachoanel@gmail.es', 'toni@gmail.es', 'Open Pontevedra'),
('paulina@gmail.es', 'padelchampion@gmail.es', 'Open Pontevedra'),
('personareal@gmail.es', 'emailmuyreal@gmail.es', 'Open Pontevedra'),
('pocholo@gmail.es', 'maikel@gmail.es', 'Open Pontevedra'),
('trelo@gmail.com', 'marta@mail.com', 'Master Nacasa'),
('tucker@gmail.es', 'ruffles@gmail.es', 'Open Pontevedra'),
('vilares@gmail.es', 'baltasar@gmail.es', 'Open Pontevedra'),
('windows10@gmail.es', 'kubuntu@gmail.es', 'Open Pontevedra');

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

--
-- Volcado de datos para la tabla `partidocamp`
--

INSERT INTO `partidocamp` (`codigoPista`, `fecha`, `miembro1Par1`, `miembro2Par1`, `miembro1Par2`, `miembro2Par2`, `nombreCamp`, `resultado`) VALUES
('000010', '2019-11-18 04:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'a@gmail.com', 'b@gmail.com', 'Open Pontevedra', 'NJ'),
('000010', '2019-11-19 04:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'correo19@gmail.com', 'correo20@gmail.com', 'Open Pontevedra', 'NJ'),
('000010', '2019-11-19 12:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'correo15@gmail.com', 'correo16@gmail.com', 'Open Pontevedra', 'NJ'),
('000010', '2019-11-19 16:00:00', 'a@gmail.com', 'b@gmail.com', 'c@gmail.com', 'd@gmail.com', 'Open Pontevedra', 'NJ'),
('000011', '2019-11-18 04:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'a@gmail.com', 'b@gmail.com', 'Open Pontevedra', 'NJ'),
('000011', '2019-11-18 08:00:00', 'a@gmail.com', 'b@gmail.com', 'correo5@mail.com', 'correo6@mail.com', 'Open Pontevedra', 'NJ'),
('000011', '2019-11-18 12:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'correo5@mail.com', 'correo6@mail.com', 'Open Pontevedra', 'NJ'),
('000011', '2019-11-18 16:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'c@gmail.com', 'd@gmail.com', 'Open Pontevedra', 'NJ'),
('000011', '2019-11-19 00:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'correo1@mail.com', 'correo2@mail.com', 'Open Pontevedra', 'NJ'),
('000011', '2019-11-19 08:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'asdf@mail.com', 'afsasdf@mail.com', 'Open Pontevedra', 'NJ'),
('000011', '2019-11-19 12:00:00', 'a@gmail.com', 'b@gmail.com', 'correo11@mail.com', 'correo12@mail.com', 'Open Pontevedra', 'NJ'),
('000012', '2019-11-18 04:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'a@gmail.com', 'b@gmail.com', 'Open Pontevedra', 'NJ'),
('000012', '2019-11-18 12:00:00', 'a@gmail.com', 'b@gmail.com', 'correo3@mail.com', 'correo4@mail.com', 'Open Pontevedra', 'NJ'),
('000012', '2019-11-18 16:00:00', 'a@gmail.com', 'b@gmail.com', 'correo1@mail.com', 'correo2@mail.com', 'Open Pontevedra', 'NJ'),
('000013', '2019-11-18 08:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'correo7@mail.com', 'correo8@mail.com', 'Open Pontevedra', 'NJ'),
('000013', '2019-11-18 12:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'correo5@mail.com', 'correo6@mail.com', 'Open Pontevedra', 'NJ'),
('000013', '2019-11-18 20:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'correo3@mail.com', 'correo4@mail.com', 'Open Pontevedra', 'NJ'),
('000013', '2019-11-19 04:00:00', 'a@gmail.com', 'b@gmail.com', 'correo15@gmail.com', 'correo16@gmail.com', 'Open Pontevedra', 'NJ'),
('000013', '2019-11-19 08:00:00', 'a@gmail.com', 'b@gmail.com', 'correo13@gmail.com', 'correo14@gmail.com', 'Open Pontevedra', 'NJ'),
('000013', '2019-11-19 20:00:00', 'a@gmail.com', 'b@gmail.com', 'asdf@mail.com', 'afsasdf@mail.com', 'Open Pontevedra', 'NJ'),
('000014', '2019-11-18 08:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'correo7@mail.com', 'correo8@mail.com', 'Open Pontevedra', 'NJ'),
('000014', '2019-11-18 20:00:00', 'a@gmail.com', 'b@gmail.com', 'correo19@gmail.com', 'correo20@gmail.com', 'Open Pontevedra', 'NJ'),
('000014', '2019-11-19 00:00:00', 'a@gmail.com', 'b@gmail.com', 'correo17@gmail.com', 'correo18@gmail.com', 'Open Pontevedra', 'NJ'),
('000014', '2019-11-19 16:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'correo13@gmail.com', 'correo14@gmail.com', 'Open Pontevedra', 'NJ'),
('000014', '2019-11-19 20:00:00', 'correo17@gmail.com', 'correo18@gmail.com', 'correo11@mail.com', 'correo12@mail.com', 'Open Pontevedra', 'NJ'),
('000014', '2019-11-20 00:00:00', 'a@gmail.com', 'b@gmail.com', 'correo7@mail.com', 'correo8@mail.com', 'Open Pontevedra', 'NJ');

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
-- Estructura de tabla para la tabla `playoffs`
--

CREATE TABLE `playoffs` (
  `idPlayoff` int(11) NOT NULL,
  `miembro1Par1` varchar(50) NOT NULL,
  `miembro2Par1` varchar(50) NOT NULL,
  `miembro1Par2` varchar(50) NOT NULL,
  `miembro2Par2` varchar(50) NOT NULL,
  `nombreCamp` varchar(25) NOT NULL,
  `resultado` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `playoffs`
--

INSERT INTO `playoffs` (`idPlayoff`, `miembro1Par1`, `miembro2Par1`, `miembro1Par2`, `miembro2Par2`, `nombreCamp`, `resultado`) VALUES
(928, 'a@gmail.com', 'b@gmail.com', 'correo7@mail.com', 'correo8@mail.com', 'Open Pontevedra', 'NJ'),
(929, '', '', '', '', 'Open Pontevedra', 'NJ'),
(930, '', '', '', '', 'Open Pontevedra', 'NJ'),
(931, '', '', '', '', 'Open Pontevedra', 'NJ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `email` varchar(50) NOT NULL,
  `codigoPista` char(6) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`email`, `codigoPista`, `fecha`) VALUES
('trelo@gmail.com', '000008', '2019-11-27 10:00:00'),
('trelo@gmail.com', '000009', '2019-11-27 10:00:00');

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
-- Indices de la tabla `campeonato`
--
ALTER TABLE `campeonato`
  ADD PRIMARY KEY (`nombre`);

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
-- Indices de la tabla `escuelasdeportivas`
--
ALTER TABLE `escuelasdeportivas`
  ADD PRIMARY KEY (`nombre`,`horario`);

--
-- Indices de la tabla `inscripcionesclases`
--
ALTER TABLE `inscripcionesclases`
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
-- Indices de la tabla `playoffs`
--
ALTER TABLE `playoffs`
  ADD PRIMARY KEY (`idPlayoff`);

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
  MODIFY `idContenido` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `playoffs`
--
ALTER TABLE `playoffs`
  MODIFY `idPlayoff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=932;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `reserva_caduca` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-11-18 13:33:49' ON COMPLETION PRESERVE ENABLE DO DELETE FROM reservas WHERE UNIX_TIMESTAMP(fecha) < (UNIX_TIMESTAMP()-90*60)$$

CREATE DEFINER=`root`@`localhost` EVENT `no_mostrar_cpto` ON SCHEDULE EVERY 1 DAY STARTS '2019-11-18 13:45:31' ON COMPLETION PRESERVE ENABLE DO UPDATE campeonato SET estado = 'cerrado' WHERE UNIX_TIMESTAMP(fechaFinIns) <
(UNIX_TIMESTAMP())$$

CREATE DEFINER=`root`@`localhost` EVENT `cerrar_escuela` ON SCHEDULE EVERY 1 MINUTE STARTS '2018-12-02 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE escuelasdeportivas SET estado = 'cerrado' WHERE UNIX_TIMESTAMP(horario) < (UNIX_TIMESTAMP())$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
