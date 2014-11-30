<?php 

	include "includes/conexion.php"; 

	$idCurso="";
	if(isset($_GET['idCurso'])){
		$idCurso=$_GET['idCurso'];
	}
	
	$sql="update curso set 
			AlumnosInscritos=AlumnosInscritos-1
			where idCurso = $idCurso";

	$result = mysql_query($sql);

?>
 