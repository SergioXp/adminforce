-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2018 a las 17:30:09
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

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`Id`, `Name`, `Email`, `Dev`, `User`, `Password`, `Connection`, `Active`) VALUES
(1, 'Adrián Torralba Román', 'atorralbar@ayesa.com', 'R1F1', 'atorralbar@ayesa.com.r1f1', '4a6dbb2ff650f82af801f71c3efd72c3', '0000-00-00 00:00:00', 0),
(2, 'Sergio González Hidalgo', 'sgonzalezh@ayesa.com', 'R1F1', 'sgonzalezh@ayesa.com.r1f1', '4a6dbb2ff650f82af801f71c3efd72c3', '0000-00-00 00:00:00', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
