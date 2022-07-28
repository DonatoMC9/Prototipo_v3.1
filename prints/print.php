<?php
require('../fpdf/fpdf.php');
include('../connection/config.php');
$id = $_GET['id'];

$pdf = new FPDF();
///var_dump(get_class_methods($pdf));

$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,'Fecha: '.date('d-m-Y').'',0,"R");
$pdf->Ln(14);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(100,10,'Perfil de Usuario',1,0);

$query="SELECT * FROM postulantes WHERE id='$id'";
$result = mysqli_query($mysqli, $query);
$no=0;
while($row = mysqli_fetch_array($result)){
	$no=$no+1;
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(50,8,'No.',1,0);
	$pdf->Cell(50,8,$row['id'],1,1);
	
	$pdf->Cell(50,8,'Nombres:',1,0);
	$pdf->Cell(50,8,$row['nombres'],1,1);
	
	$pdf->Cell(50,8,'Apellido Paterno:',1,0);
	$pdf->Cell(50,8,$row['ape_paterno'],1,1);

	$pdf->Cell(50,8,'Apellido Materno:',1,0);
	$pdf->Cell(50,8,$row['ape_materno'],1,1);
	
	$pdf->Cell(50,8,'C.I.:',1,0);
	$pdf->Cell(50,8,$row['ci'],1,1);
		
	$pdf->Cell(50,8,'Edad:',1,0);
	$pdf->Cell(50,8,$row['edad'],1,1);
	
	$pdf->Cell(50,8,'Telefono:',1,0);
	$pdf->Cell(50,8,$row['telefono'],1,1);
}

$pdf->Output();
?>