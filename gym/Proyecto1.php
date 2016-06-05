<?php
  include_once("./configuraciondb.php");
if (!isset($db_name)){
header('Location:formulario_instalador.php');
}
  session_start();
if(!isset($_SESSION["tema"])){
    $_SESSION["tema"]=array("planes","instalaciones","carrusel","carrusel_automatico","cuerpo","contenidodatos","contenidoplan","contenidoplan2","arriba","debajo");
  }
?>
<?php
if(isset($_POST["user"])){
    
          $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
 /*---------------------------------1º consulta para el login-----------------------------------------------*/         
          $query = $connection->prepare("SELECT nivel_de_usuario, nombre FROM usuario WHERE usuario=? AND contrasena=md5(?)");
          $query->bind_param("ss",$_POST["user"],$_POST["password"]);
          if ($query->execute()) {
              
              //guarda los resultados
              $query->store_result();              
            
              if ($query->num_rows===0) {
                echo "LOGIN INVALIDO";
              } else {
                
                $query->bind_result($nivel,$nombre_user);
                $resultado = $query->fetch();  
                  
                $_SESSION["nivel"]=$nivel;
                $_SESSION["user"]=$nombre_user;  
                $_SESSION["language"]="es";  
                
                if ($nivel==0 ) {
                    header('Location:administrador.php');  
                } else {
                    header('Location:usuario.php');  
                }
                  
              }
        }
             
}
            
/*-------------------------2º consulta para sacar datos instalaciones------------------------------------------------------*/
$connection2 = new mysqli($db_host, $db_user, $db_password, $db_name);
        if ($result2 = $connection2->query("SELECT * FROM instalaciones;")) {
              if ($result2->num_rows===0) {
              } else {
                $i=0;
                 while($obj = $result2->fetch_object()) {
             
                     $ins[$i]=$obj->SALA;
                     $ins2[$i]=$obj->HORA_APERTURA;
                     $ins3[$i]=$obj->HORA_CIERRE;
                    $i++;
                 }
              }
          } else {
            echo "Wrong Query";
            var_dump($result2);
          }
/*----------------------3ºconsulta PARA SACAR LAS IMAGENES DEL CARRUSEL----------------------------------------------------------*/
$connection3 = new mysqli($db_host, $db_user, $db_password, $db_name);
        if ($result3 = $connection3->query("SELECT direccion_imagen FROM instalaciones;")) {
              if ($result3->num_rows===0) {
              } else {
                $a=0;
                 while($obj2 = $result3->fetch_object()) {
             
                     $img[$a]=$obj2->direccion_imagen;
                     
                    $a++;
                 }
              }
          } else {
            echo "Wrong Query";
            var_dump($result3);
          }
/*-----------------------------------------------------------------------------------------*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="libreria/jquery-2.2.0.min.js"></script>
    <script src="libreria/jquery-ui.js"></script>
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
       <link rel="stylesheet" href="libreria/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="proyecto1.css"/>
    <script rel="stylesheet" href="libreria/jquery-ui.css"></script>
      <script type="text/javascript" src="libreria/jssor.slider.mini.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Raleway:500,600' rel='stylesheet' type='text/css'>
    <script>
    $(document).ready(function(){

    $("#planboton").click(function(){
          $(".planes").fadeToggle(500);
          $(".instalaciones").hide();
    });
    $(".instalaciones").hide();
  $("#planboton2").click(function(){
        $(".instalaciones").fadeToggle(500);
        $(".planes").hide();
  });
	
	$("#planboton").click(function(){
          $(".planes3").fadeToggle(500);
          $(".instalaciones3").hide();
    });
    $(".instalaciones3").hide();
  $("#planboton2").click(function(){
        $(".instalaciones3").fadeToggle(500);
        $(".planes3").hide();
  });

  $("#botoninicio").click( function() {
      $("#dialog").dialog({
      modal: true,
      });
  });
        
 /* -------------------------AQUI VA EL SCRIPT DEL CARRUSEL  ------------------ */
         var jssor_1_SlideoTransitions = [
              [{b:0,d:600,y:-290,e:{y:27}}],
              [{b:0,d:1000,y:185},{b:1000,d:500,o:-1},{b:1500,d:500,o:1},{b:2000,d:1500,r:360},{b:3500,d:1000,rX:30},{b:4500,d:500,rX:-30},{b:5000,d:1000,rY:30},{b:6000,d:500,rY:-30},{b:6500,d:500,sX:1},{b:7000,d:500,sX:-1},{b:7500,d:500,sY:1},{b:8000,d:500,sY:-1},{b:8500,d:500,kX:30},{b:9000,d:500,kX:-30},{b:9500,d:500,kY:30},{b:10000,d:500,kY:-30},{b:10500,d:500,c:{x:87.50,t:-87.50}},{b:11000,d:500,c:{x:-87.50,t:87.50}}],
              [{b:0,d:600,x:410,e:{x:27}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,o:1,e:{o:5}}],
              [{b:-1,d:1,c:{x:175.0,t:-175.0}},{b:0,d:800,c:{x:-175.0,t:175.0},e:{c:{x:7,t:7}}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,x:-570,o:1,e:{x:6}}],
              [{b:-1,d:1,o:-1,r:-180},{b:0,d:800,o:1,r:180,e:{r:7}}],
              [{b:0,d:1000,y:80,e:{y:24}},{b:1000,d:1100,x:570,y:170,o:-1,r:30,sX:9,sY:9,e:{x:2,y:6,r:1,sX:5,sY:5}}],
              [{b:2000,d:600,rY:30}],
              [{b:0,d:500,x:-105},{b:500,d:500,x:230},{b:1000,d:500,y:-120},{b:1500,d:500,x:-70,y:120},{b:2600,d:500,y:-80},{b:3100,d:900,y:160,e:{y:24}}],
              [{b:0,d:1000,o:-0.4,rX:2,rY:1},{b:1000,d:1000,rY:1},{b:2000,d:1000,rX:-1},{b:3000,d:1000,rY:-1},{b:4000,d:1000,o:0.4,rX:-1,rY:-1}]
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $Idle: 2000,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions,
                $Breaks: [
                  [{d:2000,b:1000}]
                ]
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 600);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /* ---------------------AQUI ACABA EL SCRIPT DEL CARRUSEL ---------------** */
});
 $(document).ready(function(){
      
    $("#planboton").click(function(){
          $(".planes2").fadeToggle(500);
          $(".instalaciones2").hide();
    });
    $(".instalaciones2").hide();
  $("#planboton2").click(function(){
        $(".instalaciones2").fadeToggle(500);
        $(".planes2").hide();
  });
	});
</script>
  </head>
<body><div id="contenedor">
    <div id="cabecera">
        <div class="cuadro1">
        <img class="logo" src="Captura.png"/>
            <ul>
 					
            <li class="lista1" id="planboton">PLAN</li>
            <li class="lista1" id="planboton2">HORARIOS</li>
<li class="lista">TEMAS</li></br>
<li class="lista"><a href="tema.php?tema=clasico">Clasico</a></li>
<li class="lista"><a href="tema.php?tema=privameral">Privameral</a></li>
<li class="lista"><a href="tema.php?tema=sombrio">Sombrio</a></li>
            </ul>
        </div>
        <div class="cuadro2">
        <img id="botoninicio" src="boton-inicio-sesion.png"/>
        <a href="crear_usuario.php"><img id="botoncrear" src="crear-usuario.png"/></a>
        </div>
    </div>
    <div id="<?php echo $_SESSION['tema'][2]; ?>">
      <div class="<?php echo $_SESSION['tema'][0]; ?>">
        <ul>
          <li><p><span class="subrayado">AUMENTO MASA MUSCULAR</span></p></br>Entrenamiento cuyo objetivo es ganar masa muscular entrenando
          con una alta carga, para lograr que los musculos aumenten.</li>
          <li><p><span class="subrayado">DEFINICION</span></p></br>Entramiento cuyo objetivo es definir la musculatura, trabajando con una carga media
          y con un numero de repeticiones especifico.</li>
          <li><p><span class="subrayado">PERDIDA DE PESO</span></p></br>Entrenamiento basado en la perdida de peso o "grasa", cuyos principales
            ejercicios se centran en actividades cardiovasculares. </li>
          <li><p><span class="subrayado">ACONDICIONAMIENTO</span></p></br>Se centra en el bienestar a nivel fisico y de salud, con ello mejoramos nuestra forma fisica.
           </li>
        </ul>
      </div>
      <div class="<?php echo $_SESSION['tema'][1]; ?>">
      <ul>
        <li><?php echo "<span class='subrayado'>".$ins[4]."</span></br></br>HORA APERTURA: ".$ins2[4]."</br>HORA CIERRE: ".$ins3[4];?></li>
        <li><?php echo "<span class='subrayado'>".$ins[1]."</span></br></br>HORA APERTURA: ".$ins2[1]."</br>HORA CIERRE: ".$ins3[1];?></li>
        <li><?php echo "<span class='subrayado'>".$ins[2]."</span></br></br>HORA APERTURA: ".$ins2[2]."</br>HORA CIERRE: ".$ins3[2];?></li>
       <li><?php echo "<span class='subrayado'>".$ins[3]."</span></br></br>HORA APERTURA: ".$ins2[3]."</br>HORA CIERRE: ".$ins3[3];?></li>
        <li><?php echo "<span class='subrayado'>".$ins[0]."</span></br></br>HORA APERTURA: ".$ins2[0]."</br>HORA CIERRE: ".$ins3[0];?></li>
      <ul>
    </div>
<!-- -------------------------AQUI EMPIEZA EL CARRUSEL ----------------------------- -->
<div id="<?php echo $_SESSION['tema'][3]; ?>">
    <div id="jssor_1" style="float: left; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden; margin-left:330px;">
    <!-- Loading Screen -->
      <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
      <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
      <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;margin-left:"></div>
    </div>
    <div data-u="slides" style="cursor: default; position: relative; width: 600px; height: 300px; overflow: hidden;margin-top:30px;">
      <div data-p="112.50" style="display: none;">
        <img data-u="image" src="<?php echo $img[0];?>" />
    </div>
    <div data-p="112.50" style="display: none;">
      <img data-u="image" src="<?php echo $img[1];?>" />
    </div>
    <div data-p="112.50" style="display: none;">
      <img data-u="image" src="<?php echo $img[2];?>" />
    </div>
    <div data-p="112.50" style="display: none;">
      <img data-u="image" src="<?php echo $img[3];?>" />
    </div>
    <div data-p="112.50" style="display: none;">
      <img data-u="image" src="<?php echo $img[4];?>"/>
    </div>
</div>
<!-- Arrow Navigator -->
<span data-u="arrowleft" class="jssora02l" style="left:8px;width:55px;height:55px;margin-top:50px; margin-left:20px;" data-autocenter="2"><img src="../img/izquierda.png"></span>
<span data-u="arrowright" class="jssora02r" style="right:8px;width:55px;height:55px;margin-left: 380px;margin-top:50px;" data-autocenter="2"><img src="../img/derecha.png"></span>
</div>
</div>
<!---------------------------AQUI ACABA EL CARRUSEL ------------------------------->
</div>
 <div id="dialog" title="INICIAR SESIÓN" style="display:none">
  <form action="Proyecto1.php" method="post" class="login">
  <table border="0">
    <tr>
      <td>USUARIO:  </td>
      <td><input type="text" name="user" maxlength="10" size="10" required></td>
    </tr>
    <tr>
      <td>CONTRASEÑA:  </td>
      <td><input type="password" name="password"  maxlength="10" size="10" required></td>
    </tr>
    <tr>
      <td colspan="2"><input type=submit value="Entrar" id="enviar"></td>
    </tr>
  </table>
  </form>
</div>

  </div>
</body>
</html>
