<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['user'])) {
	$tipo = $_SESSION['user'];
} else{
	header("Location:../index.php");
}

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Oficina Editorial ITH </title>
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
     <a class="navbar-brand" href="admin.php">Panel administrativo</a>
     <a class="navbar-brand" href="principal.php">Panel operativo</a>
    </div>
			 

    <!-- Collect the nav links, forms, and other content for toggling -->
    <form action="#" class="navbar-search form-inline" style="margin-top:6px">
		
		</form>
    	   	<ul class="nav pull-right">
    		<li><a>Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a></li>
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
                 <a href="control-servicios.php"><i class="fa fa-users"></i> Control de Servicios</a>
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
         <div class="panel-heading"><i class="fa fa-desktop"></i> Tecnologico Nacional de Mexico ITH</div>
          <div class="panel-body">
            
<img src="../images/dashboard.jpg">



          </div>
        </div>
     <!-- /panel -->
   </div>
   <!-- controls -->

</div>
</div>
<!-- /body -->

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
    <script src="../js/stack-blur.js"></script>
</body>
</html>