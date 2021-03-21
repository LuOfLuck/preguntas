-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2021 a las 08:24:18
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id` int(20) NOT NULL,
  `victima` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `si` int(1) NOT NULL DEFAULT 0,
  `rechazos` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id`, `victima`, `id_pregunta`, `si`, `rechazos`) VALUES
(638, 'JUANA', 4, 0, 0),
(38344, '', 0, 0, 0),
(48950, 'JUANA', 4, 1, 7),
(55183, 'Leyla', 5, 0, 0),
(103834, '', 0, 0, 0),
(158535, 'Leyla', 5, 0, 32),
(228572, '', 0, 0, 0),
(294762, 'JUANA', 4, 0, 4),
(309326, 'Ley', 3, 1, 3),
(320381, 'JUANA', 4, 0, 0),
(321365, 'Leyla', 5, 0, 0),
(353791, 'Leyla', 5, 1, 17),
(455856, '', 0, 0, 0),
(478606, 'Leyla', 5, 0, 0),
(482156, 'Leyla', 5, 1, 10),
(485437, 'JUANA', 4, 0, 0),
(536402, 'Leyla', 5, 0, 0),
(696762, 'JUANA', 4, 0, 0),
(730595, 'Leyla', 5, 0, 1),
(769498, '', 0, 0, 0),
(770525, 'Ley', 3, 0, 2),
(783738, 'Leyla', 5, 0, 0),
(890799, '', 0, 0, 0),
(955699, 'Leyla', 5, 0, 15),
(969542, 'asdsad', 5, 1, 7),
(993911, 'Leyla', 5, 0, 0),
(993946, 'Leyla', 5, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=993947;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
