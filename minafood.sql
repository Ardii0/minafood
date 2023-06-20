/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - minafood
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

/*Table structure for table `alamat` */

DROP TABLE IF EXISTS `alamat`;

CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nama_penerima` varchar(50) DEFAULT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `prioritas` enum('Utama','Samping') DEFAULT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `alamat` */

insert  into `alamat`(`id_alamat`,`id_user`,`nama_penerima`,`nomor_hp`,`kota`,`alamat`,`kode_pos`,`prioritas`) values 
(1,3,'Ahmad Subardjo','089495959','Semarang','Jl. Hasanudin 05 RT/RW 09/09',1312,NULL),
(2,2,'Ahmadun','082392332','Semarang','Jl. Pemuda Panjangan Raya RT09/R02',17738,NULL);

/*Table structure for table `beli_langsung` */

DROP TABLE IF EXISTS `beli_langsung`;

CREATE TABLE `beli_langsung` (
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `beli_langsung` */

insert  into `beli_langsung`(`id_user`,`id_produk`,`jumlah`) values 
(1,1,1),
(2,1,1);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`,`created_at`) values 
(1,'Predator','2023-04-30 22:49:21');

/*Table structure for table `keranjang` */

DROP TABLE IF EXISTS `keranjang`;

CREATE TABLE `keranjang` (
  `id_keranjang` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_produk` int DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  PRIMARY KEY (`id_keranjang`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `keranjang` */

insert  into `keranjang`(`id_keranjang`,`id_user`,`id_produk`,`jumlah`) values 
(1,2,1,1);

/*Table structure for table `kontak` */

DROP TABLE IF EXISTS `kontak`;

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL DEFAULT 1,
  `alamat` varchar(200) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `no_fax` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `maps_iframe` text NOT NULL,
  `livechat_api` text NOT NULL,
  `whatsapp_number` varchar(30) NOT NULL,
  `facebook_url` varchar(200) NOT NULL,
  `instagram_url` varchar(200) NOT NULL,
  `twitter_url` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kontak` */

insert  into `kontak`(`id_kontak`,`alamat`,`no_telp`,`no_fax`,`email`,`maps_iframe`,`livechat_api`,`whatsapp_number`,`facebook_url`,`instagram_url`,`twitter_url`) values 
(1,'Jl. Kokrosono No.70, Bulu Lor, Kec. Semarang Utara, Kota Semarang, Jawa Tengah 50179','(024)111','','kontak@smk-pws.sch.id','','','08112881800','https://www.facebook.com/','https://www.instagram.com/','https://twitter.com/');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pembayaran` varchar(50) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `id_alamat` int(11) DEFAULT NULL,
  `status` enum('Telah Dikonfirmasi','Belum Dikonfirmasi') DEFAULT 'Belum Dikonfirmasi',
  `bukti_pembayaran` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `detail_waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_konfirmasi` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id_pembayaran`,`kode_pembayaran`,`id_produk`,`id_user`,`jumlah`,`subtotal`,`id_alamat`,`status`,`bukti_pembayaran`,`date`,`detail_waktu`,`waktu_konfirmasi`) values 
(1,'230502FIF2F23J',1,2,1,NULL,NULL,'Telah Dikonfirmasi',NULL,'2023-05-02','2023-05-03 01:12:21',NULL),
(3,'2305022WBBTRRT',1,2,1,NULL,NULL,'',NULL,'2023-05-02','2023-05-03 01:19:05',NULL),
(4,'23050299N23F8X',1,2,1,NULL,NULL,'Belum Dikonfirmasi',NULL,'2023-05-02','2023-05-03 01:19:08',NULL),
(5,'2305025CGRJJTQ',1,2,1,12500,NULL,'Belum Dikonfirmasi','Screenshot_(56).png','2023-05-02','2023-05-03 01:26:28','2023-05-03 18:25:54'),
(6,'230502SL7U4WBO',1,2,1,250000,NULL,'Belum Dikonfirmasi',NULL,'2023-05-02','2023-05-03 01:30:13',NULL),
(7,'230502NWUB87G4',1,2,1,NULL,NULL,'Belum Dikonfirmasi',NULL,'2023-05-02','2023-05-03 01:30:59',NULL),
(8,'23050280WM8LVM',1,2,2,NULL,NULL,'Belum Dikonfirmasi',NULL,'2023-05-02','2023-05-03 01:32:11',NULL),
(9,'23050280weqLVM',1,2,1,NULL,NULL,'',NULL,'2023-05-02','2023-05-03 01:32:55',NULL),
(10,'230502C1JJGZJZ',1,2,1,NULL,0,'Telah Dikonfirmasi',NULL,'2023-05-02','2023-05-03 01:34:57',NULL),
(11,'230502HREN5CG8',1,2,1,NULL,1,'',NULL,'2023-05-02','2023-05-03 01:35:09',NULL),
(12,'230502S8LC5QXC',1,2,1,250000,1,'',NULL,'2023-05-02','2023-05-03 01:39:05',NULL),
(13,'2305027UA1NH5X',1,2,2,500000,1,'',NULL,'2023-05-02','2023-05-03 01:39:19',NULL),
(14,'2305025STLOORB',1,2,1,250000,1,'',NULL,'2023-05-02','2023-05-03 02:01:09',NULL),
(15,'230502LQ1A9VAL',1,2,1,250000,1,'Belum Dikonfirmasi',NULL,'2023-05-02','2023-05-03 02:08:15',NULL),
(16,'230502JRORMC0U',1,2,1,250000,1,'Telah Dikonfirmasi',NULL,'2023-05-02','2023-05-03 02:08:54','2023-05-03 08:57:06'),
(17,'2305024M9292IR',2,2,NULL,0,NULL,'Telah Dikonfirmasi',NULL,'2023-05-02','2023-05-03 02:14:44','2023-05-03 06:04:10'),
(18,'230502HWAQ9YJC',3,2,NULL,0,NULL,'Belum Dikonfirmasi',NULL,'2023-05-02','2023-05-03 02:15:14',NULL),
(19,'230502KO5O1C31',4,2,NULL,0,NULL,'Belum Dikonfirmasi',NULL,'2023-05-02','2023-05-03 02:16:27',NULL),
(20,'23050204VENWDY',1,2,1,250000,1,'Belum Dikonfirmasi',NULL,'2023-05-02','2023-05-03 02:16:54',NULL),
(21,'230502LK37RGCQ',1,2,1,250000,1,'Belum Dikonfirmasi',NULL,'2023-05-02','2023-05-03 02:19:09',NULL),
(22,'230502ROQYCP8B',1,2,2,500000,1,'Belum Dikonfirmasi',NULL,'2023-05-02','2023-05-03 02:20:39',NULL),
(23,'230502ZBNR1GYW',1,2,1,250000,1,'Belum Dikonfirmasi',NULL,'2023-05-02','2023-05-03 02:23:39',NULL),
(24,'230503W1UWEJBF',1,3,2,500000,1,'Belum Dikonfirmasi','qrcode_meet_google_com.png','2023-05-03','2023-05-03 13:53:56',NULL),
(25,'2305039AFPKO01',1,2,2,500000,1,'Telah Dikonfirmasi','qrcode_meet_google_com1.png','2023-05-03','2023-05-03 13:55:57','2023-05-04 11:46:37'),
(26,'230506K1FS1UOO',1,2,1,250000,1,'Belum Dikonfirmasi','piranha.jpg','2023-05-06','2023-05-06 16:30:17',NULL);

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(30) DEFAULT NULL,
  `nama_produk` varchar(30) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `produk` */

insert  into `produk`(`id_produk`,`kode_produk`,`nama_produk`,`id_kategori`,`id_tipe`,`harga`,`stok`,`deskripsi`,`foto`,`created_at`) values 
(1,'PDK-LWBISRV','Piranha',1,2,250000,1,'Contoh Deskripsi','piranha.jpg','2023-05-01 01:21:40'),
(2,'PDK-ADADADA','Piranha ke 2',1,2,250000,NULL,'<p><em><strong>Contoh</strong></em><strong><em> Desk</em>ripsi<s> ada egege</s></strong></p>\r\n','','2023-05-01 01:21:40'),
(3,'PDK-022EGWJ','Ikan Lele',1,2,20000,NULL,'ada','','2023-05-01 16:05:37'),
(4,'PDK-4HUC2UE','tes',1,1,20000,NULL,'<p>tes</p>\r\n',NULL,'2023-05-02 13:38:26'),
(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-02 15:10:07'),
(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-02 15:14:01'),
(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-02 15:14:05'),
(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-02 15:15:31'),
(9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-02 15:16:25');

/*Table structure for table `tipe` */

DROP TABLE IF EXISTS `tipe`;

CREATE TABLE `tipe` (
  `id_tipe` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tipe` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_tipe`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tipe` */

insert  into `tipe`(`id_tipe`,`nama_tipe`,`created_at`) values 
(1,'Tipe','2023-04-30 22:49:27'),
(2,'Tipe2','2023-05-01 02:27:26');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(11) NOT NULL,
  `foto` text DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id_user`,`username`,`email`,`password`,`role`,`foto`) values 
(1,'Admin','admin@gmail.com','$2y$12$iyU4JEh/Dp2K/KC8pRN.UeCc1zuTsY7CdFxCxaHHmFTC6dtppb5Ni','Admin',NULL),
(2,'ada','ada@ada.com','$2y$12$xlS4vuGOJCcysYmZ/FKEf.1MnKW0jqACCpoTwWBREXq8s1mHgiaFC','User','tokped.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
