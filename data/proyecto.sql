-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2018 a las 19:05:54
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chats`
--

CREATE TABLE `chats` (
  `id_mensaje` int(11) NOT NULL,
  `id_remitente` int(11) DEFAULT NULL,
  `id_destinatario` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `mensaje` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chats`
--

INSERT INTO `chats` (`id_mensaje`, `id_remitente`, `id_destinatario`, `fecha`, `mensaje`) VALUES
(31, 1, 2, '2018-01-26 19:00:00', 'Holaa'),
(37, 2, 1, '2018-01-31 16:00:00', 'Hola Lucía estoy muy interesada en algunos productos que vendes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprados`
--

CREATE TABLE `comprados` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_comprador` int(11) DEFAULT NULL,
  `fecha_compra` datetime DEFAULT NULL,
  `direccion_envio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comprados`
--

INSERT INTO `comprados` (`id_venta`, `id_producto`, `id_comprador`, `fecha_compra`, `direccion_envio`) VALUES
(14, 8, 2, '2018-01-30 00:00:00', 'C/La Segunda estrella a la derecha'),
(15, 21, 1, '2018-01-30 00:00:00', 'C/La Segunda estrella a la derecha'),
(16, 22, 1, '2018-01-30 00:00:00', 'C/La Segunda estrella a la derecha'),
(17, 12, 2, '2018-01-31 00:00:00', 'C/Hola que tal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `producto` varchar(127) DEFAULT NULL,
  `fecha_oferta` datetime DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `categoria` varchar(127) DEFAULT NULL,
  `descripcion` text,
  `localizacion` varchar(127) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_vendedor`, `producto`, `fecha_oferta`, `precio`, `foto`, `categoria`, `descripcion`, `localizacion`) VALUES
(8, 2, 'Libro Harry Potter', '2018-01-30 00:00:00', 10, 'Celiadescarga (1).jpg', 'libros, películas y música', 'Libro sobre las aventuras de un mago.', 'Santander'),
(12, 1, 'Croquera y Empanadilla 1', '2018-01-30 00:00:00', 5, 'LuciaCroquetayEmpanadilla.jpg', 'Libros,Cómics,Películas y Música', 'Cómic de Ana Oncina', 'santander'),
(13, 2, 'Póster Stranger Things', '2018-01-30 00:00:00', 10, 'CeliaStrangerThings.jpg', 'Decoración y Muebles', 'Póster de la serie', 'Santander'),
(14, 2, 'Sims 4', '2018-01-30 00:00:00', 10, 'CeliaSims.jpg', 'Videojuegos y Electrónica', 'Sims 4', 'Santander'),
(18, 1, 'Bañador Arena', '2018-01-30 00:00:00', 15, 'LuciabanadorArena.jpg', 'Deportes y Ocio', 'Bañador marca Arena Mujer', 'Castro Urdiales'),
(20, 1, 'Bolso Bimba y Lola', '2018-01-30 00:00:00', 60, 'LuciabolsoBimbaLola.jpg', 'Moda y Accesorios', 'Bolso de Bimba y Lola', 'Castro Urdiales'),
(21, 2, 'Libro "Todo lo que nunca te dije lo guardo aquí"', '2018-01-30 00:00:00', 10, 'Celialibro-sara-herranz.jpg', 'Libros,Cómics,Películas y Música', 'Libro de Sara Herranz', 'Castro Urdiales'),
(22, 2, 'Idiotizadas', '2018-01-30 00:00:00', 10, 'CeliaIdiotizadas.jpg', 'Libros,Cómics,Películas y Música', 'Cómic de Moderna de Pueblo', 'Santander'),
(23, 1, 'Libro Que hacer cuando en la pantalla pone The End', '2018-01-31 00:00:00', 15, 'LuciapaulaBonet.jpg', 'Libros,Cómics,Películas y Música', 'Libro de Paula Bonet', 'Santander');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`) VALUES
(1, 'Lucia', 'Lucia'),
(2, 'Celia', 'Celia');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `id_remitente` (`id_remitente`),
  ADD KEY `id_destinatario` (`id_destinatario`);

--
-- Indices de la tabla `comprados`
--
ALTER TABLE `comprados`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_comprador` (`id_comprador`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_vendedor` (`id_vendedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chats`
--
ALTER TABLE `chats`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `comprados`
--
ALTER TABLE `comprados`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`id_remitente`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`id_destinatario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `comprados`
--
ALTER TABLE `comprados`
  ADD CONSTRAINT `comprados_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `comprados_ibfk_2` FOREIGN KEY (`id_comprador`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_vendedor`) REFERENCES `usuarios` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
