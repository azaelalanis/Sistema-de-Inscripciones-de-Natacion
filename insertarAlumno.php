<?php

/**
* Este archivo es la pantalla de inscripcion de alumno y tiene parte de php para insertar el alumno en la base de datos.
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

$nombreCompleto= $_POST["nombreCompleto"];
$fechaNacimiento= $_POST["fechaNacimiento"];
$curp= $_POST["curp"];
$seguroMedico= $_POST["seguroMedico"];
$nombrePadre= $_POST["nombrePadre"];
$nomina = isset($_POST["nominaEmpleado"]) ? $_POST['nominaEmpleado'] : "";
$deptoEmpleado =  isset($_POST["deptoEmpleado"]) ? $_POST['deptoEmpleado'] : "";
$extensionEmpleado=  isset($_POST["extensionEmpleado"]) ? $_POST['extensionEmpleado'] : "";
$tipoContrato =  isset($_POST["tipoContrato"]) ? $_POST['tipoContrato'] : "";
$telefono = $_POST["telefono"];
$email= $_POST["email"];
$papeleria=$_POST["papeleria"];
$conocimientos = $_POST["conocimientos"];
$comentarios= $_POST["comentarios"];

$insert= "INSERT INTO ALUMNO ( Nombre, FechaNacimiento, CURP, SeguroMedico, NombrePadre, Nomina,
	DepartamentoEmpleado, ExtensionEmpleado, TipoDeContrato, Telefono, email, PapeleriaCompleta, ExperienciaAlumno, Comentarios)
	VALUES
	('$nombreCompleto', '$fechaNacimiento', '$curp', '$seguroMedico', '$nombrePadre', '$nomina',
		'$deptoEmpleado', '$extensionEmpleado', '$tipoContrato', '$telefono', '$email', $papeleria,
		$conocimientos, '$comentarios') ";

		mysql_real_escape_string($insert);

		if(!mysql_query($insert))
		echo "Table insertion failed";

		echo "<script language=\"javascript\">
		alert(\"Alumno Insertado con exito!\");
		window.location.href = \"pantallaIndexStaff.php\"
		</script>";
		?>
