<?php

session_start();
if (@!$_SESSION['Nom_Personal']) {
  header("Location:../index.php");
}
else{
//extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar

	require("connect_db.php");

	$id = $_POST['id'];
	$Nombre = $_POST['Nombre'];
	$Departamento = $_POST['Departamento'];
	$correo = $_POST['email'];
	$pass = $_POST['pass'];


	$sentencia=mysql_query("UPDATE personal SET Nom_Personal='$Nombre', Nom_Departamento='$Departamento', Correo_Electronico= '$correo', password = '$pass' where id_personal='$id'", $conexion) or die (mysql_error());
	//$resent=mysql_query($sentencia);
	if ($sentencia==null) {
		//echo "Error de procesamieno no se han actuaizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: ../vistas/principal-maestros.php");
		
		//echo "<script>location.href='../vistas/admin.php'</script>";
	}else {
		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';
		
		echo "<script>location.href='../vistas/principal-maestros.php'</script>";

		
	}
}
?>