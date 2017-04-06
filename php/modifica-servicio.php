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
    <script src="../js/myjava.js"></script>
    <script src="../js/jquery.js"></script>
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
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a class="navbar-brand" href="../vistas/admin.php">Panel administrativo</a>
     <a class="navbar-brand" href="../vistas/principal.php">Panel operativo</a>
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
                <a href="../vistas/admin.php"><i class="fa fa-home"></i> Inicio</a>
                 <a href="../vistas/users.php"><i class="fa fa-users"></i> Usuarios</a>
                 <a href="../vistas/control-servicios.php"><i class="fa fa-users"></i> Control de Servicios</a>
                 <a href="../vistas/users-personal.php"><i class="fa fa-users"></i> Usuario Personal</a>
                 
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
           <i class="fa fa-users"></i> Administración de Servicios
           <a data-toggle="modal" data-target="#myModal" class="pull-right"><i class="fa fa-user-plus"></i></a>
         </div>
          <div class="panel-body">

      <?php

        require("../php/connect_db.php");
        $sql=("SELECT * FROM tipo_servicio");
        $query=mysql_query($sql);

        echo "<table border='1'; class='table table-hover';>";
          echo "<tr class='warning'>";
            echo "<td>Id</td>";
            echo "<td>Nombre de Servicio</td>";
            echo "<td>Editar</td>";
            echo "<td>Borrar</td>";
          echo "</tr>";

          
      ?>
        
      <?php 
         while($arreglo=mysql_fetch_array($query)){
            echo "<tr id='tr".$arreglo[0]."' class='success'>";
              echo "<td>$arreglo[0]</td>";
              echo "<td>$arreglo[1]</td>";

              echo "<td><a href='../vistas/actualizar-servicio.php?id=$arreglo[0]'><img src='../images/actualizar.gif' class='img-rounded'></td>";
              echo "<td><a id='".$arreglo[0]."' onclick='eliminarServicio(".$arreglo[0].")'><img src='../images/eliminar.png' class='img-rounded'/></a></td>";

            
          echo "</tr>";
        }

        echo "</table>";

      ?>

          </div>
        </div>
     <!-- /panel -->
   </div>
   <!-- controls -->




</div>
</div>
<!-- /body -->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/Chart.js"></script>
    <script src="../js/saphv2.js"></script>
  </body>