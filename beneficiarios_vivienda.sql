-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-01-2021 a las 21:18:51
-- Versión del servidor: 5.6.34
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `municipiomarcospaz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiarios_vivienda`
--

CREATE TABLE `beneficiarios_vivienda` (
  `id` int(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `documento` varchar(255) NOT NULL,
  `edad` varchar(255) NOT NULL,
  `nacionalidad` varchar(255) NOT NULL,
  `estadocivil` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `altura` varchar(255) NOT NULL,
  `entrecalle1` varchar(255) NOT NULL,
  `entrecalle2` varchar(255) NOT NULL,
  `barrio` varchar(255) NOT NULL,
  `localidad` varchar(255) NOT NULL,
  `legajo` varchar(255) NOT NULL,
  `ocupacion` varchar(255) NOT NULL,
  `vivienda_actual` varchar(255) NOT NULL,
  `ingreso_mensual` varchar(255) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `beneficiarios_vivienda`
--
ALTER TABLE `beneficiarios_vivienda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documento` (`documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `beneficiarios_vivienda`
--
ALTER TABLE `beneficiarios_vivienda`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
