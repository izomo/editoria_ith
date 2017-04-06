<?php

session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
//extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar

	require("connect_db.php");

	$id = $_POST['id'];
	$Nombre = $_POST['Nombre'];
	$Departamento = $_POST['Departamento'];
	$correo = $_POST['email'];
	$clave = $_POST['pass'];
/*
function validar_clave($clave){
           if(strlen($clave) < 6){
              echo  "<script>alert('La clave debe tener al menos 6 caracteres')</script>";
              echo  "<script>alert('La clave debe contener al menos 6 caracteres y un maximo de 16, una letra minuscula y una mayuscula, asi como un caracter de tipo numerico')</script>";
              	header("location: ../vistas/modificar-personal.php");
              return false;
           }
           if(strlen($clave) > 16){
           	echo  "<script>alert('La clave no puede tener más de 16 caracteres')</script>";
            echo  "<script>alert('La clave debe contener al menos 6 caracteres y un maximo de 16, una letra minuscula y una mayuscula, asi como un caracter de tipo numerico')</script>";
              	header("location: ../vistas/modificar-personal.php");
              return false;
           }
           if (!preg_match('`[a-z]`',$clave)){
           	echo  "<script>alert('La clave debe tener al menos una letra minúscula')</script>";
            echo  "<script>alert('La clave debe contener al menos 6 caracteres y un maximo de 16, una letra minuscula y una mayuscula, asi como un caracter de tipo numerico')</script>";
              	header("location: ../vistas/modificar-personal.php");
              return false;
           }
           if (!preg_match('`[A-Z]`',$clave)){
              echo  "<script>alert('La clave debe tener al menos una letra mayúscula')</script>";
              echo  "<script>alert('La clave debe contener al menos 6 caracteres y un maximo de 16, una letra minuscula y una mayuscula, asi como un caracter de tipo numerico')</script>";
              	header("location: ../vistas/modificar-personal.php");
              return false;
           }
           if (!preg_match('`[0-9]`',$clave)){
           	echo  "<script>alert('La clave debe tener al menos un caracter numérico')</script>";
            echo  "<script>alert('La clave debe contener al menos 6 caracteres y un maximo de 16, una letra minuscula y una mayuscula, asi como un caracter de tipo numerico')</script>";
              	header("location: ../vistas/modificar-personal.php");
              return false;
           }
           	echo  "<script>alert('Agregado con exito')</script>";
          	 	header("location: ../vistas/users-personal.php");
           return true;
        }
        if (validar_clave($clave)){*/

	$sentencia=mysql_query("UPDATE personal SET Nom_Personal='$Nombre', Nom_Departamento='$Departamento', Correo_Electronico= '$correo', password = '$clave' where id_personal='$id'", $conexion) or die (mysql_error());
	//$resent=mysql_query($sentencia);
	if ($sentencia==null) {
		//echo "Error de procesamieno no se han actuaizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		echo "<script>location.href='../vistas/users-personal.php'</script>";
		
		//echo "<script>location.href='../vistas/admin.php'</script>";
	}else {
		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';
		
	    echo "<script>location.href='../vistas/users-personal.php'</script>";

		
	}
}

?>