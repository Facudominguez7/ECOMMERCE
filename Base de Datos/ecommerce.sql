-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 15:20:08
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`` PROCEDURE `EliminarCarritosUsuarios` ()   BEGIN
    DECLARE exit handler for sqlexception
    BEGIN
        ROLLBACK;
        RESIGNAL;
    END;

    DECLARE exit handler for sqlwarning
    BEGIN
        ROLLBACK;
        RESIGNAL;
    END;

    START TRANSACTION;
    DELETE FROM carrito_usuarios;
    COMMIT;
END$$

CREATE DEFINER=`` PROCEDURE `MostrarVentasConConteo` (IN `userID` INT)   BEGIN
    DECLARE userRole INT;
    DECLARE ventasCount INT;
    DECLARE done INT DEFAULT FALSE;
    DECLARE cur CURSOR FOR SELECT COUNT(*) FROM ventas;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    -- Obtener el rol del usuario desde la tabla permisos
    SELECT id INTO userRole FROM permisos WHERE id = userID;

    -- Si el usuario es administrador (rol 2), mostrar todas las ventas
    IF userRole = 2 THEN
        OPEN cur;
        ventas_loop: LOOP
            FETCH cur INTO ventasCount;
            IF done THEN
                LEAVE ventas_loop;
            END IF;
          
        END LOOP;
        CLOSE cur;
        SELECT v.*, c.email AS email_cliente
        FROM ventas v
        INNER JOIN clientes c ON v.idCliente = c.id;
          SELECT CONCAT('La cantidad de ventas es de: ', ventasCount) AS mensaje;
    ELSE
        SELECT 'No tiene permisos de administrador para acceder a esta información' AS mensaje;
    END IF;
END$$

DELIMITER ;

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
  `telefono` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `email`, `clave`, `nombre`, `rol`, `apellido`, `direccion`, `telefono`) VALUES
(1, 'facudominguez457@gmail.com', '123', 'Facundo', 2, 'Dominguez', 'Queirel 3806', 1548171),
(2, 'Dominguezfacu10@hotmail.com', '1234', 'Pedro', 1, 'dsfsfsdfs', 'dsdsfsdf', 14718718),
(5, 'Santino@gmail.com', '123456', 'Santino', 1, 'fsdsgfd', 'defadsfsd', 1787815);

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
(21, 407, 25, 2, 512998),
(22, 408, 25, 1, 512998),
(23, 408, 26, 1, 213000),
(24, 413, 27, 1, 344000),
(25, 411, 28, 1, 302999),
(26, 408, 29, 1, 213000),
(27, 411, 30, 1, 302999);

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

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `color`, `almacenamiento`, `codigo`, `altura`, `ancho`, `peso`) VALUES
(407, 'Motorola Moto G52', 149999, 'Motorola Moto G52\r\n\r\nEl Motorola Moto G52 es un nuevo miembro de la familia Moto G de smartphones económicos. El Moto G52 cuenta con una pantalla OLED de 6.6 pulgadas a resolución Full HD+ y tasa de refresco de 90Hz, y está potenciado por un procesador Qualcomm Snapdragon 680 con 4GB de RAM y 128GB de almacenamiento interno. Con una cámara triple de 50MP en su dorsal, el Moto G52 tiene una cámara selfie de 16MP, batería de 5000 mAh de carga rápida TurboPower de 30W, tiene diseño repelente al agua, lector de huellas lateral y corre Android 12.', 'Negro', '128gb', 'Xt2221', '160,98', '74,46', '	169'),
(408, 'iphone xs', 210000, 'iphone xs, bateria 81%', 'dorado', '64gb', '23445567', '100mm', '60mm', '90g'),
(411, 'Celular Samsung Galaxy S10e', 299999, 'El Samsung Galaxy S10e es un smartphone de alta gama que te ofrece lo mejor de la tecnología Samsung en un diseño compacto y elegante. Con su pantalla Dynamic AMOLED de 5.8 pulgadas, podrás disfrutar de una experiencia visual inmersiva con colores vibrantes y un alto nivel de detalle. Además, su pantalla cuenta con un orificio para la cámara frontal de 10 MP, que te permite tomar selfies de gran calidad y hacer videollamadas con claridad.\r\n\r\nEl Samsung Galaxy S10e tiene un rendimiento excepcional gracias a su procesador Exynos 9820 o Snapdragon 855, que te permite ejecutar múltiples aplicaciones sin problemas. También tiene una memoria RAM de 6 GB o 8 GB y un almacenamiento interno de 128 GB o 256 GB, que puedes ampliar con una tarjeta microSD hasta 512 GB. Así, tendrás espacio suficiente para guardar todas tus fotos, vídeos, música y documentos.\r\n\r\nEn cuanto a la cámara trasera, el Samsung Galaxy S10e tiene un sistema dual de 12 MP y 16 MP, que te permite capturar imágenes impresionantes con efectos como el zoom óptico, el gran angular, el modo retrato y el modo noche. También puedes grabar vídeos en 4K a 60 fps, con una estabilización óptica de imagen que evita las vibraciones. Además, el Samsung Galaxy S10e tiene funciones inteligentes que te ayudan a mejorar tus fotos, como el reconocimiento de escenas, el optimizador de escenas y el sugeridor de tomas.\r\n\r\nEl Samsung Galaxy S10e tiene una batería de 3100 mAh, que te ofrece una autonomía suficiente para todo el día. Además, cuenta con carga rápida, carga inalámbrica y carga inversa, que te permite compartir tu batería con otros dispositivos compatibles. El Samsung Galaxy S10e también tiene otras características destacadas, como el lector de huellas lateral, el reconocimiento facial, la resistencia al agua y al polvo IP68, el sonido Dolby Atmos y el sistema operativo Android 9 Pie con la interfaz One UI.', 'Azul', '128gb', '151881', ' 142,2', '69,9', '150g'),
(412, 'Samsung Galaxy A03 64 GB negro 4 GB RAM', 109999, 'Doble cámara y más detalles\r\nSus 2 cámaras traseras de 48 Mpx/2 Mpx te permitirán tomar imágenes con más detalles y lograr efectos únicos como el famoso modo retrato de poca profundidad de campo.\r\n\r\nAdemás, el dispositivo cuenta con cámara frontal de 5 Mpx para que puedas sacarte divertidas selfies o hacer videollamadas.\r\n\r\nMás para ver\r\nCon su pantalla PLS de 6.5\", disfrutá de colores intensos y mayor nitidez en todos tus contenidos.\r\n\r\nMayor rendimiento\r\nSu memoria RAM de 4 GB permite que tu smartphone funcione de manera fluida y sin demoras al realizar distintas tareas, jugar o navegar.\r\n\r\nBatería de duración superior\r\n¡Desenchufate! Con la súper batería de 5000 mAh tendrás energía por mucho más tiempo para jugar, ver series o trabajar sin necesidad de realizar recargas.\r\n\r\nGran capacidad de almacenamiento\r\nCon su memoria interna de 64 GB siempre tendrás espacio para almacenar archivos y documentos importantes. Además, podrás guardar películas, series y videos para reproducirlos cuando quieras sin conexión.\r\n', 'Negro', '64gb', '14181818', '164.2 mm', '75.9 mm', '196 g'),
(413, 'Samsung Galaxy Note 20', 341000, 'Samsung Galaxy Note 20\r\n\r\nEl Samsung Galaxy Note 20 representa la nueva generación de la serie Galaxy Note de Samsung para el 2020. Con una pantalla Super AMOLED de 6.7 pulgadas a resolución Full HD+, el Galaxy Note 20 está potenciado por un procesador Exynos 990 en versión internacional, con 8GB de memoria RAM 256GB de almacenamiento. La cámara posterior del Galaxy Note 20 es triple, con lentes de 12 MP, 64 MP y 12 MP, mientras que la cámara frontal para selfies es de 10 MP. El Galaxy Note 20 completa sus características con una batería de 4300 mAh con soporte para carga rápida e inalámbrica, parlantes stereo, sonido Hi-Fi, lector de huellas bajo la pantalla, resistencia al agua IP68, y corre One UI 2.5 basado en Android 10, y está disponible en versión LTE o 5G.', 'Bronze', '256gb', '118184845', '161.6 mm', ' 75.2 mm', '192 g'),
(414, 'Apple iPhone 12 Pro', 1999999, 'El iPhone 12 Pro tiene una espectacular pantalla Super Retina XDR de 6.1 pulgadas (1). Con el nuevo Ceramic Shield, es cuatro veces más resistente a las caídas (2). Y te permite tomar fotos increíbles con poca luz gracias a un nuevo sistema de cámaras Pro y un rango de zoom óptico de 4x. También puedes grabar, editar y reproducir video en Dolby Vision con calidad cinematográfica, tomar retratos con modo Noche y disfrutar experiencias de realidad aumentada de última generación con el escáner LiDAR. El iPhone 12 Pro viene con el potente chip A14 Bionic y es compatible con los nuevos accesorios MagSafe que se adhieren magnéticamente a tu iPhone y brindan una carga inalámbrica más rápida (3). Una infinidad de posibilidades que no dejarán de sorprenderte.', 'Grafito', '256 GB', '7848494545', '146.7 mm', '71.5 mm', ' 187 g'),
(416, 'dfgdfg', 15, 'fdgdf', 'dfgdg', 'fdgdgf', 'fdgd', '515', '1515', '5151'),
(417, 'gfhfghf', 5141, 'gfhfh', 'fghfh', 'gfhf', 'fghfh15hfg', '626', '2115', '6215615');

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
(86, 416, '20211026_224908.jpg'),
(87, 416, '20211028_194055.jpg'),
(88, 417, '20211026_224908.jpg'),
(89, 417, '20211028_194055.jpg');

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
(25, 2, '2023-11-15 01:48:59', 512998, 'tarjeta', 'dsdsfsdf'),
(26, 2, '2023-11-15 12:53:11', 213000, 'paypal', 'dsdsfsdf'),
(27, 5, '2023-11-15 12:55:18', 344000, 'paypal', 'defadsfsd'),
(28, 1, '2023-11-16 07:13:13', 302999, 'transferencia', 'Queirel 3806'),
(29, 1, '2023-11-16 11:43:37', 213000, 'paypal', 'Queirel 3806'),
(30, 1, '2023-11-16 13:28:19', 302999, 'tarjeta', 'Queirel 3806');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=418;

--
-- AUTO_INCREMENT de la tabla `productos_files`
--
ALTER TABLE `productos_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
