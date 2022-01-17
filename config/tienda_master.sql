-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2020 a las 04:54:08
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_master`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'camisa '),
(2, 'pantalon'),
(5, 'zapatos'),
(6, 'gorras'),
(9, 'ropa interior'),
(11, 'utiles escolares');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_pedido`
--

CREATE TABLE `lineas_pedido` (
  `id` int(255) NOT NULL,
  `pedido_id` int(255) NOT NULL,
  `producto_id` int(255) NOT NULL,
  `unidades` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lineas_pedido`
--

INSERT INTO `lineas_pedido` (`id`, `pedido_id`, `producto_id`, `unidades`) VALUES
(11, 7, 4, 2),
(12, 7, 2, 1),
(13, 7, 1, 1),
(14, 8, 4, 2),
(15, 8, 2, 1),
(16, 8, 1, 1),
(17, 9, 2, 3),
(18, 10, 4, 3),
(19, 10, 3, 2),
(20, 10, 2, 1),
(21, 11, 5, 4),
(22, 11, 4, 1),
(23, 12, 8, 50),
(24, 13, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `coste` int(255) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `provincia`, `ciudad`, `direccion`, `coste`, `estado`, `fecha`, `hora`) VALUES
(7, 11, 'nose', 'barranquilla', 'kra. 6f #77-37', 136900, 'confirm', '2020-06-13', '16:02:57'),
(8, 11, 'nose', 'barranquilla', 'kra. 6f #77-37', 136900, 'confirm', '2020-06-13', '16:05:42'),
(9, 11, 'nose', 'barranquilla', 'kra. 6f #77-37', 74700, 'sended', '2020-06-15', '15:25:07'),
(10, 17, 'nose', 'barranquilla', 'kra. 6f #77-37', 414900, 'preparation', '2020-06-16', '11:22:49'),
(11, 11, 'Barranquilla, barrio el bosque', 'Barranquilla, barrio el bosque', 'Kra. 6f #77-37', 63760, 'confirm', '2020-09-01', '17:25:26'),
(12, 11, 'mlp', 'Barranquilla, barrio el bosque', 'Kra. 6f #77-37', 2700000, 'confirm', '2020-09-01', '23:42:28'),
(13, 11, 'Barranquilla, barrio el bosque', 'Barranquilla, barrio el bosque', 'Kra. 6f #77-37, barrio el  bosque, Kra.6f  #77-37', 36000, 'ready', '2020-09-02', '15:52:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `precio` int(100) NOT NULL,
  `stock` int(255) NOT NULL,
  `oferta` varchar(2) DEFAULT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `oferta`, `fecha`, `imagen`) VALUES
(1, 6, 'zapatos nike', '                        son unos buenos zapatos     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n      proident, sunt in culpa qui officia deserunt mollit anim id est laborum     \r\n     \r\n     \r\n     \r\n    ', 12000, 225, NULL, '2020-09-01', 'IMG_20200901_175338.jpg'),
(2, 5, 'zapatos ', '        zapatos blancos con zuela de goma, disponibles en tallas 37 - 42,  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n      proident, sunt in culpa qui officia deserunt mollit anim id est laborum\r\n         \r\n     \r\n     \r\n     \r\n     \r\n     \r\n     \r\n     \r\n     \r\n     \r\n     \r\n    ', 72000, 200, NULL, '2020-09-01', 'CWVMLJKPRNGJC.jpg'),
(3, 1, 'camisa prmocionada - suzuki', '        camisa con lo de suzuki   - tallas M,R,T,S disponibles, tambien disponibles en color rojo y gris,  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n      proident, sunt in culpa qui officia deserunt mollit anim id est laborum\r\n     \r\n     \r\n     \r\n     \r\n    ', 12000, 546, NULL, '2020-09-01', 'Nueva-moda-Suzuki-Hayabusa-gsx-r-1300-camiseta-con-el-logotipo-superior-camisetas.jpg'),
(4, 9, 'ropa interior mujer negro', '        pantalon       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n      proident, sunt in culpa qui officia deserunt mollit anim id est laborum\r\n     \r\n     \r\n     \r\n     \r\n     \r\n    ', 50000, 243, NULL, '2020-09-01', '8a0ce5900bf090acc4e80e3944923cd5.jpg'),
(5, 1, 'camisa promocionada K1300-R', '        camisa con le logo  y referencia de un negocio de motos (K1300-R) - Tallas L, R, M, S disponibles   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n      proident, sunt in culpa qui officia deserunt mollit anim id est laborum \r\n     \r\n     \r\n     \r\n     \r\n     \r\n     \r\n    ', 6000, 24, NULL, '2020-09-01', '2020-new-arrival-brand-clothing-fashion-hot.jpg'),
(6, 5, 'zapatos nike - niña', '        zapatos nike para niña - disponibles en colores morado , azul y amarillo, tallas disponibles 11 - 21        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n      proident, sunt in culpa qui officia deserunt mollit anim id est laborum\r\n     \r\n    ', 15700, 75, NULL, '2020-09-01', 'CW6GCXX7GARKM.jpg'),
(7, 5, 'zapatos N', '        zapatos para niños disponibles en colores marron y amarillo, tallas disponibles 13 - 39  ,  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n      proident, sunt in culpa qui officia deserunt mollit anim id est laborum        \r\n     \r\n    ', 35000, 150, NULL, '2020-09-01', 'levis-new-balance-05.jpg'),
(8, 2, ' Showmee Store DRAXY 1300 Jeans con bolsillos traseros', '                    Deslumbra a todos! Luce fantástica y fabulosa cada vez que salgas de casa con los pantalones ajustados que Draxy tiene para ti. Deja que tus días,  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n      proident, sunt in culpa qui officia deserunt mollit anim id est laborum      \r\n     \r\n     \r\n    ', 54000, 214, NULL, '2020-09-01', 'cc93572487d3ff567025b47144eb5187.jpg'),
(9, 11, 'bolso totto niña', '                es un bolso totto con muchos compartimentos   ,  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n      proident, sunt in culpa qui officia deserunt mollit anim id est laborum\r\n     \r\n     \r\n    ', 60000, 54, NULL, '2020-09-01', 'bolso.jpg'),
(10, 11, 'colores prisma colors', '        paquete de colores completo con 61 distisntos de lapices para colorear      ,  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n      proident, sunt in culpa qui officia deserunt mollit anim id est laborum   \r\n     \r\n    ', 3500, 614, NULL, '2020-09-01', 'colores.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `documento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `documento`, `nombre`, `apellidos`, `email`, `password`, `rol`, `imagen`) VALUES
(1, 1002203, 'admin', 'admin', 'admin@mm', '1', 'admin', ''),
(11, 555333, 'fran', 'charris', 'admin', '$2y$12$VJZ0PcGSzIpQBNCwDEyAf.NK7Pp6khRT9mFqd5iZtp3mw7BB3.JRu', 'admin', 'null'),
(15, 999876, 'david', 'lopez', 'david@gmail.com', '$2y$12$ZcoWVNYgMVcW4J9GpHExBuDTVmxFeEko3UwKxWKeC.U8VE/BpBhDy', 'user', 'null'),
(17, 10471020, 'santi andres ', 'charrsis camargo', 'santich@gmail.com', '$2y$12$jLAguPGhL2DNEn.gSRAm2uZRjRuTDueJMh7pmoQnRyyXPiLy/W.R2', 'user', 'null');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lineas_pedido`
--
ALTER TABLE `lineas_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `lineas_pedido`
--
ALTER TABLE `lineas_pedido`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lineas_pedido`
--
ALTER TABLE `lineas_pedido`
  ADD CONSTRAINT `lineas_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `lineas_pedido_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
