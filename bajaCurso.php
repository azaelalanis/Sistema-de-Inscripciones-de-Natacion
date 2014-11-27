<!DOCTYPE html>
<?php 
	require_once("includes/conexion.php"); 
	$idCurso="";
	if(isset($_GET['id'])){
		$idCurso=$_GET['id'];
	}
	
	$sql = "DELETE FROM curso WHERE idCurso = '$idCurso'";

	$result = mysql_query($sql);

	// A partir de aqui eliminar todos los alumnos (dar de baja) que estaban inscritos en este curso (borrar relaciones)

	//header('Location: pantallaAltasBajasCambiosCursos.php');
	echo "<script language=\"javascript\">
					window.location.href = \"pantallaAltasBajasCambiosCursos.php\"
				</script>";
?>