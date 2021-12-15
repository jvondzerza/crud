-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for school
CREATE DATABASE IF NOT EXISTS `school` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `school`;

-- Dumping structure for table school.class
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_class_teacher` (`teacher_id`),
  CONSTRAINT `FK_class_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

insert into `class` (id, name, location, teacher_id) values

(1, 'Giertz', 'Antwerp', 3),
(2, 'Lamarr', 'Antwerp', 1),
(3, 'Carson', 'Brussels', 2);

-- Data exporting was unselected.

-- Dumping structure for table school.student
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `FK_student_class` (`class_id`),
  CONSTRAINT `FK_student_class` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

insert into `student` (id, name, email, class_id) values

(1, 'Jörg von Dzerzawa', 'jvondzerza@googlemail.com', 2),
(2, 'Lakneshwaran Krishna', 'laknesh@laknesh.com', 1),
(3, 'Christiaan van der Woude', 'chris@outlook.com', 3),
(4, 'Listiaan Here van der Woude', 'list@outlook.com', 3),
(5, 'Bakneshwaran Lishna', 'baknesh@baknesh.com', 1),
(6, 'Pikachu Mussolini', 'hello@fakedb.com', 2);

-- Data exporting was unselected.

-- Dumping structure for table school.teacher
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

insert into `teacher` (id, name, email) values

(3, 'Sicco Smit', 'backendgod@gmail.com'),
(1, 'Tim Broos', 'socketlockit@gmail.com'),
(2, 'Jap Jip', 'yupyep@gmail.com');

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
