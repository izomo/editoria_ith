<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
//extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar

	require("connect_db.php");

	$id_anterior = $_GET['id_anterior'];
	$id_modificar = $_POST['id_modificar'];
	$Nombre = $_POST['Nombre'];
	$Departamento = $_POST['Nom_Departamento'];
	$correo = $_POST['email'];

	//$sentencia=mysql_query("UPDATE personal SET id_personal='$id_modificar', Nom_Personal='$Nombre', Nom_Departamento='$Departamento', Correo_Electronico= '$correo' where id_personal='$id_anterior'", $conexion) or die (mysql_error());
	
	$comprobar = mysql_query("SELECT id_personal from personal where id_personal = '$id_modificar' ");

	//$resent=mysql_query($sentencia);
	
	if(mysql_num_rows($comprobar)!=0)  {
		echo '<script>alert("El Id ya existe, Por favor escriba otro");</script> ';
		echo "<script>location.href='../vistas/usuarios.php'</script>";
		//echo "<script>location.href='../vistas/actualizarpersonal.php?id=id_anterior'</script>";

	}else {
		
		$sentencia=mysql_query("UPDATE personal SET id_personal='$id_modificar', Nom_Personal='$Nombre', Nom_Departamento='$Departamento', Correo_Electronico= '$correo' where id_personal='$id_anterior'", $conexion) or die (mysql_error());

		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';
		echo "<script>location.href='../vistas/usuarios.php'</script>";
		
	}

}
?>