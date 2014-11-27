<?php require("includes/conexion.php"); ?>

<?php
header('Content-type: application/json');

$cur = mysql_real_escape_string($_REQUEST["curp"]);
$query = mysql_query("SELECT CURP from alumno where CURP='$cur'");
$find=mysql_num_rows($query);
 if($find>0){
        $output = json_encode(false);
 }
 else{
        $output = json_encode(true);
 }
 echo $output;
?>
 