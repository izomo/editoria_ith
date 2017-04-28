<!DOCTYPE html>
<?php
		session_start();
if (@!$_SESSION['user']) {
	header("Location:../index.php");
}else {
include("../php/connect_db.php");
$consulta = "select id,servicio from tipo_servicio order by servicio asc";
$resultado = mysql_query($consulta);


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
    <link rel="shortcut icon" href="../images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
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
	color: #FFF;
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
		<h2 style="color: #605C5C">Servicio de Copiado</h2>	
		<div class="well well-small">
		<hr class="soft"/>
		<h4 style="color: #837E7E"; align="center">Nuevo Servicio</h4>
		<div class="row-fluid">
		

		<form name="form1" action="../php/agrega-serv-nuevo.php" method="post">
		<p align="center">
		    <b style="color: #837E7E">Fecha</b><br>
		        <input type= "date" name= "fecha" style="border-radius:15px;" required><br>
			<b style="color: #837E7E">Departamento</b><br>
			<select id=Departamento name="Nom_Departamento" style="border-radius:15px;" required>
				
			</select>

            <br>
			<b style="color: #837E7E">Maestro</b><br> 
			<select id=maestro name="maestro"style="border-radius:15px;" required>
				

			</select>>
       
            <br>
			<b style="color: #837E7E">Numero de Copias (Max 10,000):</b><br> <input type="number" min="1" max="10000" id="num_copias" name="num_copias" style="border-radius:15px;" align="center" required><br>
</select><br>
			<b style="color: #837E7E">Clave</b><br> 
			<select type="text" id="clave" name="clave" style="border-radius:15px;" required>
				<option value="">Seleccionar</option>
				<?php 
				while ($fila = mysql_fetch_row($resultado)) {
					echo "<option value='".$fila['1']."'>".$fila['1']."</option>";
				}
				?>
			</select>

			<!--<select type="text" id="clave" name="clave" style="border-radius:15px;" required>
			   <option value="Examenes">Examenes</option>
			   <option value="Material Didactico">Material Didactico</option>
			   <option value="Documentos Personales">Docs. Personales</option>
			   <option value="Practicas de Laboratorio">Practicas de Laboratorio</option>
			   <option value="Documentos Operativos">Documentos Operativos</option>
			</select>--><br>
		</p>
        <input type="submit" name="BtnGuardar" value="Guardar"/>
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