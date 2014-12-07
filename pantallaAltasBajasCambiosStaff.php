<?php

/**
* Este archivo es la pantalla donde se enlistan los miembros del staff y te permite dar de alta, baja o cambiar un staff en particular.
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


	$sql="select
				Nomina,
				Nombre
			from
				usuario
			where Tipo = 1";

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
		function valida(Nomina){
			if (confirm("¿Esta seguro?") == true) {
				window.location.href = "bajaStaff.php?nomina="+Nomina;
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
        <li><a href="pantallaRegistroStaff.php">Agregar nuevo staff</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cerrarSesion.php">Cerrar sesión</a></li>
      </ul>
    </div>
  </div>

  <div class="container">
    <!-- Titulo de la forma -->
    <h1 align="center">Staff</h1>
    <p class="lead" align="center">Aqui se despliegan los miembros del Staff y da la opción de dar de baja a cualquiera de ellos.</p>

    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>N&oacute;mina</th>
		  <th>Nombre</th>
          <th>Dar de baja</th>
        </tr>
      </thead>
      <tbody>
	  <?php

		while($row = mysql_fetch_array($result)){
			$Nomina = $row['Nomina'];
			$Nombre = $row['Nombre'];
			echo "	<tr>
						<td><a href='pantallaModificaStaff.php?nomina=$Nomina'>$Nomina</a></td>
						<td>$Nombre</td>
						<td><a onclick=\"valida('$Nomina')\" class='btn btn-primary btn-xs'>Baja</a></td>
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
  <script src="js/bootswatch.js"></script>
</body>
</html>
