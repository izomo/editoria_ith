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
    <title>Oficina Editorial  ITH </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<script src="../js/jquery.js"></script>
	<script src="../js/myjava.js"></script>
    <script type="text/javascript">
    	
    	function valida(){
		 campo = document.getElementById("id_modificar");
			if(campo.value==''){
			 alert('El Id no puede estar vacio!');
				return false;
			}
		return true;
		}

    </script>
  </head>
  <style type="text/css">
body {
	background-color: ##F2F2F2;
	
}
body,td,th {
	color: #00000;
}

</style>
<header>
  <img src="../images/header-ith.png">

</header>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
<div class="container">
<header class="header">
<div class="row">
</div>
</header>

  <!-- Navbar
    ================================================== -->


<div class="navbar">
  <div class="navbar-inner">
	<div class="container">
	  <div class="nav-collapse">
		<ul class="nav">
			<li class=""><a href="principal.php">Principal</a></li>
			<li class=""><a href="usuarios.php">Personal</a></li>
			<li class=""><a href="servicio-copiado.php">Servicios</a></li>
			<li class=""><a href="reportes.php">Reportes</a></li>
			<li class=""><a href="solicitudes-pendientes.php">Peticiones</a></li>
		</ul>
		<form action="#" class="navbar-search form-inline" style="margin-top:6px">
		
		</form>
		<ul class="nav pull-right">
		<li><a href="">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a></li>
			  <li><a href="../php/desconectar.php"> Cerrar Sesión </a></li>			 
		</ul>
	  </div><!-- /.nav-collapse -->
	</div>
  </div><!-- /navbar-inner -->
</div>

<!-- ======================================================================================================================== -->
<div class="row">
	
	
		
	<div class="span12">

		<div class="caption">
		
<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<h2> Administración de Personal Registrado</h2>	
		<div class="well well-small">
		<hr class="soft"/>
		<h4 align="center">Edición de Personal</h4>
		<div class="row-fluid">
		
		<?php
		extract($_GET);
		require("../php/connect_db.php");

		
		
		$sql="SELECT * FROM personal WHERE id_personal=$id";
		$ressql=mysql_query($sql);
		while ($row=mysql_fetch_row ($ressql)){
		    	$id=$row[0];
		    	$Nombre=$row[1];
		    	$Departamento=$row[2];
		    	$email=$row[3];
		    }

		$sql="UPDATE personal SET id_personal=$id, Nom_Personal=$Nombre, Nom_departamento=$Departamento, Correo_Electronico=$email WHERE id_personal=$id";


		?>
		<div align="center">
		<form name="form1" onsubmit="return valida()" action="../php/ejecuta-actualizar-personal.php?id_anterior=<?= $id ?>" method="post">
				
				Id<br><input id="id_modificar" type="number" name="id_modificar" min="1" max="10000" value= "<?php echo $id ?>"><br>
				Nombre<br> <input type="text" name="Nombre" value="<?php echo $Nombre?>"><br>

				<!--DEPARTAMENTO-->
				<br>Departamento<br> 
				    <select id="Nom_Departamento" name="Nom_Departamento" required="" >
						<?php	
						include("connect_db.php");

						$query = mysql_query("select Nom_Departamento from departamentos", $conexion) or die(mysql_error());
						$i = 0;
						while ($row = mysql_fetch_assoc($query)) {
							?><option value="<?= $row['Nom_Departamento']; ?>" ><?= $row['Nom_Departamento'];?></option><?php
						$i++; }?>
				    </select><br><br>
				
				Correo Electronico<br> <input type="email" name="email" value="<?php echo $email?>"><br>
				<br>
		</div>
				<input type="submit" name="Guardar" value="Guardar" class="btn btn-success btn-primary">
		</form>

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
    <script src="../bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	</style>
  </body>
</html>