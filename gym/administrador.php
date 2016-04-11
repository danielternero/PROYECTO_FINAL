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
    
<div id="contenedor">
  <div id="cabecera">
    <div class="cuadro1">
      <img  class="logo" src="Captura.png"/>
         <h1 id="tituloadmin" class="welcome">ZONA DE ADMINISTRACION</h1>
         </div>
      <div class="cuadro2">
        <a href="cerrar.php"><img  class="botoncerrar" src="boton-cerrar-sesion.png"/></a>
    </div>
  </div>
  <div id="cuerpo">
	  
<div class="arriba"><p>USUARIOS</p><a href='adminusuario.php'><img class='logoadmin2'src='../img/usu.jpg'></a></div> 
<div class="debajo"><p>PLANES</p><a href='adminplan.php'><img class='logoadmin2'src='../img/editarplan.ico'></a></div>		
<div class="arriba"><p>EJERCICIOS</p><a href='adminejercicio.php'><img class='logoadmin2' src='../img/ejercicio.png'></a></div>
<div class="debajo"><p>INSTALACION</p><a href='admininstalacion.php'><img class='logoadmin2' src='../img/instalacion.png'></a></div>

		 
    </div>
  <div id="pie">

</div>
</body>
</html>