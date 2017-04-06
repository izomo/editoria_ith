<?php
session_start();
	require("connect_db.php");

	$username=$_POST['mail'];
	$pass=$_POST['pass'];

	$sql2=mysql_query("SELECT * FROM login WHERE email='$username'");
	if($f2=mysql_fetch_array($sql2)){
		if($pass==$f2['pasadmin']){
			$_SESSION['id']=$f2['id'];
			$_SESSION['user']=$f2['user'];
			echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
			echo "<script>location.href='../vistas/admin.php'</script>";
		
		}
	}

	$sql3=mysql_query("SELECT * FROM personal WHERE Correo_Electronico ='$username'");
	if($f3=mysql_fetch_array($sql3)){
		if($pass==$f3['password']){
			$_SESSION['id_personal']=$f3['id_personal'];
			$_SESSION['Nom_Personal']=$f3['Nom_Personal'];
			echo "<script>location.href='../vistas/principal-maestros.php'</script>";
		}
	}

	$sql=mysql_query("SELECT * FROM login WHERE email='$username'");
	if($f=mysql_fetch_array($sql)){
		if($pass==$f['password']){
			$_SESSION['id']=$f['id'];
			$_SESSION['user']=$f['user'];
			header("Location: ../vistas/principal.php");
		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		
			echo "<script>location.href='../index.php'</script>";
		}
	}else{
		
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		
		echo "<script>location.href='../index.php'</script>";	

	}
	

?>