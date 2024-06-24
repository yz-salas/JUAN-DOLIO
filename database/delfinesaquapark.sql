-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 21, 2024 at 07:39 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delfinesaquapark`
--
-- --------------------------------------------------------
--
-- Table structure for table `administrators`
--
DROP TABLE IF EXISTS `administrators`;

CREATE TABLE
  IF NOT EXISTS `administrators` (
    `ID` int NOT NULL AUTO_INCREMENT,
    `username` varchar(100) NOT NULL,
    `password` varchar(50) NOT NULL,
    PRIMARY KEY (`ID`)
  ) ENGINE = MyISAM DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

-- --------------------------------------------------------
--
-- Table structure for table `imagenes`
--
DROP TABLE IF EXISTS `imagenes`;

CREATE TABLE
  IF NOT EXISTS `imagenes` (
    `ID` int NOT NULL AUTO_INCREMENT,
    `Name` varchar(100) NOT NULL,
    `Description` varchar(100) NOT NULL,
    PRIMARY KEY (`ID`)
  ) ENGINE = MyISAM AUTO_INCREMENT = 41 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

-- --------------------------------------------------------
--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;

CREATE TABLE
  IF NOT EXISTS `users` (
    `ID` int NOT NULL AUTO_INCREMENT,
    `username` varchar(100) NOT NULL,
    `Gmail` varchar(100) NOT NULL,
    `Password` varchar(8) NOT NULL,
    `level` int NOT NULL,
    PRIMARY KEY (`ID`)
  ) ENGINE = MyISAM AUTO_INCREMENT = 27 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--
INSERT INTO
  `users` (`ID`, `username`, `Gmail`, `Password`, `level`)
VALUES
  (
    26,
    'user',
    'sadielsalas35@gmail.com',
    'user15',
    0
  ),
  (
    23,
    'zsalas',
    'sadielsalas35@gmail.com',
    'Sadiel15',
    1
  ),
  (
    25,
    'fpeña',
    'yonosadielsalas01@gmail.com',
    'peña123',
    1
  );

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;