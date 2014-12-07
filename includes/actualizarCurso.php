<?php

/**
* Este archivo se encarga de actualizar un curso con la informacion extraida de la forma de cursos.
*
* @category   Proyecto
* @package    Sistema de Inscripciones de Natacion
* @author     Azael Alberto Alanis Garza <azaelalanis.g@gmail.com>
* @author     Andres Gerardo Cavazos Hernandez <andrscvz@gmail.com>
* @author			Eugenio Jose Martinez Ramos <eugeniomartinez92@gmail.com>
* @author			Roberto Carlos Rivera Martinez <robert_rivmtz@hotmail.com>
* @author			Hector Palomares Gonzalez <hpalomares@itesm.mx>
* @copyright  2014
* @license    The MIT License
* @version    1.0
* @link       https://github.com/azaelalanis/Sistema-de-Inscripciones-de-Natacion.git
*/

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
