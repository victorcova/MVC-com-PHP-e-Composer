/*
SQLyog Community v13.1.4  (64 bit)
MySQL - 10.4.24-MariaDB : Database - cursomvc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cursomvc` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `cursomvc`;

/*Table structure for table `tb_person` */

DROP TABLE IF EXISTS `tb_person`;

CREATE TABLE `tb_person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)  
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_person` */

insert  into `tb_person`(`id`,`nome`,`email`) values 
(1,'Emanuella Marques','manu.unam@popi.ls'),
(2,'Gustavo Henrique','ghsouza@bmail.com.br'),
(3,'Michelle Gozzi','michelle.agp@agp.com.vr'),
(4,'Letícia Sampaio','letss@letss.com.br'),
(5,'Abner Mathias','abner.mabreu@mabreu.com'),
(6,'Zander Paulo','zander.pcs@minicom.com.xr'),
(7,'Monica Sanchez','msanches@mmart.com.nn');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
