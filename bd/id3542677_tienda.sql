-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-02-2018 a las 21:09:02
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.0.26

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
-- Estructura de tabla para la tabla `ADMIN`
--

CREATE TABLE `ADMIN` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CORREO` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `CLAVE` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ADMIN`
--

INSERT INTO `ADMIN` (`ID`, `NOMBRE`, `CORREO`, `CLAVE`) VALUES
(1, 'Administrador', 'admin@admin', '$2y$10$h8tjxLGyJj.xCUrLvS3MW.gql11oobXOvpt2mayD9j1InlMHTwQg6'),
(3, 'Orlando Soldán Pozo', 'orlando.soldan@iescrostobaldemonroy.net', '$2y$10$UnM4X42LJZCdzfQq0/KqFelFRpDtDV3KL66vzXFMih7UI9Ksw/iHW');

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
(3, 'El padrino (1972) (US) (Francis Ford Coppola)', '20171210171905_el_padrino.jpg', 1000, 6, 'América, años 40. Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Fredo (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de \'Il consigliere\' Tom Hagen (Robert Duvall), se niega a participar en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.', 3),
(4, 'Testigo de cargo (1957) (US) (Billy Wilder)', '20171211094602_testigo_de_cargo.jpg', 5, 20.99, 'Leonard Vole (Tyrone Power), un hombre joven y atractivo, es acusado del asesinato de la señora French, una rica anciana con quien mantenía una relacion de carácter amistoso. El presunto móvil del crimen era la posibilidad de heredar los bienes de la difunta. A pesar de que las pruebas en su contra son demoledoras, Sir Wilfrid Roberts (Charles Laughton), un prestigioso abogado criminalista londinense, se hace cargo de su defensa.', 8),
(5, 'Wind River (2017) (US) (Taylor Sheridan)', '20180217142426_wind_river-870274639-large.jpg', 5000, 10, 'Una joven agente del FBI se alía con un veterano rastreador local para investigar el asesinato de una joven ocurrido en una reserva de nativos americanos... ', 1);

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
(24, 'Histórico'),
(25, 'Intriga'),
(27, 'Serie de TV'),
(28, 'Western');

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
(7, 'Superhéroes', 4),
(8, 'Drama judicial', 3),
(9, 'Venganza', 28);

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
(1, 'sfgfsg', 'fg', 'xcfv', 'cxv', 'xcv@dfg', '$2y$10$j80yXsM0cc0YutTKVs51o.jR0XizWX/cMZcY/fz4IPMlWF6KTiyve'),
(5, 'prueba', 'prueba', 'prueba', 'prueba', 'prueba@prueba', '$2y$10$jvUi/bNFOWWUbV8MGFJ4yODSLEsBFRShp.YnOoVjJnD/Ncx4kzcvC'),
(6, 'dsagf', 'sdfg', 'sdg', 'sdg', 'sdg@sdg', '$2y$10$sXDOELqOT0FGEvCo2qq/Uuw9axx02P1hXC5azuPKgriXHCTtU7Biy');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CORREO` (`CORREO`);

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
-- AUTO_INCREMENT de la tabla `ADMIN`
--
ALTER TABLE `ADMIN`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ARTICULO`
--
ALTER TABLE `ARTICULO`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `FACTURA`
--
ALTER TABLE `FACTURA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `FAMILIA`
--
ALTER TABLE `FAMILIA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `LINEA`
--
ALTER TABLE `LINEA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `SUBFAMILIA`
--
ALTER TABLE `SUBFAMILIA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
