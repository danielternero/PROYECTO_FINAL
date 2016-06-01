<?php
$connection->query("CREATE TABLE `conforma` (
  `FKID_PLAN` int(11) NOT NULL,
  `FKID_EJERCICIO` int(11) NOT NULL,
  `REPETICIONES` int(11) DEFAULT NULL,
  `TIEMPO_ESTIMADO` varchar(20) NOT NULL,
  `SERIES` int(11) DEFAULT NULL,
  `DIA_SEMANA` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

$connection->query("CREATE TABLE `ejercicios` (
  `ID_EJERCICIO` int(11) NOT NULL,
  `NOMBRE_EJER` varchar(30) DEFAULT NULL,
  `CLASIFICACION` varchar(20) NOT NULL,
  `REQUIERE_MAQUINA` varchar(10) NOT NULL,
  `FKID_INSTALACION` int(11) NOT NULL,
  `ENLACE` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


$connection->query("CREATE TABLE `instalaciones` (
  `ID_INSTALACION` int(11) NOT NULL,
  `SALA` varchar(20) NOT NULL,
  `PLANTA` varchar(20) NOT NULL,
  `HORA_APERTURA` time DEFAULT NULL,
  `HORA_CIERRE` time DEFAULT NULL,
  `direccion_imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


$connection->query("CREATE TABLE `plan` (
  `ID_PLAN` int(11) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FIN` date NOT NULL,
  `PESO_INICIO` int(11) NOT NULL,
  `PESO_FIN` int(11) NOT NULL,
  `TIPO` varchar(30) NOT NULL,
  `FKDNI` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


$connection->query("CREATE TABLE `usuario` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


$connection->query("INSERT INTO `usuario` (`DNI`, `NOMBRE`, `APELLIDO`, `FECHA_ALTA`, `EDAD`, `PESO`, `ENFERMEDAD`, `USUARIO`, `CORREO_ELECTRONICO`, `CONTRASENA`, `NIVEL_DE_USUARIO`, `IMAGEN_PERSONAL`) VALUES
('12345678D', 'DANIEL', 'MARTIN CORTES', '1991-01-31', 25, 64, NULL, 'daniel', 'danielo@gmail.com', 'fc6898a98a818685ba6c5280ed766942', 0, NULL);");

$connection->query("ALTER TABLE `conforma`
  ADD KEY `FKID_PLAN` (`FKID_PLAN`),
  ADD KEY `FKID_EJERCICIO` (`FKID_EJERCICIO`);");


$connection->query("ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`ID_EJERCICIO`),
  ADD KEY `FKID_INSTALACION` (`FKID_INSTALACION`);");

$connection->query("ALTER TABLE `instalaciones`
  ADD PRIMARY KEY (`ID_INSTALACION`);");

$connection->query("ALTER TABLE `plan`
  ADD PRIMARY KEY (`ID_PLAN`),
  ADD KEY `FKDNI` (`FKDNI`);");
?>