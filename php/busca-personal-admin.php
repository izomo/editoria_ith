<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
include('connect_db.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM personal WHERE Nom_Personal LIKE '%$dato%' OR Nom_Departamento like '%$dato%' OR id_personal like '%$dato%' ORDER BY Nom_Personal ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="30">Id_Personal</th>
                <th width="300">Nombre</th>
                <th width="300">Departamento</th>
                <th width="150">Correo Electronico</th>
                <th width="100">Password</th>
                <th width="30">Opciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['id_personal'].'</td>
				<td>'.$registro2['Nom_Personal'].'</td>
				<td>'.$registro2['Nom_Departamento'].'</td>
				<td>'.$registro2['Correo_Electronico'].'</td>
				<td>'.$registro2['password'].'</td>
				<td><a href="../vistas/actualizarpersonaladmin.php?id=('.$registro2['id_personal'].');" class="glyphicon glyphicon-edit"></a>   <a href="javascript:eliminarPersonal('.$registro2['id_personal'].');" class="glyphicon glyphicon-remove-circle"></td>
			</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
}
?>