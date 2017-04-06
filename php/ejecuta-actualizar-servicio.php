<?php

session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
//extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar

	require("connect_db.php");

	$id = $_POST['id'];
	$Nombre = $_POST['Nombre'];


	$sentencia=mysql_query("UPDATE tipo_servicio SET servicio='$Nombre' where id='$id'", $conexion) or die (mysql_error());
	//$resent=mysql_query($sentencia);
	if ($sentencia==null) {
		//echo "Error de procesamieno no se han actuaizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: modifica-servicio.php");
		
		//echo "<script>location.href='../vistas/admin.php'</script>";
	}else {
		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';
		
		echo "<script>location.href='modifica-servicio.php'</script>";

		
	}
}
?>