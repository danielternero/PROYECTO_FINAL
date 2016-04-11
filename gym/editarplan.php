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
      $consulta=$connection->query("select * from plan where plan.FKDNI='".$_GET['id']."';");
     
    while($obj = $consulta->fetch_object()){
            
           	$dni=$obj->FKDNI;
            $idplan=$obj->ID_PLAN;
            $fechaini=$obj->FECHA_INICIO;
            $fechafin=$obj->FECHA_FIN;
            $pesoini=$obj->PESO_INICIO;
            $pesofin=$obj->PESO_FIN;
			$tipo=$obj->TIPO;
			
			
     }
if (isset($_POST['FECHA_INICIO'])){
	
$connection->query("UPDATE plan SET FECHA_INICIO = '".$_POST['FECHA_INICIO']."', FECHA_FIN ='".$_POST['FECHA_FIN']."', PESO_INICIO = '".$_POST['PESO_INICIO']."', PESO_FIN = '".$_POST['PESO_FIN']."', TIPO = '".$_POST['TIPO']."' where plan.FKDNI='".$dni."' and plan.ID_PLAN='".$idplan."' ;");

header('Location: adminplan.php');
}

    ?>

<div id="contenedor">
  <div id="cabecera">
    <div class="cuadro1">
      <img  class="logo" src="Captura.png"/>
         <h1 class="welcome">EDITAR PLAN</h1>
    </div>
	  	<div class="cuadro2">
		   	<a href="adminplan.php"><img  class="botonsalir" src="salir.png"/></a>
	  	</div>
  </div>
  <div id="cuerpo">
<form method="post" enctype="multipart/form-data">
    <fieldset class="formulario">
        <legend><span class="subrayado">PLAN </span></legend></br>
    
   
    Fecha inicio:
    <input type="date" name="FECHA_INICIO" required value="<?php echo $fechaini; ?>"/></br></br>
    Fecha fin:
    <input type="date" name="FECHA_FIN" required value="<?php echo $fechafin; ?>"/></br></br>
    Peso inicio:
    <input type="number" name="PESO_INICIO" required value="<?php echo $pesoini; ?>"/></br></br>
    Peso fin:
    <input type="number" name="PESO_FIN" value="<?php echo $pesofin; ?>"/></br></br>
	Tipo:
	<input type="text" name="TIPO" required value="<?php echo $tipo; ?>"/></br></br>
<input type="submit" value="Cambiar" />
    </fieldset>
</form>
<div id='contenidoplan2'>
	<p></br></br>EN ESTA SESSION EL ADMINISTRADOR PUEDE EDITAR EL PLAN.</br>
LAS FECHAS DE COMIENZO Y FIN DEL PLAN, 
EL PESO INICIO , EL PESO FINAL (OBJETIVO)
Y EL TIPO DE PLAN.</p>
</div>

    </div>
  <div id="pie">

</div>
    
</body>
</html>