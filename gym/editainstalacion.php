<?php
include_once("./configuraciondb.php");
if (!isset($db_name)){
header('Location:formulario_instalador.php');
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
      $consulta=$connection->query("select * from instalaciones where instalaciones.SALA='".$_GET['id']."';");
     
    while($obj = $consulta->fetch_object()){
            
            
            $idinstal=$obj->ID_INSTALACION;
            $sala=$obj->SALA;
            $planta=$obj->PLANTA;
            $horaapertura=$obj->HORA_APERTURA;
            $horacierre=$obj->HORA_CIERRE;
			$direccionimg=$obj->direccion_imagen;
			
			
     }
if (isset($_POST['SALA'])){

$connection->query("UPDATE instalaciones SET   SALA = '".$_POST['SALA']."', PLANTA = '".$_POST['PLANTA']."', HORA_APERTURA ='".$_POST['HORA_APERTURA']."', HORA_CIERRE = '".$_POST['HORA_CIERRE']."', direccion_imagen = '".$_POST['direccion_imagen']."' where instalaciones.SALA='".$_GET['id']."';");

header('Location: admininstalacion.php');
}

    ?>

<div id="contenedor">
  <div id="cabecera">
    <div class="cuadro1">
      <img  class="logo" src="Captura.png"/>
         <h1 class="welcome">EDITAR INSTALALACION</h1>
    </div>
	  	<div class="cuadro2">
		   	<a href="admininstalacion.php"><img  class="botonsalir" src="salir.png"/></a>
	  	</div>
  </div>
  <div id="<?php echo $_SESSION['tema'][4]; ?>">
<form method="post" enctype="multipart/form-data">
    <fieldset class="formulario">
        <legend><span class="subrayado">EDITAR INSTALACIONES </span></legend></br>
    
  
    Sala:
    <input type="text" name="SALA" required value="<?php echo $sala; ?>"/></br></br>
    Planta:
    <input type="text" name="PLANTA" required value="<?php echo $planta; ?>"/></br></br>
    Hora apertura:
    <input type="time" name="HORA_APERTURA" required value="<?php echo $horaapertura; ?>"/></br></br>
    Hora cierre:
    <input  type="time" name="HORA_CIERRE"  value="<?php echo $horacierre; ?>"/></br></br>
	Direccion imagen:
    <input  tye="text" name="direccion_imagen"  value="<?php echo $direccionimg; ?>"/></br></br>
<input type="submit" value="Cambiar" />
    </fieldset>
</form>
<div id="<?php echo $_SESSION['tema'][7]; ?>">
	<p></br></br>EN ESTA SESSION EL ADMINISTRADOR EDITA LAS DIFERENTES INSTALACIONES QUE EXISTEN EN LA BASE DE DATOS.</br>
	EDITA EL NOMBRE DE LA SALA, LA PLANTA,LA HORA DE APERTURA Y CIERRE, Y PUEDES AÑADIR UNA IMAGEN DE LA INSTALACION MEDIANTE UN ENLACE.
</p>
</div>
    </div>
  <div id="pie">

</div>
    
</body>
</html>