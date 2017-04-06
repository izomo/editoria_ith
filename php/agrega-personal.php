<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
include('connect_db.php');
$id = $_POST['id_personal'];
$proceso = $_POST['pro'];
$nocontrol = $_POST['nocontrol'];
$nombre = $_POST['nombre'];
$departamento = $_POST['Nom_Departamento'];
$correo = $_POST['email'];
$iddepartamento = $_POST['ID_Departamento'];
//$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO personal (id_personal, Nom_Personal, Nom_Departamento, Correo_Electronico, ID_Departamento)VALUES('$nocontrol','$nombre','$departamento','$correo', '$iddepartamento')");
	break;
	
	case 'Edicion':
		mysql_query("UPDATE personal SET id_personal = '$nocontrol', Nom_Personal = '$nombre', Nom_Departamento = '$departamento', Correo_Electronico = '$correo' WHERE id_personal = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM personal ORDER BY id_personal ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="30">ID</th>
                <th width="50">Nombre</th>
                <th width="150">Departamento</th>
                <th width="150">Correo Electronico</th>
				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['id_personal'].'</td>
				<td>'.$registro2['Nom_Personal'].'</td>
				<td>'.$registro2['Nom_Departamento'].'</td>
				<td>'.$registro2['Correo_Electronico'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['id_personal'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_personal'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
}
?>