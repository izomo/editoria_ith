<?php

session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
//extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar

	require("connect_db.php");

	$Id_servicio = $_POST['ID_servicio'];
	$Departamento = $_POST['Departamento_s'];
	$Id_personal = $_POST['ID_personal'];
	$Nombre = $_POST['Maestro'];
	$Numero_copias = $_POST['Copias_s'];
	$Clave = $_POST['Clave_s'];
	$Fecha = $_POST['Fecha_s'];

	$sentencia=mysql_query("UPDATE reg_serv_copiado SET 
		id_reg_serv_copiado='$Id_servicio',
		id_personal='$Id_personal', 
		departamento='$Departamento', 
		maestro='$Nombre', 
		num_copias='$Numero_copias', 
		clave='$Clave', 
		fecha='$Fecha' 
		where 
		id_reg_serv_copiado='$Id_servicio'", $conexion) or die (mysql_error());

	//$resent=mysql_query($sentencia);
	if ($sentencia==null) {
		//echo "Error de procesamieno no se han actuaizado los datos";
		
		echo ' <script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: ../vistas/usuarios.php");
		
		//echo "<script>location.href='../vistas/admin.php'</script>";
	}else {

		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';
		echo "<script>location.href='../vistas/servicio-copiado.php'</script>";
		
	}
}
?>