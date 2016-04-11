<!--- ZOOOOOONAAAAAAAAAAAA DEEEEEEEEEEE ADDDDDDDMINISTRACION AAAAAAAAANTIGUAAAAAAAAAAAAAAAAAAA--->

<?php
include_once("./configuraciondb.php");
  session_start();

if (!isset($_SESSION["user"])) {
          header("location: Proyecto1.php");
}
if ($_SESSION["nivel"]==1) {
            
            header("location: Proyecto1.php");
          } 
            $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
 if ($result = $connection->query("SELECT * FROM plan RIGHT JOIN usuario ON plan.FKDNI=usuario.DNI where NIVEL_DE_USUARIO=1;")) {
     if ($result->num_rows===0) {
              echo "No hay ningun usuario";
              }
            else {
            $y=0;
            while($obj = $result->fetch_object()){
   			
            $usuario[$y]=$obj->NOMBRE;
            $dni[$y]=$obj->DNI;
			if($obj->TIPO!=null){
			$tipo[$y]=$obj->TIPO;
			$idplan[$y]="<a href='incluirejer.php?id=$obj->ID_PLAN'><img class='logoadmin' src='../img/ejercicio.png'></a>";
}
			else{
			$tipo[$y]="No tiene plan";
			$idplan[$y]="<p>No se pueden poner ejercicios si no tiene plan</p>";
			}
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
         <h1 id="tituloadmin" class="welcome">ZONA DE ADMINISTRACION</h1>
         </div>
      <div class="cuadro2">
        <a href="cerrar.php"><img  class="botoncerrar" src="boton-cerrar-sesion.png"/></a>
    </div>
  </div>
  <div id="cuerpo">
	  <div class="espacio">
        <table>  
        <tr>
            <th>USUARIOS</th>
            <th>EDITAR USUARIO</th>
			<th>EDITAR EJERCICIOS</th>
            <th>ASIGNAR PLAN</th>
            <th>BORRAR PLAN</th>
            <th>ELIMINAR USUARIO</th>
			<th>PLAN ASIGNADO</th>
			<th>ASIGNAR EJERCICIOS</th>
			
        </tr>
<?php
        if (isset($usuario)){
		for($y=0;$y<sizeof($usuario);$y++){
        echo "<tr>";
        echo "<td>".$usuario[$y]."</td>";
        echo "<td><a href='editarusuario.php?id=$dni[$y]'><img class='logoadmin'src='../img/editarusuario.ico'</a></td>";
		echo "<td><a href='editarplan.php?id=$dni[$y]'><img class='logoadmin'src='../img/editarplan.ico'</a></td>";
        echo "<td><a href='asignarplan.php?id=$dni[$y]'><img class='logoadmin'src='../img/asignarplan.png'</a></td>";
		echo "<td><a href='eliminarplan.php?id=$dni[$y]'><img class='logoadmin'src='../img/eliminarplan.png'</a></td>";
        echo "<td><a href='borrar.php?id=$dni[$y]'><img class='logoadmin' src='../img/eliminar.jpg'></a></td>";
		echo "<td>".$tipo[$y]."</td>";
		echo "<td>".$idplan[$y]."</td>";
		echo "</tr>";
        }
						   }
        ?>
      </table>  
		  </div>
    </div>
  <div id="pie">

</div>
</body>
</html>