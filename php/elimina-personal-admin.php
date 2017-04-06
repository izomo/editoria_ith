<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
include('connect_db.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM personal WHERE id_personal = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM personal ORDER BY id_personal ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="30">Id_Personal</th>
                <th width="300">Nombre</th>
                <th width="300">Departamento</th>
                <th width="150">Correo Electronico</th>
                <th width="150">Password</th>
				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['id_personal'].'</td>
				<td>'.$registro2['Nom_Personal'].'</td>
				<td>'.$registro2['Nom_Departamento'].'</td>
				<td>'.$registro2['Correo_Electronico'].'</td>
				<td>'.$registro2['password'].'</td>
				<td><a href="../vistas/actualizarpersonaladmin.php?id=('.$registro2['id_personal'].');" class="glyphicon glyphicon-edit"></a>   <a href="javascript:eliminarPersonal('.$registro2['id_personal'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
}
?>