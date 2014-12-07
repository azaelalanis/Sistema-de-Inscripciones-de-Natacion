<?php

/**
* Este archivo se encarga de validar el login de cualquier usuario.
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

//Variables inicializadas
if(isset($_POST["login"])){
	$usuario=$_POST["login"];
}else{
	$usuario="";
}

if(isset($_POST["password"])){
	$clave=$_POST["password"];
}else{
	$clave="";
}

$password="";
$tipo="";
$nombre="";



$sql="select * from usuario where Nomina='".$usuario."'";

$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
	$tipo=$row['Tipo'];
	$password=$row['Password'];
	$nombre=$row['Nombre'];
}


//Si la clave ingresada es igual a la de la base de datos deja ingresar
if($clave==$password && $usuario!="")
{
	session_start();
	// store session data
	$_SESSION['nomina']=$usuario;
	$_SESSION['tipo']=$tipo;
	$_SESSION['nombre']=$nombre;
	if($tipo){
		echo "<script language=\"javascript\">
		window.location.href = \"pantallaMenuStaff.php\"
		</script>";
	}else{
		echo "<script language=\"javascript\">
		window.location.href = \"pantallaIndexAdmin.php\"
		</script>";
	}
}else{
	echo "<script language=\"javascript\">
	alert(\"Usuario o clave incorrectas\");
	window.location.href = \"index.html\"
	</script>";
}
?>
