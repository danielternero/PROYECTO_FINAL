-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2016 a las 00:46:07
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

--
-- Volcado de datos para la tabla `conforma`
--

INSERT INTO `conforma` (`FKID_PLAN`, `FKID_EJERCICIO`, `REPETICIONES`, `TIEMPO_ESTIMADO`, `SERIES`, `DIA_SEMANA`) VALUES
(1, 0, NULL, '20MINUTOS', NULL, 'LUNES'),
(1, 2, NULL, '35MINUTOS', NULL, 'MIERCOLES'),
(1, 1, NULL, '30MINUTOS', NULL, 'VIERNES'),
(2, 6, 10, '5min', 4, 'LUNES'),
(2, 7, 4, '6min', 4, 'MIERCOLES');

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
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`ID_EJERCICIO`, `NOMBRE_EJER`, `CLASIFICACION`, `REQUIERE_MAQUINA`, `FKID_INSTALACION`, `ENLACE`) VALUES
(0, 'MARCHA', 'CARDIO', 'NO', 0, 'http://res.trainingymapp.com/ejercicios/VideosMP4/186.mp4'),
(1, 'ELIPTICA', 'CARDIO', 'SI', 4444, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/499.mp4'),
(2, 'CINTA', 'CARDIO', 'SI', 4444, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/188.mp4'),
(3, 'BICICLETA ESTATICA', 'CARDIO', 'SI', 4444, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/23.mp4'),
(4, 'ERGONOMETRO', 'CARDIO', 'SI', 4444, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/27.mp4'),
(5, 'SPINNING', 'CARDIO', 'SI', 3333, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/340.mp4'),
(6, 'CLUB RUNNING ', 'CARDIO', 'NO', 0, 'http://res.trainingymapp.com/ejercicios/VideosMP4/187.mp4'),
(7, 'PRESS BANCA PLANO', 'PESO LIBRE', 'NO', 4444, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/39.mp4'),
(8, 'PRESS BANCA INCLINADO', 'PESO LIBRE', 'NO', 4444, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/41.mp4'),
(9, 'APERTURA DE PECHO PLANA', 'PESO LIBRE', 'NO', 4444, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/37.mp4'),
(10, 'PECHO DECLINADO', 'PESO LIBRE', 'NO', 4444, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/166.mp4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones`
--

CREATE TABLE `instalaciones` (
  `ID_INSTALACION` int(11) NOT NULL,
  `SALA` varchar(20) NOT NULL,
  `PLANTA` varchar(20) NOT NULL,
  `HORA_APERTURA` time DEFAULT NULL,
  `HORA_CIERRE` time DEFAULT NULL,
  `direccion_imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instalaciones`
--

INSERT INTO `instalaciones` (`ID_INSTALACION`, `SALA`, `PLANTA`, `HORA_APERTURA`, `HORA_CIERRE`, `direccion_imagen`) VALUES
(0, 'PISTA DE ATLETISMO', 'EXTERIOR', '06:00:00', '23:00:00', '../img/instalaciones/running.jpg'),
(1111, 'PISCINA', '0 BAJA ', '06:00:00', '22:30:00', '../img/instalaciones/piscina.jpg'),
(2222, 'ACTI DIRIGIDAS', 'PLANTA 2', '07:00:00', '22:00:00', '../img/instalaciones/actividadesdirigidas.jpg'),
(3333, 'CARDIO', 'PLANTA 3', '06:00:00', '23:00:00', '../img/instalaciones/cardio.jpg'),
(4444, 'SALA FITNESS', 'PLANTA 4', '06:00:00', '23:00:00', '../img/instalaciones/sala_fitness.jpg');

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
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`ID_PLAN`, `FECHA_INICIO`, `FECHA_FIN`, `PESO_INICIO`, `PESO_FIN`, `TIPO`, `FKDNI`) VALUES
(1, '2016-01-13', '2016-02-13', 80, 78, 'DEFINICION', '28565741B'),
(2, '2016-01-31', '2016-03-02', 50, 51, 'AUMENTO MASA MUSCULAR', '28125485B');

-- --------------------------------------------------------

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
  `IMAGEN_PERSONAL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`DNI`, `NOMBRE`, `APELLIDO`, `FECHA_ALTA`, `EDAD`, `PESO`, `ENFERMEDAD`, `USUARIO`, `CORREO_ELECTRONICO`, `CONTRASENA`, `NIVEL_DE_USUARIO`, `IMAGEN_PERSONAL`) VALUES
('28125485B', 'LAURA', 'MEDINA OLMEDO', '2016-01-31', 21, 51, NULL, 'laura', 'lauragym@gmail.com', '4081c9f832bcafb64e328c4488d6d1e4', 1, '../img/fotos_personal/laura.jpg'),
('28565741B', 'EDUARDO', 'GOMEZ LOPEZ', '2016-01-13', 40, 85, NULL, 'eduardo', 'eduardogym@gmail.com', 'b4d3f76ec840f007bf76999c08976a2c', 1, '../img/fotos_personal/eduardo.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conforma`
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
