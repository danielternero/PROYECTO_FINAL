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
      $consulta=$connection->query("select * from ejercicios,instalaciones where ejercicios.FKID_INSTALACION=instalaciones.ID_INSTALACION and ejercicios.ID_EJERCICIO='".$_GET['id']."';");
     
    while($obj = $consulta->fetch_object()){
            
            
            $idejer=$obj->ID_EJERCICIO;
            $nombre=$obj->NOMBRE_EJER;
            $clasificacion=$obj->CLASIFICACION;
            $maquina=$obj->REQUIERE_MAQUINA;
            $sala=$obj->SALA;
            $enlace=$obj->ENLACE;
			
			
     }
if (isset($_POST['NOMBRE'])){
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$connection->query("UPDATE usuario SET  NOMBRE = '".$_POST['NOMBRE']."', APELLIDO = '".$_POST['APELLIDO']."', FECHA_ALTA = '".$_POST['FECHA_ALTA']."', EDAD ='".$_POST['EDAD']."', ENFERMEDAD = '".$_POST['ENFERMEDAD']."', USUARIO = '".$_POST['USUARIO']."', CORREO_ELECTRONICO ='".$_POST['CORREO_ELECTRONICO']."', CONTRASENA = '".md5($_POST['CONTRASENA'])."',IMAGEN_PERSONAL = '".$imagen."' WHERE usuario.DNI ='".$_GET['id']."';");

header('Location: administrador.php');
}

    ?>

<div id="contenedor">
  <div id="cabecera">
    <div class="cuadro1">
      <img  class="logo" src="Captura.png"/>
         <h1 class="welcome">EDITAR USUARIO</h1>
    </div>
	  	<div class="cuadro2">
		   	<a href="cerrar2.php"><img  class="botonsalir" src="salir.png"/></a>
	  	</div>
  </div>
  <div id="cuerpo">
<form method="post" enctype="multipart/form-data">
    <fieldset class="formulario">
        <legend><span class="subrayado">EDITAR EJERCICIOS </span></legend></br>
    
    Id ejercicio:                     
  <input type="text" name="ID_EJERCICIO" required value="<?php echo $idejer; ?>"/></br></br>
    Nombre:
    <input type="text" name="NOMBRE_EJER" required value="<?php echo $nombre; ?>"/></br></br>
    Clasificacion:
    <input type="text" name="CLASIFICACION" required value="<?php echo $clasificacion; ?>"/></br></br>
    Requiere Maquina:
    <input type="text" name="REQUIERE_MAQUINA" required value="<?php echo $maquina; ?>"/></br></br>
    Instalacion:   
    <input type="text" name="SALA" required value="<?php echo $sala; ?>"/></br></br>
    Video:
    <input  name="ENlACE"  value="<?php echo $enlace; ?>"/></br></br>
<input type="submit" value="Cambiar" />
    </fieldset>
</form>

    </div>
  <div id="pie">

</div>
    
</body>
</html>