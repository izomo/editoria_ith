<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
	require('../fpdf/fpdf.php');

	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,10,'Hola Mundo');
	$pdf->Cell(40,20,'Estamos viendo','C');
	$pdf->Output();
}
?>