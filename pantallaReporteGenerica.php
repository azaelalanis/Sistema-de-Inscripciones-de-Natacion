<?php

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
