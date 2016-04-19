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
 if ($result = $connection->query("SELECT * FROM ejercicios")) {
     if ($result->num_rows===0) {
              echo "No hay ningun usuario";
              }
            else {
            $y=0;
            while($obj = $result->fetch_object()){
   			
            $nombre[$y]=$obj->NOMBRE_EJER;
            $idejercicio[$y]=$obj->ID_EJERCICIO;
			
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
         <h1 id="tituloadmin" class="welcome">ADMINISTRADOR EJERCICIOS</h1>
         </div>
      <div class="cuadro2">
        <a href="administrador.php"><img  class="botoncerrar" src="salir.png"/></a>
    </div>
  </div>
  <div id="<?php echo $_SESSION['tema'][4]; ?>">
	  <div class="espacio">
        <table>  
        <tr>
            <th>EJERCICIOS</th>
            <th>EDITAR</th>
			<th>BORRAR</th>
          
			
        </tr>
<?php
        if (isset($nombre)){
		for($y=0;$y<sizeof($nombre);$y++){
        echo "<tr>";
        echo "<td>".$nombre[$y]."</td>";
        echo "<td><a href='editaeje.php?id= $idejercicio[$y]'><img class='logoadmin'src='../img/editarejercicio.png'</a></td>";
		echo "<td><a href='borrarejercicio.php?id=$nombre[$y]'><img class='logoadmin'src='../img/borrarejercicio.png'</a></td>";
       
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
			 echo "<td>CREAR EJERCICIO<a href='crearejercicio.php'><img class='logoadmin'src='../img/anadirejercicio.png'</a></td>";
		?>
		</tr>
		</table> 
</div>
</body>
</html>