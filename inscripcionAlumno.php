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
	$sql= "update curso set alumnosInscritos=alumnosinscritos+1 where idCurso='$idCurso' and alumnosinscritos<cupo";
	$update = mysql_query($sql);
	if(mysql_affected_rows()==0){
		$sql="Select release_LOCK('CURSO-". $idCurso . "')" ;
		$result = mysql_query($sql);
		echo "<script language=\"javascript\">
		alert(\"Cupo del curso lleno\");
		window.location.href ='pantallaRegistrarCurso.php?idAlumno=$idAlumno&bloque=1'
		</script>";
	}
	$sql="Select release_LOCK('CURSO-". $idCurso . "')" ;
	$result = mysql_query($sql);


	$sql = "Select Nombre, CURP, Nomina, email, DepartamentoEmpleado, ExtensionEmpleado, TipoDeContrato from alumno where idAlumno = $idAlumno";
	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result)){
		$nombreAlumno = $row['Nombre'];
		$curp = $row['CURP'];
		$nomina = $row['Nomina'];
		$DepartamentoEmpleado = $row['DepartamentoEmpleado'];
		$ExtensionEmpleado = $row['ExtensionEmpleado'];
		$TipoDeContrato = $row['TipoDeContrato'];
		$email = $row['email'];
	}
	$sql = "Select nombre, HoraInicio, Duracion, DiasDeLaSemana, Precio from curso where IdCurso = $idCurso";
	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result)){
		$nombreCurso = $row['nombre'];
		$HoraInicio = $row['HoraInicio'];
		$Duracion = $row['Duracion'];
		$DiasDeLaSemana = $row['DiasDeLaSemana'];
		$Precio = $row['Precio'];
	}

}else{
	echo "<script language=\"javascript\">
	alert(\"No dar actualizar porfavor!\");
	window.location.href = \"pantallaIndexStaff.php\"
	</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Inscripci&oacute;n</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css" media="screen">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script>
	var idCurso = <?=$idCurso?>;

	var submited = false;
	var unloaded = false;

	$(window).on('beforeunload', unload);
	$(window).on('unload', unload);

	function unload(){
		if(!submited)
			if(!unloaded){
				$.ajax({
					type: 'get',
					async: false,
					url: 'liberaLugar.php?idCurso='+idCurso,
					success:function(){
						unloaded = true;
					},
					timeout: 5000
				});
			}
		}
		</script>
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
				<a class="navbar-brand">Tec Deportes</a>
			</div>
			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li></li>
				</ul>
			</div>
		</div>
		<div class="container">
			<h1 align="center">Datos de inscripci&oacute;n</h1>
			<p class="lead" align="center">La inscripci&oacute;n se registrar&aacute; con los siguientes datos.</p>
			<!-- Codigo de la forma -->
			<div class="container">
				<form id ="formReg" form class="form-horizontal" action="inscripcionFinalizada.php" method="post">
					<fieldset>
						<legend>Clases de Natación</legend>
						<!-- Nombre completo del alumno -->
						<div class="form-group">
							<label for="nombreCompleto" class="col-lg-2 control-label">Nombre completo</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" placeholder="Nombre" value="<?=$nombreAlumno?>" readonly>
							</div>
						</div>
						<!-- CURP del alumno -->
						<div class="form-group">
							<label for="curp" class="col-lg-2 control-label">CURP</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" value="<?=$curp?>" readonly>
							</div>
						</div>
						<?php
						if($nomina != NULL && $nomina!=""){
							?>
							<!-- Nomina del empleado -->
							<div class="form-group">
								<label for="nominaEmpleado" class="col-lg-2 control-label">Nomina del Empleado</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="nominaEmpleado" name="nominaEmpleado" placeholder="Nomina del Empleado (Opcional)" value="<?=$nomina?>" readonly>
								</div>
							</div>
							<!-- Departamento del empleado -->
							<div class="form-group">
								<label for="deptoEmpleado" class="col-lg-2 control-label">Departamento del empleado</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="deptoEmpleado" name="deptoEmpleado" placeholder="Departamento del Empleado (Opcional)" value="<?=$DepartamentoEmpleado?>" readonly>
								</div>
							</div>
							<!-- Extension del empleado -->
							<div class="form-group">
								<label for="extensionEmpleado" class="col-lg-2 control-label">Extensión del Empleado</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="extensionEmpleado" name="extensionEmpleado" placeholder="Extensión del Empleado (Opcional)" value="<?=$ExtensionEmpleado?>" readonly>
								</div>
							</div>
							<!-- Tipo de contrato del empleado -->
							<div class="form-group">
								<label for="tipoContrato" class="col-lg-2 control-label">Tipo de Contrato</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="tipoContrato" name="tipoContrato" placeholder="Tipo de Contrato del Empleado (Opcional)" value="<?=$TipoDeContrato?>" readonly>
								</div>
							</div>
							<?php } ?>
							<!-- Email del padre o tutor -->
							<div class="form-group">
								<label for="email" class="col-lg-2 control-label">Email</label>
								<div class="col-lg-10">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?=$email?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="nombreCurso" class="col-lg-2 control-label">Nombre del curso</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="nombreCurso" name = "nombreCurso" placeholder="Nombre" value="<?=$nombreCurso?>" readonly>
								</div>
							</div>
							<!-- Duración en minutos del curso -->
							<div class="form-group">
								<label for="duracion" class="col-lg-2 control-label">Duración en minutos</label>
								<div class="col-lg-10">
									<select id="duracion" name = "duracion">
										<option class="form-control"><?=$Duracion?></option>
									</select>
								</div>
							</div>
							<!-- Hora de inicio del curso -->
							<div class="block">
								<div class="form-group">
									<label for="horaInicio" class="col-lg-2 control-label">Hora de inicio</label>
									<div class="col-lg-10">
										<select id="horaDeInicio" name = "horaDeInicio">
											<option class='form-control' ><?=$HoraInicio?></option>
											";
										</select>
									</div>
								</div>
							</div>
							<!-- Dias de la semana en la que se imparte el curso -->
							<div class="form-group">
								<label for="telefono" class="col-lg-2 control-label">Dias de la semana</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="DiasSemana" name = "DiasSemana" placeholder="Nombre" value="<?=$DiasDeLaSemana?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="precioCurso" class="col-lg-2 control-label">Precio del curso</label>
								<div class="col-lg-10">
									<input type="number" min="0.00" step="50.00" max="2500" class="form-control" id="precioCurso" name = "precioCurso" value="<?=$Precio?>" readonly>
								</div>
							</div>
							<!-- Form -->
							<input type='hidden' name='idCurso' value='<?=$idCurso?>'/>
							<input type='hidden' name='idAlumno' value='<?=$idAlumno?>'/>
							<div class="form-group">
								<label class="col-lg-2 control-label">Forma de pago</label>
								<div class="col-lg-10">
									<div class="radio">
										<label>
											<input type='radio' name='formaDePago' value='FALSE' checked />
											Deposito Bancario
										</label>
									</div>
									<?php
									if($nomina != NULL && $nomina!=""){
										?>
										<div class="radio">
											<label>
												<input type='radio' name='formaDePago' value='TRUE' />
												Nomina
											</label>
										</div>
										<?php } ?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-10 col-lg-offset-2">
										<button type="submit" class="btn btn-primary" onclick="submited = true;">Aceptar</button>
										<?php
										echo "<a class='btn btn-default' href='pantallaIndexStaff.php' role='button'>Cancelar</a>";
										?>
									</div>
								</div>
							</fieldset>
						</form>
						<hr>
						<footer>
							<p>&copy; ITESM 2014</p>
						</footer>
					</div>
				</body>
				</html>
