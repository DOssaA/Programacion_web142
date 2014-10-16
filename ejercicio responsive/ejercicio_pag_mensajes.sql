-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2014 a las 23:57:54
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ejercicio_pag_mensajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dislikes`
--

CREATE TABLE IF NOT EXISTS `dislikes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_post` int(255) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `dislikes`
--

INSERT INTO `dislikes` (`id`, `id_post`, `id_usuario`) VALUES
(6, 1, 1),
(7, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(255) NOT NULL,
  `id_post` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id`, `id_usuario`, `id_post`) VALUES
(2, 0, 2),
(3, 0, 2),
(4, 0, 2),
(5, 0, 2),
(6, 0, 2),
(7, 0, 2),
(8, 0, 2),
(12, 1, 3),
(14, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_post` int(255) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `id_post`, `id_usuario`) VALUES
(3, 1, 1),
(7, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id_post` int(254) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(766) COLLATE utf8_bin NOT NULL,
  `contenido` varchar(766) COLLATE utf8_bin NOT NULL,
  `id_usuario` int(255) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_post`, `titulo`, `contenido`, `id_usuario`) VALUES
(1, 'Opiniòn', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
(2, 'Otra op', 'asasdghjsdga sdahjsdgahjsa asdh gfdsg gfd sdf sd gf qw    gsdfjkghhfbdfmb dhjbgvmnbm djkgdfhnvjgknjkfg dfgfgffgdsdasda asddas sdg hretw polio', 1),
(3, 'Post', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic culpa voluptatem facere suscipit, totam. Quam asperiores sed aspernatur officia in distinctio illum incidunt voluptate, possimus corporis, eligendi modi odit voluptatibus!', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_bin NOT NULL,
  `correo` varchar(50) COLLATE utf8_bin NOT NULL,
  `imagen` varchar(766) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `contrasena`, `correo`, `imagen`) VALUES
(1, 'New', 'qwerty', 'new@gmail.com', 'images/usuario.png'),
(2, 'Dario', '12345', 'dario@mail.com', 'images/usuario.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
