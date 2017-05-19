<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:../index.php");
}else{

	
		require("connect_db.php");

		$estatus = "Finalizado";
		$id = $_GET['id'];	
		$sentencia=mysql_query("UPDATE peticiones SET estatus = '$estatus' where id_peticiones =$id", $conexion) or die (mysql_error());
	//$resent=mysql_query($sentencia);
	if ($sentencia==null) {
		//echo "Error de procesamieno no se han actuaizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: ../vistas/principal-maestros.php");
		
		//echo "<script>location.href='../vistas/admin.php'</script>";
	}else {
		echo '<script>alert("Servicio Atendido")</script> ';
		
		echo "<script>location.href='../vistas/solicitudes-pendientes.php'</script>";

		
	}
}
?>