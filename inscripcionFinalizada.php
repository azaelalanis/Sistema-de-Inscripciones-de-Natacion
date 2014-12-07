<?php

/**
* Este archivo es la pantalla de inscripcion de alumno y tiene parte de php para insertar el alumno en la base de datos.
*
* @category   Proyecto
* @package    Sistema de Inscripciones de Natacion
* @author     Azael Alberto Alanis Garza <azaelalanis.g@gmail.com>
* @author     Andres Gerardo Cavazos Hernandez <andrscvz@gmail.com>
* @author			Eugenio Jose Martinez Ramos <eugeniomartinez92@gmail.com>
* @author			Roberto Carlos Rivera Martinez <robert_rivmtz@hotmail.com>
* @author			Hector Palomares Gonzalez <hpalomares@itesm.mx>
* @copyright  2014
* @license    The MIT License
* @version    1.0
* @link       https://github.com/azaelalanis/Sistema-de-Inscripciones-de-Natacion.git
*/

include "./includes/conexion.php";
include "./includes/sesionStaff.php";


$idAlumno= isset($_POST["idAlumno"]) ? $_POST['idAlumno'] : -1;
$idCurso= isset($_POST["idCurso"]) ? $_POST['idCurso'] : -1;

$formaDePago = isset($_POST["formaDePago"]) ? $_POST['formaDePago']: -1;
//$nomina = isset($_POST["nominaEmpleado"]) ? $_POST['nominaEmpleado']: "";
$nomina = isset($_SESSION["nomina"]) ? $_SESSION['nomina']: "";


if($idCurso != -1){
	if($formaDePago){
		$sql= "INSERT INTO INSCRIPCION (
			IDALUMNO, IDCURSO, NOMINAUSUARIO, FORMAPAGO, FECHADEINSCRIPCION, PAGADA)
			VALUES (
				$idAlumno, $idCurso, '$nomina', $formaDePago, NOW(), TRUE)";
	}else{
		$sql= "INSERT INTO INSCRIPCION (
			IDALUMNO, IDCURSO, NOMINAUSUARIO, FORMAPAGO, FECHADEINSCRIPCION, PAGADA)
			VALUES (
				$idAlumno, $idCurso, '$nomina', $formaDePago, NOW(), FALSE)";
	}
			$result = mysql_query($sql);

			require_once('PHPMailer/class.phpmailer.php');
			require 'PHPMailer/PHPMailerAutoload.php';

			define('GUSER', 'tecnatacion@gmail.com'); // GMail username
			define('GPWD', 'nataciontec1'); // GMail password

			function smtpmailer($to, $from, $from_name, $subject, $body) {
				global $error;
				$mail = new PHPMailer();  // create a new object
				$mail->IsSMTP(); // enable SMTP
				$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
				$mail->SMTPAuth = true;  // authentication enabled
				$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
				$mail->Host = 'smtp.gmail.com';
				$mail->Port = 465;
				$mail->Username = GUSER;
				$mail->Password = GPWD;
				$mail->SetFrom($from, $from_name);
				$mail->Subject = $subject;
				$mail->Body = $body;
				$mail->AddAddress($to);
				if(!$mail->Send()) {
					$error = 'Mail error: '.$mail->ErrorInfo;
					return false;
				} else {
					$error = 'Message sent!';
					return true;
				}
			}

			$sql= "select Nombre,email from alumno where idAlumno=$idAlumno";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result)){
				$NombreAlumno = $row['Nombre'];
				$email = $row['email'];
			}

			$sql= "select Nombre,DiasDeLaSemana,HoraInicio from curso where idCurso=$idCurso";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result)){
				$NombreCurso = $row['Nombre'];
				$DiasDeLaSemana = $row['DiasDeLaSemana'];
				$HoraInicio = $row['HoraInicio'];
			}

			$body = "El motivo de este correo es para notificarle la inscripción de su hijo $NombreAlumno al curso $NombreCurso en los dias $DiasDeLaSemana a la hora $HoraInicio ";
			smtpmailer($email, 'tecnatacion@gmail.com', 'Natacion Tec', 'CONFIRMACION DE INSCRIPCION CURSO DE NATACION', $body);
		}

		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="utf-8">
			<title>Inscripci&oacute;n</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="css/bootstrap.css" media="screen">
			<script src="./includes/noback.js" ></script>
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
					<a href="pantallaIndexStaff.php" class="navbar-brand">Tec Deportes</a>
				</div>
				<div class="navbar-collapse collapse navbar-responsive-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="cerrarSesion.php">Cerrar sesi&oacute;n</a></li>
					</ul>
				</div>
			</div>
			<div class="container">
				<div class="jumbotron">
					<h1>Registrado con &eacute;xito!</h1>
					<p>Se enviar&aacute; un correo electr&oacute;nico con la confirmaci&oacute;n</p>
				</div>
				<div class="form-group" align="right">
					<div class="col-lg-10 col-lg-offset-2">
						<a class='btn btn-default' href='pantallaIndexStaff.php' role='button'>Aceptar</a>
					</div>
				</div>
				<footer>
					<p>&copy; ITESM 2014</p>
				</footer>
			</div>
		</body>
		</html>
