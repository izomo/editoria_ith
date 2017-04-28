<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['Nom_Personal']) {
	header("Location:../index.php");
}
?>		
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Oficina Editorial - ITH -</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <link rel="shortcut icon" href="../images/favicon.ico">
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
			<li class=""><a href="principal-maestros.php">Principal</a></li>
			 
	
		</ul>
		<form action="#" class="navbar-search form-inline" style="margin-top:6px">
		
		</form>
		<ul class="nav pull-right">
		<li><a href="">Bienvenido <strong><?php echo $_SESSION['Nom_Personal'];?></strong> </a></li>
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

		$sql="SELECT * FROM personal WHERE Nom_Personal= '".$_SESSION['Nom_Personal']."'";
		$ressql=mysql_query($sql);
		while ($row=mysql_fetch_row ($ressql)){
		    	$id=$row[0];
		    	$Nombre=$row[1];
		    	$Departamento=$row[2];
		    	$email=$row[3];
		    	$contra = $row[4];
		    }



		?>
		<div align="center">
		<form name="form1" action="../php/ejecuta-actualizar-maestro.php" method="post">
				Id<br><input type="text" name="id" minlength="0" maxlength="10000" value= "<?php echo $id ?>" readonly="readonly"><br>
				Nombre<br> <input type="text" name="Nombre" minlength="8" maxlength="50" value="<?php echo $Nombre?>" readonly="readonly"><br>
				Departamento<br> <input type="text" name="Departamento" minlength="8" maxlength="30" value="<?php echo $Departamento?>" readonly="readonly"><br>
				Correo Electronico<br> <input type="email" name="email" minlength="8" maxlength="30" value="<?php echo $email?>" required><br>
				<br>
				Contraseña<br>
				<input type="password" value="<?php echo $contra ?>" name="pass" minlength="6" maxlength="16" required>
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