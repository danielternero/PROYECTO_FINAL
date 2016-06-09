<?php
include_once("./configuraciondb.php");
if (isset($db_name)){
header('Location:Proyecto1.php');
}
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
		}else{ if($tipobsd == 'entera'){
      
      $filename = 'entera.sql';
    
      $mysql_host = $localhost;
     
      $mysql_username = $usuario;
    
      $mysql_password = $contrasena;
      
      $mysql_database = $bsd;

      
      $templine = '';
      
      $lines = file($filename);
      
      foreach ($lines as $line)
      {
     
      if (substr($line, 0, 2) == '--' || $line == '')
          continue;

      
      $templine .= $line;
      
      if (substr(trim($line), -1, 1) == ';')
      {
          
          $connection->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
          
          $templine = '';
      }
      }
       echo "Tables imported successfully";
                }else{
                
                  $filename = 'mitad.sql';
                  
                  $mysql_host = $localhost;
                 
                  $mysql_username = $usuario;
                 
                  $mysql_password = $contrasena;
                 
                  $mysql_database = $bsd;


                  
                  $templine = '';
                  
                  $lines = file($filename);
                  
                  foreach ($lines as $line)
                  {
          
                  if (substr($line, 0, 2) == '--' || $line == '')
                      continue;

           
                  $templine .= $line;
                
                  if (substr(trim($line), -1, 1) == ';')
                  {
                    
                      $connection->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                    
                      $templine = '';
                  }
                  }
                   
                }
      			$file = fopen("./configuraciondb.php","a");
			fwrite($file, "<?php"."\n");
			fwrite($file, "if (isset("."$"."_ENV['OPENSHIFT_APP_NAME'])) {"."\n");
			fwrite($file, ""."$"."db_user="."$"."_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];"."\n");
			fwrite($file, ""."$"."db_host="."$"."_ENV['OPENSHIFT_MYSQL_DB_HOST'];
   "."\n");
			fwrite($file, "$"."db_name="."'".$bsd."';"."\n");
			fwrite($file, ""."$"."db_password="."$"."_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];"."\n");
			fwrite($file, "}"."\n");
          	fwrite($file, "else{"."\n");
			fwrite($file, "$"."db_user="."'".$usuario."';"."\n");
          	fwrite($file, "$"."db_password="."'".$contrasena."';"."\n");
          	fwrite($file, "$"."db_host="."'".$localhost."';"."\n");
          	fwrite($file, "$"."db_name="."'".$bsd."';"."\n");
			fwrite($file, "}"."\n");
          	fwrite($file, "?>"."\n");
          	fclose($file);
			unlink('./formulario_instaladora.php');
			unlink('./enteraa.php');
			unlink('./mitada.php');
			header('Location:Proyecto1.php');
		}
}
?>
</body>
</html>
