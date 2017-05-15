<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
	$desde = $_GET['desde'];
	$hasta = $_GET['hasta'];

	$verDesde = date('d/m/Y', strtotime($desde));
	$verHasta = date('d/m/Y', strtotime($hasta));
}else{
	$desde = '1111-01-01';
	$hasta = '9999-12-30';

	$verDesde = '__/__/____';
	$verHasta = '__/__/____';
}
require('../fpdf/fpdf.php');
require('connect_db.php');
$tota=0;

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../images/ithlogo.png' , 10 ,8, 16 , 16,'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, 'Editorial ITH', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, ''.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'Reporte de Servicios', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
$pdf->Cell(100, 8, 'Desde: '.$verDesde.' hasta: '.$verHasta, 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(60, 8, 'Departamento', 1);
$pdf->Cell(20, 8, 'No. de Copias', 1);

$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);

//CONSULTA
//$productos = mysql_query("SELECT * FROM reg_serv_copiado WHERE fecha BETWEEN '$desde' AND '$hasta' ");

$productos = mysql_query("SELECT departamento, SUM(num_copias) FROM reg_serv_copiado WHERE fecha  BETWEEN '$desde' AND '$hasta' GROUP BY departamento");

$query_total = mysql_query("select sum(res.total) from (SELECT departamento, SUM(num_copias) as total FROM reg_serv_copiado WHERE fecha  BETWEEN '$desde' AND '$hasta' GROUP BY departamento) as res");
//$suma = mysql_query("SELECT departamento FROM reg_serv_copiado WHERE fecha BETWEEN '$desde' AND '$hasta' ");
//$suma2 = mysql_query("SELECT SUM(num_copias) FROM reg_serv_copiado WHERE fecha BETWEEN '$desde' AND '$hasta' ");


$total = mysql_fetch_array($query_total);
while($productos2 = mysql_fetch_array($productos)){


	$pdf->Cell(60, 8,$productos2['departamento'], 0);
	$pdf->Cell(20, 8, $productos2['SUM(num_copias)'], 0);
	$pdf->Ln(8);
	//$pdf->$total = $total + $productos2['num_copias'];
}

$pdf->Cell(60, 8, 'Total', 1);
$pdf->Cell(20, 8,$total['sum(res.total)'], 1);

	


    //$pdf->Cell(20,8, $suma,0);
    //$pdf->Cell(20,8, $suma2,0);
$pdf->Output('reporte.pdf','I');
}
?>