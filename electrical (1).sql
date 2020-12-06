-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `electrical`;

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `requests` (`id`, `name`, `phone`, `email`, `subject`, `message`, `created_at`) VALUES
(1,	'dsfksd',	'3242342',	'few@llfw.ew',	'fwef',	'fewf',	'2020-02-04 16:58:40'),
(2,	'dsfksd',	'3242342',	'few@llfw.ew',	'fwef',	'fewf',	'2020-02-04 17:02:36'),
(3,	'1111',	'111',	'11@qqq.wq',	'1111',	'11ex12',	'2020-02-04 17:02:47'),
(4,	'лавыоавы',	'43242',	'wfewe@fwfe.e',	'fwefwe',	'fewf',	'2020-02-04 17:15:47'),
(5,	'ewff',	'feewf',	'fewf@lldd.ee',	'ewew',	'efwf',	'2020-02-04 17:16:04');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1,	'admin@admin.com',	'admin@admin.com');

-- 2020-10-29 14:24:53
