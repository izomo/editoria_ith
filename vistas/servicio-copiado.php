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
	<link href="../css/responsive.css" rel="stylesheet">
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<script src="../js/jquery.js"></script>
	<script src="../js/myjava.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			//Boton de busqueda de servicio
			$('#btn-serv').click(function(){
				var dato = $('#bs-serv').val();
				var url = '../php/modificar-servicio.php';
				$.ajax({
					type:'POST',
					url:url,
					data:{'dato':dato},
					success: function(datos){
						$('#agrega-registros').html(datos);
					}
				});
			});
		});
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
			<li class=""><a href="usuarios.php">Personal</a></li>
			<li class=""><a href="servicio-copiado.php">Servicios</a></li>
			<li class=""><a href="crea-reportes.php">Reportes</a></li>
			<li class=""><a href="solicitudes-pendientes.php">Peticiones</a></li>
		</ul>
			<form action="#" class="navbar-search form-inline" style="margin-top:6px">
			
			</form>
		<ul class="nav pull-right">
			<li><a>Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a></li>
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
		<div class="well well-small">
		<hr class="soft"/>
		<h4 align="center">Consultar Servicio de Copiado</h4>
		<div class="row-fluid">
    
    <section>

	    <table border="0" align="center">
	        <tr>
	    	    <td>Buscar Servicio</td>
	        </tr>
	    	<tr>
	        	<td><input type="text" placeholder="Busca por: Id_personal" id="bs-serv"/>&nbsp;&nbsp;&nbsp;&nbsp;</td>

	        	<td width="100">
	        	    <form name="form2">
	        			<button id="btn-serv" type="button" class="btn btn-primary btn_sm">Buscar</button>
	        	    </form>
	        	</td>

	        	<!--
	        	<td width="100"> 
	        	    <form name="form1" action="agrega-personal.php" method="post">
	        		<input type="submit" value="Buscar" class="btn btn-primary"></input>       
	        	    </form>
	        	</td>-->

	                 <!--<input type="button" name="AgregaPersonal" value="Agrega Una Nueva Persona" href="agrega-personal.php"/>-->
	        </tr>
	    </table>
    </section>
 
    	<div class="registros" id="agrega-registros"> </div>
	      <center>
	        <ul class="pagination" id="pagination"></ul>
	      </center>		
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