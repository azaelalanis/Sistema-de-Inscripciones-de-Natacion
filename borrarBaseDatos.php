<?php
	include "./includes/conexion.php";
	include "./includes/sesionAdmin.php";

	$sql="delete from inscripcion";

	$result = mysql_query($sql);
	
	echo "	<script language=\"javascript\">
				window.location.href = \"pantallaIndexAdmin.php\"
			</script>";

?>