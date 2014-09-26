-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2014 a las 17:55:25
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `openbio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCategoria` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `NombreCategoria`) VALUES
(1, 'Categoria 1'),
(2, 'Categoria 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoevento`
--

CREATE TABLE IF NOT EXISTS `estadoevento` (
  `idEstadoEvento` int(11) NOT NULL AUTO_INCREMENT,
  `NombreEstado` varchar(20) NOT NULL,
  PRIMARY KEY (`idEstadoEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `NombreEvento` varchar(40) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFinal` date NOT NULL,
  `Estado` bit(1) NOT NULL,
  PRIMARY KEY (`idEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interes`
--

CREATE TABLE IF NOT EXISTS `interes` (
  `idInteres` int(11) NOT NULL AUTO_INCREMENT,
  `NombreIntere` varchar(40) NOT NULL,
  PRIMARY KEY (`idInteres`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `interes`
--

INSERT INTO `interes` (`idInteres`, `NombreIntere`) VALUES
(1, '###'),
(2, '####'),
(3, '###'),
(4, '#####'),
(5, '####');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemevento`
--

CREATE TABLE IF NOT EXISTS `itemevento` (
  `idItemEvento` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` bit(1) NOT NULL,
  `HoraInicio` time NOT NULL,
  `HoraFinal` time NOT NULL,
  `Evento_idEvento` int(11) NOT NULL,
  `Vitrina_idVitrina` int(11) NOT NULL,
  `EstadoEvento_idEstadoEvento` int(11) NOT NULL,
  PRIMARY KEY (`idItemEvento`),
  KEY `fk_ItemEvento_Evento1_idx` (`Evento_idEvento`),
  KEY `fk_ItemEvento_Vitrina1_idx` (`Vitrina_idVitrina`),
  KEY `fk_ItemEvento_EstadoEvento1_idx` (`EstadoEvento_idEstadoEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `NombreModulo` varchar(40) NOT NULL,
  `Url` varchar(100) NOT NULL,
  `Estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idModulo`, `NombreModulo`, `Url`, `Estado`) VALUES
(1, 'Información Personal', '#', b'1'),
(2, 'Vitrina', 'usuario/adminvitrina', b'1'),
(4, 'Producto', 'productos/index', b'1'),
(5, 'Agenda', '#', b'1'),
(6, 'Inicio', 'app/index', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulorol`
--

CREATE TABLE IF NOT EXISTS `modulorol` (
  `idModuloRol` int(11) NOT NULL AUTO_INCREMENT,
  `Modulo_idModulo` int(11) NOT NULL,
  `Rol_idRol` int(11) NOT NULL,
  PRIMARY KEY (`idModuloRol`),
  KEY `fk_ModuloRol_Modulo_idx` (`Modulo_idModulo`),
  KEY `fk_ModuloRol_Rol1_idx` (`Rol_idRol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `modulorol`
--

INSERT INTO `modulorol` (`idModuloRol`, `Modulo_idModulo`, `Rol_idRol`) VALUES
(1, 1, 1),
(2, 5, 1),
(3, 1, 2),
(4, 2, 2),
(5, 4, 2),
(6, 5, 2),
(7, 6, 1),
(8, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idProductos` int(11) NOT NULL AUTO_INCREMENT,
  `Foto` varchar(80) NOT NULL,
  `NombreProducto` varchar(60) NOT NULL,
  `FichaTecnica` text NOT NULL,
  `Vitrina_idVitrina` int(11) NOT NULL,
  `Categoria_idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idProductos`),
  KEY `fk_Productos_Vitrina1_idx` (`Vitrina_idVitrina`),
  KEY `fk_Productos_Categoria1_idx` (`Categoria_idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `Foto`, `NombreProducto`, `FichaTecnica`, `Vitrina_idVitrina`, `Categoria_idCategoria`) VALUES
(1, 'prueba.jpg', 'Prueba', 'poreuab jdfojosd sdkfbisd ksdfnksd', 3, 1),
(5, 'preee.jpg', 'Preee', 'Bio', 3, 1),
(6, 'prueba.jpg', 'Prueba', 'kdfhiksd', 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `idReserva` int(11) NOT NULL AUTO_INCREMENT,
  `ItemEvento_idItemEvento` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Estado` bit(1) NOT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `fk_Reserva_ItemEvento1_idx` (`ItemEvento_idItemEvento`),
  KEY `fk_Reserva_Usuario1_idx` (`Usuario_idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `NombreRol` varchar(45) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `NombreRol`) VALUES
(1, 'Usuario'),
(2, 'Vitrina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Foto` varchar(80) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(40) NOT NULL,
  `NombreEmpresa` varchar(45) DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `Celular` varchar(15) NOT NULL,
  `Direccion` varchar(40) DEFAULT NULL,
  `Rol_idRol` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Clave` varchar(60) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_Usuario_Rol1_idx` (`Rol_idRol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Foto`, `Nombre`, `Apellido`, `NombreEmpresa`, `Email`, `Celular`, `Direccion`, `Rol_idRol`, `Usuario`, `Clave`) VALUES
(1, '2.jpg', 'Jader', 'Rojas', 'branswitch', 'jader.sexy', '2342134', 'odjo', 2, '123', '123'),
(2, '#', 'Andres Felipe', 'GOmez', 'hanoit', 'hanoit.sas@gmail.com', '32423432', 'sdfsdf d33', 2, 'hanoit', 'hanoit'),
(3, '#', 'juan', 'david', '', 'fdhi', '24', '', 1, '123456', '123456'),
(4, '4.jpg', 'jimy', 'andres', '', 'hot@mm', '3242', '', 1, '000', '000'),
(5, '5.jpg', 'kdsfhik', 'ihjfvih', 'ihvih', 'ihvis', '34', 'FIHVI', 1, '888', '888'),
(6, '6.jpg', 'osdfjosdfj', 'jfvodsjo', 'ojfvosdj', 'ojfvosdj', '4332', 'ksd', 1, 'iknvidsn', 'invisnis'),
(7, '7.jpg', 'osdfjosdfj', 'jfvodsjo', 'ojfvosdj', 'ojfvosdj', '4332', 'ksd', 1, 'iknvidsn', 'invisnis'),
(8, '8.jpg', 'Prueba', 'Prueba', '', 'prueba@gmail.com', '342332', '32423', 1, 'prueba', 'preuba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariointeres`
--

CREATE TABLE IF NOT EXISTS `usuariointeres` (
  `idUsuarioInteres` int(11) NOT NULL AUTO_INCREMENT,
  `Interes_idInteres` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idUsuarioInteres`),
  KEY `fk_UsuarioInteres_Interes1_idx` (`Interes_idInteres`),
  KEY `fk_UsuarioInteres_Usuario1_idx` (`Usuario_idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuariointeres`
--

INSERT INTO `usuariointeres` (`idUsuarioInteres`, `Interes_idInteres`, `Usuario_idUsuario`) VALUES
(1, 1, 7),
(2, 3, 7),
(3, 5, 7),
(4, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vitrina`
--

CREATE TABLE IF NOT EXISTS `vitrina` (
  `idVitrina` int(11) NOT NULL AUTO_INCREMENT,
  `FechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Estado` bit(1) NOT NULL DEFAULT b'1',
  `Usuario_idUsuario` int(11) NOT NULL,
  `NumProductos` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`idVitrina`),
  KEY `fk_Vitrina_Usuario1_idx` (`Usuario_idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `vitrina`
--

INSERT INTO `vitrina` (`idVitrina`, `FechaCreacion`, `Estado`, `Usuario_idUsuario`, `NumProductos`) VALUES
(1, '2014-09-19 00:25:11', b'0', 4, 2),
(2, '2014-09-19 00:26:34', b'0', 3, 2),
(3, '2014-09-19 00:27:11', b'1', 1, 2),
(4, '2014-09-19 00:31:39', b'0', 7, 2),
(5, '2014-09-25 22:54:24', b'1', 2, 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `itemevento`
--
ALTER TABLE `itemevento`
  ADD CONSTRAINT `fk_ItemEvento_EstadoEvento1` FOREIGN KEY (`EstadoEvento_idEstadoEvento`) REFERENCES `estadoevento` (`idEstadoEvento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ItemEvento_Evento1` FOREIGN KEY (`Evento_idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itemevento_ibfk_1` FOREIGN KEY (`Vitrina_idVitrina`) REFERENCES `vitrina` (`idVitrina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `modulorol`
--
ALTER TABLE `modulorol`
  ADD CONSTRAINT `fk_ModuloRol_Modulo` FOREIGN KEY (`Modulo_idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ModuloRol_Rol1` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_Productos_Categoria1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`Vitrina_idVitrina`) REFERENCES `vitrina` (`idVitrina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_Reserva_ItemEvento1` FOREIGN KEY (`ItemEvento_idItemEvento`) REFERENCES `itemevento` (`idItemEvento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Reserva_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Rol1` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariointeres`
--
ALTER TABLE `usuariointeres`
  ADD CONSTRAINT `fk_UsuarioInteres_Interes1` FOREIGN KEY (`Interes_idInteres`) REFERENCES `interes` (`idInteres`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_UsuarioInteres_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vitrina`
--
ALTER TABLE `vitrina`
  ADD CONSTRAINT `fk_Vitrina_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
