<?php
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
	
	$sql= "update ALUMNO 
					set 
						Nombre='$nombreCompleto', 
						FechaNacimiento='$fechaNacimiento',  
						SeguroMedico='$seguroMedico', 
						NombrePadre='$nombrePadre', 
						Nomina='$nomina',
						DepartamentoEmpleado='$deptoEmpleado', 
						ExtensionEmpleado='$extensionEmpleado', 
						TipoDeContrato='$tipoContrato', 
						Telefono='$telefono', 
						email='$email', 
						PapeleriaCompleta=$papeleria, 
						ExperienciaAlumno=$conocimientos, 
						Comentarios='$comentarios' 
					where
						CURP='$curp'";

	mysql_real_escape_string($sql);
	
	if(!mysql_query($sql))						
			echo "Error"; 	

	echo "<script language=\"javascript\">
				alert(\"Alumno Actualizado con exito!\");
				window.location.href = \"pantallaIndexStaff.php\"
			</script>";
?>