<!DOCTYPE html>
<?php   
session_start();
if (@!$_SESSION['user']) {
	header("Location:../index.php");
}else{
// Recibimos por POST los datos procedentes del formulario   
include("connect_db.php");
//$fecha = date('Y-m-d');
$fecha = $_POST['fecha'];
  


$departamento = $_POST["Nom_Departamento"];



//if (@$_POST['BtnGuardar']) {
	mysql_query("INSERT INTO reg_serv_copiado (departamento, maestro, num_copias, clave, fecha) VALUES ('$departamento','$_POST[maestro]','$_POST[num_copias]','$_POST[clave]','$fecha')", $conexion);
	//echo "datos insertados correctamente";
	echo '<script>alert("Datos Guardados Con Exito")</script> ';
		
		echo "<script>location.href='../vistas/solicitudes-pendientes.php'</script>";
//}

}
?>   
