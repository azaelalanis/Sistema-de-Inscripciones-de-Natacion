<?php
	$conexion = mysql_connect('localhost', 'root', 'root');
	mysql_set_charset('utf8', $conexion);
	if (!$conexion) {
		die('No pudo conectarse: ' . mysql_error());
	}
	$conexion_base = mysql_select_db('natacion', $conexion);
	if (!$conexion_base) {
		die('No se encuentra la base de datos seleccionada : ' . mysql_error());
	}
?>