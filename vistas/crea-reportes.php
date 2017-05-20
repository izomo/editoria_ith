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


		function reportePDF(){
		    var desde = $('#bd-desde').val();
		    var hasta = $('#bd-hasta').val();
		    window.open('../php/productos.php?desde='+desde+'&hasta='+hasta); 
 		}

 		function es_vacio(clic){
		  var campo1 = document.getElementById("bd-desde").value;
		  var campo2 = document.getElementById("bd-hasta").value;
		  if((campo1 != "") && (campo2 != "")){
		    document.getElementById("exportar").removeAttribute('disabled');
		    if(clic){
		  		reportePDF();	
		  	}
		  }
		  else{
		    document.getElementById("exportar").setAttribute('disabled', 'disabled');
  			}
		}

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
		<ul class="nav" aling="center">
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
  <div class="navbar-inner">
		<div class="container">
			<div class="nav-collapse">
				<ul class="nav">
					<li class=""><a href="reportes.php">Reportes:</a></li>
	            	<li class=""><a href="crea-reportes.php">Generales</a></li>
	            	<li class=""><a href="reporte-departamento.php">Por Departamento</a></li>
	            	<li class=""><a href="reporte-copias.php">Por Tipo de Copias</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>


<!-- ======================================================================================================================== -->
<div class="row">
	
	<div class="span12">

		<div class="caption" align="center">
		
<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<h2> Reporte General de Servicios</h2>	
			<div class="well well-small">
			<hr class="soft"/>
			<h4>Reporte General</h4>
			<div class="row-fluid">

			<body>

			<form name="form1">
				<p align="center">


					<b style="color: #837E7E">Desde</b><br> <input type="date" name="fechainicio" id="bd-desde" align="center" onChange="es_vacio()"><br>
					<br>
					<b style="color: #837E7E">Hasta</b><br> <input type="date" name="fechafinal" id="bd-hasta" align="center" onChange="es_vacio()"><br><br><br>

	<!--
					<input type="submit" value="Exportar a PDF" target="_blank" onclick="reporteDepartamentoPDF();" class="btn btn-danger"></input> -->
					
		        	<a disabled="true" type="submit" id="exportar" href="javascript:es_vacio(true);" class="btn btn-danger">Exportar a PDF</a>
				</p>
				
				
		        

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