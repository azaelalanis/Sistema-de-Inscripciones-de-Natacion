<?php
	Session_start();
	
	if(isset($_SESSION['nomina'])){
		if($_SESSION['tipo']){
			echo "<script language=\"javascript\">
					alert(\"No tiene permisos!\");
					window.location.href = \"index.html\"
				</script>";
		}
	}else{
		echo "<script language=\"javascript\">
					alert(\"Inicie sesion primero\");
					window.location.href = \"index.html\"
				</script>";
	}
	
?>