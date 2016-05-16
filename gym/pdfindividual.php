<?php
  session_start();
if (!isset($_SESSION["user"])) {
          header("location: Proyecto1.php");
          }
require('./font/fpdf.php');
require('./configuraciondb.php');
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);

$pdf = new FPDF('Landscape','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 10);
$pdf->Image('../img/logo.png' , 165 ,10, 35 , 35,'PNG');
$pdf->Cell(150, 10, "NOMBRE:".$_SESSION['user'],1);

$pdf->Ln(10);
$pdf->Cell(170, 20, 'Fecha: '.date('d-m-Y').'');

$pdf->SetFont('helvetica', '', 9);
$pdf->Ln(26);
$pdf->SetFont('HELVETICA', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 10,'' , 0);
$pdf->Ln(23);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(17, 8, 'DIA',1);
$pdf->Cell(28, 8, 'NOMBRE EJER',1);
$pdf->Cell(25, 8, 'SALA',1);
$pdf->Cell(20, 8, 'PLANTA',1);
$pdf->Cell(27, 8, 'REQ_MAQUINA',1);
$pdf->Cell(19, 8, 'CLASIFICACION',1);
$pdf->Cell(13, 8, 'SERIES',1);
$pdf->Cell(24, 8, 'REPETICIONES',1);
$pdf->Cell(17, 8, 'TIEMPO',1);


$pdf->Ln(8);
$pdf->SetFont('Arial');


if ($result = $connection->query("SELECT * FROM plan join usuario on plan.FKDNI=usuario.DNI join conforma on plan.ID_PLAN=conforma.FKID_PLAN join ejercicios on conforma.FKID_EJERCICIO=ejercicios.ID_EJERCICIO join instalaciones on ejercicios.FKID_INSTALACION=instalaciones.ID_INSTALACION WHERE nombre='".$_SESSION['user']."';")) {
              if ($result->num_rows===0) {
                echo "NO TIENE PLAN ASIGNADO";
              } else {
               $i=0;
                  
                  
                  while($obj = $result->fetch_object()) {
					  
					 $dia[$i]=$obj->DIA_SEMANA;
                     $nombre[$i]=$obj->NOMBRE_EJER;
                     $sala[$i]=$obj->SALA;
                     $planta[$i]=$obj->PLANTA;
                     $requiere[$i]=$obj->REQUIERE_MAQUINA;
                     $clasificacion[$i]=$obj->CLASIFICACION;
                     $series[$i]=$obj->SERIES;
                     $repeticiones[$i]=$obj->REPETICIONES;
                     $tiempo[$i]=$obj->TIEMPO_ESTIMADO;
                     
	
	$pdf->Cell(17, 8,$dia[$i],1);
	$pdf->Cell(28, 8,$nombre[$i],1);
	$pdf->Cell(25, 8, $sala[$i],1);
	$pdf->Cell(20, 8,$planta[$i],1);
	$pdf->Cell(27, 8,$requiere[$i],1);
	$pdf->Cell(19, 8,$clasificacion[$i],1);
	$pdf->Cell(13, 8, $series[$i],1);
	$pdf->Cell(24, 8,$repeticiones[$i], 1);
	$pdf->Cell(17, 8,$tiempo[$i], 1);
	$pdf->Ln(10);
	$i++;
					  
	 }
              }
          }  else {
            echo "Wrong Query";
            var_dump($result);
          }
	$pdf->Ln(8);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Output();

?>