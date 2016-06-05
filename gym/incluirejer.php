<?php
include_once("./configuraciondb.php");
if (!isset($db_name)){
header('Location:formulario_instalador.php');
}
//LA BORRO LA ANTERIOR PARA PODER UTILIZARLA LUEGO LIMPIA.
if (isset($_SESSION['id'])){
unset($_SESSION['id']);						  
}
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
 	$_SESSION['id']=$_GET['id'];

if (isset($_POST['EJERCICIO'])){
		
     	
        $ejercicios=$_POST["EJERCICIO"];
        $repeticiones=$_POST["REPETICIONES"];
        $tiempo=$_POST["TIEMPO_ESTIMADO"];
        $series=$_POST["SERIES"];
        $diasemana=$_POST["DIA_SEMANA"];
  


$insert2="INSERT INTO `conforma` (`FKID_PLAN`, `FKID_EJERCICIO`, `REPETICIONES`, `TIEMPO_ESTIMADO`, `SERIES`, `DIA_SEMANA`) VALUES ('".$_SESSION['id']."', '$ejercicios', '$repeticiones', '$tiempo', '$series', '$diasemana')";

$connection->query( $insert2 );

header('Location: adminplan.php');
}

    ?>

<div id="contenedor">
  <div id="cabecera">
    	<div class="cuadro1">
      		<img  class="logo" src="Captura.png"/>
         	<h1 class="welcome">ASIGNAR EJERCICIOS</h1>
		</div>
	  	<div class="cuadro2">
		   	<a href="adminplan.php"><img  class="botonsalir" src="salir.png"/></a>
	  	</div>
  </div>
  <div id="<?php echo $_SESSION['tema'][4]; ?>">
<form method="post">
    
    <fieldset class="<?php echo $_SESSION['tema'][11]; ?>">
		<legend><span class="subrayado">INCLUIR EJERCICIOS</span></legend>
    EJERCICIO:<?php
    echo "<select name='EJERCICIO'>";
	
	$consulta2=$connection->query("select * from ejercicios;");
	while($obj2 = $consulta2->fetch_object()){
	echo "<option value='".$obj2->ID_EJERCICIO."'>".$obj2->NOMBRE_EJER."</option>"; 
	}
	echo "</select></br></br>";
		?>
    REPETICIONES:
    <input type="number" name="REPETICIONES" required/></br></br>
    TIEMPO ESTIMADO:
    <input type="time" name="TIEMPO_ESTIMADO" required step="1"/></br></br>
    SERIES:
    <input type="number" name="SERIES" required /></br></br>
    DIA DE LA SEMANA:
    <input type="text" name="DIA_SEMANA" required/></br></br>
    <input type="submit" value="enviar" />
	
    </fieldset>
    
</form>
<div id="<?php echo $_SESSION['tema'][7]; ?>">
	<p></br></br>EN ESTA SESSION EL ADMINISTRADOR AÑADE EJERCICIOS AL PLAN QUE YA TIENE ASIGNADO.</br>
	PUEDE INCLUIR EJERCICIOS, LAS REPETICIONES, EL TIEMPO ESTIMADO, LAS SERIES Y EL DIA DE LA SEMANA
</p>
</div>


    </div>
  <div id="pie">

</div>
    
</body>
</html>