-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-06-2019 a las 06:07:29
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdalfabetizacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

DROP TABLE IF EXISTS `beneficiario`;
CREATE TABLE IF NOT EXISTS `beneficiario` (
  `id_benefi` int(10) NOT NULL AUTO_INCREMENT,
  `dniusu` char(8) DEFAULT NULL,
  `gradoinstrucion` set('UNIVERSIDAD','INSTITUTO','SECUNDARIO') DEFAULT NULL,
  `nominstitu` varchar(100) DEFAULT NULL,
  `especia` varchar(50) DEFAULT NULL,
  `usaordenador` set('Si','No') DEFAULT NULL,
  `conociaprender` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_benefi`),
  KEY `dnibenef_fk_1` (`dniusu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `beneficiario`
--

INSERT INTO `beneficiario` (`id_benefi`, `dniusu`, `gradoinstrucion`, `nominstitu`, `especia`, `usaordenador`, `conociaprender`) VALUES
(1, '76755672', 'SECUNDARIO', 'IDAP', 'Programador', 'Si', ''),
(2, '15123151', 'UNIVERSIDAD', 'Autonoma del peru', 'Ingenieria de Sistemas', 'Si', '111000'),
(3, '76317263', 'INSTITUTO', 'CIMAS', 'Programador', 'No', '101000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaborador`
--

DROP TABLE IF EXISTS `colaborador`;
CREATE TABLE IF NOT EXISTS `colaborador` (
  `id_cola` int(10) NOT NULL AUTO_INCREMENT,
  `dniusu` char(8) DEFAULT NULL,
  `cip` varchar(10) DEFAULT NULL,
  `gradoacad` set('INGENIERO','GRADUADO','EGRESADO','ESTUDIANTE') DEFAULT NULL,
  `especia` varchar(50) DEFAULT NULL,
  `nomuniver` varchar(50) DEFAULT NULL,
  `ciclo` char(2) DEFAULT NULL,
  `descripdocen` varchar(100) DEFAULT NULL,
  `nivelconoci` varchar(6) DEFAULT NULL,
  `aplicarpara` set('CAPACITADOR','ASISTENTE','APOYO') NOT NULL,
  `privilegiodesubirmat` set('Si','No') NOT NULL,
  PRIMARY KEY (`id_cola`),
  KEY `dnicola_fk_1` (`dniusu`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colaborador`
--

INSERT INTO `colaborador` (`id_cola`, `dniusu`, `cip`, `gradoacad`, `especia`, `nomuniver`, `ciclo`, `descripdocen`, `nivelconoci`, `aplicarpara`, `privilegiodesubirmat`) VALUES
(1, '74209553', '323231', 'ESTUDIANTE', 'Ingenieria de Sistemas', 'Autonoma del Peru', 'V', NULL, 'IBIBII', 'CAPACITADOR', 'Si'),
(2, '72191725', NULL, 'ESTUDIANTE', 'Ingenieria de Sistemas', 'Autonoma del Peru', 'VI', NULL, 'IBIBIB', 'CAPACITADOR', 'Si'),
(3, '65231235', '', 'ESTUDIANTE', 'Ingenieria de Sistemas', 'Autonoma del Peru', 'VI', 'Dictando clases particulares', 'AABBBB', 'CAPACITADOR', 'Si'),
(4, '34567897', '', 'ESTUDIANTE', 'Ingenieria de Sistemas', 'Autonoma del Peru', 'VI', '', 'BNNNNN', 'CAPACITADOR', 'No'),
(5, '81293127', '', 'ESTUDIANTE', 'Ingenieria de Sistemas', 'Autonoma del Peru', 'VI', '', 'BBBBIB', 'ASISTENTE', 'No'),
(6, '88617376', '', 'ESTUDIANTE', 'Ingenieria de Sistemas', 'Autonoma del Peru', 'VI', '', 'IIBBII', 'APOYO', 'No'),
(7, '61412412', '', 'ESTUDIANTE', 'Ingenieria de Sistemas', 'Autonoma del Peru', 'VI', '', 'IBIBIB', 'CAPACITADOR', 'No'),
(8, '81738172', '', 'ESTUDIANTE', 'Ingenieria de Sistemas', 'Autonoma del Peru', 'VI', '', 'IBBIAI', 'APOYO', 'No'),
(9, '14141231', '', 'ESTUDIANTE', 'Ingenieria de Sistemas', 'Autonoma del Peru', 'VI', '', 'IBIBII', 'APOYO', 'No'),
(10, '87613772', '', 'ESTUDIANTE', 'DiseÃ±o', 'UPIG', 'IV', '', 'BBBIIB', 'APOYO', 'No'),
(11, '99999999', '', 'GRADUADO', 'Administracion de empresas', 'IDAP', '', '', 'BIBBBB', 'ASISTENTE', 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

DROP TABLE IF EXISTS `materiales`;
CREATE TABLE IF NOT EXISTS `materiales` (
  `idmat` int(10) NOT NULL AUTO_INCREMENT,
  `id_cola` int(10) DEFAULT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `descripcion` mediumtext,
  `nommat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idmat`),
  KEY `id_cola_fk_1` (`id_cola`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`idmat`, `id_cola`, `titulo`, `descripcion`, `nommat`) VALUES
(1, 1, 'Guia para el buen uso de Word', 'En esta guia se detalla el correcto uso del software Word para crear y editar documentos de texto.', 'Guia para el buen uso de Word.pdf'),
(2, 1, 'Guia para el buen uso de Power Point', 'En esta guia se explica como usar Power Point para crear y editar presentaciones en computador', 'Guia para el buen uso Power Point.pdf'),
(3, 1, 'Guia para el buen uso de Excel', 'En esta guia se explica como usar el software Excel para usar la hoja de calculo', 'Guia para el buen uso de Excel.pdf'),
(4, 1, 'Guia para el uso del sistema operativo Windows', 'En esta guia se explica las partes basicas del sistema operativo Windows y como usar sus componentes correctamente.', 'Guia de uso del sistema operativo Windows.pdf'),
(5, 1, 'Guia Access', 'asdasdasdasdasdsad', 'Guia Microsoft Access.pdf'),
(6, 1, 'SesiÃ³n4FactoresMatemÃ¡ticosFinancieros', 'Factores matematicos financieros', 'SesiÃ³n4FactoresMatemÃ¡ticosFinancieros.pdf'),
(7, 1, 'Titulo09', 'Descripcion 09', 'LABORATORIO07.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imagenes`
--

DROP TABLE IF EXISTS `tbl_imagenes`;
CREATE TABLE IF NOT EXISTS `tbl_imagenes` (
  `imagen_ID` int(11) NOT NULL AUTO_INCREMENT,
  `imagen_Marca` varchar(200) CHARACTER SET ucs2 NOT NULL,
  `imagen_Tipo` varchar(200) NOT NULL,
  `imagen_Img` varchar(200) NOT NULL,
  PRIMARY KEY (`imagen_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Tabla de Imagenes';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `dniusu` char(8) NOT NULL,
  `usua` varchar(25) DEFAULT NULL,
  `pass` varchar(25) DEFAULT NULL,
  `perf` set('Beneficiario','Capacitador','Administrador','Asistente','Apoyo') DEFAULT NULL,
  `apellidos` varchar(200) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `provnaci` varchar(100) DEFAULT NULL,
  `distnaci` varchar(100) DEFAULT NULL,
  `fecnaci` date DEFAULT NULL,
  `domiact` varchar(200) DEFAULT NULL,
  `distact` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `celu` char(9) DEFAULT NULL,
  `tele` char(10) DEFAULT NULL,
  `nomempres` varchar(50) DEFAULT NULL,
  `cargempres` varchar(50) DEFAULT NULL,
  `dirempres` varchar(150) DEFAULT NULL,
  `distempres` varchar(50) DEFAULT NULL,
  `telempres` char(10) DEFAULT NULL,
  `emailempres` varchar(100) DEFAULT NULL,
  `participaprevia` set('Si','No') DEFAULT NULL,
  `objetencasa` varchar(4) DEFAULT NULL,
  `enterarcampa` varchar(12) DEFAULT NULL,
  `disponibilidad` char(98) NOT NULL,
  `estado` set('INACTIVO','ACTIVO','PENDIENTE') DEFAULT NULL,
  PRIMARY KEY (`dniusu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dniusu`, `usua`, `pass`, `perf`, `apellidos`, `nombres`, `provnaci`, `distnaci`, `fecnaci`, `domiact`, `distact`, `email`, `celu`, `tele`, `nomempres`, `cargempres`, `dirempres`, `distempres`, `telempres`, `emailempres`, `participaprevia`, `objetencasa`, `enterarcampa`, `disponibilidad`, `estado`) VALUES
('14141231', 'd', '123', 'Apoyo', 'Prudencio', 'Daniela', 'Lima', 'Lima', '1994-10-07', 'Chorrillos', 'Chorrillos', 'daniela@hotmail.com', '976283647', '7628323', '', '', '', '', '', '', 'No', '1110', '010100000001', '00000000000000000000000000000000001110000000000000000000000000000000000000000000000000000000000000', 'PENDIENTE'),
('15123151', 'jcardenas', '123', 'Beneficiario', 'Cardenas Dario', 'Samuel Luis', 'Lima', 'Lima', '1994-11-11', 'Villa el Salvador', 'Villa El Salvador', 'jose@hotmail.com', '976563722', '652637', '', '', '', '', '', '', 'Si', '1010', '000111000000', '00000000000000000000000000000011111100000000000000000000000000000000000000000000000000000000000000', 'PENDIENTE'),
('34567897', 'joscco', '123', 'Capacitador', 'oscco rincon', 'jayro', 'Lima', 'Lima', '1995-01-01', 'San Martin de your mama', 'SJL', 'jayro@hotmail.com', '946821574', '614821125', '', '', '', '', '', '', 'No', '1010', '010000001000', '11000111010100111111111000010001101110110101010010000011010111101100011010001110001000000001111100', 'ACTIVO'),
('61412412', 'rcayllahua', '123', 'Capacitador', 'Cayllahua Zela', 'Rolly', 'Lima', 'Lima', '0000-00-00', 'Lince', 'Lince', 'rolly@hotmail.com', '', '', '', '', '', '', '', '', 'No', '1100', '000000001010', '00000000000000000000000000000000011111000000000000000000000000000000000000000000000000000000000000', 'PENDIENTE'),
('65231235', 'mgamboa', '123', 'Capacitador', 'Gamboa Ramoz', 'Miriam', 'Lima', 'Lurin', '1997-07-05', 'Deposito de gas N3', 'Lurin', 'migara@hotmail.com', '977231239', '6786312', '', '', '', '', '', '', 'No', '1111', '110000000100', '11011110100111110110110101010011001101010001000010000100010110110001011100110111001001110001010001', 'ACTIVO'),
('72191725', 'admin', 'admin', 'Administrador', 'Gomez Noa', 'Ricardo Yvan', 'Lima', 'Lima', '1999-04-30', 'Av.Jose de San Martin', 'Villa Maria del Triunfo', 'yvan_gomez30@hotmail.com', '992955138', '2830281', NULL, NULL, NULL, NULL, NULL, NULL, 'No', '1111', '100101010100', '01110101111001000101000001100011001100100110010000111000110100111101101101111011101000101101011011', 'ACTIVO'),
('74209553', 'dmaytam', '123', 'Capacitador', 'Mayta Matienso', 'Dayanne Genesis', 'Lima', 'Lurin', '1997-02-11', 'Av Venezuela Mz 27 A Lt 1 - KM40', 'Lurin', 'dayanne_97_15@hotmail.com', '986262578', '6123235', '', '', '', '', '', '', 'No', '1111', '100001001010', '11111010010000111001011001101100000110001101011101110101010000101101111000110100110101101011110111', 'ACTIVO'),
('76317263', 'jalmenio', '123', 'Beneficiario', 'Almenio Ruer', 'Julio Schab', 'Lima', 'Lima', '1995-07-09', 'Chorrillos', 'Chorrillos', 'julio@hotmail.com', '', '', '', '', '', '', '', '', 'Si', '1110', '011100000001', '00000000000000000000000000000011111000000000000000000000000000000000000000000000000000000000000000', 'PENDIENTE'),
('76755672', 'hinga', '123', 'Beneficiario', 'Inga Arteaga', 'Hernan Manuel', 'Chiclayo', 'Chiclayo', '1995-01-14', 'Los claveles', 'Lurin', 'hm_inga@hotmail.com', '976283647', '7628323', '', '', '', '', '', '', 'No', '1111', '010000001000', '01011010010000110001011001101100100111001101010101110101010000100101111000110100110101001010010111', 'ACTIVO'),
('81293127', 'jamachi', '123', 'Capacitador', 'amachi choque', 'john', 'Lima', 'Lima', '1995-09-02', 'Chorrillos', 'Chorrillos', 'amachi@hotmail.com', '956487647', '5666465', '', '', '', '', '', '', 'No', '1111', '000000000010', '00000000000000000000000000000000011111000000000000000000000000000000000000000000000000000000000000', 'PENDIENTE'),
('81738172', 'adurand', '123', 'Capacitador', 'Durand Quispe', 'Alexis', 'Lima', 'Lima', '1998-03-26', 'Ate', 'Ate', 'alexis@hotmail.com', '985412451', '5156512', '', '', '', '', '', '', 'No', '0101', '010000000011', '00000000000000000000000000000000111111000000000000000000000000000000000000000000000000000000000000', 'PENDIENTE'),
('87613772', 'ftra', '123', 'Apoyo', 'Tra Pito', 'Felix El', 'Lima', 'Lima', '1994-06-10', 'Chorrillos', 'Chorrillos', 'felix@hotmail.com', '988763272', '653261', '', '', '', '', '', '', 'No', '1100', '011100000001', '00111111000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', 'PENDIENTE'),
('88617376', 'pcusi', '123', 'Capacitador', 'Cusi Ruiz', 'Piero', 'Lima', 'Lima', '1996-08-03', 'SLM', 'San Juan de Miraflores', 'cusi@hotmail.com', '', '', '', '', '', '', '', '', 'No', '1111', '000000000010', '00000000000000000000000000000000011111000000000000000000000000000000000000000000000000000000000000', 'PENDIENTE'),
('99999999', 'jmayta', '123', 'Asistente', 'Mayta Matienso', 'Jose Felipe', 'Lima', 'Lurin', '1992-11-22', 'KM40', 'Lurin', 'fepile@hotmail.com', '983938272', '7636378', '', '', '', '', '', '', 'No', '1111', '001000000001', '00000000000000000000111000000000000000000000000000000000000000000000000000000000000000000000000000', 'PENDIENTE');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `dnibenef_fk_1` FOREIGN KEY (`dniusu`) REFERENCES `usuario` (`dniusu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `colaborador`
--
ALTER TABLE `colaborador`
  ADD CONSTRAINT `dnicola_fk_1` FOREIGN KEY (`dniusu`) REFERENCES `usuario` (`dniusu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD CONSTRAINT `id_cola_fk_1` FOREIGN KEY (`id_cola`) REFERENCES `colaborador` (`id_cola`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
