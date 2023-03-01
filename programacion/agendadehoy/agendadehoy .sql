-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2022 a las 09:11:53
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agendadehoy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--
-- Creación: 13-10-2022 a las 08:27:00
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cif_empresa` varchar(15) NOT NULL,
  `area_empresa` varchar(150) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `telefono` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--
-- Creación: 13-10-2022 a las 08:27:00
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nombre_evento` varchar(2000) NOT NULL,
  `fecha_evento` date NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_tematica` int(11) NOT NULL,
  `precio` int(5) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--
-- Creación: 13-10-2022 a las 08:27:00
--

CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL,
  `nombre_provincia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `nombre_provincia`) VALUES
(1, 'Alava'),
(2, 'Albacete'),
(3, 'Alicante'),
(4, 'Almeria'),
(5, 'Asturias'),
(6, 'Avila'),
(7, 'Bajadoz'),
(8, 'Barcelona'),
(9, 'Burgos'),
(10, 'Caceres'),
(11, 'Cadiz'),
(12, 'Cantabria'),
(13, 'Castellon'),
(14, 'Ceuta'),
(15, 'Ciudad Real'),
(16, 'Cordoba'),
(17, 'Cuenca'),
(18, 'Girona'),
(19, 'Granada'),
(20, 'Guadalajara'),
(21, 'Guipuzcoa'),
(22, 'Huelva'),
(23, 'Huesca'),
(24, 'Islas Baleares'),
(25, 'Jaen'),
(26, 'A Coruña'),
(27, 'La Rioja'),
(28, 'Las Palmas'),
(29, 'Leon'),
(30, 'Lleida'),
(31, 'Lugo'),
(32, 'Madrid'),
(33, 'Malaga'),
(34, 'Melilla'),
(35, 'Murcia'),
(36, 'Navarra'),
(37, 'Ourense'),
(38, 'Palencia'),
(39, 'Pontevedra'),
(40, 'Salamanca'),
(41, 'Segovia'),
(42, 'Sevilla'),
(43, 'Soria'),
(44, 'Tarragona'),
(45, 'Tenerife'),
(46, 'Teruel'),
(47, 'Toledo'),
(48, 'Valencia'),
(49, 'Valladolid'),
(50, 'Vizcaya'),
(51, 'Zamora'),
(52, 'Zaragoza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tematica_evento`
--
-- Creación: 13-10-2022 a las 08:27:00
--

CREATE TABLE `tematica_evento` (
  `id_tematica` int(11) NOT NULL,
  `nombre_tematica` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tematica_evento`
--

INSERT INTO `tematica_evento` (`id_tematica`, `nombre_tematica`) VALUES
(1, 'Direccion de Empresa'),
(2, 'Creacion de Empresa'),
(3, 'Emprendimiento'),
(4, 'Habilidades Directivas'),
(5, 'Recursos Humanos'),
(6, 'Liderazgo'),
(7, 'Comunicacion'),
(8, 'Motivacion'),
(9, 'Marketing'),
(10, 'Ventas'),
(11, 'Atencion al cliente'),
(12, 'Medio ambiente'),
(13, 'Energia'),
(14, 'Economia'),
(15, 'Economia Circular'),
(16, 'Finanzas'),
(17, 'Fiscalidad'),
(18, 'Metaverso'),
(19, 'Tecnologia'),
(20, 'Innovacion'),
(21, 'Robotica'),
(22, 'Inteligencia Artificial'),
(23, 'Ciberseguridad'),
(24, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_eventos`
--
-- Creación: 13-10-2022 a las 08:27:00
--

CREATE TABLE `tipo_de_eventos` (
  `id_tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_de_eventos`
--

INSERT INTO `tipo_de_eventos` (`id_tipo`, `nombre_tipo`) VALUES
(1, 'Conferencias'),
(2, 'Foros'),
(3, 'Presentaciones y Lanzamientos'),
(4, 'Encuentros'),
(5, 'Mesas Redondas'),
(6, 'Masterclass'),
(7, 'Seminario'),
(8, 'Talleres'),
(9, 'Ferias'),
(10, 'Exposiciones'),
(11, 'Premios');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `fk_empresa` (`id_provincia`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `fk_eventos1` (`id_tipo`),
  ADD KEY `fk_eventos2` (`id_empresa`),
  ADD KEY `fk_eventos` (`id_provincia`),
  ADD KEY `fk_eventos4` (`id_tematica`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `tematica_evento`
--
ALTER TABLE `tematica_evento`
  ADD PRIMARY KEY (`id_tematica`);

--
-- Indices de la tabla `tipo_de_eventos`
--
ALTER TABLE `tipo_de_eventos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `tematica_evento`
--
ALTER TABLE `tematica_evento`
  MODIFY `id_tematica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tipo_de_eventos`
--
ALTER TABLE `tipo_de_eventos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`);

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_eventos` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`),
  ADD CONSTRAINT `fk_eventos1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_de_eventos` (`id_tipo`),
  ADD CONSTRAINT `fk_eventos2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `fk_eventos4` FOREIGN KEY (`id_tematica`) REFERENCES `tematica_evento` (`id_tematica`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
