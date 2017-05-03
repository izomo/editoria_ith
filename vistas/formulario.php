<!--form peticion-->

<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['Nom_Personal']) {
    header("Location:../index.php");
}else{
    include("../php/connect_db.php");

$sql="SELECT * FROM personal WHERE Nom_Personal= '".$_SESSION['Nom_Personal']."'";
    $ressql=mysql_query($sql);
    while ($row=mysql_fetch_row ($ressql)){
          $id=$row[0];
          $nombre=$row[1];
          $departamento=$row[2];
          $email=$row[3];
        }
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
<link href="../bootstrap/css/bootstrap2.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme2.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme2.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<link rel="shortcut icon" href="../images/favicon.ico">
<style type="text/css">   
    #formul {  
        padding: 20px 0px 0px 30px;   /* margen con valores: arriba - derecha - abajo - izquierda */
         font-family:verdana,arial; 
        font-size:12pt; 
        color: #1A1A1A;
    }  

    .campos {  
        font-family:verdana,arial;     /* tipo de letra */  
        width: 600px;                 /* anchura de campos de formulario */  
        font-size:8pt;                /* tamaño de la letra*/   
        color:#000000;                 /* color del texto */   
        border: 1px dotted black;        /* color del borde puede ser solid ó dotted */  
         background-color:#CCCCCC;    /* color del fondo */   
    }  

    .boton{ 
        font-size:12px; 
        font-family:Verdana,Helvetica; 
        font-weight:bold; 
        color:#000000; 
        background:#848484; 
        border:0px; 
        width:120px; 
        height:25px;  
    } 

    #b_reset {  
        margin: 0px 0px 0px 0px;    /* margen con valores: arriba - derecha - abajo - izquierda */ 
     }  

    #b_submit {  
        margin: -25px 0px 0px 380px;    /* margen con valores: arriba - derecha - abajo - izquierda */ 
     }  

    </style>  
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

<div class="container">
<header class="header">
<div class="row">
    <?php
    //include("include/cabecera.php");
    ?>
</div>
</header>

  <!-- Navbar
    ================================================== -->


<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
      <div class="nav-collapse">
        <ul class="nav">
            <li class=""><a href="principal-maestros.php">Principal</a></li>
             
    
        </ul>
        <form action="#" class="navbar-search form-inline" style="margin-top:6px">
        
        </form>
        <ul class="nav pull-right">
        <li><a href="">Bienvenido <strong><?php echo $_SESSION['Nom_Personal'];?></strong> </a></li>
              <li><a href="../php/desconectar.php"> Cerrar Sesion </a></li>          
        </ul>
      </div><!-- /.nav-collapse -->
    </div>
  </div><!-- /navbar-inner -->
</div>

<!-- ======================================================================================================================== -->
<div class="row">
    
    
        
    <div class="span12">

        <div class="caption">

<!--/////////////Empieza cuerpo del documento interno///////////////-->   

        <div class="well well-small">
        <hr class="soft"/>
        <h4 align="center"><font color = "000000">Envianos tus archivos.</font></h4>
        <div class="row-fluid">
        <p align="center"><font color = "000000">Este formulario te ayudara a enviarnos tus archivos aqui</font>
          </a>.
        </p>
        
<!-- Footer
      ================================================== -->
<hr class="soften"/>
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <!--<td width="96%" align="center"><img src="editorial.png" width="820" height="100" /></td>-->
    <td>&nbsp;</td>
  </tr>
</table>
</div><!-- /container -->



<body>  

    <div id="formul"> 
        <h3>Envia archivos a Editorial ITH:</h3> 
        <form method="POST" action="../php/enviar.php" name="mensaje_f" enctype="multipart/form-data"> 

            <p>Nombre: <br />  
            <input class="campos" value="<?php echo $nombre ?>" readonly="readonly" minlength="8" maxlength="50" type="text" name="nombre"></p> 

            <p>Departamento: <br />  
            <input class="campos" type="text" value="<?php echo $departamento ?>" readonly="readonly" minlength="8" maxlength="30" name="departamento"></p>

            <p>Numero de Copias (Max 10,000): <br />  
            <input class="campos" type="number" min="1" max="10000" name="num_copias" required=""></p>

            <p>Tipo de Servicio: <br />  
            <select class="campos" type="text" name="clave" style="border-radius:15px;" minlength="8" maxlength="30" required>
               <option value="Examenes">Examenes</option>
               <option value="Material Didactico">Material Didactico</option>
               <option value="Documentos Personales">Docs. Personales</option>
               <option value="Practicas de Laboratorio">Practicas de Laboratorio</option>
               <option value="Documentos Operativos">Documentos Operativos</option>
            </select></p>
             
            <p>E-mail: <br />  
            <input class="campos" type="email" minlength="8" maxlength="30" value="<?php echo $email ?>" readonly="readonly" name="email"></p>  
             
            <p>Asunto: <br />  
            <input class="campos" type="text" minlength="8" maxlength="30" value="<?php echo $_SESSION['Nom_Personal']." - ". date('Y-m-d') ?>" readonly name="asunto"></p>  
             
            <p>Mensaje:<br />  
            <textarea class="campos" rows="10" minlength="8" maxlength="300" name="mensaje" required=""></textarea></p> 
             
            <p>Adjunta un archivo (Max 20Mb): <br /> 
            <input class="campos" type="file" name="archivo" size="20"></p> 
             
                   
            <div id="b_submit"> 
            <input class="boton" type="submit" value="Enviar mensaje" name="B1"> 
            
            </div> 
                  
        </form>  
    </div>       

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    </style>
  </body>
</html>


