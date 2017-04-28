<!DOCTYPE html>
		<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:../index.php");
}
?>
<html lang="en">
  <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editorial ITH</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<link rel="shortcut icon" href="../images/favicon.ico">
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
<script type="text/javascript">
            $("document").ready(function(){
                $("#Departamento").load("../php/departamentos.php");
                $("#Departamento").change(function(){
                	var id = $("#Departamento").val();
                	$.get("../php/maestros.php",{param_id:id})
                	.done(function(data){
                		$("#maestro").html(data);
                	})
                	}) 
            })
</script>
  </head>
  <style type="text/css">
body {
	background-color: ##F2F2F2;
	
}
body,td,th {
	color: ##000000;
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
    <!--<td width="96%" align="center"><img src="editorial.png" width="820" height="100" /></td>-->
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
		<h2> Reporte de Servicios Por Usuarios</h2>	
		<div class="well well-small">
		<hr class="soft"/>
		<h4>Tabla de Usuarios</h4>
		<div class="row-fluid">

		<form name="form1" action="../php/reporte-realizado-usuario.php" method="post">
		<p align="center">
			<b style="color: #837E7E">Departamento</b><br>
			<select id=Departamento name="Nom_Departamento" required>
				
			</select>

            <br>
			<b style="color: #837E7E">Maestro</b><br> 
			<select id=maestro name="maestro" required>
				

			</select>
       
            <br>
			<b style="color: #837E7E">Fecha de Inicio</b><br> <input type="date" name="fechainicio" id="bd-desde" align="center" required><br>
			<br>
			<b style="color: #837E7E">Fecha Final</b><br> <input type="date" name="fechafinal" id="bd-hasta" align="center" required><br>
		</p>
        <input type="submit" name="generar" value="Generar"/>
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
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	</style>
  </body>
</html>