-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2018 a las 21:48:35
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adminforce`
--
CREATE DATABASE IF NOT EXISTS `adminforce` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `adminforce`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

DROP TABLE IF EXISTS `historial`;
CREATE TABLE IF NOT EXISTS `historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `blocked` tinyint(1) NOT NULL,
  `blockeddate` datetime DEFAULT NULL,
  `userblock` int(11) DEFAULT NULL,
  `object` varchar(200) DEFAULT NULL,
  `userStoryCopado` varchar(200) DEFAULT NULL,
  `dev` varchar(200) NOT NULL,
  `action` varchar(200) NOT NULL,
  `userStoryJira` varchar(200) DEFAULT NULL,
  `unblockeddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `object`
--

DROP TABLE IF EXISTS `object`;
CREATE TABLE IF NOT EXISTS `object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `blocked` tinyint(1) NOT NULL,
  `blockeddate` datetime DEFAULT NULL,
  `userblock` int(11) DEFAULT NULL,
  `object` varchar(200) DEFAULT NULL,
  `userStoryCopado` varchar(200) DEFAULT NULL,
  `dev` varchar(200) NOT NULL,
  `userStoryJira` varchar(200) DEFAULT NULL,
  `unblockeddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Dev` varchar(50) NOT NULL,
  `User` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Connection` datetime NOT NULL,
  `Active` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
