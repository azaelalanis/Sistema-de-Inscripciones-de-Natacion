<?php 

	require_once("includes/conexion.php"); 
	
    if (isset($_POST['submitX'])) {
         
		$nombre 		    =              $_POST['nombreCurso'];	
		$duracion           =              $_POST['duracion'];
		$numMaestros        =              $_POST['numeroMaestros'];
		$horaInicio			=              $_POST['horaDeInicio'];
		$minutoInicio       =              $_POST['minutoDeInicio']; 
		$tiempoInicio       =              $horaInicio.':'.$minutoInicio;    
		$cupo               =              $_POST['cupo'];
		$edadMin            =              $_POST['edadMin'];
		$edadMax            =              $_POST['edadMax']; 
		$diaDeLaSemana      =              implode(',', $_POST['diaDeLaSemana']);
		$diaDeLaSemana = " ".$diaDeLaSemana;
		$precio				=			   $_POST['precioCurso'];
		$sql = "INSERT INTO curso (Nombre, Cupo, EdadMinima, EdadMaxima, HoraInicio, Duracion, DiasDeLaSemana, CanMaestros, Precio)
					VALUES
					('$nombre', '$cupo', '$edadMin', '$edadMax', '$tiempoInicio', '$duracion', '$diaDeLaSemana', '$numMaestros', '$precio')";

		mysql_real_escape_string($sql);
		$result = mysql_query($sql);	
		
		echo "<script language=\"javascript\">
				window.location.href = \"pantallaAltasBajasCambiosCursos.php\"
			</script>";
	}

?>