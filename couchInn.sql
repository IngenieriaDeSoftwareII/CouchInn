-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-06-2016 a las 20:45:05
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

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

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`id_foto`, `url`, `id_propiedad`) VALUES
(1, 'http://www3.hilton.com/resources/media/hi/PPTBNHI/en_US/img/shared/full_page_image_gallery/main/HL_presidentialvilla05_23_675x359_FitToBoxSmallDimension_Center.jpg', 1),
(2, 'http://www.architecturebeast.com/wp-content/uploads/2015/05/Amazing_Houses_on_architecture_beast_Living_Modern_With_Style_15-min.jpg', 2),
(3, 'http://www.foruum.co/images/amazing-best-home-design-architecture-home-modern-house-design-800-x-616.jpg', 3),
(4, 'http://2.bp.blogspot.com/-cpnQMMt8acs/UT1ms-_xSCI/AAAAAAAAg8Y/1OMeQFhHm4A/s1600/casa-de-campo-en-la-montana-19.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id_pregunta` int(11) NOT NULL,
  `descripción` varchar(500) NOT NULL,
  `respuesta` varchar(500) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_propiedad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `id_propiedad` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
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

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`id_propiedad`, `nombre`, `capacidad`, `numero_habitaciones`, `numero_banos`, `cochera`, `wifi`, `precio`, `descripcion`, `id_tipo_propiedad`, `id_ubicacion`) VALUES
(1, 'Cabana paradisiaca', 6, 2, 1, 0, 0, 900, 'Cabana en las orillas del oceano mas transparente del planeta tierra en la paradisiaca isla de Bora-Bora. Ideal para relajarse y desconectarse del mundo por unos dias. La casa cuenta un deck de madera con reposaras y mesa, una escalera con bajada directa al mar y una pileta en el interior.', 2, 500),
(2, 'Casa de Dory', 5, 2, 2, 1, 1, 1200, 'Hola soy Dory, amiga de Marlyn y alquilo mi casa para buHola soy Dory, amiga de MarlHola soy Dory.', 5, 501),
(3, 'Lo de Peit', 1, 1, 1, 0, 0, 65, 'Departamento de dos ambientes a 6 cuadras del centro de la ciudad ideal para turismos. Cercano a la zona del bosque y de las facultades.', 1, 502),
(4, 'El refugio', 4, 2, 1, 0, 0, 260, 'Casa en el medio de la montaña El Mordisco del Diablo. Hermosa vista de la ciudad.', 3, 503);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_propiedad`
--

CREATE TABLE `reserva_propiedad` (
  `id_reserva_propiedad` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_inicio_reserva` date NOT NULL,
  `fecha_fin_reserva` date NOT NULL,
  `id_huésped` int(11) NOT NULL,
  `id_propiedad` int(11) NOT NULL
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
(3, 'Pay House ..', '  Base operacional los 4 fantÃ¡sticos.. '),
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
(16, '413', 10, 0, '', 'Argentina', 'Buenos Aires', 'La Plata', 1894),
(44, '14b', 959, 0, '', 'Argentina', 'Buenos Aires', 'La Plata', 1896),
(45, '14b', 959, 0, '', 'Argentina', 'Buenos Aires', 'La Plata', 1896),
(46, '14b', 959, 0, '', 'Argentina', 'Buenos Aires', 'La Plata', 1896),
(47, '14b', 959, 0, '', 'Argentina', 'Buenos Aires', 'La Plata', 1896),
(48, '1111', 1111, 1111, '1111', 'argetina', 'bens aires', 'la plata', 1900),
(50, '11', 11, 11, '11', '11', '11', '11', 11),
(51, '111', 11, 1, '11111', '1111', '111', '111', 111),
(52, '1', 1, 1, '1', '1', '1', '1', 1),
(500, 'wooden-walk', 85, 1, 'A', 'Polinesia Francesa', 'Islas de la Sociedad', 'Bora Bora', 7896),
(501, 'P.Sherman Calle Wallaby', 42, 1, 'A', 'Australia', 'New South Wales', 'Sydney', 987),
(502, 'Avenida 1', 817, 3, 'A', 'Argentina', 'Buenos Aires', 'La Plata', 1900),
(503, 'Avenida 32', 657, 1, 'A', 'Argentina', 'Buenos Aires', 'Balcarce', 1646);

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
  `telefono` varchar(100) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `contrasena`, `nombre`, `apellido`, `rol`, `dni`, `id_ubicacion`, `email`, `telefono`, `fecha_registro`) VALUES
(1, 'admin', 'administrador', 'Ariel', 'Sobrado', 0, 99999999, 1, 'asobrado@gmail.com', '99999', '0000-00-00'),
(4, 'Kirizzi', '123456', 'Ivone Paula', 'Rizzi', 2, 18459495, 15, 'kirizzi@hotmail.com.ar', '4724112', '0000-00-00'),
(11, 'Agusdeluca96', 'paiputito', 'Agustin', 'De Luca', 1, 39557795, 15, 'agus.lp.96@hotmail.com', '2216063263', '0000-00-00'),
(12, 'Ramicortes94', 'paiputete', 'Ramiro Roman', 'Cortes', 1, 38320362, 16, 'ramirocortes7@gmail.com', '2216022281', '0000-00-00');

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
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_propiedad` (`id_propiedad`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`id_propiedad`),
  ADD KEY `id_tipo_propiedad` (`id_tipo_propiedad`),
  ADD KEY `id_ubicacion` (`id_ubicacion`);

--
-- Indices de la tabla `reserva_propiedad`
--
ALTER TABLE `reserva_propiedad`
  ADD PRIMARY KEY (`id_reserva_propiedad`),
  ADD KEY `id_huésped` (`id_huésped`),
  ADD KEY `id_propiedad` (`id_propiedad`);

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
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `id_propiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `reserva_propiedad`
--
ALTER TABLE `reserva_propiedad`
  MODIFY `id_reserva_propiedad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_propiedad`
--
ALTER TABLE `tipo_propiedad`
  MODIFY `id_tipo_propiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
