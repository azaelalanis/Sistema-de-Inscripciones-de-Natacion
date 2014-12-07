<?php require("includes/conexion.php");

$id = $_GET['id'];

$query = ("SELECT Cupo, AlumnosInscritos FROM curso WHERE idCurso = $id");
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
      $Cupo = $row['Cupo'];
      $AlumnosInscritos = $row['AlumnosInscritos']; //Restar Cupo - AlumnosInscritos nos dara el cupo actual
      $CupoActual = $Cupo - $AlumnosInscritos;;
}
  echo $CupoActual;
?>
