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
      <h1 align="center">Reporte</h1>
      <p class="lead" align="center">Esta es una pantalla generica donde se desplegará cada uno de los reportes que tenemos que generar.</p> 

    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>#</th>
          <th>Column heading</th>
          <th>Column heading</th>
          <th>Column heading</th>
        </tr>
      </thead>
      <tbody>
      <tr>
        <td>1</td>
        <td>Column content</td>
        <td>Column content</td>
        <td>Column content</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Column content</td>
        <td>Column content</td>
        <td>Column content</td>
      </tr>
      <tr class="info">
        <td>3</td>
        <td>Column content</td>
        <td>Column content</td>
        <td>Column content</td>
      </tr>
      <tr class="success">
        <td>4</td>
        <td>Column content</td>
        <td>Column content</td>
        <td>Column content</td>
      </tr>
      <tr class="danger">
        <td>5</td>
        <td>Column content</td>
        <td>Column content</td>
        <td>Column content</td>
      </tr>
      <tr class="warning">
        <td>6</td>
        <td>Column content</td>
        <td>Column content</td>
        <td>Column content</td>
      </tr>
      <tr class="active">
        <td>7</td>
        <td>Column content</td>
        <td>Column content</td>
        <td>Column content</td>
      </tr>
    </tbody>
  </table>

  <a href="prueba.php">Bajar archivo</a>

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