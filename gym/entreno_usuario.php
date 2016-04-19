<?php
include_once("./configuraciondb.php");
  session_start();
if (!isset($_SESSION["user"])) {
          header("location: Proyecto1.php");
          }
// SACA TODO LOS DATOS DEL PLAN DE UNA PERSONA
 $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($result = $connection->query("SELECT * FROM plan join usuario on plan.FKDNI=usuario.DNI join conforma on plan.ID_PLAN=conforma.FKID_PLAN join ejercicios on conforma.FKID_EJERCICIO=ejercicios.ID_EJERCICIO join instalaciones on ejercicios.FKID_INSTALACION=instalaciones.ID_INSTALACION WHERE nombre='".$_SESSION['user']."';")) {
              if ($result->num_rows===0) {
                echo "NO TIENE PLAN ASIGNADO";
              } else {
               $i=0;
                  
                  while($obj = $result->fetch_object()) {
                    
                     $planta[$i]=$obj->PLANTA;
                     $sala[$i]=$obj->SALA;
                     $enlace[$i]=$obj->ENLACE;
                     $maquina[$i]=$obj->REQUIERE_MAQUINA;
                     $clasificacion[$i]=$obj->CLASIFICACION;
                     $nombreejer[$i]=$obj->NOMBRE_EJER;
                     $dia[$i]=$obj->DIA_SEMANA;
                     $series[$i]=$obj->SERIES;
                     $tiempo[$i]=$obj->TIEMPO_ESTIMADO;
                     $repeticiones[$i]=$obj->REPETICIONES;
                     $i++;
                 }
              }
          } else {
            echo "Wrong Query";
            var_dump($result);
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
        
?>
<div id="contenedor">
  <div id="cabecera">
    <div class="cuadro1">
      <img  class="logo" src="Captura.png"/>
      <h1 class="welcomeentreno">ENTRENAMIENTO DE <?php echo strtoupper($_SESSION['user']);
?>
</h1>
    </div>
 <div class="cuadro2">
        <a href="cerrar.php"><img  class="botoncerrar" src="boton-cerrar-sesion.png"/></a>
</div>



<div id="<?php echo $_SESSION['tema'][4]; ?>">
   <div class="espacio">
<table> 
        <tr>
        <td>DIA DE LA SEMANA</td>
        <td>EJERCICIO</td>
        <td>INSTALACION</td>
        <td>PLANTA</td>
        <td>REQUIERE MAQUINA</td>
        <td>SERIES</td>
        <td>REPETICIONES</td>
        <td>TIEMPO</td>
        <td>Nº MAQUINA</td>
        <td>VIDEOS</td>
        </tr>
        <?php
        for($y=0;$y<sizeof($planta);$y++){
        echo "<tr>";
        echo "<td>".$dia[$y]."</td>";
        echo "<td>".$nombreejer[$y]."</td>";
        echo "<td>".$sala[$y]."</td>";
        echo "<td>".$planta[$y]."</td>";
        echo "<td>".$maquina[$y]."</td>";
        echo "<td>".$series[$y]."</td>";
        echo "<td>".$repeticiones[$y]."</td>";
        echo "<td>".$tiempo[$y]."</td>";
        echo "<td>".$clasificacion[$y]."</td>";
        echo "<td><a href='entreno_usuario.php?id=".$y."'><img src='../img/video.jpg' class='logovideo'></a></td>";
        echo "</tr>";
        }
        ?>
</table>
        
        <?php
        if (isset($_GET['id'])){
            echo "<div class='videourl'>";
        echo "
        <video height='240' controls autoplay>
        <source src=".$enlace[$_GET['id']]." type='video/mp4' >
        Your browser does not support the video tag.
        </video>";
        echo "<a href='entreno_usuario.php'><img class='iconocerrar' src='../img/cerrar-icono.png'></a>";
        
        echo "</div>";
        }
        ?>
    </div>
</div>

      
      
      
      
      
      
      
    </body>
    </html>