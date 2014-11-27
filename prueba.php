<?php

/** require the PHPExcel file 1.0 */
require_once './Classes/PHPExcel.php';

/** Set Memory Limit 1.0 */
    ini_set("memory_limit","500M"); // set your memory limit in the case of memory problem

    /** Caching to discISAM 1.0*/
    $cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_discISAM;
$cacheSettings = array( 'dir'  => '/usr/local/tmp' // If you have a large file you can cache it optional
  );
PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

/** connection with the database 1.0 */
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "natacion";
mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);

/** Query 1.0 */
$query = "SELECT * FROM alumno";

if ($result = mysql_query($query) or die(mysql_error())) {
  /** Create a new PHPExcel object 1.0 */
  $objPHPExcel = new PHPExcel();
  $objPHPExcel->getActiveSheet()->setTitle('Data');
}  

/** Loop through the result set 1.0 */
    $rowNumber = 1; //start in cell 1
    while ($row = mysql_fetch_row($result)) {
       $col = 'A'; // start at column A
       foreach($row as $cell) {
        $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$cell);
        $col++;
      }
      $rowNumber++;
    }
    //echo "Hola";
    /** Create Excel 2007 file with writer 1.0 */
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Technical.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;

    ?>