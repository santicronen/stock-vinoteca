-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.18-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para vinoteca
CREATE DATABASE IF NOT EXISTS `vinoteca` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `vinoteca`;

-- Volcando estructura para tabla vinoteca.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `empresaID` int(11) NOT NULL,
  `empresaNombre` varchar(50) NOT NULL DEFAULT '',
  `productoID` int(11) NOT NULL DEFAULT 0,
  `tipoID` int(11) NOT NULL DEFAULT 0 COMMENT 'Codigo de tipo de producto',
  PRIMARY KEY (`empresaID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla vinoteca.empresa: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
REPLACE INTO `empresa` (`empresaID`, `empresaNombre`, `productoID`, `tipoID`) VALUES
	(0, 'Branca', 0, 0),
	(1, 'Coca-Cola', 0, 1);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

-- Volcando estructura para tabla vinoteca.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `productoID` int(20) NOT NULL,
  `productoNombre` varchar(50) DEFAULT NULL,
  `empresaID` int(20) DEFAULT NULL COMMENT 'Código de empresa de producto',
  `productoCosto` float DEFAULT NULL,
  `productoPrecio` float DEFAULT NULL,
  `productoStock` int(11) DEFAULT NULL,
  PRIMARY KEY (`productoID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla vinoteca.producto: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
REPLACE INTO `producto` (`productoID`, `productoNombre`, `empresaID`, `productoCosto`, `productoPrecio`, `productoStock`) VALUES
	(0, 'Fernet Branca 750cc', 0, 300, 500, 50),
	(1, 'Portillo Malbec 750cc', 1, 150, 250, 20),
	(2, 'Cinzano Rosso 750cc', 0, 170, 230, 10),
	(3, 'Coca Cola 2.25L', 0, 150, 260, 50),
	(4, 'Portillo Cabernet 750cc', 1, 150, 250, 20);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla vinoteca.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `proveedorID` int(11) NOT NULL,
  `proveedorNombre` varchar(50) NOT NULL DEFAULT '',
  `proveedorFlete` int(11) NOT NULL DEFAULT 0 COMMENT 'Costo del flete por proveedor',
  `tipoID` int(11) NOT NULL DEFAULT 0 COMMENT 'ID del tipo de proveedor',
  PRIMARY KEY (`proveedorID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla vinoteca.proveedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
REPLACE INTO `proveedor` (`proveedorID`, `proveedorNombre`, `proveedorFlete`, `tipoID`) VALUES
	(0, 'Branca', 500, 0);
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla vinoteca.tipo_producto
CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `tipoID` int(11) NOT NULL COMMENT 'ID de tipo de producto',
  `tipoDesc` varchar(50) NOT NULL DEFAULT '0' COMMENT 'Descripción de tipo de producto',
  PRIMARY KEY (`tipoID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla vinoteca.tipo_producto: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_producto` DISABLE KEYS */;
REPLACE INTO `tipo_producto` (`tipoID`, `tipoDesc`) VALUES
	(0, 'Vino'),
	(1, 'Bebida'),
	(2, 'Gaseosa'),
	(3, 'Vermouth');
/*!40000 ALTER TABLE `tipo_producto` ENABLE KEYS */;

-- Volcando estructura para tabla vinoteca.venta
CREATE TABLE IF NOT EXISTS `venta` (
  `productoID` int(11) NOT NULL,
  `ventaID` int(11) NOT NULL,
  `ventaTotal` float NOT NULL DEFAULT 0 COMMENT 'Total $$$ de una venta',
  `ventaFecha` date NOT NULL,
  PRIMARY KEY (`productoID`,`ventaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla vinoteca.venta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;

-- Volcando estructura para tabla vinoteca.venta_detalle
CREATE TABLE IF NOT EXISTS `venta_detalle` (
  `detalleID` int(11) NOT NULL,
  `productoID` int(11) NOT NULL,
  `ventaID` int(11) NOT NULL,
  `ventaCantidad` int(11) NOT NULL,
  `ventaPrecio` int(11) NOT NULL,
  PRIMARY KEY (`detalleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla vinoteca.venta_detalle: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `venta_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta_detalle` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
