<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
include('connect_db.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

//$registro = mysql_query("SELECT * FROM personal WHERE Nom_Personal LIKE '%$dato%' OR Nom_Departamento like '%$dato%' OR id_personal like '$dato' ORDER BY Nom_Personal ASC");

$registro = mysql_query("SELECT * FROM reg_serv_copiado WHERE id_personal = '$dato' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="30">Id_Personal</th>
                <th width="200">Departamento</th>
                <th width="250">Nombre</th>
                <th width="150">Numero de Copias</th>
                <th width="100">Tipo de Servici</th>
                <th width="100">Fecha</th>
                <th width="100">Opciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['id_personal'].'</td>
				<td>'.$registro2['departamento'].'</td>
				<td>'.$registro2['maestro'].'</td>
				<td>'.$registro2['num_copias'].'</td>
				<td>'.$registro2['clave'].'</td>
				<td>'.$registro2['fecha'].'</td>
				
				<td> <a href="../vistas/modifica-servicio-personal.php?id='.$registro2['id_reg_serv_copiado'].'" class="glyphicon glyphicon-pencil"></a>
				<a href="javascript:eliminarServicio('.$registro2['id_reg_serv_copiado'].')" class="glyphicon glyphicon-remove-circle"></td>
			</tr>';
	}//Codigo Correcto de Javacript
}else{

	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
}
?>