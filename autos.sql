-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2022 a las 02:27:47
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `autos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos_usuarios`
--

CREATE TABLE `autos_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `edad_usuario` int(10) NOT NULL,
  `tel_usuario` varchar(30) NOT NULL,
  `correo_usuario` varchar(30) NOT NULL,
  `id_modelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autos_usuarios`
--

INSERT INTO `autos_usuarios` (`id_usuario`, `nombre_usuario`, `edad_usuario`, `tel_usuario`, `correo_usuario`, `id_modelo`) VALUES
(1, 'Diana Marlenne', 26, '6181231618', 'diana@gmail.com', 1),
(2, 'Gerardo Amel Castañeda', 25, '6183289308', 'gcecomputacion@gmail.com', 1),
(5, 'Angel Arturo', 2, '15615648', 'angel@gmail.com', 7),
(11, 'Diana Marlenne Lerma', 26, '321654987', 'diana@gmail.com', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `marca_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `marca_nombre`) VALUES
(1, 'HONDA'),
(2, 'KIA'),
(3, 'FORD'),
(4, 'NISSAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `modelo_nombre` varchar(20) NOT NULL,
  `id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `modelo_nombre`, `id_marca`) VALUES
(1, 'CRV', 1),
(2, 'HRV', 1),
(3, 'BRC', 1),
(4, 'SOUL', 2),
(5, 'RIO', 2),
(6, 'SPORTAGE', 2),
(7, 'MUSTANG', 3),
(8, 'ESCAPE', 3),
(9, 'FIESTA', 3),
(10, 'VERSA', 4),
(11, 'MARCH', 4),
(12, 'SENTRA', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos_usuarios`
--
ALTER TABLE `autos_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos_usuarios`
--
ALTER TABLE `autos_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
