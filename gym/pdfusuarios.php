<?php

require('./font/fpdf.php');
require('./configuraciondb.php');
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($connection->connect_errno) {
	printf("Connection failed: %s\n", $connection->connect_error);
	exit();
}
$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 10);
$pdf->Image('../img/logo.png' , 165 ,10, 35 , 35,'PNG');
$pdf->Cell(150, 10, 'Administrador',1);

$pdf->Ln(10);
$pdf->Cell(170, 20, 'Fecha: '.date('d-m-Y').'');

$pdf->SetFont('helvetica', '', 9);
$pdf->Ln(26);
$pdf->SetFont('HELVETICA', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 10, 'LISTADO DE USUARIOS', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(25, 8, 'DNI');
$pdf->Cell(24, 8, 'NOMBRE');
$pdf->Cell(27, 8, 'APELLIDOS');
$pdf->Cell(25, 8, 'FECHA_ALTA');
$pdf->Cell(13, 8, 'EDAD');
$pdf->Cell(15, 8, 'PESO');
$pdf->Cell(20, 8, 'USUARIO');
$pdf->Cell(18, 8, 'CORREO');
$pdf->Ln(8);/*Al no ponerlo se sube la primera fila*/
$pdf->SetFont('Arial');
//CONSULTA
$consulta = $connection->query("SELECT * FROM USUARIO");
while($obj=$consulta->fetch_object()){
	$pdf->Cell(25, 8, $obj->DNI);
	$pdf->Cell(24, 8, $obj->NOMBRE, 0);
	$pdf->Cell(27, 8, $obj->APELLIDO, 0);
	$pdf->Cell(25, 8, $obj->FECHA_ALTA, 0);
	$pdf->Cell(13, 8, $obj->EDAD, 0);
	$pdf->Cell(15, 8, $obj->PESO, 0);
	$pdf->Cell(20, 8, $obj->USUARIO, 0);
	$pdf->Cell(15, 8, $obj->CORREO_ELECTRONICO, 0);
	
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Output();

?>