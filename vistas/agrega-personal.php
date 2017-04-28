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
		<li><a>Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a></li>
			  <li><a href="../php/desconectar.php"> Cerrar sesi&oacuten</a></li>			 
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
		<h2> Agregar Personal</h2>	
		<div class="well well-small">
		<hr class="soft"/>
		<h4>Agregar un nuevo personal</h4>
		<div class="row-fluid">

		<form action="../php/agrega-nueva-persona.php" method="post">
		        
		        </div>
		        <br>
		        <div align="center">
				    Id_Personal<br> <input type="number" min="0" id="id" name="id" required><br>
				    
				    Apellidos y Nombres<br> <input type="text" minlength="10" maxlength="100" id="nombre" name="nombre" onKeyUp="this.value=this.value.toUpperCase();" required="">
				    
					<!--DEPARTAMENTO-->
				    <br>Departamento<br> 
				    <select id="departamento" name="Nom_Departamento" required="" >
						<?php	
						include("connect_db.php");

						$query = mysql_query("select Nom_Departamento from departamentos", $conexion) or die(mysql_error());
						$i = 0;
						while ($row = mysql_fetch_assoc($query)) {
							?><option value="<?= $row['Nom_Departamento']; ?>" ><?= $row['Nom_Departamento'];?></option><?php
						$i++; }?>
				    </select><br><br>

				    <!--CORREO ELECTRONICO-->
				    Correo Electronico<br> <input type="email" id="email" name="email" required=""><br>
				<br>
				<br>
				<input type="submit" value="Guardar" class="btn btn-success btn-primary">
			</form>
			<script type="text/javascript">

	function objetoAjax(){
		var xmlhttp = false;
		try {
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {

			try {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (E) {
				xmlhttp = false; }
		}

		if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		  xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
	}
	function enviarDatos(){

        //Recogemos los valores introducimos en los campos de texto
		id = document.formulario.id.value;
		nombre = document.formulario.nombre.value;
		Departamento = document.formulario.Departamento.value;
		email = document.formulario.email.value;
         //Aquí será donde se mostrará el resultado
		personal = document.getElementById('personal');

		//instanciamos el objetoAjax
		ajax = objetoAjax();

		//Abrimos una conexión AJAX pasando como parámetros el método de envío, y el archivo que realizará las operaciones deseadas
		ajax.open("POST", "agrega-nueva-persona.php", true);

		//cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
		ajax.onreadystatechange = function() {

             //Cuando se completa la petición, mostrará los resultados 
			if (ajax.readyState == 4){

				//El método responseText() contiene el texto de nuestro 'consultar.php'. Por ejemplo, cualquier texto que mostremos por un 'echo'
				jugador.value = (ajax.responseText) 
			}
		} 

		//Llamamos al método setRequestHeader indicando que los datos a enviarse están codificados como un formulario. 
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 

		//enviamos las variables a 'consulta.php' 
		ajax.send("&equipo="+equipo+"&dorsal="+dorsal) 
	} 

</script>

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