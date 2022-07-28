<?php
require('../fpdf/fpdf.php');
include('../connection/config.php');

$pdf = new FPDF();
///var_dump(get_class_methods($pdf));

$pdf->AddPage();
$pdf->SetFont('Arial','',7);
$pdf->Cell(50,10,'Fecha:'.date('d-m-Y').'',0,"R");
$pdf->Ln(15);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(0,10,'LISTA DE POSTULANTES',1,1,"C");
$pdf->SetFont('Arial','B',9);
$pdf->Cell(10,8,'No.',1,0,"C");
$pdf->Cell(35,8,'Nombres',1,0,"C");
$pdf->Cell(30,8,'Ape. Paterno',1,0,"C");
$pdf->Cell(30,8,'Ape. Materno',1,0,"C");
$pdf->Cell(25,8,'C.I.',1,0,"C");
$pdf->Cell(18,8,'Edad',1,0,"C");
$pdf->Cell(22,8,'Telefono',1,0,"C");
$pdf->Cell(20,8,'Estado',1,0,"C");

$query="SELECT * FROM postulantes";
$result = mysqli_query($mysqli, $query);
$no=0;
while($row = mysqli_fetch_array($result)){
	$no=$no+1;
	$pdf->Ln(8);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(10,8,$no,1,0,"C");
	$pdf->Cell(35,8,$row['nombres'],1);
	$pdf->Cell(30,8,$row['ape_paterno'],1);
	$pdf->Cell(30,8,$row['ape_materno'],1);
	$pdf->Cell(25,8,$row['ci'],1,0,"C");
	$pdf->Cell(18,8,$row['edad'],1,0,"C");
	$pdf->Cell(22,8,$row['telefono'],1,0,"C");
	$pdf->Cell(20,8,$row['estado'],1,0,"C");
	
}
$pdf->Output();
?>
