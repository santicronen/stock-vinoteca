-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 03:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vinoteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `productoID` int(20) NOT NULL,
  `productoNombre` varchar(50) DEFAULT NULL,
  `productoCosto` float DEFAULT NULL,
  `productoPrecio` float DEFAULT NULL,
  `productoStock` int(11) DEFAULT NULL,
  `productoBaja` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`productoID`, `productoNombre`, `productoCosto`, `productoPrecio`, `productoStock`, `productoBaja`) VALUES
(0, 'Fernet Branca 750cc', 250, 550, 50, 0),
(1, 'Portillo Malbec 750cc', 150, 300, 50, 0),
(2, 'Cinzano Rosso 750cc', 170, 230, 29, 0),
(3, 'Coca Cola 2.25L', 150, 260, 19, 0),
(4, 'Portillo Cabernet 750cc', 150, 250, 14, 0),
(5, 'Catalpa Malbec 750cc', 650, 890, 27, 0),
(6, 'Apolinario London Dry 750cc', 300, 1650, 50, 0),
(7, 'Fernet Buhero Negro 750cc', 400, 670, 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `productoID` int(11) NOT NULL,
  `ventaID` int(11) NOT NULL,
  `ventaTotal` int(11) NOT NULL DEFAULT 0 COMMENT 'Total $$$ de una venta',
  `ventaFecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venta`
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
(0, 99, 0, '2021-06-30 15:35:51'),
(0, 100, 0, '2021-11-01 18:04:30'),
(0, 101, 2200, '2021-11-01 18:05:05'),
(0, 102, 0, '2021-11-01 18:07:03'),
(0, 103, 0, '2021-11-01 18:08:17'),
(0, 104, 0, '2021-11-01 18:08:18'),
(0, 105, 2460, '2021-11-01 18:08:53'),
(0, 106, 0, '2021-11-01 18:10:18'),
(0, 107, 2430, '2021-11-01 18:10:18'),
(0, 108, 0, '2021-11-01 18:10:35'),
(0, 109, 0, '2021-11-15 00:15:17'),
(0, 110, 0, '2021-11-15 00:16:14'),
(0, 111, 0, '2021-11-15 00:16:59'),
(0, 112, 0, '2021-11-15 00:19:10'),
(0, 113, 0, '2021-11-16 17:04:23'),
(0, 114, 0, '2021-11-17 13:57:28'),
(0, 115, 0, '2021-11-17 20:08:53'),
(0, 116, 0, '2021-11-17 20:13:08'),
(0, 117, 3100, '2021-11-17 20:18:40'),
(0, 118, 2800, '2021-11-17 22:07:42'),
(0, 119, 4700, '2021-11-22 14:20:09'),
(0, 120, 2200, '2021-11-22 14:21:23'),
(0, 121, 0, '2021-11-22 14:40:59'),
(0, 122, 2750, '2021-11-22 14:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `venta_detalle`
--

CREATE TABLE `venta_detalle` (
  `ventaID` int(11) NOT NULL,
  `productoID` int(11) NOT NULL,
  `ventaCantidad` int(11) NOT NULL,
  `ventaPrecio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venta_detalle`
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
(98, 0, 2, 550),
(101, 0, 4, 550),
(105, 0, 4, 550),
(105, 3, 1, 260),
(107, 0, 4, 550),
(107, 2, 1, 230),
(117, 1, 5, 300),
(117, 2, 2, 230),
(117, 4, 1, 250),
(117, 5, 1, 890),
(118, 0, 3, 550),
(118, 3, 1, 260),
(118, 5, 1, 890),
(119, 0, 6, 550),
(119, 3, 1, 260),
(119, 4, 1, 250),
(119, 5, 1, 890),
(120, 0, 4, 550),
(122, 0, 5, 550);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`productoID`) USING BTREE;

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`ventaID`);

--
-- Indexes for table `venta_detalle`
--
ALTER TABLE `venta_detalle`
  ADD PRIMARY KEY (`ventaID`,`productoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `venta`
--
ALTER TABLE `venta`
  MODIFY `ventaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
