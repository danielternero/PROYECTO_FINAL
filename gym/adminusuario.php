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
            $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
 if ($result = $connection->query("SELECT * FROM usuario where NIVEL_DE_USUARIO=1;")) {
     if ($result->num_rows===0) {
              echo "No hay ningun usuario";
              }
            else {
            $y=0;
            while($obj = $result->fetch_object()){
   			
            $usuario[$y]=$obj->NOMBRE;
            $dni[$y]=$obj->DNI;
            $y++;
            
                }
            }
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
         <h1 id="tituloadmin" class="welcome">ADMINISTRADOR USUARIOS</h1>
         </div>
      <div class="cuadro2">
        <a href="administrador.php"><img  class="botoncerrar" src="salir.png"/></a>
    </div>
  </div>
  <div id="<?php echo $_SESSION['tema'][4]; ?>">
	  <div class="espacio">
        <table>  
        <tr>
            <th>USUARIOS</th>
            <th>EDITAR USUARIO</th>
			<th>ELIMINAR USUARIO</th>
			
        </tr>
<?php
        if (isset($usuario)){
		for($w=0;$w<sizeof($usuario);$w++){
        echo "<tr>";
        echo "<td>".$usuario[$w]."</td>";
        echo "<td><a href='editarusuario.php?id=$dni[$w]'><img class='logoadmin'src='../img/editarusuario.ico'</a></td>";
		echo "<td><a href='borrar.php?id=$dni[$w]'><img class='logoadmin' src='../img/eliminar.jpg'></a></td>";
		echo "</tr>";
        }
						   }
        ?>
      </table>  
		  </div>
    </div>
  <div id="pie">
	 
        <table>  
			<tr>
			
			
	  <?php	
			
			echo "<td>AÑADIR USUARIO<a href='crear_usuario.php'><img class='logoadmin' src='../img/anadirusu.png'></a></td>";
			
		?>
		</tr>
		</table>  
		  </div>

</div>
</body>
</html>