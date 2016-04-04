-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-10-2012 a las 16:03:52
-- Versión del servidor: 5.0.91
-- Versión de PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lpzpijih_cont_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cont_contador`
--

CREATE TABLE IF NOT EXISTS `cont_contador` (
  `inmo_op` varchar(25) character set utf8 NOT NULL,
  `cont_inmo` varchar(25) character set utf8 NOT NULL,
  `cont_contador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `cont_contador`
--

INSERT INTO `cont_contador` (`inmo_op`, `cont_inmo`, `cont_contador`) VALUES
('alquiler', 'Piso', 1),
('venta', 'Piso', 1),
('alquiler', 'Apartamento', 1),
('venta', 'Apartamento', 2),
('alquiler', 'Casa', 1),
('venta', 'Casa', 1),
('alquiler', 'Chalet', 1),
('venta', 'Chalet', 1),
('alquiler', 'Obra nueva', 1),
('venta', 'Obra nueva', 1),
('alquiler', 'Garaje', 1),
('venta', 'Garaje', 1),
('aquiler', 'Oficina', 0),
('venta', 'Oficina', 1),
('aquiler', 'Local comercial', 0),
('venta', 'Local comercial', 1),
('alquiler', 'Terreno', 1),
('venta', 'Terreno', 1),
('alquiler', 'Nave', 1),
('venta', 'Nave', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cont_inmo`
--

CREATE TABLE IF NOT EXISTS `cont_inmo` (
  `inmo_id` int(10) NOT NULL auto_increment,
  `inmo_name` varchar(55) NOT NULL,
  `inmo_op` varchar(25) NOT NULL,
  `inmo_type` varchar(25) NOT NULL,
  `inmo_size` int(10) NOT NULL,
  `inmo_habit` int(2) NOT NULL,
  `inmo_wc` int(2) NOT NULL,
  `inmo_info` varchar(512) NOT NULL,
  `inmo_images` varchar(9999) NOT NULL,
  `inmo_price` int(10) NOT NULL,
  PRIMARY KEY  (`inmo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `cont_inmo`
--

INSERT INTO `cont_inmo` (`inmo_id`, `inmo_name`, `inmo_op`, `inmo_type`, `inmo_size`, `inmo_habit`, `inmo_wc`, `inmo_info`, `inmo_images`, `inmo_price`) VALUES
(1, 'Villa Verde', 'Venta', 'Casa', 250, 4, 2, '<p>Villa Verde es una casa a las afueras de la ciudad situada en una preciosa urbanizaci&oacute;n rodeada de zonas verdes para el ocio de toda la familia. La casa es de nueva construcci&oacute;n y esta equipada con sistema de calefacci&oacute;n, aire acondicionado, climalit, tarima flotante y una de las habitaciones tiene moqueta.&nbsp;(Esto es una demostraci&oacute;n y el inmueble no existe)</p>', 'images-(1).jpg&images-(2).jpg&images-(3).jpg&images.jpg&', 300000),
(2, 'Piso', 'Alquiler', 'Piso', 80, 2, 1, '<p>4&ordm; Piso en una traquila urbanizaci&oacute;n en el centro de la ciudad. Muy luminoso y con vistas a la calle principal. Silencioso y muy bien aislado gracias a un sistema de dobles ventanas que protegen del calor y el fr&iacute;o. Ascensor y garaje en el mismo edificio. (Esto es una demostraci&oacute;n y el inmueble no existe)</p>', 'images-(1).jpg&images-(2).jpg&images-(3).jpg&images.jpg&', 350);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uno_articles`
--

CREATE TABLE IF NOT EXISTS `uno_articles` (
  `article_id` int(10) NOT NULL auto_increment,
  `article_name` varchar(99) character set utf8 collate utf8_spanish_ci NOT NULL,
  `article_alias` varchar(25) character set utf8 collate utf8_spanish_ci NOT NULL,
  `article_content` varchar(9999) NOT NULL,
  `article_metas` varchar(255) character set utf8 collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `uno_articles`
--

INSERT INTO `uno_articles` (`article_id`, `article_name`, `article_alias`, `article_content`, `article_metas`) VALUES
(2, 'INMOBILIARIA', 'inmobiliaria', '<p><em>Comprar, Vender, Alquilar un inmueble o Traspasar</em> una empresa o negocio; muestra meta, en <strong>CONTINENTAL Consulting y Gesti&oacute;n Empresarial - &Aacute;rea Inmobiliaria</strong>, se basa en llevar a buen t&eacute;rmino las peticiones de nuestros clientes, buscando en todo el parque inmobiliario, hasta <span style="text-decoration: underline;">hallar el mejor inmueble</span> y en <span style="text-decoration: underline;">las mejores condiciones</span>. Nuestro esfuerzo y dedicaci&oacute;n diaria, as&iacute; como la preparaci&oacute;n de nuestro personal, optimizan las condiciones de &eacute;xito de un encargo, permiti&eacute;ndonos alcanzar cualquier objetivo en servicios inmobiliarios.</p>\r\n<p><strong><span style="text-decoration: underline;">La perseverancia nos hace ser eficientes:</span></strong> siendo conocedores del mercado inmobiliario de nuestro entorno, primeramente, intentamos asesorar con fiabilidad al particular o promotor que quiera poner a la venta o alquiler su inmueble o negocio para conseguir un precio &oacute;ptimo pero a la vez posible. De la misma forma atendemos al cliente que quiere adquirir un inmueble, ofreci&eacute;ndole las m&aacute;s diversas oportunidades del mercado y d&aacute;ndole los elementos de juicio suficientes para tomar la mejor decisi&oacute;n en su compra, alquiler o traspaso.</p>\r\n<p>En <strong>CONTINENTAL Consulting y Gesti&oacute;n Empresarial</strong>, ofrecemos un<strong> trato personalizado</strong> a todos nuestros clientes, adem&aacute;s, garantizamos que todas operaciones ser&aacute;n realizadas con la m&aacute;xima discreci&oacute;n y confidencialidad.</p>\r\n<p>Tanto en Asesoramiento, Administraci&oacute;n de Comunidades y Fincas, como en la Intermediaci&oacute;n Inmobiliaria nos hemos posicionado en la atenci&oacute;n y servicio integral a la peque&ntilde;a empresa como a particulares.</p>\r\n<p><br /><br /></p>\r\n<h4>SERVICIOS A COMPRADORES</h4>\r\n<p>Somos conscientes del esfuerzo y cansancio que supone la b&uacute;squeda de un inmueble, as&iacute; como de la apuesta econ&oacute;mica que conlleva, por ello, nuestros servicios est&aacute;n dise&ntilde;ados y enfocados para optimizar en el m&aacute;s breve plazo de tiempo, todos nuestros recursos, as&iacute; como su tiempo y situaci&oacute;n econ&oacute;mica.</p>\r\n<p>Las principales ventajas que <strong>CONTINENTAL Consulting y Gesti&oacute;n Empresarial- &Aacute;rea Inmobiliaria</strong>, ofrece a sus clientes son, entre otras:</p>\r\n<ul>\r\n<li><strong>Comodidad de b&uacute;squeda</strong>. Definimos con el cliente sus intereses y deseos y realizamos b&uacute;squedas en nuestra cartera propia y en el mercado hasta hallar los inmuebles m&aacute;s adecuados a su perfil.</li>\r\n<li><strong>Facilidades de tramitaci&oacute;n</strong>. Buscamos las mejores opciones de financiaci&oacute;n para cada caso en particular y asesoramos a nuestros clientes desde la identificaci&oacute;n de inmuebles hasta la firma de escrituras de propiedad y cualquier detalle que surja una vez ya entregado el inmueble.</li>\r\n<li><strong>Profesionalidad</strong>. Ante todo, profesionalidad y discreci&oacute;n en la b&uacute;squeda de un inmueble, as&iacute; como confidencialidad en el trato de la documentaci&oacute;n entregada.</li>\r\n</ul>\r\n<p>Para su comodidad, en la zona de Links hemos habilitado una multitud de direcciones de inter&eacute;s, como para poder calcular la cuota mensual aproximada a pagar sobre un pr&eacute;stamo hipotecario, el plazo y el tipo de inter&eacute;s aplicable, mapas de Ver&iacute;n y Comarca, etc&hellip;.</p>\r\n<p>Contacte con nosotros describi&eacute;ndonos el inmueble o negocio que est&aacute; buscando y d&eacute;jese asesorar por<strong> CONTINENTAL Consulting y Gesti&oacute;n Empresarial, &Aacute;rea Inmobiliaria</strong> sin ning&uacute;n tipo de compromiso. Le informaremos sobre inmuebles que encajan con sus demandas.</p>\r\n<h3>SERVICIOS A VENDEDORES</h3>\r\n<p>En <strong>CONTINENTAL Consulting y Gesti&oacute;n Empresarial- &Aacute;rea Inmobiliaria,</strong>le ayudaremos a encontrar comprador para la propiedad que usted ha decidido vender y le asesoraremos con las gestiones necesarias a tal efecto.</p>\r\n<p>La transacci&oacute;n de una propiedad inmobiliaria es un asunto delicado f&aacute;cil, que puede tener complicaciones si no se han tenido en cuenta elementos muy importantes que le ata&ntilde;en como vendedor. Nuestra l&iacute;nea de servicios le ofrece:</p>\r\n<ul>\r\n<li><strong>Valoraci&oacute;n del inmueble</strong>. Tomando como base nuestra amplia cartera de inmuebles completamente actualizada, le ayudamos en la estimaci&oacute;n de un precio de venta, sin tener que recurrir de entrada a tasaciones o valoraciones con un coste considerable.</li>\r\n<li><strong>B&uacute;squeda de compradores</strong>. Tanto en nuestras oficinas como a trav&eacute;s de nuestra p&aacute;gina web y mediante campa&ntilde;as publicitarias, buscamos un comprador para su inmueble.</li>\r\n<li><strong>Asesoramiento continuo</strong>. Una vez encontrado el cliente, le acompa&ntilde;amos en la tramitaci&oacute;n de todo el proceso de compraventa de la propiedad.</li>\r\n</ul>\r\n<p>Contacte con nosotros y d&eacute;jese asesorar por <strong>CONTINENTAL Consulting y Gesti&oacute;n Empresarial - &Aacute;rea Inmobiliaria</strong>, sin ning&uacute;n tipo de compromiso. Le informaremos sobre la mejor manera de encontrar comprador para su inmueble.</p>\r\n<h3>SERVICIOS A INVERSORES</h3>\r\n<p>Ahora m&aacute;s que nunca, el mercado inmobiliario sigue ofreciendo <span style="text-decoration: underline;">oportunidades &uacute;nicas</span> y opciones interesantes de inversi&oacute;n.</p>\r\n<p>En el &aacute;mbito de inversores, desde <strong>CONTINENTAL Consulting y Gesti&oacute;n Empresarial - &Aacute;rea Inmobiliaria,</strong> &nbsp;ofrecemos servicios inmobiliarios integrales que abarcan las siguientes l&iacute;neas:</p>\r\n<ul>\r\n<li>Gesti&oacute;n de suelo y urban&iacute;stica</li>\r\n<li>Asesor&iacute;a en arquitectura y reformas</li>\r\n<li>Nueva promoci&oacute;n</li>\r\n<li>Gesti&oacute;n internacional</li>\r\n</ul>\r\n<p>Mantenemos un constante contacto con el mercado para identificar las mejores oportunidades y ofrecer a nuestros clientes la propiedad id&oacute;nea de inversi&oacute;n. Siempre con un trato personalizado, eficiente y profesional.</p>\r\n<p>Contacte con nosotros y d&eacute;jese asesorar por <strong>CONTINENTAL Consulting y Gesti&oacute;n Empresarial- &Aacute;rea Inmobiliaria</strong>, sin ning&uacute;n tipo de compromiso. Le informaremos sobre oportunidades de inversi&oacute;n que se adecuen a sus preferencias.</p>\r\n<p>Contamos con una extensa cartera de inmuebles, tanto en <strong>compra-venta</strong> como en <strong>alquiler</strong>.</p>\r\n<h3>OPORTUNIDADES - OCASI&Oacute;N</h3>', ''),
(3, 'ASESORÍA', 'asesoria', '<p>Asesorar no es sólo llevar una contabilidad, sino  hacer que ésta refleje la realidad, se ajuste a la normativa y de esa manera,  ser capaces de obtener la información adecuada que haga posible una eficaz toma  de decisiones.</p> <p>   <strong>Por ello, en CONTINENTAL Consulting y Gestión Empresarial – Asesoria,  entendemos que</strong> el asesoramiento debe ser algo más que la confección  de los distintos modelos de impuestos. Creemos que lo fundamental está en el  trato personal y directo con el cliente, explicándole el cómo y el porqué de  cada una de las gestiones, transmitiéndole en cada momento la situación real de  su empresa y las formas de mejorarla.<br />   <br />   Intentamos mantener una línea diferenciadora al  ofertar un servicio integral a nuestros clientes: recoger, tramitar y entregar  cualquier documentación.<br />   <br />   Los distintos servicios que ofertamos son:<br /> </p> <h3>FISCAL</h3> <p>A través de esta área <strong>CONTINENTAL  Consulting y Gestión Empresarial – Asesoria</strong> se cubren  las necesidades de las personas físicas y jurídicas en todo lo relacionado con  el cumplimiento de las normas fiscales. <br />   <br />   Le ofrecemos un servicio actualizado permanentemente; sabrá en todo momento  cuales son sus obligaciones fiscales y cual es el perfil más conveniente para  su negocio, obteniendo por su parte la determinación del menor coste  impositivo.</p> <p>Servicios a destacar en el área fiscal:</p> <p>• Asesoramiento fiscal integral.<br />   • Declaraciones, mensuales, trimestrales y anuales.<br />   • Gestión de documentación fiscal.<br />   • Cálculo y presentación de impuestos.<br />   • Declaración de IRPF <br />   • Declaraciones de IVA<br />   • Declaraciones de Intrastat<br />   • Impuesto sobre sociedades.<br />   • Punto Verde. Declaraciones anuales.<br />   • Asistencia técnica ante la inspección de hacienda.<br />   • Reclamaciones y recursos ante la administración.<br />   • Estudios sobre fiscalidad especifica de actividades y situaciones especiales.<br />   • Determinación del coste impositivo ante distintas alternativas de acción. <br />   • Definición del perfil fiscal más conveniente. <br />   • Asesoramiento general. </p> </br> <h3>CONTABLE</h3> <p><strong>CONTINENTAL Consulting y Gestión Empresarial – Asesoria</strong> le  ofrece asesoramiento profesional permanente para garantizar que su información  contable represente la realidad financiera de su empresa en todo momento,  facilitando con ello la toma de decisiones.</p> <p>Servicios a destacar en el área contable:</p> <p>• Asesoramiento contable integral<br />   • Valoración de empresas<br />   • Análisis de la gestión administrativa<br />   • Apertura y cierres de empresas<br />   • Gestiones ante Organismos Públicos<br />   • Contabilidad analítica y financiera<br />   • Análisis de balances.<br />   • Confección de circuitos administrativos / contables.<br />   • Preparación, seguimiento y control presupuestario. <br />   • Confección de estados financieros.<br />   • Análisis financiero y de costes.<br />   • Actualización de contabilidades atrasadas. <br />   • Aplicación de normas de valuación.<br />   • Análisis, confección y presentación de índices.<br />   • Legalización de los libros oficiales de contabilidad. (Libro Diario, libro de  Balances y Cuentas Anuales, libro de actas, libro <br />   &nbsp; &nbsp; Registro de Socios, etc...). <br />   • Libros de registro de facturas emitidas y recibidas. <br />   • Cuentas Anuales: Balance de Situación, Cuenta de Pérdidas, estado de cambios  en el Patrimonio Neto, flujos de Efectivo y<br />   &nbsp;&nbsp; Ganancias, Memoria y Certificación del Acuerdo de la Junta. <br />   • Preparación y depósito de las Cuentas Anuales en el Registro Mercantil.<br />   • Asesoramiento y formación al personal de su departamento contable.<br />   • Importación de contabilidades desde cualquier programa.</p> <br /> <h3>LABORAL</h3> <p>A través de esta área  <strong>CONTINENTAL Consulting y Gestión Empresarial – Asesoria</strong> se  cubren las necesidades de las empresas en todo lo relacionado con el  cumplimiento de la gestión laboral y de seguridad social.</p> <p>Servicios a destacar en el área laboral:</p> <p>• Confección de nóminas y seguros sociales. <br />   • Contratos de los Trabajadores. <br />   • Finiquitos. <br />   • Comunicación de alta, baja y variación de datos de los trabajadores.<br />   • Confección de carta IRPF mensual (modelo 110).<br />   • Confección resumen anual IRPF. (modelo 190).<br />   • Certificado renta de trabajadores.<br />   • Certificado renta familiar (modelo 145)<br />   • Presentación parte bajas y altas de enfermedad común y accidente de trabajo y  su comunicación a la mutua.<br />   • Libro de Visita y Matrícula.<br />   • Afiliación de Trabajadores Autónomos. <br />   • Aplazamiento de Cuotas a la Seguridad Social <br />   • Aplazamiento  de cuotas de Autónomos<br />   • Altas de  Trabajadores en la Seguridad Social<br />   • Bajas de  Trabajadores en la Seguridad Social<br />   • Variaciones  de Trabajadores en la Seguridad Social<br />   • Confección  de Finiquitos<br />   • Confección  de Contratos Laborales<br />   • Altas de  Empresa en la Seguridad Social<br />   • Variaciones  de datos empresariales en la Seg Social<br />   • Confección  de Prórrogas<br />   • Cartas de  Despido a Trabajadores<br />   • Legalización  de Libro de Visitas<br />   • Certificados  de Cotización empresarial<br />   • Gestiones varias  ante la Seguridad Social<br />   • Asesoramiento  y Gestión Laboral en General <br />   • Altas en la  Mutuas Patronales<br />   • Solicitudes  de Botiquines<br />   • Solicitudes  de cartillas de la Seguridad Social<br />   • Duplicados  de cartillas de la Seguridad Social<br />   • Estudio de  Prevención de Riesgos Laborales<br />   • Estudio de  Vigilancia de la Salud<br />   • Seguro de  Accidentes Obligatorio por CC.<br />   • Consultas verbales </p> ', ''),
(4, 'ADMINISTRACIÓN COMUNIDADES Y FINCAS', 'admon', '<p><strong>En CONTINENTAL Consulting y Gesti&oacute;n Empresarial</strong>, el &aacute;rea de <strong>Administraci&oacute;n de Comunidades y Fincas</strong> es una de las m&aacute;s destacadas, ya que en la actualidad gestionamos un gran n&uacute;mero de viviendas en m&uacute;ltiples comunidades de propietarios.<br /> Nuestro trabajo se basa en el seguimiento y control efectivo de los servicios de mantenimiento y reparaciones. Preparar con la debida antelaci&oacute;n para enviar a los propietarios y someter a la aprobaci&oacute;n de la Junta la ejecuci&oacute;n del presupuesto del ejercicio anterior, contemplando separadamente el gasto presupuestado, el gasto real y, en su caso, la desviaci&oacute;n en la ejecuci&oacute;n del presupuesto, explicando por escrito, cuando su importancia lo requiera, la raz&oacute;n de dicha desviaci&oacute;n, de forma que la contabilidad de la comunidad se convierta en un instrumento activo y eficaz a la hora evaluar los gastos previsibles para el ejercicio siguiente y tomar decisiones respecto a las distintas partidas de gastos y a la contribuci&oacute;n de los propietarios para su sostenimiento.<br /> Contabilidad al d&iacute;a y a disposici&oacute;n para su consulta en cualquier momento por los &oacute;rganos de la comunidad; liquidaci&oacute;n trimestral de ingresos y gastos, con remisi&oacute;n de la misma y de un balance a los cargos de la Comunidad. Hacer los cobros y pagos necesarios y, a tales efectos, confecci&oacute;n y cobro de recibos mensuales de los gastos comunes y en su caso derramas extraordinarias correspondientes a cada propietario, y pago de toda clase de recibos peri&oacute;dicos de gastos comunes como son los de luz, agua, seguros, etc., as&iacute; como facturas y recibos de car&aacute;cter extraordinario, conforme a las disponibilidades econ&oacute;micas de la Comunidad, etc.<br /> En resumen:</p>\r\n<ul>\r\n<li>Constituci&oacute;n de Comunidades de Propietarios.</li>\r\n<li>Contrataci&oacute;n de servicios para la puesta en marcha.</li>\r\n<li>Convocatorias y citaciones a los copropietarios para la celebraci&oacute;n de Juntas.</li>\r\n<li>Redacci&oacute;n de acta de la Junta documentando los acuerdos y distribuci&oacute;n de la misma entre los copropietarios.</li>\r\n<li>Actuar, en su caso, como Secretario, custodiando la documentaci&oacute;n de la Comunidad.</li>\r\n<li>Velar por el buen r&eacute;gimen del edificio, sus instalaciones y servicios, atender a la adecuada conservaci&oacute;n de los elementos comunes disponiendo las reparaciones ordinarias y, en cuanto a las extraordinarias, adoptar las medidas urgentes dando inmediata cuenta a los propietarios.</li>\r\n<li>La preparaci&oacute;n y celebraci&oacute;n de juntas extraordinarias cuando un acontecimiento lo requiera.</li>\r\n</ul>', ''),
(5, 'SEGUROS', 'seguros', '<p>La mercantil <strong>CONTINENTAL-Consulting y  Gestión empresarial, S.L.</strong>, figura inscrita con el número C0157B32410821 en la  Dirección General de Seguros y Fondos de Pensiones, en calidad de agente de  seguros exclusivo de la prestigiosa compañía HELVETIA COMPAÑIA SUIZA,  SOCIEDAD ANONIMA DE SEGUROS Y REASEGUROS.<br />   Como agentes de dicha aseguradora, ofertamos todas las  soluciones para su tranquilidad. Seguros para particulares (AUTO, HOGAR,  ACCIDENTES, VIDA PENSIONES ETC). Seguros comercios y empresas, accd. Colectivos  y otros. CONTACTE CON NOSOTROS Y PIDA PRESUPUESTO</p>', ''),
(6, 'LINKS', 'links', '<p><strong>AYUNTAMIENTO DE VERÍN</strong><br />   <a href="http://www.verin.es/">http://www.verin.es/</a></p> <p><strong>&nbsp;</strong></p> <p><strong>MAPAS DE VERÍN Y COMARCA (DESCARGAS)</strong><br />   <a href="http://www.verin.es/index.php?option=com_content&amp;view=article&amp;id=162&amp;Itemid=119">http://www.verin.es/index.php?option=com_content&amp;view=article&amp;id=162&amp;Itemid=119</a></p> <p><strong>&nbsp;</strong></p> <p><strong>EL TIEMPO EN VERÍN</strong><br />   <a href="http://www.aemet.es/es/eltiempo/prediccion/municipios/verin-id32085">http://www.aemet.es/es/eltiempo/prediccion/municipios/verin-id32085</a></p> <p><strong>&nbsp;</strong></p> <p><strong>DIRECCIÓN GENERAL DE SEGUROS Y FONDOS DE PENSIONES</strong><br />   <a href="http://www.dgsfp.meh.es/">http://www.dgsfp.meh.es/</a></p> <p><strong>&nbsp;</strong></p> <p><strong>SEDE ELECTRÓNICA DEL CATASTRO</strong><br />   <a href="http://www.sedecatastro.gob.es/">http://www.sedecatastro.gob.es/</a></p>', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uno_items`
--

CREATE TABLE IF NOT EXISTS `uno_items` (
  `item_id` int(10) NOT NULL auto_increment,
  `item_name` varchar(99) character set utf8 collate utf8_spanish_ci NOT NULL,
  `item_alias` varchar(25) character set utf8 collate utf8_spanish_ci NOT NULL,
  `item_url` varchar(255) character set utf8 collate utf8_spanish_ci NOT NULL,
  `item_pos` int(2) NOT NULL default '0',
  PRIMARY KEY  (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `uno_items`
--

INSERT INTO `uno_items` (`item_id`, `item_name`, `item_alias`, `item_url`, `item_pos`) VALUES
(1, 'BUSCAR', 'buscar', 'index.php?com=com_search', 0),
(2, 'INMOBILIARIA', 'inmobiliaria', 'index.php?com=com_content&id=2', 1),
(3, 'ASESORIA', 'asesoria', 'index.php?com=com_content&id=3', 2),
(4, 'CONTACTO', 'contacto', 'index.php?com=com_contact', 6),
(5, 'ADMINISTRACIÓN DE COMUNIDADES Y FINCAS', 'admon', 'index.php?com=com_content&id=4', 3),
(6, 'SEGUROS', 'seguros', 'index.php?com=com_content&id=5', 4),
(7, 'LINKS', 'links', 'index.php?com=com_content&id=6', 5);
