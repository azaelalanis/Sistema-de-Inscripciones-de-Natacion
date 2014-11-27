<?php require("includes/conexion.php"); ?>

<?php
header('Content-type: application/json');

$nom = mysql_real_escape_string($_REQUEST["nombreCurso"]);
$query = mysql_query("SELECT Nombre from curso where Nombre='$nom'");
$find=mysql_num_rows($query);
 if($find>0){
        $output = json_encode(false);
 }
 else{
        $output = json_encode(true);
 }
 echo $output;
?>
 