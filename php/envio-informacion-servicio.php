<?php


//extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar

	require("connect_db.php");

	$ID_personal = $_POST['id'];
	$Nombre = $_POST['maestro'];
	$Departamento = $_POST['Nom_Departamento'];
	$Numero_copias = $_POST['num_copias'];
	$Clave = $_POST['clave'];
	$Fecha = $_POST['fecha'];
	$Estatus = 'Pendiente';

	$sentencia=mysql_query("INSERT INTO peticiones (id_personal, maestro, departamento, num_copias, clave, fecha, estatus) VALUES
		('$ID_personal','$Nombre','$Departamento','$Numero_copias','$Clave','$Fecha','$Estatus') ", $conexion) or die (mysql_error());

	//$resent=mysql_query($sentencia);
	if ($sentencia==null) {
		//echo "Error de procesamieno no se han actuaizado los datos";
		
		echo ' <script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: ../vistas/usuarios.php");
		
		//echo "<script>location.href='../vistas/admin.php'</script>";
	}else {

		echo '<script>alert("Peticion Enviada")</script> ';
		echo "<script>location.href='../peticiones.php'</script>";
		
	}

?>