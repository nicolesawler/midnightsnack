
CREATE DATABASE `recipes` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `ingredients` varchar(999) DEFAULT NULL,
  `instructions` varchar(999) DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `organics` varchar(255) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `filename` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
