-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2019 a las 17:53:42
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

DROP DATABASE IF EXISTS `abp23`;
CREATE DATABASE `abp23` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

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
  `nombre` varchar(20) NOT NULL,
  `horario` datetime(6) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeonato`
--

CREATE TABLE `campeonato` (
  `nombre` varchar(25) NOT NULL,
  `fechaFinIns` date NOT NULL,
  `categoria` char(1) NOT NULL,
  `genero` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasesformativas`
--

CREATE TABLE `clasesformativas` (
  `nombre` varchar(20) NOT NULL,
  `horario` datetime(6) NOT NULL,
  `entrenador` varchar(20) NOT NULL,
  `codigoPista` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `miembro1` varchar(10) NOT NULL,
  `miembro2` varchar(10) NOT NULL,
  `nombreCamp` varchar(25) NOT NULL,
  `grupo` char(1) NOT NULL,
  `puntos` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `idContenido` char(6) NOT NULL,
  `titulo` varchar(10) NOT NULL,
  `descripcion` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incripcionesclases`
--

CREATE TABLE `incripcionesclases` (
  `nombre` varchar(20) NOT NULL,
  `horario` datetime(6) NOT NULL,
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
('rachid1194@hotmail.com', '2019-10-20 18:46:54', 'rachid1194@hotmail.com', 'Puesto vacio', 'Puesto vacio', 'Puesto vacio', 4, 'OFER'),
('rachid1194@hotmail.com', '2019-10-20 18:47:14', 'rachid1194@hotmail.com', 'Puesto vacio', 'Puesto vacio', 'Puesto vacio', 1, 'OFER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas`
--

CREATE TABLE `parejas` (
  `miembro1` varchar(10) NOT NULL,
  `miembro2` varchar(10) NOT NULL,
  `capitan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partcampeonatos`
--

CREATE TABLE `partcampeonatos` (
  `miembro1` varchar(10) NOT NULL,
  `miembro2` varchar(10) NOT NULL,
  `nombreCamp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidocamp`
--

CREATE TABLE `partidocamp` (
  `codigoPista` char(6) NOT NULL,
  `fecha` datetime(6) NOT NULL,
  `miembro1Par1` varchar(10) NOT NULL,
  `miembro2Par1` varchar(10) NOT NULL,
  `miembro1Par2` varchar(10) NOT NULL,
  `miembro2Par2` varchar(10) NOT NULL,
  `nombreCamp` varchar(25) NOT NULL,
  `resultado` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `codigoPista` char(6) NOT NULL,
  `fecha` datetime(6) NOT NULL,
  `miembro1Par1` varchar(50) NOT NULL,
  `miembro2Par1` varchar(50) NOT NULL,
  `miembro1Par2` varchar(50) NOT NULL,
  `miembro2Par2` varchar(50) NOT NULL,
  `resultado` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`codigoPista`, `fecha`, `miembro1Par1`, `miembro2Par1`, `miembro1Par2`, `miembro2Par2`, `resultado`) VALUES
('000000', '2019-10-18 13:59:02.000000', '', '', '', '', 'NJ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

CREATE TABLE `pistas` (
  `codigoPista` char(6) NOT NULL,
  `fecha` datetime(6) NOT NULL,
  `tipo` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`codigoPista`, `fecha`, `tipo`) VALUES
('000000', '2019-10-18 13:59:02.000000', 'EXT'),
('000000', '2019-10-18 14:59:02.000000', 'EXT'),
('000000', '2019-10-18 15:59:02.000000', 'EXT'),
('000001', '2019-10-18 13:59:02.000000', 'EXT'),
('000001', '2019-10-18 16:59:02.000000', 'EXT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `email` varchar(50) NOT NULL,
  `codigoPista` char(6) NOT NULL,
  `fecha` datetime(6) NOT NULL
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
  `genero` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `password`, `nombre`, `apellidos`, `rol`, `genero`) VALUES
('brmartinez@esei.uvigo.es', 'hola', 'Brais', 'RM', 'A', 'Mascul'),
('rachid1194@hotmail.com', 'm', 'h', 'r', 'D', 'M');

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
  ADD PRIMARY KEY (`email`,`codigoPista`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
