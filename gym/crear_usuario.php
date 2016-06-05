<?php
include_once("./configuraciondb.php");
if (!isset($db_name)){
header('Location:formulario_instalador.php');
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

<?php
    
      if (isset($_POST['DNI'])){
		$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
		
		$dni=$_POST["DNI"];
        $nombre=$_POST["NOMBRE"];
        $apellido=$_POST["APELLIDO"];
        $edad=$_POST["EDAD"];
        $peso=$_POST["PESO"];
        $enfermedad=$_POST["ENFERMEDAD"];
        $correo_electronico=$_POST["CORREO_ELECTRONICO"];
        $usuario=$_POST["USUARIO"];
        $contrasena=md5($_POST["CONTRASENA"]);
        $imagen=$_POST["img"];
		$imagen = addslashes(file_get_contents($_FILES['img']['tmp_name']));
        $insert="INSERT INTO usuario VALUES ('$dni', '$nombre', '$apellido','current_date()', $edad, $peso, '$enfermedad','$usuario', '$correo_electronico', '$contrasena',1, '$imagen')";
		
        $connection->query( $insert );

$connection->query( "UPDATE usuario set FECHA_ALTA=current_date() where DNI='$dni';");
    header('Location: Proyecto1.php');

	}
?>   

<div id="contenedor">
  <div id="cabecera">
    <div class="cuadro1">
      <img  class="logo" src="Captura.png"/>
         <h1 class="welcome">CREAR USUARIO</h1>
    </div>
	  <div class="cuadro2">
		   	<a href="adminusuario.php"><img  class="botonsalir" src="salir.png"/></a>
	  	</div>
  </div>
  <div id="<?php echo $_SESSION['tema'][4]; ?>">
<form method="post" enctype="multipart/form-data">
    <fieldset class="<?php echo $_SESSION['tema'][11]; ?>">
        <legend><span class="subrayado">DATOS PERSONALES </span></legend></br>
    Dni:
    <input type="text" name="DNI" maxlength="9" required/></br></br>
    Nombre:                     
  <input type="text" name="NOMBRE" required /></br></br>
    Apellidos:
    <input type="text" name="APELLIDO" required /></br></br>

    Edad:
    <input type="number" name="EDAD" required/></br></br>
    Peso:   
    <input type="number" name="PESO" required/></br></br>
    Enfermedad:
    <textarea  name="ENFERMEDAD" placeholder="Indique si padece alguna enfermedad" /></textarea></br></br>
    Correo electronico:
    <input type="email" name="CORREO_ELECTRONICO" required /></br></br>
    </fieldset>
    <fieldset class="<?php echo $_SESSION['tema'][11]; ?>">
    <legend ><span class="subrayado">DATOS DE USUARIO </span></legend></br>
    Nombre de usuario:
    <input type="text" name="USUARIO" required/></br></br>
    
    Contraseña:
    <input type="password" name="CONTRASENA" required /></br></br>
    Imagen personal:(Max 1MB)
    <input type="file" name="img" required/></br></br>
<input type="submit" value="Crear" />
    </fieldset>
    
</form>

    </div>
  <div id="pie">

</div>
</body>
</html>