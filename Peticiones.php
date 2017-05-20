<!DOCTYPE html>

?>
<html>
<head>
	
	<meta charset="utf-8">
	<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sistema de Peticiones del Editorial ITH</title>
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
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="../js/myjava.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){

		$('#bs-pet').keyup(function(e){
		if(e.keyCode == 13) {
			var id_personal = $('#bs-pet').val();
			var url = 'php/busca-peticion.php';
				$.ajax({
				type:'POST',
				url:url,
				data:'id_personal='+id_personal,
					success: function(datos){
						var array_json = JSON.parse(datos);	
						$('#maestro').val(array_json[0]);	
						$('#Nom_Departamento').val(array_json[1]);
					}
				});
			}	return false;
			
		});

		$('#bs-btn-pet').click(function(){
			var dato = $('#bs-pet').val();
			var url = 'php/busca-peticion.php';
			if(dato!=""){	
				$.ajax({
				type:'POST',
				url:url,
				data:'id_personal='+dato,
					success: function(datos){
						if(datos==false){
							alert("Este id no existe en la base de datos!");
							$('#maestro').val("");	
							$('#Nom_Departamento').val("");		
						}else{
							var array_json = JSON.parse(datos);	
							$('#maestro').val(array_json[0]);	
							$('#Nom_Departamento').val(array_json[1]);	
						}
					}
				});
				return false;
			}else{
				alert("El campo de id no tiene campos!");
				$('#maestro').val("");	
				$('#Nom_Departamento').val("");
				return false;
			}
		});

		
	});
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
</head>

<body>
<header>
  <img src="images/header-ith.png">

</header>
<p>&nbsp;</p>
<p>&nbsp;</p>

<table width="100%" border="0">
  
	<center><div class="tit"><h2 style="color: #605C5C; ">Envio de Peticiones</h2>
		<center><div class="Ingreso">

	<table border="0" align="center" valign="middle">
		<tr>
		<td rowspan=2>
		<!--<form action="php/validar.php" method="post">-->
		<div align="center">

		<form action="php/envio-informacion-servicio.php" method="POST">
				
				<!--ID-->
				<br><label style="font-size: 12pt; color: #605C5C" ><b>Identificador: </b></label>
					<input style="border-radius:15px;" type="text" placeholder="Ingrese su Identificador" id="bs-pet" name="id" required/>
				<br>
	        		<button  class="btn btn-primary btn_sm" id="bs-btn-pet" >Buscar</button>
	        	<br>	 
				
				<!--Nombre-->
				<br><label style="font-size: 12pt; color: #605C5C" ><b>Nombre: </b></label>
					<input style="border-radius:15px;" type="text" id="maestro" name="maestro" minlength="8" maxlength="50" readonly="readonly" required>


				<!--Departamento-->
				<br> <label style="font-size: 12pt; color: #605C5C" ><b>Departamento: </b></label>
					<input style="border-radius:15px;" type="text" id="Nom_Departamento" name="Nom_Departamento" minlength="8" maxlength="30"  readonly="readonly" required>
				

				<!--FECHA-->
				<br> <label style="font-size: 12pt; color: #605C5C" ><b>Fecha: </b></label>
					<input aling="center" style="border-radius:15px;" type="text" minlength="4" maxlength="11" name="fecha" id="fecha" value="<?php echo date("Y/m/d"); ?>" readonly="readonly" required>


				<!--Numero de Copias-->
				<br> <label style="font-size: 12pt; color: #605C5C" ><b>Numero de Copias: </b></label>
					<input style="border-radius:15px;" type="number" min="1" max="10000" ="" name="num_copias" id="num_copias" required>


				<!--Clave-->
				 <br> <label style="font-size: 12pt; color: #605C5C" ><b>Tipo de Copias: </b></label>
					<select type="text" id="clave" name="clave" style="border-radius:15px;" >
					<option value="">Seleccionar</option>
						<?php 
						include("php/connect_db.php");
							$resultado = mysql_query("select servicio from tipo_servicio", $conexion) or die(mysql_error());
		                
							while ($fila = mysql_fetch_row($resultado)) {
								echo "<option value=".$fila['0'].">".$fila['0']."</option>";
							}?>
			
					</select>

				<br>
				<br>

				<button id="bs-btn-envio_pet" name="Guardar" class="btn btn-success btn-primary">Enviar Peticion</button>

			</div>
			
		</form>

<br>
		</td>
		</tr>
	</table>
</table>
		</div></center></div></center>

	
</body>
</html>