<?php
 session_start();
if (!isset($_SESSION["user"])) {
          header("location: Proyecto1.php");
          }
        include("./jpgraph-3.5.0b1/src/jpgraph.php");
        include("./jpgraph-3.5.0b1/src/jpgraph_bar.php");
        include("configuraciondb.php");
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
      
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }else{
        $consulta="SELECT EDAD from usuario;";
        $result=$connection->query($consulta);
               while($obj=$result->fetch_object()){
				 $edad[]=$obj->EDAD;
                }
		$a=0;
		$b=0;
		$c=0;
		$d=0;
			
		foreach ($edad as $z){
		if($z>=17&&$z<=25){
		$a=$a+1;
		}
		if($z>=26&&$z<=34){
		$b=$b+1;
		}
		if($z>=35&&$z<=42){
		$c=$c+1;
		}
		if($z>=43&&$z<=80){
		$d=$d+1;
		}
		}
$datos=array($a,$b,$c,$d);
$graph = new Graph(700,600,'auto');
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);
$graph->yaxis->SetTickPositions(array(0,1,2,3,4,5));
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('17-25','26-34','35-42','43-60'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);


$b1plot = new BarPlot($datos);


$gbplot = new GroupBarPlot(array($b1plot));

$graph->Add($gbplot);


$b1plot->SetColor("white");
$b1plot->SetFillColor("#cc1111");
$graph->title->Set("EDAD MEDIA DE USUARIOS");
$graph->xaxis->title->Set("EDAD DE USUARIOS");
$graph->yaxis->title->Set("Nº USUARIOS");


$graph->Stroke();
			
			
			
 }
  ?>