<?php
// connection with the database
include "./includes/conexion.php";

// require the PHPExcel file
require './Classes/PHPExcel.php';

// simple query

$query = "SELECT Nombre, bloque, Cupo, HoraInicio, Duracion, DiasDeLaSemana, Precio FROM curso ORDER by bloque DESC";
$headings = array('Nombre', 'Bloque','Cupo de Alumnos', 'Hora de Inicio', 'Duracion', 'Frecuencia', 'Precio');

if ($result = mysql_query($query) or die(mysql_error())) {
  // Create a new PHPExcel object
  $objPHPExcel = new PHPExcel();
  $objPHPExcel->getActiveSheet()->setTitle('Lista de Alumnos');

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
  header('Content-Disposition: attachment;filename="reporteCursos.xls"');
  header('Cache-Control: max-age=0');

  $objWriter->save('php://output');
  exit();
}
echo 'A problem has occurred... no data retrieved from the database';
?>
