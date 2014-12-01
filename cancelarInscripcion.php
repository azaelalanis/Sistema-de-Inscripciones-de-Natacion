
<?php
include "./includes/conexion.php";
include "./includes/sesionStaff.php";


$idCurso= isset($_POST["idCurso"]) ? $_POST['idCurso'] : -1;
$idAlumno= isset($_POST["idAlumno"]) ? $_POST['idAlumno'] : -1;

if($idCurso!= -1){
  $lock=0;
   $sql="Select IS_FREE_LOCK('CURSO-". $idCurso . "')" ;
  
  while ($lock!=1) {
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $lock=$row[0];
  }

  $sql= "Select get_lock('CURSO-'". $idCurso .", 10)";
  $result = mysql_query($sql);
  $sql= "update curso set alumnosInscritos=alumnosinscritos-1 where idCurso='$idCurso'";
  $result = mysql_query($sql);
  $sql="Select release_LOCK('CURSO-". $idCurso . "')" ;
  $result = mysql_query($sql);
  $sql="DELETE FROM inscripcion WHERE idAlumno=$idAlumno and idCurso=$idCurso";
  $result = mysql_query($sql);
}
echo "<script language='javascript'>
          window.location.href = 'pantallaDetallePago.php?idAlumno=$idAlumno'
        </script>";

?>