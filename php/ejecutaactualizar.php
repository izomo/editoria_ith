<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{


extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	require("connect_db.php");
	$sentencia="update login set user='$user', password='$pass', email='$email', pasadmin='$pasadmin' where id='$id'";
	$resent=mysql_query($sentencia);
	if ($resent==null) {
		echo "Error de procesamieno no se han actuaizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: ../vistas/users.php");
		
		echo "<script>location.href='../vistas/users.php'</script>";
	}else {
		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';
		
		echo "<script>location.href='../vistas/users.php'</script>";
		
	}
}
?>