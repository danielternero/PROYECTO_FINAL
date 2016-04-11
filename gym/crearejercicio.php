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
      $consulta=$connection->query("SELECT ID_EJERCICIO from ejercicios ORDER by ID_EJERCICIO DESC LIMIT 1");
     while($obj = $consulta->fetch_object()){
	 
	 $idejer=$obj->ID_EJERCICIO;
	$idejer=$idejer+1;
	 }

	if (isset($_POST['NOMBRE_EJER'])){
		
	
	
        $nombre=$_POST["NOMBRE_EJER"];
        $clasificacion=$_POST["CLASIFICACION"];
        $maquina=$_POST["REQUIERE_MAQUINA"];
        $instalacion=$_POST["FKID_INSTALACION"];
        $enlace=$_POST["ENLACE"];
       
        $insert="INSERT INTO ejercicios (ID_EJERCICIO,NOMBRE_EJER, CLASIFICACION,REQUIERE_MAQUINA,FKID_INSTALACION,ENLACE) VALUES ('$idejer','$nombre', '$clasificacion','$maquina', '$instalacion','$enlace')";
		
        $connection->query( $insert );
		  
    header('Location: adminejercicio.php');
	}
?>   

<div id="contenedor">
  <div id="cabecera">
    <div class="cuadro1">
      <img  class="logo" src="Captura.png"/>
         <h1 class="welcome">CREAR EJERCICIO</h1>
    </div>
	  <div class="cuadro2">
		   	<a href="adminejercicio.php"><img  class="botonsalir" src="salir.png"/></a>
	  	</div>
  </div>
  <div id="cuerpo">
<form method="post" enctype="multipart/form-data">
    <fieldset class="formulario">
        <legend><span class="subrayado">EJERCICIOS</span></legend></br>
    Nombre:                     
  <input type="text" name="NOMBRE_EJER" required /></br></br>
    Clasificacion:
    <input type="text" name="CLASIFICACION" required /></br></br>
	Requiere maquina:
    <input type="texr" name="REQUIERE MAQUINA" required/></br></br>
    Instalacion:
	<select name="FKID_INSTALACION">
    <?php
	if ($result=$connection->query("SELECT * FROM instalaciones;")) {
     if ($result->num_rows===0) {
                echo "ERROR FATAL, ABORTAR MISIÓN";
              } else {
         while($obj2 = $result->fetch_object()) {
                    echo "<option value='".$obj2->ID_INSTALACION."'>".$obj2->SALA."</option>";
			 		
                 }
         $result->close();
         unset($obj2);
    }
 }
	?>
	</select></br></br>
    Enlace:
    <input type="text" name="ENLACE"/></br></br>
<input type="submit" value="Crear" />
    </fieldset>
    
</form>
<div id='contenidoplan2'>
	<p></br>EN ESTA SESSION EL ADMINISTRADOR CREA NUEVOS EJERCICIOS QUE SE AÑADEN A LA BASE DE DATOS.</br>
	AÑADE EL NOMBRE DEL EJERICICO,  LA CLASIFICACION ("Peso libre, maquinas, actividades dirigidas...), SI 
	REQUIERE MAQUINA , LA INSTALACION DONDE SE EJECUTA EL EJERCICIO Y PUEDES AÑADIR UN VIDEO MEDIANTE UN ENLACE DE VIDEO.
</p>
</div>
    </div>
  <div id="pie">

</div>
</body>
</html>