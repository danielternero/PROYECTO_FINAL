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
 	 if (isset($_GET['idejer'])){
	 $_SESSION['idejer']=$_GET['idejer'];
	 $_SESSION['idplan']=$_GET['idplan'];
								 
      
      $consulta=$connection->query("select * from conforma where conforma.FKID_EJERCICIO=".$_SESSION['idejer']." and conforma.FKID_PLAN=".$_SESSION['idplan'].";");


   		while($obj = $consulta->fetch_object()){
            
            
            $repeticiones=$obj->REPETICIONES;
            $tiempo=$obj->TIEMPO_ESTIMADO;
            $series=$obj->SERIES;
            $diasemana=$obj->DIA_SEMANA;
			
			
     }

	 }
if (isset($_POST['REPETICIONES'])){

$consulta="UPDATE conforma SET  REPETICIONES = '".$_POST['REPETICIONES']."', TIEMPO_ESTIMADO = '".$_POST['TIEMPO_ESTIMADO']."', SERIES ='".$_POST['SERIES']."', DIA_SEMANA = '".$_POST['DIA_SEMANA']."' where FKID_EJERCICIO=".$_SESSION['idejer']." and FKID_PLAN=".$_SESSION['idplan'].";";
	
$connection->query($consulta);
unset( $_SESSION['idejer']);
unset( $_SESSION['idplan']);


header('Location: adminplan.php');


}
    ?>

<div id="contenedor">
  <div id="cabecera">
    <div class="cuadro1">
      <img  class="logo" src="Captura.png"/>
         <h1 class="welcome">EDITAR EJERCICIOS</h1>
    </div>
	  	<div class="cuadro2">
		   	<a href="eliminarejeplan.php?<?php echo "id=".$_GET['idplan']; ?>"><img  class="botonsalir" src="salir.png"/></a>
	  	</div>
  </div>
  <div id="cuerpo">
<form method="post" action="editarejeplan.php">
    <fieldset class="formulario">
        <legend><span class="subrayado">EJERCICIO </span></legend></br>
    
   
    Repeticiones:
    <input type="number" name="REPETICIONES" required value="<?php echo $repeticiones; ?>"/></br></br>
    Tiempo estimado:
    <input type="time" name="TIEMPO_ESTIMADO" step="1"required value="<?php echo $tiempo; ?>"/></br></br>
    Series:
    <input type="number" name="SERIES" required value="<?php echo $series; ?>"/></br></br>
    Dia de la Semana:
    <input  type="text" name="DIA_SEMANA"  required value="<?php echo $diasemana; ?>"/></br></br>
<input type="submit" value="Cambiar" />
    </fieldset>
</form>
<div id='contenidoplan2'>
	<p></br></br>EN ESTA SESSION EL ADMINISTRADOR PUEDE EDITAR LOS EJERCICIOS QUE TIENE ASIGNADOS DICHO PLAN.</br></br>
EDITA EL NUMERO DE REPETICIONES,TIEMPO ESTIMADO POR EJERCICIO, 
NUMERO DE SERIES Y EL DIA DE LA SEMANA
</p>
</div>

    </div>
  <div id="pie">

</div>
    
</body>
</html>