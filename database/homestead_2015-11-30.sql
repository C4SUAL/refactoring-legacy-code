# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.7.9)
# Database: homestead
# Generation Time: 2015-11-30 14:02:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `session_id` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_town` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_postcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `delivery_total` decimal(10,2) NOT NULL,
  `tax_total` decimal(10,2) NOT NULL,
  `discount_total` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table cart_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cart_items`;

CREATE TABLE `cart_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` mediumint(9) NOT NULL,
  `vat_rate` decimal(5,2) DEFAULT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `short_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mpn` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `vat_rate_id` int(10) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `manage_stock` tinyint(1) NOT NULL DEFAULT '0',
  `stock_status` tinyint(1) NOT NULL DEFAULT '1',
  `stock_qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_sku_unique` (`sku`),
  UNIQUE KEY `products_url_unique` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `sku`, `name`, `short_description`, `description`, `mpn`, `brand`, `price`, `sale_price`, `vat_rate_id`, `url`, `image`, `enabled`, `manage_stock`, `stock_status`, `stock_qty`, `created_at`, `updated_at`)
VALUES
	(1,'OAKLEY01','Racing Jacket Sunglasses','The Racing Jacket features a quick and simple Switchlock™ Technology which is perfect to change between the two sets of lenses that are included (one for bright light and one for low light).','<p>This is eyewear that craves the chaos of action sports, especially with protection that meets ANSI Z87.1 standards for high velocity and high mass impact. You can switch to a new lens set quickly, and while the lenses are securely mounted, there are no','','Oakley',180.00,NULL,1,'racing-jacket-sunglasses','OAKLEY01.jpg',1,1,1,150,'2015-11-30 00:55:29','2015-11-30 00:55:29'),
	(2,'OAKLEY02','Radarlock Path Sunglasses','Oakleys Radarlock Path sunglasses are the ultimate cycling performance product as used by the majority of riders and teams in racing.','<p>Whether you’re competing for Gold or just squeezing every ounce of possibility out of those prized moments of athletic escape, you’re either wearing RadarLock™ or wishing you were. If you haven’t heard about Oakley Switchlock Technology, you’re wasting','','Oakley',195.00,NULL,1,'radarlock-path-sunglasses','OAKLEY02.jpg',1,1,1,150,'2015-11-30 00:55:29','2015-11-30 00:55:29'),
	(3,'OAKLEY03','Flak Jacket XLJ Sunglasses','Oakleys Flak Jacket XLJ are a semi-rimless design which means there’s no frame rim to block downward view when riding and XYZ Optics® extends razor-sharp vision in a wider peripehery than many other sunglasses.','<p>Sport professionals demand nothing less than the best, and Oakley has answered their challenge for decades. World-class athletes have driven the to create innovation after innovation, including interchangeable lens designs with unbeatable optical clari','','Oakley',130.00,NULL,1,'oakley-flak-jacket-xlj-sunglasses','OAKLEY03.jpg',1,1,1,150,'2015-11-30 00:55:29','2015-11-30 00:55:29');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vat_rates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vat_rates`;

CREATE TABLE `vat_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `vat_rates` WRITE;
/*!40000 ALTER TABLE `vat_rates` DISABLE KEYS */;

INSERT INTO `vat_rates` (`id`, `created_at`, `updated_at`, `name`, `rate`)
VALUES
	(1,'2015-11-27 00:29:54','2015-11-27 00:29:54','Standard UK VAT 20%',20.00);

/*!40000 ALTER TABLE `vat_rates` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
