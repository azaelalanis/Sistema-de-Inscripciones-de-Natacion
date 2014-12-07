<?php
/**
* Este archivo se encarga de cancelar la inscripcion de alumnos que se tardaron mas de 24 horas en pagar.
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
	session_start();

	if(!isset($_SESSION['nomina'])){
		echo "<script language=\"javascript\">
					alert(\"Inicie sesion primero\");
					window.location.href = \"index.html\"
				</script>";
	}

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

		$body = "El motivo de este correo es para notificarle que su hijo $NombreAlumno fue dado de baja del curso $NombreCurso que se imparte los dias $DiasDeLaSemana a la hora $HoraInicio";
		$subject= "Baja del curso $NombreCurso";
		smtpmailer($email, 'tecnatacion@gmail.com', 'Natacion Tec', $subject, $body);
	}

	echo "<script language='javascript'>
			  window.location.href = 'pantallaPagosAtrasados.php'
			</script>";
?>
