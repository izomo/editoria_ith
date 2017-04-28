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

/*$query = mysql_query("select Nom_Departamento from departamentos", $conexion);
$nomdepa_input = array();
while ($row = mysql_fetch_assoc($query)) {
	$nomdepa_input = $row['Nom_Departamento'];
}*/

echo '<script>alert("Debe escribir el nombre completo")</script>';
echo "<script>location.href='../vistas/agrega-personal.php'</script>";


}else{
$id = $_POST["id"];
$nombreapellido = $_POST["nombre"];
$departamento = $_POST["Nom_Departamento"];
$Email = $_POST["email"];

$query_string = "SELECT Nom_Departamento FROM departamentos where ID_Departamento = '$departamento'";
$query = mysql_query($query_string) or die(mysql_error());

$nomdepa = "";

while ($row = mysql_fetch_assoc($query)) {
	$nomdepa = $row['Nom_Departamento'];
}
	mysql_query("INSERT INTO personal 
		(id_personal,Nom_Personal,Nom_Departamento,Correo_Electronico,password,ID_Departamento) VALUES 
		('$id','$nombreapellido','$departamento','$Email','$nomdepa','')", $conexion);

	echo '<script>alert("Datos Guardados Con Exito")</script> ';	
	echo "<script>location.href='../vistas/usuarios.php'</script>";
	} 

	}


?>  