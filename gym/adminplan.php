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

//SACA TODOS LOS USUARIOS TENGA O NO TENGAN PLAN Y QUE NIVEL DE USUARIO 1

 if ($result = $connection->query("SELECT * FROM plan RIGHT JOIN usuario ON plan.FKDNI=usuario.DNI where NIVEL_DE_USUARIO=1;")) {
     if ($result->num_rows===0) {
              echo "No hay ningun usuario";
              }
            else {
            $y=0;
            while($obj = $result->fetch_object()){
   			
            $usuario[$y]=$obj->NOMBRE;
            $dni[$y]=$obj->DNI;
				
				
				
			if($obj->TIPO!=null){ //Quiere decir que tiene plan.(NO DEVUELVE NULL)
			$tipo[$y]=$obj->TIPO;
			$pdf[$y]="<a href='pdfcolectivo.php?id=$obj->NOMBRE'><img class='logoadmin' src='../img/entrenamiento.jpg'></a>";
			$idplan[$y]="<a href='incluirejer.php?id=$obj->ID_PLAN'><img class='logoadmin' src='../img/ejercicio.png'></a>";
			$planid[$y]=$obj->ID_PLAN;
			$borrar[$y]="<a href='eliminarplan.php?id=$obj->DNI'><img class='logoadmin'src='../img/eliminarplan.png'</a>";
			$editar[$y]="<a href='editarplan.php?id=$obj->DNI'><img class='logoadmin'src='../img/editarplan.ico'</a>";
			$adminplan[$y]="<a href='eliminarejeplan.php?id=$obj->ID_PLAN'><img class='logoadmin'src='../img/ejerciciox.png'</a>";
			$yaplan[$y]="<p>Ya tiene plan asigando</p>";
			
}				
			else{ //No tiene plan. (DEVUELVE NULL)
			$tipo[$y]="No tiene plan";
			$pdf[$y]="No tiene PDF";
			$idplan[$y]="<p>No se pueden poner ejercicios si no tiene plan</p>";
			$borrar[$y]="<p>No se puede borrar un plan inexistente</p>";
			$editar[$y]="<p>No se puede editar un plan inexixtente</p>";
			$adminplan[$y]="<p>No se puede administrar un plan inexistente</p>";
			$yaplan[$y]="<a href='asignarplan.php?id=$obj->DNI'><img class='logoadmin'src='../img/asignarplan.png'</a>";
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
         <h1 id="tituloadmin" class="welcome">ASIGNACION DE PLAN</h1>
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
            <th>PLAN</th>
			<th>PDF</th>
            <th>EDITAR PLAN</th>
			<th>BORRAR PLAN</th>
			<th>ADMIN EJER PLAN</th>
            <th>CREAR PLAN</th>
			<th>ASIGNAR EJERCICIOS</th>
            
        </tr>
<?php
        if (isset($usuario)){
		for($y=0;$y<sizeof($usuario);$y++){
        echo "<tr>";
        echo "<td>".$usuario[$y]."</td>";
		echo "<td>".$tipo[$y]."</td>";
		echo "<td>".$pdf[$y]."</td>";
		echo "<td>".$editar[$y]."</td>";
		echo "<td>".$borrar[$y]."</td>";
		echo "<td>".$adminplan[$y]."</td>";
        echo "<td>".$yaplan[$y]."</td>";
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