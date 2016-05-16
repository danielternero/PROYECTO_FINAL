<?php
include_once("./configuraciondb.php");
session_start();
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
         <h1 class="welcome">INSTALACION</h1>
    </div>
	  <div class="cuadro2">
		   	<a href="Proyecto1.php"><img  class="botonsalir" src="salir.png"/></a>
	  	</div>
  </div>
  <div class="apli "id="<?php echo $_SESSION['tema'][4]; ?>">
	  <div id="aplicacion">
<form method="post" enctype="multipart/form-data">
   <fieldset class="formulario">
    <legend ><span class="subrayado"></span></legend></br>
    Usuario:
    <input type="text" name="USUARIO" required/></br></br>
    
    Contraseña:
    <input type="password" name="CONTRASENA" required /></br></br>
    
	Nombre de BSD:
    <input type="text" name="BSD" required/></br></br>

<input type="submit" value="Enviar" />
    </fieldset>
    
</form>
</div>
    </div>
  <div id="pie">

</div>
<?php
	if(isset($_POST["USUARIO"])){
		$user=$_POST["USUARIO"];
		$pass=$_POST["CONTRASENA"];
		$bbdd=$_POST["BSD"];
		//var_dump($user);
		$connection = new mysqli($db_host, $db_user, $db_password, $db_name););
		if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
          }else{
    
          	include './bbdd.php';
          	$file = fopen("../conexionbbdd/bbdd.php","a");
          	fwrite($file, "<?php"."\n");
          	fwrite($file, "$"."USUARIO="."'".$db_host."';"."\n");
          	fwrite($file, "$"."CONTRASENA="."'".$db_password."';"."\n");
          	fwrite($file, "$"."SERVIDOR="."'".$server."';"."\n");
          	fwrite($file, "$"."BSD="."'".$db_name."';"."\n");
          	fwrite($file, "?>"."\n");
          	fclose($file);
</body>
</html>