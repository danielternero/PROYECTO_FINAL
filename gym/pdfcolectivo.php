<?php
  session_start();
if (!isset($_SESSION["user"])) {
          header("location: Proyecto1.php");
          }
require('./font/fpdf.php');
require('./configuraciondb.php');
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 10);
$pdf->Image('../img/logo.png' , 165 ,10, 35 , 35,'PNG');
$pdf->Cell(150, 10, 'USUARIO',1);

$pdf->Ln(10);
$pdf->Cell(170, 20, 'Fecha: '.date('d-m-Y').'');

$pdf->SetFont('helvetica', '', 9);
$pdf->Ln(26);
$pdf->SetFont('HELVETICA', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 10, 'TABLA DE EJERCICIOS', 0);
$pdf->Ln(23);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(17, 8, 'DIA',1);
$pdf->Cell(28, 8, 'NOMBRE EJER',1);
$pdf->Cell(25, 8, 'SALA',1);
$pdf->Cell(20, 8, 'PLANTA',1);
$pdf->Cell(27, 8, 'REQ_MAQUINA',1);
$pdf->Cell(19, 8, 'MAQUINA',1);
$pdf->Cell(13, 8, 'SERIES',1);
$pdf->Cell(24, 8, 'REPETICIONES',1);
$pdf->Cell(17, 8, 'TIEMPO',1);

$pdf->Ln(8);
$pdf->SetFont('Arial');


if ($result = $connection->query("SELECT * FROM plan join usuario on plan.FKDNI=usuario.DNI join conforma on plan.ID_PLAN=conforma.FKID_PLAN join ejercicios on conforma.FKID_EJERCICIO=ejercicios.ID_EJERCICIO join instalaciones on ejercicios.FKID_INSTALACION=instalaciones.ID_INSTALACION;")) {
              if ($result->num_rows===0) {
                echo "NO TIENE PLAN ASIGNADO";
              } else {
               $i=0;
                  
                  
                  while($obj = $result->fetch_object()) {
	
	$pdf->Cell(17, 8, $obj->DIA_SEMANA, 1);
	$pdf->Cell(28, 8, $obj->NOMBRE_EJER, 1);
	$pdf->Cell(25, 8, $obj->SALA, 1);
	$pdf->Cell(20, 8, $obj->PLANTA,1);
	$pdf->Cell(27, 8, $obj->REQUIERE_MAQUINA, 1);
	$pdf->Cell(19, 8, $obj->CLASIFICACION, 1);
	$pdf->Cell(13, 8, $obj->SERIES, 1);
	$pdf->Cell(24, 8, $obj->REPETICIONES, 1);
	$pdf->Cell(17, 8, $obj->TIEMPO_ESTIMADO, 1);
	
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