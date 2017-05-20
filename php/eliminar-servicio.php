<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
include('connect_db.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM reg_serv_copiado WHERE id_personal = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM reg_serv_copiado ORDER BY id_personal ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="30">Id_Personal</th>
                <th width="200">Departamento</th>
                <th width="250">Nombre</th>
                <th width="150">Numero de Copias</th>
                <th width="100">Clave</th>
                <th width="100">Fecha</th>
                <th width="100">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['id_personal'].'</td>
				<td>'.$registro2['departamento'].'</td>
				<td>'.$registro2['maestro'].'</td>
				<td>'.$registro2['num_copias'].'</td>
				<td>'.$registro2['clave'].'</td>
				<td>'.$registro2['fecha'].'</td>

				<td> 
				<a href="../vistas/modifica-servicio-personal.php?id='.$registro2['id_personal'].'" class="glyphicon glyphicon-pencil"></a>
				<a href="javascript:eliminarServicio('.$registro2['id_personal'].')" class="glyphicon glyphicon-remove-circle"></td>
				
				</tr>';
	}
echo '</table>';
}
?>

<!--<a href="../vistas/reporte-por-usuario.php?id='.$registro2['id_personal'].'" class="glyphicon glyphicon-th-list"></a>-->

