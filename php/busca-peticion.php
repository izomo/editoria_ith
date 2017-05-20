<?php

include('connect_db.php');

$idPersonal = $_POST['id_personal'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$query = "SELECT *  FROM personal where id_personal = $idPersonal";
$registro = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($registro)==0){
	echo(false);
}else{
		//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX
		$datos = array();	
		while($registro2 = mysql_fetch_array($registro)){
			$datos[] = $registro2[1];
			$datos[] = $registro2[2];
		}
		//Codigo Correcto de Javacript
		echo json_encode($datos);
	
}

?>