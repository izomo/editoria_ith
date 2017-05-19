<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:../index.php");
}
?>

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

<!--<script src="../bootstrap/js/bootstrap2.min.js"></script>-->

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
            <li class=""><a href="reportes.php">Reportes:</a></li>
            <li class=""><a href="crea-reportes.php">General</a></li>
            <li class=""><a href="reporte-departamento.php">Por departamento</a></li>
            <li class=""><a href="reporte-copias.php">Por tipo de copia</a></li>
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
        <div class="well well-small">
        <hr class="soft"/>
        <h4 align="center">Reporte General</h4>
        <div class="row-fluid">
        

<body>

    <section>
    <table border="0" align="center">
    	<tr>
        	<td>Desde&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td td width="50"><input type="date" id="bd-desde"/></td>
            
            <td>Hasta&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input type="date" id="bd-hasta"/></td>

            <td width="300"><a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar Busqueda a PDF</a></td>
        </tr>
    </table>
    </section>

    
</div></div>
    
      

</body>
</html>
