-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-02-2018 a las 22:42:00
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
(5, 'Wind River (2017) (US) (Taylor Sheridan)', '20180217142426_wind_river-870274639-large.jpg', 5000, 10, 'Una joven agente del FBI se alía con un veterano rastreador local para investigar el asesinato de una joven ocurrido en una reserva de nativos americanos... ', 1),
(6, 'Blade Runner (1982) (US) (Ridley Scott)', '20180218081130_blade_runner-351607743-large.jpg', 1000, 4.25, 'A principios del siglo XXI, la poderosa Tyrell Corporation creó, gracias a los avances de la ingeniería genética, un robot llamado Nexus 6, un ser virtualmente idéntico al hombre pero superior a él en fuerza y agilidad, al que se dio el nombre de Replicante. Estos robots trabajaban como esclavos en las colonias exteriores de la Tierra. Después de la sangrienta rebelión de un equipo de Nexus-6, los Replicantes fueron desterrados de la Tierra. Brigadas especiales de policía, los Blade Runners, tenían órdenes de matar a todos los que no hubieran acatado la condena. Pero a esto no se le llamaba ejecución, se le llamaba ', 10),
(7, 'Blade Runner 2049 (2017) (US) (Denis Villeneuve)', '20180218081309_blade_runner_2049-681477614-large.jpg', 8400, 8, 'Treinta años después de los eventos del primer film, un nuevo blade runner, K (Ryan Gosling) descubre un secreto profundamente oculto que podría acabar con el caos que impera en la sociedad. El descubrimiento de K le lleva a iniciar la búsqueda de Rick Deckard (Harrison Ford), un blade runner al que se le perdió la pista hace 30 años.', 10),
(8, 'Alien, el octavo pasajero (1979) (US) (Ridley Scott)', '20180218081532_alien-747835256-large.jpg', 1650, 3.85, 'De regreso a la Tierra, la nave de carga Nostromo interrumpe su viaje y despierta a sus siete tripulantes. El ordenador central, MADRE, ha detectado la misteriosa transmisión de una forma de vida desconocida, procedente de un planeta cercano aparentemente deshabitado. La nave se dirige entonces al extraño planeta para investigar el origen de la comunicación.', 11),
(9, 'Origen (2010) (US) (Christopher Nolan)', '20180218081722_inception-109425434-large.jpg', 3100, 5, 'Dom Cobb (DiCaprio) es un experto en el arte de apropiarse, durante el sueño, de los secretos del subconsciente ajeno. La extraña habilidad de Cobb le ha convertido en un hombre muy cotizado en el mundo del espionaje, pero también lo ha condenado a ser un fugitivo y, por consiguiente, a renunciar a llevar una vida normal. Su única oportunidad para cambiar de vida será hacer exactamente lo contrario de lo que ha hecho siempre: la incepción, que consiste en implantar una idea en el subconsciente en lugar de sustraerla. Sin embargo, su plan se complica debido a la intervención de alguien que parece predecir cada uno de sus movimientos, alguien a quien sólo Cobb podrá descubrir.', 12),
(10, 'Ghost in the Shell (2017) (US) (Rupert Sanders)', '20180218081955_ghost_in_the_shell-446755661-large.jpg', 7500, 6, 'En un Japón futurista la joven Motoko Kusanagi (Scarlett Johansson), también conocida como \'the Major\' Mira Killian, es la líder de grupo operativo de élite, Sección 9, cuyo objetivo es luchar contra el ciberterrorismo y los crímenes tecnológicos. Al mando de esta unidad de operaciones encubiertas está Aramaki (Takeshi Kitano), y destaca Batou (Pilou Asbæk), un exmilitar considerado como uno de los agentes más salvajes del grupo. Pero, después de un peligrosa misión, el cuerpo de Kusanagi queda dañado, siendo sometida a una operación quirúrgica para trasplantar su cerebro en un cuerpo robótico. Este nuevo cuerpo artificial le permitirá ser capaz de realizar hazañas sobrehumanas especialmente requeridas para su trabajo... Basada en la aclamada saga homónima de ciencia ficción. ', 13),
(11, 'Matrix (1999) (US) (Hermanas Wachowski)', '20180218082132_the_matrix-155050517-large.jpg', 14000, 3.25, 'Thomas Anderson es un brillante programador de una respetable compañía de software. Pero fuera del trabajo es Neo, un hacker que un día recibe una misteriosa visita...', 12),
(12, 'WALL•E (2008) (US) (Andrew Stanton)', '20180218082233_walloe-973488527-large.jpg', 12000, 4, 'En el año 2800, en un planeta Tierra devastado y sin vida, tras cientos de solitarios años haciendo aquello para lo que fue construido -limpiar el planeta de basura- el pequeño robot WALL•E (acrónimo de Waste Allocation Load Lifter Earth-Class) descubre una nueva misión en su vida (además de recolectar cosas inservibles) cuando se encuentra con una moderna y lustrosa robot exploradora llamada EVE. Ambos viajarán a lo largo de la galaxia y vivirán una emocionante e inolvidable aventura... ', 1),
(13, 'Interstellar (2014) (US) (Christopher Nolan)', '20180218082422_interstellar-366875261-large.jpg', 7300, 6.89, 'Al ver que la vida en la Tierra está llegando a su fin, un grupo de exploradores dirigidos por el piloto Cooper (McConaughey) y la científica Amelia (Hathaway) emprende una misión que puede ser la más importante de la historia de la humanidad: viajar más allá de nuestra galaxia para descubrir algún planeta en otra que pueda garantizar el futuro de la raza humana.', 14),
(14, 'Your Name (2016) (JP) (Makoto Shinkai)', '20180218082624_kimi_no_na_wa-612760352-large.jpg', 2600, 5.95, 'Taki y Mitsuha descubren un día que durante el sueño sus cuerpos se intercambian, y comienzan a comunicarse por medio de notas. A medida que consiguen superar torpemente un reto tras otro, se va creando entre los dos un vínculo que poco a poco se convierte en algo más romántico.', 15),
(15, '2001: Una odisea del espacio (1968) (GB) (Stanley Kubrick)', '20180218082748_2001_a_space_odyssey-322989452-large.jpg', 295, 5, 'La película de ciencia-ficción por excelencia de la historia del cine narra los diversos periodos de la historia de la humanidad, no sólo del pasado, sino también del futuro. Hace millones de años, antes de la aparición del \"homo sapiens\", unos primates descubren un monolito que los conduce a un estadio de inteligencia superior. Millones de años después, otro monolito, enterrado en una luna, despierta el interés de los científicos. Por último, durante una misión de la NASA, HAL 9000, una máquina dotada de inteligencia artificial, se encarga de controlar todos los sistemas de una nave espacial tripulada.', 14),
(16, 'El planeta de los simios (1968) (US) (Franklin J. Schaffner)', '20180218091350_planet_of_the_apes-541770805-large.jpg', 1400, 6, 'George Taylor es un astronauta que forma parte de la tripulación de una nave espacial -en una misión de larga duración- que se estrella en un planeta desconocido en el que, a primera vista, no hay vida inteligente. Sin embargo, muy pronto se dará cuenta de que está gobernado por una raza de simios mentalmente muy desarrollados que esclavizan a unos seres humanos que carecen de la facultad de hablar. Cuando su líder, el doctor Zaius, descubre horrorizado que Taylor posee el don de la palabra, decide que hay que eliminarlo. ', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FACTURA`
--

CREATE TABLE `FACTURA` (
  `ID` int(11) NOT NULL,
  `FECHA` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `USUARIO` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `FACTURA`
--

INSERT INTO `FACTURA` (`ID`, `FECHA`, `USUARIO`) VALUES
(1, '20180218182454', 'prueba (prueba@prueba)'),
(2, '2018-02-18 18:25:54', 'prueba (prueba@prueba)'),
(3, '2018-02-18 18:30:59', 'prueba (prueba@prueba)'),
(4, '2018-02-18 18:31:37', 'prueba (prueba@prueba)'),
(5, '2018-02-18 18:31:41', 'prueba (prueba@prueba)'),
(6, '2018-02-18 18:31:58', 'prueba (prueba@prueba)'),
(7, '2018-02-18 18:54:58', 'prueba (prueba@prueba)'),
(8, '2018-02-18 18:58:46', 'prueba (prueba@prueba)'),
(9, '2018-02-18 19:00:48', 'prueba (prueba@prueba)'),
(10, '2018-02-18 19:03:13', 'prueba (prueba@prueba)'),
(11, '2018-02-18 19:11:19', 'prueba (prueba@prueba)'),
(12, '2018-02-18 19:12:25', 'prueba (prueba@prueba)'),
(13, '2018-02-18 19:13:48', 'prueba (prueba@prueba)'),
(14, '2018-02-18 20:00:55', 'prueba (prueba@prueba)');

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
  `ID_FACTURA` int(11) NOT NULL,
  `ID_ARTICULO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `LINEA`
--

INSERT INTO `LINEA` (`ID`, `PRECIO`, `CANTIDAD`, `ID_FACTURA`, `ID_ARTICULO`) VALUES
(3, 5.95, 1, 1, 14),
(4, 6.89, 1, 1, 13),
(5, 5.95, 1, 2, 14),
(6, 6.89, 1, 2, 13),
(7, 5.95, 1, 3, 14),
(8, 6.89, 1, 3, 13),
(9, 5.95, 1, 4, 14),
(10, 6.89, 1, 4, 13),
(11, 5.95, 1, 5, 14),
(12, 6.89, 1, 5, 13),
(13, 5.95, 1, 6, 14),
(14, 6.89, 1, 6, 13),
(15, 6, 1, 7, 16),
(16, 4, 1, 7, 12),
(17, 5, 1, 7, 9),
(18, 3.25, 1, 8, 11),
(19, 6.89, 1, 8, 13),
(20, 4, 1, 8, 12),
(21, 6, 1, 9, 16),
(22, 5.95, 1, 10, 14),
(23, 6.89, 1, 11, 13),
(24, 5.95, 1, 12, 14),
(25, 6, 1, 13, 16),
(26, 5, 1, 13, 15),
(27, 6, 1, 13, 3),
(28, 20.99, 1, 13, 4),
(29, 3.85, 1, 13, 8),
(30, 6, 1, 13, 10),
(31, 6.89, 1, 13, 13),
(32, 5.95, 1, 14, 14);

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
(9, 'Venganza', 28),
(10, 'Neo-Noir', 1),
(11, 'Extraterrestres', 1),
(12, 'Thriller futurista', 1),
(13, 'Cyberpunk', 1),
(14, 'Aventura espacial', 1),
(15, 'Salto temporal', 1);

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
  ADD PRIMARY KEY (`ID`);

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
  ADD KEY `ID_FACTURA` (`ID_FACTURA`),
  ADD KEY `ID_ARTICULO` (`ID_ARTICULO`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `FACTURA`
--
ALTER TABLE `FACTURA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `FAMILIA`
--
ALTER TABLE `FAMILIA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `LINEA`
--
ALTER TABLE `LINEA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `SUBFAMILIA`
--
ALTER TABLE `SUBFAMILIA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- Filtros para la tabla `LINEA`
--
ALTER TABLE `LINEA`
  ADD CONSTRAINT `LINEA_ibfk_1` FOREIGN KEY (`ID_FACTURA`) REFERENCES `FACTURA` (`ID`),
  ADD CONSTRAINT `LINEA_ibfk_2` FOREIGN KEY (`ID_ARTICULO`) REFERENCES `ARTICULO` (`ID`);

--
-- Filtros para la tabla `SUBFAMILIA`
--
ALTER TABLE `SUBFAMILIA`
  ADD CONSTRAINT `SUBFAMILIA_ibfk_1` FOREIGN KEY (`ID_FAMILIA`) REFERENCES `FAMILIA` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
