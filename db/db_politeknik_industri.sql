/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.16 : Database - db_politeknik_industri
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tb_pegawai` */

DROP TABLE IF EXISTS `tb_pegawai`;

CREATE TABLE `tb_pegawai` (
  `idpegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `alamat` varchar(900) DEFAULT NULL,
  PRIMARY KEY (`idpegawai`),
  UNIQUE KEY `nik` (`nik`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pegawai` */

insert  into `tb_pegawai`(`idpegawai`,`nik`,`nama`,`password`,`email`,`jabatan`,`alamat`) values (1,'123','Antoni','123','antoni@gmail.com','Staf','Semarang');

/*Table structure for table `tb_pengajuan` */

DROP TABLE IF EXISTS `tb_pengajuan`;

CREATE TABLE `tb_pengajuan` (
  `idpengajuan` int(11) NOT NULL AUTO_INCREMENT,
  `tujuan` varchar(700) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `totalbiaya` int(11) DEFAULT NULL,
  `statuspengajuan` varchar(100) DEFAULT NULL,
  `statusorder` varchar(100) DEFAULT 'Persiapan Order',
  `komentar` text,
  `idpegawai` int(11) DEFAULT NULL,
  `datafile` varchar(100) DEFAULT NULL,
  `is_pengajuan` varchar(1) DEFAULT NULL,
  `is_order` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idpengajuan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pengajuan` */

insert  into `tb_pengajuan`(`idpengajuan`,`tujuan`,`tanggal`,`totalbiaya`,`statuspengajuan`,`statusorder`,`komentar`,`idpegawai`,`datafile`,`is_pengajuan`,`is_order`) values (1,'Pengadaan Komputer','2022-10-02',10000000,'Diterima','Persiapan Order','-',1,'1664722483.PNG',NULL,NULL);

/*Table structure for table `tb_pengguna` */

DROP TABLE IF EXISTS `tb_pengguna`;

CREATE TABLE `tb_pengguna` (
  `idpengguna` int(11) NOT NULL AUTO_INCREMENT,
  `namapengguna` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idpengguna`),
  UNIQUE KEY `USERNAME` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pengguna` */

insert  into `tb_pengguna`(`idpengguna`,`namapengguna`,`username`,`password`) values (1,'admin123','admin123','admin123');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
