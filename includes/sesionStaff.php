<?php
	Session_start();
	
	if(!isset($_SESSION['nomina'])){
		echo "<script language=\"javascript\">
					alert(\"Inicie sesion primero\");
					window.location.href = \"index.html\"
				</script>";
	}
	
?>