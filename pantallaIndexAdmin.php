
<?php

/**
* Este archivo es la pantalla de inicio del administrador.
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Administración</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
  <script>
  function valida(){
    if (confirm("¿Esta seguro? si acepta se borraran todas las inscripciones a cursos como tambien los pagos (no se borran cursos, usuarios ni alumnos)") == true) {
      window.location.href = "borrarBaseDatos.php";
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
      <p>Usted a ingresado al sistema como administrador.</p>
    </div>

    <!-- Este div container es para las opciones de bienvenida que tiene el adminsitrador -->
    <div class="list-group">
      <a href="pantallaReporteGenerica.php" class="list-group-item">
        <h4 class="list-group-item-heading">Reportes</h4>
        <p class="list-group-item-text">Aquí puede encontrar reportes relacionados con los alumnos y los pagos.</p>
      </a>
      <a href="pantallaAltasBajasCambiosCursos.php" class="list-group-item">
        <h4 class="list-group-item-heading">Cursos</h4>
        <p class="list-group-item-text">Aquí puede encontrar la lista de cada curso clasificado por categoría y horario.</p>
      </a>
      <a href="pantallaAltasBajasCambiosStaff.php" class="list-group-item">
        <h4 class="list-group-item-heading">Staff</h4>
        <p class="list-group-item-text">Aquí puede encontrar la lista de Staff del departamento.</p>
      </a>
      <a href="pantallaPagos.php" class="list-group-item">
        <h4 class="list-group-item-heading">Pagos</h4>
        <p class="list-group-item-text">Consultar pagos</p>
      </a>
      <a onclick="valida()" class="list-group-item">
        <h4 class="list-group-item-heading">Borrar Base de Datos</h4>
        <p class="list-group-item-text">Aquí puede borrar la relación de los alumnos con sus cursos.</p>
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
