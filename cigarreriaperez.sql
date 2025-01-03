-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2020 a las 21:51:52
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cigarreriaperez`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(40) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombreCategoria`) VALUES
(5, 'Doble Anis'),
(6, 'Aguila'),
(7, 'Poker');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idMensaje` int(11) NOT NULL,
  `emisor` int(11) NOT NULL,
  `receptor` int(11) NOT NULL,
  `mensaje` text COLLATE utf8_spanish2_ci NOT NULL,
  `estadoMensaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`idMensaje`, `emisor`, `receptor`, `mensaje`, `estadoMensaje`) VALUES
(5, 1007273586, 1007273585, 'Hola Jefe Buenas Tardes', 1),
(6, 1007273586, 1007273585, 'Jefe una pregunta usted siempre realizo el pedido de bombombunes?', 1),
(7, 1007273586, 1007273585, 'Lo que pasa es que no lo veo en la sesion de pedidos', 1),
(8, 1007273585, 1007273586, 'Hola, no señor ya lo hago.\n', 1),
(9, 1007273585, 1007273586, 'Ya Lo hice si le cargo?', 1),
(10, 1007273586, 1007273585, 'Si, si señor mil gracias', 1),
(11, 1007273585, 1007273586, 'no gracias a usted hermano\n', 1),
(12, 1007273586, 1007273585, 'usted sabe que yo siempre estoy pendiente jefe', 1),
(13, 1007273585, 1007273586, 'Muy bien por eso lo felicito tanto', 1),
(14, 1007273586, 1007273585, 'SI señor, yo estoy para servirle jefe', 1),
(15, 1007273586, 1007273585, 'Esta empresa me a brindado mucho', 1),
(16, 1007273585, 1007273586, 'Es un orgullo tener un empleado como usted', 1),
(17, 1007273585, 1007273586, 'enserio felicidades', 1),
(18, 1007273586, 1007273585, 'No jefe yo con gusto les sirvo', 1),
(19, 1007273586, 1007273585, 'disculpe jefe cuando nos podra pagar quincena', 1),
(20, 1007273585, 1007273586, 'Yo creo que partir de la otra semana', 1),
(21, 1007273586, 1007273585, 'ahh bueno señor', 1),
(22, 1007273585, 1007273586, 'si tranquilo que esa plata no se les pierde', 1),
(23, 1007273585, 1007273586, 'clame el bollo jajajja', 1),
(24, 1007273586, 1007273585, 'jajajaj no jefe solo que hay cositas por comprar', 1),
(25, 1007273586, 1007273585, 'Pero pues si todo con calma jjajaj', 1),
(26, 1007273586, 1007273585, 'jefe hasta mañana que descanse', 1),
(27, 1007273585, 1007273587, 'Hola Joven Bienvenido', 1),
(28, 1007273587, 1007273585, 'Hola jefe muchas gracias', 1),
(29, 1007273585, 1007273587, 'En un momento le mando los reglamentos', 1),
(30, 1007273585, 1007273586, 'Igualmente joven pase buena noche', 1),
(31, 1007273587, 1007273585, 'Ah vale jefe los estare esperando', 1),
(32, 1007273585, 1007273587, 'Creo que ya se los envie a el correo por favor revise y en caso de que si o de que no, me avisa', 1),
(33, 1007273587, 1007273585, 'listo jefe enseguida reviso', 1),
(34, 1007273587, 1007273585, 'vale', 1),
(35, 1007273587, 1007273585, '??\n', 1),
(36, 1007273587, 1007273585, '?', 1),
(37, 1007273587, 1007273585, 'sigo esperando su respuesta', 1),
(38, 1007273587, 1007273585, 'joven', 1),
(39, 1007273587, 1007273585, 'que ondA', 1),
(40, 1007273587, 1007273585, '', 1),
(41, 1007273587, 1007273585, 'se me fue ese espacio', 1),
(42, 1007273585, 1007273586, 'jay mano \npailas', 1),
(43, 1007273585, 1007273587, 'ok ya', 1),
(44, 1007273587, 1007273585, 'despedido', 1),
(45, 1007273585, 1007273587, 'jumm ppero que', 1),
(46, 1007273585, 1007273587, '', 1),
(47, 1007273585, 1007273587, '', 1),
(48, 1007273585, 1007273587, '', 1),
(49, 1007273585, 1007273587, '', 1),
(50, 1007273585, 1007273587, '', 1),
(51, 1007273585, 1007273587, '', 1),
(52, 1007273585, 1007273587, '', 1),
(53, 1007273585, 1007273587, '', 1),
(54, 1007273585, 1007273587, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `cantidadPedido` int(11) NOT NULL,
  `totalPedido` int(11) NOT NULL,
  `fechaPedido` date NOT NULL,
  `estadoPedido` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidadProducto` int(11) NOT NULL,
  `precioProducto` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombreProducto`, `cantidadProducto`, `precioProducto`, `idCategoria`) VALUES
(7, 'Cerveza en lata', 996, 2500, 6),
(8, 'Media aguardiente', 65, 23000, 5),
(9, 'cerveza en envace', 86, 2000, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idProveedor` int(11) NOT NULL,
  `nombreProveedor` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `celularProveedor` bigint(20) NOT NULL,
  `correoProveedor` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idProveedor`, `nombreProveedor`, `celularProveedor`, `correoProveedor`, `idCategoria`) VALUES
(4, 'Julanito de tal', 3112119638, 'julanitoDeTal@gmail.com', 5),
(5, 'Pepito Perez', 3214312022, 'jisilva58@misena.edu.co', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `numCedula` int(11) NOT NULL,
  `nombreUsuario` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `celularUsuario` bigint(20) NOT NULL,
  `correoUsuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `urlFoto` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rolUsuario` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`numCedula`, `nombreUsuario`, `celularUsuario`, `correoUsuario`, `password`, `urlFoto`, `rolUsuario`) VALUES
(1007273585, 'Juan Ignacio Silva Laguna', 3112119638, 'juancho29silva@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$VTFkYVRueDZENXRZZ21WVw$MEztkjmT1gbLPR6MnXn7nOy65Awx6G8vymjwqN5+iOc', '../fotoPerfil/IMG-20190927-WA0015.jpg', 'Administrador'),
(1007273586, 'juancho 1', 3112119638, 'jisilva58@misena.edu.co', '$argon2i$v=19$m=65536,t=4,p=1$cmt2aC52MmMwejRwbTYxZw$HiBXeCV2KgOgbzg2v2NWRogH0nP2WM2YLkN+7H/tGBI', '../fotoPerfil/IMG-20191216-WA0025 (2).jpg', 'Empleado'),
(1007273587, 'juan 2', 3112119638, 'juanchosilva@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$MkpDVUgwcVguNi5aM2tNUw$8kudjQd8Dz9Qoe8xBoQFdVrBQXfEFhlGnw5COzA4l/Y', '../fotoPerfil/IMG-20190823-WA0008.jpg', 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `cantidadVenta` int(11) NOT NULL,
  `fechaVenta` date NOT NULL,
  `numCedula` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idMensaje`),
  ADD KEY `id_usuario1` (`emisor`),
  ADD KEY `id_usuario2` (`receptor`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `id_producto` (`idProducto`),
  ADD KEY `id_proveedor` (`idProveedor`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `id_categoria` (`idCategoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProveedor`),
  ADD KEY `id_categoria` (`idCategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`numCedula`),
  ADD UNIQUE KEY `correoUsuario` (`correoUsuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `id_usuario` (`numCedula`),
  ADD KEY `id_producto` (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`emisor`) REFERENCES `usuarios` (`numCedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`receptor`) REFERENCES `usuarios` (`numCedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`numCedula`) REFERENCES `usuarios` (`numCedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
