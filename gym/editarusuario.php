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
      $consulta=$connection->query("select * from usuario where usuario.DNI='".$_GET['id']."';");
     
    while($obj = $consulta->fetch_object()){
            
            
            $nombre=$obj->NOMBRE;
            $apellido=$obj->APELLIDO;
            $fechalta=$obj->FECHA_ALTA;
            $edad=$obj->EDAD;
            $peso=$obj->PESO;
            $enfermedad=$obj->ENFERMEDAD;
            $usuario=$obj->USUARIO;
            $correo=$obj->CORREO_ELECTRONICO;
            $contrasena=$obj->CONTRASENA;
			
     }
if (isset($_POST['NOMBRE'])){
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$connection->query("UPDATE usuario SET  NOMBRE = '".$_POST['NOMBRE']."', APELLIDO = '".$_POST['APELLIDO']."', FECHA_ALTA = '".$_POST['FECHA_ALTA']."', EDAD ='".$_POST['EDAD']."', ENFERMEDAD = '".$_POST['ENFERMEDAD']."', USUARIO = '".$_POST['USUARIO']."', CORREO_ELECTRONICO ='".$_POST['CORREO_ELECTRONICO']."', CONTRASENA = '".md5($_POST['CONTRASENA'])."',IMAGEN_PERSONAL = '".$imagen."' WHERE usuario.DNI ='".$_GET['id']."';");

header('Location: adminusuario.php');
}

    ?>

<div id="contenedor">
  <div id="cabecera">
    <div class="cuadro1">
      <img  class="logo" src="Captura.png"/>
         <h1 class="welcome">EDITAR USUARIO</h1>
    </div>
	  	<div class="cuadro2">
		   	<a href="adminusuario.php"><img  class="botonsalir" src="salir.png"/></a>
	  	</div>
  </div>
  <div id="<?php echo $_SESSION['tema'][4]; ?>">
<form method="post" enctype="multipart/form-data">
    <fieldset class="formulario">
        <legend><span class="subrayado">EDITAR USUARIO </span></legend></br>
    
    Nombre:                     
  <input type="text" name="NOMBRE" required value="<?php echo $nombre; ?>"/></br></br>
    Apellidos:
    <input type="text" name="APELLIDO" required value="<?php echo $apellido; ?>"/></br></br>
    fecha alta:
    <input type="date" name="FECHA_ALTA" required value="<?php echo $fechalta; ?>"/></br></br>
    Edad:
    <input type="number" name="EDAD" required value="<?php echo $edad; ?>"/></br></br>
    Peso:   
    <input type="number" name="PESO" required value="<?php echo $peso; ?>"/>(Kg)</br></br>
    Enfermedad:
    <textarea  name="ENFERMEDAD" placeholder="Indique si padece alguna enfermedad" value="<?php echo $enfermedad; ?>"/></textarea></br></br>
    Correo electronico:
    <input type="email" name="CORREO_ELECTRONICO" required value="<?php echo $correo; ?>"/></br></br>
    </fieldset>
    <fieldset class="formulario">
    <legend ><span class="subrayado">DATOS DE USUARIO </span></legend></br>
    Nombre de usuario:
    <input type="text" name="USUARIO" required value="<?php echo $usuario; ?>"/></br></br>
    
    Contraseña:
    <input type="password" name="CONTRASENA" required /></br></br>
    Imagen personal:(Max 1MB)
    <input type="file" name="imagen" required/></br></br>

<input type="submit" value="Cambiar" />
    </fieldset>
</form>

    </div>
  <div id="pie">

</div>
    
</body>
</html>