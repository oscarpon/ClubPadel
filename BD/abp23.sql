-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2020 a las 18:46:31
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
('Open noob1X', '2020-02-21', '1', 'X', 'abierto'),
('Open padel2M', '2020-01-31', '2', 'M', 'abierto'),
('Open padel2X', '2020-01-31', '2', 'X', 'abierto'),
('Open padel3M', '2020-01-31', '3', 'M', 'abierto'),
('Open padel3X', '2020-01-31', '3', 'X', 'abierto'),
('Open Pontevedra', '2020-02-02', '3', 'F', 'abierto');

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
(57, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(58, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(59, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(60, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(61, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(62, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com'),
(63, 'Nuevo pago', 'Nuevo pago de reserva pendiente', 'trelo@gmail.com');

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
('Reves de federer', '2020-02-10 18:03:18', 'lola@mail.com', '000001', 3, 1, 2, 'abierto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcionesclases`
--

CREATE TABLE `inscripcionesclases` (
  `nombre` varchar(50) NOT NULL,
  `horario` datetime NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcionesclases`
--

INSERT INTO `inscripcionesclases` (`nombre`, `horario`, `email`) VALUES
('Reves de federer', '2020-02-10 18:03:18', 'lola@mail.com'),
('Reves de federer', '2020-02-10 18:03:18', 'trelo@gmail.com'),
('Reves de federer', '2020-02-17 18:03:18', 'trelo@gmail.com'),
('Reves de federer', '2020-02-24 18:03:18', 'trelo@gmail.com');

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
('brmartinez@esei.uvigo.es', '2020-01-26 14:00:00', 'trelo@gmail.com', 'Puesto vacio', 'Puesto vacio', 'Puesto vacio', 1, 'PROM'),
('brmartinez@esei.uvigo.es', '2020-02-22 16:00:00', 'albino@mail.com', 'raul@mail.com', 'hulio@gmail.com', 'Puesto vacio', 3, 'PROM');

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
('albino@mail.com', '2020-01-23 18:45:13', 12, 'N'),
('hulio@gmail.com', '2020-01-23 18:46:16', 12, 'N'),
('rachid1194@hotmail.com', '2020-01-23 18:18:32', 55, 'N'),
('raul@mail.com', '2020-01-23 18:45:46', 12, 'N'),
('trelo@gmail.com', '2020-01-23 18:17:30', 25, 'S'),
('trelo@gmail.com', '2020-01-23 18:18:22', 32, 'N'),
('trelo@gmail.com', '2020-01-23 18:19:59', 35, 'N'),
('trelo@gmail.com', '2020-01-23 18:20:28', 35, 'N'),
('trelo@gmail.com', '2020-01-23 18:20:33', 35, 'N'),
('trelo@gmail.com', '2020-01-23 18:20:45', 35, 'N'),
('trelo@gmail.com', '2020-01-23 18:20:49', 35, 'N'),
('trelo@gmail.com', '2020-01-23 18:20:52', 35, 'N'),
('trelo@gmail.com', '2020-01-23 18:20:56', 35, 'N'),
('trelo@gmail.com', '2020-01-23 18:21:16', 30, 'N'),
('trelo@gmail.com', '2020-01-23 18:21:21', 30, 'N'),
('trelo@gmail.com', '2020-01-23 18:21:46', 12, 'N'),
('trelo@gmail.com', '2020-01-23 18:21:53', 12, 'N'),
('trelo@gmail.com', '2020-01-23 18:24:39', 25, 'N'),
('trelo@gmail.com', '2020-01-23 18:24:51', 25, 'N'),
('trelo@gmail.com', '2020-01-23 18:25:02', 25, 'N');

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
('trelo@gmail.com', 'marta@mail.com', 'Open Pontevedra'),
('trelo@gmail.com', 'rachid1194@hotmail.com', 'Open noob1X'),
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
('000000', '2020-01-25 18:00:00', 'INT'),
('000000', '2020-01-25 20:00:00', 'INT'),
('000000', '2020-01-26 14:00:00', 'EXT'),
('000000', '2020-01-27 16:00:00', 'EXT'),
('000001', '2020-01-30 14:00:00', 'INT'),
('000001', '2020-01-30 17:00:00', 'INT'),
('000001', '2020-02-02 14:00:00', 'EXT'),
('000002', '2020-02-02 19:00:00', 'INT'),
('000002', '2020-02-03 09:00:00', 'INT'),
('000002', '2020-02-04 10:00:00', 'EXT'),
('000003', '2020-02-05 09:00:00', 'INT'),
('000003', '2020-02-06 11:00:00', 'EXT'),
('000003', '2020-02-10 09:00:00', 'INT'),
('000003', '2020-02-10 15:00:00', 'EXT'),
('000004', '2020-02-10 13:00:00', 'EXT'),
('000004', '2020-02-22 16:00:00', 'INT'),
('000004', '2020-02-23 10:00:00', 'EXT'),
('000004', '2020-02-23 18:00:00', 'EXT'),
('000008', '2020-02-23 18:00:00', 'INT'),
('000008', '2020-02-24 10:00:00', 'INT'),
('000008', '2020-02-24 17:00:00', 'EXT'),
('000008', '2020-02-25 12:00:00', 'INT'),
('000008', '2020-02-27 10:00:00', 'EXT'),
('000008', '2020-02-27 16:00:00', 'EXT'),
('000009', '2020-03-01 19:00:00', 'EXT'),
('000009', '2020-03-03 10:00:00', 'INT'),
('000009', '2020-03-03 15:00:00', 'INT'),
('000009', '2020-03-03 16:00:00', 'INT'),
('000009', '2020-03-04 10:00:00', 'EXT');

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
('trelo@gmail.com', '000002', '2020-02-02 19:00:00'),
('trelo@gmail.com', '000002', '2020-02-03 09:00:00'),
('trelo@gmail.com', '000003', '2020-02-05 09:00:00'),
('trelo@gmail.com', '000003', '2020-02-06 11:00:00');

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
('faderer@gmail.com', 'rager', 'rager', 'fadorer', 'D', 'F'),
('hey@mail.com', '1234', 'hey', 'Ponte Baquero', 'A', 'M'),
('hulio@gmail.com', 'hulio', 'hulio', 'raquetas', 'D', 'M'),
('lola@mail.com', '1234', 'lola', 'Ponte Baquero', 'E', 'M'),
('mail1@mail.com', '1234', 'Oscar', 'Ponte Baquero', 'D', 'M'),
('mail2@mail.com', '1234', 'Brais', 'Ponte Baquero', 'D', 'M'),
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
  MODIFY `idContenido` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `playoffs`
--
ALTER TABLE `playoffs`
  MODIFY `idPlayoff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=932;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `cerrar_escuela` ON SCHEDULE EVERY 1 MINUTE STARTS '2018-12-02 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE escuelasdeportivas SET estado = 'cerrado' WHERE UNIX_TIMESTAMP(horario) < (UNIX_TIMESTAMP())$$

CREATE DEFINER=`root`@`localhost` EVENT `reserva_caduca` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-11-18 13:33:49' ON COMPLETION PRESERVE ENABLE DO DELETE FROM reservas WHERE UNIX_TIMESTAMP(fecha) < (UNIX_TIMESTAMP()-90*60)$$

CREATE DEFINER=`root`@`localhost` EVENT `no_mostrar_cpto` ON SCHEDULE EVERY 1 DAY STARTS '2019-11-18 13:45:31' ON COMPLETION PRESERVE ENABLE DO UPDATE campeonato SET estado = 'cerrado' WHERE UNIX_TIMESTAMP(fechaFinIns) <
(UNIX_TIMESTAMP())$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
