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
  `miembro1Par1` varchar(10) NOT NULL,
  `miembro2Par1` varchar(10) NOT NULL,
  `miembro1Par2` varchar(10) NOT NULL,
  `miembro2Par2` varchar(10) NOT NULL,
  `resultado` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

CREATE TABLE `pistas` (
  `codigoPista` char(6) NOT NULL,
  `tipo` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`codigoPista`);

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
