-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2017 at 07:06 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2advanced`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `autor_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`autor_id`, `nombre`, `nacionalidad`, `nacimiento`) VALUES
(1, 'Autor 1', 'Nacionalidad 1', '1963-03-01'),
(2, 'Autor 2', 'Nacionalidad 2', '1976-03-17'),
(3, 'Anonimo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clase_documento`
--

CREATE TABLE `clase_documento` (
  `clase_documento_id` int(11) NOT NULL,
  `descripcion_documento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clase_documento`
--

INSERT INTO `clase_documento` (`clase_documento_id`, `descripcion_documento`) VALUES
(1, 'DNI'),
(2, 'Pasaporte');

-- --------------------------------------------------------

--
-- Table structure for table `clase_lector`
--

CREATE TABLE `clase_lector` (
  `clase_lector_id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `dias_prestamo` int(11) NOT NULL DEFAULT '30'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clase_lector`
--

INSERT INTO `clase_lector` (`clase_lector_id`, `descripcion`, `dias_prestamo`) VALUES
(1, 'Alumno FADU', 30),
(2, 'Alumno CBC', 30),
(3, 'Docente', 60),
(4, 'No Docente', 30);

-- --------------------------------------------------------

--
-- Table structure for table `copias`
--

CREATE TABLE `copias` (
  `copias_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `libros_id` int(11) NOT NULL,
  `nro_copia` int(11) NOT NULL,
  `deposito_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `copias`
--

INSERT INTO `copias` (`copias_id`, `estado_id`, `libros_id`, `nro_copia`, `deposito_id`) VALUES
(1, 1, 1, 15790, 2),
(2, 1, 1, 15791, 1);

-- --------------------------------------------------------

--
-- Table structure for table `deposito`
--

CREATE TABLE `deposito` (
  `deposito_deposito_id` int(11) NOT NULL,
  `descripcion_deposito` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deposito`
--

INSERT INTO `deposito` (`deposito_deposito_id`, `descripcion_deposito`) VALUES
(1, 'Deposito 1'),
(2, 'Deposito 2');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `estado_id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`estado_id`, `descripcion`) VALUES
(1, 'Disponible'),
(2, 'Prestado'),
(3, 'Reparacion');

-- --------------------------------------------------------

--
-- Table structure for table `lectores`
--

CREATE TABLE `lectores` (
  `usuario_crea_mod` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `lectores_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `clase_lector_id` int(11) NOT NULL,
  `clase_documento_id` int(11) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lectores`
--

INSERT INTO `lectores` (`usuario_crea_mod`, `create_time`, `update_time`, `lectores_id`, `nombre`, `documento`, `clase_lector_id`, `clase_documento_id`, `direccion`, `telefono`, `mail`) VALUES
(NULL, NULL, '2017-03-14 12:29:43', 1, 'Alejandro Lopez', '18225744', 4, 1, 'Jose Hernandez 2248', '4667684', 'lopalejandro@gmail.com'),
(NULL, NULL, '2017-03-20 09:27:51', 2, 'xxxxolklewkd  kewdkẁe', '21116047', 2, 1, 'ffferf wfwfwefwe w efw 8978989', '45643413136131', 'ale@cbc.uba.ar'),
(NULL, '2017-03-22 15:18:28', '2017-03-22 15:18:28', 7, 'lector 6', '78945869', 1, 2, 'rtrtrtrg trr  rt rr', '1215151541', 'dfkkjrf@dlfklerf.com');

-- --------------------------------------------------------

--
-- Table structure for table `lectores_has_multas`
--

CREATE TABLE `lectores_has_multas` (
  `lectores_lectores_id` int(11) NOT NULL,
  `lectores_multas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

CREATE TABLE `libros` (
  `libros_id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `editorial` varchar(45) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `tipo_libro_id` int(11) DEFAULT NULL,
  `nro_libro` int(11) NOT NULL,
  `edicion` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` date NOT NULL,
  `updated_by` date NOT NULL,
  `deleted_at` date NOT NULL,
  `deleted_by` date NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`libros_id`, `titulo`, `editorial`, `ano`, `tipo_libro_id`, `nro_libro`, `edicion`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `deleted_by`, `created`, `modified`, `deleted`) VALUES
(1, 'Fundación de Buenos Aires', 'Eudeba', 1986, 1, 65025, 1990, '0000-00-00', '2017-04-24', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(2, 'Argentina Siglo XXi', 'Eudeba', 2001, 1, 0, NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(3, 'Buenos Aires en el siglo XX', 'Eudeba', 1999, 2, 0, NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(4, 'Argentina Siglo XV', 'Eudeba', 2001, 2, 0, NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(6, 'Argentina Siglo XVIII', 'Eudeba', 2002, 3, 0, NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(7, 'Prueba de alta', 'Tusquets', 1999, 3, 5689, 2, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(8, 'Prueba de alta 2', 'Tusquets', 2001, 2, 78524, 8, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `libros_has_autor`
--

CREATE TABLE `libros_has_autor` (
  `libros_libros_id` int(11) NOT NULL,
  `autor_autor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libros_has_autor`
--

INSERT INTO `libros_has_autor` (`libros_libros_id`, `autor_autor_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(3, 1),
(4, 3),
(6, 1),
(6, 2),
(7, 3),
(8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `multas`
--

CREATE TABLE `multas` (
  `multas_id` int(11) NOT NULL,
  `fin_multa` date NOT NULL,
  `activa` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prestamos`
--

CREATE TABLE `prestamos` (
  `prestamos_id` int(11) NOT NULL,
  `extension` tinyint(1) NOT NULL DEFAULT '0',
  `fecha_devolucion` date NOT NULL,
  `lectores_idl` int(11) NOT NULL,
  `copias_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prestamos_has_multas`
--

CREATE TABLE `prestamos_has_multas` (
  `prestamos_prestamos_id` int(11) NOT NULL,
  `prestamos_multas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_libro`
--

CREATE TABLE `tipo_libro` (
  `tipo_tipo_libro_id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_libro`
--

INSERT INTO `tipo_libro` (`tipo_tipo_libro_id`, `descripcion`) VALUES
(1, 'Préstamo a Sala'),
(2, 'Préstamo a Domicilio'),
(3, 'Préstamo de Fin de Semana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`autor_id`);

--
-- Indexes for table `clase_documento`
--
ALTER TABLE `clase_documento`
  ADD PRIMARY KEY (`clase_documento_id`);

--
-- Indexes for table `clase_lector`
--
ALTER TABLE `clase_lector`
  ADD PRIMARY KEY (`clase_lector_id`);

--
-- Indexes for table `copias`
--
ALTER TABLE `copias`
  ADD PRIMARY KEY (`copias_id`),
  ADD KEY `fk_copias_estado1` (`estado_id`),
  ADD KEY `fk_copias_libros1` (`libros_id`),
  ADD KEY `fk_copias_1_idx` (`deposito_id`);

--
-- Indexes for table `deposito`
--
ALTER TABLE `deposito`
  ADD PRIMARY KEY (`deposito_deposito_id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`estado_id`);

--
-- Indexes for table `lectores`
--
ALTER TABLE `lectores`
  ADD PRIMARY KEY (`lectores_id`),
  ADD KEY `fk_lectores_clase_lector1_idx` (`clase_lector_id`),
  ADD KEY `fk_lectores_clase_documento1_idx` (`clase_documento_id`);

--
-- Indexes for table `lectores_has_multas`
--
ALTER TABLE `lectores_has_multas`
  ADD PRIMARY KEY (`lectores_lectores_id`,`lectores_multas_id`),
  ADD KEY `fk_lectores_has_multas_multas1` (`lectores_multas_id`),
  ADD KEY `fk_lectores_has_multas_lectores1` (`lectores_lectores_id`);

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`libros_id`),
  ADD KEY `tipo_libro_id` (`tipo_libro_id`);

--
-- Indexes for table `libros_has_autor`
--
ALTER TABLE `libros_has_autor`
  ADD PRIMARY KEY (`libros_libros_id`,`autor_autor_id`),
  ADD KEY `fk_libros_has_autor_autor1_idx` (`autor_autor_id`),
  ADD KEY `fk_libros_has_autor_libros1_idx` (`libros_libros_id`);

--
-- Indexes for table `multas`
--
ALTER TABLE `multas`
  ADD PRIMARY KEY (`multas_id`);

--
-- Indexes for table `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`prestamos_id`),
  ADD KEY `fk_prestamos_lectores1` (`lectores_idl`),
  ADD KEY `fk_prestamos_copias1` (`copias_id`);

--
-- Indexes for table `prestamos_has_multas`
--
ALTER TABLE `prestamos_has_multas`
  ADD PRIMARY KEY (`prestamos_prestamos_id`,`prestamos_multas_id`),
  ADD KEY `fk_prestamos_has_multas_multas1` (`prestamos_multas_id`),
  ADD KEY `fk_prestamos_has_multas_prestamos1` (`prestamos_prestamos_id`);

--
-- Indexes for table `tipo_libro`
--
ALTER TABLE `tipo_libro`
  ADD PRIMARY KEY (`tipo_tipo_libro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `autor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clase_documento`
--
ALTER TABLE `clase_documento`
  MODIFY `clase_documento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clase_lector`
--
ALTER TABLE `clase_lector`
  MODIFY `clase_lector_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `copias`
--
ALTER TABLE `copias`
  MODIFY `copias_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `estado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lectores`
--
ALTER TABLE `lectores`
  MODIFY `lectores_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `libros_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `multas`
--
ALTER TABLE `multas`
  MODIFY `multas_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `prestamos_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo_libro`
--
ALTER TABLE `tipo_libro`
  MODIFY `tipo_tipo_libro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `copias`
--
ALTER TABLE `copias`
  ADD CONSTRAINT `fk_copias_1` FOREIGN KEY (`deposito_id`) REFERENCES `deposito` (`deposito_deposito_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_copias_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_copias_libros1` FOREIGN KEY (`libros_id`) REFERENCES `libros` (`libros_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lectores`
--
ALTER TABLE `lectores`
  ADD CONSTRAINT `fk_lectores_clase_documento1` FOREIGN KEY (`clase_documento_id`) REFERENCES `clase_documento` (`clase_documento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lectores_clase_lector1` FOREIGN KEY (`clase_lector_id`) REFERENCES `clase_lector` (`clase_lector_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lectores_has_multas`
--
ALTER TABLE `lectores_has_multas`
  ADD CONSTRAINT `fk_lectores_has_multas_lectores1` FOREIGN KEY (`lectores_lectores_id`) REFERENCES `lectores` (`lectores_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lectores_has_multas_multas1` FOREIGN KEY (`lectores_multas_id`) REFERENCES `multas` (`multas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`tipo_libro_id`) REFERENCES `tipo_libro` (`tipo_tipo_libro_id`);

--
-- Constraints for table `libros_has_autor`
--
ALTER TABLE `libros_has_autor`
  ADD CONSTRAINT `fk_libros_has_autor_autor1` FOREIGN KEY (`autor_autor_id`) REFERENCES `autor` (`autor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_libros_has_autor_libros1` FOREIGN KEY (`libros_libros_id`) REFERENCES `libros` (`libros_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `fk_prestamos_copias1` FOREIGN KEY (`copias_id`) REFERENCES `copias` (`copias_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamos_lectores1` FOREIGN KEY (`lectores_idl`) REFERENCES `lectores` (`lectores_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prestamos_has_multas`
--
ALTER TABLE `prestamos_has_multas`
  ADD CONSTRAINT `fk_prestamos_has_multas_multas1` FOREIGN KEY (`prestamos_multas_id`) REFERENCES `multas` (`multas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamos_has_multas_prestamos1` FOREIGN KEY (`prestamos_prestamos_id`) REFERENCES `prestamos` (`prestamos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
