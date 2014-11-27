<?php require_once("includes/conexion.php"); ?>
<?php
	
    if (isset($_POST['submitx'])) {
         
		$id			=	$_POST['nominaEmpleado'];	
		$name		=	$_POST['nombreEmpleado'];
		$password	=	$_POST['contraseña'];
		$type		=	$_POST['privilegio'];	
        
	$sql = "update usuario 
				set
					Nombre='$name',
					Password= '$password',
					Tipo=$type
				where
					Nomina = '$id'";
				
    mysql_real_escape_string($sql);
    $result = mysql_query($sql);
	
	echo "<script language=\"javascript\">
				window.location.href = \"pantallaAltasBajasCambiosStaff.php\"
			</script>";
}
?>