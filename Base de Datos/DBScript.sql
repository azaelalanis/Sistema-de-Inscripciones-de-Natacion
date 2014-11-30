-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 30, 2014 at 08:53 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `natacion`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE `alumno` (
  `IdAlumno` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `CURP` varchar(20) NOT NULL,
  `SeguroMedico` text NOT NULL,
  `NombrePadre` varchar(50) NOT NULL,
  `Nomina` varchar(15) DEFAULT NULL,
  `DepartamentoEmpleado` varchar(20) DEFAULT NULL,
  `ExtensionEmpleado` varchar(10) DEFAULT NULL,
  `TipoDeContrato` varchar(30) DEFAULT NULL,
  `Telefono` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `PapeleriaCompleta` tinyint(1) NOT NULL,
  `ExperienciaAlumno` int(11) NOT NULL,
  `Comentarios` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`IdAlumno`, `Nombre`, `FechaNacimiento`, `CURP`, `SeguroMedico`, `NombrePadre`, `Nomina`, `DepartamentoEmpleado`, `ExtensionEmpleado`, `TipoDeContrato`, `Telefono`, `email`, `PapeleriaCompleta`, `ExperienciaAlumno`, `Comentarios`) VALUES
(1, 'Azael', '2014-11-04', 'CURP', 'Seguro', 'Padre', '', '', '', '', '83174205', 'azael.minuet@hotmail.com', 1, 1, 'Comentarios');

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `IdCurso` int(11) NOT NULL,
  `bloque` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Cupo` int(11) NOT NULL,
  `EdadMinima` int(11) NOT NULL,
  `EdadMaxima` int(11) NOT NULL,
  `AlumnosInscritos` int(11) NOT NULL,
  `HoraInicio` varchar(10) NOT NULL,
  `Duracion` int(11) NOT NULL,
  `DiasDeLaSemana` varchar(30) NOT NULL,
  `CanMaestros` int(11) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`IdCurso`, `bloque`, `Nombre`, `Cupo`, `EdadMinima`, `EdadMaxima`, `AlumnosInscritos`, `HoraInicio`, `Duracion`, `DiasDeLaSemana`, `CanMaestros`, `Precio`) VALUES
(1, 0, 'Prueba', 7, 0, 0, 3, '0:0', 60, ' lun,mar', 3, 500);

-- --------------------------------------------------------

--
-- Table structure for table `inscripcion`
--

CREATE TABLE `inscripcion` (
  `IdInscripcion` int(11) NOT NULL,
  `IdAlumno` int(11) NOT NULL,
  `IdCurso` int(11) NOT NULL,
  `NominaUsuario` varchar(15) NOT NULL,
  `FormaPago` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `Nomina` varchar(15) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Tipo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`Nomina`, `Nombre`, `Password`, `Tipo`) VALUES
('A', 'A', 'A', 0),
('A01175470', 'Azael', 'ajaxajax', 1),
('I', 'I', 'I', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
ADD PRIMARY KEY (`IdAlumno`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
ADD PRIMARY KEY (`IdCurso`);

--
-- Indexes for table `inscripcion`
--
ALTER TABLE `inscripcion`
ADD PRIMARY KEY (`IdInscripcion`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
ADD PRIMARY KEY (`Nomina`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumno`
--
ALTER TABLE `alumno`
MODIFY `IdAlumno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
MODIFY `IdCurso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inscripcion`
--
ALTER TABLE `inscripcion`
MODIFY `IdInscripcion` int(11) NOT NULL AUTO_INCREMENT;
