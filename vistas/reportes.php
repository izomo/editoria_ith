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
<link rel="shortcut icon" href="../images/favicon.ico">
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
<p>&nbsp;</p>
<p>&nbsp;</p>

<div class="container">
<header class="header">
<div class="row">
	<?php
	//include("include/cabecera.php");
	?>
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
		<li><a>Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a></li>
			  <li><a href="../php/desconectar.php"> Cerrar sesi&oacuten </a></li>			 
		</ul>
	  </div><!-- /.nav-collapse -->
	</div>
  </div><!-- /navbar-inner -->
</div>

<!-- ======================================================================================================================== -->
				<h2 style="color: #605C5C"; align="center">Menú</h2>
				   <section align="center">
				   <table align="center" border="0" style="width:80%">
					   <tr><td>

					   		<a href="crea-reportes.php"><img src="../images/cronologico.png" WIDTH=120  HEIGHT=120></a>
						   	<form align="center"></form>
						   	<a href="crea-reportes.php">Reporte General</a>
					   <td>
					   		<a href="reporte-departamento.php"><img src="../images/departamento.png" WIDTH=180  HEIGHT=180></a>
						   	<form align="center"></form>
						   	<a href="reporte-departamento.php">Reporte Por Departamento</a>
					   <td>
					   		<a href="reporte-usuario.php"><img src="../images/personal.png" WIDTH=120  HEIGHT=180></a>
						   	<form align="center"></form>
						   	<a href="reporte-usuario.php">Reporte Por Tipo de Copia</a>
					   </tr>
				   </table>
				   </section>
		


		<div class="span8">
		
		</div>	
		</div>	
		<br/>
		
		</div>
<!--///////////////////////////////////////////////////Termina cuerpo del documento interno////////////////////////////////////////////-->
</div>

	</div>
</div>

<!-- Footer
      ================================================== -->
<hr class="soften"/>
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <!--<td width="96%" align="center"><img src="editorial.png" width="820" height="100" /></td>-->
    <td>&nbsp;</td>
  </tr>
</table>
</div><!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	</style>
  </body>
</html>