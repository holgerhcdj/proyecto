-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla proyecto.almacen
CREATE TABLE IF NOT EXISTS `almacen` (
  `pst_id` int(11) NOT NULL AUTO_INCREMENT,
  `pst_razon_social` varchar(100) COLLATE utf32_spanish_ci NOT NULL,
  `pst_rep_legal` varchar(100) COLLATE utf32_spanish_ci NOT NULL,
  `pst_direccion` varchar(100) COLLATE utf32_spanish_ci NOT NULL,
  `pst_telefono` varchar(100) COLLATE utf32_spanish_ci NOT NULL,
  PRIMARY KEY (`pst_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- Volcando datos para la tabla proyecto.almacen: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `almacen` DISABLE KEYS */;
INSERT INTO `almacen` (`pst_id`, `pst_razon_social`, `pst_rep_legal`, `pst_direccion`, `pst_telefono`) VALUES
	(1, 'Informática y más', 'Juan Perez', 'Guamani Vida Nueva', '099999978');
/*!40000 ALTER TABLE `almacen` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.facturas
CREATE TABLE IF NOT EXISTS `facturas` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_id` int(11) NOT NULL,
  `pst_id` int(11) NOT NULL,
  `fac_numero_facturas` int(11) NOT NULL,
  `fac_fecha` date NOT NULL,
  `fac_iva` float NOT NULL DEFAULT '0',
  `fac_descuento` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`fac_id`),
  KEY `per_id` (`per_id`),
  KEY `pas_id` (`pst_id`),
  CONSTRAINT `flo_id` FOREIGN KEY (`pst_id`) REFERENCES `almacen` (`pst_id`),
  CONSTRAINT `per_id` FOREIGN KEY (`per_id`) REFERENCES `personas` (`per_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- Volcando datos para la tabla proyecto.facturas: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
INSERT INTO `facturas` (`fac_id`, `per_id`, `pst_id`, `fac_numero_facturas`, `fac_fecha`, `fac_iva`, `fac_descuento`) VALUES
	(14, 5, 1, 2, '2021-06-19', 1, 2),
	(15, 6, 1, 3, '2021-06-19', 0, 0),
	(16, 6, 1, 4, '2021-06-20', 1, 5),
	(17, 1, 1, 5, '2022-06-17', 0, 0),
	(18, 1, 1, 6, '2022-06-17', 0, 0),
	(19, 1, 1, 7, '2022-06-17', 1, 0);
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.facturas_detalles
CREATE TABLE IF NOT EXISTS `facturas_detalles` (
  `fade_id` int(11) NOT NULL AUTO_INCREMENT,
  `fac_id` int(11) NOT NULL,
  `pas_id` int(11) NOT NULL,
  `fade_cant` int(11) NOT NULL,
  `fade_vu` int(11) NOT NULL,
  PRIMARY KEY (`fade_id`),
  KEY `pas_id` (`pas_id`),
  KEY `fac_id` (`fac_id`),
  CONSTRAINT `FK_facturas_detalles_pasteles` FOREIGN KEY (`pas_id`) REFERENCES `productos` (`pas_id`),
  CONSTRAINT `fk_reference_2` FOREIGN KEY (`fac_id`) REFERENCES `facturas` (`fac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- Volcando datos para la tabla proyecto.facturas_detalles: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `facturas_detalles` DISABLE KEYS */;
INSERT INTO `facturas_detalles` (`fade_id`, `fac_id`, `pas_id`, `fade_cant`, `fade_vu`) VALUES
	(18, 14, 8, 1, 10),
	(19, 14, 9, 2, 8),
	(20, 15, 8, 10, 9),
	(21, 15, 9, 5, 7),
	(22, 16, 8, 2, 8),
	(24, 16, 9, 5, 8),
	(25, 17, 8, 1, 2),
	(26, 18, 8, 1, 2),
	(27, 18, 9, 2, 70),
	(29, 19, 9, 5, 75);
/*!40000 ALTER TABLE `facturas_detalles` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.migrations: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_cedula` varchar(100) COLLATE utf32_spanish_ci DEFAULT NULL,
  `per_apellidos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_nombres` varchar(255) COLLATE utf32_spanish_ci DEFAULT NULL,
  `per_direccion` varchar(255) COLLATE utf32_spanish_ci DEFAULT NULL,
  `per_telefono` varchar(255) COLLATE utf32_spanish_ci DEFAULT NULL,
  `per_fecha_nacimiento` date DEFAULT NULL,
  `per_estado_civil` varchar(255) COLLATE utf32_spanish_ci DEFAULT NULL,
  `per_sexo` varchar(255) COLLATE utf32_spanish_ci DEFAULT NULL,
  `per_usuario` varchar(255) COLLATE utf32_spanish_ci DEFAULT NULL,
  `per_tipo` varchar(255) COLLATE utf32_spanish_ci DEFAULT NULL,
  `per_estado` int(11) DEFAULT '1',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- Volcando datos para la tabla proyecto.personas: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` (`per_id`, `per_cedula`, `per_apellidos`, `per_nombres`, `per_direccion`, `per_telefono`, `per_fecha_nacimiento`, `per_estado_civil`, `per_sexo`, `per_usuario`, `per_tipo`, `per_estado`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `updated_at`, `created_at`) VALUES
	(1, '1234567890', 'Perez', 'Juan', 'quito', '5555555', '2021-06-19', 'Soltero', 'HOMBRE', 'admin', 'A', 1, 'Perez Juan', 'admin@gmail.com', NULL, '$2y$10$s1boa5CeN/Mmw.2DKhKrWuPMfupdeC8JCIyH6Ts2xvsWqG57zp5le', NULL, '2022-06-17 17:37:22', '2021-05-20 20:17:38'),
	(5, '65465465', 'Morales', 'Jorge', 'Guamani', '099999888', '2021-06-19', 'Soltero', 'HOMBRE', 'adm', 'C', 1, 'Morales Jorge', 'adm2@g.com', NULL, '$2y$10$8J6CcgQYCFw3PxMiV8BqAe2ap1jokz4HoqRsJPERLQyRK81tsFAr6', NULL, '2021-06-19 21:19:43', '2021-06-19 21:18:12'),
	(6, '98798798798', 'De la torre', 'Juan', 'Guamani', '099999888', '2021-06-19', 'Casado', 'HOMBRE', 'jorge', 'V', 1, 'De la torre Juan', 'jorge@g.com', NULL, '$2y$10$VdxgUfJlgWpF8AIzhTMMw.lpO.4l4ewI5NMFgeweshvZ9YZZtcAai', NULL, '2021-06-19 21:20:33', '2021-06-19 21:20:33');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `pas_id` int(11) NOT NULL AUTO_INCREMENT,
  `tip_id` int(11) NOT NULL,
  `pas_nombre` varchar(50) COLLATE utf32_spanish_ci NOT NULL,
  `pas_descripcion` varchar(250) COLLATE utf32_spanish_ci NOT NULL,
  `pas_precio` int(11) NOT NULL,
  `pas_estado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pas_id`),
  KEY `pas_tipo` (`tip_id`),
  CONSTRAINT `FK_pasteles_tipos` FOREIGN KEY (`tip_id`) REFERENCES `tipos` (`tip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- Volcando datos para la tabla proyecto.productos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`pas_id`, `tip_id`, `pas_nombre`, `pas_descripcion`, `pas_precio`, `pas_estado`) VALUES
	(8, 2, 'SAMSUNG DE 20 PULGADAS', 'MONITOR DE 20 PULGADAS COLOR NEGRO MARCA SAMSUNG LED', 100, 1),
	(9, 3, 'H61 LGA 1155 3RA GENERACION', 'MANBORAD LGA BIOSTAR H61 3ERA GEN SERIE B-2020212', 75, 1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.tipos
CREATE TABLE IF NOT EXISTS `tipos` (
  `tip_id` int(11) NOT NULL AUTO_INCREMENT,
  `tip_descripcion` varchar(50) NOT NULL DEFAULT '',
  `tip_estado` int(11) NOT NULL DEFAULT '0',
  `tip_fecha` date DEFAULT NULL,
  PRIMARY KEY (`tip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla proyecto.tipos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
INSERT INTO `tipos` (`tip_id`, `tip_descripcion`, `tip_estado`, `tip_fecha`) VALUES
	(2, 'MONITORES', 1, NULL),
	(3, 'MAINBOARDS', 1, NULL),
	(4, 'LAPTOPS', 1, NULL),
	(5, 'DISCOS DUROS', 1, NULL),
	(6, 'PROCESADORES', 1, NULL);
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
