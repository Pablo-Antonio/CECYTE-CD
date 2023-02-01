-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2023 a las 00:08:14
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
-- Base de datos: `cecyte-cd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `idEquipo` int(11) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `nombreEquipo` varchar(150) NOT NULL,
  `descripcionEquipo` text NOT NULL,
  `fechaIngreso` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`idEquipo`, `folio`, `nombreEquipo`, `descripcionEquipo`, `fechaIngreso`, `status`) VALUES
(1, 'F-0001', 'Proyector Portatil', 'Proyector Epson Color Azul', '2023-01-31', 1),
(2, 'F-0002', 'Cable HDMI', 'Cable HDMI 1 Metro color negro', '2023-01-31', 0),
(3, 'F-0003', 'Cable VGA ', 'Cable VGA 1 metro Color Azul', '2023-02-01', 1),
(4, 'F-0004', 'Bocinas Acteck', 'Par de bocinas marca Acteck para PC ', '2023-02-01', 1),
(5, 'F-0005', 'Bocina Amplificada', 'Bocina Bluetooth Alienpro ', '2023-02-01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `idIncidencia` int(11) NOT NULL,
  `idPrestamo` int(11) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `desReporte` text NOT NULL,
  `fechaReporte` datetime NOT NULL,
  `fechaSolucion` datetime NOT NULL,
  `desSolucion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`idIncidencia`, `idPrestamo`, `folio`, `desReporte`, `fechaReporte`, `fechaSolucion`, `desSolucion`, `status`) VALUES
(1, 1, 'F-0001', 'el cable no da señal', '2023-02-01 13:32:14', '2023-02-01 13:39:17', 'Se cambio la fuente de poder', 0),
(2, 2, 'F-0002', 'el cable no da señal', '2023-02-01 13:34:12', '2023-02-01 13:55:17', 'El cable ya no sirve', 2);

--
-- Disparadores `incidencias`
--
DELIMITER $$
CREATE TRIGGER `actualizarIncidencia` AFTER UPDATE ON `incidencias` FOR EACH ROW BEGIN  

IF NEW.status = 0 THEN
 UPDATE equipos SET status = 1 WHERE folio = NEW.folio;
END IF;

IF NEW.status = 2 THEN
 UPDATE equipos SET status = 0 WHERE folio = NEW.folio;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `actualizarReporte` AFTER INSERT ON `incidencias` FOR EACH ROW BEGIN  
 UPDATE prestamos SET status = 0, incidencia = 1, fechaDevolucion = NEW.fechaReporte
 WHERE idPrestamo = NEW.idPrestamo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-01-31-024114', 'App\\Database\\Migrations\\Usuario', 'default', 'App', 1675133152, 1),
(2, '2023-01-31-024702', 'App\\Database\\Migrations\\Inventario', 'default', 'App', 1675184804, 2),
(4, '2023-01-31-170729', 'App\\Database\\Migrations\\Prestamos', 'default', 'App', 1675188763, 3),
(5, '2023-01-31-181309', 'App\\Database\\Migrations\\Incidencias', 'default', 'App', 1675189408, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `idPrestamo` int(11) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `alumno` varchar(100) NOT NULL,
  `gradoGrupo` varchar(20) NOT NULL,
  `fechaPrestamo` datetime NOT NULL,
  `fechaDevolucion` datetime NOT NULL,
  `incidencia` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`idPrestamo`, `folio`, `matricula`, `alumno`, `gradoGrupo`, `fechaPrestamo`, `fechaDevolucion`, `incidencia`, `status`) VALUES
(1, 'F-0001', '16680200', 'Alexa Guzman Flores', '1 A', '2023-02-01 11:24:37', '2023-02-01 13:32:14', 1, 0),
(2, 'F-0002', '16680201', 'Andrea Soto Dominguez', '1 B', '2023-02-01 11:27:22', '2023-02-01 13:34:12', 1, 0),
(3, 'F-0003', '19980202', 'Agnes Dominguez Rio', '1 C', '2023-02-01 11:35:31', '2023-02-01 13:31:36', 0, 0);

--
-- Disparadores `prestamos`
--
DELIMITER $$
CREATE TRIGGER `devolucion` AFTER UPDATE ON `prestamos` FOR EACH ROW BEGIN  
IF NEW.incidencia = 0 THEN
 UPDATE equipos SET status = 1 WHERE folio = NEW.folio;
END IF;

IF NEW.incidencia = 1 THEN
 UPDATE equipos SET status = 0 WHERE folio = NEW.folio;
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `nuevoPrestamo` AFTER INSERT ON `prestamos` FOR EACH ROW BEGIN  
 UPDATE equipos SET status = 2 WHERE folio = NEW.folio;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usr` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usr`, `password`) VALUES
('administrador', 'admin1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`idEquipo`),
  ADD UNIQUE KEY `folio` (`folio`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`idIncidencia`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`idPrestamo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `idIncidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `idPrestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
