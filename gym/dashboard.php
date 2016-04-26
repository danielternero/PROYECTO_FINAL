<?php
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
		if($z>=43&&$z<=50){
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
$graph->xaxis->SetTickLabels(array('17-25','26-34','35-42','43-50'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($datos);

// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot));
// ...and add it to the graPH
$graph->Add($gbplot);


$b1plot->SetColor("white");
$b1plot->SetFillColor("#cc1111");

$graph->title->Set("EDAD MEDIA DE USUARIOS");
$graph->xaxis->title->Set("EDAD DE USUARIOS");
$graph->yaxis->title->Set("Nº USUARIOS");

// Display the graph
$graph->Stroke();
			
			
			
			
/*$graph = new Graph(600,700);    
$graph->SetScale("textlin");
 
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
 
// Create the error plot
$errplot=new ErrorPlot($apertura);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$errplot->SetCenter();
 
// Add the plot to the graph
$graph->Add($errplot);
 
$graph->title->Set("Horarios");
$graph->xaxis->title->Set("Instalaciones");
$graph->yaxis->title->Set("Hora");
 
$graph->xaxis->SetTickLabels($sala);
 
// Display the graph
$graph->Stroke();
       		
                $graph = new Graph(600,700,'auto');
                $graph->SetScale('textlin');
                $graph->Set90AndMargin(60,30,80,30);
                $graph->xaxis->SetLabelAlign('right','center','right');
                $graph->yaxis->SetLabelAlign('center','bottom');
                $graph->xaxis->SetTickLabels($sala);
                $graph->title->Set('');
               
                $bplot = new BarPlot($datos);
                $bplot->SetFillColor('orange');
                $bplot->SetWidth(0.8);
                $bplot->SetYMin(1);
                $graph->Add($bplot);
  $bplot->value->Show();
                $graph->Stroke();*/
			
 }
  ?>