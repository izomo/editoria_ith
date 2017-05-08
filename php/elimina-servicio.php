<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
include('connect_db.php');

$id = $_POST['id'];


$sqlborrar="DELETE FROM reg_serv_copiado WHERE id_reg_serv_copiado=$id";
$resborrar=mysql_query($sqlborrar);
echo $id;
}
?>