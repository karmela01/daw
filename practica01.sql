-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2019 a las 21:09:30
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `id` int(1) NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres_movies`
--

CREATE TABLE `genres_movies` (
  `id_genre` int(1) DEFAULT NULL,
  `id_movie` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(4) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `year` int(4) NOT NULL,
  `duration` int(3) NOT NULL,
  `rating` int(3) NOT NULL,
  `cover` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `filepath` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `filename` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `external_url` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `title`, `year`, `duration`, `rating`, `cover`, `filepath`, `filename`, `external_url`) VALUES
(1, 'primera peli', 2019, 120, 4, 'lleva a portada', 'tampoco', 'ni idea', 'lo mismo'),
(2, 'primera peli', 2019, 120, 4, 'lleva a portada', 'tampoco', 'ni idea', 'lo mismo'),
(3, 'primera peli', 2019, 120, 4, 'lleva a portada', 'tampoco', 'ni idea', 'lo mismo'),
(4, 'primera peli', 2019, 120, 4, 'lleva a portada', 'tampoco', 'ni idea', 'lo mismo'),
(5, 'primera peli', 2019, 120, 4, 'lleva a portada', 'tampoco', 'ni idea', 'lo mismo'),
(6, 'primera peli', 2019, 120, 4, 'lleva a portada', 'tampoco', 'ni idea', 'lo mismo'),
(7, 'primera peli', 2019, 120, 4, 'lleva a portada', 'tampoco', 'ni idea', 'lo mismo'),
(8, 'primera peli', 2019, 120, 4, 'lleva a portada', 'tampoco', 'ni idea', 'lo mismo'),
(9, 'primera peli', 2019, 120, 4, 'lleva a portada', 'tampoco', 'ni idea', 'lo mismo'),
(10, '', 0, 0, 0, '', '', '', ''),
(11, '', 0, 0, 0, '', '', '', ''),
(12, '', 0, 0, 0, '', '', '', ''),
(13, '', 0, 0, 0, '', '', '', ''),
(14, '', 0, 0, 0, '', '', '', ''),
(15, '', 0, 0, 0, '', '', '', ''),
(16, '', 0, 0, 0, '', '', '', ''),
(17, '', 0, 0, 0, '', '', '', ''),
(18, '', 0, 0, 0, '', '', '', ''),
(19, '', 0, 0, 0, '', '', '', ''),
(20, '', 0, 0, 0, '', '', '', ''),
(21, '', 0, 0, 0, '', '', '', ''),
(22, '', 0, 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id` int(4) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `external_url` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people_act_movies`
--

CREATE TABLE `people_act_movies` (
  `id_person` int(4) DEFAULT NULL,
  `id_movie` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people_direct_movies`
--

CREATE TABLE `people_direct_movies` (
  `id_person` int(4) DEFAULT NULL,
  `id_movie` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nick` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `nick`, `password`, `tipo`) VALUES
(2, 'pier', 'nodoyuna', 'pier@mail.com', 'pier', '1111', 0),
(3, 'pepe', 'potamo', 'pepe@mail.com', 'pepe', '2222', 0),
(4, 'juancho', 'lagarto', 'juancho@mail.com', 'juancho', '3333', 1),
(5, 'amador', 'rivas', 'amador@mail.com', 'amador', '4444', 1),
(12, 'son las 2144', 'vsh', 'sdth', 'prueba2', '0000', 1),
(13, 'son las 2219', 'lakfj', 'ljkohi', 'prueba3', '0000', 1),
(14, 'son las 2230', 'lhuyigvfty', 'ibuyvftr', 'prueba4', '0000', 1),
(15, 'sigio en las 2230', 'lhuyvgtrfr', 'opij8yg6trfe5d', 'prueba5', '0000', 1),
(16, 'son las 2231', 'lknyug6rt', 'lkugtfrd', 'prueba6', '0000', 1),
(17, 'carmen', 'lamisma', 'carmen@correo.com', 'carmen', '1234', 0),
(18, 'NUEVONUMERODIEZ', 'nodoyuna', 'siete@mail.com', 'diez', '0000', 1),
(19, 'NUEVONUMERODIEZ', 'nodoyuna', 'siete@mail.com', 'diez', '0000', 1),
(20, 'NUEVOONCE', 'lamisma', 'pier@autosl,com', 'once', '0000', 1),
(21, 'NUMERODOCE', 'sdf', 'pier@autosl,com', 'doce', '0000', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genres_movies`
--
ALTER TABLE `genres_movies`
  ADD KEY `id_genre` (`id_genre`),
  ADD KEY `id_movie` (`id_movie`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `people_act_movies`
--
ALTER TABLE `people_act_movies`
  ADD KEY `id_person` (`id_person`),
  ADD KEY `id_movie` (`id_movie`);

--
-- Indices de la tabla `people_direct_movies`
--
ALTER TABLE `people_direct_movies`
  ADD KEY `id_person` (`id_person`),
  ADD KEY `id_movie` (`id_movie`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `genres_movies`
--
ALTER TABLE `genres_movies`
  ADD CONSTRAINT `genres_movies_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `genres_movies_ibfk_2` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`);

--
-- Filtros para la tabla `people_act_movies`
--
ALTER TABLE `people_act_movies`
  ADD CONSTRAINT `people_act_movies_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `people_act_movies_ibfk_2` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`);

--
-- Filtros para la tabla `people_direct_movies`
--
ALTER TABLE `people_direct_movies`
  ADD CONSTRAINT `people_direct_movies_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `people_direct_movies_ibfk_2` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
