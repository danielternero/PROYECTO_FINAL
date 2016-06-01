<?php
include_once("./configuraciondb.php");
if (!isset($db_name)){
header('Location:formulario_instalador.php');
}
  session_start();
if (!isset($_SESSION["user"])) {
          header("location: Proyecto1.php");
          }
            $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
        if ($result = $connection->query("SELECT * FROM plan join usuario on plan.FKDNI=usuario.DNI  WHERE                  nombre='".$_SESSION['user']."';")) {
              if ($result->num_rows===0) {
/*--------------------EN CASO DE QUE NO TENGA PLAN ASIGANDO, SACO LOS DATOS DEL USUARIO-----------------------*/
                if ($result2 = $connection->query("SELECT * FROM usuario WHERE nombre='".$_SESSION['user']."';")) {
                    if ($result2->num_rows===0){
                    echo "usuario inexistente";
                    } 
                else {
                      while($obj2 = $result2->fetch_object()) {
                     $datos['nombre']=$obj2->NOMBRE;
                     $datos['apellidos']=$obj2->APELLIDO;
                     $datos['pesoini']=$obj2->PESO;
                     $datos['dni']=$obj2->DNI;
                     $datos['fotousuario']=$obj2->IMAGEN_PERSONAL;
                     $datos['edad']=$obj2->EDAD;
                     $datos['alta']=$obj2->FECHA_ALTA;
                     $datos['correo']=$obj2->CORREO_ELECTRONICO;
                 }
                    }
                }
/*----------------------- SI TIENE PLAN---------------------------------------------------*/              
                } else {
                 while($obj = $result->fetch_object()) {
                     $datos['nombre']=$obj->NOMBRE;
                     $datos['apellidos']=$obj->APELLIDO;
                     $datos['fechainicio']=$obj->FECHA_INICIO;
                     $datos['fechafin']=$obj->FECHA_FIN;
                     $datos['pesoini']=$obj->PESO_INICIO;
                     $datos['pesofin']=$obj->PESO_FIN;
                     $datos['plan']=$obj->TIPO;
                     $datos['dni']=$obj->FKDNI;
                     $datos['planactual']=$obj->TIPO;
                     $datos['fotousuario']=$obj->IMAGEN_PERSONAL;
                     $datos['edad']=$obj->EDAD;
                     $datos['alta']=$obj->FECHA_ALTA;
                     $datos['correo']=$obj->CORREO_ELECTRONICO;
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

<div id="contenedor">
  <div id="cabecera">
    <div class="cuadro1">
      <img  class="logo" src="Captura.png"/>
      <h1 class="welcome">¡HOLA <?php
echo strtoupper($_SESSION['user']);
?>!
</h1>
    </div>
    <div class="cuadro2">
        <a href="cerrar.php"><img  class="botoncerrar" src="boton-cerrar-sesion.png"/></a>
    </div>
  </div>
  <div id="<?php echo $_SESSION['tema'][4]; ?>">
    <div id="contenidofoto"><img id="fotousuario" src="data:image/jpg;base64,<?php echo base64_encode($datos['fotousuario']);?>" ></div> 
      <div id="<?php echo $_SESSION['tema'][5]; ?>">
		  <p><span class="subrayado">DATOS PERSONALES:</span></p>
		   <ul class="eje">
          <li>NOMBRE Y APELLIDOS: <?php echo $datos['nombre']." ".$datos['apellidos'];?></li>
          <li>DNI: <?php echo $datos['dni']?></li><li>EDAD <?php echo $datos['edad']?></li>
          <li>PESO: <?php echo $datos['pesoini'];?></li>
          <li>FECHA ALTA: <?php echo $datos['alta'];?></li>
          <li>CORREO ELECTRONICO : <?php echo $datos['correo'];?></li>
		 </ul>
		 <?php 
/*-------------SI TIENE PLAN MUESTRA LA PRIERA CONSULTA, SINO MUESTRA QUE NO TIENE PLAN.....*/
    if (!isset($result2)){   
             echo "<p><span class='subrayado'>ENTRENAMIENTO:</span></p>";
			 echo "<ul class='eje'>";
             echo "<li>PLAN ACTUAL:".$datos['planactual']."</li>";
             echo "<li>FECHA INICIO:".$datos['fechainicio']."</li>";
             echo "<li>FECHA FIN:".$datos['fechafin']."</li>";
             echo "<li>PESO (objetivo):".$datos['pesofin']."</li></br>";
			echo "</br>";
			 echo "<li><strong>IR AL ENTRENAMIENTO </strong><a href='entreno_usuario.php'><img id='logoentreno' src='../img/entreno.jpg'></a></li>";
		echo "</ul>";
    echo "</div>";
		echo "<div class='grafica2'>";
		echo "<img src='./dashboard2.php'>";
echo "</div>";
		
    }
    else{
     echo "<div id=".$_SESSION['tema'][6].">";
    echo "<p>El entrenador aun no te ha asignado ningun plan</p>";
    echo "</div>";
    }    
    ?>

    </div>
     
            
        </div>
         
   
  </div>
  <div id="pie">

</div>

</body>
</html>