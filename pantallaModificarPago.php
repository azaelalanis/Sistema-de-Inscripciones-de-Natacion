<?php
	include "./includes/conexion.php";
	include "./includes/sesionStaff.php";
	
$idCurso= isset($_GET["idCurso"]) ? $_GET['idCurso'] : -1;
$idAlumno= isset($_GET["idAlumno"]) ? $_GET['idAlumno'] : -1;
	
$sql="select 
        c.Nombre,
        PAGADA
      from
        inscripcion i inner join curso c
                            on $idCurso = c.idCurso
       WHERE idAlumno=$idAlumno and i.idCurso=$idCurso ";

	$result = mysql_query($sql);
  $row = mysql_fetch_array($result);
  $nombreCurso= $row['Nombre'];
  $pagada= $row['PAGADA'];
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
      <a href="pantallaIndexStaff.php" class="navbar-brand">Tec Deportes</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cerrarSesion.php">Cerrar sesión</a></li>
      </ul>
    </div>
  </div>

  <div class="container">
    <form action='actualizarPago.php' method='POST'>
    <input type='hidden' name='idCurso' value='<?=$idCurso?>'/>
    <input type='hidden' name='idAlumno' value='<?=$idAlumno?>'/>
    <div class="form-group">
      <label for="curso" class="col-lg-2 control-label">Curso</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="curso" name="curso"  value="<?=$nombreCurso?>" readonly>
      </div>
    </div>
        <div class="form-group">
      <label class="col-lg-2 control-label">¿Pagada?</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="pagada" id="pagadaSi" name="pagada" value="TRUE" <?php if($pagada == 1) echo "checked"; ?> >
            Pago realizado
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="pagada" id="pagadaNo" name="pagada" value="False" <?php if($pagada == 0) echo "checked"; ?>>
            Pago no realizado 
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" name="submitX" class="btn btn-primary">Actualizar</button>
        <a class="btn btn-default" href="pantallaDetallePago.php?idAlumno=<?=$idAlumno?>" role="button">Cancelar</a>
      </div>
    </div>

    </form>
      <footer>
        <p>&copy; ITESM 2014</p>
      </footer>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootswatch.js"></script>
  </body>
  </html>