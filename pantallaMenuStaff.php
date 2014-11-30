
<?php
include "./includes/conexion.php";
include "./includes/sesionStaff.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Administración</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
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
      <a class="navbar-brand">Tec Deportes</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cerrarSesion.php">Cerrar sesión</a></li>
      </ul>
    </div>
  </div>

  <!-- Este div container es para el jumbotron de bienvenida -->
  <div class="container">
    <div class="jumbotron">
		<h1>Bienvenido</h1>
		<p>Usted a ingresado al sistema como staff.</p>
	</div>

    <!-- Este div container es para las opciones de bienvenida que tiene el adminsitrador -->
    <div class="list-group">
      <a href="pantallaIndexStaff.php" class="list-group-item">
        <h4 class="list-group-item-heading">Alumnos</h4>
        <p class="list-group-item-text">Aquí puede dar de alta y modificar alumnos y registrarlos a clases.</p>
      </a>
      <a href="pantallaPagos.php" class="list-group-item">
        <h4 class="list-group-item-heading">Pagos</h4>
        <p class="list-group-item-text">Consultar pagos.</p>
      </a>
    </div>

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
