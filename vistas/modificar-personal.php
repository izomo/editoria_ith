<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}else{
  require("../php/connect_db.php");
    $id = $_POST['control'];

    $sql="SELECT * FROM personal WHERE id_personal = '$id'";
    $ressql=mysql_query($sql);

      while ($row=mysql_fetch_row ($ressql)){
          $id=$row[0];
          $Nombre=$row[1];
          $Departamento=$row[2];
          $email=$row[3];
          $contra = $row[4];
        }
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
           <i class="fa fa-users"></i> Administración de Usuarios
           <a data-toggle="modal" data-target="#myModal" class="pull-right"><i class="fa fa-user-plus"></i></a>
         </div>
          <div class="panel-body">



    <div align="center">
    <form name="form1" action="../php/ejecuta-actualizar-personal-admin.php" method="post">
        Id<br><input type="text" name="id" minlength="0" maxlength="10000" value= "<?php echo $id ?>" readonly="readonly"><br>
        Nombre<br> <input type="text" name="Nombre" minlength="8" maxlength="50" value="<?php echo $Nombre?>" readonly="readonly"><br>
        Departamento<br> <input type="text" name="Departamento" minlength="8" maxlength="30" value="<?php echo $Departamento?>" readonly="readonly"><br>
        Correo Electronico<br> <input type="email" name="email" minlength="8" maxlength="30" value="<?php echo $email?>" required><br>
        Contraseña<br>
        <input type="password" value="<?php echo $contra ?>" name="pass" minlength="6" maxlength="16" required>
    </div>
        <input type="submit" name="Guardar" value="Guardar" class="btn btn-success btn-primary">
    </form>
      

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
</html>