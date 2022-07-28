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
$pdf->Cell(0,10,'LISTA DE LA "TERNA" DE POSTULANTES',1,1,"C");
$pdf->SetFont('Arial','B',9);
$pdf->Cell(9,8,'No.',1,0,"C");
$pdf->Cell(25,8,'Nombres',1,0,"C");
$pdf->Cell(25,8,'Ape. Paterno',1,0,"C");
$pdf->Cell(25,8,'Ape. Materno',1,0,"C");
$pdf->Cell(20,8,'C.I.',1,0,"C");
$pdf->Cell(15,8,'CD Nota',1,0,"C");
$pdf->Cell(20,8,'CD Salida',1,0,"C");
$pdf->Cell(12,8,'COM',1,0,"C");
$pdf->Cell(12,8,'CDD',1,0,"C");
$pdf->Cell(12,8,'INI',1,0,"C");
$pdf->Cell(12,8,'TRE',1,0,"C");
$pdf->Cell(12,8,'INT',1,0,"C");
$pdf->Cell(15,8,'CB Nota',1,0,"C");
$pdf->Cell(20,8,'CB Salida',1,0,"C");
$pdf->Cell(25,8,'RESULTADO',1,0,"C");

$query="SELECT * FROM postulantes p INNER JOIN evaluacion e ON p.id = e.id_postulante ORDER BY vcb_suma DESC";
$result = mysqli_query($mysqli, $query);
$no=0;
$cont = 1;
while($row = mysqli_fetch_array($result) and $cont <= 3){
	$no=$no+1;
	$pdf->Ln(8);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(9,8,$no,1,0,"C");
	$pdf->Cell(25,8,$row['nombres'],1);
	$pdf->Cell(25,8,$row['ape_paterno'],1);
	$pdf->Cell(25,8,$row['ape_materno'],1);
	$pdf->Cell(20,8,$row['ci'],1,0,"C");
	$pdf->Cell(15,8,$row['vcd_suma'],1,0,"C");
	$pdf->Cell(20,8,$row['vcd_salida'],1,0,"C");
	$pdf->Cell(12,8,$row['vcb_com'],1,0,"C");
	$pdf->Cell(12,8,$row['vcb_cdd'],1,0,"C");
	$pdf->Cell(12,8,$row['vcb_ini'],1,0,"C");
	$pdf->Cell(12,8,$row['vcb_tre'],1,0,"C");
	$pdf->Cell(12,8,$row['vcb_int'],1,0,"C");
	$pdf->Cell(15,8,$row['vcb_suma'],1,0,"C");
	$pdf->Cell(20,8,$row['vcb_salida'],1,0,"C");
	$pdf->Cell(25,8,$row['resultado'],1,0,"C");

	$cont = $cont + 1;
}
$pdf->Output();
?>