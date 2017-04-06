<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
include('connect_db.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

$sqlborrar="DELETE FROM login WHERE id=$id";
$resborrar=mysql_query($sqlborrar);
echo $id;
}
?>