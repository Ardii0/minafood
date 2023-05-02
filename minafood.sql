/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.29 : Database - minafood
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`minafood` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `minafood`;

/*Table structure for table `beli_langsung` */

DROP TABLE IF EXISTS `beli_langsung`;

CREATE TABLE `beli_langsung` (
  `id_user` int DEFAULT NULL,
  `id_produk` int DEFAULT NULL,
  `jumlah` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `beli_langsung` */

insert  into `beli_langsung`(`id_user`,`id_produk`,`jumlah`) values 
(2,1,1);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`,`created_at`) values 
(1,'Predator','2023-04-30 22:49:21');

/*Table structure for table `kontak` */

DROP TABLE IF EXISTS `kontak`;

CREATE TABLE `kontak` (
  `id_kontak` int NOT NULL DEFAULT '1',
  `alamat` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_fax` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `maps_iframe` text COLLATE utf8mb4_general_ci NOT NULL,
  `livechat_api` text COLLATE utf8mb4_general_ci NOT NULL,
  `whatsapp_number` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `facebook_url` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `instagram_url` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `twitter_url` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kontak` */

insert  into `kontak`(`id_kontak`,`alamat`,`no_telp`,`no_fax`,`email`,`maps_iframe`,`livechat_api`,`whatsapp_number`,`facebook_url`,`instagram_url`,`twitter_url`) values 
(1,'Jl. Kokrosono No.70, Bulu Lor, Kec. Semarang Utara, Kota Semarang, Jawa Tengah 50179','(024)111','','kontak@smk-pws.sch.id','','','08112881800','https://www.facebook.com/','https://www.instagram.com/','https://twitter.com/');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL AUTO_INCREMENT,
  `id_produk` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `kode_pembayaran` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `subtotal` int DEFAULT NULL,
  `status` enum('Telah Dikonfirmasi','Belum Dikonfirmasi') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Belum Dikonfirmasi',
  `date` date DEFAULT NULL,
  `detail_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pembayaran` */

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_produk` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_kategori` int DEFAULT NULL,
  `id_tipe` int DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `foto` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `produk` */

insert  into `produk`(`id_produk`,`kode_produk`,`nama_produk`,`id_kategori`,`id_tipe`,`harga`,`stok`,`deskripsi`,`foto`,`created_at`) values 
(1,'PDK-LWBISRV','Piranha',1,2,250000,2,'Contoh Deskripsi','piranha.jpg','2023-05-01 01:21:40'),
(2,'PDK-ADADADA','Piranha ke 2',1,2,250000,2,'<p><em><strong>Contoh</strong></em><strong><em> Desk</em>ripsi<s> ada egege</s></strong></p>\r\n','','2023-05-01 01:21:40'),
(3,'PDK-022EGWJ','Ikan Lele',1,2,20000,18,'ada','','2023-05-01 16:05:37'),
(4,'PDK-4HUC2UE','tes',1,1,20000,2,'<p>tes</p>\r\n',NULL,'2023-05-02 13:38:26'),
(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-02 15:10:07'),
(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-02 15:14:01'),
(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-02 15:14:05'),
(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-02 15:15:31'),
(9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-02 15:16:25');

/*Table structure for table `tipe` */

DROP TABLE IF EXISTS `tipe`;

CREATE TABLE `tipe` (
  `id_tipe` int NOT NULL AUTO_INCREMENT,
  `nama_tipe` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tipe`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tipe` */

insert  into `tipe`(`id_tipe`,`nama_tipe`,`created_at`) values 
(1,'Tipe','2023-04-30 22:49:27'),
(2,'Tipe2','2023-05-01 02:27:26');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id_user`,`username`,`email`,`password`,`role`,`foto`) values 
(1,'Admin','admin@gmail.com','$2y$12$iyU4JEh/Dp2K/KC8pRN.UeCc1zuTsY7CdFxCxaHHmFTC6dtppb5Ni','Admin',NULL),
(2,'ada','ada@ada.com','$2y$12$xlS4vuGOJCcysYmZ/FKEf.1MnKW0jqACCpoTwWBREXq8s1mHgiaFC','User',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
