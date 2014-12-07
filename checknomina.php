<?php require("includes/conexion.php"); ?>

<?php

/**
* Este archivo se encarga de validar la nomina del padre de un alumno que va a pagar por este medio.
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

header('Content-type: application/json');

$nom = mysql_real_escape_string($_REQUEST["nominaEmpleado"]);
$query = mysql_query("SELECT Nomina from usuario where Nomina='$nom'");
$find=mysql_num_rows($query);
if($find>0){
  $output = json_encode(false);
}
else{
  $output = json_encode(true);
}
echo $output;
?>
