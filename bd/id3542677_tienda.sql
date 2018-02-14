-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-12-2017 a las 17:23:45
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id3542677_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ARTICULO`
--

CREATE TABLE `ARTICULO` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `FOTO` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `STOCK` int(6) NOT NULL,
  `PRECIO` double NOT NULL,
  `DESCRIPCION` text COLLATE utf8_unicode_ci NOT NULL,
  `ID_SUBFAMILIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ARTICULO`
--

INSERT INTO `ARTICULO` (`ID`, `NOMBRE`, `FOTO`, `STOCK`, `PRECIO`, `DESCRIPCION`, `ID_SUBFAMILIA`) VALUES
(1, 'Metrópolis (1927) (DE) (Fritz Lang)', '20171210171811_metropolis.jpg', 200, 5.85, 'Futuro, año 2000. En la megalópolis de Metrópolis la sociedad se divide en dos clases, los ricos que tienen el poder y los medios de producción, rodeados de lujos, espacios amplios y jardines, y los obreros, condenados a vivir en condiciones dramáticas recluidos en un gueto subterráneo, donde se encuentra el corazón industrial de la ciudad. Un día Freder (Alfred Abel), el hijo del todoperoso Joh Fredersen (Gustav Frohlich), el hombre que controla la ciudad, descubre los duros aspectos laborales de los obreros tras enamorarse de María (Brigitte Helm), una muchacha de origen humilde, venerada por las clases bajas y que predica los buenos sentimientos y al amor. El hijo entonces advierte a su padre que los trabajadores podrían rebelarse.', 1),
(2, 'Mejor... imposible (1997) (US) (James L. Brooks)', '20171210171851_mejor imposible.jpg', 3000, 7.25, 'Melvin Udall (Jack Nicholson), un escritor maniático que padece un trastorno obsesivo-compulsivo, es el ser más desagradable y desagradecido que uno pueda tener como vecino en Nueva York. Entre sus rutinas está la de comer todos los días en una cafetería, donde le sirve Carol Connelly (Helen Hunt), camarera y madre soltera. Simon Nye (Greg Kinnear), un artista gay que vive en el apartamento contiguo al de Melvin, sufre constantemente su homofobia. De repente, un buen día, Melvin tiene que hacerse cargo de un pequeño perro aunque detesta los animales. La compañía del animal contribuirá a suavizar su carácter.', 2),
(3, 'El padrino (1972) (US) (Francis Ford Coppola)', '20171210171905_el_padrino.jpg', 1000, 6, 'América, años 40. Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Fredo (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de \'Il consigliere\' Tom Hagen (Robert Duvall), se niega a participar en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FACTURA`
--

CREATE TABLE `FACTURA` (
  `ID` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `ID_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FAMILIA`
--

CREATE TABLE `FAMILIA` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `FAMILIA`
--

INSERT INTO `FAMILIA` (`ID`, `DESCRIPCION`) VALUES
(1, 'Ciencia ficción'),
(2, 'Comedia'),
(3, 'Drama'),
(4, 'Acción'),
(5, 'Fantasía'),
(6, 'Terror'),
(7, 'Romance'),
(8, 'Musical'),
(9, 'Melodrama'),
(10, 'Suspense'),
(24, 'Histórico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LINEA`
--

CREATE TABLE `LINEA` (
  `ID` int(11) NOT NULL,
  `PRECIO` double NOT NULL,
  `CANTIDAD` int(5) NOT NULL,
  `ID_FACTURA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SUBFAMILIA`
--

CREATE TABLE `SUBFAMILIA` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `ID_FAMILIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `SUBFAMILIA`
--

INSERT INTO `SUBFAMILIA` (`ID`, `DESCRIPCION`, `ID_FAMILIA`) VALUES
(1, 'Robots', 1),
(2, 'Comedia romántica', 2),
(3, 'Mafia', 3),
(4, 'Slasher', 6),
(7, 'Superhéroes', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO`
--

CREATE TABLE `USUARIO` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `APELLIDOS` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `DIRECCION` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `PROVINCIA` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CORREO` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `CLAVE` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`ID`, `NOMBRE`, `APELLIDOS`, `DIRECCION`, `PROVINCIA`, `CORREO`, `CLAVE`) VALUES
(1, 'dfghaeth', 'etheth', 'aeryheh', 'aethteh', 'aethaeth@sgerf', '$2y$10$thpNJKzC.GdgDq1ZlFzm0uvKC.CAC3qpsKGglDqBziA3WqphzYJZW'),
(3, 'Prueba', 'Prueba', 'Prueba', 'Prueba', 'prueba@prueba', '$2y$10$BtRGMGIZv2TftXia6fw9fOfjFAqBye/1US0yKJjQ2ENgCNNZ.XS26'),
(5, 'Prueba', 'Prueba', 'Prueba', 'Prueba', 'prueba@prueba2', '$2y$10$.xVermdgLNrOXbtgq3nGBeWs0Tpz05/1XB6cm3TG1pVkcvxXmxFne'),
(6, 'Prueba', 'Prueba', 'Prueba', 'Prueba', 'prueba@prueba3', '$2y$10$C1o/ZcjRG5E/D8hFhdS5/ObJSGa2dp32eVScXJ8wsvD.LHaoL3Diy'),
(7, 'fj', 'dtytyh', 'rthrth', 'drthrth', 'sdthth@sdffdsg', '$2y$10$WT8Piiq/cEKYToWbhiaSz.zVb2HVuxEAXxKd1.OkHJDpDji9LuD/a'),
(8, 'PEPE', 'Pepito', 'Pepe', 'Pepito', 'pepe@pepe.com', '$2y$10$5Z7xMXmmH.EfTPc/1HECoO/4y/H3oP961z05mMgtVFIKxParDdKum'),
(9, 'prueba', 'sfgzg', 'kbkhv', 'kbvhv', 'hvkhsgg@fdsgfdh.com', '$2y$10$eJVKuFTKXAXjf7f3sEwG3.mdP7PVjLvLpc9a8k/FxCs7GWOzrMwk6'),
(10, 'Abel', 'Puertas Marquez', 'Calle Holanda, 2. ESC3. 3C', 'Sevilla', 'puertas.abel@gmail.com', '$2y$10$fHAaftHmgB/kVo/XYgaXcu.8xjD/AGT.M1fGGtMCCjiaHrb/1iyCi');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ARTICULO`
--
ALTER TABLE `ARTICULO`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_SUBFAMILIA` (`ID_SUBFAMILIA`);

--
-- Indices de la tabla `FACTURA`
--
ALTER TABLE `FACTURA`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Indices de la tabla `FAMILIA`
--
ALTER TABLE `FAMILIA`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `LINEA`
--
ALTER TABLE `LINEA`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_FACTURA` (`ID_FACTURA`);

--
-- Indices de la tabla `SUBFAMILIA`
--
ALTER TABLE `SUBFAMILIA`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_FAMILIA` (`ID_FAMILIA`);

--
-- Indices de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CORREO` (`CORREO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ARTICULO`
--
ALTER TABLE `ARTICULO`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `FACTURA`
--
ALTER TABLE `FACTURA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `FAMILIA`
--
ALTER TABLE `FAMILIA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `LINEA`
--
ALTER TABLE `LINEA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `SUBFAMILIA`
--
ALTER TABLE `SUBFAMILIA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ARTICULO`
--
ALTER TABLE `ARTICULO`
  ADD CONSTRAINT `ARTICULO_ibfk_2` FOREIGN KEY (`ID_SUBFAMILIA`) REFERENCES `SUBFAMILIA` (`ID`);

--
-- Filtros para la tabla `FACTURA`
--
ALTER TABLE `FACTURA`
  ADD CONSTRAINT `FACTURA_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `USUARIO` (`ID`);

--
-- Filtros para la tabla `LINEA`
--
ALTER TABLE `LINEA`
  ADD CONSTRAINT `LINEA_ibfk_1` FOREIGN KEY (`ID_FACTURA`) REFERENCES `FACTURA` (`ID`);

--
-- Filtros para la tabla `SUBFAMILIA`
--
ALTER TABLE `SUBFAMILIA`
  ADD CONSTRAINT `SUBFAMILIA_ibfk_1` FOREIGN KEY (`ID_FAMILIA`) REFERENCES `FAMILIA` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
