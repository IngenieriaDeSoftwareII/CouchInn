-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-06-2016 a las 18:25:43
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `couchInn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `id_propiedad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `id_propiedad` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `numero_habitaciones` int(11) NOT NULL,
  `numero_banos` int(11) NOT NULL,
  `cochera` tinyint(1) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `precio` double NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `id_tipo_propiedad` int(11) NOT NULL,
  `id_ubicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_propiedad`
--

CREATE TABLE `tipo_propiedad` (
  `id_tipo_propiedad` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_propiedad`
--

INSERT INTO `tipo_propiedad` (`id_tipo_propiedad`, `nombre`, `descripcion`) VALUES
(1, 'Departamento', 'Apartamento privado'),
(2, 'Habitacion Privada Premium', 'Habitacion privada con bano privado'),
(3, 'Paihouse', 'Baticueva de los pibes para comer, dormir y convertirse en genios informáticos'),
(4, 'Habitacion Privada Regular', 'Habitacion privada con bano compartido'),
(5, 'Habitacion Compartida Premium', 'Habitacion compartida con bano propio'),
(6, 'Habitacion Compartida Regular', 'Habitacion compartida sin bano propio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubicacion` int(11) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `piso` int(11) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `codigo_postal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id_ubicacion`, `calle`, `numero`, `piso`, `departamento`, `pais`, `provincia`, `ciudad`, `codigo_postal`) VALUES
(1, '99999', 99999, 99999, '99999', 'Argentina', 'Buenos Aires', 'La Plata', 99999),
(15, '14b', 959, 0, '', 'Argentina', 'Buenos Aires', 'La Plata', 1896),
(16, '413', 0, 0, '', 'Argentina', 'Buenos Aires', 'La Plata', 1894),
(35, '117', 359, 0, '', 'Argentina', 'Buenos Aires', 'La Plata', 1900),
(44, '14b', 959, 0, '', 'Argentina', 'Buenos Aires', 'La Plata', 1896),
(45, '14b', 959, 0, '', 'Argentina', 'Buenos Aires', 'La Plata', 1896),
(46, '14b', 959, 0, '', 'Argentina', 'Buenos Aires', 'La Plata', 1896),
(47, '14b', 959, 0, '', 'Argentina', 'Buenos Aires', 'La Plata', 1896);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(24) NOT NULL,
  `contrasena` varchar(16) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `rol` int(1) NOT NULL DEFAULT '1',
  `dni` int(8) NOT NULL,
  `id_ubicacion` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `contrasena`, `nombre`, `apellido`, `rol`, `dni`, `id_ubicacion`, `email`, `telefono`) VALUES
(1, 'admin', 'administrador', 'Ariel', 'Sobrado', 0, 99999999, 1, 'asobrado@gmail.com', '99999'),
(4, 'Kirizzi', '123456', 'Ivone Paula', 'Rizzi', 1, 18459495, 15, 'kirizzi@hotmail.com.ar', '4724112'),
(11, 'Agusdeluca96', 'paiputito', 'Agustin', 'De Luca', 1, 39557795, 15, 'agus.lp.96@hotmail.com', '2216063263'),
(12, 'Ramicortes94', 'paiputete', 'Ramiro', 'Cortes', 2, 38320362, 16, 'ramirocortes7@gmail.com', '2216022281'),
(21, 'Agusvigno', 'paiputon', 'Agustin', 'Vignolo', 1, 33590391, 35, 'agus.lp@hotmail.com', '2213041855');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_propiedad` (`id_propiedad`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`id_propiedad`),
  ADD KEY `id_tipo_propiedad` (`id_tipo_propiedad`),
  ADD KEY `id_ubicacion` (`id_ubicacion`);

--
-- Indices de la tabla `tipo_propiedad`
--
ALTER TABLE `tipo_propiedad`
  ADD PRIMARY KEY (`id_tipo_propiedad`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_ubicacion` (`id_ubicacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `id_propiedad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_propiedad`
--
ALTER TABLE `tipo_propiedad`
  MODIFY `id_tipo_propiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
