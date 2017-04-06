<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:../index.php");
}else{

	extract($_GET);
		require("connect_db.php");

		$estatus = "Finalizado";

		$sentencia=mysql_query("UPDATE solicitudes_maestros SET estatus = '$estatus' where id_solicitud =$id", $conexion) or die (mysql_error());
	//$resent=mysql_query($sentencia);
	if ($sentencia==null) {
		//echo "Error de procesamieno no se han actuaizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: ../vistas/principal-maestros.php");
		
		//echo "<script>location.href='../vistas/admin.php'</script>";
	}else {
		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';
		
		echo "<script>location.href='../vistas/solicitudes-pendientes.php'</script>";

		
	}
}
?>