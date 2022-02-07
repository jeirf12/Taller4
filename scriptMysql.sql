-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2022 a las 23:28:30
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `PRO_ID` int(11) NOT NULL,
  `PRO_NOMBRE` varchar(50) NOT NULL,
  `PRO_PRECIO` int(11) NOT NULL,
  `PRO_IMAGEN` longblob NOT NULL,
  `PRO_DESCRIPCION` varchar(50) DEFAULT NULL,
  `PRO_CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`USU_ID`, `USU_NOMBRE`, `USU_PASSWORD`, `USU_EMAIL`, `USU_ROL`) VALUES
(1, 'adrian', 'adrian', 'adrian@gmail.com', 'noadmin'),
(2, 'juana', 'juana', 'juana@gmail.com', 'noadmin'),
(9999, 'jhonfer', 'jhonfer', 'jhonfer@gmail.com', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carritocompras`
--
ALTER TABLE `carritocompras`
  ADD PRIMARY KEY (`CARR_ID`),
  ADD KEY `CARRITOCOMPRAS_FK` (`USU_ID`),
  ADD KEY `FK_CARRITOC_RELATIONS_PRODUCTO` (`PRO_ID`);

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
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `PRO_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritocompras`
--
ALTER TABLE `carritocompras`
  ADD CONSTRAINT `FK_CARRITOC_RELATIONS_PRODUCTO` FOREIGN KEY (`PRO_ID`) REFERENCES `producto` (`PRO_ID`),
  ADD CONSTRAINT `carritocompras_ibfk_1` FOREIGN KEY (`USU_ID`) REFERENCES `usuario` (`USU_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
