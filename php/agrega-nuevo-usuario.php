<!DOCTYPE html>
<?php   
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
   
   $radio = $_POST["habilitarDeshabilitar"];

        if ($radio == 1) {

          $clave = $_POST["pass"];
          
        }else {

          $clave = $_POST["pasadmin"];
        }

       

function validar_clave($clave){
           if(strlen($clave) < 6){
              echo  "<script>alert('La clave debe tener al menos 6 caracteres')</script>";
              echo  "<script>alert('La clave debe contener al menos 6 caracteres y un maximo de 16, una letra minuscula y una mayuscula, asi como un caracter de tipo numerico')</script>";
              	echo "<script>location.href='../vistas/agrega-usuario.php'</script>";
              return false;
           }
           if(strlen($clave) > 16){
           	echo  "<script>alert('La clave no puede tener más de 16 caracteres')</script>";
            echo  "<script>alert('La clave debe contener al menos 6 caracteres y un maximo de 16, una letra minuscula y una mayuscula, asi como un caracter de tipo numerico')</script>";
              	echo "<script>location.href='../vistas/agrega-usuario.php'</script>";
              return false;
           }
           if (!preg_match('`[a-z]`',$clave)){
           	echo  "<script>alert('La clave debe tener al menos una letra minúscula')</script>";
            echo  "<script>alert('La clave debe contener al menos 6 caracteres y un maximo de 16, una letra minuscula y una mayuscula, asi como un caracter de tipo numerico')</script>";
              	echo "<script>location.href='../vistas/agrega-usuario.php'</script>";
              return false;
           }
           if (!preg_match('`[A-Z]`',$clave)){
              echo  "<script>alert('La clave debe tener al menos una letra mayúscula')</script>";
              echo  "<script>alert('La clave debe contener al menos 6 caracteres y un maximo de 16, una letra minuscula y una mayuscula, asi como un caracter de tipo numerico')</script>";
              	echo "<script>location.href='../vistas/agrega-usuario.php'</script>";
              return false;
           }
           if (!preg_match('`[0-9]`',$clave)){
           	echo  "<script>alert('La clave debe tener al menos un caracter numérico')</script>";
            echo  "<script>alert('La clave debe contener al menos 6 caracteres y un maximo de 16, una letra minuscula y una mayuscula, asi como un caracter de tipo numerico')</script>";
              	echo "<script>location.href='../vistas/agrega-usuario.php'</script>";
              return false;
           }
           	echo  "<script>alert('Agregado con exito')</script>";
          	 	echo "<script>location.href='../vistas/agrega-usuario.php'</script>";
           return true;
        }

 /*$consulta = mysql_query("SELECT email FROM login WHERE email = '".$usuario."';");    
        if(mysql_num_rows($consulta)>0){
          echo '<script>alert("Usuario ya existe")</script> ';
            echo "<script>location.href='../vistas/agrega-usuario.php'</script>";
        }*/
       // else{
        if (validar_clave($clave)){

	include("connect_db.php");
	mysql_query("INSERT INTO login (user, password, email, pasadmin) VALUES ('$_POST[user]','$_POST[pass]','$_POST[email]','$_POST[pasadmin]')", $conexion);
	echo '<script>alert("Datos Guardados Con Exito")</script> ';
		echo "<script>location.href='../vistas/user.php'</script>";

	}
    }

?>  