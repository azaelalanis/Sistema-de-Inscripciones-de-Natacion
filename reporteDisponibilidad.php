<?php
// connection with the database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "natacion";

mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);

// require the PHPExcel file
require './Classes/PHPExcel.php';

// simple query

$query = "SELECT a.NominaUsuario, b.Nombre, b.CURP, b.FechaNacimiento, b.NombrePadre, b.Telefono, b.email FROM inscripcion a, alumno b WHERE a.idAlumno = b.idAlumno AND a.FormaPago = 1 ORDER BY a.NominaUsuario";
$headings = array('Nomina', 'Nombre del Alumno','CURP', 'Fecha de Nacimiento', 'Nombre del Padre', 'Telefono', 'Correo');

if ($result = mysql_query($query) or die(mysql_error())) {
  // Create a new PHPExcel object
  $objPHPExcel = new PHPExcel();
  $objPHPExcel->getActiveSheet()->setTitle('Lista de cursos disponibles');

  $rowNumber = 1;
  $col = 'A';
  foreach($headings as $heading) {
    $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$heading);
    $col++;
  }

  // Loop through the result set
  $rowNumber = 2;
  while ($row = mysql_fetch_row($result)) {
    $col = 'A';
    foreach($row as $cell) {
      $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$cell);
      $col++;
    }
    $rowNumber++;
  }

  // Freeze pane so that the heading line won't scroll
  $objPHPExcel->getActiveSheet()->freezePane('A2');

  // Save as an Excel BIFF (xls) file
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="reporteDisponibilidad.xls"');
  header('Cache-Control: max-age=0');

  $objWriter->save('php://output');
  exit();
}
echo 'A problem has occurred... no data retrieved from the database';
?>
