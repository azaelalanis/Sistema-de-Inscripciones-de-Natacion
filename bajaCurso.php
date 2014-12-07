<!DOCTYPE html>
<?php 
	require_once("includes/conexion.php"); 
	$idCurso="";
	if(isset($_GET['id'])){
		$idCurso=$_GET['id'];
	}
	
	$sql = "select * from inscripcion where idCurso = $idCurso";
	$result = mysql_query($sql);
	$count=0;
	while($row = mysql_fetch_array($result)){
		$count=1;
	}
	if($count){
		echo "<script language=\"javascript\">
					alert('Este curso tiene alumnos inscritos');
				</script>";
	}else{
		$sql = "DELETE FROM curso WHERE idCurso = '$idCurso'";

		$result = mysql_query($sql);
	}

	// A partir de aqui eliminar todos los alumnos (dar de baja) que estaban inscritos en este curso (borrar relaciones)

	//header('Location: pantallaAltasBajasCambiosCursos.php');
	echo "<script language=\"javascript\">
					window.location.href = \"pantallaAltasBajasCambiosCursos.php\"
				</script>";
?>