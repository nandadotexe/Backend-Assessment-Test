/*
SQLyog Ultimate v10.41 
MySQL - 5.5.16 : Database - db_food_delivery
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_food_delivery` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `db_food_delivery`;

/*Table structure for table `api` */

DROP TABLE IF EXISTS `api`;

CREATE TABLE `api` (
  `cd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_expired` date DEFAULT NULL,
  PRIMARY KEY (`cd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `api` */

insert  into `api`(`cd`,`key`,`date_created`,`date_expired`) values ('API','R4H4514','2018-01-05','2018-01-31');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `password` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_active` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `customer` */

insert  into `customer`(`id_customer`,`cust_name`,`phone_number`,`email`,`address`,`password`,`st_active`) values (1,'Miftakhurrokhmat','+6285729300019','dmasmiv@gmail.com',NULL,'0860dfc81a442d5c5623','1');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_food` double DEFAULT NULL,
  `st_active` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `seller_id` (`seller_id`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id_seller`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `menu` */

insert  into `menu`(`id_menu`,`seller_id`,`menu_name`,`price_food`,`st_active`) values (1,1,'Ayam Goreng',20000,'1'),(2,1,'Nasi Goreng',15000,'1');

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `date_order` datetime DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_order`),
  KEY `customer_id` (`customer_id`),
  KEY `seller_id` (`seller_id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `order_ibfk_3` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id_menu`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id_customer`),
  CONSTRAINT `order_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id_seller`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `order` */

insert  into `order`(`id_order`,`date_order`,`customer_id`,`seller_id`,`menu_id`,`price`,`qty`) values (1,'2018-01-05 19:41:40',1,1,1,20000,2),(2,'2018-01-05 19:42:02',1,1,2,15000,1);

/*Table structure for table `seller` */

DROP TABLE IF EXISTS `seller`;

CREATE TABLE `seller` (
  `id_seller` int(11) NOT NULL AUTO_INCREMENT,
  `seller_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_active` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_seller`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `seller` */

insert  into `seller`(`id_seller`,`seller_name`,`phone_number`,`email`,`password`,`st_active`) values (1,'Berkah Food','+6285729300073','berkahfood@gmail.com','bc916cec2c4da86bf2d7','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
