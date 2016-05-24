<?php
		 session_start();
if (!isset($_SESSION["user"])) {
          header("location: Proyecto1.php");
          }
        include("./jpgraph-3.5.0b1/src/jpgraph.php");
        include("./jpgraph-3.5.0b1/src/jpgraph_radar.php");
        include("configuraciondb.php");
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
      $datos=[0,0,0,0,0];
	 $puntos=['Actividades dirigidas','Cardio','Maquina','Peso libre','Piscina'];
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }else{
   	$consulta="SELECT COUNT(ID_EJERCICIO) as 'n1', CLASIFICACION FROM ejercicios, conforma, plan, usuario where ejercicios.ID_EJERCICIO=conforma.FKID_EJERCICIO and conforma.FKID_PLAN=plan.ID_PLAN and plan.FKDNI=usuario.DNI and usuario.USUARIO='".$_SESSION['user']."' GROUP by CLASIFICACION;";
        $result=$connection->query($consulta);
               while($obj=$result->fetch_object()){
				 $activi[]=$obj->n1;
				 $ejerci[]=$obj->CLASIFICACION;
				 }
	
			}

for($i=0;$i<sizeof($activi);$i++){
if($ejerci[$i]=='PISCINA'){
$datos[4]=$activi[$i];
}
elseif ($ejerci[$i]=='ACT DIRIGIDAS'){
$datos[0]=$activi[$i];
}
elseif ($ejerci[$i]=='PESO LIBRE'){
$datos[3]=$activi[$i];
}
elseif ($ejerci[$i]=='MAQUINA'){
$datos[2]=$activi[$i];
}
elseif($ejerci[$i]=='CARDIO'){
$datos[1]=$activi[$i];
}
	
}
 
// Create the graph and the plot
$graph = new RadarGraph(500,500);
$graph->yscale->ticks->Set(1);
// Add a drop shadow to the graph
$graph->SetShadow();
 
// Create the titles for the axis
$graph->SetTitles($puntos);
 
// Add grid lines
$graph->grid->Show();
$graph->grid->SetLineStyle('dashed');

$plot = new RadarPlot($datos);
$plot->SetFillColor('red');
 
// Add the plot and display the graph
$graph->Add($plot);
$graph->Stroke();
  ?>