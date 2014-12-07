<?php

/**
* Este archivo se encarga de determinar los permisos que tiene cada usuario dependiendo del tipo de cuenta con la que ingreso
* ya sea de administrador o de staff.
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

Session_start();

if(isset($_SESSION['nomina'])){
	if($_SESSION['tipo']){
		echo "<script language=\"javascript\">
		alert(\"No tiene permisos!\");
		window.location.href = \"index.html\"
		</script>";
	}
}else{
	echo "<script language=\"javascript\">
	alert(\"Inicie sesion primero\");
	window.location.href = \"index.html\"
	</script>";
}

?>
