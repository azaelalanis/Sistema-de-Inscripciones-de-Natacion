<?php

/**
* Este archivo se encarga de registrar un curso que no existia anteriormente.
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

	$nombre 		    =              $_POST['nombreCurso'];
	$duracion           =              $_POST['duracion'];
	$numMaestros        =              $_POST['numeroMaestros'];
	$horaInicio			=              $_POST['horaDeInicio'];
	$minutoInicio       =              $_POST['minutoDeInicio'];
	$tiempoInicio       =              $horaInicio.':'.$minutoInicio;
	$cupo               =              $_POST['cupo'];
	$edadMin            =              $_POST['edadMin'];
	$edadMax            =              $_POST['edadMax'];
	$bloque             =              $_POST['bloque'];
	$diaDeLaSemana      =              implode(',', $_POST['diaDeLaSemana']);
	$diaDeLaSemana = " ".$diaDeLaSemana;
	$precio				=			   $_POST['precioCurso'];
	$sql = "INSERT INTO curso (Nombre, Cupo, EdadMinima, EdadMaxima, HoraInicio, Duracion, DiasDeLaSemana, CanMaestros, Precio, BLOQUE)
	VALUES
	('$nombre', '$cupo', '$edadMin', '$edadMax', '$tiempoInicio', '$duracion', '$diaDeLaSemana', '$numMaestros', '$precio', $bloque)";

	mysql_real_escape_string($sql);
	$result = mysql_query($sql);

	echo "<script language=\"javascript\">
	window.location.href = \"pantallaAltasBajasCambiosCursos.php\"
	</script>";
}

?>
