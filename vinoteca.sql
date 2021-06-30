-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2021 a las 17:39:20
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vinoteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `productoID` int(20) NOT NULL,
  `productoNombre` varchar(50) DEFAULT NULL,
  `productoCosto` float DEFAULT NULL,
  `productoPrecio` float DEFAULT NULL,
  `productoStock` int(11) DEFAULT NULL,
  `productoBaja` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`productoID`, `productoNombre`, `productoCosto`, `productoPrecio`, `productoStock`, `productoBaja`) VALUES
(0, 'Fernet Branca 750cc', 250, 550, 25, 1),
(1, 'Portillo Malbec 750cc', 150, 300, 30, 1),
(2, 'Cinzano Rosso 750cc', 170, 230, 30, 1),
(3, 'Coca Cola 2.25L', 150, 260, 20, 1),
(4, 'Portillo Cabernet 750cc', 150, 250, 14, 1),
(5, 'Catalpa Malbec 750cc', 650, 890, 30, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `proveedorID` int(11) NOT NULL,
  `proveedorNombre` varchar(50) NOT NULL DEFAULT '',
  `proveedorFlete` int(11) NOT NULL DEFAULT 0 COMMENT 'Costo del flete por proveedor',
  `tipoID` int(11) NOT NULL DEFAULT 0 COMMENT 'ID del tipo de proveedor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`proveedorID`, `proveedorNombre`, `proveedorFlete`, `tipoID`) VALUES
(0, 'Branca', 500, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `tipoID` int(11) NOT NULL COMMENT 'ID de tipo de producto',
  `tipoDesc` varchar(50) NOT NULL DEFAULT '0' COMMENT 'Descripción de tipo de producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`tipoID`, `tipoDesc`) VALUES
(0, 'Vino'),
(1, 'Bebida'),
(2, 'Gaseosa'),
(3, 'Vermouth');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `productoID` int(11) NOT NULL,
  `ventaID` int(11) NOT NULL,
  `ventaTotal` int(11) NOT NULL DEFAULT 0 COMMENT 'Total $$$ de una venta',
  `ventaFecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`productoID`, `ventaID`, `ventaTotal`, `ventaFecha`) VALUES
(0, 80, 0, '2021-06-28 23:52:09'),
(0, 81, 0, '2021-06-29 00:00:59'),
(0, 82, 0, '2021-06-29 00:16:41'),
(0, 83, 0, '2021-06-29 01:03:09'),
(0, 84, 0, '2021-06-30 14:39:00'),
(0, 86, 0, '2021-06-30 15:17:19'),
(0, 87, 0, '2021-06-30 15:18:43'),
(0, 88, 0, '2021-06-30 15:20:57'),
(0, 89, 1880, '2021-06-30 15:22:18'),
(0, 90, 550, '2021-06-30 15:25:45'),
(0, 91, 550, '2021-06-30 15:26:02'),
(0, 92, 1100, '2021-06-30 15:28:14'),
(0, 93, 1900, '2021-06-30 15:28:42'),
(0, 94, 0, '2021-06-30 15:30:25'),
(0, 95, 0, '2021-06-30 15:32:11'),
(0, 96, 0, '2021-06-30 15:32:20'),
(0, 97, 1900, '2021-06-30 15:33:43'),
(0, 98, 1100, '2021-06-30 15:33:58'),
(0, 99, 0, '2021-06-30 15:35:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_detalle`
--

CREATE TABLE `venta_detalle` (
  `ventaID` int(11) NOT NULL,
  `productoID` int(11) NOT NULL,
  `ventaCantidad` int(11) NOT NULL,
  `ventaPrecio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta_detalle`
--

INSERT INTO `venta_detalle` (`ventaID`, `productoID`, `ventaCantidad`, `ventaPrecio`) VALUES
(80, 0, 1, 550),
(80, 2, 1, 230),
(80, 3, 5, 260),
(81, 0, 5, 550),
(81, 3, 2, 260),
(81, 4, 5, 250),
(82, 0, 51, 550),
(82, 2, 2, 230),
(82, 4, 5, 250),
(82, 5, 1, 890),
(83, 0, 2, 550),
(83, 3, 3, 260),
(83, 5, 1, 890),
(84, 0, 6, 550),
(84, 1, 2, 300),
(84, 3, 5, 260),
(86, 0, 1, 550),
(86, 3, 5, 260),
(87, 0, 4, 550),
(87, 3, 1, 260),
(88, 0, 1, 550),
(88, 3, 5, 260),
(89, 0, 2, 550),
(89, 3, 3, 260),
(90, 0, 1, 550),
(91, 0, 1, 550),
(92, 0, 2, 550),
(93, 1, 2, 300),
(93, 3, 5, 260),
(97, 0, 3, 550),
(97, 4, 1, 250),
(98, 0, 2, 550);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`productoID`) USING BTREE;

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`proveedorID`) USING BTREE;

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`tipoID`) USING BTREE;

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`ventaID`);

--
-- Indices de la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  ADD PRIMARY KEY (`ventaID`,`productoID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `ventaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
