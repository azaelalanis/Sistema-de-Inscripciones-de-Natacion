<?php

/**
* Este archivo es la pantalla de modificar alumno que ya esta dado de alta anteriormente en el sistema.
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

	$CURP="";
	if(isset($_GET['curp'])){
		$CURP=$_GET['curp'];
	}

	$sql="select
			idAlumno,
			Nombre,
			FechaNacimiento,
			SeguroMedico,
			NombrePadre,
			Nomina,
			DepartamentoEmpleado,
			ExtensionEmpleado,
			TipoDeContrato,
			Telefono,
			email,
			PapeleriaCompleta,
			ExperienciaAlumno,
			Comentarios
		from
			alumno
		where CURP = '$CURP'";

	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result)){
		$idAlumno = $row['idAlumno'];
		$Nombre = $row['Nombre'];
		$FechaNacimiento=$row['FechaNacimiento'];
		$SeguroMedico = $row['SeguroMedico'];
		$NombrePadre = $row['NombrePadre'];
		$Nomina=$row['Nomina'];
		$DepartamentoEmpleado = $row['DepartamentoEmpleado'];
		$ExtensionEmpleado = $row['ExtensionEmpleado'];
		$TipoDeContrato=$row['TipoDeContrato'];
		$Telefono = $row['Telefono'];
		$email = $row['email'];
		$PapeleriaCompleta=$row['PapeleriaCompleta'];
		$ExperienciaAlumno = $row['ExperienciaAlumno'];
		$Comentarios = $row['Comentarios'];
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registro de alumno nuevo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="../assets/css/bootswatch.min.css">

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
    	<ul class="nav navbar-nav">
    	</ul>
    	<ul class="nav navbar-nav navbar-right">
      		<li><a href="cerrarSesion.php">Cerrar sesión</a></li>
    	</ul>
    </div>
  	</div>

    <body>
  	<!-- Titulo de la forma -->
  	<h1 align="center">Datos alumno</h1>
  	<p class="lead" align="center">Ingrese la información necesaria en los campos de esta forma para registrar al alumno en la base de datos.</p>


  	<!-- Codigo de la forma -->
  	<div class="container">
  	<form class="form-horizontal" action="ActualizarAlumno.php" method="post">
  <fieldset>
    <legend>Clases de Natación</legend>
    <!-- Nombre completo del alumno -->
    <div class="form-group">
      <label for="nombreCompleto" class="col-lg-2 control-label">Nombre completo</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" placeholder="Nombre" value="<?=$Nombre ?>" >
      </div>
    </div>

    <!-- Fecha de nacimiento del alumno -->
    <div class="form-group">
      <label for="fechaNacimiento" class="col-lg-2 control-label">Fecha de Nacimiento</label>
      <div class="col-lg-10">
        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" placeholder="dd/mm/aaaa" value="<?=$FechaNacimiento ?>">
      </div>
    </div>
    <!-- CURP del alumno -->
    <div class="form-group">
      <label for="curp" class="col-lg-2 control-label">CURP</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" value="<?=$CURP?>" readonly>
      </div>
    </div>
    <!-- Seguro medico y compañia del alumno -->
    <div class="form-group">
      <label for="seguroMedico" class="col-lg-2 control-label">Seguro Médico y Compañía</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="seguroMedico" name="seguroMedico" placeholder="Seguro Médico y Compañía" value="<?=$SeguroMedico ?>">
      </div>
    </div>
    <!-- Nombre del padre o tutor del alumno -->
    <div class="form-group">
      <label for="nombrePadre" class="col-lg-2 control-label">Nombre del Padre o Tutor</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="nombrePadre" name="nombrePadre" placeholder="Nombre del Padre o Tutor" value="<?=$NombrePadre ?>">
      </div>
    </div>
    <!-- Nomina del empleado -->
    <div class="form-group">
      <label for="nominaEmpleado" class="col-lg-2 control-label">Nomina del Empleado</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="nominaEmpleado" name="nominaEmpleado" placeholder="Nomina del Empleado (Opcional)" value="<?=$Nomina ?>">
      </div>
    </div>
    <!-- Departamento del empleado -->
    <div class="form-group">
      <label for="deptoEmpleado" class="col-lg-2 control-label">Departamento del empleado</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="deptoEmpleado" name="deptoEmpleado" placeholder="Departamento del Empleado (Opcional)" value="<?=$DepartamentoEmpleado ?>">
      </div>
    </div>
    <!-- Extension del empleado -->
    <div class="form-group">
      <label for="extensionEmpleado" class="col-lg-2 control-label">Extensión del Empleado</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="extensionEmpleado" name="extensionEmpleado" placeholder="Extensión del Empleado (Opcional)" value="<?=$ExtensionEmpleado ?>">
      </div>
    </div>
    <!-- Tipo de contrato del empleado -->
    <div class="form-group">
      <label for="tipoContrato" class="col-lg-2 control-label">Tipo de Contrato</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="tipoContrato" name="tipoContrato" placeholder="Tipo de Contrato del Empleado (Opcional)" value="<?=$TipoDeContrato?>">
      </div>
    </div>
    <!-- Telefono de casa u oficina del padre o tutor -->
    <div class="form-group">
      <label for="telefono" class="col-lg-2 control-label">Teléfono de casa u oficina</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="<?=$Telefono ?>">
      </div>
    </div>
    <!-- Email del padre o tutor -->
    <div class="form-group">
      <label for="email" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?=$email ?>">
      </div>
    </div>
    <!-- Papeleria completa o incompleta -->
    <div class="form-group">
      <label class="col-lg-2 control-label">Papelería Completa</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="papeleria" id="papeleriaSi" name="papeleria" value="TRUE" <?php if($PapeleriaCompleta == 1) echo "checked"; ?> >
            Ya está completa
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="papeleria" id="papeleriaNo" name="papeleria" value="False" <?php if($PapeleriaCompleta == 0) echo "checked"; ?>>
            No está completa
          </label>
        </div>
      </div>
    </div>
    <!-- Experiencia del alumno -->
    <div class="form-group">
      <label for="conocimientos" class="col-lg-2 control-label">Experiencia del alumno</label>
      <div class="col-lg-10">
        <select class="form-control" id="conocimientos" name="conocimientos">
          <option value="0" <?php if($ExperienciaAlumno==0) echo "selected";?>>Nunca ha tomado clases de natación.</option>
          <option value="1" <?php if($ExperienciaAlumno==1) echo "selected";?>>Ya ha tomado clases de natación, se desplaza distancias cortas.</option>
          <option value="2" <?php if($ExperienciaAlumno==2) echo "selected";?>>Ya ha tomado clases de natación y sabe nadar bien.</option>
        </select>
        <br>
      </div>
    </div>
    <!-- Comentarios extras -->
    <div class="form-group">
      <label for="comentarios" class="col-lg-2 control-label">Comentarios extras</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" name="comentarios" id="comentarios"><?=$Comentarios?></textarea>
        <span class="help-block">Agregar cualquier tipo de información extra que se considere importante sobre el alumno.</span>
      </div>
    </div>
    <!-- Botones de submit -->
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      	<button type="submit" class="btn btn-primary">Actualizar</button>
        <a class="btn btn-default" href="pantallaIndexStaff.php" role="button">Cancelar</a>
      </div>
    </div>
  </fieldset>
</form>
	<hr>
    <footer>
    	<p>&copy; ITESM 2014</p>
    </footer>
</div>
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootswatch.js"></script>
  </body>
</html>
</html>
