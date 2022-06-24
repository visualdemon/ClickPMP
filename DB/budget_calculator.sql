-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-06-2022 a las 22:49:23
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `budget_calculator`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `budget`
--

DROP TABLE IF EXISTS `budget`;
CREATE TABLE IF NOT EXISTS `budget` (
  `id` int NOT NULL,
  `idusuario` int NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `amount` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idusuario_idx` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `budget`
--

INSERT INTO `budget` (`id`, `idusuario`, `name`, `amount`) VALUES
(0, 7, 'hotmail', '1000'),
(9, 10, 'Cloud', '900'),
(10, 7, 'dropbox', '2000'),
(11, 7, 'cloud', '1000'),
(12, 8, 'gmail', '500'),
(13, 7, 'hotmail', '1000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ocupacion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `email`, `password`, `pais`, `ciudad`, `sexo`, `ocupacion`, `empresa`, `fechareg`) VALUES
(0, 'demo', 'demo', '$2y$10$WXfoQ2PM6QlFNFzYRyVyvOQCgiEr1TzrKwZXl93R6JZj37diUep2q', '', '', '', '', '', '2022-06-24 22:01:52'),
(7, 'Wil', 'wilberamp@gmail.com', '$2y$10$0FB/tnT.SDGdT1NFXe.nJuC8v.IzAYXkWEKD6IwfEMUizNm9fo0Vu', '', '', '', '', '', '2022-06-23 20:38:46'),
(8, 'Comfa', 'comfamiliar', '$2y$10$/y3UpXFuOQnEJ8HiTKTPYuKIc9o1moTT4nrfhxEcYa98/QhbSbQHq', '', '', '', '', '', '2022-06-23 20:41:18'),
(10, 'Admin', 'ADMIN', '$2y$10$6WEZq39K4f1ux2pHto9d/uI.bKbeYtVvzg3Db6MQgf1H5GH9TgN1m', '', '', '', '', '', '2022-06-23 20:48:34'),
(13, 'Cabrera', 'admincabrera', '$2y$10$0AZfzoIT6urk9Gf0IcXie.Siuon1m4QVsMurNdrINSn7YKzfxVVMe', '', '', '', '', '', '2022-06-23 20:58:16'),
(14, 'Crreo', 'correo@gmail.com', '$2y$10$2NGOT/y7l3uU1fi2vsFpjuP0EnFzTOOiJJcziNaDKFyKVLLo6M4Su', '', '', '', '', '', '2022-06-24 16:42:28'),
(15, 'test', 'test@gmail.com', '$2y$10$QfmOSsh9irQtZ9shX5BSdeytGyxvEf2TjM823lRsHRAAXGO3Y5QZ.', '', '', '', '', '', '2022-06-24 16:48:25'),
(16, 'otromail', 'otromail', '$2y$10$HTm/dj0oBr9pfUBUuVsYmuPILlud5F.Wdb4rWfAZp1oTP3kHFscYa', '', '', '', '', '', '2022-06-24 16:52:17'),
(17, '987654', '987654', '$2y$10$spQWS9kWNfyqZ5255buSvOj0znSR5kTAB0fMz651nX/YRMcuwiy16', '', '', '', '', '', '2022-06-24 16:54:09');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `budget`
--
ALTER TABLE `budget`
  ADD CONSTRAINT `fk_idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
