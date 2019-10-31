-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-10-2019 a las 01:56:11
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vivero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cultivo`
--

DROP TABLE IF EXISTS `cultivo`;
CREATE TABLE IF NOT EXISTS `cultivo` (
  `codigo_cultivo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_empleado` int(11) NOT NULL,
  `codigo_planta` int(11) NOT NULL,
  `cantidad_cultivo` int(11) NOT NULL DEFAULT '0',
  `humedad_cultivo` int(11) NOT NULL DEFAULT '0',
  `edad_cultivo` int(11) NOT NULL DEFAULT '0',
  `dias_abono` int(11) NOT NULL DEFAULT '0',
  `crecimiento` int(11) NOT NULL DEFAULT '0',
  `muerte` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo_cultivo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cultivo`
--

INSERT INTO `cultivo` (`codigo_cultivo`, `codigo_empleado`, `codigo_planta`, `cantidad_cultivo`, `humedad_cultivo`, `edad_cultivo`, `dias_abono`, `crecimiento`, `muerte`) VALUES
(1, 2, 3, 12, 10, 2, 0, 30, 0),
(2, 4, 5, 17, 7, 7, 1, 1, 0),
(3, 3, 9, 20, 8, 15, 6, 14, 0),
(4, 5, 8, 14, 11, 6, 1, 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `codigo_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido1` varchar(25) NOT NULL,
  `apellido2` varchar(25) NOT NULL,
  `telefono` int(11) NOT NULL,
  `eliminar` int(11) NOT NULL,
  PRIMARY KEY (`codigo_empleado`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`codigo_empleado`, `cedula`, `nombre`, `apellido1`, `apellido2`, `telefono`, `eliminar`) VALUES
(2, 1088, 'anderson', 'gomez', 'gomez', 310, 0),
(3, 1089, 'sebastian', 'londonho', 'lopez', 317, 0),
(4, 2088, 'santiago', 'gomez', 'gomez', 304, 0),
(5, 2089, 'nelly', 'cardona', 'perez', 311, 0),
(6, 10195, 'santiago', 'gomez', 'zapata', 311358, 0),
(7, 42015, 'Ana', 'Gomez', 'Henao', 59623, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

DROP TABLE IF EXISTS `enfermedad`;
CREATE TABLE IF NOT EXISTS `enfermedad` (
  `codigo_enfermedad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_enfermedad` varchar(25) NOT NULL,
  `tratamiento` varchar(255) NOT NULL,
  `eliminar` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo_enfermedad`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `enfermedad`
--

INSERT INTO `enfermedad` (`codigo_enfermedad`, `nombre_enfermedad`, `tratamiento`, `eliminar`) VALUES
(1, 'Broca', 'Aplique glifosato en la raiz', 0),
(2, 'Hiel', 'Aplique Nitrogeno en la tierra cercana', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infeccion`
--

DROP TABLE IF EXISTS `infeccion`;
CREATE TABLE IF NOT EXISTS `infeccion` (
  `codigo_infeccion` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_cultivo` int(11) NOT NULL,
  `codigo_enfermedad` int(11) NOT NULL,
  `eliminar` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo_infeccion`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `infeccion`
--

INSERT INTO `infeccion` (`codigo_infeccion`, `codigo_cultivo`, `codigo_enfermedad`, `eliminar`) VALUES
(1, 2, 1, 0),
(2, 2, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `labores`
--

DROP TABLE IF EXISTS `labores`;
CREATE TABLE IF NOT EXISTS `labores` (
  `codigo_labor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `eliminar` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo_labor`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `labores`
--

INSERT INTO `labores` (`codigo_labor`, `nombre`, `eliminar`) VALUES
(1, 'siembra', 0),
(2, 'regado', 0),
(3, 'fumigacion', 0),
(4, 'abono', 0),
(5, 'limpia', 0),
(6, 'laboratorio', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `labores_empleados`
--

DROP TABLE IF EXISTS `labores_empleados`;
CREATE TABLE IF NOT EXISTS `labores_empleados` (
  `codigo_labor_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_empleado` int(11) NOT NULL,
  `codigo_labor` int(11) NOT NULL,
  `eliminar` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo_labor_empleado`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `labores_empleados`
--

INSERT INTO `labores_empleados` (`codigo_labor_empleado`, `codigo_empleado`, `codigo_labor`, `eliminar`) VALUES
(1, 2, 3, 0),
(2, 3, 4, 0),
(3, 4, 6, 0),
(4, 5, 1, 0),
(5, 2, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planta`
--

DROP TABLE IF EXISTS `planta`;
CREATE TABLE IF NOT EXISTS `planta` (
  `codigo_planta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `genero` varchar(25) NOT NULL,
  `familia` varchar(25) NOT NULL,
  `tipo_planta` varchar(25) NOT NULL,
  `cantidad_semilla` int(11) NOT NULL DEFAULT '0',
  `cantidad_flor` int(11) NOT NULL DEFAULT '0',
  `precio_venta` int(11) NOT NULL DEFAULT '0',
  `eliminar` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo_planta`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `planta`
--

INSERT INTO `planta` (`codigo_planta`, `nombre`, `genero`, `familia`, `tipo_planta`, `cantidad_semilla`, `cantidad_flor`, `precio_venta`, `eliminar`) VALUES
(1, 'Rosa', 'Rosa', 'Rosaceae', 'Flores', 21, 0, 310, 0),
(2, 'Peyote', 'Lophophora', 'Cactaceae', 'Cactus', 13, 0, 120, 0),
(3, 'Lavandula', 'Lavandula', 'Lamiaceae', 'Aromaticas', 30, 0, 230, 0),
(4, 'Dali', 'Dalia Roja', 'Dahllia', 'Flores', 13, 0, 340, 0),
(5, 'Veranera', 'Bougainvillea', 'Nyctaginaceae', 'Flores', 18, 0, 110, 0),
(6, 'Ojo de buey', 'Chrysanthemum', 'Asteraceae', 'Flores', 25, 0, 180, 0),
(7, 'Orquidea', 'Cattleya', 'Orchidaceae', 'Flores', 4, 0, 410, 0),
(8, 'Nogal', 'Juglans', 'Juglandaceae', 'Arboles', 15, 0, 320, 0),
(9, 'Pino', 'Pinus', 'Pinaceae', 'Arboles', 15, 0, 280, 0),
(10, 'Arce', 'Hacer', 'Sapindaceae', 'Bonsai', 7, 0, 500, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `codigo_ventas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `codigo_planta` int(11) NOT NULL DEFAULT '0',
  `unidades` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo_ventas`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
