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
  
//$con=mysql_connect($host,$user,$pass) or die ("Problemas al conectar");
//mysql_select_db($baseDatos,$con)or die(mysql_error());

$departamento = $_POST["Nom_Departamento"];

$query_string = "SELECT Nom_Departamento FROM departamentos where ID_Departamento = '$departamento'";
$query = mysql_query($query_string) or die(mysql_error());

while ($row = mysql_fetch_assoc($query)) {
	$nomdepa= $row['Nom_Departamento'];
}

//if (@$_POST['BtnGuardar']) {
	mysql_query("INSERT INTO reg_serv_copiado (departamento, maestro, num_copias, clave, fecha) VALUES ('$nomdepa','$_POST[maestro]','$_POST[num_copias]','$_POST[clave]','$fecha')", $conexion);
	//echo "datos insertados correctamente";
	echo '<script>alert("Datos Guardados Con Exito")</script> ';
		
		echo "<script>location.href='../vistas/principal.php'</script>";
//}
}

?>   

