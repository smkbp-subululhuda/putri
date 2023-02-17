-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for putri
CREATE DATABASE IF NOT EXISTS `putri` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `putri`;

-- Dumping structure for table putri.asrama
CREATE TABLE IF NOT EXISTS `asrama` (
  `id_asrama` int(1) NOT NULL AUTO_INCREMENT,
  `nama_asrama` varchar(30) NOT NULL,
  PRIMARY KEY (`id_asrama`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table putri.asrama: ~5 rows (approximately)
/*!40000 ALTER TABLE `asrama` DISABLE KEYS */;
INSERT INTO `asrama` (`id_asrama`, `nama_asrama`) VALUES
	(1, 'Aisyah'),
	(2, 'Fatimah'),
	(3, 'Firdaus'),
	(4, 'Umar'),
	(5, 'Aly');
/*!40000 ALTER TABLE `asrama` ENABLE KEYS */;

-- Dumping structure for table putri.data_santri
CREATE TABLE IF NOT EXISTS `data_santri` (
  `id_santri` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(6) NOT NULL,
  `nama_santri` varchar(50) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `id_asrama` int(1) NOT NULL,
  PRIMARY KEY (`id_santri`),
  KEY `FK_data_santri_asrama` (`id_asrama`),
  CONSTRAINT `FK_data_santri_asrama` FOREIGN KEY (`id_asrama`) REFERENCES `asrama` (`id_asrama`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table putri.data_santri: ~7 rows (approximately)
/*!40000 ALTER TABLE `data_santri` DISABLE KEYS */;
INSERT INTO `data_santri` (`id_santri`, `nis`, `nama_santri`, `jk`, `id_asrama`) VALUES
	(1, '2001', 'Joko Sutresno', 'L', 3),
	(2, '2002', 'Sugeng Widodo', 'L', 4),
	(3, '2003', 'Tony Stark', 'L', 5),
	(4, '2004', 'Siti Angeliana', 'P', 1),
	(8, '2005', 'Sandy Sandono', 'L', 3),
	(9, '2006', 'Dita Leni Karet', 'P', 1),
	(10, '2007', 'Dita Leni Ravia', 'P', 2);
/*!40000 ALTER TABLE `data_santri` ENABLE KEYS */;

-- Dumping structure for table putri.role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(1) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(10) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table putri.role: ~3 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nama_role`) VALUES
	(1, 'admin'),
	(2, 'operator'),
	(3, 'manager');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table putri.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_role` int(1) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `FK_user_role` (`id_role`),
  CONSTRAINT `FK_user_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table putri.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `username`, `password`, `id_role`) VALUES
	(1, 'admin', '12345678', 1),
	(2, 'operator', '12345678', 2),
	(3, 'manager', '12345678', 3);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for view putri.view_santri
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_santri` (
	`id_asrama` INT(1) NOT NULL,
	`id_santri` INT(11) NOT NULL,
	`nis` VARCHAR(6) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama_santri` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`jk` VARCHAR(1) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama_asrama` VARCHAR(30) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view putri.view_user
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_user` (
	`id_role` INT(1) NOT NULL,
	`id_user` INT(11) NOT NULL,
	`username` VARCHAR(15) NOT NULL COLLATE 'latin1_swedish_ci',
	`password` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama_role` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view putri.view_santri
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_santri`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_santri` AS SELECT *
FROM data_santri
JOIN asrama
	USING(id_asrama)
ORDER BY nis ASC ;

-- Dumping structure for view putri.view_user
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_user`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user` AS SELECT *
FROM user
JOIN role
	USING(id_role) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
