$connection->query("CREATE TABLE `conforma` (
  `FKID_PLAN` int(11) NOT NULL,
  `FKID_EJERCICIO` int(11) NOT NULL,
  `REPETICIONES` int(11) DEFAULT NULL,
  `TIEMPO_ESTIMADO` varchar(20) NOT NULL,
  `SERIES` int(11) DEFAULT NULL,
  `DIA_SEMANA` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");



$connection->query("INSERT INTO `conforma` (`FKID_PLAN`, `FKID_EJERCICIO`, `REPETICIONES`, `TIEMPO_ESTIMADO`, `SERIES`, `DIA_SEMANA`) VALUES
(0, 2, 12, '23:12:02', 12, 'LUNES'),
(0, 31, 123, '12:33:33', 12, 'MARTES'),
(1, 30, 0, '01:00', 0, 'MARTES'),
(1, 39, 0, '01:00', 0, 'MIERCOLES'),
(1, 7, 10, '00:01', 4, 'JUEVES'),
(2, 7, 10, '00:01', 4, 'LUNES'),
(2, 17, 10, '00:01', 4, 'LUNES'),
(2, 32, 0, '00:45', 0, 'MARTES'),
(2, 15, 10, '00:01', 4, 'MIERCOLES'),
(2, 11, 10, '00:01', 4, 'MIERCOLES'),
(2, 22, 4, '00:20', 0, 'JUEVES'),
(2, 20, 10, '00:01', 4, 'VIERNES');");



$connection->query("CREATE TABLE `ejercicios` (
  `ID_EJERCICIO` int(11) NOT NULL,
  `NOMBRE_EJER` varchar(30) DEFAULT NULL,
  `CLASIFICACION` varchar(20) NOT NULL,
  `REQUIERE_MAQUINA` varchar(10) NOT NULL,
  `FKID_INSTALACION` int(11) NOT NULL,
  `ENLACE` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


$connection->query("INSERT INTO `ejercicios` (`ID_EJERCICIO`, `NOMBRE_EJER`, `CLASIFICACION`, `REQUIERE_MAQUINA`, `FKID_INSTALACION`, `ENLACE`) VALUES
(0, 'SALTO DE COMBA', 'PESO LIBRE', 'NO', 4, 'http://res.trainingymapp.com/ejercicios/VideosMP4/869.mp4'),
(1, 'ELIPTICA', 'CARDIO', 'SI', 4, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/499.mp4'),
(2, 'CINTA', 'CARDIO', 'SI', 4, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/188.mp4'),
(3, 'BICICLETA ESTATICA', 'CARDIO', 'SI', 4, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/23.mp4'),
(4, 'ERGONOMETRO ', 'CARDIO', 'SI', 4, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/27.mp4'),
(5, 'SPINNING', 'CARDIO', 'SI', 3, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/340.mp4'),
(6, 'CLUB RUNNING ', 'CARDIO', 'NO', 0, 'http://res.trainingymapp.com/ejercicios/VideosMP4/187.mp4'),
(7, 'PRESS BANCA PLANO', 'PESO LIBRE', 'NO', 4, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/39.mp4'),
(8, 'PRESS BANCA INCLINADO', 'PESO LIBRE', 'NO', 4, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/41.mp4'),
(9, 'APERTURA DE PECHO PLANA', 'PESO LIBRE', 'NO', 4, 'http://trainingymapp.com/admin/resources/comunes/ejercicios/VideosMP4/37.mp4'),
(11, 'ESPALDA JALON', 'MAQUINA', 'SI', 4, 'http://res.trainingymapp.com/ejercicios/VideosMP4/192.mp4'),
(12, 'DOMINADAS', 'PESO LIBRE', 'NO', 4, 'http://res.trainingymapp.com/ejercicios/VideosMP4/29.mp4'),
(13, 'REMO', 'MAQUINA', 'SI', 4, 'http://res.trainingymapp.com/ejercicios/VideosMP4/181.mp4'),
(14, 'CURL BICEPS', 'PESO LIBRE', 'NO', 4, 'http://res.trainingymapp.com/ejercicios/VideosMP4/361.mp4'),
(15, 'BICEPS ', 'MAQUINA', 'SI', 4, 'http://res.trainingymapp.com/ejercicios/VideosMP4/75.mp4'),
(16, 'TRICEPS PRESS FRANCES', 'PESO LIBRE', 'NO', 4, 'http://res.trainingymapp.com/ejercicios/VideosMP4/126.mp4'),
(17, 'TRICEPS POLEA', 'MAQUINA', 'SI', 4, 'http://res.trainingymapp.com/ejercicios/VideosMP4/216.mp4'),
(18, 'EXTENSION DE CUADRICEPS ', 'MAQUINA', 'SI', 4, 'http://res.trainingymapp.com/ejercicios/VideosMP4/3.mp4'),
(19, 'EXTENSION DE ISQUIOTIBIALES', 'MAQUINA', 'SI', 4, 'http://res.trainingymapp.com/ejercicios/VideosMP4/671.mp4'),
(20, 'PRESS HOMBROS', 'PESO LIBRE', 'NO', 4, 'http://res.trainingymapp.com/ejercicios/VideosMP4/102.mp4'),
(21, 'ELEVACION LATERALES HOMBROS', 'MAQUINA', 'SI', 4, 'http://res.trainingymapp.com/ejercicios/VideosMP4/97.mp4'),
(22, 'CROL', 'PISCINA', 'NO', 1, ''),
(23, 'ESPALDA', 'PISCINA', 'NO', 1, NULL),
(24, 'BRAZA', 'PISCINA', 'NO', 1, NULL),
(25, 'MARIPOSA', 'PISCINA', 'NO', 1, NULL),
(26, 'BODY PUM', 'ACT DIRIGIDAS', 'NO', 2, NULL),
(27, 'BODY COMBAT', 'ACT DIRIGIDAS', 'NO', 2, NULL),
(28, 'GAP', 'ACT DIRIGIDAS', 'NO', 2, NULL),
(29, 'PILATES', 'ACT DIRIGIDAS', 'NO', 2, NULL),
(30, 'YOGA', 'ACT DIRIGIDAS', 'NO', 2, NULL),
(31, 'ZUMBA', 'ACT DIRIGIDAS', 'NO', 2, NULL),
(32, 'CROSSFIT', 'ACT DIRIGIDAS', 'NO', 2, NULL),
(34, 'STEP', 'ACT DIRIGIDAS', 'NO', 2, NULL),
(35, 'PIES DE CROL', 'PISCINA', 'NO', 1, NULL),
(36, 'PIES DE ESPALDA', 'PISCINA', 'NO', 1, NULL),
(37, 'PUNTO MUERTO CROL', 'PISCINA', 'NO', 1, NULL),
(38, 'PUNTO MUERTO ESPALDA', 'PISCINA', 'NO', 1, NULL),
(39, 'SPARRING', 'CARDIO', 'NO', 3, NULL),
(40, 'FOOTING', 'CARDIO', 'NO', 3, NULL),
(41, 'LUMBARES', 'MAQUINA', 'NO', 4, NULL);");



$connection->query("CREATE TABLE `instalaciones` (
  `ID_INSTALACION` int(11) NOT NULL,
  `SALA` varchar(20) NOT NULL,
  `PLANTA` varchar(20) NOT NULL,
  `HORA_APERTURA` time DEFAULT NULL,
  `HORA_CIERRE` time DEFAULT NULL,
  `direccion_imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


$connection->query("INSERT INTO `instalaciones` (`ID_INSTALACION`, `SALA`, `PLANTA`, `HORA_APERTURA`, `HORA_CIERRE`, `direccion_imagen`) VALUES
(0, 'PISTA DE ATLETISMO', 'EXTERIOR', '06:00:00', '23:00:00', '../img/instalaciones/running.jpg'),
(1, 'PISCINA', '0 BAJA ', '06:00:00', '22:30:00', '../img/instalaciones/piscina.jpg'),
(2, 'ACTI DIRIGIDAS', 'PLANTA 2', '07:00:00', '22:00:00', '../img/instalaciones/actividadesdirigidas.jpg'),
(3, 'CARDIO', 'PLANTA 3', '06:00:00', '23:00:00', '../img/instalaciones/cardio.jpg'),
(4, 'SALA FITNESS', 'PLANTA 4', '06:00:00', '23:00:00', '../img/instalaciones/sala_fitness.jpg');");


$connection->query("CREATE TABLE `plan` (
  `ID_PLAN` int(11) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FIN` date NOT NULL,
  `PESO_INICIO` int(11) NOT NULL,
  `PESO_FIN` int(11) NOT NULL,
  `TIPO` varchar(30) NOT NULL,
  `FKDNI` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");



$connection->query("INSERT INTO `plan` (`ID_PLAN`, `FECHA_INICIO`, `FECHA_FIN`, `PESO_INICIO`, `PESO_FIN`, `TIPO`, `FKDNI`) VALUES
(0, '0056-05-07', '0000-00-00', 56, 56, 'AUMENTO MASAMUSCULAR', '11111111A'),
(1, '2016-04-23', '2017-05-26', 89, 91, 'AUMENTO MASAMUSCULAR', '22222222A'),
(2, '2016-05-30', '2016-06-30', 0, 0, 'AUMENTO MASAMUSCULAR', '00000000X');");



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

$connection->query("INSERT INTO `usuario` (`DNI`, `NOMBRE`, `APELLIDO`, `FECHA_ALTA`, `EDAD`, `PESO`, `ENFERMEDAD`, `USUARIO`, `CORREO_ELECTRONICO`, `CONTRASENA`, `NIVEL_DE_USUARIO`, `IMAGEN_PERSONAL`) VALUES
('11111111A', 'JUAN DIEGO', 'PEREZ', '2016-05-25', 34, 86, '', 'juan', 'pekechis@gmail.com', 'a94652aa97c7211ba8954dd15a3cf838', 1, NULL):");