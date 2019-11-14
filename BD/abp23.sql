-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2019 a las 19:49:02
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
('', '0000-00-00 00:00:00', ''),
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
('Open AñoNUevo', '2020-01-01', '1', 'F', 'abierto'),
('Open Brais', '2019-12-08', '1', 'M', 'abierto'),
('Open Coruña', '2019-11-05', '2', 'M', 'abierto'),
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

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`miembro1`, `miembro2`, `nombreCamp`, `grupo`, `puntos`) VALUES
('brais@mail.com', 'marta@mail.com', 'Master Nacasa', '1', 22),
('brais@mail.com', 'marta@mail.com', 'Open AñoNUevo', '1', 22),
('brais@mail.com', 'marta@mail.com', 'Open Mail', '1', 22),
('brais@mail.com', 'marta@mail.com', 'Open Nacasa', '1', 22),
('brais@mail.com', 'marta@mail.com', 'Open Navidad', '1', 22),
('brais@mail.com', 'marta@mail.com', 'Open Prueba', '1', 22),
('brais@mail.com', 'marta@mail.com', 'Open Resa', '1', 22),
('brais@mail.com', 'marta@mail.com', 'Open Vigo', '1', 22),
('mail1@mail.com', 'mail2@mail.com', 'Open Ourense', '2', 16),
('trello@mail.com', 'oscar@mail.com', 'Open Coruña', '1', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `idContenido` int(6) NOT NULL,
  `titulo` varchar(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`idContenido`, `titulo`, `descripcion`) VALUES
(2, 'Prueba de ', 'Esto es otra oprueba de niticiaaaaa aaa aa '),
(3, 'Prueba 2', 'Esto es una noticia'),
(4, 'Prueba 3', 'Esto es una noticia'),
(5, 'Prueba 4', 'Esto es una noticia'),
(6, 'Prueba 5', 'Esto es una noticia'),
(7, 'Prueba 6', 'Esto es una noticia'),
(8, 'Prueba 7', 'Esto es una noticia'),
(9, 'Prueba 8', 'Esto es una noticia'),
(10, 'Prueba 9', 'Esto es una noticia'),
(11, 'Prueba 11', 'Esto es una noticia'),
(12, 'Prueba 12', 'Esto es una noticia');

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
('hey@mail.com', '2019-11-02 00:00:00', 'trelo@gmail.com', 'rachid1194@hotmail.com', 'Puesto vacio', 'Puesto vacio', 2, 'PROM'),
('rachid1194@hotmail.com', '2019-10-18 13:59:02', 'Puesto vacio', 'Puesto vacio', 'Puesto vacio', 'Puesto vacio', 0, 'OFER'),
('rachid1194@hotmail.com', '2019-10-18 16:59:02', 'Puesto vacio', 'trelo@gmail.com', 'Puesto vacio', 'Puesto vacio', 1, 'OFER'),
('trelo@gmail.com', '2019-10-18 13:59:02', 'trelo@gmail.com', 'Puesto vacio', 'Puesto vacio', 'Puesto vacio', 1, 'OFER'),
('trelo@gmail.com', '2019-11-04 00:00:00', 'trelo@gmail.com', 'Puesto vacio', 'Puesto vacio', 'Puesto vacio', 1, 'OFER');

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
('mail1@mail.com', '2019-10-31 00:00:00', 5, 'S'),
('mail1@mail.com', '2019-11-01 00:00:00', 5, 'S'),
('mail1@mail.com', '2019-11-02 00:00:00', 5, 'S'),
('mail1@mail.com', '2019-11-03 00:00:00', 5, 'S'),
('mail1@mail.com', '2019-11-04 00:00:00', 5, 'S'),
('mail1@mail.com', '2019-11-05 00:00:00', 5, 'S'),
('mail1@mail.com', '2019-11-06 00:00:00', 5, 'S'),
('mail1@mail.com', '2019-11-07 00:00:00', 5, 'S'),
('mail1@mail.com', '2019-11-08 00:00:00', 5, 'S'),
('rachid1194@hotmail.com', '2019-10-22 19:00:55', 25, 'S'),
('rachid1194@hotmail.com', '2019-10-22 19:03:50', 50, 'S'),
('rachid1194@hotmail.com', '2019-10-22 19:04:15', 60, 'S'),
('trelo@gmail.com', '2019-10-22 19:15:39', 25, 'S');

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
('rachid1194@hotmail.com', 'raul@mail.com', 'Open Mail');

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
('000001', '2019-01-11 00:00:00', 'mail1@mail.com', 'mail2@mail.com', 'brais@mail.com', 'oscar@mail.com', 'Open Vigo', 'P2'),
('000001', '2019-10-31 00:00:00', 'mail1@mail.com', 'mail2@mail.com', 'brais@mail.com', 'oscar@mail.com', 'Open Coruña', 'P1'),
('1', '2019-10-31 00:00:00', 'mail@mail.com', 'mail2@mail.com', 'raul@mail.com', 'oscar@mail.com', 'Open Ourense', 'P1'),
('1', '2019-11-01 00:00:00', 'mail@mail.com', 'mail2@mail.com', 'raul@mail.com', 'oscar@mail.com', 'Open Ourense', 'P1'),
('1', '2019-11-03 00:00:00', 'mail@mail.com', 'mail2@mail.com', 'raul@mail.com', 'oscar@mail.com', 'Open Ourense', 'P1'),
('1', '2019-11-04 00:00:00', 'mail@mail.com', 'mail2@mail.com', 'raul@mail.com', 'oscar@mail.com', 'Open Ourense', 'P1'),
('1', '2019-11-05 00:00:00', 'mail@mail.com', 'mail2@mail.com', 'raul@mail.com', 'oscar@mail.com', 'Open Ourense', 'P1'),
('1', '2019-11-06 00:00:00', 'mail@mail.com', 'mail2@mail.com', 'raul@mail.com', 'oscar@mail.com', 'Open Ourense', 'P1'),
('2', '2019-10-31 00:00:00', 'mail@mail.com', 'mail2@mail.com', 'raul@mail.com', 'oscar@mail.com', 'Open Ourense', 'P1'),
('3', '2019-11-02 00:00:00', 'mail@mail.com', 'mail2@mail.com', 'raul@mail.com', 'oscar@mail.com', 'Open Ourense', 'P1');

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

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`codigoPista`, `fecha`, `miembro1Par1`, `miembro2Par1`, `miembro1Par2`, `miembro2Par2`, `resultado`) VALUES
('000000', '2019-10-18 15:59:02', 'trelo@gmail.com', 'trelo@gmail.com', 'trelo@gmail.com', 'trelo@gmail.com', 'NJ');

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
('000000', '2019-10-18 13:59:02', 'EXT'),
('000000', '2019-10-18 14:59:02', 'EXT'),
('000000', '2019-10-18 15:59:02', 'EXT'),
('000001', '2019-10-18 13:59:02', 'EXT'),
('000001', '2019-10-18 16:59:02', 'EXT'),
('000002', '2019-10-31 00:00:00', 'EXT'),
('000003', '2019-10-31 00:00:00', 'EXT'),
('000003', '2019-11-01 00:00:00', 'EXT'),
('000003', '2019-11-02 00:00:00', 'EXT'),
('000003', '2019-11-03 00:00:00', 'EXT'),
('000003', '2019-11-04 00:00:00', 'EXT'),
('000003', '2019-11-06 00:00:00', 'EXT'),
('000004', '2019-10-31 00:00:00', 'EXT'),
('000004', '2019-11-01 00:00:00', 'EXT'),
('000004', '2019-11-02 00:00:00', 'EXT'),
('000005', '2019-11-01 00:00:00', 'EXT'),
('000005', '2019-11-02 00:00:00', 'EXT'),
('000005', '2019-11-03 00:00:00', 'EXT'),
('000006', '2019-11-01 00:00:00', 'EXT'),
('000006', '2019-11-02 00:00:00', 'EXT'),
('000006', '2019-11-13 00:00:00', 'EXT'),
('000006', '2019-11-22 00:00:00', 'INT');

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
('trelo@gmail.com', '000000', '2019-10-18 13:59:02'),
('trelo@gmail.com', '000000', '2019-10-18 14:59:02');

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
('coruña@mail.com', '1234', 'coruña', 'Ponte Baquero', 'E', 'M'),
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
  MODIFY `idContenido` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
