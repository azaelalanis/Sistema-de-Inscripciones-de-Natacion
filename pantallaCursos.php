<!DOCTYPE html>
<?php

/**
* Este archivo es la pantalla donde ingresas informacion sobre los cursos y lo das de alta.
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
require_once("includes/registrarCurso.php");
include './includes/sesionAdmin.php';
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Registro de Curso</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
  <script src="js/jquery_alphanum.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootswatch.js"></script>
  <script>
  $(function(){
    $('#nombreCurso').alphanum();
    $('#precioCurso').numeric("integer");
    $('#formReg').validate({
      rules:{
        'nombreCurso': {
          required: true,
          remote: {
            type: 'post',
            dataType: 'json',
            url: "checkNombre.php",
            async:false
          }
        },
        'precioCurso':  {required: true},
        'edadMin': {required: true},
        'edadMax': {required: true}
      },
      messages: {
        'nombreCurso': { required: 'Debe ingresar nombre de curso',
        remote: 'Curso con mismo nombre'},
        'precioCurso': { required: 'Debe ingresar precio del curso'},
        'edadMin': { required: 'Debe ingresar de ingresar edad minima'},
        'edadMax': { required: 'Debe ingresar de ingresar edad máxima'}
      },
      debug: true,
      submitHandler: function(form){
        form.submit();
      }
    });
  });
  </script>
  <!-- <link rel="stylesheet" href="../assets/css/bootswatch.min.css"> -->
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
      <a href="pantallaAltasBajasCambiosCursos.php" class="navbar-brand">Tec Deportes</a>
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
  <h1 align="center">Datos sobre el curso</h1>
  <p class="lead" align="center">Ingrese la información necesaria en los campos de esta forma para insertar los datos de un curso en la base de datos.</p>


  <!-- Codigo de la forma -->
  <div class="container">
    <form id ="formReg" form action ='' method='post' form class="form-horizontal">
      <fieldset>
        <legend>Curso</legend>
        <!-- Nombre del curso -->
        <div class="form-group">
          <label for="nombreCurso" class="col-lg-2 control-label">Nombre del curso</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="nombreCurso" name = "nombreCurso" placeholder="Nombre">
          </div>
        </div>

        <!-- Duración en minutos del curso -->
        <div class="form-group">
          <label for="duracion" class="col-lg-2 control-label">Duración en minutos</label>
          <div class="col-lg-10">
            <select id="duracion" name = "duracion">
              <option class="form-control" value="30">30</option>
              <option class="form-control" value="60">60</option>
              <option class="form-control" value="90">90</option>
              <option class="form-control" value="120">120</option>
            </select>
          </div>
        </div>

        <!-- número de maestros que imparten el curso -->
        <div class="form-group">
          <label for="numeroMaestros" class="col-lg-2 control-label">Número de maestros</label>
          <div class="col-lg-10">
            <select id="numeroMaestros" name= "numeroMaestros">
              <?php
              for($i = 0; $i <= 15; $i++){
                echo "<option class=\"form-control\" value=" . $i . ">" . $i . "</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <!-- Hora de inicio del curso -->
        <div class="block">
          <div class="form-group">
            <label for="horaInicio" class="col-lg-2 control-label">Hora de inicio</label>
            <div class="col-lg-10">
              <table style="width:0%">
                <tr>
                  <td>
                    <select id="horaDeInicio" name = "horaDeInicio">
                      <option class="form-control" value="0">00</option>
                      <option class="form-control" value="1">01</option>
                      <option class="form-control" value="2">02</option>
                      <option class="form-control" value="3">03</option>
                      <option class="form-control" value="4">04</option>
                      <option class="form-control" value="5">05</option>
                      <option class="form-control" value="6">06</option>
                      <option class="form-control" value="7">07</option>
                      <option class="form-control" value="8">08</option>
                      <option class="form-control" value="9">09</option>
                      <option class="form-control" value="10">10</option>
                      <option class="form-control" value="11">11</option>
                      <option class="form-control" value="12">12</option>
                      <option class="form-control" value="13">13</option>
                      <option class="form-control" value="14">14</option>
                      <option class="form-control" value="15">15</option>
                      <option class="form-control" value="16">16</option>
                      <option class="form-control" value="17">17</option>
                      <option class="form-control" value="18">18</option>
                      <option class="form-control" value="19">19</option>
                      <option class="form-control" value="20">20</option>
                      <option class="form-control" value="21">21</option>
                      <option class="form-control" value="22">22</option>
                      <option class="form-control" value="23">23</option>

                    </select>
                  </td>
                  <td>
                    <b>:</b>
                  </td>
                  <td>
                    <select id="minutoDeInicio" name = "minutoDeInicio">
                      <option class="form-control" value="0">00</option>
                      <option class="form-control" value="15">15</option>
                      <option class="form-control" value="30">30</option>
                      <option class="form-control" value="45">45</option>
                    </select>
                  </td>
                </tr>
              </table>

            </div>
          </div>
        </div>
        <!-- cupo -->
        <div class="form-group">
          <label for="cupo" class="col-lg-2 control-label">Cupo</label>
          <div class="col-lg-10">
            <select id="cupo" name= "cupo">
              <?php
              for($i = 1; $i <= 50; $i++){
                echo "<option class=\"form-control\" value=" . $i . ">" . $i . "</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <!-- Edad minima permitida para que el niño ingrese al curso -->
        <div class="form-group">
          <label for="edadMin" class="col-lg-2 control-label">Edad mínima</label>
          <div class="col-lg-10">
            <select id="edadMin" name= "edadMin">
              <?php
              for($i = 0; $i <= 10; $i++){
                echo "<option class=\"form-control\" value=" . $i . ">" . $i . " a&ntilde;os</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <!-- Edad maxima permitida para que el niño ingrese al curso-->
        <div class="form-group">
          <label for="edadMax" class="col-lg-2 control-label">Edad máxima</label>
          <div class="col-lg-10">
            <select id="edadMax" name= "edadMax">
              <?php
              for($i = 0; $i <= 15; $i++){
                echo "<option class=\"form-control\" value=" . $i . ">" . $i . " a&ntilde;os</option>";
              }
              ?>
            </select>
          </div>
        </div>

        <!-- Dias de la semana en la que se imparte el curso -->
        <div class="form-group">
          <label for="telefono" class="col-lg-2 control-label">Dias de la semana</label>
          <div class="col-lg-10">
            <input type="checkbox" name= "diaDeLaSemana[]" value="lun" id="Lunes" > Lunes <br>
            <input type="checkbox" name= "diaDeLaSemana[]" value="mar" id="Martes" > Martes <br>
            <input type="checkbox" name= "diaDeLaSemana[]" value="mie" id="Miercoles" > Miércoles <br>
            <input type="checkbox" name= "diaDeLaSemana[]" value="jue"  id="Jueves" > Jueves <br>
            <input type="checkbox" name= "diaDeLaSemana[]" value="vie" id="Viernes" > Viernes <br>
            <input type="checkbox" name= "diaDeLaSemana[]" value="sab" id="Sabado" > Sabado <br>
            <input type="checkbox" name= "diaDeLaSemana[]" value="dom"  id="Domingo" > Domingo

          </div>
        </div>

        <div class="form-group">
          <label for="precioCurso" class="col-lg-2 control-label">Precio del curso</label>
          <div class="col-lg-10">
            <input type="text" min="0.00" max="10000" class="form-control" id="precioCurso" name = "precioCurso" placeholder="$">
          </div>
        </div>

        <div class="form-group">
          <label for="bloque" class="col-lg-2 control-label">Bloque</label>
          <div class="col-lg-10">
            <select id="bloque" name = "bloque">
              <option class="form-control" value="1">1</option>
              <option class="form-control" value="2">2</option>
              <option class="form-control" value="3">3</option>
              <option class="form-control" value="4">4</option>
            </select>
          </div>
        </div>
        <!-- Botones de submit -->
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" name="submitX" class="btn btn-primary">Aceptar</button>
            <a class="btn btn-default" href="pantallaAltasBajasCambiosCursos.php" role="button">Cancelar</a>
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
