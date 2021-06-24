-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2021 a las 15:24:34
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
-- Base de datos: `twitter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlaces`
--

CREATE TABLE `enlaces` (
  `id` int(11) NOT NULL,
  `url` varchar(400) NOT NULL DEFAULT '',
  `seguro` int(11) NOT NULL DEFAULT 0,
  `tipo` int(11) NOT NULL DEFAULT 0,
  `seleccionado` int(11) NOT NULL DEFAULT 0,
  `count` int(11) NOT NULL DEFAULT 1,
  `countres` int(11) NOT NULL DEFAULT 0,
  `countsemana` int(11) NOT NULL DEFAULT 0,
  `counttotal` int(11) NOT NULL DEFAULT 1,
  `nombre` varchar(100) NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `enlaces`
--

INSERT INTO `enlaces` (`id`, `url`, `seguro`, `tipo`, `seleccionado`, `count`, `countres`, `countsemana`, `counttotal`, `nombre`, `eliminado`) VALUES
(1, 'https://twitter.com', 1, 0, 0, 2, 0, 0, 10, 'Twitter', 0),
(2, 'https://twitter.com', 0, 0, 0, 2, 3, 5, 10, 'Sanidad', 0),
(3, 'https://twitter.com', 1, 1, 0, 2, 0, 0, 10, 'El Mundo', 1),
(4, 'https://twitter.com', 0, 1, 0, 2, 3, 5, 10, 'El Pais', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hashtags`
--

CREATE TABLE `hashtags` (
  `id` int(11) NOT NULL,
  `hashtag` varchar(100) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  `seleccionado` int(2) NOT NULL DEFAULT 0,
  `countsemana` int(11) NOT NULL,
  `countres` int(11) NOT NULL,
  `counttotal` int(11) NOT NULL DEFAULT 1,
  `eliminado` int(11) NOT NULL DEFAULT 0,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hashtags`
--

INSERT INTO `hashtags` (`id`, `hashtag`, `count`, `seleccionado`, `countsemana`, `countres`, `counttotal`, `eliminado`, `post`) VALUES
(35, 'prueba1', 12, 1, 3, 5, 20, 0, 0),
(36, 'prueba2', 11, 1, 3, 5, 19, 0, 0),
(37, 'prueba3', 10, 0, 1, 5, 18, 0, 0),
(38, 'prueba4', 9, 0, 3, 0, 15, 0, 0),
(39, 'prueba5', 1, 0, 3, 1, 16, 0, 0),
(40, 'prueba6', 1, 0, 3, 5, 15, 0, 0),
(41, 'prueba7', 6, 0, 0, 3, 14, 0, 0),
(42, 'prueba8', 1, 0, 5, 1, 13, 0, 0),
(43, 'prueba9', 1, 0, 5, 3, 12, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menciones`
--

CREATE TABLE `menciones` (
  `id` int(11) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `followers` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  `countres` int(11) NOT NULL DEFAULT 0,
  `countsemana` int(11) NOT NULL DEFAULT 0,
  `countotal` int(11) NOT NULL DEFAULT 1,
  `seleccionado` int(11) NOT NULL DEFAULT 0,
  `eliminado` int(11) NOT NULL DEFAULT 0,
  `post` int(11) NOT NULL DEFAULT 0,
  `verificado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menciones`
--

INSERT INTO `menciones` (`id`, `nickname`, `followers`, `count`, `countres`, `countsemana`, `countotal`, `seleccionado`, `eliminado`, `post`, `verificado`) VALUES
(24, 'BOLDDems', 4097, 33, 0, 0, 33, 0, 0, 0, 0),
(25, 'We_T_Resistance', 9709, 33, 0, 0, 33, 0, 0, 0, 1),
(26, 'VOSTandalucia', 7402, 33, 0, 0, 33, 0, 0, 0, 1),
(27, 'ElConsejoSV', 7730, 33, 0, 0, 33, 0, 0, 0, 0),
(28, 'dquinterotv10', 32766, 33, 0, 0, 33, 0, 0, 0, 0),
(29, 'GuineaSalud', 895, 33, 0, 0, 33, 0, 0, 0, 0),
(30, 'BZarandona', 16591, 33, 0, 0, 33, 0, 0, 0, 0),
(31, 'elcomerciocom', 1875926, 75, 0, 0, 75, 0, 1, 1, 0),
(32, 'AlvaroM_ENG', 1308, 33, 0, 0, 33, 0, 0, 0, 0),
(33, 'SaludPublicaEs', 385362, 33, 0, 0, 33, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposenlaces`
--

CREATE TABLE `tiposenlaces` (
  `id` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `banner` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiposenlaces`
--

INSERT INTO `tiposenlaces` (`id`, `idtipo`, `logo`, `banner`) VALUES
(0, 1, 'https://cygtecnicos.com/wp-content/uploads/2020/04/b1a3fab214230557053ed1c4bf17b46c-icono-de-twitter-logo-by-vexels.png', 'https://store-images.s-microsoft.com/image/apps.46858.9007199266244427.522381d2-9ab3-4b65-8c23-d580de6d9394.0ea914e0-f286-478d-8b95-449721f32273?w=672&h=378&q=80&mode=letterbox&background=%23FFE4E4E4&format=jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `followers` int(11) NOT NULL,
  `tweets` int(11) NOT NULL DEFAULT 1,
  `seleccionado` int(11) NOT NULL DEFAULT 0,
  `tweetssemana` int(11) NOT NULL DEFAULT 0,
  `tweetstotal` int(11) NOT NULL DEFAULT 0,
  `tweetstres` int(11) NOT NULL DEFAULT 0,
  `eliminado` int(11) NOT NULL DEFAULT 0,
  `post` int(11) NOT NULL DEFAULT 0,
  `verificado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nickname`, `followers`, `tweets`, `seleccionado`, `tweetssemana`, `tweetstotal`, `tweetstres`, `eliminado`, `post`, `verificado`) VALUES
(27, 'DemsKeys', 7708, 33, 0, 0, 33, 0, 0, 0, 1),
(28, 'pitaquito', 116, 33, 0, 0, 33, 0, 0, 0, 0),
(29, 'EA7AAE', 1467, 33, 0, 0, 33, 0, 0, 0, 0),
(30, 'elderjavierojas', 935, 33, 0, 0, 33, 0, 0, 0, 0),
(31, 'LuisFer524', 108, 33, 0, 0, 33, 0, 0, 0, 0),
(32, 'ReinaldoPoleo2', 413, 33, 0, 0, 33, 0, 0, 0, 0),
(33, 'BibaMexi', 556, 33, 0, 0, 33, 0, 0, 0, 0),
(34, 'MitohaOndo', 2100, 33, 0, 0, 33, 0, 0, 0, 0),
(35, 'luisugsha87', 219, 75, 1, 0, 75, 0, 0, 0, 0),
(36, 'SevillaCivica', 2473, 33, 0, 0, 33, 0, 0, 0, 0),
(37, 'csmuromarines', 461, 33, 0, 0, 33, 0, 0, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `enlaces`
--
ALTER TABLE `enlaces`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menciones`
--
ALTER TABLE `menciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `enlaces`
--
ALTER TABLE `enlaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `hashtags`
--
ALTER TABLE `hashtags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `menciones`
--
ALTER TABLE `menciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
