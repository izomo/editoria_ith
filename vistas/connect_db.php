<?php

$conexion = mysql_connect('localhost','root','') or die ('error'.mysql_error());

mysql_select_db('academ', $conexion);


/*
$con=mysqli_connect("http://localhost","root","","academ");

function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}*/

?>