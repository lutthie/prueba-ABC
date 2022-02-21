-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2022 a las 12:12:39
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebabc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria_producto`
--

INSERT INTO `categoria_producto` (`id_categoria`, `nombre_categoria`) VALUES
(3, 'Panadería'),
(4, 'Embutidos'),
(1, 'Galletas'),
(2, 'Bebidas'),
(0, 'Indefinido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedores`
--

CREATE TABLE `contenedores` (
  `id_contenedor` int(11) NOT NULL,
  `nombre_contenedor` varchar(50) NOT NULL,
  `fecha_arrivo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contenedores`
--

INSERT INTO `contenedores` (`id_contenedor`, `nombre_contenedor`, `fecha_arrivo`) VALUES
(1, 'Contenedor 1', '2022-02-24'),
(2, 'Contenedor 2', '2022-02-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_depto` int(11) NOT NULL,
  `nombre_depto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_depto`, `nombre_depto`) VALUES
(1, 'Guatemala'),
(2, 'Huehuetenango'),
(3, 'Izabal'),
(4, 'Jalapa'),
(5, 'Jutiapa'),
(6, 'Petén'),
(7, 'Quetzaltenango'),
(8, 'Quiché'),
(9, 'Retalhuleu'),
(10, 'Sacatepéquez'),
(11, 'San Marcos'),
(12, 'Santa Rosa'),
(13, 'Solola'),
(14, 'Suchitepéquez'),
(15, 'Totonicapán'),
(16, 'Zacapa'),
(17, 'Alta Verapaz'),
(18, 'Baja Verapaz'),
(19, 'Chimaltenango'),
(20, 'Chiquimula'),
(21, 'El Progreso'),
(22, 'Escuintla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_producto`
--

CREATE TABLE `estado_producto` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_producto`
--

INSERT INTO `estado_producto` (`id_estado`, `nombre_estado`) VALUES
(1, 'Disponible'),
(2, 'Agotado'),
(3, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `imagen_producto` varchar(50) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `precio`, `id_usuario`, `imagen_producto`, `id_categoria`, `id_estado`) VALUES
(1, 'Jamon de Pavo', 15, 3, 'producto_1.jpg', 4, 1),
(2, 'Chorizo de Res', 34, 5, 'producto_2.jpg', 4, 2),
(3, 'Pan baguette', 12, 5, 'producto_3.jpg', 3, 3),
(4, 'Pan frances', 5, 5, 'producto_4.jpg', 3, 1),
(5, 'Galletas Chokis', 5, 3, 'producto_5.jpg', 1, 1),
(6, 'Galletas soda GAMA', 3, 5, 'producto_6.jpg', 1, 2),
(7, 'Cocacola 1L', 15, 3, 'producto_7.jpg', 2, 3),
(8, 'Gatorade 1 botella', 13, 3, 'producto_8.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prod_contenedor`
--

CREATE TABLE `prod_contenedor` (
  `id_pc` int(11) NOT NULL,
  `id_contenedor` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prod_contenedor`
--

INSERT INTO `prod_contenedor` (`id_pc`, `id_contenedor`, `id_producto`) VALUES
(1, 1, 1),
(1, 1, 2),
(2, 2, 1),
(2, 2, 2),
(2, 2, 4),
(2, 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `nombre_tipo`) VALUES
(3, 'Administrador'),
(1, 'Cliente'),
(2, 'Proveedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `id_depto` int(11) NOT NULL,
  `telefono` int(20) NOT NULL,
  `dpi` int(20) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `correo_electronico`, `contrasena`, `id_depto`, `telefono`, `dpi`, `id_tipo`) VALUES
(1, 'Administrador', 'Encargado', 'admin', '1234', 1, 12345678, 2147483647, 3),
(2, 'Ejemplo', 'Cliente', 'ejemp@ejemplo.com', NULL, 1, 18374928, 2147483647, 1),
(3, 'Ejemplo', 'Proveedor', 'proveedor@correo.com', NULL, 1, 12345678, 2147483647, 2),
(4, 'Jose', 'Lopez', 'joselopez23@correo.net', NULL, 13, 12345678, 2147483647, 1),
(5, 'Carlos', 'Villagrán', 'cvilla1987@gmail.net', NULL, 9, 12345678, 2147483647, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
