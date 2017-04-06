<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
if (@!$_SESSION['Nom_Personal']) {
  header("Location:../index.php");
}
?>