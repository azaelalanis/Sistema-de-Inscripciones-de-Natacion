<?php
/**
* Este archivo se encarga de establecer la conexion con la base de datos.
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

$conexion = mysql_connect('localhost', 'root', '');
mysql_set_charset('utf8', $conexion);
if (!$conexion) {
	die('No pudo conectarse: ' . mysql_error());
}
$conexion_base = mysql_select_db('natacion', $conexion);
if (!$conexion_base) {
	die('No se encuentra la base de datos seleccionada : ' . mysql_error());
}
?>
