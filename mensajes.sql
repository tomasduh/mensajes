-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2022 a las 22:56:26
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mensajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_emp` int(11) NOT NULL,
  `Nombre_emp` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_emp`, `Nombre_emp`) VALUES
(1, 'coex'),
(2, 'Asd'),
(3, 'Asd'),
(4, 'Tomas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `correo` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `usu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`correo`, `pass`, `usu`) VALUES
('santandersoy@gmail.com', '12345678', 'Prueba'),
('pruebascorreo421@gmail.com', '123456789', 'pruebascorreo421@gmail.com'),
('[pruebascorreo421@gmail.com]', '[12345]', '[pruebascorreo]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(100) NOT NULL,
  `id_empresa` int(100) NOT NULL,
  `mensaje` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id`, `id_empresa`, `mensaje`, `fecha`) VALUES
(1, 4, 'wqefrdtyguh', '2022-04-08 21:21:25'),
(2, 4, 'wqefrdtyguh', '2022-04-08 21:21:43'),
(3, 4, 'wqefrdtyguh', '2022-04-08 21:22:56'),
(4, 4, 'wefsdcgvb', '2022-04-08 21:24:35'),
(5, 1, 'wefsdcgvb', '2022-04-08 21:25:44'),
(6, 1, 'weregthuj', '2022-04-08 21:27:01'),
(7, 1, '12345y6uio', '2022-04-08 21:28:10'),
(8, 1, '123456789', '2022-04-08 21:29:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `id_usr` int(11) NOT NULL,
  `Documento_usr` varchar(100) NOT NULL,
  `Nombre_usr` varchar(150) NOT NULL,
  `Apellido_usr` varchar(200) NOT NULL,
  `Email_usr` varchar(100) NOT NULL,
  `Empresa_usr` int(11) NOT NULL,
  `Cargo_usr` varchar(100) NOT NULL,
  `Profesion_usr` int(11) NOT NULL,
  `Pais_usr` varchar(100) NOT NULL,
  `Estado_usr` varchar(100) NOT NULL,
  `Direccion_usr` varchar(100) NOT NULL,
  `Telefono_usr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`id_usr`, `Documento_usr`, `Nombre_usr`, `Apellido_usr`, `Email_usr`, `Empresa_usr`, `Cargo_usr`, `Profesion_usr`, `Pais_usr`, `Estado_usr`, `Direccion_usr`, `Telefono_usr`) VALUES
(1, '1005342884', 'tomas', 'duarte', 'tomasduh421@gmail.com', 1, '', 0, 'colombia', 'santander', '', '573125097994'),
(2, '1005163733', 'simon', 'hernandez', 'simonhl9@gmail.com', 1, '', 0, 'colombia', 'santander', '', '573174965575'),
(3, '1', 'Simon Camilo', 'Hernandez Landazabal', 'simonh419@gmail.com', 1, '1', 1, 'Colombia', 'Santander', 'Calle 35 #32-85, Mejoras públicas.', '3174965575'),
(4, '1234567', 'Felipe', 'Pico', 'pipepico2001@gmail.com', 4, 'desarrollador', 0, 'Colombia', 'Santander', 'Wefewfwef', '573144882984'),
(5, '1', 'Simon Camilo', 'Hernandez Landazabal', 'simonh419@gmail.com', 1, '1', 1, 'Colombia', 'Santander', 'Calle 35 #32-85, Mejoras públicas.', '3174965575');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`id_usr`),
  ADD KEY `Empresa_usr` (`Empresa_usr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_emp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD CONSTRAINT `tbl_productos_ibfk_1` FOREIGN KEY (`Empresa_usr`) REFERENCES `empresa` (`id_emp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
