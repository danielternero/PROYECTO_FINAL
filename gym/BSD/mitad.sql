-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2016 a las 16:45:09
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `danigym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conforma`
--

CREATE TABLE `conforma` (
  `FKID_PLAN` int(11) NOT NULL,
  `FKID_EJERCICIO` int(11) NOT NULL,
  `REPETICIONES` int(11) DEFAULT NULL,
  `TIEMPO_ESTIMADO` varchar(20) NOT NULL,
  `SERIES` int(11) DEFAULT NULL,
  `DIA_SEMANA` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `ID_EJERCICIO` int(11) NOT NULL,
  `NOMBRE_EJER` varchar(30) DEFAULT NULL,
  `CLASIFICACION` varchar(20) NOT NULL,
  `REQUIERE_MAQUINA` varchar(10) NOT NULL,
  `FKID_INSTALACION` int(11) NOT NULL,
  `ENLACE` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--

CREATE TABLE `instalaciones` (
  `ID_INSTALACION` int(11) NOT NULL,
  `SALA` varchar(20) NOT NULL,
  `PLANTA` varchar(20) NOT NULL,
  `HORA_APERTURA` time DEFAULT NULL,
  `HORA_CIERRE` time DEFAULT NULL,
  `DIRECCION_IMAGEN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `instalaciones` (`ID_INSTALACION`, `SALA`, `PLANTA`, `HORA_APERTURA`, `HORA_CIERRE`, `DIRECCION_IMAGEN`) VALUES
(0, 'PISTA DE ATLETISMO', 'EXTERIOR', '06:00:00', '23:00:00', '../img/instalaciones/running.jpg'),
(1, 'PISCINA', '0 BAJA ', '06:00:00', '22:30:00', '../img/instalaciones/piscina.jpg'),
(2, 'ACTI DIRIGIDAS', 'PLANTA 2', '07:00:00', '22:00:00', '../img/instalaciones/actividadesdirigidas.jpg'),
(3, 'CARDIO', 'PLANTA 3', '06:00:00', '23:00:00', '../img/instalaciones/cardio.jpg'),
(4, 'SALA FITNESS', 'PLANTA 4', '06:00:00', '23:00:00', '../img/instalaciones/sala_fitness.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `ID_PLAN` int(11) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FIN` date NOT NULL,
  `PESO_INICIO` int(11) NOT NULL,
  `PESO_FIN` int(11) NOT NULL,
  `TIPO` varchar(30) NOT NULL,
  `FKDNI` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `DNI` varchar(9) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `APELLIDO` varchar(25) NOT NULL,
  `FECHA_ALTA` date NOT NULL,
  `EDAD` int(11) NOT NULL,
  `PESO` int(11) NOT NULL,
  `ENFERMEDAD` varchar(200) DEFAULT NULL,
  `USUARIO` varchar(20) NOT NULL,
  `CORREO_ELECTRONICO` varchar(50) NOT NULL,
  `CONTRASENA` varchar(64) DEFAULT NULL,
  `NIVEL_DE_USUARIO` tinyint(1) NOT NULL,
  `IMAGEN_PERSONAL` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`DNI`, `NOMBRE`, `APELLIDO`, `FECHA_ALTA`, `EDAD`, `PESO`, `ENFERMEDAD`, `USUARIO`, `CORREO_ELECTRONICO`, `CONTRASENA`, `NIVEL_DE_USUARIO`, `IMAGEN_PERSONAL`) VALUES
('12345678D', 'DANIEL', 'MARTIN CORTES', '1991-01-31', 25, 64, NULL, 'daniel', 'danielo@gmail.com', 'fc6898a98a818685ba6c5280ed766942', 0, NULL);


--
ALTER TABLE `conforma`
  ADD KEY `FKID_PLAN` (`FKID_PLAN`),
  ADD KEY `FKID_EJERCICIO` (`FKID_EJERCICIO`);

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`ID_EJERCICIO`),
  ADD KEY `FKID_INSTALACION` (`FKID_INSTALACION`);

--
-- Indices de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD PRIMARY KEY (`ID_INSTALACION`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`ID_PLAN`),
  ADD KEY `FKDNI` (`FKDNI`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`DNI`),
  ADD UNIQUE KEY `USUARIO` (`USUARIO`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conforma`
--
ALTER TABLE `conforma`
  ADD CONSTRAINT `conforma_ibfk_1` FOREIGN KEY (`FKID_PLAN`) REFERENCES `plan` (`ID_PLAN`),
  ADD CONSTRAINT `conforma_ibfk_2` FOREIGN KEY (`FKID_EJERCICIO`) REFERENCES `ejercicios` (`ID_EJERCICIO`);

--
-- Filtros para la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD CONSTRAINT `ejercicios_ibfk_1` FOREIGN KEY (`FKID_INSTALACION`) REFERENCES `instalaciones` (`ID_INSTALACION`);

--
-- Filtros para la tabla `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`FKDNI`) REFERENCES `usuario` (`DNI`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
