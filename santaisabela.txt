-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2022 a las 03:36:03
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `santaisabela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cedula` int(11) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `clave` varchar(300) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nombre`, `apellido`, `cedula`, `correo`, `clave`, `estatus`) VALUES
(1, 'Restaurante', 'santa isabela', 1004845592, 'santaisabela@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(2, 'julieth ximena', 'vera sanchez', 1192915776, 'ximenavera2002@gmail.com', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almuerzo`
--

CREATE TABLE `almuerzo` (
  `id_almuerzo` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almuerzo`
--

INSERT INTO `almuerzo` (`id_almuerzo`, `nombre`, `precio`, `descripcion`, `foto`, `estatus`) VALUES
(1, 'Sancocho', 5000, 'Sancocho De Gallina', 'img_43c7c25dd6dc9af6243f5144b5514b6d.jpg', 1),
(2, 'Ajiaco', 8000, 'papa criolla,presa de pollo,mazorca un plato tipico colombiano', 'img_1d30835a2fef422a5bfb8ddc4b7074db.jpg', 1),
(3, 'mojarra frita', 10000, 'mojarra frita acompaÃ±ada con de una porcion de arroz,petacona y ensalada', 'img_90bdf9be814309f753c31d8c2bef2007.jpg', 1),
(4, 'LasaÃ±a mixta', 8000, 'lasaÃ±a mixta acompaÃ±ada por una salsa Bolognesa, carne molida, Queso rallado,pechuga de pollo ', 'img_96b2d855b8c539e8dd7729cd44086cb6.jpg', 1),
(5, 'Bandeja Paisa', 15000, 'frijoles,arroz,chicharron,choriza,huevo frito,petacona,aguacate,limon', 'img_5ce079fe61b38b640dfa4687395dfe9b.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidasalcoholicas`
--

CREATE TABLE `bebidasalcoholicas` (
  `id_alcoholica` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bebidasalcoholicas`
--

INSERT INTO `bebidasalcoholicas` (`id_alcoholica`, `nombre`, `precio`, `descripcion`, `foto`, `estatus`) VALUES
(1, 'cervesa', '4000.00', 'aguila', 'img_6e97d319ac5ab6f7221451ec470bc79f.jpg', 1),
(2, ' Buchanans Deluxe', '80000.00', 'El Buchanans Deluxe es un whisky suave con sabores frutales, toques de naranja y chocolate. Se recomienda servirlo en las rocas o con soda, adornado con piel de naranja. Cocteles mÃ¡s conocidos: Bloody Mary Green, Breeze of Miami y Summer is Here. PaÃ­s: Escocia.', 'img_96b2d855b8c539e8dd7729cd44086cb6.jpg', 1),
(3, 'Cerveza Heineken lata x6', '22000.00', 'La Cerveza Heineken es dueÃ±a de un sabor intenso y equilibrado, producto de la fermentaciÃ³n en tanques horizontales que crean la presiÃ³n ideal para la levadura tipo A, levadura que aporta ese sabor caracterÃ­stico y con aromas frutados. AdemÃ¡s, contiene cebada malteada, agua y lÃºpulo, que se fe', 'img_34cf2ccfeb6666ba6d8297bb30367e43.jpg', 1),
(4, 'Cerveza Club Colombia Lata X6', '20000.00', 'La cerveza Club Colombia es de tipo lager de color dorado, elaborada con cebada malteada y malta de caramelo. Es una cerveza para las personas que disfruten de experiencias perfectas. PaÃ­s: Colombia.', 'img_e54903005d88faf5abf828df450a0be4.jpg', 1),
(5, 'Cerveza Corona Extra X6', '26000.00', 'La Corona es una cerveza de tipo Lager Pilsner, clara y brillante, de espuma blanca y consistente. Tiene notas afrutadas, de cuerpo medio, fresca, balanceada y muy fÃ¡cil de beber. En boca es dulce y recuerda al sabor del cereal. Su amargor es limpio y ligero. PaÃ­s: MÃ©xico.', 'img_40f50b707f895e455677220cc91d2f0e.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidascalientes`
--

CREATE TABLE `bebidascalientes` (
  `id_calientes` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bebidascalientes`
--

INSERT INTO `bebidascalientes` (`id_calientes`, `nombre`, `precio`, `descripcion`, `foto`, `estatus`) VALUES
(1, 'chocolate', 3000, 'chocolate con leche', 'img_70617fadbba903b7f0e778b0bed176b7.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidasfrias`
--

CREATE TABLE `bebidasfrias` (
  `id_frias` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bebidasfrias`
--

INSERT INTO `bebidasfrias` (`id_frias`, `nombre`, `precio`, `descripcion`, `foto`, `estatus`) VALUES
(1, 'Jugo De Naranja', 5000, 'Jugo natural de pulpa de naranja', 'img_c2e6fa237ceeb73481c54003913aa8f9.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cena`
--

CREATE TABLE `cena` (
  `id_cena` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cena`
--

INSERT INTO `cena` (`id_cena`, `nombre`, `precio`, `descripcion`, `foto`, `estatus`) VALUES
(1, 'Pizza Porcion', 4000, 'Pizza de pollo', 'img_6405d6dc084d97437091184ca1779f57.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cedula` int(11) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `clave` varchar(300) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `cedula`, `correo`, `clave`, `estatus`) VALUES
(1, 'julieth ximena', 'vera sanchez', 1004845592, 'ximenavera2002@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(2, 'julian', 'perez', 1090398122, 'julian@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(3, 'luis', 'castillo', 10096325, 'julieth@gmail.com', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desayuno`
--

CREATE TABLE `desayuno` (
  `id_desayuno` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `desayuno`
--

INSERT INTO `desayuno` (`id_desayuno`, `nombre`, `precio`, `descripcion`, `foto`, `estatus`) VALUES
(1, 'Pan De Bono', 2000, 'queso con bocadillo', 'img_4ec3a33a3ab830d77f5a585831740088.jpg', 1),
(2, 'empanada', 2300, 'con pollo,papa,y aji de tu preferencia', 'img_8beca512cbb8bd86b8ac508616d180db.jpg', 1),
(3, 'Arepa mixta', 4000, 'arepa azada rellena de carne esmechada de res,carne de cerdo,pollo,salchicha', 'img_90bdf9be814309f753c31d8c2bef2007.jpg', 1),
(4, 'Arepa de queso', 2500, 'arepa frita rellena de queso costeÃ±o,mantequilla', 'img_ca12af4a3258517cb9cea0df96f53899.jpg', 1),
(5, 'pancakes', 5000, 'pancakes con fruta y miel ', 'img_922dc59ceb4e6ae18e0f18d590dc597e.jpg', 1),
(6, 'BuÃ±uelo', 2000, 'buÃ±uelo de queso tamaÃ±o personal', 'img_d63bb217a832cf679a2459c0abf402cf.jpg', 1),
(7, 'Pasteles', 3000, 'pateles de pollo,carne,mixtos,arroz,ranchero', 'img_060915bc4af4cfb6c81379b5d18e3ea1.jpg', 1),
(8, 'sandwich', 4000, 'sandwich de pollo con ensalada,mayonesa', 'img_2cf28da21841762a331f855a725004c0.jpg', 1),
(9, 'changua', 6000, 'changua tipica colombiana acompaÃ±ada de 2 arepas', 'img_b412fff284e78eac39986f75b0641697.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `productos_facturar` varchar(100) NOT NULL,
  `cantidad_facturar` int(10) NOT NULL,
  `precio_unidad_facturar` decimal(10,2) NOT NULL,
  `precio_total_facturar` int(20) NOT NULL,
  `mesa_facturar` varchar(10) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `iva` int(5) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `cambio_entregar` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `id_mesa` int(10) NOT NULL,
  `numero` int(10) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `estatus` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `numero`, `ubicacion`, `foto`, `estatus`) VALUES
(1, 1, 'salon', 'img_5c09e723631232da420c022ed9d4f35e.jpg', 1),
(2, 2, 'salon', 'img_c831a1f020e7020afb89e3f5ea133d8b.jpg', 1),
(3, 3, 'salon', 'img_e80df011cd1c1be38eb4612ca67df036.jpg', 1),
(4, 4, 'salon', 'img_c3cc316bb1782228e850131063f6f21e.jpg', 1),
(5, 5, 'salon', 'img_8a8cf33063135076c3ed3cfb62563e30.jpg', 1),
(6, 6, 'salon', 'img_dd15b0e7d0ca9e585f1f0d3245a3f4a3.jpg', 1),
(7, 7, 'salon', 'img_cf0c5ef7e1c45fb96cecdce479f8ced2.jpg', 1),
(8, 8, 'salon', 'img_61f83ad06daec6ad660094130e0beaae.jpg', 1),
(9, 9, 'salon', 'img_78c62080c7528d4380b0c360dab69fa1.jpg', 1),
(10, 10, 'salon', 'img_6383df518a082d979842adaebb762e1d.jpg', 1),
(11, 11, 'salon', 'img_97729793d7da5e7de585759eb98cf4ab.jpg', 1),
(12, 12, 'salon', 'img_6f52bc9c2bd8964277ed14e38213d3d0.jpg', 1),
(13, 1, 'plazoleta', 'img_a00a04597bed459a9b32ec623fee511f.jpg', 1),
(14, 2, 'plazoleta', 'img_3955253fe9a343faf34ab87c1d231b07.jpg', 1),
(15, 3, 'plazoleta', 'img_faea728ac3418ff2c9333dbc366be01b.jpg', 1),
(16, 4, 'plazoleta', 'img_8a8cf33063135076c3ed3cfb62563e30.jpg', 1),
(17, 5, 'plazoleta', 'img_dd15b0e7d0ca9e585f1f0d3245a3f4a3.jpg', 1),
(18, 6, 'plazoleta', 'img_67966c19c326c4503fc861b504ad8e71.jpg', 1),
(19, 7, 'plazoleta', 'img_c3cc316bb1782228e850131063f6f21e.jpg', 1),
(20, 8, 'plazoleta', 'img_8a8cf33063135076c3ed3cfb62563e30.jpg', 1),
(21, 9, 'plazoleta', 'img_64fd947cd8054d26729897cabdb8cd2b.jpg', 1),
(22, 10, 'salon', 'img_3955253fe9a343faf34ab87c1d231b07.jpg', 1),
(23, 11, 'plazoleta', 'img_15ce23888134ab16c887b7855336eeda.jpg', 1),
(24, 12, 'plazoleta', 'img_28df29a808bc81c2811bc9d191057665.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `panaderia`
--

CREATE TABLE `panaderia` (
  `id_panaderia` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `panaderia`
--

INSERT INTO `panaderia` (`id_panaderia`, `nombre`, `precio`, `descripcion`, `foto`, `estatus`) VALUES
(1, 'Pan de jamon  y queso', 4000, 'Pan con jamon y queso', 'img_4145c7c0df69751c7b9a5757252fc507.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_Pedidos` int(10) NOT NULL,
  `desayuno_pedidos` int(10) DEFAULT NULL,
  `almuerzo_pedidos` int(10) DEFAULT NULL,
  `cena_pedidos` int(10) DEFAULT NULL,
  `panaderia_pedidos` int(10) DEFAULT NULL,
  `bebidasfrias_pedidos` int(10) DEFAULT NULL,
  `bebidascalientes_pedidos` int(10) DEFAULT NULL,
  `bebidasalcoholicas_pedidos` int(10) DEFAULT NULL,
  `estado_pedidos` enum('pendiente','entregada','pago') DEFAULT NULL,
  `total_parcial_pedidos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(10) NOT NULL,
  `fecha_venta` date NOT NULL,
  `nombre_cliente_venta` varchar(50) NOT NULL,
  `descripcion_venta` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `almuerzo`
--
ALTER TABLE `almuerzo`
  ADD PRIMARY KEY (`id_almuerzo`);

--
-- Indices de la tabla `bebidasalcoholicas`
--
ALTER TABLE `bebidasalcoholicas`
  ADD PRIMARY KEY (`id_alcoholica`);

--
-- Indices de la tabla `bebidascalientes`
--
ALTER TABLE `bebidascalientes`
  ADD PRIMARY KEY (`id_calientes`);

--
-- Indices de la tabla `bebidasfrias`
--
ALTER TABLE `bebidasfrias`
  ADD PRIMARY KEY (`id_frias`);

--
-- Indices de la tabla `cena`
--
ALTER TABLE `cena`
  ADD PRIMARY KEY (`id_cena`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `desayuno`
--
ALTER TABLE `desayuno`
  ADD PRIMARY KEY (`id_desayuno`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id_mesa`);

--
-- Indices de la tabla `panaderia`
--
ALTER TABLE `panaderia`
  ADD PRIMARY KEY (`id_panaderia`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_Pedidos`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `almuerzo`
--
ALTER TABLE `almuerzo`
  MODIFY `id_almuerzo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `bebidasalcoholicas`
--
ALTER TABLE `bebidasalcoholicas`
  MODIFY `id_alcoholica` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `bebidascalientes`
--
ALTER TABLE `bebidascalientes`
  MODIFY `id_calientes` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bebidasfrias`
--
ALTER TABLE `bebidasfrias`
  MODIFY `id_frias` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cena`
--
ALTER TABLE `cena`
  MODIFY `id_cena` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `desayuno`
--
ALTER TABLE `desayuno`
  MODIFY `id_desayuno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id_mesa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `panaderia`
--
ALTER TABLE `panaderia`
  MODIFY `id_panaderia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_Pedidos` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
