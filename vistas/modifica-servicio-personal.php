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

		
		/*
		$sql="SELECT * FROM personal WHERE id_personal=$id";
		$ressql=mysql_query($sql);
		while ($row=mysql_fetch_row ($ressql)){
		    	$id=$row[0];
		    	$Nombre=$row[1];
		    	$Departamento=$row[2];
		    	$email=$row[3];
		    }*/

		$sql="SELECT * FROM reg_serv_copiado WHERE 	id_reg_serv_copiado=$id";
		$ressql=mysql_query($sql);
		while ($row=mysql_fetch_row ($ressql)){
		    	$id=$row[0];
		    	$Departamento=$row[1];
		    	$Nombre=$row[2];
		    	$Numero_copias=$row[3];
		    	$Clave=$row[4];
		    	$Fecha=$row[5];
		    }

		/*
		$sql="UPDATE personal SET id_personal=$id, Nom_Personal=$Nombre, Nom_departamento=$Departamento, Correo_Electronico=$email WHERE id_personal=$id"
		*/

		$sql="UPDATE reg_serv_copiado SET id_reg_serv_copiado=$id, departamento=$Departamento, maestro=$Nombre, num_copias=$Numero_copias, clave=$Clave, fecha=$Fecha WHERE id_reg_serv_copiado=$id"

		/*
		$sql="SELECT * FROM personal WHERE Nom_Personal=$Nombre";
		$ressql=mysql_query($sql);
		while ($row=mysql_fetch_row ($ressql)){
		    	$id=$row[0];
		    	$Nombre=$row[1];
		    	$Departamento=$row[2];
		    	$email=$row[3];
		    }

		$sql="SELECT * FROM personal WHERE Correo_Electronico=$email";
		$ressql=mysql_query($sql);
		while ($row=mysql_fetch_row ($ressql)){
		    	$id=$row[0];
		    	$Nombre=$row[1];
		    	$Departamento=$row[2];
		    	$email=$row[3];
		    }

		$sql="SELECT * FROM personal WHERE Nom_departamento=$Departamento";
		$ressql=mysql_query($sql);
		while ($row=mysql_fetch_row ($ressql)){
		    	$id=$row[0];
		    	$Nombre=$row[1];
		    	$Departamento=$row[2];
		    	$email=$row[3];
		    }*/

		?>
		<div align="center">
		<form name="form1" action="../php/ejecuta-actualizar-servicios.php?id_anterior=<?= $id ?>" method="post">
				
				Id<br><input type="text" name="id_modificar" value= "<?php echo $id ?>"><br>
				
				<!--DEPARTAMENTO-->
				<br>Departamento<br> 
				    <select id="Nom_Departamento" name="Departamento_s" required="" >
						<?php	
						include("connect_db.php");

						$query = mysql_query("select Nom_Departamento from departamentos", $conexion) or die(mysql_error());
						$i = 0;
						while ($row = mysql_fetch_assoc($query)) {
							?><option value="<?= $row['Nom_Departamento']; ?>" ><?= $row['Nom_Departamento'];?></option><?php
						$i++; }?>
				    </select><br><br>

				Nombre<br> <input type="text" name="Maestro" value="<?php echo $Nombre?>"><br>

				Numero de Copias (Max 10,000)<br> <input style="border-radius:15px;" type="number" min="1" max="10000" name="Copias_s" value="<?php echo $Numero_copias?>"><br>

				Clave<br>

					<select type="text" id="clave" name="Clave_s" style="border-radius:15px;" required>
						<?php	
						include("connect_db.php");

						$query = mysql_query("select servicio from tipo_servicio", $conexion) or die(mysql_error());
						$i = 0;
						while ($row = mysql_fetch_assoc($query)) {
							?><option value="<?= $row['servicio']; ?>" ><?= $row['servicio'];?></option><?php
						$i++; }?>
				    </select><br><br>
			
				Fecha<br> <input type="text" name="Fecha_s" value="<?php echo $Fecha?>"><br>
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