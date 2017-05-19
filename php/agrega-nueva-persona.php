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

echo "Debe escribir el nombre completo!";


}else{
	$id = $_POST["id"];
	$nombreapellido = $_POST["nombre"];
	$departamento = $_POST["departamento"];
	$Email = $_POST["email"];

	$query_string = "SELECT id_personal  FROM personal where id_personal = $id";
	$query = mysql_query($query_string) or die(mysql_error());
	$existe = false;
	while ($row = mysql_fetch_assoc($query)) {
		if ($row['id_personal']!=""){
			echo("Este registro ya existe!");
			$existe = true;	
		}
	}

	$query_string = "SELECT Nom_Departamento FROM departamentos where ID_Departamento = '$departamento'";
	$query = mysql_query($query_string) or die(mysql_error());

	$nomdepa = "";

	while ($row = mysql_fetch_assoc($query)) {
		$nomdepa = $row['Nom_Departamento'];
	}

if(!$existe){
		mysql_query("INSERT INTO personal 
		(id_personal,Nom_Personal,Nom_Departamento,Correo_Electronico,password,ID_Departamento) VALUES 
		('$id','$nombreapellido','$departamento','$Email','$nomdepa','')", $conexion);
		echo "Datos Guardados Con Exito";
}

} 

}


?>  