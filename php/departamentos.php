
<?php
//include("connect_db2.php");
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
else{
	
	include("connect_db.php");

$result = mysqli_query($con, "SELECT * FROM departamentos order by Nom_Departamento asc");

while ($row = mysqli_fetch_array($result)){
	echo '<option value="'.$row['ID_Departamento'].'">'.$row['Nom_Departamento'].'</option>';
}
}
?>