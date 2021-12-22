-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-12-2021 a las 17:52:10
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `twed`
--

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`user`, `pass`) VALUES
('admin', 'admin'),
('admin1', '1234');
COMMIT;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `boleta` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) NOT NULL,
  `nacimiento` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `curp` varchar(50) NOT NULL,
  `calleNum` varchar(50) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `alcaldia` varchar(50) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `escuelap` varchar(50) NOT NULL,
  `entidadF` varchar(50) NOT NULL,
  `promedio` varchar(50) NOT NULL,
  `escomOpcion` varchar(50) NOT NULL,
  `horario` varchar(5) NOT NULL,
  `salon` varchar(13) NOT NULL,
  PRIMARY KEY (`boleta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`boleta`, `nombre`, `paterno`, `materno`, `nacimiento`, `genero`, `curp`, `calleNum`, `colonia`, `alcaldia`, `cp`, `telefono`, `correo`, `escuelap`, `entidadF`, `promedio`, `escomOpcion`, `horario`, `salon`) VALUES
('0012345669', 'Juan', 'Ortega', 'Sanchez', '2001-10-05', 'Masculino', 'SIOF810607HDFLRR05', 'Xochicalco, 36', 'Colonia2', 'Tláhuac', '03020', '5527607945', 'francis@gmail.com', 'CECyT 14', 'Jalisco', '9.00', '1', '08:30', 'Laboratorio 1'),
('PP10235444', 'José Luis', 'Ortega', 'Silva', '3214-05-20', 'Femenino', 'SIOF810607HDFLRR05', 'Xochicalco, 56', 'Colonia1', 'Tláhuac', '03020', '5500001001', 'francis@gmail.com', 'CECyT 19', 'Campeche', '7.00', '1', '08:30', 'Laboratorio 1'),
('0012345678', 'Julio', 'Ortega', 'Silva', '2001-10-05', 'Masculino', 'OESJ011005HDFRLRA8', 'Xochicalco, 31', '146123', 'Magdalena Contreras', '03020', '5527607945', 'correo1@gmail.com.mx', 'JosÃ© Ojeda', 'Baja California Sur', '6.09', '1', '08:30', 'Laboratorio 1'),
('2020630352', 'JuliÃ³', 'Ortega', 'Silva', '2001-10-05', 'Masculino', 'OESJ011001HDFRLRA8', 'Xochicalco, 31', '146344', 'Iztapalapa', '03020', '5527607945', 'jorgedorsi@gmail.com', 'CECyT 13', 'Estado de MÃ©xico', '6.00', '3', '08:30', 'Laboratorio 1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
