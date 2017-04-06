<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
include("connect_db.php");
$consulta = mysql_query("SELECT id_maestro,Nom_Maestro FROM maestros WHERE Id_Departamento=".$_GET['id']." order by Nom_Maestro ASC");
echo "<select name='Nom_Departamento' id='Nom_Departamento'>";
while ($fila = mysql_fetch_array($consulta)) {
    echo "<option value='" . $fila[1] . "'>" . utf8_encode($fila[1]) . "</option>";
}
echo "</select>";
}
?>