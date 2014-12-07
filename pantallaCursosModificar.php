<!DOCTYPE html>
<?php

/**
* Este archivo es la pantalla donde modificas informacion sobre los cursos.
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
require_once("includes/actualizarCurso.php");
include './includes/sesionAdmin.php';

$idCurso=0;
if(isset($_GET['idCurso'])){
  $idCurso=$_GET['idCurso'];
}

$sql="select
Nombre,
Cupo,
Duracion,
CanMaestros,
DiasDeLaSemana,
HoraInicio,
EdadMinima,
EdadMaxima,
Precio,
BLOQUE
from
curso
where idCurso = $idCurso";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result)){
  $Nombre=$row['Nombre'];
  $Duracion = $row['Duracion'];
  $HoraInicio = $row['HoraInicio'];
  $Cupo=$row['Cupo'];
  $CanMaestros = $row['CanMaestros'];
  $DiasDeLaSemana = $row['DiasDeLaSemana'];
  $EdadMinima = $row['EdadMinima'];
  $EdadMaxima = $row['EdadMaxima'];
  $Precio = $row['Precio'];
  $bloque = $row['BLOQUE'];
}
$horas = explode(":", $HoraInicio);
$hora = $horas[0];
$minuto = $horas[1];

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Registro de Curso</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
  <script src="js/jquery_alphanum.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootswatch.js"></script>
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
            <input type="text" class="form-control" id="nombreCurso" name = "nombreCurso" placeholder="Nombre" value="<?=$Nombre?>">
          </div>
        </div>

        <!-- Duración en minutos del curso -->
        <div class="form-group">
          <label for="duracion" class="col-lg-2 control-label">Duración en minutos</label>
          <div class="col-lg-10">
            <select id="duracion" name = "duracion">
              <option class="form-control" value="30" <?php if($Duracion == 30) echo "selected";?> >30</option>
              <option class="form-control" value="60" <?php if($Duracion == 60) echo "selected";?> >60</option>
              <option class="form-control" value="90" <?php if($Duracion == 90) echo "selected";?> >90</option>
              <option class="form-control" value="120" <?php if($Duracion == 120) echo "selected";?> >120</option>
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
                echo "<option class='form-control' value='$i' ";

                if($CanMaestros == $i) echo "selected";

                echo ">" . $i . "</option>";
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
                      <?php
                      for($i=0;$i<24;$i++){
                        echo "<option class='form-control' value='$i'";
                        if($hora == $i) echo "selected";
                        echo ">$i</option>";
                      }
                      ?>
                    </select>
                  </td>
                  <td>
                    <b>:</b>
                  </td>
                  <td>
                    <select id="minutoDeInicio" name = "minutoDeInicio">
                      <option class="form-control" value="0" <?php if($minuto == 0) echo "selected";?>>00</option>
                      <option class="form-control" value="15" <?php if($minuto == 15) echo "selected";?>>15</option>
                      <option class="form-control" value="30" <?php if($minuto == 30) echo "selected";?>>30</option>
                      <option class="form-control" value="45" <?php if($minuto == 45) echo "selected";?>>45</option>
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
                echo "<option class='form-control' value='$i' ";
                if($Cupo == $i) echo "selected";
                echo ">$i</option>";
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
                echo "<option class='form-control' value='$i' ";
                if($EdadMinima == $i) echo "selected";
                echo ">$i a&ntilde;os</option>";
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
                echo "<option class='form-control' value='$i' ";
                if($EdadMaxima == $i) echo "selected";
                echo ">$i a&ntilde;os</option>";
              }
              ?>
            </select>
          </div>
        </div>

        <!-- Dias de la semana en la que se imparte el curso -->
        <div class="form-group">
          <label for="telefono" class="col-lg-2 control-label">Dias de la semana</label>
          <div class="col-lg-10">
            <input type="checkbox" name= "diaDeLaSemana[]" value="lun" 	id="Lunes" <?php if(strpos($DiasDeLaSemana, "lun")!=0) echo "checked"; ?> > Lunes <br>
            <input type="checkbox" name= "diaDeLaSemana[]" value="mar" 	id="Martes" <?php if(strpos($DiasDeLaSemana, "mar")!=0) echo "checked"; ?>> Martes <br>
            <input type="checkbox" name= "diaDeLaSemana[]" value="mie" 	id="Miercoles" <?php if(strpos($DiasDeLaSemana, "mie")!=0) echo "checked"; ?>> Miércoles <br>
            <input type="checkbox" name= "diaDeLaSemana[]" value="jue"	id="Jueves" <?php if(strpos($DiasDeLaSemana, "jue")!=0) echo "checked"; ?>> Jueves <br>
            <input type="checkbox" name= "diaDeLaSemana[]" value="vie" 	id="Viernes" <?php if(strpos($DiasDeLaSemana, "vie")!=0) echo "checked"; ?>> Viernes <br>
            <input type="checkbox" name= "diaDeLaSemana[]" value="sab" 	id="Sabado" <?php if(strpos($DiasDeLaSemana, "sab")!=0) echo "checked"; ?>> Sabado <br>
            <input type="checkbox" name= "diaDeLaSemana[]" value="dom"  id="Domingo" <?php if(strpos($DiasDeLaSemana, "dom")!=0) echo "checked"; ?>> Domingo
          </div>
        </div>

        <div class="form-group">
          <label for="precioCurso" class="col-lg-2 control-label">Precio del curso</label>
          <div class="col-lg-10">
            <input type="number" min="0.00" step="50.00" max="2500" class="form-control" id="precioCurso" name = "precioCurso" value="<?=$Precio?>">
          </div>
        </div>


        <div class="form-group">
          <label for="bloque" class="col-lg-2 control-label">Bloque</label>
          <div class="col-lg-10">
            <select id="bloque" name= "bloque">
              <?php
              for($i = 1; $i <= 4; $i++){
                echo "<option class='form-control' value='$i' ";
                if($bloque == $i) echo "selected";
                echo ">$i</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <!-- Botones de submit -->
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-2">
            <input type="hidden" name="idCurso" value="<?=$idCurso?>">
            <button type="submit" name="submitX" class="btn btn-primary">Actualizar</button>
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
