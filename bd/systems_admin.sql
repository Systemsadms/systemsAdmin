-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-04-2016 a las 17:58:03
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `systems_admin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `ci` varchar(100) NOT NULL,
  `fechaNacimiento` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `pais` text NOT NULL,
  `estado` text NOT NULL,
  `ciudad` text NOT NULL,
  `dir` varchar(100) NOT NULL,
  `especialidad1` text NOT NULL,
  `especialidad2` text NOT NULL,
  `descripcion` text NOT NULL,
  `estatus` text NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`idAdmin`, `email`, `pass`, `nombres`, `apellidos`, `ci`, `fechaNacimiento`, `telefono`, `celular`, `pais`, `estado`, `ciudad`, `dir`, `especialidad1`, `especialidad2`, `descripcion`, `estatus`) VALUES
(1, 'enriquemendoza_162@hotmail.com', '123', 'Enrique', 'Mendoza', '18754401', '01-01-01', '0414', '0212', 'Venezuela', 'vargas', 'la guaira', 'caraballeda', 'Desarrollo Web', 'Diseno Grafico', 'resumen', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `emision` varchar(100) NOT NULL,
  `vence` varchar(100) NOT NULL,
  `monto` varchar(100) NOT NULL,
  `control` varchar(100) NOT NULL,
  `estatus` varchar(100) NOT NULL,
  PRIMARY KEY (`idFactura`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`idFactura`, `tipo`, `idTipo`, `cliente`, `emision`, `vence`, `monto`, `control`, `estatus`) VALUES
(1, 'Servicio', 1, '1', '21-4-16', '01-01-01', '400 BsF', '', 'Facturado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(100) NOT NULL,
  `medio` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `deposito` varchar(100) NOT NULL,
  `banco` varchar(100) NOT NULL,
  `monto` varchar(100) NOT NULL,
  `factura` varchar(100) NOT NULL,
  `depositante` varchar(100) NOT NULL,
  `estatus` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `cliente`, `medio`, `fecha`, `deposito`, `banco`, `monto`, `factura`, `depositante`, `estatus`, `comentario`) VALUES
(1, 'Domingo', 'Transferencia', '01-01-01', '2115121', 'Venezuela', '500', '1', 'Enrique', 'Confirmado', 'comentario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagosadmins`
--

CREATE TABLE IF NOT EXISTS `pagosadmins` (
  `idPago` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `banco` varchar(100) NOT NULL,
  `medio` varchar(100) NOT NULL,
  `monto` varchar(100) NOT NULL,
  `ticket` varchar(100) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `area` text NOT NULL,
  `comentario` text NOT NULL,
  `estatus` varchar(100) NOT NULL,
  PRIMARY KEY (`idPago`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `pagosadmins`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE IF NOT EXISTS `proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(100) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `titulo` text NOT NULL,
  `monto` varchar(100) NOT NULL,
  `pagos` varchar(100) NOT NULL,
  `vence` varchar(100) NOT NULL,
  `resumen` text NOT NULL,
  `inicio` varchar(100) NOT NULL,
  `estatus` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `area`, `cliente`, `titulo`, `monto`, `pagos`, `vence`, `resumen`, `inicio`, `estatus`) VALUES
(1, 'Dominios', '1', 'www.pedro.com', '600 BsF', 'Pago Unico', '01-01-01', 'dominio', '21-4-16', 'Activo'),
(2, 'Dominios', '1', 'www.systemsadms.com', '600 BsF', 'Pago Unico', '01-01-01', 'dominio', '21-4-16', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientos`
--

CREATE TABLE IF NOT EXISTS `seguimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket` varchar(100) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `contenido` text NOT NULL,
  `seguimiento` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `hora` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `seguimientos`
--

INSERT INTO `seguimientos` (`id`, `ticket`, `cliente`, `contenido`, `seguimiento`, `fecha`, `hora`) VALUES
(1, '2', '1', '<b>CLIENTE:</b> Seguimiento de prueba', '1', '21-4-16', '21:21:38'),
(2, '2', '1', '<b>CLIENTE:</b> Seguimiento de prueba', '1', '21-4-16', '21:21:38'),
(3, '2', '1', '<b>ADMIN:</b> Seguiento desde admin', '2', '22-4-16', '22:22:24'),
(4, '2', '1', '<b>ADMIN:</b> Seguiento desde admin', '2', '22-4-16', '22:22:24'),
(5, '2', '1', '<b>ADMIN:</b> Seguiento desde admin', '2', '22-4-16', '22:22:24'),
(6, '2', '1', '<b>ADMIN:</b> seguimiento desde new admin\r\n', '3', '24-4-16', '3:03:54'),
(7, '2', '1', '<b>ADMIN:</b> seguimiento desde new admin\r\n', '3', '24-4-16', '3:03:54'),
(8, '2', '1', '<b>ADMIN:</b> Otro seguimiento nuevo', '4', '24-4-16', '3:03:49'),
(9, '2', '1', '<b>ADMIN:</b> Otro seguimiento nuevo', '4', '24-4-16', '3:03:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessiones`
--

CREATE TABLE IF NOT EXISTS `sessiones` (
  `idSession` varchar(10) NOT NULL,
  `usuario` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `sessiones`
--

INSERT INTO `sessiones` (`idSession`, `usuario`) VALUES
('1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(100) NOT NULL,
  `hora` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `asunto` text NOT NULL,
  `mensaje` text NOT NULL,
  `estatus` varchar(100) NOT NULL,
  `ra` varchar(100) NOT NULL,
  `rc` varchar(100) NOT NULL,
  `rs` int(11) NOT NULL,
  `seguimientos` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  PRIMARY KEY (`ticket`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`ticket`, `cliente`, `hora`, `fecha`, `area`, `asunto`, `mensaje`, `estatus`, `ra`, `rc`, `rs`, `seguimientos`, `admin`) VALUES
(1, '1', '18:18:09', '21-4-16', 'Redes', 'Intalacion de redes', 'Contenido de instalacion de redes', 'Por Facturar', '0', '0', 0, '0', 'Enrique Mendoza'),
(2, '1', '20:20:14', '21-4-16', 'Diseno Web', 'DiseÃ±o web ', 'contenido diseÃ±o wenb', 'Por Facturar', '3', '0', 1, '4', 'Enrique Mendoza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `rif` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `dir` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `encargado` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `como` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `estatus` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo`, `nombres`, `apellidos`, `rif`, `email`, `pass`, `telefono`, `celular`, `pais`, `estado`, `ciudad`, `dir`, `zipcode`, `encargado`, `cargo`, `como`, `fecha`, `estatus`) VALUES
(1, '1', 'Domingo', 'Mendoza', 'No aplica', 'd@d.com', '123', '0222', '0414', 'Venezuela', 'vargas', 'la guaira', 'caraballeda', '1231', 'No aplica', 'No aplica', 'Internet', '2016-04-21', 'confirmado');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
