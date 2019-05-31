-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2019 a las 16:28:24
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ropita`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `id_carrito` int(11) NOT NULL,
  `estado_carrito` varchar(10) NOT NULL,
  `id_prenda_c` int(11) NOT NULL,
  `id_tipo_filtro` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `precio` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `estado_carrito`, `id_prenda_c`, `id_tipo_filtro`, `id_usuarios`, `precio`) VALUES
(29, 'ven', 75, 114, 8, ''),
(30, 'ven', 77, 112, 8, ''),
(31, 'ven', 78, 114, 8, ''),
(32, 'ven', 80, 113, 8, ''),
(33, 'ven', 76, 112, 8, ''),
(34, 'ven', 74, 115, 8, ''),
(35, 'si', 74, 115, 0, ''),
(36, 'ven', 79, 114, 8, ''),
(37, 'si', 81, 116, 8, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feria`
--

CREATE TABLE IF NOT EXISTS `feria` (
  `id_feria` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `anio` varchar(255) NOT NULL,
  `mes` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `detalle` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `feria`
--

INSERT INTO `feria` (`id_feria`, `fecha`, `anio`, `mes`, `img`, `detalle`) VALUES
(45, '2018-12-04 14:44:02', '2018', 'DICIEMBRE', '', 'PRIMERA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filtro`
--

CREATE TABLE IF NOT EXISTS `filtro` (
  `id_filtro` int(11) NOT NULL,
  `nombre_filtro` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `filtro`
--

INSERT INTO `filtro` (`id_filtro`, `nombre_filtro`) VALUES
(1, 'Abrigos'),
(2, 'Vestidos'),
(3, 'Pantalones'),
(4, 'Pol/Blus/Cami');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `like_prenda`
--

CREATE TABLE IF NOT EXISTS `like_prenda` (
  `id_like_prenda` int(11) NOT NULL,
  `id_prenda` varchar(255) NOT NULL,
  `id_tipo_filtro` varchar(255) NOT NULL,
  `id_usuarios` varchar(255) NOT NULL,
  `estado_like` varchar(255) NOT NULL,
  `corazon` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `like_prenda`
--

INSERT INTO `like_prenda` (`id_like_prenda`, `id_prenda`, `id_tipo_filtro`, `id_usuarios`, `estado_like`, `corazon`, `precio`) VALUES
(23, '80', '113', '8', 'no', '0', ''),
(24, '78', '114', '8', 'si', '1', ''),
(25, '76', '112', '8', 'si', '1', ''),
(26, '74', '115', '8', 'si', '1', ''),
(27, '81', '116', '8', 'si', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `like_usuario`
--

CREATE TABLE IF NOT EXISTS `like_usuario` (
  `id_tipo_filtro` varchar(255) NOT NULL,
  `id_usuarios` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `corazon` varchar(255) NOT NULL,
  `compra` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL,
  `estado_like` varchar(255) NOT NULL,
  `id_like_usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `like_usuario`
--

INSERT INTO `like_usuario` (`id_tipo_filtro`, `id_usuarios`, `nombre`, `stock`, `tipo`, `corazon`, `compra`, `precio`, `estado_like`, `id_like_usuario`) VALUES
('114', '8', '', '3', 't1', '1', '', '13', 'si', 23),
('116', '8', '', '', 't2', '1', '', '15', 'si', 24),
('115', '8', 'Vestido Cola de Pato', '2', 't2', '1', '', '16', 'si', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prenda`
--

CREATE TABLE IF NOT EXISTS `prenda` (
  `id_prenda` int(11) NOT NULL,
  `id_tipo_filtro` varchar(255) NOT NULL,
  `img_prenda` varchar(255) NOT NULL,
  `corazon` varchar(255) NOT NULL,
  `talla` varchar(255) NOT NULL,
  `carrito` int(11) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `feria_prenda` varchar(200) NOT NULL,
  `estado_prenda` varchar(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prenda`
--

INSERT INTO `prenda` (`id_prenda`, `id_tipo_filtro`, `img_prenda`, `corazon`, `talla`, `carrito`, `detalle`, `feria_prenda`, `estado_prenda`) VALUES
(76, '112', '76Droid-wallpapers-fondos-545680.jpeg', '1', 'S', 1, 'Blanco con Negro', '45', '0'),
(75, '114', '751235376_362384810530629_1531238360_n.jpg', '', 'M', 1, 'Rayas Rojas', '45', '0'),
(74, '115', '74760141__night-love-couple-wallpapers-apple-wallpaper_p.jpg', '1', 'S', 1, 'Rojo', '45', '1'),
(77, '112', '77wallpaper-fondos-pantalla-escritorio-lukenfer-abstracto-fuego.jpg', '', 'S', 1, 'Blanco con Azul', '45', '0'),
(78, '114', '78fondos-de-pantalla-3d-wallpapers-waterlily-12756.jpg', '1', 'M', 0, 'Negro', '45', '1'),
(79, '114', '79fondos-de-pantalla-3d-wallpapers-waterlily-12756.jpg', '', 'M', 1, 'Negro', '45', '0'),
(80, '113', '80IMG_27072015_155741.jpg', '-1', 'S', 1, 'Bordado de Flor', '45', '0'),
(81, '116', '81maxresdefault.jpg', '1', 'M', 1, 'Rojo', '45', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_filtro`
--

CREATE TABLE IF NOT EXISTS `tipo_filtro` (
  `id_tipo_filtro` int(11) NOT NULL,
  `nombre_tf` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `corazon` varchar(255) NOT NULL,
  `compra` varchar(255) NOT NULL,
  `precio_venta` varchar(255) NOT NULL,
  `filtro` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_filtro`
--

INSERT INTO `tipo_filtro` (`id_tipo_filtro`, `nombre_tf`, `precio`, `stock`, `tipo`, `img`, `corazon`, `compra`, `precio_venta`, `filtro`) VALUES
(116, 'Vestido corazÃ³n', '15', '1', 't2', '116BANNER.JPG', '1', '', '35', 2),
(114, 'Chompa Rayas', '13', '3', 't1', '114corderita_by_constanzarui-d4dupm9.jpg', '1', '', '30', 1),
(115, 'Vestido Cola de Pato', '16', '2', 't2', '115wallpapers-de-amor-Amor-de-Infancia.jpg', '1', '', '35', 2),
(113, 'Pantalones Campana', '15', '1', 't3', '113166285-wallpapers-fondos-de-pantalla-con-trabajos-de-luz.jpg', '', '', '35', 3),
(112, 'Blusas con Adornos', '10', '2', 't4', 'koneko.jpg', '', '', '25', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL,
  `idpersonal` int(11) NOT NULL,
  `us_nom` varchar(30) NOT NULL,
  `us_pass` varchar(50) NOT NULL,
  `us_estado` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idpersonal`, `us_nom`, `us_pass`, `us_estado`) VALUES
(1, 1, 'ropitasoporte', 'c0784027b45aa11e848a38e890f8416c', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `apellido`, `usuario`, `email`, `numero`, `contrasena`, `fecha`) VALUES
(8, '', '', 'cco3094', 'keel@gmail.com', '', '123456', '2017-08-21 19:06:13'),
(9, '', '', 'xxx', 'elton@hotmail.com', '', '123456', '2017-08-28 14:30:32'),
(10, '', '', 'co30', 'algo@hotmail.com', '', '123456', '2017-09-26 00:29:07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`);

--
-- Indices de la tabla `feria`
--
ALTER TABLE `feria`
  ADD PRIMARY KEY (`id_feria`);

--
-- Indices de la tabla `filtro`
--
ALTER TABLE `filtro`
  ADD PRIMARY KEY (`id_filtro`);

--
-- Indices de la tabla `like_prenda`
--
ALTER TABLE `like_prenda`
  ADD PRIMARY KEY (`id_like_prenda`);

--
-- Indices de la tabla `like_usuario`
--
ALTER TABLE `like_usuario`
  ADD PRIMARY KEY (`id_like_usuario`);

--
-- Indices de la tabla `prenda`
--
ALTER TABLE `prenda`
  ADD PRIMARY KEY (`id_prenda`);

--
-- Indices de la tabla `tipo_filtro`
--
ALTER TABLE `tipo_filtro`
  ADD PRIMARY KEY (`id_tipo_filtro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `feria`
--
ALTER TABLE `feria`
  MODIFY `id_feria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `filtro`
--
ALTER TABLE `filtro`
  MODIFY `id_filtro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `like_prenda`
--
ALTER TABLE `like_prenda`
  MODIFY `id_like_prenda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `like_usuario`
--
ALTER TABLE `like_usuario`
  MODIFY `id_like_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `prenda`
--
ALTER TABLE `prenda`
  MODIFY `id_prenda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT de la tabla `tipo_filtro`
--
ALTER TABLE `tipo_filtro`
  MODIFY `id_tipo_filtro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
