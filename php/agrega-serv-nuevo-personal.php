<!DOCTYPE html>
<?php   
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
// Recibimos por POST los datos procedentes del formulario   
include("connect_db.php");
//$fecha = date('Y-m-d');
$fecha = $_POST['fecha'];
$maestro = $_POST["maestro"];
$num_copias = $_POST["num_copias"];
  
//$con=mysql_connect($host,$user,$pass) or die ("Problemas al conectar");
//mysql_select_db($baseDatos,$con)or die(mysql_error());

$departamento = $_POST["Nom_Departamento"];

$clave = $_POST["clave"];

$query_string = "SELECT servicio FROM tipo_servicio where id = '$clave'";
$query = mysql_query($query_string) or die(mysql_error());

$tclave;
while ($row = mysql_fetch_assoc($query)) {
	$tclave= $row['servicio'];
}

//if (@$_POST['BtnGuardar']) {
	$query=mysql_query("INSERT INTO reg_serv_copiado(departamento, maestro, num_copias, clave, fecha) VALUES ('$departamento','$maestro','$num_copias','$tclave','$fecha')", $conexion);
	if($query){
		echo '<script>alert("Datos Guardados Con Exito");</script> ';
		echo "<script>location.href='../vistas/principal.php';</script>";
	}else{
		echo "Incorrecto";
	}
	//echo "datos insertados correctamente";
	
//}
}

?>   