<?php

/**
* Este archivo se encarga de calcular la diferencia del cupo de un grupo haciendo la resta entre la cantidad
* de alumnos inscritos y el cupo total del curso.
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

require("includes/conexion.php");

$id = $_GET['id'];

$query = ("SELECT Cupo, AlumnosInscritos FROM curso WHERE idCurso = $id");
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
  $Cupo = $row['Cupo'];
  $AlumnosInscritos = $row['AlumnosInscritos']; //Restar Cupo - AlumnosInscritos nos dara el cupo actual
  $CupoActual = $Cupo - $AlumnosInscritos;;
}
echo $CupoActual;
?>
