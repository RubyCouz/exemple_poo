-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.5.8-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for garage
DROP DATABASE IF EXISTS `garage`;
CREATE DATABASE IF NOT EXISTS `garage` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `garage`;

-- Dumping structure for table garage.achat
DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `voit_id` int(11) NOT NULL,
  `cli_id` int(11) NOT NULL,
  PRIMARY KEY (`voit_id`,`cli_id`),
  KEY `cli_id` (`cli_id`),
  CONSTRAINT `achat_ibfk_2` FOREIGN KEY (`cli_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table garage.achat: ~10 rows (approximately)
/*!40000 ALTER TABLE `achat` DISABLE KEYS */;
INSERT INTO `achat` (`voit_id`, `cli_id`) VALUES
	(1, 2),
	(2, 4),
	(3, 1),
	(6, 3),
	(7, 9),
	(8, 6),
	(9, 5),
	(10, 2),
	(11, 7),
	(12, 8);
/*!40000 ALTER TABLE `achat` ENABLE KEYS */;

-- Dumping structure for table garage.clients
DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nom` varchar(50) NOT NULL,
  `cli_mail` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table garage.clients: ~9 rows (approximately)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `cli_nom`, `cli_mail`) VALUES
	(1, 'Obi-wan Kenobi', 'jedi_knight@force.com'),
	(2, 'Link', 'monsieur.zelda@kokiri.com'),
	(3, 'Mario', 'plumberforlife@mushroom.com'),
	(4, 'Major 117', 'master.chief@unsc.com'),
	(5, 'Augustus Cole', 'cole.train@cgu.com'),
	(6, 'Géralt de riv', 'white_wolf@witcher.com'),
	(7, 'Ezio Auditore da Firenze', 'look_for_feathers@animus.com'),
	(8, 'Zavala', 'vouvouvzela@vangard.com'),
	(9, 'Fényx', 'Typhon_kicker@olympe.com');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table garage.marque
DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque_nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Dumping data for table garage.marque: ~14 rows (approximately)
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` (`id`, `marque_nom`) VALUES
	(1, 'Tesla'),
	(2, 'Aston Martin'),
	(3, 'Ford'),
	(4, 'Renault'),
	(5, 'Chrysler'),
	(6, 'Jeep'),
	(26, 'Citroën'),
	(27, 'Peugeot'),
	(28, 'Mercedes'),
	(29, 'Chevrolet'),
	(30, 'Alfa Romeo'),
	(31, 'Toyota'),
	(32, 'Seat'),
	(33, 'Skoda');
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;

-- Dumping structure for table garage.voiture
DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voit_prix` int(11) NOT NULL,
  `voit_model` varchar(50) NOT NULL,
  `marque_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `marque_id` (`marque_id`),
  CONSTRAINT `voiture_ibfk_1` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Dumping data for table garage.voiture: ~13 rows (approximately)
/*!40000 ALTER TABLE `voiture` DISABLE KEYS */;
INSERT INTO `voiture` (`id`, `voit_prix`, `voit_model`, `marque_id`) VALUES
	(1, 45312312, 'model 4', 1),
	(2, 50150, 'mustang', 3),
	(3, 133250, 'DBS Superleggera', 2),
	(4, 30290, 'Chrylser 300', 5),
	(5, 12600, 'Twingo', 4),
	(6, 8450, 'AMI', 26),
	(7, 16710, 'Fabia', 33),
	(8, 95250, 'Stingray', 29),
	(9, 11940, 'Aygo', 31),
	(10, 40550, 'Traveller', 27),
	(11, 80050, 'Giula gta', 30),
	(12, 500, 'Mò eKickScooter 25*', 32);
/*!40000 ALTER TABLE `voiture` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
