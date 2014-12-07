<?php

/**
* Este archivo es la pantalla donde muestra la lista de reportes disponibles, aqui le das click en alguno y te lo descarga en excel.
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
include_once "./Classes/PHPExcel.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Reporte</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
  <link rel="stylesheet" href="../assets/css/bootswatch.min.css">

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
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cerrarSesion.php">Cerrar sesión</a></li>
      </ul>
    </div>
  </div>

  <div class="container">
    <!-- Titulo de la forma -->
    <h1 align="center">Reportes</h1>
    <p class="lead" align="center">Seleccione el reporte que desea descargar en formato de Excel.</p>
    <div class="list-group">
      <a href="reporteAlumnos.php" class="list-group-item">
        <h4 class="list-group-item-heading">Alumnos</h4>
        <p class="list-group-item-text">Reporte con información sobre todos los alumnos registrados.</p>
      </a>
      <a href="reporteCursos.php" class="list-group-item">
        <h4 class="list-group-item-heading">Cursos</h4>
        <p class="list-group-item-text">Reporte con información sobre todos los cursos registrados.</p>
      </a>
      <a href="reporteAlumnoCurso.php" class="list-group-item">
        <h4 class="list-group-item-heading">Alumnos y sus cursos</h4>
        <p class="list-group-item-text">Reporte con información sobre los alumnos y los cursos a los que están inscritos.</p>
      </a>
      <a href="reporteNomina.php" class="list-group-item">
        <h4 class="list-group-item-heading">Pagos por Nómina</h4>
        <p class="list-group-item-text">Reporte con información sobre todos los alumnos que pagarán por nómina.</p>
      </a>
      <a href="reportePagado.php" class="list-group-item">
        <h4 class="list-group-item-heading">Alumnos que ya realizaron sus pagos</h4>
        <p class="list-group-item-text">Reporte con información sobre los alumnos que ya pagaron sus cursos.</p>
      </a>
      <a href="reporteNoPagado.php" class="list-group-item">
        <h4 class="list-group-item-heading">Alumnos que no han realizado sus pagos</h4>
        <p class="list-group-item-text">Reporte con información sobre los alumnos que no han pagado sus cursos.</p>
      </a>
      <a href="reporteDisponibilidad.php" class="list-group-item">
        <h4 class="list-group-item-heading">Disponibilidad de Cursos</h4>
        <p class="list-group-item-text">Reporte con información sobre los cursos con espacios disponibles en tiempo real.</p>
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
