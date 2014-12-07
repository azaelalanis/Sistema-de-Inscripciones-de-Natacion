<?php
include "./includes/conexion.php";
include "./includes/sesionStaff.php";

$sql="select
				idAlumno,
				CURP,
				Nombre,
				Telefono,
				email
				from
				alumno";

if(isset($_POST["buscar"])){
	$buscar = $_POST["buscar"];
	$sql = $sql . " where Nombre like '%$buscar%'";
}
$result = mysql_query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Reporte</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css" media="screen">
	<script>
		function valida(curp){
			if (confirm("¿Esta seguro?") == true) {
				window.location.href = "bajaAlumno.php?curp="+curp;
			} 
		}
	</script>
</head>
<body>
	<!-- Este div container es para la navigation bar de arriba -->
	<div class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="pantallaMenuStaff.php" class="navbar-brand">Tec Deportes</a>
		</div>
		<div class="navbar-collapse collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav">
				<form class="navbar-form navbar-left" action="pantallaIndexStaff.php" method="POST">
					<input type="text" name="buscar" class="form-control col-lg-8" placeholder="Busqueda">
					<input type="submit" class="form-control col-lg-8">
				</form>
				<li><a href="pantallaRegistroAlumno.php">Agregar nuevo alumno</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="cerrarSesion.php">Cerrar sesión</a></li>
			</ul>
		</div>
	</div>

	<div class="container">

		<table class="table table-striped table-hover ">
			<thead>
				<tr>
					<th>Folio</th>
					<th>CURP</th>
					<th>Nombre</th>
					<th>Tel&eacute;fono</th>
					<th>Correo Electr&oacute;nico</th>
					<th>Inscribir a curso</th>
					<th>Dar de baja</th>
				</tr>
			</thead>
			<tbody>
				<?php

				while($row = mysql_fetch_array($result)){
					$idAlumno=$row['idAlumno'];
					$CURP=$row['CURP'];
					$Nombre=$row['Nombre'];
					$Telefono=$row['Telefono'];
					$email=$row['email'];



					echo "	<tr id=\"". $idAlumno ."\">
					<td>$idAlumno</td>
					<td><a href='pantallaModificaAlumno.php?curp=$CURP'>$CURP</a></td>
					<td>$Nombre</td>
					<td>$Telefono</td>
					<td>$email</td>
					<td><a href='pantallaRegistrarCurso.php?idAlumno=$idAlumno&bloque=1' class='btn btn-primary btn-xs'>Inscribir a curso</a></td>
					<td><a onclick=\"valida('$CURP')\" class='btn btn-primary btn-xs'>Baja</a></td>
					</tr>";
				}
				?>

			</tbody>
		</table>


		<hr>
		<footer>
			<p>&copy; ITESM 2014</p>
		</footer>
	</div>

	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootswatch.js"></script>
</body>
</html>
