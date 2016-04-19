/*
SQLyog Enterprise - MySQL GUI v7.12 
MySQL - 5.6.17 : Database - angcrud
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`angcrud` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `angcrud`;

/*Table structure for table `tbl_contacts` */

DROP TABLE IF EXISTS `tbl_contacts`;

CREATE TABLE `tbl_contacts` (
  `cnt_id` int(11) NOT NULL AUTO_INCREMENT,
  `cnt_fname` varchar(100) DEFAULT NULL,
  `cnt_place` varchar(100) DEFAULT NULL,
  `cnt_phone` varchar(30) DEFAULT NULL,
  `cnt_email` varchar(100) DEFAULT NULL,
  `cnt_gender` varchar(9) DEFAULT NULL,
  `cnt_deleted` tinyint(4) DEFAULT '0',
  UNIQUE KEY `cnt_id` (`cnt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_contacts` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
