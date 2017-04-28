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
    <title>Oficina Editorial - ITH -</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
<!-- Bootstrap -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link href="../saphv2.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <link rel="shortcut icon" href="../images/favicon.ico">
    <script>
      function habilitar(value)
      {
       if(value=="1")
      {
         // habilitamos
         document.getElementById("user").disabled=false;
         document.getElementById("email").disabled=false;
         document.getElementById("pass").disabled=false;
         document.getElementById("pasadmin").disabled=true;
         document.getElementById("guardar").disabled=false;
       }else if(value=="2"){
         // deshabilitamos
         document.getElementById("user").disabled=false;
         document.getElementById("email").disabled=false;
         document.getElementById("pass").disabled=true;
         document.getElementById("pasadmin").disabled=false;
         document.getElementById("guardar").disabled=false;
       }
     }
   </script>
  </head>
  <header class="header">
  <div class="container">
  <img src="../images/header-ith.png">
<div class="row">
</div>
</header>
<body>
  <!-- top menu -->
<nav id="top-menu" class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="admin.php">Panel administrativo</a>
    </div>
       

    <!-- Collect the nav links, forms, and other content for toggling -->
    <form action="#" class="navbar-search form-inline" style="margin-top:6px">
    
    </form>
          <ul class="nav pull-right">
        <li><a href="">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a></li>
          <li><a href="../php/desconectar.php"> Cerrar Sesión </a></li>       
    </ul>
  </div><!-- /.container-fluid -->
</nav>
<!-- /top memu -->


<!-- body -->
<div class="container">
<div class="row">
    
   <!-- sidebar -->
   <div class="col-md-3">
     <!-- panel -->
        <div class="panel panel-default">
         <div class="panel-heading">
            <i class="fa fa-bars"></i> Menu
            <i class="showmenu fa fa-angle-down pull-right"></i>
         </div>
          <div id="sider-menu" class="panel-body">
             <!-- links -->
                <a href="admin.php"><i class="fa fa-home"></i> Inicio</a>
                 <a href="users.php"><i class="fa fa-users"></i> Usuarios</a>
                 <a href="users-personal.php"><i class="fa fa-users"></i> Usuario Personal</a>
             <!-- /links -->
          </div>
        </div>
     <!-- /panel -->
   </div>
   <!-- /sidebar -->

   <!-- controls -->
   <div class="col-md-9">
    <!-- panel -->
        <div class="panel panel-default">
         <div class="panel-heading">
           <i class="fa fa-users"></i> Administración de usuarios
           <a data-toggle="modal" data-target="#myModal" class="pull-right"><i class="fa fa-user-plus"></i></a>
         </div>
          <div class="panel-body">
		
<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<h2> Administración de usuarios nuevos</h2>	
		<div class="well well-small">
		<hr class="soft"/>
		<h4 align="center">Agrega nuevo usuario</h4>
		<div class="row-fluid">
		


		<form action="../php/agrega-nuevo-usuario.php" method="post">
		        <div align="center">
                <input type="radio" value="1" name="habilitarDeshabilitar" onchange="habilitar(this.value);"> Usuario Normal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" value="2" name="habilitarDeshabilitar" onchange="habilitar(this.value);"> Usuario Administrador
            </div>
            <br>
            <div align="center">
            Nombre<br> <input type="text" id="user" name="user" required disabled maxlength="50" minlength="10"><br>
            Usuario<br> <input type="text" id="email" name="email" required disabled maxlength="50" minlength="5"><br>
            Password usuario<br> <input type="password" id="pass" name="pass" disabled><br>
            Password administrador<br> <input type="password" id="pasadmin" name="pasadmin" disabled><br>
            <input align="right" name="guardar" id="guardar" type="submit" value="Guardar" class="btn btn-success btn-primary" disabled>
        </div>
				<br>
				
			</form>

				  
		
		
		<div class="span8">
		
		</div>	
		</div>	
		


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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/Chart.js"></script>
    <script src="../js/saphv2.js"></script>
  </body>
</html>