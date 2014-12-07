
<?php
	include "./includes/conexion.php";
	session_start();
	if(!isset($_SESSION['nomina'])){
		echo "<script language=\"javascript\">
					alert(\"Inicie sesion primero\");
					window.location.href = \"index.html\"
				</script>";
	}
$sql="select 
        c.Nombre,
        i.idCurso,
        PAGADA,
        idAlumno,
        NOMINAUSUARIO,
        FORMAPAGO,
        FECHADEINSCRIPCION
      from
        inscripcion i inner join curso c
                            on i.idCurso = c.idCurso
       WHERE NOW()-FECHADEINSCRIPCION>=86400 and PAGADA=0 ";

  $result = mysql_query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Reporte</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
   <script>
		function valida(idCurso){
			return confirm("¿Esta seguro?");
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
      <a href="pantallaPagos.php" class="navbar-brand">Tec Deportes</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cerrarSesion.php">Cerrar sesión</a></li>
      </ul>
    </div>
  </div>

  <div class="container">
	<table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>Folio Alumno </th>
          <th>Curso</th>
          <th>Fecha de Inscripcion</th>
		      <th>Forma de Pago</th>
          <th>Nomina del Staff que registro</th>
		      <th>¿Pagada?</th>
          <th>Dar de baja del curso</th>
        </tr>
      </thead>
      <tbody>

        <?php
  
    while($row = mysql_fetch_array($result)){
          $nombreCurso= $row['Nombre'];
          $pagada= $row['PAGADA'];
          $idCurso= $row['idCurso'];
          $idAlumno= $row['idAlumno'];
          $nominaUsuario = $row['NOMINAUSUARIO'];
          $formaPago = $row['FORMAPAGO'];
          $fechaInscripcion = $row['FECHADEINSCRIPCION'];

      echo "  <tr>
            <td>$idAlumno</td>
            <td><a href='pantallaModificarPago.php?idAlumno=$idAlumno&idCurso=$idCurso'>$nombreCurso</a></td>
            <td>$fechaInscripcion</td>";
            if($formaPago){
            echo "<td>Nomina</td>";  
            }
            else{
             echo "<td>Deposito</td>";   
            }

      echo "<td>$nominaUsuario</td>";
            if($pagada){
           echo "<td>Si</td>";
          }
          else{
           echo "<td>No</td>"; 
          }
      echo "
            <form action='cancelarInscripcionAtrasados.php' method='POST' onsubmit='return valida()'> 
              <input type='hidden' name='idCurso' value='$idCurso'/>
              <input type='hidden' name='idAlumno' value='$idAlumno'/>
              <td><input type='submit' class='btn btn-primary btn-xs' value='Dar de baja'></td>
            </form>
          </tr>";
    } 
  ?>

      
    </tbody>
  </table>


      <hr>
      <footer>
        <p>&copy; ITESM 2014</p>
      </footer>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>