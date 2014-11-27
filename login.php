<?php

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
					window.location.href = \"pantallaIndexStaff.php\"
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