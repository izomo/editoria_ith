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

    <script src="../js/jquery.js"></script>
    <script src="../js/myjava.js"></script>
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
      <a class="navbar-brand" href="admin.php">Panel Administrativo</a>
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
           <i class="fa fa-users"></i> Modifica de Personal
           <a data-toggle="modal" data-target="#myModal" class="pull-right"><i class="fa fa-user-plus"></i></a>
         </div>
          <div class="panel-body">
		
		<?php
		extract($_GET);
		require("../php/connect_db.php");

		$sql="SELECT * FROM personal WHERE id_personal=$id";
    $ressql=mysql_query($sql);
    while ($row=mysql_fetch_row ($ressql)){
          $id=$row[0];
          $Nombre=$row[1];
          $Departamento=$row[2];
          $email=$row[3];
        }


    $sql="SELECT * FROM personal WHERE Nom_Personal=$Nombre";
    $ressql=mysql_query($sql);
    while ($row=mysql_fetch_row ($ressql)){
          $id=$row[0];
          $Nombre=$row[1];
          $Departamento=$row[2];
          $email=$row[3];
        }

    $sql="SELECT * FROM personal WHERE Correo_Electronico=$email";
    $ressql=mysql_query($sql);
    while ($row=mysql_fetch_row ($ressql)){
          $id=$row[0];
          $Nombre=$row[1];
          $Departamento=$row[2];
          $email=$row[3];
        }

    $sql="SELECT * FROM personal WHERE Nom_departamento=$Departamento";
    $ressql=mysql_query($sql);
    while ($row=mysql_fetch_row ($ressql)){
          $id=$row[0];
          $Nombre=$row[1];
          $Departamento=$row[2];
          $email=$row[3];
        }



		?>
		<div align="center">
		<form name="form1" action="../php/ejecuta-actualizar-personal-admin.php" method="post">
				Id<br><input type="text" name="id" value= "<?php echo $id ?>" readonly="readonly"><br>
				Nombre<br> <input type="text" name="Nombre" value="<?php echo $Nombre?>"><br>
				Departamento<br> <input type="text" name="Departamento" value="<?php echo $Departamento?>"><br>
				Correo Electronico<br> <input type="email" name="email" value="<?php echo $email?>"><br>
				Contraseña<br> <input type="text" name="pass" value="<?php echo $clave?>"><br>
				<br>
        <input type="submit" name="Guardar" value="Guardar" class="btn btn-success btn-primary">
		</div>
				
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