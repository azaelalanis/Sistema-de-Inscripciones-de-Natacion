<?php require_once("includes/conexion.php"); ?>
<?php

/**
* Este archivo se encarga de registrar un usuario que no existia anteriormente.
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

if (isset($_POST['submitx'])) {

	$id 		    =              $_POST['nominaEmpleado'];
	$name           =              $_POST['nombreEmpleado'];
	$password       =              $_POST['contraseña'];
	$type			=              $_POST['privilegio'];

	$sql = "INSERT INTO usuario (Nomina, Nombre, Password, Tipo)
	VALUES
	('$id','$name', '$password', '$type')";
	mysql_real_escape_string($sql);
	$result = mysql_query($sql);

	echo "<script language=\"javascript\">
	window.location.href = \"pantallaAltasBajasCambiosStaff.php\"
	</script>";
}
?>
