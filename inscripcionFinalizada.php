
<?php
include "./includes/conexion.php";
include "./includes/sesionStaff.php";


$idAlumno= isset($_POST["idAlumno"]) ? $_POST['idAlumno'] : -1;
$idCurso= isset($_POST["idCurso"]) ? $_POST['idCurso'] : -1;
$formaDePago = $_POST['formaDePago'];
$nomina = $_POST['nominaEmpleado']; 

echo $idAlumno;
echo $idCurso;

$sql= "INSERT INTO INSCRIPCION (IDALUMNO, IDCURSO, NOMINAUSUARIO, FORMAPAGO, FECHADEINSCRIPCION, PAGADA) VALUES ($idAlumno, $idCurso, '$nomina', $formaDePago, NOW(), FALSE)";
$result = mysql_query($sql);




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Reporte</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
  <link rel="stylesheet" href="../assets/css/bootswatch.min.css">
  <script src="./includes/noback.js" ></script>
</head>
  <!-- Este div container es para la navigation bar de arriba -->
  <div class="navbar navbar-default">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand">Tec Deportes</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cerrarSesion.php">Cerrar sesión</a></li>
      </ul>
    </div>
  </div>

  <div class="container">

 <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">

        <?php
            echo "<a class='btn btn-default' href='pantallaIndexStaff.php' role='button'>Aceptar</a>";
        ?>
      </div>
    </div>


          <footer>
        <p>&copy; ITESM 2014</p>
      </footer>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootswatch.js"></script>
  </body>
  </html>
