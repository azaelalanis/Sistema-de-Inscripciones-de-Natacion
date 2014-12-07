<?php

/**
* Este archivo es la pantalla de dar de alta un curso.
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
include "./includes/sesionStaff.php";

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
    	<a class="navbar-brand">Tec Deportes</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
    	<ul class="nav navbar-nav">
    	</ul>
    	<ul class="nav navbar-nav navbar-right">
      		<li><a href="#">Cerrar sesión</a></li>
    	</ul>
    </div>
  	</div>

    <div class="container">
      <!-- Titulo de la forma -->
      <h1 align="center">Inscibir alumno</h1>
      <p class="lead" align="center">Seleccione por favor el curso al que quiere inscribir al alumno.</p>

      <div class="form-group">
      <label for="categoria" class="col-lg-2 control-label">Categoría</label>
      <div class="col-lg-10">
        <select class="form-control" id="categoria">
          <option>Particular</option>
          <option>Borreguitos 1</option>
          <option>Borreguitos 2</option>
        </select>
        <br>
      </div>
    </div>

    <div class="form-group">
      <label for="categoria" class="col-lg-2 control-label">Categoría</label>
      <div class="col-lg-10">
        <select class="form-control" id="categoria">
          <option>Particular</option>
          <option>Borreguitos 1</option>
          <option>Borreguitos 2</option>
        </select>
        <br>
      </div>
    </div>

      <div class="form-group">
        <label class="control-label">Costo del curso</label>
          <div class="input-group">
          <span class="input-group-addon">$</span>
            <input type="text" class="form-control">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Agregar</button>
          </span>
        </div>
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
