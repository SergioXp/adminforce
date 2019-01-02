-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-01-2019 a las 21:25:46
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
CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
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

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `name`, `type`, `blocked`, `blockeddate`, `userblock`, `object`, `userStoryCopado`, `dev`, `action`, `userStoryJira`, `unblockeddate`) VALUES
(1, 'Prueba', 'apexClass', 1, '2018-12-28 19:05:56', 6, '', NULL, 'R1F1', 'Bloqueo', 'IBFV-407', NULL),
(2, 'SummaryKOCase', 'apexClass', 1, '2018-12-28 19:07:42', 6, 'SummaryKOCase', NULL, 'R1F1', 'Bloqueo', 'IBFV-407', NULL),
(3, 'SummaryKOCaseTest', 'apexClass', 1, '2018-12-28 19:07:42', 6, 'SummaryKOCaseTest', NULL, 'R1F1', 'Bloqueo', 'IBFV-407', NULL),
(4, 'Prueba2', 'apexClass', 1, '2018-12-28 19:08:24', 6, 'Prueba2', NULL, 'R1F1', 'Bloqueo', 'IBFV-407', NULL),
(5, 'Prueba2', 'apexClass', 1, '2018-12-28 19:08:24', 6, 'Prueba2', NULL, 'R1F1', 'Desbloqueo', 'IBFV-407', '2018-12-28 19:08:26'),
(6, 'SummaryKOCaseTest', 'apexClass', 1, '2018-12-28 19:07:42', 6, 'SummaryKOCaseTest', NULL, 'R1F1', 'Desbloqueo', 'IBFV-407', '2018-12-28 19:08:27'),
(7, 'SummaryKOCase', 'apexClass', 1, '2018-12-28 19:07:42', 6, 'SummaryKOCase', NULL, 'R1F1', 'Desbloqueo', 'IBFV-407', '2018-12-28 19:08:28'),
(8, 'Prueba', 'apexClass', 1, '2018-12-28 19:05:56', 6, '', NULL, 'R1F1', 'Desbloqueo', 'IBFV-407', '2018-12-28 19:08:29'),
(9, 'Prueba', 'apexClass', 1, '2018-12-28 19:08:55', 6, '', NULL, 'R1F1', 'Bloqueo', 'IBFV-407', '2018-12-28 19:08:29'),
(10, 'Prueba2', 'apexClass', 1, '2018-12-28 19:22:48', 6, 'Prueba2', NULL, 'R1F1', 'Bloqueo', '12345', '2018-12-28 19:08:26'),
(11, 'Otro', 'apexClass', 1, '2018-12-28 20:18:49', 6, '1', NULL, 'R1F1', 'Bloqueo', NULL, NULL),
(12, 'Prueba', 'apexClass', 1, '2018-12-28 19:08:55', 6, '', NULL, 'R1F1', 'Desbloqueo', NULL, '2018-12-28 20:33:39'),
(13, 'Prueba', 'apexClass', 1, '2018-12-28 19:08:55', 6, '', NULL, '', 'Desbloqueo', NULL, '2018-12-28 20:34:47'),
(14, 'Prueba', 'apexClass', 1, '2018-12-28 20:34:47', 6, '', NULL, '', 'Bloqueo', NULL, '2018-12-28 20:34:47'),
(15, 'Prueba', 'apexClass', 1, '2018-12-28 20:34:47', 6, '', NULL, '', 'Desbloqueo', NULL, '2018-12-28 20:37:06'),
(16, 'Prueba', 'apexClass', 1, '2018-12-28 20:37:06', 6, '', NULL, '', 'Bloqueo', NULL, '2018-12-28 20:37:06'),
(17, 'Prueba', 'apexClass', 1, '2018-12-28 20:37:06', 6, '', NULL, '', 'Desbloqueo', NULL, '2018-12-28 20:37:39'),
(18, 'Prueba', 'apexClass', 1, '2018-12-28 20:37:39', 6, '', NULL, '', 'Bloqueo', NULL, '2018-12-28 20:37:39'),
(19, 'Prueba', 'apexClass', 1, '2018-12-28 20:37:39', 6, '', NULL, '', 'Desbloqueo', NULL, '2018-12-28 20:38:54'),
(20, 'Prueba', 'apexClass', 1, '2018-12-28 20:38:54', 6, '', NULL, '', 'Bloqueo', NULL, '2018-12-28 20:38:54'),
(21, 'Prueba', 'apexClass', 1, '2018-12-28 20:38:54', 6, '', NULL, '', 'Desbloqueo', NULL, '2018-12-28 20:40:52'),
(22, 'Prueba', 'apexClass', 1, '2018-12-28 20:38:54', 6, '', NULL, '', 'Desbloqueo', NULL, '2018-12-28 20:43:19'),
(23, 'Prueba', 'apexClass', 1, '2018-12-28 20:43:19', 6, '', NULL, '', 'Bloqueo', NULL, '2018-12-28 20:43:19'),
(24, 'Prueba', 'apexClass', 1, '2018-12-28 20:43:19', 6, '', NULL, '', 'Desbloqueo', NULL, '2018-12-28 21:06:35'),
(25, 'Prueba', 'apexClass', 1, '2018-12-28 20:43:19', 6, '', NULL, '', 'Desbloqueo', NULL, '2018-12-28 21:08:08'),
(26, 'Prueba', 'apexClass', 1, '2018-12-28 21:08:08', 6, '', NULL, '', 'Bloqueo', NULL, '2018-12-28 21:08:08'),
(27, 'Prueba', 'apexClass', 1, '2018-12-28 21:08:08', 6, '', NULL, '', 'Desbloqueo', NULL, '2018-12-28 21:08:56'),
(28, 'Prueba', 'apexClass', 1, '2018-12-28 21:08:08', 6, '', NULL, '', 'Desbloqueo', NULL, '2018-12-28 21:09:28'),
(29, 'Prueba', 'apexClass', 1, '2018-12-28 21:09:28', 6, '', NULL, '', 'Bloqueo', NULL, '2018-12-28 21:09:28'),
(30, 'Prueba', 'apexClass', 1, '2018-12-28 21:09:28', 6, '', NULL, '', 'Desbloqueo', NULL, '2018-12-28 21:10:40'),
(31, 'Prueba', 'apexClass', 1, '2018-12-28 21:10:40', 7, '', NULL, '', 'Bloqueo', NULL, '2018-12-28 21:10:40'),
(32, 'Prueba', 'apexClass', 1, '2018-12-28 21:10:40', 7, '', NULL, '', 'Desbloqueo', NULL, '2018-12-28 21:31:00'),
(33, 'Prueba', 'apexClass', 1, '2018-12-28 21:31:00', 6, '', NULL, '', 'Bloqueo', NULL, '2018-12-28 21:31:00'),
(34, 'Prueba', 'apexClass', 1, '2018-12-28 21:31:00', 6, '', NULL, '', 'Desbloqueo', NULL, '2019-01-02 21:17:45'),
(35, 'Prueba', 'apexClass', 1, '2019-01-02 21:17:45', 7, '', NULL, '', 'Bloqueo', NULL, '2019-01-02 21:17:45'),
(36, 'Prueba', 'apexClass', 1, '2019-01-02 21:17:45', 7, '', NULL, '', 'Desbloqueo', NULL, '2019-01-02 21:18:13'),
(37, 'Prueba', 'apexClass', 1, '2019-01-02 21:18:25', 6, '', NULL, 'R1F1', 'Bloqueo', NULL, '2019-01-02 21:18:13'),
(38, 'Prueba', 'apexClass', 1, '2019-01-02 21:18:25', 6, '', NULL, 'R1F1', 'Desbloqueo', NULL, '2019-01-02 21:19:03'),
(39, 'Prueba', 'apexClass', 1, '2019-01-02 21:19:03', 7, '', NULL, '', 'Bloqueo', NULL, '2019-01-02 21:19:02'),
(40, 'Prueba', 'apexClass', 1, '2019-01-02 21:19:03', 7, '', NULL, '', 'Desbloqueo', NULL, '2019-01-02 21:22:13'),
(41, 'Prueba', 'apexClass', 1, '2019-01-02 21:22:13', 6, '', NULL, '', 'Bloqueo', NULL, '2019-01-02 21:22:13'),
(42, 'Prueba', 'apexClass', 1, '2019-01-02 21:22:13', 6, '', NULL, '', 'Desbloqueo', NULL, '2019-01-02 21:23:13'),
(43, 'Prueba', 'apexClass', 0, '2019-01-02 21:22:13', NULL, '', NULL, '', 'Desbloqueo', NULL, '2019-01-02 21:24:24'),
(44, 'Prueba', 'apexClass', 1, '2019-01-02 21:24:29', 6, '', NULL, 'R1F1', 'Bloqueo', NULL, '2019-01-02 21:24:24'),
(45, 'Prueba', 'apexClass', 1, '2019-01-02 21:24:29', 6, '', NULL, 'R1F1', 'Desbloqueo', NULL, '2019-01-02 21:24:39'),
(46, 'Prueba', 'apexClass', 1, '2019-01-02 21:24:39', 7, '', NULL, '', 'Bloqueo', NULL, '2019-01-02 21:24:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lobby`
--

DROP TABLE IF EXISTS `lobby`;
CREATE TABLE `lobby` (
  `Id` int(11) NOT NULL,
  `ObjectId` int(11) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Waiting` tinyint(1) NOT NULL,
  `DatePetition` datetime NOT NULL,
  `DateAsign` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lobby`
--

INSERT INTO `lobby` (`Id`, `ObjectId`, `UserId`, `Waiting`, `DatePetition`, `DateAsign`) VALUES
(1, 10, 7, 0, '2018-12-28 19:36:10', '0000-00-00 00:00:00'),
(2, 10, 6, 0, '2018-12-28 21:30:52', '0000-00-00 00:00:00'),
(7, 10, 7, 0, '2019-01-02 21:15:22', '0000-00-00 00:00:00'),
(8, 10, 6, 0, '2019-01-02 21:22:03', '0000-00-00 00:00:00'),
(9, 10, 7, 0, '2019-01-02 21:24:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `object` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notification`
--

INSERT INTO `notification` (`id`, `read`, `object`, `date`, `user`) VALUES
(7, 1, 'Prueba', '2019-01-02 21:19:03', 6),
(8, 1, 'Prueba', '2019-01-02 21:22:14', 6),
(9, 1, 'Prueba', '2019-01-02 21:24:39', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `object`
--

DROP TABLE IF EXISTS `object`;
CREATE TABLE `object` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `blocked` tinyint(1) NOT NULL,
  `blockeddate` datetime DEFAULT NULL,
  `userblock` int(11) DEFAULT NULL,
  `object` varchar(200) NOT NULL,
  `userStoryCopado` varchar(200) DEFAULT NULL,
  `dev` varchar(200) NOT NULL,
  `userStoryJira` varchar(200) DEFAULT NULL,
  `unblockeddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `object`
--

INSERT INTO `object` (`id`, `name`, `type`, `blocked`, `blockeddate`, `userblock`, `object`, `userStoryCopado`, `dev`, `userStoryJira`, `unblockeddate`) VALUES
(10, 'Prueba', 'apexClass', 1, '2019-01-02 21:24:39', 7, '', NULL, '', 'IBFV-407', '2019-01-02 21:24:39'),
(11, 'SummaryKOCase', 'apexClass', 0, '2018-12-28 19:07:42', NULL, 'SummaryKOCase', NULL, '', NULL, '2018-12-28 19:08:28'),
(12, 'SummaryKOCaseTest', 'apexClass', 0, '2018-12-28 19:07:42', NULL, 'SummaryKOCaseTest', NULL, '', NULL, '2018-12-28 19:08:27'),
(13, 'Prueba2', 'apexClass', 1, '2018-12-28 19:22:48', 6, 'Prueba2', NULL, 'R1F1', '12345', '2018-12-28 19:08:26'),
(14, 'Otro', 'apexClass', 1, '2018-12-28 20:18:49', 6, '1', NULL, 'R1F1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Dev` varchar(50) NOT NULL,
  `User` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Connection` datetime NOT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`Id`, `Name`, `Email`, `Dev`, `User`, `Password`, `Connection`, `Active`) VALUES
(6, 'SGH', 'sgonzalezh@ayesa.com', 'R1F1', 'SGH', 'c4ca4238a0b923820dcc509a6f75849b', '2018-12-28 19:05:14', 1),
(7, 'ATR', 'ATR', 'ATR', 'ATR', 'c4ca4238a0b923820dcc509a6f75849b', '2018-12-28 19:34:13', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lobby`
--
ALTER TABLE `lobby`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `object`
--
ALTER TABLE `object`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `lobby`
--
ALTER TABLE `lobby`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `object`
--
ALTER TABLE `object`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
