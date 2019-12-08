-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.8-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5728
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para pos
CREATE DATABASE IF NOT EXISTS `pos` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pos`;

-- Volcando estructura para tabla pos.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla pos.categorias: ~5 rows (aproximadamente)
DELETE FROM `categorias`;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
	(1, 'EQUIPOS ELECTROMECÁNICOS', '2019-12-08 01:38:38'),
	(2, 'TALADROS', '2019-12-07 23:53:31'),
	(3, 'ANDAMIOS', '2019-12-08 01:38:54'),
	(4, 'GENERADORES DE ENERGÍA', '2019-12-08 00:00:28'),
	(5, 'EQUIPOS PARA CONSTRUCCIÓN', '2019-12-08 02:11:44');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla pos.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla pos.usuarios: ~5 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
	(1, 'admin', 'admin', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'Administrador', 'views/img/usuarios/admin/541.png', 1, NULL, '2019-12-06 18:32:06'),
	(2, 'Jhon Fabio Cardona Martinez', 'jhonfa', '$2a$07$asxx54ahjppf45sd87a5aumRswFULxE51AMaEjev/Dl9HSOynLXUm', 'Administrador', 'views/img/usuarios/jhonfa/832.png', 1, '2019-12-07 22:34:26', '2019-12-07 22:34:26'),
	(3, 'Elisa Mariana', 'mariana', '$2a$07$asxx54ahjppf45sd87a5auu/OFjB9yXQrd.8XPXdnPIy9tbm/VjVS', 'Vendedor', 'views/img/usuarios/mariana/149.jpg', 1, NULL, '2019-12-06 18:32:07'),
	(4, 'Usuario de Prueba', 'prueba', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Especial', 'views/img/usuarios/prueba/904.jpg', 1, NULL, '2019-12-06 18:32:08'),
	(5, 'prueba2', 'prueba2', '$2a$07$asxx54ahjppf45sd87a5auHZPYySdWSMpJQy0/17lrojl4DUlQYIi', 'Vendedor', 'views/img/usuarios/prueba2/881.png', 0, NULL, '2019-12-06 18:32:32');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
