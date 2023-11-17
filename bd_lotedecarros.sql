-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 17:08:55
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_lotedecarros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `id` int(10) NOT NULL,
  `idVenta` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `cp` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `garantia` varchar(50) NOT NULL,
  `tiempo_llegada` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `VIN` varchar(17) NOT NULL,
  `cod_titulo` varchar(20) NOT NULL,
  `transmision` varchar(50) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `motor` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `serie` varchar(20) NOT NULL,
  `descrip` varchar(150) NOT NULL,
  `no_cil` varchar(10) NOT NULL,
  `disponible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `VIN`, `cod_titulo`, `transmision`, `costo`, `motor`, `color`, `serie`, `descrip`, `no_cil`, `disponible`) VALUES
(1, '112SD335F34VFSD43', '234234', 'Estándar', '123.54', '2.0 ', 'Negro', 'VALF242L', 'Carro negro', '4 cil', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos_vendidos`
--

CREATE TABLE `vehiculos_vendidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_vehiculo` bigint(20) UNSIGNED NOT NULL,
  `cantidad` bigint(20) UNSIGNED NOT NULL,
  `id_venta` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `vehiculos_vendidos`
--

INSERT INTO `vehiculos_vendidos` (`id`, `id_vehiculo`, `cantidad`, `id_venta`) VALUES
(14, 1, 3, 2),
(15, 1, 1, 3),
(16, 1, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `total`) VALUES
(1, '2023-11-17 09:49:41', '370.62'),
(3, '2023-11-17 10:52:15', '123.54'),
(4, '2023-11-17 13:26:36', '123.54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos_vendidos`
--
ALTER TABLE `vehiculos_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vuelo` (`id_vehiculo`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehiculos_vendidos`
--
ALTER TABLE `vehiculos_vendidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
