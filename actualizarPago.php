
<?php
include "./includes/conexion.php";
include "./includes/sesionStaff.php";


$idCurso= isset($_POST["idCurso"]) ? $_POST['idCurso'] : -1;
$idAlumno= isset($_POST["idAlumno"]) ? $_POST['idAlumno'] : -1;
$pagada= isset($_POST["pagada"]) ? $_POST['pagada'] : -1;

if($idCurso!= -1 && $idAlumno!=-1){

  $sql= "UPDATE inscripcion set pagada=$pagada WHERE idAlumno=$idAlumno and idCurso=$idCurso";
  $result = mysql_query($sql);
}

echo "<script language='javascript'>
          window.location.href = 'pantallaDetallePago.php?idAlumno=$idAlumno'
        </script>";

?>