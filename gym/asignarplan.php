<?php
include_once("./configuraciondb.php");
session_start();

if (!isset($_SESSION["user"])) {
          header("location: Proyecto1.php");
}
if ($_SESSION["nivel"]==1) {
            
            header("location: Proyecto1.php");
          } 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="usuario.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>
    <link href='https://fonts.googleapis.com/css?family=Raleway:500,600' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
 	  $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
      $consulta=$connection->query("select * from usuario where usuario.DNI='".$_GET['id']."';");
     while($obj = $consulta->fetch_object()){
	 
	 $dni=$obj->DNI;
}
//PARA QUE EL ID PLAN SE PONGA AUTOMATICAMENTE EL SIGUIENTE
 $consulta2=$connection->query("select ID_PLAN from plan order by ID_PLAN DESC LIMIT 1");
     while($obj = $consulta2->fetch_object()){
	 
	 $idplan=$obj->ID_PLAN;
	$idplan=$idplan+1;
	 }
if (isset($_POST['FECHA_INICIO'])){
		
        $fechaini=$_POST["FECHA_INICIO"];
        $fechafin=$_POST["FECHA_FIN"];
        $pesoini=$_POST["PESO_INICIO"];
        $pesofin=$_POST["PESO_FIN"];
        $tipo=$_POST["TIPO"];
        $ejercicios=$_POST["EJERCICIO"];
        $repeticiones=$_POST["REPETICIONES"];
        $tiempo=$_POST["TIEMPO_ESTIMADO"];
        $series=$_POST["SERIES"];
        $diasemana=$_POST["DIA_SEMANA"];
   

$insert="INSERT INTO plan (`ID_PLAN`, `FECHA_INICIO`, `FECHA_FIN`, `PESO_INICIO`, `PESO_FIN`, `TIPO`, `FKDNI`) VALUES ('$idplan', '$fechaini', '$fechafin', '$pesoini', '$pesofin', '$tipo', '$dni')";

$insert2="INSERT INTO `conforma` (`FKID_PLAN`, `FKID_EJERCICIO`, `REPETICIONES`, `TIEMPO_ESTIMADO`, `SERIES`, `DIA_SEMANA`) VALUES ('$idplan', '$ejercicios', '$repeticiones', '$tiempo', '$series', '$diasemana')";

$connection->query( $insert );
$connection->query( $insert2 );

header('Location: adminplan.php');
}

    ?>

<div id="contenedor">
  <div id="cabecera">
    	<div class="cuadro1">
      		<img  class="logo" src="Captura.png"/>
         	<h1 class="welcome">ASIGNAR PLAN</h1>
		</div>
	  	<div class="cuadro2">
		   	<a href="adminplan.php"><img  class="botonsalir" src="salir.png"/></a>
	  	</div>
  </div>
  <div id="cuerpo">
<form method="post">
    
    <fieldset class="formulario">
    <legend ><span class="subrayado">ASIGNAR PLAN</span></legend></br>
    FECHA INICIO:
    <input type="date" name="FECHA_INICIO" required/></br></br>
    FECHA FIN:
    <input type="date" name="FECHA_FIN" required/></br></br>
    PESO INICIO:
    <input type="number" name="PESO_INICIO" required/>(kg)</br></br>
    PESO FIN:
    <input type="number" name="PESO_FIN" required/>(kg)</br></br>
    TIPO:
    <input type="text" name="TIPO" required/></br></br>
    </fieldset>
    <fieldset class="formulario" required></br>
    EJERCICIO:<?php
    echo "<select name='EJERCICIO' required>";
	
	$consulta2=$connection->query("select * from ejercicios;");
	  while($obj2 = $consulta2->fetch_object()){
	echo "<option value='".$obj2->ID_EJERCICIO."'>".$obj2->NOMBRE_EJER."</option>"; 
	}
	echo "</select></br></br>";
		?>
    REPETICIONES:
    <input type="number" name="REPETICIONES" required/></br></br>
    TIEMPO ESTIMADO:
    <input type="time" name="TIEMPO_ESTIMADO" step="1" required/></br></br>
    SERIES:
    <input type="number" name="SERIES" required/></br></br>
    DIA DE LA SEMANA:
    <input type="text" name="DIA_SEMANA" required/></br></br>
    <input type="submit" value="enviar" />
    </fieldset>
    
</form>


    </div>
  <div id="pie">

</div>
    
</body>
</html>