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
		  
<form method="post" enctype="multipart/form-data" action="formulario_instalador.php">
   <fieldset class="formularioinsta">
    <legend ><span class="subrayado"></span></legend></br>
    Usuario:
    <input type="text" name="USUARIO" required/></br></br>
    
    Contraseña:
    <input type="password" name="CONTRASENA" required /></br></br>
	
	Servidor:
	<input type="text" name="HOST" required/></br></br>
    
	Nombre de BSD:
    <input type="text" name="BSD" required/></br></br>
	Base de datos:
 	<select name="TIPOBSD" required>
              <option  value="entera">Base de datos completa</option>
              <option  value="mitad">Base de datos sin contenido</option>
            </select></br></br>

<input type="submit" value="Enviar" />
    </fieldset>
    
</form>
</div>
    </div>
  <div id="pie">

</div>

<?php
if(isset($_POST["USUARIO"])){
		$usuario=$_POST["USUARIO"];
		$contrasena=$_POST["CONTRASENA"];
		$bsd=$_POST["BSD"];
		$localhost=$_POST["HOST"];
		$tipobsd=$_POST["TIPOBSD"];
		$connection = new mysqli($localhost, $usuario, $contrasena, $bsd);
		if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
		}else{ if($basedatos == 'TIPOBSD'){
                  include("entera.php");
                }else{
                  include("mitad.php");
                }
      			$file = fopen("./configuraciondb.php","a");
          	fwrite($file, "<?php"."\n");
			
          	fwrite($file, "$"."db_user="."'".$usuario."';"."\n");
          	fwrite($file, "$"."db_password="."'".$contrasena."';"."\n");
          	fwrite($file, "$"."db_host="."'".$localhost."';"."\n");
          	fwrite($file, "$"."db_name="."'".$bsd."';"."\n");
          	fwrite($file, "?>"."\n");
          	fclose($file);
			unlink('formulario_instaladora.php');
			unlink('enteraa.php');
			unlink('mitada.php');
			header('proyecto1.php');
		}
}
?>
</body>
</html>