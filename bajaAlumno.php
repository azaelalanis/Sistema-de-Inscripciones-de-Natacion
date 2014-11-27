<!DOCTYPE html>
<?php 
	require_once("includes/conexion.php"); 
	$CURP="";
	if(isset($_GET['curp'])){
		$CURP=$_GET['curp'];
	}
	
	$sql = "DELETE FROM alumno WHERE Curp = '$CURP'";

	$result = mysql_query($sql);
	echo "<script language=\"javascript\">
					window.location.href = \"pantallaIndexStaff.php\"
				</script>";

	// A partir de aqui hay que eliminar las relaciones con las tablas de cursos
	// Y desinscribir al alumno del curso y con esto aumentar un espacio en el cupo del curso
?>