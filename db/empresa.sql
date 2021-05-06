-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2021 a las 07:59:16
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IDCLIENTE` int(11) NOT NULL,
  `RAZON_SOCIAL` varchar(60) DEFAULT NULL,
  `RFC` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IDCLIENTE`, `RAZON_SOCIAL`, `RFC`) VALUES
(1, 'Kenny sa de cv', 'cark123456789'),
(2, 'sddasda', 'dasassd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `IDCODIGO` int(11) NOT NULL,
  `IDCLIENTE` int(11) DEFAULT NULL,
  `RAZON_SOCIAL` varchar(60) DEFAULT NULL,
  `RFC` varchar(15) DEFAULT NULL,
  `SUBTOTAL` double(13,3) DEFAULT NULL,
  `IVA` double(13,3) DEFAULT NULL,
  `TOTAL` double(13,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`IDCODIGO`, `IDCLIENTE`, `RAZON_SOCIAL`, `RFC`, `SUBTOTAL`, `IVA`, `TOTAL`) VALUES
(16, 1, 'Kenny sa de cv', 'cark123456789', 75.500, 12.080, 87.580),
(17, 10, '', '', 30075.500, 4812.080, 34887.580),
(18, 2, 'sddasda', 'dasassd', 30075.500, 4812.080, 34887.580),
(19, 1, 'Kenny sa de cv', 'cark123456789', 30026.000, 4804.160, 34830.160),
(20, 2, 'sddasda', 'dasassd', 30026.000, 4804.160, 34830.160);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentorenglon`
--

CREATE TABLE `documentorenglon` (
  `IDCODIGO` int(11) NOT NULL,
  `IDDOCUMENTO` int(11) DEFAULT NULL,
  `IDMATERIAL` int(11) DEFAULT NULL,
  `UNIDAD_MEDIDA` varchar(10) DEFAULT NULL,
  `CANTIDAD` double(13,3) DEFAULT NULL,
  `PRECIO1` double(13,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentorenglon`
--

INSERT INTO `documentorenglon` (`IDCODIGO`, `IDDOCUMENTO`, `IDMATERIAL`, `UNIDAD_MEDIDA`, `CANTIDAD`, `PRECIO1`) VALUES
(14, 1, 5, 'pieza', 10.000, 10.000),
(15, 1, 7, 'pieza', 16.000, 16.000),
(16, 1, 8, 'pieza', 49.500, 49.500),
(17, 17, 5, 'pieza', 10.000, 10.000),
(18, 17, 6, 'caja', 30000.000, 30000.000),
(19, 17, 7, 'pieza', 16.000, 16.000),
(20, 17, 8, 'pieza', 49.500, 49.500),
(21, 18, 5, 'pieza', 10.000, 10.000),
(22, 18, 6, 'caja', 30000.000, 30000.000),
(23, 18, 7, 'pieza', 16.000, 16.000),
(24, 18, 8, 'pieza', 49.500, 49.500),
(25, 19, 5, 'pieza', 10.000, 10.000),
(26, 19, 6, 'caja', 30000.000, 30000.000),
(27, 19, 7, 'pieza', 16.000, 16.000),
(28, 20, 6, 'caja', 30000.000, 30000.000),
(29, 20, 5, 'pieza', 10.000, 10.000),
(30, 20, 7, 'pieza', 16.000, 16.000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `IDMATERIAL` varchar(20) DEFAULT NULL,
  `DESCRIPCION` varchar(60) DEFAULT NULL,
  `UNIDADMEDIDA` varchar(15) DEFAULT NULL,
  `PRECIO1` double(13,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `IDMATERIAL`, `DESCRIPCION`, `UNIDADMEDIDA`, `PRECIO1`) VALUES
(5, '00003', 'Papitas', 'pieza', 10.000),
(6, '00006', 'bocina', 'caja', 30000.000),
(7, '00002', 'Flauta', 'pieza', 16.000),
(8, '0004', 'pastillas', 'pieza', 49.500);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IDCLIENTE`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`IDCODIGO`);

--
-- Indices de la tabla `documentorenglon`
--
ALTER TABLE `documentorenglon`
  ADD PRIMARY KEY (`IDCODIGO`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IDCLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `IDCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `documentorenglon`
--
ALTER TABLE `documentorenglon`
  MODIFY `IDCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
