-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2022 a las 17:48:21
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritocompras`
--

CREATE TABLE `carritocompras` (
  `CARR_ID` int(11) NOT NULL,
  `PRO_ID` int(11) NOT NULL,
  `USU_ID` int(11) NOT NULL,
  `CARR_CANT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carritocompras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `PRO_ID` int(11) NOT NULL,
  `PRO_NOMBRE` varchar(50) NOT NULL,
  `PRO_PRECIO` int(11) NOT NULL,
  `PRO_IMAGEN` longblob NOT NULL,
  `PRO_DESCRIPCION` varchar(1000) DEFAULT NULL,
  `PRO_CANTIDAD` int(11) NOT NULL,
  `PRO_CATEGORIA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `USU_ID` int(11) NOT NULL,
  `USU_NOMBRE` varchar(50) NOT NULL,
  `USU_PASSWORD` varchar(50) NOT NULL,
  `USU_EMAIL` varchar(50) NOT NULL,
  `USU_ROL` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`USU_ID`, `USU_NOMBRE`, `USU_PASSWORD`, `USU_EMAIL`, `USU_ROL`) VALUES
(1, 'adrian', 'adrian', 'adrian@gmail.com', 'admin'),
(2, 'jhonfer', 'jhonfer', 'jhonfer@gmail.com', 'admin'),
(3, 'juana', 'juana', 'juana@gmail.com', 'noadmin'),
(4, 'oscar', 'oscar', 'oscar@gmail.com', 'noadmin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carritocompras`
--
ALTER TABLE `carritocompras`
  ADD PRIMARY KEY (`CARR_ID`,`PRO_ID`,`USU_ID`),
  ADD KEY `FK_ALMACENA` (`PRO_ID`),
  ADD KEY `FK_POSEE2` (`USU_ID`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`PRO_ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`USU_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carritocompras`
--
ALTER TABLE `carritocompras`
  MODIFY `CARR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `PRO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `USU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritocompras`
--
ALTER TABLE `carritocompras`
  ADD CONSTRAINT `FK_ALMACENA` FOREIGN KEY (`PRO_ID`) REFERENCES `producto` (`PRO_ID`),
  ADD CONSTRAINT `FK_POSEE2` FOREIGN KEY (`USU_ID`) REFERENCES `usuario` (`USU_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
