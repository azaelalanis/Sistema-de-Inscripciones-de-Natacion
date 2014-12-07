<?php

/**
* Este archivo se encarga de cancelar la inscripcion de alumnos que se tardaron mas de 24 horas en pagar.
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

if($idCurso!= -1){
  $lock=0;
  $sql="Select IS_FREE_LOCK('CURSO-". $idCurso . "')" ;

  while ($lock!=1) {
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $lock=$row[0];
  }

  $sql= "Select get_lock('CURSO-'". $idCurso .", 10)";
  $result = mysql_query($sql);
  $sql= "update curso set alumnosInscritos=alumnosinscritos-1 where idCurso='$idCurso'";
  $result = mysql_query($sql);
  $sql="Select release_LOCK('CURSO-". $idCurso . "')" ;
  $result = mysql_query($sql);
  $sql="DELETE FROM inscripcion WHERE idAlumno=$idAlumno and idCurso=$idCurso";
  $result = mysql_query($sql);
}
echo "<script language='javascript'>
window.location.href = 'pantallaPagosAtrasados.php'
</script>";

?>
