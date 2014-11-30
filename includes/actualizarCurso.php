<?php 

	require_once("includes/conexion.php"); 
	
    if (isset($_POST['submitX'])) {
         
		$nombre			=	$_POST['nombreCurso'];	
		$duracion		=	$_POST['duracion'];
		$numMaestros	=	$_POST['numeroMaestros'];
		$horaInicio		=	$_POST['horaDeInicio'];
		$minutoInicio	=	$_POST['minutoDeInicio']; 
		$tiempoInicio	=	$horaInicio.':'.$minutoInicio;    
		$cupo			=	$_POST['cupo'];
		$edadMin		=	$_POST['edadMin'];
		$edadMax		=	$_POST['edadMax']; 
		$diaDeLaSemana	=	implode(',', $_POST['diaDeLaSemana']);
		$idCurso		=	$_POST['idCurso'];
		$bloque     	=   $_POST['bloque'];
		$diaDeLaSemana = " ".$diaDeLaSemana;
		$precio			=	$_POST['precioCurso'];
		$sql = "update curso 
					set 
						Nombre = '$nombre',
						Cupo = $cupo,
						EdadMinima = $edadMin,
						EdadMaxima = $edadMax,
						HoraInicio = '$tiempoInicio',
						Duracion = $duracion,
						DiasDeLaSemana = '$diaDeLaSemana',
						CanMaestros = $numMaestros,
						Precio = $precio,
						bloque = $bloque
					where
						idCurso = $idCurso";

		mysql_real_escape_string($sql);
		$result = mysql_query($sql);	
		
		echo "<script language=\"javascript\">
				window.location.href = \"pantallaAltasBajasCambiosCursos.php\"
			</script>";
	}

?>