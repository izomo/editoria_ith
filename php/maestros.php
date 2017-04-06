<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
include("connect_db.php");
$id_depa = $_GET['param_id'];

$result = mysqli_query($con, "SELECT * FROM personal WHERE ID_Departamento = $id_depa order by Nom_Personal ASC");

while ($row = mysqli_fetch_array($result)){
	echo '<option value="'.$row['Nom_Personal'].'">'.$row['Nom_Personal'].'</option>';
}
}
?>