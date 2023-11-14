-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 20:33:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_usuarios`
--

CREATE TABLE `carrito_usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito_usuarios`
--

INSERT INTO `carrito_usuarios` (`id`, `id_usuario`, `id_producto`, `cantidad`, `precio_unitario`) VALUES
(39, 1, 411, 1, 299999),
(40, 1, 407, 1, 149999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `rol` int(11) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `email`, `clave`, `nombre`, `rol`, `apellido`, `direccion`, `telefono`) VALUES
(1, 'facudominguez457@gmail.com', '123', '         Facundo', 2, '      Dominguez', 'sskadjkds', 142),
(2, 'Dominguezfacu10@hotmail.com', '1234', ' Pedro', 1, ' dsfsfsdfs', 'dsdsfsdf', 14718718);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `id` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `cantProductos` int(11) NOT NULL,
  `subTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalleventas`
--

INSERT INTO `detalleventas` (`id`, `idProducto`, `idVenta`, `cantProductos`, `subTotal`) VALUES
(3, 407, 13, 1, 262998),
(4, 407, 14, 1, 262998),
(5, 412, 14, 1, 262998),
(6, 411, 15, 1, 302999),
(7, 408, 16, 2, 423000),
(8, 407, 17, 3, 2862994),
(9, 411, 17, 1, 2862994),
(10, 412, 17, 1, 2862994),
(11, 414, 17, 1, 2862994),
(12, 407, 18, 2, 302998),
(13, 408, 19, 1, 213000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `rol`) VALUES
(1, 'Lector'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `existencia` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `color` varchar(50) NOT NULL,
  `almacenamiento` varchar(50) NOT NULL,
  `codigo` varchar(250) NOT NULL,
  `altura` varchar(50) NOT NULL,
  `ancho` varchar(50) NOT NULL,
  `peso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `existencia`, `descripcion`, `color`, `almacenamiento`, `codigo`, `altura`, `ancho`, `peso`) VALUES
(407, 'Motorola Moto G52', 149999, 0, 'Motorola Moto G52\r\n\r\nEl Motorola Moto G52 es un nuevo miembro de la familia Moto G de smartphones económicos. El Moto G52 cuenta con una pantalla OLED de 6.6 pulgadas a resolución Full HD+ y tasa de refresco de 90Hz, y está potenciado por un procesador Qualcomm Snapdragon 680 con 4GB de RAM y 128GB de almacenamiento interno. Con una cámara triple de 50MP en su dorsal, el Moto G52 tiene una cámara selfie de 16MP, batería de 5000 mAh de carga rápida TurboPower de 30W, tiene diseño repelente al agua, lector de huellas lateral y corre Android 12.', 'Negro', '128gb', 'Xt2221', '160,98', '74,46', '	169'),
(408, 'iphone xs', 210000, 0, 'iphone xs, bateria 81%', 'dorado', '64gb', '23445567', '100mm', '60mm', '90g'),
(411, 'Celular Samsung Galaxy S10e', 299999, 0, 'El Samsung Galaxy S10e es un smartphone de alta gama que te ofrece lo mejor de la tecnología Samsung en un diseño compacto y elegante. Con su pantalla Dynamic AMOLED de 5.8 pulgadas, podrás disfrutar de una experiencia visual inmersiva con colores vibrantes y un alto nivel de detalle. Además, su pantalla cuenta con un orificio para la cámara frontal de 10 MP, que te permite tomar selfies de gran calidad y hacer videollamadas con claridad.\r\n\r\nEl Samsung Galaxy S10e tiene un rendimiento excepcional gracias a su procesador Exynos 9820 o Snapdragon 855, que te permite ejecutar múltiples aplicaciones sin problemas. También tiene una memoria RAM de 6 GB o 8 GB y un almacenamiento interno de 128 GB o 256 GB, que puedes ampliar con una tarjeta microSD hasta 512 GB. Así, tendrás espacio suficiente para guardar todas tus fotos, vídeos, música y documentos.\r\n\r\nEn cuanto a la cámara trasera, el Samsung Galaxy S10e tiene un sistema dual de 12 MP y 16 MP, que te permite capturar imágenes impresionantes con efectos como el zoom óptico, el gran angular, el modo retrato y el modo noche. También puedes grabar vídeos en 4K a 60 fps, con una estabilización óptica de imagen que evita las vibraciones. Además, el Samsung Galaxy S10e tiene funciones inteligentes que te ayudan a mejorar tus fotos, como el reconocimiento de escenas, el optimizador de escenas y el sugeridor de tomas.\r\n\r\nEl Samsung Galaxy S10e tiene una batería de 3100 mAh, que te ofrece una autonomía suficiente para todo el día. Además, cuenta con carga rápida, carga inalámbrica y carga inversa, que te permite compartir tu batería con otros dispositivos compatibles. El Samsung Galaxy S10e también tiene otras características destacadas, como el lector de huellas lateral, el reconocimiento facial, la resistencia al agua y al polvo IP68, el sonido Dolby Atmos y el sistema operativo Android 9 Pie con la interfaz One UI.', 'Azul', '128gb', '151881', ' 142,2', '69,9', '150g'),
(412, 'Samsung Galaxy A03 64 GB negro 4 GB RAM', 109999, 0, 'Doble cámara y más detalles\r\nSus 2 cámaras traseras de 48 Mpx/2 Mpx te permitirán tomar imágenes con más detalles y lograr efectos únicos como el famoso modo retrato de poca profundidad de campo.\r\n\r\nAdemás, el dispositivo cuenta con cámara frontal de 5 Mpx para que puedas sacarte divertidas selfies o hacer videollamadas.\r\n\r\nMás para ver\r\nCon su pantalla PLS de 6.5\", disfrutá de colores intensos y mayor nitidez en todos tus contenidos.\r\n\r\nMayor rendimiento\r\nSu memoria RAM de 4 GB permite que tu smartphone funcione de manera fluida y sin demoras al realizar distintas tareas, jugar o navegar.\r\n\r\nBatería de duración superior\r\n¡Desenchufate! Con la súper batería de 5000 mAh tendrás energía por mucho más tiempo para jugar, ver series o trabajar sin necesidad de realizar recargas.\r\n\r\nGran capacidad de almacenamiento\r\nCon su memoria interna de 64 GB siempre tendrás espacio para almacenar archivos y documentos importantes. Además, podrás guardar películas, series y videos para reproducirlos cuando quieras sin conexión.\r\n', 'Negro', '64gb', '14181818', '164.2 mm', '75.9 mm', '196 g'),
(413, 'Samsung Galaxy Note 20', 341000, 0, 'Samsung Galaxy Note 20\r\n\r\nEl Samsung Galaxy Note 20 representa la nueva generación de la serie Galaxy Note de Samsung para el 2020. Con una pantalla Super AMOLED de 6.7 pulgadas a resolución Full HD+, el Galaxy Note 20 está potenciado por un procesador Exynos 990 en versión internacional, con 8GB de memoria RAM 256GB de almacenamiento. La cámara posterior del Galaxy Note 20 es triple, con lentes de 12 MP, 64 MP y 12 MP, mientras que la cámara frontal para selfies es de 10 MP. El Galaxy Note 20 completa sus características con una batería de 4300 mAh con soporte para carga rápida e inalámbrica, parlantes stereo, sonido Hi-Fi, lector de huellas bajo la pantalla, resistencia al agua IP68, y corre One UI 2.5 basado en Android 10, y está disponible en versión LTE o 5G.', 'Bronze', '256gb', '118184845', '161.6 mm', ' 75.2 mm', '192 g'),
(414, 'Apple iPhone 12 Pro', 1999999, 0, 'El iPhone 12 Pro tiene una espectacular pantalla Super Retina XDR de 6.1 pulgadas (1). Con el nuevo Ceramic Shield, es cuatro veces más resistente a las caídas (2). Y te permite tomar fotos increíbles con poca luz gracias a un nuevo sistema de cámaras Pro y un rango de zoom óptico de 4x. También puedes grabar, editar y reproducir video en Dolby Vision con calidad cinematográfica, tomar retratos con modo Noche y disfrutar experiencias de realidad aumentada de última generación con el escáner LiDAR. El iPhone 12 Pro viene con el potente chip A14 Bionic y es compatible con los nuevos accesorios MagSafe que se adhieren magnéticamente a tu iPhone y brindan una carga inalámbrica más rápida (3). Una infinidad de posibilidades que no dejarán de sorprenderte.', 'Grafito', '256 GB', '7848494545', '146.7 mm', '71.5 mm', ' 187 g'),
(415, 'fdsfs', 5151, 0, 'dsfsfd', 'dsfsf', 'dsfsdf', '1515dfgd', '5151', '12515', '515');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_files`
--

CREATE TABLE `productos_files` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `nombre_archivo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_files`
--

INSERT INTO `productos_files` (`id`, `producto_id`, `nombre_archivo`) VALUES
(60, 407, 'D_NQ_NP_903069-MLA51918250580_102022-O.webp'),
(61, 407, 'D_NQ_NP_749792-MLA51918338196_102022-O.webp'),
(62, 408, 'yo.jpeg'),
(63, 408, 'yo 2.jpeg'),
(68, 411, 's10e.webp'),
(69, 411, 's10e .webp'),
(70, 412, 'a03.webp'),
(71, 412, 'a03 7.webp'),
(72, 412, 'a03 6.webp'),
(73, 412, 'a03 5.webp'),
(74, 412, 'a03 4.webp'),
(75, 412, 'a03 3.webp'),
(76, 412, 'a03 2.webp'),
(77, 413, 'note20.webp'),
(78, 413, 'note20 2.webp'),
(79, 414, '12 pro 2.webp'),
(80, 414, '12 pro 3.webp'),
(81, 414, '12 pro 4.webp'),
(82, 414, '12 pro.webp'),
(83, 415, '2023-09-25 (8).png'),
(84, 415, '2023-09-25 (9).png'),
(85, 415, '2023-09-25 (10).png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `total` int(11) NOT NULL,
  `metodo_pago` varchar(250) NOT NULL,
  `direccion_envio` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `idCliente`, `fecha`, `total`, `metodo_pago`, `direccion_envio`) VALUES
(1, 1, '0000-00-00 00:00:00', 2602997, '', ''),
(4, 1, '0000-00-00 00:00:00', 2602997, 'transferencia', 'ghdgfdgd'),
(5, 1, '0000-00-00 00:00:00', 2602997, 'transferencia', 'ghdgfdgd'),
(6, 1, '0000-00-00 00:00:00', 2602997, 'transferencia', 'ghdgfdgd'),
(7, 1, '0000-00-00 00:00:00', 262998, 'tarjeta', 'sadasda'),
(8, 1, '0000-00-00 00:00:00', 262998, 'tarjeta', 'sadasda'),
(9, 1, '0000-00-00 00:00:00', 262998, 'tarjeta', 'sadasda'),
(10, 1, '0000-00-00 00:00:00', 262998, 'tarjeta', 'sadasda'),
(11, 1, '0000-00-00 00:00:00', 262998, 'paypal', 'dgfdg'),
(12, 1, '0000-00-00 00:00:00', 262998, 'paypal', 'dgfdg'),
(13, 1, '0000-00-00 00:00:00', 262998, 'paypal', 'dgfdg'),
(14, 1, '0000-00-00 00:00:00', 262998, 'paypal', 'dgfdg'),
(15, 1, '0000-00-00 00:00:00', 302999, 'transferencia', 'fdgdfg'),
(16, 1, '0000-00-00 00:00:00', 423000, 'transferencia', 'queirel 3806'),
(17, 2, '0000-00-00 00:00:00', 2862994, 'efectivo', 'dsdsfsdf'),
(18, 1, '0000-00-00 00:00:00', 302998, 'transferencia', 'dfgdfg'),
(19, 1, '2023-11-14 15:45:58', 213000, 'paypal', 'sskadjkds'),
(20, 1, '2023-11-14 15:48:09', 213000, 'paypal', 'sskadjkds');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_usuarios`
--
ALTER TABLE `carrito_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidusuario` (`id_usuario`),
  ADD KEY `fkidproducto` (`id_producto`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidProducto` (`idProducto`),
  ADD KEY `fkidVenta` (`idVenta`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_files`
--
ALTER TABLE `productos_files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidCliente` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito_usuarios`
--
ALTER TABLE `carrito_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=416;

--
-- AUTO_INCREMENT de la tabla `productos_files`
--
ALTER TABLE `productos_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito_usuarios`
--
ALTER TABLE `carrito_usuarios`
  ADD CONSTRAINT `fkidproducto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkidusuario` FOREIGN KEY (`id_usuario`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD CONSTRAINT `idProducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idVenta` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
