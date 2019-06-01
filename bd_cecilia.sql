-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 31-05-2019 a las 03:32:30
-- Versión del servidor: 5.7.25
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `bd_cecilia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `descripcion`, `estado`) VALUES
(6, 'Informatica', 'A'),
(7, 'Insumos', 'A'),
(8, 'CUERPO', 'A'),
(9, 'Tablets', 'A'),
(10, 'Impresoras', 'A'),
(11, 'Teclados', 'A'),
(12, 'Outlet', 'A'),
(13, 'Parlantes', 'A'),
(14, 'Mouse', 'A'),
(15, 'FACIAL', 'A'),
(16, 'Ofertas de Verano', 'A'),
(22, 'CalefacciÃ³n elÃ©ctrica', 'A'),
(18, 'Wireless', 'A'),
(19, 'SPA', 'A'),
(20, 'CÃ¡maras y Filmadoras', 'A'),
(21, 'Tv y Video', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_servicio`
--

CREATE TABLE `categoria_servicio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(151) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_servicio`
--

INSERT INTO `categoria_servicio` (`id`, `nombre`) VALUES
(1, 'Spa y masajes'),
(2, 'Rostro'),
(3, 'Cuerpo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `apellidonombre` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `apellidonombre`, `mail`, `telefono`, `clave`) VALUES
(10, 'Humberto ', 'humbearte@gmail.com', 1139565771, '$2y$10$8UctHgF9kxniESNU2xMHxeQ93gdBEozJn02pqZDLzTVSMU9o6TpEu'),
(11, 'SebastiÃ¡n coronel', 'elpebete22@gmail.com', 42649421, '42323495'),
(12, 'JAGA DEESH', 'Esteban232655@mail.com', 2147483647, 'JAGADEESH23'),
(13, 'Cristian Leandro Gil', 'cg8909436@gmail.com', 2147483647, 'holaquetal1'),
(14, 'Guevara coronel', 'anthony_27_7@hotmail.com', 1123546133, '1608'),
(15, 'Vera Adrian Rodrigo', 'adrianvera788@gmail.com', 1566517917, 'jeje1569'),
(16, 'CXya', '', 0, ''),
(17, 'jesus lorenz', 'fidox_x@hotmail.com', 2147483647, 'qwe0123'),
(18, 'Coccitto Victorio', 'victorioevaizz@gmail.com', 1160318588, 'vito7102'),
(19, 'Cuda Leonardo', 'gisele.alapont@gmail.com', 42331038, 'Tobi1234'),
(20, 'Mattiello, Lucas', 'lukas.mdq@hotmail.com', 2147483647, '4715474asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `idpedido` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`id`, `cantidad`, `precio`, `idpedido`, `idproducto`) VALUES
(43, 1, 4000, 44, 14),
(42, 1, 1000, 43, 11),
(41, 1, 4000, 42, 14),
(40, 1, 3600, 41, 14),
(39, 1, 6000, 40, 39),
(38, 1, 500, 39, 15),
(37, 1, 650, 38, 13),
(36, 1, 650, 37, 13),
(35, 1, 250, 36, 12),
(34, 1, 4000, 35, 17),
(33, 1, 1000, 34, 11),
(32, 1, 650, 33, 13),
(31, 1, 250, 33, 12),
(30, 1, 650, 32, 13),
(29, 1, 3600, 31, 14),
(28, 1, 4000, 31, 17),
(44, 1, 1800, 45, 51),
(45, 1, 1800, 46, 51),
(46, 1, 250, 47, 12),
(47, 1, 4500, 48, 55),
(48, 1, 4000, 49, 14),
(49, 1, 500, 50, 15),
(50, 1, 1000, 51, 11),
(51, 1, 1000, 52, 11),
(52, 1, 650, 53, 13),
(53, 1, 650, 54, 13),
(54, 1, 650, 55, 13),
(55, 1, 1800, 56, 51),
(56, 1, 480, 57, 25),
(57, 1, 480, 58, 25),
(58, 1, 480, 59, 23),
(59, 1, 4500, 60, 55),
(60, 1, 650, 61, 31),
(61, 1, 480, 62, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `total` varchar(255) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'A',
  `estadopago` varchar(255) DEFAULT NULL,
  `comentarios` varchar(5000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `idcliente`, `total`, `fecha`, `estado`, `estadopago`, `comentarios`) VALUES
(60, 16, '4500', '2019-03-11', 'A', 'PENDIENTE', ''),
(58, 19, '480', '2018-08-18', 'A', 'PAGADO', ''),
(57, 19, '480', '2018-08-18', 'A', 'PENDIENTE', ''),
(56, 18, '1800', '2018-07-19', 'A', 'PENDIENTE', ''),
(55, 17, '650', '2018-07-13', 'A', 'PENDIENTE', ''),
(62, 10, '480', '2019-03-29', 'A', 'PENDIENTE', ''),
(61, 10, '650', '2019-03-25', 'A', 'PENDIENTE', ''),
(51, 13, '1000', '2018-04-17', 'A', 'PENDIENTE', ''),
(38, 0, '650', '2017-12-14', 'A', 'PENDIENTE', ''),
(48, 15, '4500', '2018-04-09', 'A', 'PENDIENTE', ''),
(40, 11, '6000', '2017-12-22', 'A', 'PENDIENTE', ''),
(41, 12, '3600', '2018-03-28', 'A', 'PENDIENTE', ''),
(43, 13, '1000', '2018-03-30', 'A', 'PENDIENTE', ''),
(47, 14, '250', '2018-04-09', 'A', 'PENDIENTE', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A',
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT '0',
  `destacado` tinyint(1) DEFAULT NULL,
  `tendencia` tinyint(1) DEFAULT NULL,
  `infodetallada` varchar(5000) DEFAULT NULL,
  `oferta` float NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `descripcion`, `precio`, `categoria`, `estado`, `foto1`, `foto2`, `foto3`, `stock`, `destacado`, `tendencia`, `infodetallada`, `oferta`) VALUES
(10, 'Televisor LED 32', '1', '7', 'B', 'descarga (1).jpg', '', '', 0, 1, 1, 'Se pone a la venta televisor led 21 pulgadas re lindo', 0),
(11, 'Camara deportiva action cam', '1500', '20', 'A', 'GOLDFOX-Mini-SJ4000-Waterproof-Sports-Cam-Sport-DV-Mini-Camcorders-720P-HD-Action-Camera-Helmet-Bike-10.jpg', 'sport-cam-hd-1080p-digital-action-cam-waterproof-shockproof-infinitegadget-1706-10-infinitegadget@1.jpg', '1468345905.jpg', 4, 1, 1, '-FULL HD 1080P \r\n-VIDEO: 1920*1080 PIXEL 15 FPS / 1280*720 PIXELS 30 FPS\r\n-FORMATO VIDEO: AVI\r\n-TIEMPO DE GRABADO EN 1080P: 70 MINUTOS APROX\r\n-CAMARA HASTA 5 MEGAPIXELS\r\n-120 DE APERTuRA DE LENTE\r\n-RESISTENTE AL AGUA\r\n-SUMERGIBLE HASTA 30 METROS APROX\r\n-MULTI LENGUAJE (INCLuIDO ESPAÃ‘OL)\r\n-BATERIA 900 MAh - DURACION (1.5 HORAS)\r\n-ENTRADA MINI USB \r\n-SLOT PARA TARJETA MICRO SD (HASTA 32 GB)\r\n-TIEMPO DE CARGA 3.5 HORAS APROX\r\n-MODO MULTIDISPARO PARA FOTOS\r\n-COMPATIBLE CON ACCESORIOS GOPRO\r\n', 0),
(12, 'Parlante PortÃ¡til Bluetooth para la ducha resistente al agua', '250', '13', 'A', 'PARLANTE_21_GTC_BLUETOOTH_SPG102_CELESTE__ROSA__VERDE20170210004037.jpg', 'Portable-Subwoofer-Shower-Waterproof-Wireless-Bluetooth-Speaker-Car-Handsfree-Receive-Call-Music-Suction-Phone-Mic.jpg_640x640.jpg', '', 7, 1, 0, 'PARLANTE PORTATIL DE DUCHA \r\nBluetooth Recargable\r\n\r\n- Hasta 10 metros de alcance.\r\n- Resistente al agua, No sumergible.\r\n- TambiÃ©n apto para atender llamadas TelefÃ³nicas.\r\n- BaterÃ­a interna recargable vÃ­a USB.\r\n- Incluye Cable USB para Recarga\r\n- Con Ventosa de SujeciÃ³n, para adherirlos a Vidrios, espejos, azulejos, etc.\r\n- ConexiÃ³n Bluetooth.', 0),
(13, 'Reloj Inteligente Smartwatch Dz09 android whatsapp con Chip', '650', '8', 'A', 'dz-09-black-kk-28-advati-original-imaektm3ncdf9kue.jpeg', 'reloj-inteligente-smartwatch-celular-camara-dz09-gt08-u8-D_NQ_NP_982915-MRD25334581028_022017-F.jpg', '51R8Gk1Xf0L._SX466_.jpg', 1, 1, 1, 'Modelo: DZ09.\r\nProcesador: CPU MTK6260A 533 MHz.\r\nMemoria: Tarjeta 128 Mb 64Mb ampliable hasta 32 Gb.\r\nPantalla: 1.56 pulgadas LCD TFT HD OGS.\r\nResoluciÃ³n: 240 x 240 pixeles.\r\nBluetooth: versiÃ³n 3.0.\r\nPuertos: Micro USB.\r\nBaterÃ­a: 380 mAh Li-Ion.\r\nSIM: Micro SIM.\r\nCÃ¡mara: 0,3 megapÃ­xeles\r\nResoluciÃ³n de cÃ¡mara: 320 x 240 pÃ­xeles.\r\nTiempo en Standby: 180 horas aprox.\r\nTiempo de conversaciÃ³n: 3 horas aprox.\r\nTiempo de conversaciÃ³n de Bluetooth: 3.5 horas aprox.\r\nTiempo en espera bluetooth: 120 horas aprox.\r\nRedes: GSM850/900/1800/1900MHz.\r\nFormato de audio: AMR, AAC, MP3, MIDI.\r\nFormato de video: MP4, 3GP, AVI.\r\nFormato de fotografÃ­as: JPG, GIF.\r\nDimensiones: 43.5mm x 40mm x 9.8mm.\r\nPeso: 51 gramos.\r\n\r\n', 0),
(14, 'Celular Samsung J2 Prime Liberado', '4000', '8', 'A', '51uk0jM7WoL_large.jpg', 'banners-tablet-J2.jpg', 'maxresdefault.jpg', 0, 1, 1, '- Pantalla 5\", 540 x 960 pixels \r\n- Procesador Quad core 1.4 GHz \r\n- 1.5GB RAM\r\n- Conectividad 2G, 3G, 4G-LTE \r\n- Memoria interna 8GB, expandible con MicroSd\r\n- CÃ¡mara principal 8 MP\r\n- CÃ¡mara frontal 5 MP (selfie) con FLASH LED\r\n- BaterÃ­a 2600 mAh\r\n- GPS, Bluetooth\r\n- Android 6.0 (Marshmallow)\r\n- Dimensiones: 144.8 x 72.1 x 8.9 mm , 160 g', 0),
(15, 'Teclado Gamer Dragon Kgg-002 Retroiluminado', '500', '11', 'A', 'kgg-002.jpeg', 'maxresdefault.jpg', '', 2, 1, 0, 'Modelo: KGG-002\r\n\r\n- Diseno ergonomico y confortable\r\n\r\n- Soporte de descanso para la muneca\r\n\r\n- Todas las teclas poseen gel siliconado\r\n\r\n- Posee 105 teclas, incluye 6 teclas multimedia de acceso inmediato a las aplicaciones de uso mas frecuentes\r\n\r\n- Teclas retroiluminadas con luz roja\r\n\r\n- Particulas manometricas y alta calidad de ABS en los materiales de su fabricacion para garantizar la durabilidad del producto\r\n\r\n- Medidas: 456x185x32 mm', 0),
(16, 'Parlante Portatil Bluetooth Ms-133 ', '600', '13', 'A', 'MS-133.jpg', 'MS-133 004.jpg', 'MS-133 005.jpg', 4, 1, 0, 'â€¢ Altavoz 8 vatios RMS\r\nâ€¢ BaterÃ­a de litio\r\nâ€¢ Parlante inalÃ¡mbrico\r\nâ€¢ Puerto USB â€“ Auxiliar â€“ MP3 â€“ Radio FM\r\nâ€¢ Bluetooth\r\nâ€¢ Entrada de tarjeta SD / Micro SD\r\nâ€¢ Aux: entrada para dispositivos con conexiÃ³n de audio P2\r\nâ€¢ Frecuencia de Radio FM 88 â€“ 108 MHz\r\nâ€¢ Entrada de alimentaciÃ³n DC 5V (ConexiÃ³n USB para recargar)\r\nâ€¢ Incluye Cable.', 0),
(17, 'Impresora Laser Hp Laserjet Pro M12w Wifi', '4000', '10', 'A', 'M12W 0001.jpg', 'M12W 0002.jpg', 'M12W 0003.jpg', 0, 1, 1, 'Funciones: Imprimir\r\nVelocidad de impresiÃ³n en negro (normal, carta): Hasta 19 ppm\r\nPrimera pÃ¡gina impresa en negro (carta, lista): Hasta 8,9 segundos\r\nCiclo de trabajo (mensual, carta): Hasta 5000 \r\nVolumen de pÃ¡ginas mensuales recomendado: 100 a 1000\r\nNÃºmero de usuarios: 1-3 usuarios\r\nTecnologÃ­a de impresiÃ³n: LÃ¡ser\r\nCalidad de impresiÃ³n en negro (Ã³ptima): Hasta 600 x 600 x 2 dpi\r\nVelocidad del procesador: 266 MHz\r\nLenguajes de impresiÃ³n: ImpresiÃ³n basada en host\r\nColores de impresiÃ³n: No\r\nNÃºmero de cartuchos de impresiÃ³n: 1 negro\r\nCompatible con Mac: SÃ­\r\nAdministraciÃ³n de impresoras: Estados y alertas de HP; (solo instalaciÃ³n con CD)\r\nCapacidad HP ePrint: SÃ­\r\nCapacidad de impresiÃ³n mÃ³vil: HP ePrint; CertificaciÃ³n Mopriaâ„¢; Aplicaciones mÃ³viles; No incluir \"SIP\"\r\nCapacidad inalÃ¡mbrica: SÃ­\r\nConectividad, estÃ¡ndar: 1 USB 2.0 alta velocidad; 1 WiFi 802.11b/g/n\r\nPreparado para red: EstÃ¡ndar (WiFi 802.11b/g/n integrada)', 0),
(18, 'Mouse Dragon Pro Gamer MGG-006 Retroiluminado', '250', '14', 'A', 'mgg-006 002.jpg', 'M12W 0002.jpg', '', 5, 1, 0, 'ResoluciÃ³n: 1000/1600/2400 DPI\r\nInterfaz USB, plug and play, fÃ¡cil de usar.\r\nDiseÃ±o ergonÃ³mico, tiene un agarre mÃ¡s cÃ³modo.\r\nRendimiento y estabilidad del motor Ã³ptico, lo que le permite un posicionamiento mÃ¡s preciso\r\nLuz LED indicadora de funcionamiento con 7 colores intercambiables.\r\nConexiÃ³n de alta velocidad que permite movimientos suaves.\r\nBase del mouse con teflÃ³n para permitir movimientos mÃ¡s fluidos.\r\nTamaÃ±o: 125 x 79 x 41mm', 0),
(19, 'Mouse Gamer Retroiluminado MGG-008 Firing Pro Gaming Usb', '250', '14', 'A', 'MGG-008 (1).jpg', 'MGG-008 003.jpg', 'MGG-008 002.jpg', 5, 1, 0, 'Modelo: MGG-008\r\n-7 Colores de luz: rojo, amarillo, verde, cian, azul, pÃºrpura y blanco\r\n-1000/1600/2400dpi para aumentar la velocidad y precisiÃ³n\r\n-Desplazamiento disponible con scroll\r\n-DiseÃ±o ergonÃ³mico, tiene un agarre mÃ¡s cÃ³modo\r\n-Posee tecla lateral adicional', 0),
(20, 'Mouse Pro Gaming Mgg-009 Usb Retroiluminado Gamer', '200', '14', 'A', 'mouse-pro-gaming-mgg-009-2400dpi-usb-retroiluminado-gamer-D_NQ_NP_277225-MLA25411205976_032017-O.jpg', 'MGG-009 (1).jpg', 'mouse+gamer+pro+mgg-009.jpg', 5, 1, 0, ' ResoluciÃ³n: 800 / 1200 / 1600 / 2400 DPI\r\n- TamaÃ±o: 127 x 75 x 42 mm\r\n- Superficie anti deslizante\r\n- Interfaz USB\r\n- DiseÃ±o ergonÃ³mico\r\n- Agarre suave y cÃ³modo, proporciona una excelente experencia con los juegos de entretenimiento\r\n- Colores intercambiables\r\n- 6 Botones\r\n- Luz LED indicadora de funcionamiento', 0),
(21, 'Lentes Para Celular Ojo De Pez + Gran Angular + Macro Combo', '120', '8', 'B', '3-in-1-macrofish-eyewide-universal-clip-lens-red-1470216997-8092106-28c8320daab48c980157afa4a5f53305.jpg', 'CameraLensMain.png', 'universal-clip-lens.jpg', 4, 1, 0, 'Clip adaptable a cualquier celular\r\nInterior de goma para no daÃ±ar el dispositivo\r\nLente de vidrio, macro de aluminio y clip de plÃ¡stico\r\n\r\nLentes:\r\n- Ojo de pez: Agranda el Ã¡ngulo de visiÃ³n hasta 180Âº\r\n- Gran Angular: VisiÃ³n PanorÃ¡mica\r\n- Macro: permite tomar fotos de objetos muy diminutos con una muy buena calidad de imagen', 0),
(22, 'Lentes Para Celular Ojo De Pez + Gran Angular + Macro Combo', '120', '8', 'A', '3-in-1-macrofish-eyewide-universal-clip-lens-red-1470216997-8092106-28c8320daab48c980157afa4a5f53305.jpg', 'CameraLensMain.png', 'universal-clip-lens.jpg', 4, 1, 0, 'lip adaptable a cualquier celular\r\nInterior de goma para no daÃ±ar el dispositivo\r\nLente de vidrio, macro de aluminio y clip de plÃ¡stico\r\n\r\nLentes:\r\n- Ojo de pez: Agranda el Ã¡ngulo de visiÃ³n hasta 180Âº\r\n- Gran Angular: VisiÃ³n PanorÃ¡mica\r\n- Macro: permite tomar fotos de objetos muy diminutos con una muy buena calidad de imagen', 0),
(23, 'Auriculares Gtc Hsg-172 (con MicrÃ³fono) Bluetooth', '480', '15', 'A', 'HSG-172 (1).jpg', 'HSG-172 (2).jpg', 'hsg-172-3927-hsg-172-3927-caracteristicas-auricular-bluetooht-plegable-para-una-experiencia-de-sonido-excelente-diseno-moderno-y.jpg', 3, 1, 1, 'Auriculares GTC HSG-172 Bluetooth\r\nPlegable para una excelente experiencia de sonido\r\nDiseÃ±o moderno y confortable\r\nControl de volumen\r\nMicrÃ³fono incorporado\r\nSoporta Radio FM, Micro SD/TF card\r\nImpedancia: 32 \r\nParlante 40.00 mm\r\nCorriente de carga: 500 mA', 0),
(24, 'Auriculares GTC con microfono Hsg-441', '150', '15', 'A', 'HSG-441 (6).jpg', 'HSG-441 (2).jpg', 'HSG-441 (11).jpg', 5, 1, 0, '- Modelo: HSG-441\r\n- Auricular estÃ©reo con micrÃ³fono incorporado\r\n- DiseÃ±o moderno y confortable con cinta de cabeza ajustable\r\n- Orejeras con recubierta acolchada\r\n- Ideal para chat, video conferencia o juegos multijugador\r\n- Entradas Jack 3.5mm (auricular y micrÃ³fono)', 0),
(25, 'Auriculares Gamer Microfono Control Usb Led Azul Hsg-513', '650', '15', 'A', 'hsg-513.jpg', 'HSG-513b.jpg', 'auricular gaming GTC HSG-513 3.jpg', 3, 1, 1, 'Auricular estÃ©reo USB con micrÃ³fono luminoso\r\n-Parlante: 40mm\r\n-Impedancia: 32 15%\r\n-Sensibilidad: 98 3db\r\n-Frecuencia: 18-20KHz\r\n-Potencia: 150mW\r\n-Rango de potencia: 15mW\r\n-Largo de cable: 1,8mt', 0),
(26, 'Auricular Con Microfono Premium Gtc Hsg-585', '200', '15', 'A', 'HSG-585M.jpg', 'auricular-con-vincha-D_NQ_NP_391411-MLA20546980511_012016-F.jpg', 'auricular-estereo-gtc-hsg-585m-con-micofono-colores-vincha-D_NQ_NP_328311-MLA20546978483_012016-F.jpg', 5, 1, 0, 'MODELO: HSG-585\r\nSonido Stereo\r\nMicrÃ³fono en cable.\r\nFicha Plug 3.5 MM\r\nOrejeras acolchonadas\r\nVincha ajustable', 0),
(27, 'Auriculares Gamer GTC Hsg-666 Dragon Para Pc-Ps4', '420', '15', 'A', 'HSG-666 (1).jpg', 'HSG-666 (2).jpg', 'HSG-666 PUBLICACION 001.jpg', 5, 1, 1, 'Modelo: HSG-666 Dragon\r\n\r\n- Auricular Stereo, para una experiencia de sonido excelente\r\n- DiseÃ±o confortable con cinta de cabeza y orejeras ajustables\r\n- Orejeras con recubierta acolchada para permitir largas horas de uso sin sentir molestias.\r\n- MicrÃ³fono profesional, ideal para juegos de video online.\r\n- El micrÃ³fono puede girar y doblarse para adaptarse cÃ³modamente.\r\n\r\nDetalles tÃ©cnicos Auricular:\r\n- Diametro: 40mm\r\n- Impedancia: 32ohm\r\n- Frecuencia de respuesta: 20-20.000Hz\r\n- Potencia mÃ¡xima de entrada: 20mW.\r\n- Sensibilidad (S.P.L): 98dB +-3dB\r\n- Tipo de enchufe: USB.\r\n\r\nDetalles tÃ©cnicos MicrÃ³fono:\r\n\r\n- DimensiÃ³n: 6mm x 5mm\r\n- Sensibilidad: -98dB +- 3dB\r\n- Directividad: Omnidireccionales\r\n- Impedancia: 2.2K', 0),
(28, 'Auricular EstÃ©reo con MicrÃ³fono Gtc Hsg-587', '250', '15', 'A', 'HSG-587 (4).jpg', 'hsg-587 01.jpg', 'Sin tÃ­tulo.jpg', 5, 1, 0, ' Modelo: Hsg-587\r\n*Auricular estÃ©reo para una experiencia de sonido excelente\r\n*DiseÃ±o moderno y confortable con cinta de cabeza ajustable\r\n*Orejeras con recubierta acolchada para permitir largas horas de uso sin sentir molestias\r\n*Calidad de sonido Hi-Fi\r\n*Color : Negro con Rojo', 0),
(29, 'Joystick Gamepad Control Remoto Bluetooth - Syncro Vr', '120', '19', 'A', 'virtual-box-lentes-realidad-D_NQ_NP_429125-MLA25395984611_022017-O.jpg', 'lentes-realidad-virtual-vrbox-2da-gen-20-combo-control-bt_iZ104973487XvZgrandeXpZ3XfZ21828094-629699936-3XsZ21828094xIM.jpg', 'gafas-google-cardboard-3d-vr-box-oculus-2-gener-control-bt-D_NQ_NP_419905-MLA25091055139_102016-F.jpg', 5, 0, 1, '- Color Blanco \r\n\r\n- Funciona en todos los modelos de telÃ©fonos siempre y cuando tengan bluetooth\r\n- Funciona con 2 pilas AAA (la publicaciÃ³n no incluye las pilas)\r\n- Se puede utilizar tanto para juegos, como para navegar por el telÃ©fono a la distancia\r\n-En Iphone la funcionalidad es limitada. SÃ³lo se controla el volumen. DependerÃ¡ de quÃ© aplicaciones se utilicen', 10),
(30, 'Joystick Gamepad Control Remoto Bluetooth - Syncro Vr', '120', '6', 'B', 'virtual-box-lentes-realidad-D_NQ_NP_429125-MLA25395984611_022017-O.jpg', 'lentes-realidad-virtual-vrbox-2da-gen-20-combo-control-bt_iZ104973487XvZgrandeXpZ3XfZ21828094-629699936-3XsZ21828094xIM.jpg', 'gafas-google-cardboard-3d-vr-box-oculus-2-gener-control-bt-D_NQ_NP_419905-MLA25091055139_102016-F.jpg', 5, 1, 0, '- Color Blanco \r\n\r\n- Funciona en todos los modelos de telÃ©fonos siempre y cuando tengan bluetooth\r\n- Funciona con 2 pilas AAA (la publicaciÃ³n no incluye las pilas)\r\n- Se puede utilizar tanto para juegos, como para navegar por el telÃ©fono a la distancia\r\n-En Iphone la funcionalidad es limitada. SÃ³lo se controla el volumen. DependerÃ¡ de quÃ© aplicaciones se utilicen', 0),
(31, 'Control Remoto Mele F10 Pro Fly Mouse Inalambrico Qwerty Usb', '650', '19', 'A', 'Sin tÃ­tulo 002.jpg', 'Sin tÃ­tulo.jpg', 'Sin tÃ­tulo 001.jpg', 4, 1, 0, 'Airmouse + Motion control + teclado\r\nEl mejor teclado con microfono y salida con auricular.\r\n\r\nEl puntero del mouse se mueve apuntando el control hacia la tv, ideal para tv smart, playstation, notebook, etc.\r\nModelo F10- pro Airmouse\r\n\r\nSoporte para skype\r\nEl Control remoto mas comodo con teclado Qwerty\r\nMele f10-pro}\r\n\r\n- Conexion 2.4ghz\r\n- Bateria de 500mah\r\n- 200 dias de duracion en reposo\r\n- Auto apagado en 2 minutos\r\n- Receptor usb\r\n- Sistemas android, windows, linux, ios\r\n- Soportes de girosciopio y gravedad', 0),
(32, 'Mouse Inalambrico Gtc Mig-800', '250', '14', 'A', 'MIG-800 (4).jpg', 'MIG-800 (3).jpg', 'MIG-800 (2).jpg', 5, 1, 0, 'Modelo: MiG-800\r\n- DiseÃ±o ergonomico, confortable y antideslizante\r\n- Resolucion de 800/1200/1600DPI\r\n- Alcance del mouse de 0-10 metros\r\n- Con funcion de ahorro de energia\r\n- Microreceptor guardable en la parte de abajo del mouse', 0),
(33, 'Mouse Optico Color UsB 800dpi Mog-106', '150', '14', 'A', 'mouse-optico-color-usb-pc-mac-800dpi-rojo-azul-verde-mog-106-D_NQ_NP_927425-MLA25455371359_032017-O.jpg', 'MOUSE_106_AZUL.jpg', 'MOUSE_106_ROJO.jpg', 6, 1, 0, 'Modelo MOG-106', 0),
(34, 'Mouse Pad Gamer Dragon Gaming Neoprene Pad-102', '100', '14', 'A', 'pad-mouse-gamer-earthquake-control-pad-102-D_NQ_NP_364225-MLA25395602834_022017-F.jpg', 'PAD-102 (1).jpg', 'PAD-102 (2).jpg', 5, 1, 0, 'Modelo: PAD-102\r\n- Superficie de Neoprene para usar con todo tipo de mouse\r\n- DiseÃ±ado para facilitar el movimiento del mouse y aliviar la tensiÃ³n de las articulaciones', 0),
(35, 'Parlante Bluetooth Gtc Spg-101', '650', '13', 'A', 'SPG-101 (1).jpg', 'Parlante Bluetooth SPG-101.jpg', 'SPG-101 (2).jpg', 5, 1, 1, 'Modelo: SPG-101\r\nâ€¢ Excelente calidad de sonido ideal para PC / Notebook / Celulares / Micro SD\r\nâ€¢ Frecuencia: 2.4 GHZ\r\nâ€¢ Energia: 3WÂ·2\r\nâ€¢ Impedancia: 4\r\nâ€¢ SeÃ±al de sonido: >=85dB\r\nâ€¢ Capacidad de la bateria: 1000 MAH\r\nâ€¢ Tiempo de funcionamiento: 3-4hs\r\nâ€¢ Posee funciÃ³n manos libres compatible con cualquier celular', 0),
(36, 'Parlantes 2.0 Multimedia SPG-202', '350', '13', 'A', 'imagen_640x481.jpg', 'parlante-gtc-multimedia-para-pc-usb-20-spg-202-D_NQ_NP_636515-MLA25564817684_052017-O.jpg', 'spg-202-01-500x600.jpg', 5, 1, 0, 'Modelo: SPG-202\r\n- Parlante USB 2.0 Plug & Play / Jack 3.5mm\r\n- DiseÃ±o compacto y de vanguardia\r\n- Excelente calidad de sonido\r\n- TecnologÃ­a de sonido 3D\r\n- Control de volumen\r\n- Frecuencia de respuesta: 20Hz-18Khz\r\n- AlimentaciÃ³n: 5V / 1A\r\n- RelaciÃ³n seÃ±al / sonido: 65db\r\n- Taza de aislamiento: 45db\r\n- TamaÃ±o del parlante: 3\" + 2\" x 2', 0),
(37, 'Parlante Gtc Spg-203 Mini Multicolor ', '250', '13', 'A', 'SPG-203.jpg', 'parlante-multicolor-gtc-spg-203-D_NQ_NP_709915-MLA25345643689_022017-O.jpg', 'PARLANTE SPG 203 R ROSA 3.jpg', 5, 1, 0, 'Modelo: SPG-203\r\n-Parlante con luz multicolor\r\n-DiseÃ±o compacto y de vanguardia\r\n-Excelente calidad de sonido\r\n-TecnologÃ­a 3D\r\n-Luz indicador de funcionamiento y control de volumen\r\n-Tipo de conexion: USB + 3.5mm', 0),
(38, 'Parlante Gtc Multimedia 2.0 SPG-210 Usb', '400', '13', 'A', 'spg-210_1_.jpg', '37779_GTC-SPG-210-1.jpg', 'spg-210_4_.jpg', 5, 1, 0, 'Modelo: SPG-210\r\n-Parlante USB 2.0 stereo\r\n-DiseÃ±o clasico y elegante\r\n-Excelente calidad y sonido\r\n-Control de volumen con luz led', 0),
(39, 'Celular Samsung Galaxy J7 2016', '6500', '8', 'A', 'SMB-J510-BLACK.jpg', 'samsung-galaxy-j7-2016-1.jpg', 'samsung-galaxy-j7-2016-recenzja-tabletowo-02.jpg', 4, 1, 1, 'GENERALES\r\n- Prestadora: Liberado\r\n- Velocidad de Internet: 4G \r\n- TamaÃ±o de Pantalla: 5.5 \"\r\n- ResoluciÃ³n: 1280x720 \r\n- Sistema Operativo: Android \r\n- VersiÃ³n: 5.1 Lollipop \r\nPROCESADOR \r\n- Core: Octa \r\n- Procesador: 1600 MHz \r\nCÃMARA\r\n- CÃ¡mara Res.: 13 Mpx\r\n- Flash: Si\r\n- CÃ¡mara Frontal: Si\r\n- ResoluciÃ³n CÃ¡mara Frontal: 5 Mpx \r\nMEMORIA\r\n- Memoria RAM: 2 GB\r\n- Memoria Interna: 16 GB\r\n- Expande Hasta: 128 GB\r\n- Tipo de Chip: Micro Sim \r\n- WI - FI: Wi-Fi 802.11 b/ g/ n \r\n- Bluetooth: Si\r\n- Salida para Auriculares: Si\r\n- Wi-Fi Direct O Hotspots: Si\r\n- Capacidad de BaterÃ­a: 3300 mA\r\n- DuraciÃ³n de BaterÃ­a: 11 hs', 0),
(40, 'Lentes de Realidad Virtual 3d Vr-box Con Control', '250', '19', 'A', 'HMD_VR_Box20_-e1456230973120_grande.jpg', 'lentes-gafas-realidad-virtual-rv-3dcyber-clinic-30-D_NQ_NP_697621-MLC20828613560_072016-F.jpg', '28bz9de.jpg', 5, 1, 0, 'Es un dispositivo de entretenimiento. con estas gafas. tienes como un cine en 3D. Simplemente instale su telÃ©fono mÃ³vil en el clip a la vista. ante sus ojos inmediatamente tiene una simulaciÃ³n de pantalla en una sala de cine. Las nuevas gafas 3D/VR han sido especialmente dise;ado para smartphones. Pueden mejorar mucho en su experiencia de ver las pelÃ­culas. Puede considerarse como cine privado en 3D y que aportan una experiencia de juego grande.\r\nCompatible con pantallas de 3.5\" a 6\"', 0),
(41, 'Toner Hp 17A Cf217a Negro Alternativo', '2500', '7', 'A', 'CF217A-3-PACK.png', 'hp-17a.jpg', '', 5, 1, 0, 'Rendimiento de la pÃ¡gina (blanco y negro): 1.600 pÃ¡ginas', 0),
(42, 'Turbocalefactor Liliana CWD900 tipo split 1000/2000w ', '2100', '22', 'A', 'CON8118LIL.jpg', 'caloventor-split-liliana-cwd-900.jpg', 'liliana_calefaccion_confortempo-1.jpg', 5, 1, 1, 'Potente turbina tangencial de 1500 RPM y termostato ambiental que corta a la temperatura seleccionada ahorrando energÃ­a.\r\n\r\nâ€¢ DISPLAY DIGITAL: Indica la temperatura y funciones seleccionadas.\r\nâ€¢ Control remoto.\r\nâ€¢ FÃ¡cil montaje en pared.\r\nâ€¢ FunciÃ³n oscilaciÃ³n del deflector de aire.\r\nâ€¢ Placa cerÃ¡mica de PTC de alta seguridad.\r\nâ€¢ Timer programable de Â½ hasta 7 Â½ hs.\r\nâ€¢ Corte por sobrecalentamiento.\r\nâ€¢ Potencia: 1000/2000 watts.\r\nAlto: 24,9 cm.\r\nAncho: 64 cm.\r\nProfundidad: 17,3 cm.\r\n\r\nTurbocalefacciÃ³n\r\nLa LÃ­nea de Turbocalefactores Liliana genera una intensa brisa de calor envolvente asegurando una rÃ¡pida y agradable climatizaciÃ³n del ambiente.\r\nSu turbina tangencial acelera la distribuciÃ³n del calor, logrando un ambiente cÃ¡lido en pocos minutos y disminuyendo el consumo de energÃ­a.\r\n', 0),
(43, 'Baston Monopod Selfies Nakan Spc344a', '100', '19', 'A', 'Sin tÃ­tulo.jpg', 'Foldable Wired Selfie Stick Blue-1000x1000.JPG', 'SPC-344A.jpg', 6, 1, 0, 'Selfie Stick Nakan con cable\r\n\r\nVarios colores: azul, verde, naranja, negro. Consultar stock', 0),
(44, 'Resma A4 75gr', '130', '7', 'B', '^B24C5FD2A0FB34A1DA138E66141D8445179DB971FF3BA92D68^pimgpsh_fullsize_distr.jpg', 'RESMAS A4.jpg', 'Husares75gA4.jpg', 10, 1, 0, 'Resma A4 \r\n75gr\r\n500 Hojas', 0),
(45, 'Resma A4 75gr', '150', '7', 'A', '^B24C5FD2A0FB34A1DA138E66141D8445179DB971FF3BA92D68^pimgpsh_fullsize_distr.jpg', 'RESMAS A4.jpg', 'Husares75gA4.jpg', 10, 1, 0, 'Resma A4 \r\n75gr\r\n500 Hojas', 0),
(46, 'Reloj Smart Band Tw64 Bluetooth - Running', '550', '6', 'B', 'smartwatch-tw64-bluetooth-samara-importaciones-D_NQ_NP_839743-MLA26445756775_112017-O.jpg', 'Bluetooth-Smart-Watch-TW64-SmartBand-Bracelet-Wearable-Life-Waterproof-Pedometer-SmartWatch-For-IOS-Android-Fitness-Tracker.jpg', 'tw64_smart_bluetooth_4.0_wristband_fitness_activity_tracker_-zp3034270624000.jpg', 10, 1, 1, 'CaracterÃ­sticas:\r\n.- Modelo: TW64\r\n.- Vinculacion sin limites Bluetooth\r\n.- Funcion Recordatorios\r\n.- \"Encontrar Movil\": \r\nFuncion de busqueda de smartphone a traves de seÃ±al sonora\r\n.- Podometro\r\n.- Monitor de sueÃ±o\r\n.- Monitor de Actividad\r\n.- Toma fotos de forma remota\r\n.- Color en disponibilidad: Negro', 0),
(47, 'Reloj Smart Band Tw64 Bluetooth - Running', '550', '8', 'A', 'smartwatch-tw64-bluetooth-samara-importaciones-D_NQ_NP_839743-MLA26445756775_112017-O.jpg', 'Bluetooth-Smart-Watch-TW64-SmartBand-Bracelet-Wearable-Life-Waterproof-Pedometer-SmartWatch-For-IOS-Android-Fitness-Tracker.jpg', 'tw64_smart_bluetooth_4.0_wristband_fitness_activity_tracker_-zp3034270624000.jpg', 10, 1, 1, 'CaracterÃ­sticas:\r\n.- Modelo: TW64\r\n.- Vinculacion sin limites Bluetooth\r\n.- Funcion Recordatorios\r\n.- \"Encontrar Movil\": \r\nFuncion de busqueda de smartphone a traves de seÃ±al sonora\r\n.- Podometro\r\n.- Monitor de sueÃ±o\r\n.- Monitor de Actividad\r\n.- Toma fotos de forma remota\r\n.- Color en disponibilidad: Negro', 0),
(48, 'Cartuchos alternativos Epson 73 Black', '120', '7', 'A', 'cartucho-gtc-t73-negro-22989-MLA20238826913_022015-O.jpg', '', '', 50, 1, 0, 'Cartucho alternativo Epson 73 Black', 0),
(49, 'Cartuchos alternativos Epson 195/ 196/ 197', '180', '7', 'A', 'cartuchos-alternativos-epson-xp-201-xp-401-xp-211-rosario-D_NQ_NP_920221-MLA20726057953_052016-F.jpg', '', '', 40, 1, 0, 'El valor es por unidad', 0),
(50, 'Cartuchos alternativo HP 664', '950', '7', 'A', '633215-MLA25171560034_112016-O.jpg', '', '', 20, 1, 0, 'CARTUCHO COMPATIBLE. VALOR POR UNIDAD', 0),
(51, 'CÃ¡mara EspÃ­a 360Â° Foco Lampara Led - Wifi - Con Sonido', '1800', '20', 'A', '51rMSIoWiaL.jpg', '0004.jpg', '0002.jpg', 2, 1, 0, 'Camara Inalambrica IP Oculta EspÃ­a 360 LÃ¡mpara\r\n\r\nCÃ¡mara de seguridad IP Inalambrica con sensor de movimiento y alarma en tiempo real\r\nVista panorÃ¡mica 360\r\nFiltro automÃ¡tico IR para uso dÃ­a / noche, visiÃ³n nocturna\r\nHD 1280p x 960p\r\nAudio de doble vÃ­a (microfono y parlante)\r\nLÃ¡mpara LED con rosca normal E27\r\nControl y visiÃ³n por APP SHOWMO\r\nFÃ¡cil de instalar, a 220V y se conecta por WIFI a la red a 50 metros\r\nUso recomendado en interiores (en exteriores puede ingresarle humedad o insectos por el parlante)\r\nGraba hasta 10 dias continuos con memoria de 128gb micro SD\r\n', 0),
(52, 'Parlante Jbl Xtreme', '5500', '13', 'A', 'item_XL_9134628_9684567.jpg', 'JBL_Xtreme___2.jpg', 'JBL-Xtreme_990.jpg', 2, 1, 1, '- CaracterÃ­sticas:\r\nâ€¢ Conectividad Bluetooth (Permite enlazar hasta 2 parlantes con tu dispositivo Bluetooth)\r\nâ€¢ Puerto USB \r\nâ€¢ Entrada Auxiliar\r\nâ€¢ Cierre de seguridad para que no ingrese polvo al puerto USB \r\nâ€¢ Sorprendente Potencia de Graves y Agudos \r\nâ€¢ Resistente a Salpicaduras\r\nâ€¢ Impresionante Bateria de 10.000 Mah que te permite reproducciÃ³n por hasta 15 horas continuas\r\nâ€¢ 20W de Potencia real en 2 salidas de 10 W \r\nâ€¢ Compatibilidad A2DP V1.3 AVRCP V1.5\r\nâ€¢ Transductor Woofer 2 x 63 mm\r\nâ€¢ Tweeter 2 x 35mm\r\nâ€¢ Potencia nominal : 2 x 20w biamplificado (Modo CA)\r\nâ€¢ Intervalo de frecuencias : 70-20 Khz\r\nâ€¢ Radio de SeÃ±al Ruido - 80 Db\r\nâ€¢ AlimentaciÃ³n 3 A\r\nâ€¢ Tipo de Bateria: Ion-Litio PolimÃ©rica (37Wh)\r\nâ€¢ Tiempo de carga maxima de bateria Maxima 3:30 Hs (Aproximadamente)\r\nâ€¢ Salida de Carga Unica USB 1 x 2 Amp\r\nâ€¢ Salida de Carga Doble USB 2 x 1 Amp\r\nâ€¢ Potencia de transmisor Bluetooh 0-4dBm\r\nâ€¢ Peso (kg)2112 g\r\nâ€¢ Dimensiones : 126 x 283 x 122 mm\r\nâ€¢ Disponible En Colores : Negro , Rojo , Camuflado y Azul (Consulte Stock antes de ofertar)\r\nâ€¢ Incluye Correa de Traslado\r\nâ€¢ Incluye Cable USB\r\nâ€¢ Incluye Cable de ConexiÃ³n 3,5mm', 0),
(53, 'Parlante JBL Charge 3 ', '3000', '13', 'A', '870449-MLB25944466424_092017-C.jpg', 'JBL-Charge-3-Portable-Speaker-4.jpg', '059b2e83-41fe-4f50-bf94-a220b3b24cc9.jpg', 5, 1, 0, 'PARLANTE REPPLICA JBL CHARGE 3 \r\n\r\nConectividad Bluetooth \r\nPuerto USB \r\nEntrada Auxiliar\r\nProtecciÃ³n de goma para que no entre tierra ni humedad en puertos USB , SD , Carga y Auxiliar\r\nSorprendente Potencia de Graves , MEDIOS y Agudos \r\nResistente a Salpicaduras (Splashproof)\r\nImpresionante Bateria de 6.000 Mah que te permite reproduciÃ³n por hasta 12 horas continuas\r\nPotencia 2x10 W \r\nCompatibilidad A2DP V1.3 AVRCP V1.5\r\nTransductor Woofer 2 x 50 mm\r\nIntervalo de frecuencias : 65-20 Khz\r\nRadio de SeÃ±al Ruido - 80 Db\r\nAlimentaciÃ³n 5v , 2.3 Amp/h\r\nTipo de Bateria: Ion-Litio PolimÃ©rica 6000 mamp/h de 3.7v \r\nTiempo de carga maxima de bateria Maxima 4,5 Hs (Aproximadamente)\r\nPotencia de transmisor Bluetooh 0-4dBm\r\nPeso (kg) 800 g\r\nDimensiones : 213 x 87 x 88.5 mm\r\nDisponible En Color : Negro \r\nIncluye Cable Auxiliar 3,5mm', 0),
(54, 'Adaptador Usb Wifi Tp Link Tl-wn823n 300mbps1', '350', '18', 'A', 'adaptador-usb-wifi-tp-link-tl-wn823n-chollo.jpg', '61ktTXiegFL._SL1276_.jpg', '00128536846307___S3_600x600.jpg', 5, 1, 1, 'Mini Adaptador USB InalÃ¡mbrico N de 300Mbps\r\nTL-WN823N\r\n\r\n*Velocidad de transferencia datos inalÃ¡mbrica de 300Mbps ideal para video en alta definiciÃ³n sin problemas, streaming de voz y juegos en lÃ­nea\r\n*DiseÃ±o de tamaÃ±o miniatura para una portabilidad conveniente con un alto desempeÃ±o confiable\r\n*Modo SoftAP â€“ Convierta una conexiÃ³n de internet cableada en una PC o Laptop en un hotspot Wi-Fi\r\n*Configure fÃ¡cilmente una conexiÃ³n inalÃ¡mbrica segura con sÃ³lo presionar un botÃ³n WPS', 50),
(55, 'Receptor Dub 4k Iptv -tv Cable+ Futbol+ Smart tv Gratis', '4500', '21', 'A', 'receptor-de-tv-dub-4k-ultra-hd-D_NQ_NP_661561-MLA26321903463_112017-F.jpg', '0000.jpg', 'dub_1.jpg', 3, 1, 1, 'Dub trae un paquete con mÃ¡s de 1500 canales, siendo transmitidos en 4 idiomas, portuguÃ©s, espaÃ±ol, Ã¡rabe e inglÃ©s. \r\nOtra gran ventaja esta en su punto de acceso a internet que es 1x rj45, 10/100mbps y su wifi 802.11b / g/ n hace que su seÃ±al de Internet sea muy aprovechado por el aparato.\r\nAdemÃ¡s de ser un aparato que emite una imagen 4k ultra HD (el canal tiene que ser transmitido en 4k), cuenta con una entrada HDMI y una ranura micro sd para expandir su memoria. \r\nTambiÃ©n cuenta con dos entradas usb que puede estar conectando el ratÃ³n y el teclado y utilizando como un \"microcomputador\", como asÃ­? Eso mismo como cuenta con un sistema androide 7.1 el cielo es el lÃ­mite para el DUB4K.', 0),
(56, 'Tablet 7 inch Xenit 700', '1800', '9', 'A', 'DR-body-Xenit-701_01.jpg', 'tablet-7-xenit-700-quadcore-cortex-a7-1gb-ram-8gb-rom-D_NQ_NP_787225-MLA25403820674_022017-F.jpg', '58de8e61d3c77sl.jpg', 4, 1, 1, 'TABLET XENIT 700 - 7 PULGADAS - QUAD CORE - DUALCAM\r\n\r\nCARACTERISTICAS:\r\n\r\n-PANTALLA 7\"\r\n-RESOLUCION 1024x600\r\n-QUAD CORE CORTEX A7 A33 INET\r\n-RAM 1 GB\r\n-MEMORIA 8 GB\r\n-DUALCAM.. FRONTAL:0.3 MP / TRASERA 2.0 MP\r\n-PUERTO USB - TARJETA TF - CONECTOR AURICULARES - OTG\r\n-BATERIA 3000 mAh', 0),
(57, 'Tablet 10 inch - Xenit 102', '2900', '9', 'B', 'tablet-xenit-102-android.jpg', 'tablet-xenit-102-10-octacore-1gb-ram-lusamsa-celulares-D_NQ_NP_695025-MLA26589943430_012018-O.jpg', 'tablet-10-pulgadas-octa-16gb-android-5-hdmi-funda-teclado-D_NQ_NP_995927-MLA25716706678_062017-F.jpg', 4, 1, 1, '', 0),
(58, 'Tablet 10 inch - Xenit 102', '2900', '9', 'A', 'tablet-xenit-102-android.jpg', 'tablet-xenit-102-10-octacore-1gb-ram-lusamsa-celulares-D_NQ_NP_695025-MLA26589943430_012018-O.jpg', 'tablet-10-pulgadas-octa-16gb-android-5-hdmi-funda-teclado-D_NQ_NP_995927-MLA25716706678_062017-F.jpg', 4, 1, 1, 'Marca\r\nXenit\r\nLÃ­nea\r\nLibre\r\nModelo\r\n102\r\nConectividad de la tablet\r\nWi-Fi\r\nCapacidad\r\n16 GB\r\nTamaÃ±o de pantalla\r\n10.1 pulgadas\r\nCantidad de nÃºcleos\r\n8 NÃºcleos', 0),
(59, 'Soporte Tv Led Nakan Spl-575e 10 inch A 43 inch Doble Brazo', '650', '16', 'A', '4352_400.jpg', 'soporte-tv-led-universal-nakan-spl-575e-de-10-a-43-pulgadas-D_NQ_NP_949883-MLA26617269147_012018-F.jpg', 'SPL-575E4-600x800.jpg', 5, 1, 0, '-MODELO: SPL-575E.\r\n-EXTENSIBLE GIRATORIO CON INCLINACION.\r\n-DE 10\' A 43\'.\r\n-KIT DE FIJACION.\r\n-EXTENSIBLE DE 6 A 20 CMTS.\r\n-RESISTE 20 KG.\r\n-UNIVERSAL Y VESA 75 X 75 A 200 X 200.\r\n-INCLINACION 20Â°.\r\n-ROTACION 180Â°.\r\n-ORIGEN: CHINA.\r\n\r\n-VISITA EL ARTICULO EN LA PAGINA OFICIAL DE LA MARCA:\r\nhttp://www.soportesnakan.com.ar/productos/spl-575-86', 0),
(60, 'Panel radiante Liliana CFM720 con forzador Turbotempo ', '3000', '22', 'A', 'Oferta 001.jpg', '', '', 5, 1, 1, 'Forzador que recircula el aire del ambiente convirtiÃ©ndolo en cÃ¡lido en pocos minutos.\r\nâ€¢ Panel de Mica totalmente ecolÃ³gico.\r\nâ€¢ Led indicador de funciones.\r\nâ€¢ Timer programable de Â½ hasta 7 Â½ hs y selector de potencia para mayor ahorro de energÃ­a.\r\nâ€¢ Control Remoto.\r\nâ€¢ Frente mallado.\r\nâ€¢ Corte de seguridad por sobrecalentamiento y por caÃ­da.\r\nâ€¢ Potencia: 1000/2000 watts.\r\nAlto: 65,0 cm.\r\nAncho: 63,5 cm.\r\nProfundidad: 19,5 cm.\r\nTurboforzadores\r\nEsta LÃ­nea se caracteriza por contar con forzadores o doble forzadores.\r\nEstos dispositivos generan un gran caudal de aire cÃ¡lido, moviÃ©ndolo y distribuyÃ©ndolo en el ambiente en forma rÃ¡pida y efectiva.\r\nGran ahorro en el consumo de energÃ­a.\r\nPueden utilizarse en ambientes cerrados ya que no consumen oxÃ­geno.\r\nSon totalmente seguros.\r\n', 0),
(61, 'Calefactor Liliana CFTP530 Torre con forzador tropic', '1700', '22', 'A', 'liliana_calefaccion_tropic.jpg', '', '', 5, 1, 1, 'Forzador de aire.\r\nâ€¢ Motor ultrasilencioso.\r\nâ€¢ Placa cerÃ¡mica de PTC de alta seguridad y eficiencia.\r\nâ€¢ FunciÃ³n oscilante.\r\nâ€¢ Corte por sobrecalentamiento y por caÃ­da.\r\nâ€¢ Potencia: 750/1500 watts.\r\nâ€¢ Color: Blanco.\r\nAlto: 57,4 cm.\r\nAncho: 22 cm.\r\nProfundidad: 15,9 cm.\r\nTurboforzadores\r\nEsta LÃ­nea se caracteriza por contar con forzadores o doble forzadores.\r\nEstos dispositivos generan un gran caudal de aire cÃ¡lido, moviÃ©ndolo y distribuyÃ©ndolo en el ambiente en forma rÃ¡pida y efectiva.\r\nGran ahorro en el consumo de energÃ­a.\r\nPueden utilizarse en ambientes cerrados ya que no consumen oxÃ­geno.\r\nSon totalmente seguros.\r\n', 0),
(62, 'Tecno Turbo Liliana CTCV100 1100/2200W', '2100', '22', 'A', 'TCV100-Pie-con-grÃ¡fica-web.jpg', 'TCV100-TECNOHOT-Pared_02_web-02.jpg', '', 5, 1, 1, '100% Kcal directas al ambiente sin desperdicio de calor ni energÃ­a.\r\nTres niveles de calor\r\n3- Super calor: Doble elemento calefactor con turbina tangencial. 2200 W = 1900 Kcal.\r\n2- Calor forzado con turbina tangencial que recircula el aire calentÃ¡ndolo rÃ¡pidamente. 1000 W = 950 Kcal.\r\n1- Calor por convecciÃ³n natural para calentar o mantener el ambiente cÃ¡lido. 1100 W = 950 Kcal.\r\n100% seguro\r\nâ€¢ No consume oxÃ­geno.\r\nâ€¢ Paredes frÃ­as.\r\nâ€¢ Mayor aislaciÃ³n elÃ©ctrica.\r\nâ€¢ Corte de seguridad por caÃ­da y sobrecalentamiento.\r\nTurbina sÃºper silenciosa\r\nâ€¢ Recircula el aire del ambiente convirtiÃ©ndolo en cÃ¡lido de forma rÃ¡pida y efectiva.\r\nâ€¢ Termostato regulable que ahorra energÃ­a.\r\nâ€¢ Patas para ser utilizado sobre el piso o soporte de fÃ¡cil montaje en pared.\r\nâ€¢ Color: Blanco con negro.\r\nâ€¢ Potencia: 1100 / 2200 W.\r\n', 0),
(63, 'Calefactor infrarojo Liliana CI080 calore', '1250', '22', 'A', 'CI080-CALORE-Frente_web.jpg', 'CI080-CALORE-Girada_web.jpg', 'CI080-CALORE-Lateral_web (1).jpg', 5, 1, 1, 'Totalmente seguro\r\nâ€¢ No consume oxÃ­geno.\r\nâ€¢ Corte de seguridad por caÃ­da y sobrecalentamiento.\r\nCalefactor infrarrojo\r\nâ€¢ Amplia radiaciÃ³n frontal. 3 tubos.\r\nâ€¢ Frente mallado.\r\nâ€¢ IluminaciÃ³n atenuada.\r\nâ€¢ Selector de temperatura.\r\nâ€¢ DiseÃ±o compacto.\r\nâ€¢ Color: Blanco.\r\nâ€¢ Potencia: 700/ 1.400 W.\r\nAlto: 51 cm.\r\nAncho: 31 cm.\r\nProfundidad: 18 cm.\r\n', 0),
(64, 'test', '100', '19', 'A', 'spa.jpg', '', '', 2, 1, 1, 'asdas', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(151) NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `categoria_servicio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `nombre`, `precio`, `descripcion`, `categoria_servicio_id`) VALUES
(1, 'Full Body Massage (55 mins)', 78, 'Lorem ipsum dolor sit amet, ea eos causae vocent accusamus, eum tota partem an. Cu mucius postea ornatus quo. Duo no aeque dolorum patrioque. Ut sed blandit antiopam sententiae, cu prima similique deterruisset vis.', 1),
(2, 'Add on: Deep Tissue Massage (per area)', 25, 'Lorem ipsum dolor sit amet, ea eos causae vocent accusamus, eum tota partem an. Cu mucius postea ornatus quo. Duo no aeque dolorum patrioque. Ut sed blandit antiopam sententiae, cu prima similique deterruisset vis.', 1),
(3, 'Hot Stone Massage (55 mins)', 73, 'Lorem ipsum dolor sit amet, ea eos causae vocent accusamus, eum tota partem an. Cu mucius postea ornatus quo. Duo no aeque dolorum patrioque. Ut sed blandit antiopam sententiae, cu prima similique deterruisset vis.', 1),
(4, 'Maternity Massage (55 mins)', 50, 'Lorem ipsum dolor sit amet, ea eos causae vocent accusamus, eum tota partem an. Cu mucius postea ornatus quo. Duo no aeque dolorum patrioque. Ut sed blandit antiopam sententiae, cu prima similique deterruisset vis.', 1),
(5, 'Delux Seated Massage (20 mins)', 23, 'Lorem ipsum dolor sit amet, ea eos causae vocent accusamus, eum tota partem an. Cu mucius postea ornatus quo. Duo no aeque dolorum patrioque. Ut sed blandit antiopam sententiae, cu prima similique deterruisset vis.', 1),
(6, 'Regular Seated Massage (10 mins)', 10, 'Lorem ipsum dolor sit amet, ea eos causae vocent accusamus, eum tota partem an. Cu mucius postea ornatus quo. Duo no aeque dolorum patrioque. Ut sed blandit antiopam sententiae, cu prima similique deterruisset vis.', 1),
(7, 'Body Polish (1 hr)', 68, 'Lorem ipsum dolor sit amet, ea eos causae vocent accusamus, eum tota partem an. Cu mucius postea ornatus quo. Duo no aeque dolorum patrioque. Ut sed blandit antiopam sententiae, cu prima similique deterruisset vis.', 1),
(8, 'Sea Mud Wrap (1 hr)', 78, 'Lorem ipsum dolor sit amet, ea eos causae vocent accusamus, eum tota partem an. Cu mucius postea ornatus quo. Duo no aeque dolorum patrioque. Ut sed blandit antiopam sententiae, cu prima similique deterruisset vis.', 1),
(9, 'The Ultimate Body Treatment (1hr 50 mins)', 100, 'Lorem ipsum dolor sit amet, ea eos causae vocent accusamus, eum tota partem an. Cu mucius postea ornatus quo. Duo no aeque dolorum patrioque. Ut sed blandit antiopam sententiae, cu prima similique deterruisset vis.', 1),
(10, 'Full Body Massage (55 mins)', 78, 'Lorem ipsum dolor sit amet, ea eos causae vocent accusamus, eum tota partem an. Cu mucius postea ornatus quo. Duo no aeque dolorum patrioque. Ut sed blandit antiopam sententiae, cu prima similique deterruisset vis.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `estado` varchar(2) NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `apellidonombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `clave`, `mail`, `telefono`, `estado`, `apellidonombre`) VALUES
(2, 'admin', '$2y$10$pNvZ8G4cJQg6oNjEus9oJu4eINesr2cDD9EFkOnXWLyXSu9uXHWbS', 'admin@gmail.com', '1535556666', 'A', 'Tec One'),
(3, 'tecone.tecnologia@gmail.com', 'corriente535', 'tecone.tecnologia@gmail.com', '1139565771', 'A', 'TecOne Tecnologia '),
(4, 'santiago', 'Santiago@1', 'ethos.dc@gmail.com ', '01122885601', 'A', 'Santiago lopez');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_servicio`
--
ALTER TABLE `categoria_servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_servicio_id` (`categoria_servicio_id`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `categoria_servicio_servicio` FOREIGN KEY (`categoria_servicio_id`) REFERENCES `categoria_servicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
