-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2021 a las 19:45:02
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asignaciontareas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto_mes`
--

CREATE TABLE `gasto_mes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `importe` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `gasto_mes`
--

INSERT INTO `gasto_mes` (`id`, `mes`, `importe`) VALUES
(1, 'Enero', 3859.00),
(2, 'Febrero', 4059.00),
(3, 'Marzo', 4009.00),
(4, 'Abril', 4049.00),
(5, 'Mayo', 3209.00),
(6, 'Junio', 2959.00),
(7, 'Julio', 3459.00),
(8, 'Agosto', 3209.00),
(9, 'Septiembre', 2759.00),
(10, 'Octubre', 2909.00),
(11, 'Noviembre', 3059.00),
(12, 'Diciembre', 3059.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gasto_mes`
--
ALTER TABLE `gasto_mes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gasto_mes`
--
ALTER TABLE `gasto_mes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
