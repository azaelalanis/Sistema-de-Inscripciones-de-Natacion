<?php

/**
* Este archivo se encarga de actualizar el pago de cada curso de cada alumno.
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

include "./includes/conexion.php";
include "./includes/sesionStaff.php";


$idCurso= isset($_POST["idCurso"]) ? $_POST['idCurso'] : -1;
$idAlumno= isset($_POST["idAlumno"]) ? $_POST['idAlumno'] : -1;
$pagada= isset($_POST["pagada"]) ? $_POST['pagada'] : -1;

if($idCurso!= -1 && $idAlumno!=-1){

  $sql= "UPDATE inscripcion set pagada=$pagada WHERE idAlumno=$idAlumno and idCurso=$idCurso";
  $result = mysql_query($sql);
}

echo "<script language='javascript'>
window.location.href = 'pantallaDetallePago.php?idAlumno=$idAlumno'
</script>";

?>
