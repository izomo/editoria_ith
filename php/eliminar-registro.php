<!--Funcionalidad-->
<?php
		extract($_GET);
		require("../php/connect_db.php");

		
		
		$sql="SELECT * FROM personal WHERE id_personal=$id";
		$ressql=mysql_query($sql);
		while ($row=mysql_fetch_row ($ressql)){
		    	/*$id=$row[0];*/
		    	$Nombre=$row[1];
		    	$Departamento=$row[2];
		    	$email=$row[3];
		    }

		$sql="DELETE personal WHERE id_personal=$id"
?>