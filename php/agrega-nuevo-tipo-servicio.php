<!DOCTYPE html>
<?php   
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
// Recibimos por POST los datos procedentes del formulario   
include("connect_db.php");
$servicio = $_POST['agrega-serv'];

//if (@$_POST['BtnGuardar']) {
	mysql_query("INSERT INTO tipo_servicio (servicio) VALUES ('$servicio')", $conexion);
	//echo "datos insertados correctamente";
	echo '<script>alert("Datos Guardados Con Exito")</script> ';
		
		echo "<script>location.href='modifica-servicio.php'</script>";
//}
}

?>   