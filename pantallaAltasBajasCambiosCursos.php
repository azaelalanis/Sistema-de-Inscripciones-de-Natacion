
<?php

/**
* Este archivo es la pantalla donde se enlistan los cursos y te permite dar de alta, baja o cambiar un curso en particular.
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
include "./includes/sesionAdmin.php";


$sql="	select
			idCurso,
			Nombre,
			Cupo,
			CanMaestros,
			DiasDeLaSemana,
			EdadMinima,
			EdadMaxima,
			Precio
		from
			curso";

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
	function valida(idCurso){
		if (confirm("¿Esta seguro?") == true) {
			window.location.href = "bajaCurso.php?id="+idCurso;
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
			<a href="pantallaIndexAdmin.php" class="navbar-brand">Tec Deportes</a>
		</div>
		<div class="navbar-collapse collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav">
				<li><a href="pantallaCursos.php">Agregar nuevo curso</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="cerrarSesion.php">Cerrar sesión</a></li>
			</ul>
		</div>
	</div>

	<div class="container">
		<!-- Titulo de la forma -->
		<h1 align="center">Cursos</h1>
		<p class="lead" align="center">Aqui se despliegan los cursos que se imparten actualmente.</p>

		<table class="table table-striped table-hover ">
			<thead>
				<tr>
					<th>id</th>
					<th>Curso</th>
					<th>Cupo</th>
					<th>Num. Maestros</th>
					<th>Edad M&iacute;nima</th>
					<th>Edad M&aacute;xima</th>
					<th>D&iacute;as de la semana</th>
					<th>Precio</th>
					<th>Dar de baja</th>
				</tr>
			</thead>
			<tbody>
				<?php

				while($row = mysql_fetch_array($result)){
					$idCurso=$row['idCurso'];
					$Nombre=$row['Nombre'];
					$Cupo=$row['Cupo'];
					$CanMaestros = $row['CanMaestros'];
					$DiasDeLaSemana = $row['DiasDeLaSemana'];
					$EdadMinima = $row['EdadMinima'];
					$EdadMaxima = $row['EdadMaxima'];
					$Precio = $row['Precio'];
					echo "<tr>
					<td>$idCurso</td>
					<td><a href=\"pantallaCursosModificar.php?idCurso=$idCurso\">$Nombre</a></td>
					<td>$Cupo</td>
					<td>$CanMaestros</td>
					<td>$EdadMinima</td>
					<td>$EdadMaxima</td>
					<td>$DiasDeLaSemana</td>
					<td>$Precio</td>
					<td><a onclick=\"valida($idCurso)\" class=\"btn btn-primary btn-xs\">Baja</a></td>
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
</body>
</html>
