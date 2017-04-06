<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:../index.php");
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Editorial ITH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<link href="../bootstrap/css/bootstrap2.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme2.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme2.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/myjava.js"></script>
  </head>
  <style type="text/css">
body {
	background-color: ##F2F2F2;
	
}
body,td,th {
	color: #FFF;
}

</style>
<header>
  <img src="../images/header-ith.png">

</header>
<p>&nbsp;</p>


<div class="container">
<header class="header">

</header>

  <!-- Navbar
    ================================================== -->


<div class="navbar">
  <div class="navbar-inner">
	<div class="container">
	  <div class="nav-collapse">
		<ul class="nav">
			<li class=""><a href="../vistas/principal.php">Principal</a></li>
			 
	
		</ul>
		<form action="#" class="navbar-search form-inline" style="margin-top:6px">
		
		</form>
		<ul class="nav pull-right">
		<li><a href="">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a></li>
			  <li><a href="../php/desconectar.php"> Cerrar Cesión </a></li>			 
		</ul>
	  </div><!-- /.nav-collapse -->
	</div>
  </div><!-- /navbar-inner -->
</div>

<!-- ======================================================================================================================== -->
<div class="row">
	
	
		
	<div class="span12">

		<div class="caption">

		<div class="well well-small">
		<hr class="soft"/>
		<h4 align="center" style="color: #605C5C">Reportes y/o Busquedas por Personal</h4>
		<div class="row-fluid">
		
		<?php

				  include ('connect_db.php');
				  $total = 0;
				  $departamento = $_POST['Nom_Departamento'];
				  $desde = $_POST['fechainicio'];
				  $hasta = $_POST ['fechafinal'];

				  if(isset($desde)==false){

				  	$desde = $hasta;
				  }
				  if(isset($hasta)==false){
				  	$desde = $hasta;
				  }

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
$query_string = "SELECT Nom_Departamento FROM departamentos where ID_Departamento = '$departamento'";
$query = mysql_query($query_string) or die(mysql_error());

while ($row = mysql_fetch_assoc($query)) {
	$nomdepa= $row['Nom_Departamento'];
}

$registro = mysql_query("SELECT * FROM reg_serv_copiado WHERE departamento = '$nomdepa' and fecha BETWEEN '$desde' AND '$hasta' ORDER BY id_reg_serv_copiado ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th style="color: #605C5C" width="30">ID</th>
                <th style="color: #605C5C" width="180">Departamento</th>
                <th style="color: #605C5C" width="180">Maestro</th>
                <th style="color: #605C5C" width="50">No. Copias</th>
                <th style="color: #605C5C" width="50">Clave</th>
                <th style="color: #605C5C" width="30">Fecha</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td style="color: #837e7e">'.$registro2['id_reg_serv_copiado'].'</td>
				<td style="color: #837e7e">'.$registro2['departamento'].'</td>
				<td style="color: #837e7e">'.$registro2['maestro'].'</td>
				<td style="color: #837e7e">'.$registro2['num_copias'].'</td>
				<td style="color: #837e7e">'.$registro2['clave'].'</td>
				<td style="color: #837e7e">'.fechaNormal($registro2['fecha']).'</td>
				</tr>';
				$total = $total + $registro2['num_copias'];
	}
}else{
	echo '<tr>
				<td style="color: #837e7e" colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '<td style="color: #837e7e"></td>
				<td style="color: #837e7e"></td>
				<td style="color: #837e7e"></td>
				<td style="color: #837e7e">Total: '.$total.'</td>
				<td style="color: #837e7e"></td>
				<td style="color: #837e7e"></td>';
echo '</table>';

?>
<table align="right">
	<tr>
		<td>
			<input type="button" value="Imprime Esta Pagina" onClick="window.print()" class="btn btn-primary">
		</td>
	</tr>
</table>


		
		<div class="span8">
		
		</div>	
		</div>	
		<br/>
		


		<!--EMPIEZA DESLIZABLE-->
		
		 <!--TERMINA DESLIZABLE-->



		
		
		</div>

		


		

<!--///////////////////////////////////////////////////Termina cuerpo del documento interno////////////////////////////////////////////-->
</div>

	</div>
</div>
<!-- Footer
      ================================================== -->
<hr class="soften"/>

</div><!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	</style>
  </body>
</html>