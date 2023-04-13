-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2023 a las 13:31:05
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_de_frecuencias`
--

CREATE TABLE `plan_de_frecuencias` (
  `id_plan_de_frecuencia` int(10) NOT NULL,
  `nombre_paso_nivel` varchar(250) NOT NULL,
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
(18, 29023, 'Bloise', 'María Cecilia', '', 38325405, '1994-08-14', 'Garibaldi 105', '2966545329', 'cecilia.bloise@trenesargentinos.gob.ar', 'Pasante', '-', '-', '2022-09-01', 1, 29023, 'img_b5b1c9f6ac48b1ef18e216d47be27fb2.jpg'),
(32, 7012, 'Ramirez', 'Walter Daniel', 'WDR', 21553553, '1970-05-19', 'Milan 1989-Haedo-Bs As', '1132489276', 'walter.ramirez@trenesargentinos.gob.ar', 'Coordinador', '-', '-', '2006-08-01', 1, 7012, 'img_d6353f536674ddffd775b69b7cef35d5.jpg'),
(33, 5018, 'Menendez', 'Julia Elina', 'JEM', 27528224, '1979-07-30', '12 337', '-', 'julia.menendez@trenesargentinos.gob.ar', 'OFICIAL', '-', '-', '2003-02-14', 2, 5018, 'img_57600b98d54d1be4cf6570f08c7773ce.jpg'),
(34, 22736, 'Cardozo', 'Ignacio Ariel', 'Nacho', 35760588, '1992-08-21', 'c/154 Nº6004', '1160422433', 'ignacio.cardozo@trenesargentinos.gov.ar', 'Asistente Tecnico', '----', '----', '2018-08-06', 1, 22736, 'img_286deb89269e5af4d5eb0c17afa6bfab.jpg'),
(36, 240, 'Gauto', 'Gerardo Daniel', '', 0, '0000-00-00', '', '', '', 'SUP', '', '', '0000-00-00', 3, 240, 'img_21ed30e12cb4eb0dbdc4257bb65f1605.jpg'),
(37, 1398, 'Bustos', 'Juan Adolfo', '', 0, '0000-00-00', '', '', '', 'SUP', '', '', '0000-00-00', 3, 240, 'img_2776696cfa648b4277f7ff76507404ed.jpg'),
(38, 1427, 'Carbone ', 'Pablo Daniel', '', 0, '0000-00-00', '', '', '', 'SUP', '', '', '0000-00-00', 3, 1427, 'img_8d2d89a68825ea9503e9efc31c4dbd6f.jpg'),
(39, 2599, 'Epelbaum', 'Cintia Rosa', '', 0, '0000-00-00', '', '', '', 'OP. ESP', '', '', '0000-00-00', 2, 2599, 'img_55d61a932538ad8b1eba9db3cdbcd9d1.jpg'),
(40, 3292, 'Farias Santos', 'Omar', '', 0, '0000-00-00', '', '', '', 'OF. ESP', '', '', '0000-00-00', 3, 3292, 'img_9e3249cc0de6dc64b0c2b34e3be94047.jpg'),
(41, 4105, 'Rodriguez', 'Paulo Cesar', '', 0, '0000-00-00', '', '', '', 'OF. ESP.', '', '', '0000-00-00', 3, 4105, 'img_d3438becd3e5eadddfa933ef2c7b93ff.jpg'),
(42, 4566, 'Acosta', 'Julio C', '', 0, '0000-00-00', '', '', '', 'OF. ESP.', '', '', '0000-00-00', 3, 4566, 'img_d8582737c10843aa10962ed4cca2ac63.jpg'),
(43, 5050, 'Mettica', 'Leonardo Julio', '', 0, '0000-00-00', '', '', '', 'OF. ESP.', '', '', '0000-00-00', 3, 5050, 'img_b90bf75498beda2215e89928847372db.jpg'),
(44, 5523, 'Salas', 'Daniel Martin', '', 0, '0000-00-00', '', '', '', 'Supervisor', '', '', '0000-00-00', 3, 5523, 'img_e15b7e469af469cb71cfcc2979a72f15.jpg'),
(45, 6009, 'Legidos', 'Sebastian Ezequiel', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 6009, 'img_e2969a394bd52f0394140aee02cb2ab3.jpg'),
(46, 6120, 'Teves', 'Juan Pablo', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 6120, 'img_7e2bed39bef7294c3b5569dc713b3416.jpg'),
(47, 6882, 'Veron', 'Maximiliano Andres', '', 0, '0000-00-00', '', '', '', 'Oficial', '', '', '0000-00-00', 3, 6882, 'img_5f744d7a21fc5569e8b6c59da8d9ebf9.jpg'),
(48, 8225, 'Challen', 'Ricardo Alberto', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 7012, 'img_7e2bed39bef7294c3b5569dc713b3416.jpg'),
(49, 8271, 'Rueda', 'Carlos Daniel', '', 0, '0000-00-00', '', '', '', 'Supervisor', '', '', '0000-00-00', 3, 8271, 'img_70f2af9699d595a439392756a5914daa.jpg'),
(50, 8766, 'Duarte', 'Juan Pablo', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 8766, 'img_5f744d7a21fc5569e8b6c59da8d9ebf9.jpg'),
(51, 9220, 'Ledesma', 'Emiliano Diego', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 9220, 'img_1330a1fefc4ad3b33b5e97954213caca.jpg'),
(52, 9462, 'Arrejoria', 'Victor Eduardo', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 9462, 'img_70f2af9699d595a439392756a5914daa.jpg'),
(53, 10088, 'Gonzalez', 'Alexis Fabian', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 10088, 'img_de848bc8c5debe5b98870f7bea2c003e.jpg'),
(54, 10103, 'Revel ', 'Danilo Maximiliano', '', 0, '0000-00-00', '', '', '', 'Supervisor', '', '', '0000-00-00', 3, 10103, 'img_2b9b0376336df3d71c7cf9dc5cd60682.jpg'),
(55, 12153, 'Rojas ', 'Ricardo Emanual', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 12153, 'img_daaf73cb710b7b9fb85e1efd66502727.jpg'),
(56, 12498, 'Jeanbeau', 'Darío Sebastián', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 12498, 'img_5d4c9a8d9903d9b3678bd060bc7e40ac.jpg'),
(57, 12851, 'Lopez', 'Javier', '', 0, '0000-00-00', '', '', '', 'Oficial', '', '', '0000-00-00', 3, 12851, 'img_6dcfea181f8d6e2d309d029ad1ac4a7e.jpg'),
(58, 13030, 'Valdez ', 'Ricardo Luis', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 13030, 'img_2b9b0376336df3d71c7cf9dc5cd60682.jpg'),
(59, 13460, 'Ferez', 'Joel Elias', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 13460, 'img_b2467a6e3b6804847dfacaac6789d65d.jpg'),
(60, 13502, 'Burgos', 'Jungen Guillermo', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 13502, 'img_3008b15551781098a620f9af0af0304d.jpg'),
(61, 14440, 'Sanchez ', 'Roberto Armando', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 14440, 'img_305a5c93f0bdc23e545d65fd403bb987.jpg'),
(62, 15347, 'Corbalan', 'Jorge Damian', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 15347, 'img_e05d1d18a1daaf9a620a62eca25d7fb9.jpg'),
(63, 15372, 'Prol ', 'Claudio David', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 15372, 'img_f2aa147ed5616a6e76420dbb98e9818c.jpg'),
(64, 15932, 'Gianni', 'Juan Manuel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 15932, 'img_6752327b7f283404432b13251ce1b46a.jpg'),
(65, 15992, 'Seura', 'Carlos Lucas', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 15992, 'img_a191374672f27ab6be809be769434897.jpg'),
(66, 16129, 'Moyano ', 'Evaristo', '', 0, '0000-00-00', '', '', '', 'Supervisor', '', '', '0000-00-00', 3, 16129, 'img_5af1316969d3f8f5888264874ff8edca.jpg'),
(67, 17064, 'Paniagua', 'Edgardo Roman', '', 0, '0000-00-00', '', '', '', 'Oficial', '', '', '0000-00-00', 3, 17064, 'img_de848bc8c5debe5b98870f7bea2c003e.jpg'),
(68, 17137, 'Albadrin ', 'Maximiliano Daniel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 17137, 'img_661f619141c9b4cbbbdc97249910c163.jpg'),
(69, 17143, 'Denofrio', 'Gabriel Edgardo', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 17143, 'img_81c2d4ef83bec20a171d3b453bda2ddb.jpg'),
(70, 17537, 'Obregon', 'Lisandro Emanuel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 17537, 'img_6752327b7f283404432b13251ce1b46a.jpg'),
(71, 17790, 'Lehr', 'Arturo Mario', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 17790, 'img_b2467a6e3b6804847dfacaac6789d65d.jpg'),
(72, 18491, 'Viva', 'Gonzalo Damian', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 18491, 'img_d65b6a8c348fe35a05e9ce7c72176896.jpg'),
(73, 18601, 'Cisterna', 'Rodrigo Alejandro', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 18601, 'img_c7e58791373fe8a9dea24c7ac74b6a26.jpg'),
(74, 18992, 'Marquez', 'Luis Alberto', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 18992, 'img_3008b15551781098a620f9af0af0304d.jpg'),
(75, 21049, 'Spaciuck', 'German', '', 0, '0000-00-00', '', '', '', 'Op', '', '', '0000-00-00', 3, 21049, 'img_6752327b7f283404432b13251ce1b46a.jpg'),
(76, 21382, 'Barbona ', 'Carlos Gabriel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 21382, 'img_e629d780185859c227f058e7919caf0b.jpg'),
(77, 21383, 'Canuhe', 'Sergio Daniel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 21383, 'img_6ce142c66bc96e8d4b288722741767a8.jpg'),
(78, 21392, 'Ramirez', 'Nestor Sebastian', '', 0, '0000-00-00', '', '', '', 'Of. Esp.', '', '', '0000-00-00', 3, 21392, 'img_f93a6ec3f43e9109211e3df4b51a4bed.jpg'),
(79, 22029, 'Juszczuk', 'Derek', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 22029, 'img_0c399f92055316fb6e247781616e1788.jpg'),
(80, 22761, 'Gonazalez', 'Lucas Leonel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 22761, 'img_81c2d4ef83bec20a171d3b453bda2ddb.jpg'),
(81, 22766, 'Manco', 'Hector Oscar', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 22766, 'img_bcc258f5ae02b20295f1806a5c304d0e.jpg'),
(82, 22770, 'Ramirez', 'Fabricio Maximiliano', '', 0, '0000-00-00', '', '', '', 'Oficial', '', '', '0000-00-00', 3, 22770, 'img_f39fda6372e63ef06d58c815badc0427.jpg'),
(83, 22772, 'Sanz', 'Federico Emanuel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 22772, 'img_b79b15eb945ebe55694ce98e152f52e9.jpg'),
(84, 22771, 'Romero', 'Ezequiel Matias', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 22771, 'img_3a2a4fca019091c1840c50c008be4879.jpg'),
(85, 22803, 'Barraza', 'Diego', '', 0, '0000-00-00', '', '', '', 'Op.', '', '', '0000-00-00', 3, 22803, 'img_a3fe9fd92596699f72f10a33abe13716.jpg'),
(86, 22861, 'Mealla', 'Enzo Nahuel', '', 0, '0000-00-00', '', '', '', 'Op.', '', '', '0000-00-00', 3, 22861, 'img_4d72b7498cbf1d68c232cc4b14fad541.jpg'),
(87, 22900, 'Almiron', 'Jonathan Ezequiel', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 22900, 'img_ad8dec02fb2a6337c3d7a99702b3afbf.jpg'),
(88, 22912, 'Diaz', 'Facundo Javier', '', 0, '0000-00-00', '', '', '', 'Op.', '', '', '0000-00-00', 3, 22912, 'img_91b2ddc4088e9300a49f72b4a9ae63b3.jpg'),
(89, 22929, 'Monsech Paez', 'Alexander', '', 0, '0000-00-00', '', '', '', 'F/C', '', '', '0000-00-00', 3, 22929, 'img_b134e991b26d9fee38e04ea4d310f68f.jpg'),
(90, 22943, 'Ybarra', 'Facundo Ignacio', '', 0, '0000-00-00', '', '', '', 'Op. Esp.', '', '', '0000-00-00', 3, 22943, 'img_65489b1da1e59edd21eb7262190346e9.jpg');

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
  MODIFY `id_manuales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `planos_bosques`
--
ALTER TABLE `planos_bosques`
  MODIFY `id_plano_bosques` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `planos_laplata`
--
ALTER TABLE `planos_laplata`
  MODIFY `id_plano_laPlata` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `planos_quilmes`
--
ALTER TABLE `planos_quilmes`
  MODIFY `id_plano_quilmes` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `plan_de_frecuencias`
--
ALTER TABLE `plan_de_frecuencias`
  MODIFY `id_plan_de_frecuencia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

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
