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
 	if($consulta=$connection->query("select * from conforma where conforma.FKID_PLAN='".$_GET['id']."';")){
      if ($consulta->num_rows===0) {
              echo "No hay ningun usuario";
              }
            else {
            $y=0;
    while($obj = $consulta->fetch_object()){
            
            
            $idplan[$y]=$obj->FKID_PLAN;
            $idejer[$y]=$obj->FKID_EJERCICIO;
			$ejercicio=array('idplan'=>$obj->FKID_PLAN,'idejer'=>$obj->FKID_EJERCICIO);
			$url=http_build_query($ejercicio);
			$enlace[$y]="borrarejeplan.php?".$url;
			$enlace2[$y]="editarejeplan.php?".$url;
			$y++;
				}		
			}
	}

    ?>

	<div id="contenedor">
  <div id="cabecera">
    <div class="cuadro1">
      <img  class="logo" src="Captura.png"/>
         <h1 class="welcome">ADMIN EJER ASIGNADOS</h1>
    </div>
	  	<div class="cuadro2">
		   	<a href="adminplan.php"><img  class="botonsalir" src="salir.png"/></a>
	  	</div>
  </div>
  <div id="<?php echo $_SESSION['tema'][4]; ?>">
	  <div class="espacio">
		  <table>  
        <tr>
			<th>EDITAR</th>
			<th>BORRAR</th>
            <th>NOMBRE DE EJERCICIO</th>
            
			
			
        </tr>
<?php
        if (isset($idplan)){
		for($y=0;$y<sizeof($idplan);$y++){
        
		echo "<tr>";
		
		echo "<td><a href='".$enlace2[$y]."'><img class='logoadmin'src='../img/editar.png'</a></td>";
		echo "<td><a href='".$enlace[$y]."'><img class='logoadmin'src='../img/cerrar-icono.png'</a></td>";
        if($consulta=$connection->query("select * from ejercicios where ID_EJERCICIO='".$idejer[$y]."';")){
     
    while($obj = $consulta->fetch_object()){
            
			$nombrejer=$obj->NOMBRE_EJER;
				}		
			
		}
		echo "<td>".$nombrejer."</td>";
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