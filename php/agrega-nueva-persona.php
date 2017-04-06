<!DOCTYPE html>
<?php   
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
	include("connect_db.php");
$pass = "iTh12345";	
$nombre=$_POST['nombre'];
if(strlen($nombre) < 10 ){

echo '<script>alert("Debe escribir el nombre completo")</script>';
	echo "<script>location.href='../vistas/agrega-personal.php'</script>";
}else{

$departamento = $_POST["Nom_Departamento"];

$query_string = "SELECT Nom_Departamento FROM departamentos where ID_Departamento = '$departamento'";
$query = mysql_query($query_string) or die(mysql_error());

while ($row = mysql_fetch_assoc($query)) {
	$nomdepa= $row['Nom_Departamento'];
}
	mysql_query("INSERT INTO personal (id_personal, Nom_Personal, Nom_Departamento, Correo_Electronico, ID_Departamento, password) VALUES ('$_POST[id]','$_POST[nombre]','$nomdepa','$_POST[email]', '$departamento', '$pass')", $conexion);

	echo '<script>alert("Datos Guardados Con Exito")</script> ';
		
		echo "<script>location.href='../vistas/usuarios.php'</script>";
} 

}


?>  