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
		
	$consulta=$connection->query("SELECT ID_INSTALACION from instalaciones ORDER by ID_INSTALACION DESC LIMIT 1");
     while($obj = $consulta->fetch_object()){
	 
	 $idinstal=$obj->ID_INSTALACION;
	$idinstal=$idinstal+1;
	 }
	if (isset($_POST['SALA'])){
        $sala=$_POST["SALA"];
        $planta=$_POST["PLANTA"];
        $horapertura=$_POST["HORA_APERTURA"];
        $horacierre=$_POST["HORA_CIERRE"];
        $direcimagen=$_POST["direccion_imagen"];
       
        $insert="INSERT INTO instalaciones VALUES ('$idinstal', '$sala', '$planta','$horapertura', '$horacierre', '$direcimagen')";
		
        $connection->query( $insert );
		  
    header('Location: admininstalacion.php');

	}
?>   

<div id="contenedor">
  <div id="cabecera">
    <div class="cuadro1">
      <img  class="logo" src="Captura.png"/>
         <h1 class="welcome">CREAR INSTALACION</h1>
    </div>
	  <div class="cuadro2">
		   	<a href="admininstalacion.php"><img  class="botonsalir" src="salir.png"/></a>
	  	</div>
  </div>
  <div id="<?php echo $_SESSION['tema'][4]; ?>">
<form method="post" enctype="multipart/form-data">
    <fieldset class="<?php echo $_SESSION['tema'][11]; ?>">
        <legend><span class="subrayado">INSTALACION</span></legend></br>
    Sala:                     
  <input type="text" name="SALA" required /></br></br>
    Planta:
    <input type="text" name="PLANTA" required /></br></br>
	Hora apertura:
    <input type="time" name="HORA_APERTURA" required/></br></br>
    Hora cierre:   
    <input type="time" name="HORA_CIERRE" required/></br></br>
    Dirrecion imagen:
    <input type="text" name="direccion_imagen"/></br></br>
<input type="submit" value="Crear" />
    </fieldset>
    
</form>
<div id="<?php echo $_SESSION['tema'][7]; ?>">
	<p></br></br>EN ESTA SESSION EL ADMINISTRADOR AÑADE INSTALACIONES A LA BASE DE DATOS.</br>
	AÑADE EL NOMBRE DE LA SALA, LA PLANTA DONDE ESTA SITUADA LA SALA, LA HORA DE APERTURA Y CIERRE DE DICHA SALA 
	Y PUEDES INTRODUCIR UNA IMAGEN DE LA SALA MEDIANTE UN ENLACE.
</p>
</div>
    </div>
  <div id="pie">

</div>
</body>
</html>