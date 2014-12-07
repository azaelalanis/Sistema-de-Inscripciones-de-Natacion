<!DOCTYPE html>
<?php

/**
* Este archivo es la pantalla donde el adminstrador registra un nuevo miembro del staff.
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

	require_once("includes/conexion.php");
	require_once("includes/registrarUsuario.php");
	include "./includes/sesionAdmin.php";
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registro de staff nuevo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="../assets/css/bootswatch.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    <script src="js/jquery_alphanum.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootswatch.js"></script>
    <script>
            $(function(){
                $('#nombreEmpleado').alpha();
                $('#nominaEmpleado').alphanum();
                $('#formReg').validate({
                    rules:{
                        'nominaEmpleado': {
                            required: true,
                            remote: {
                                type: 'post',
                                dataType: 'json',
                                url: "checknomina.php",
                                async:false
                            }
                        },
                        'contraseña':  {required: true, minlength: 8},
                        'nombreEmpleado': {required: true, minlength: 3}

                    },
                    messages: {
                        'nominaEmpleado': { required: 'Debe ingresar nomina',
                                            remote: 'Nomina ya registrada'
                                 },
                        'nombreEmpleado': { required: 'Debe ingresar su nombre', minlength: 'Minimo 3 Caracteres'},
                        'contraseña': { required: 'Debe ingresar de ingresar contraseña', minlength: 'Minimo 8 Caracteres'}
                    },
                    debug: true,
                    submitHandler: function(form){
                        form.submit();
                    }
                });
            });
        </script>
  </head>
    <!-- Este div container es para la navigation bar de arriba -->
    <body>
  	<div class="navbar navbar-default">
    	<div class="navbar-header">
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      		<span class="icon-bar"></span>
      		<span class="icon-bar"></span>
      		<span class="icon-bar"></span>
    	</button>
    	<a href="pantallaAltasBajasCambiosStaff.php" class="navbar-brand">Tec Deportes</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
    	<ul class="nav navbar-nav">
    	</ul>
    	<ul class="nav navbar-nav navbar-right">
      		<li><a href="cerrarSesion.php">Cerrar sesión</a></li>
    	</ul>
    </div>
  	</div>

  	<!-- Titulo de la forma -->
  	<h1 align="center">Registro de staff nuevo</h1>
  	<p class="lead" align="center">Ingrese la información necesaria en los campos de esta forma para registrar staff nuevo al sistema.</p>

  	<!-- Codigo de la forma -->
  	<div class="container">
  	<form id ="formReg" form action ='' method='post' form class="form-horizontal">
  <fieldset>
    <legend>Registro Staff</legend>
    <!-- Nombre Staff -->
    <div class="form-group">
      <label for="nombreCompleto" class="col-lg-2 control-label">Nombre completo</label>
      <div class="col-lg-10">
        <input type="text" name="nombreEmpleado" class="form-control" id="nombreEmpleado" placeholder="Nombre">
      </div>
    </div>
    <!-- Nomina del empleado -->
    <div class="form-group">
      <label for="nominaEmpleado" class="col-lg-2 control-label">Nomina del Empleado</label>
      <div class="col-lg-10">
        <input type="text" name = "nominaEmpleado" class="form-control" id="nominaEmpleado" placeholder="Nomina del Empleado">
      </div>
    </div>
    <!-- Contraseña -->
    <div class="form-group">
      <label for="clave" class="col-lg-2 control-label">Contraseña</label>
      <div class="col-lg-10">
        <input type="text" name = "contraseña" class="form-control" id="contraseña" placeholder="Contraseña">
      </div>
    </div>
    <!-- Tipo de staff -->
    <div class="form-group">
      <label class="col-lg-2 control-label">Tipo de usuario</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="privilegio" id="1" value="1" checked>
            Staff
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="privilegio" id="0" value="0">
            Administrador
          </label>
        </div>
      </div>
    </div>
    <!-- Botones de submit -->
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      	<input type="submit" name="submitx" class="btn btn-primary" value="Aceptar">
        <a class="btn btn-default" href="pantallaAltasBajasCambiosStaff.php" role="button">Cancelar</a>
      </div>
    </div>
  </fieldset>
</form>
	<hr>
    <footer>
    	<p>&copy; ITESM 2014</p>
    </footer>
</div>
  </body>
</html>
