-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2023 a las 16:36:18
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_trenes_argentinos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_roles`
--

CREATE TABLE `asignacion_roles` (
  `id_asignacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manuales`
--

CREATE TABLE `manuales` (
  `id_manuales` int(11) NOT NULL,
  `carpeta` varchar(250) NOT NULL,
  `manuales` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `manuales`
--

INSERT INTO `manuales` (`id_manuales`, `carpeta`, `manuales`, `url`) VALUES
(13, 'Contador de Ejes', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planos_bosques`
--

CREATE TABLE `planos_bosques` (
  `id_plano_bosques` int(10) NOT NULL,
  `nombre_bosques` varchar(250) NOT NULL,
  `descripcion_bosques` varchar(250) NOT NULL,
  `categoria_bosques` varchar(250) NOT NULL,
  `plano_bosques` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planos_bosques`
--

INSERT INTO `planos_bosques` (`id_plano_bosques`, `nombre_bosques`, `descripcion_bosques`, `categoria_bosques`, `plano_bosques`) VALUES
(1, 'gfdf', 'dfgdf', 'dfgdf', 'ef97f8fde4968b4a0faa50d52ab85bbe_gfdfdfgdf.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planos_laplata`
--

CREATE TABLE `planos_laplata` (
  `id_plano_laPlata` int(10) NOT NULL,
  `nombre_laPlata` varchar(250) NOT NULL,
  `descripcion_laPlata` varchar(250) NOT NULL,
  `categoria_laPlata` varchar(250) NOT NULL,
  `fecha_laPlata` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `plano_laPlata` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planos_laplata`
--

INSERT INTO `planos_laplata` (`id_plano_laPlata`, `nombre_laPlata`, `descripcion_laPlata`, `categoria_laPlata`, `fecha_laPlata`, `plano_laPlata`) VALUES
(1, 'gdd', 'dfg', 'dfg', '2023-04-19 12:05:55', '015879b98f7531485e736bc06dab6082_gdddfg.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planos_quilmes`
--

CREATE TABLE `planos_quilmes` (
  `id_plano_quilmes` int(10) NOT NULL,
  `nombre_quilmes` varchar(250) NOT NULL,
  `descripcion_quilmes` varchar(250) NOT NULL,
  `categoria_quilmes` varchar(250) NOT NULL,
  `fecha_quilmes` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `plano_quilmes` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planos_quilmes`
--

INSERT INTO `planos_quilmes` (`id_plano_quilmes`, `nombre_quilmes`, `descripcion_quilmes`, `categoria_quilmes`, `fecha_quilmes`, `plano_quilmes`) VALUES
(1, 'Plano de vias y senales', 'Progresivas de instalación de equipamiento en campo', 'Quilmes Central', '2023-04-13 11:36:46', 'e9898a68c4efe97301ab246f3f97f203_Plano de vias y senalesQuilmes Central.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_de_frecuencias`
--

CREATE TABLE `plan_de_frecuencias` (
  `id_plan_de_frecuencia` int(10) NOT NULL,
  `nombre_paso_nivel` varchar(250) NOT NULL,
  `ramal` varchar(250) NOT NULL,
  `frecuencia_asc` varchar(250) NOT NULL,
  `frecuencia_desc` varchar(250) NOT NULL,
  `señal_asc` varchar(250) NOT NULL,
  `señal_desc` varchar(250) NOT NULL,
  `tension_asc` varchar(250) NOT NULL,
  `tension_desc` varchar(250) NOT NULL,
  `filtro` varchar(250) NOT NULL,
  `ubicacion` varchar(250) NOT NULL,
  `plan_de_frecuencia` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plan_de_frecuencias`
--

INSERT INTO `plan_de_frecuencias` (`id_plan_de_frecuencia`, `nombre_paso_nivel`, `ramal`, `frecuencia_asc`, `frecuencia_desc`, `señal_asc`, `señal_desc`, `tension_asc`, `tension_desc`, `filtro`, `ubicacion`, `plan_de_frecuencia`) VALUES
(1, 'Gral Otero', 'PZ-PL', '970-A', '1180-C', '-', '-', '-', '-', 'No', '-', ''),
(3, 'San Vicente ', 'PZ-PL', '1450-A', '1180-C', '-', '-', '-', '-', 'No', '-', ''),
(4, 'Bahia Blanca', 'PZ-PL', '645-A', '4000-C', '-', '-', '-', '-', 'Si', '5-11-4', ''),
(7, 'PP Ramella', 'PZ-PL', '1450-D', '790-D', '-', '-', '-', '-', 'Si', '5-14-1', ''),
(8, 'PP Castro Barros', 'PZ-PL', '2140-C', '790-D', '-', '-', '-', '-', 'Si', '5-14-24', ''),
(9, 'Las Heras', 'PZ-PL', '970-F', '1180-A', '-', '-', '-', '-', 'No', '-', ''),
(10, 'Castelli', 'PZ-PL', '3240-D', '970-A', '-', '-', '-', '-', 'No', '-', ''),
(11, 'Conesa', 'PZ-PL', '1450-F', '790-A', '-', '-', '-', '-', 'Si', '5-16-18', ''),
(14, 'Primera Junta', 'PZ-PL', '1970-E', '1180-F', '-', '-', '-', '-', 'No', '-', ''),
(15, 'Dorrego', 'PZ-PL', '3240-F', '4000-F', '-', '-', '-', '-', 'Si', '5-18-30', ''),
(16, 'Varela', 'PZ-PL', '645-E', '790-F', '-', '-', '-', '-', 'Si', '5-21-14', ''),
(17, 'Calle 7', 'PZ-PL', '2140-D', '2630-D', '-', '-', '-', '-', 'No', '-', ''),
(18, 'Calle 14', 'PZ-PL', '1450-E', '1770-F', '-', '-', '-', '-', 'Si', '5-23-12', ''),
(20, 'PP Sevilla', 'PZ-PL', '970-D', '1180-D', '-', '-', '-', '-', 'No', '-', ''),
(21, 'Monte Chingolo', 'PZ-PL', '1450-C', '1770-D', '-', '-', '-', '-', 'No', '-', ''),
(22, 'Calle 46', 'PZ-PL', '645-C', '790-C', '-', '-', '-', '-', 'Si', '5-27-30/32', ''),
(23, 'Otto Bemberg', 'PZ-PL', '2140-A', '2630-C', '-', '-', '-', '-', 'Si', '15-28-26/30', ''),
(24, 'Calle 502', 'PZ-PL', '1450-A', '1770-C', '-', '-', '-', '-', 'No', '-', ''),
(26, 'Sevilla', 'BZ-BQ', '1450-A', '1770-C', '-', '-', '-', '-', 'Si', '13-26-09 / 13-26-04', ''),
(27, 'Calle 366', 'BZ-BQ', '645-D', '1180-E', '-', '-', '-', '-', 'No', '-', ''),
(28, 'Av. P. Mercedarios (calle 359)', 'BZ-BQ', '970-F', '790-A', '-', '-', '-', '-', 'Si', '13-27-24 / 13-27-28', ''),
(29, 'Gral. Belgrano', 'BZ-BQ', '3240-C', '4000-E', '-', '-', '-', '-', 'Si', '13-29-22', ''),
(32, 'Hilario Lagos', 'Empalme Berazategui - Bosques', '3240-A', '4000-C', '-', '-', '-', '-', 'Si', '11-30-14', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_pan_años_tu`
--

CREATE TABLE `registros_pan_años_tu` (
  `id_pan_año_tu` int(11) NOT NULL,
  `id_pan_tu` int(11) NOT NULL,
  `pan_año_tu` varchar(250) NOT NULL,
  `registros_pan_tu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_pan_tu`
--

CREATE TABLE `registros_pan_tu` (
  `id_pan_tu` int(11) NOT NULL,
  `pan_tu` varchar(250) NOT NULL,
  `pan_año_tu` varchar(250) NOT NULL,
  `registros_pan_tu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros_pan_tu`
--

INSERT INTO `registros_pan_tu` (`id_pan_tu`, `pan_tu`, `pan_año_tu`, `registros_pan_tu`) VALUES
(30, 'Diag 80', '', ''),
(31, 'Calle 44', '', ''),
(32, 'Calle 52', '', ''),
(33, 'Diag 80', '2010', ''),
(34, 'Calle 44', '', ''),
(35, 'Calle 52', '', ''),
(36, '', '2005', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador General'),
(2, 'Administrador Personal'),
(3, 'Mecanico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `legajo` int(6) NOT NULL,
  `apellido` text NOT NULL,
  `nombre` text NOT NULL,
  `alias` varchar(250) NOT NULL,
  `dni` int(8) NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `puesto` varchar(250) NOT NULL,
  `habilitaciones` varchar(400) NOT NULL,
  `supervisor_cargo` varchar(250) NOT NULL,
  `fecha_de_ingreso_a_la_empresa` date NOT NULL,
  `id_rol` int(11) NOT NULL,
  `contraseña` int(6) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `legajo`, `apellido`, `nombre`, `alias`, `dni`, `fecha_de_nacimiento`, `direccion`, `celular`, `mail`, `puesto`, `habilitaciones`, `supervisor_cargo`, `fecha_de_ingreso_a_la_empresa`, `id_rol`, `contraseña`, `imagen`) VALUES
(18, 29023, 'Bloise', 'María Cecilia', 'Ceci', 38325405, '1994-08-14', 'Garibaldi 105', '2966545329', 'cecilia.bloise@trenesargentinos.gob.ar', 'Pasante', '-', '-', '2022-09-01', 1, 29023, 'img_fb695bc77682817219f562105fedfa85.jpg'),
(32, 7012, 'Ramirez', 'Walter Daniel', 'WDR', 21553553, '1970-05-19', 'Milan 1989-Haedo-Bs As', '1132489276', 'walter.ramirez@trenesargentinos.gob.ar', 'Coordinador', '-', '-', '2006-08-01', 1, 7012, 'img_d6353f536674ddffd775b69b7cef35d5.jpg'),
(33, 5018, 'Menendez', 'Julia Elina', 'JEM', 27528224, '1979-07-30', '12 337', '', 'julia.menendez@trenesargentinos.gob.ar', 'OFICIAL', '-', '-', '2003-02-14', 2, 5018, 'img_60ace57b9d3429f8f06f0ea67fb513e7.jpg'),
(34, 22736, 'Cardozo', 'Ignacio Ariel', 'Nacho', 35760588, '1992-08-21', 'c/154 Nº6004', '1160422433', 'ignacio.cardozo@trenesargentinos.gov.ar', 'Asistente Tecnico', '-', '-', '2018-08-06', 1, 22736, 'img_af4b713915dfda06082205fb528064e9.jpg'),
(36, 240, 'Gauto', 'Gerardo Daniel', '', 0, '0000-00-00', '', '', '', 'SUP', '', '-', '0000-00-00', 3, 240, 'img_950d467ac0c9d4ff583efc2aeb490795.jpg'),
(37, 1398, 'Bustos', 'Juan Adolfo', '', 0, '0000-00-00', '', '', '', 'SUP', '', '', '0000-00-00', 3, 240, 'img_2776696cfa648b4277f7ff76507404ed.jpg'),
(38, 1427, 'Carbone ', 'Pablo Daniel', '', 0, '0000-00-00', '', '', '', 'SUP', '', '', '0000-00-00', 3, 1427, 'img_8d2d89a68825ea9503e9efc31c4dbd6f.jpg'),
(39, 2599, 'Epelbaum', 'Cintia Rosa', '', 0, '0000-00-00', '', '', '', 'OP. ESP', '', '-', '0000-00-00', 2, 2599, 'img_65ca9cf9b4b7321858dff792b4bbe4e7.jpg'),
(40, 3292, 'Farias Santos', 'Omar', '', 0, '0000-00-00', '', '', '', 'OF. ESP', '', '', '0000-00-00', 3, 3292, 'img_9e3249cc0de6dc64b0c2b34e3be94047.jpg'),
(41, 4105, 'Rodriguez', 'Paulo Cesar', '-', 0, '0000-00-00', '', '', '', 'OF. ESP.', '', '-', '0000-00-00', 3, 4105, 'img_3d1eca41e7db209ac3647cbe06e7eb3a.jpg'),
(42, 4566, 'Acosta', 'Julio Cesar', '', 0, '0000-00-00', '', '', '', 'OF. ESP.', '', '-', '0000-00-00', 3, 4566, 'img_3d2f51ab50d87688466d1d156b5125a4.jpg'),
(43, 5050, 'Mettica', 'Leonardo Julio', '', 0, '0000-00-00', '', '', '', 'OF. ESP.', '', '-', '0000-00-00', 3, 5050, 'img_18c3b29a80145caafb9223d053518c23.jpg'),
(44, 5523, 'Salas', 'Daniel Martin', '', 0, '0000-00-00', '', '', '', 'Supervisor', '', '', '0000-00-00', 3, 5523, 'img_e15b7e469af469cb71cfcc2979a72f15.jpg'),
(45, 6009, 'Legidos', 'Sebastian Ezequiel', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '-', '0000-00-00', 3, 6009, 'img_8518eb176c2bf14aa521cad6aa3d9124.jpg'),
(46, 6120, 'Teves', 'Juan Pablo', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '-', '0000-00-00', 3, 6120, 'img_49a4280c8e9b783e980cd2b075b0fee4.jpg'),
(47, 6882, 'Veron', 'Maximiliano Andres', '', 0, '0000-00-00', '', '', '', 'Oficial', '', '', '0000-00-00', 3, 6882, 'img_5f744d7a21fc5569e8b6c59da8d9ebf9.jpg'),
(48, 8225, 'Challen', 'Ricardo Alberto', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 7012, 'img_7e2bed39bef7294c3b5569dc713b3416.jpg'),
(49, 8271, 'Rueda', 'Carlos Daniel', '', 0, '0000-00-00', '', '', '', 'Supervisor', '', '-', '0000-00-00', 3, 8271, 'img_93ec142a6ae02d72568fd3cf4a553be0.jpg'),
(50, 8766, 'Duarte', 'Juan Pablo', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '-', '0000-00-00', 3, 8766, 'img_e0feccb07e4368bdf739c5ce009b2689.jpg'),
(51, 9220, 'Ledesma', 'Emiliano Diego', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 9220, 'img_1330a1fefc4ad3b33b5e97954213caca.jpg'),
(52, 9462, 'Arrejoria', 'Victor Eduardo', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '-', '0000-00-00', 3, 9462, 'img_79d911b8b5c3f7ef09f76cfc487b3fc6.jpg'),
(53, 10088, 'Gonzalez', 'Alexis Fabian', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '-', '0000-00-00', 3, 10088, 'img_49a2e437bf129f46e7bfb40c2c47e713.jpg'),
(54, 10103, 'Revel ', 'Danilo Maximiliano', '', 0, '0000-00-00', '', '', '', 'Supervisor', '', '-', '0000-00-00', 3, 10103, 'img_67f3288ca4cf060fb6aff24b24b054f3.jpg'),
(55, 12153, 'Rojas ', 'Ricardo Emanual', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 12153, 'img_daaf73cb710b7b9fb85e1efd66502727.jpg'),
(56, 12498, 'Jeanbeau', 'Darío Sebastián', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 12498, 'img_5d4c9a8d9903d9b3678bd060bc7e40ac.jpg'),
(57, 12851, 'Lopez', 'Javier', '', 0, '0000-00-00', '', '', '', 'Oficial', '', '-', '0000-00-00', 3, 12851, 'img_05234fb65efa39cba240841c88fb3599.jpg'),
(58, 13030, 'Valdez ', 'Ricardo Luis', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 13030, 'img_2b9b0376336df3d71c7cf9dc5cd60682.jpg'),
(59, 13460, 'Ferez', 'Joel Elias', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 13460, 'img_b2467a6e3b6804847dfacaac6789d65d.jpg'),
(60, 13502, 'Burgos', 'Jungen Guillermo', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 13502, 'img_3008b15551781098a620f9af0af0304d.jpg'),
(61, 14440, 'Sanchez ', 'Roberto Armando', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 14440, 'img_305a5c93f0bdc23e545d65fd403bb987.jpg'),
(62, 15347, 'Corbalan', 'Jorge Damian', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 15347, 'img_e05d1d18a1daaf9a620a62eca25d7fb9.jpg'),
(63, 15372, 'Prol ', 'Claudio David', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '-', '0000-00-00', 3, 15372, 'img_ca06d0f8f13035129c3a662b723dfba0.jpg'),
(64, 15932, 'Gianni', 'Juan Manuel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 15932, 'img_6752327b7f283404432b13251ce1b46a.jpg'),
(65, 15992, 'Seura', 'Carlos Lucas', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '-', '0000-00-00', 3, 15992, 'img_aaca8762243e815be4047214443e4967.jpg'),
(66, 16129, 'Moyano ', 'Evaristo', '', 0, '0000-00-00', '', '', '', 'Supervisor', '', '', '0000-00-00', 3, 16129, 'img_5af1316969d3f8f5888264874ff8edca.jpg'),
(67, 17064, 'Paniagua', 'Edgardo Roman', '', 0, '0000-00-00', '', '', '', 'Oficial', '', '', '0000-00-00', 3, 17064, 'img_de848bc8c5debe5b98870f7bea2c003e.jpg'),
(68, 17137, 'Albadrin ', 'Maximiliano Daniel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 17137, 'img_661f619141c9b4cbbbdc97249910c163.jpg'),
(69, 17143, 'Denofrio', 'Gabriel Edgardo', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 17143, 'img_81c2d4ef83bec20a171d3b453bda2ddb.jpg'),
(70, 17537, 'Obregon', 'Lisandro Emanuel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 17537, 'img_6752327b7f283404432b13251ce1b46a.jpg'),
(71, 17790, 'Lehr', 'Arturo Mario', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 17790, 'img_b2467a6e3b6804847dfacaac6789d65d.jpg'),
(72, 18491, 'Viva', 'Gonzalo Damian', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '-', '0000-00-00', 3, 18491, 'img_538e4557b727f92d0056b36d5b8508e5.jpg'),
(73, 18601, 'Cisterna', 'Rodrigo Alejandro', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '-', '0000-00-00', 3, 18601, 'img_9e2bfd3c14d5b51b8f80951e269a0633.jpg'),
(74, 18992, 'Marquez', 'Luis Alberto', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 18992, 'img_3008b15551781098a620f9af0af0304d.jpg'),
(75, 21049, 'Spaciuck', 'German', '', 0, '0000-00-00', '', '', '', 'Op', '', '', '0000-00-00', 3, 21049, 'img_6752327b7f283404432b13251ce1b46a.jpg'),
(76, 21382, 'Barbona ', 'Carlos Gabriel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '-', '0000-00-00', 3, 21382, 'img_baf90df9d80778c8069f439cf1f7314a.jpg'),
(77, 21383, 'Canuhe', 'Sergio Daniel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '-', '0000-00-00', 3, 21383, 'img_6bd18e9217969b343406b04273c43b34.jpg'),
(78, 21392, 'Ramirez', 'Nestor Sebastian', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '-', '0000-00-00', 3, 21392, 'img_77a5d9c62c7e4a007e6ffc7d4c9e3b4f.jpg'),
(79, 22029, 'Juszczuk', 'Derek', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '-', '0000-00-00', 3, 22029, 'img_49581179a1504c9cc8d0aa66966d2c9a.jpg'),
(80, 22761, 'Gonazalez', 'Lucas Leonel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 22761, 'img_81c2d4ef83bec20a171d3b453bda2ddb.jpg'),
(81, 22766, 'Manco', 'Hector Oscar', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 22766, 'img_bcc258f5ae02b20295f1806a5c304d0e.jpg'),
(82, 22770, 'Ramirez', 'Fabricio Maximiliano', '', 0, '0000-00-00', '', '', '', 'Oficial', '', '-', '0000-00-00', 3, 22770, 'img_1fb4bd8e7d08f5477e3524aaf4c77575.jpg'),
(83, 22772, 'Sanz', 'Federico Emanuel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 22772, 'img_b79b15eb945ebe55694ce98e152f52e9.jpg'),
(84, 22771, 'Romero', 'Ezequiel Matias', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 22771, 'img_3a2a4fca019091c1840c50c008be4879.jpg'),
(85, 22803, 'Barraza', 'Diego', '', 0, '0000-00-00', '', '', '', 'Op.', '', '', '0000-00-00', 3, 22803, 'img_a3fe9fd92596699f72f10a33abe13716.jpg'),
(86, 22861, 'Mealla', 'Enzo Nahuel', '', 0, '0000-00-00', '', '', '', 'Op.', '', '-', '0000-00-00', 3, 22861, 'img_7d93340a9c1b6b6c7b4aa970e2ba08b9.jpg'),
(87, 22900, 'Almiron', 'Jonathan Ezequiel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '-', '0000-00-00', 3, 22900, 'img_1bb267a994aa8f0f6a5f83e33d791576.jpg'),
(88, 22912, 'Diaz', 'Facundo Javier', '', 0, '0000-00-00', '', '', '', 'Op.', '', '-', '0000-00-00', 3, 22912, 'img_47db4580f47e2d148a5e0d4efb88e7a5.jpg'),
(89, 22929, 'Monsech Paez', 'Alexander', '', 0, '0000-00-00', '', '', '', 'F/C', '', '', '0000-00-00', 3, 22929, 'img_b134e991b26d9fee38e04ea4d310f68f.jpg'),
(90, 22943, 'Ybarra', 'Facundo Ignacio', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '-', '0000-00-00', 3, 22943, 'img_00b4a9e4ae360c161c1301588d8a8efc.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion_roles`
--
ALTER TABLE `asignacion_roles`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `manuales`
--
ALTER TABLE `manuales`
  ADD PRIMARY KEY (`id_manuales`);

--
-- Indices de la tabla `planos_bosques`
--
ALTER TABLE `planos_bosques`
  ADD PRIMARY KEY (`id_plano_bosques`);

--
-- Indices de la tabla `planos_laplata`
--
ALTER TABLE `planos_laplata`
  ADD PRIMARY KEY (`id_plano_laPlata`);

--
-- Indices de la tabla `planos_quilmes`
--
ALTER TABLE `planos_quilmes`
  ADD PRIMARY KEY (`id_plano_quilmes`);

--
-- Indices de la tabla `plan_de_frecuencias`
--
ALTER TABLE `plan_de_frecuencias`
  ADD PRIMARY KEY (`id_plan_de_frecuencia`);

--
-- Indices de la tabla `registros_pan_años_tu`
--
ALTER TABLE `registros_pan_años_tu`
  ADD PRIMARY KEY (`id_pan_año_tu`),
  ADD KEY `id_pan_tu` (`id_pan_tu`);

--
-- Indices de la tabla `registros_pan_tu`
--
ALTER TABLE `registros_pan_tu`
  ADD PRIMARY KEY (`id_pan_tu`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `manuales`
--
ALTER TABLE `manuales`
  MODIFY `id_manuales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `planos_bosques`
--
ALTER TABLE `planos_bosques`
  MODIFY `id_plano_bosques` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `planos_laplata`
--
ALTER TABLE `planos_laplata`
  MODIFY `id_plano_laPlata` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `planos_quilmes`
--
ALTER TABLE `planos_quilmes`
  MODIFY `id_plano_quilmes` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `plan_de_frecuencias`
--
ALTER TABLE `plan_de_frecuencias`
  MODIFY `id_plan_de_frecuencia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `registros_pan_años_tu`
--
ALTER TABLE `registros_pan_años_tu`
  MODIFY `id_pan_año_tu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registros_pan_tu`
--
ALTER TABLE `registros_pan_tu`
  MODIFY `id_pan_tu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registros_pan_años_tu`
--
ALTER TABLE `registros_pan_años_tu`
  ADD CONSTRAINT `registros_pan_años_tu_ibfk_1` FOREIGN KEY (`id_pan_tu`) REFERENCES `registros_pan_tu` (`id_pan_tu`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
