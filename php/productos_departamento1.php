<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
		
	if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0) {
		$desde = date('Y-m-d', strtotime($_GET['desde']));
		$hasta = date('Y-m-d', strtotime($_GET['hasta']));
		$departamento = $_GET['departamento'];

		$verDesde = date('d/m/Y', strtotime($desde));
		$verHasta = date('d/m/Y', strtotime($hasta));
	}else{
		$desde = '1111-01-01';
		$hasta = '9999-12-30';
		$departamento = 'departamento';

		$verDesde = '__/__/____';
		$verHasta = '__/__/____';
		
	}
		require('../fpdf/fpdf.php');
		require('connect_db.php');
		$tota=0;

		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial', '', 10);
		$pdf->Image('../images/pdf-ith.png' , 15 ,18, 180 , 28,'PNG');
		$pdf->Cell(5, 10, '', 0);
		$pdf->Cell(150, 5, '', 0);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, 'Editorial ITH_'.date('d-m-Y').'', 0);
		$pdf->Ln(18);
		$pdf->SetFont('Arial', 'B', 18);
		$pdf->Cell(30, 58, '', 0);
		$pdf->Cell(75, 48, 'Departamento de Comunicacion y Difusion', 0);
		$pdf->Ln(15);
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(80, 28, '', 0);
		$pdf->Cell(5, 38, 'Editorial ITH', 0);
		$pdf->Ln(12);
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(58, 38, '', 0);
		$pdf->Cell(10, 28, 'Reporte de Servicios Por Departamento', 0);
		$pdf->SetFont('Arial', '', 11);
		$pdf->Cell(5, 40, '"'.$departamento.'"', 0);
		$pdf->Ln(9);
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(60, 8, '', 0);
		$pdf->Cell(100, 35, 'Desde: '.$verDesde.' Hasta: '.$verHasta, 0);
		
		$pdf->Ln(22);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(24, 8, '', 0);
		$pdf->Cell(10, 8, 'Id', 1);
		$pdf->Cell(67, 8, 'Maestro', 1);
		$pdf->Cell(18, 8, 'Fecha', 1);
		$pdf->Cell(32, 8, 'Tipo de Copias', 1);
		$pdf->Cell(15, 8, 'N. Copias', 1);
		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 8);
		//CONSULTA
		$productos = mysql_query("SELECT * FROM reg_serv_copiado WHERE departamento = '$departamento' and fecha between '$desde' and '$hasta' ");

		$query_total = mysql_query("SELECT SUM(num_copias) as total FROM reg_serv_copiado WHERE departamento = '$departamento' and fecha between '$desde' and '$hasta' ");

		$total = mysql_fetch_array($query_total);
		while($productos2 = mysql_fetch_array($productos)){
			$pdf->Cell(24, 8, '', 0);
			$pdf->Cell(10, 8,$productos2['id_personal'], 0,0,'C');
			$pdf->Cell(67, 8, $productos2['maestro'], 0);
			$pdf->Cell(18, 8, date('d/m/Y', strtotime($productos2['fecha'])), 0,0,'C');
			$pdf->Cell(32, 8, $productos2['clave'], 0);
			$pdf->Cell(15, 8, $productos2['num_copias'], 0,0,'C');
			$pdf->Ln(8);
			//$total = $total + $productos2['num_copias'];
	}
	   // $pdf->Cell(20,8, $total,0);
	//Parte Inferior
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(24, 8, '', 0);
	$pdf->Cell(127, 8, 'Total de Copias del Departamento', 1);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(15, 8,$total['total'], 1,0,'C');
	

	$pdf->Output('reporte.pdf','I');
}


?>