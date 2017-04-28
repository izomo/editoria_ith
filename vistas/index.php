<?php
session_start();
if ((@!$_SESSION['user']) or (@!$_SESSION['Nom_Personal'])) {
  header("Location:../index.php");
}
?>