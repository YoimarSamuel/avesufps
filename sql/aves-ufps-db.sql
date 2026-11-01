-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-10-2026 a las 06:17:29
-- Versión del servidor: 11.8.9-MariaDB-log
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u384145277_Aves_ufps`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arboles`
--

CREATE TABLE `arboles` (
  `id_arbol` int(11) NOT NULL,
  `nombre_comun` varchar(80) NOT NULL,
  `nombre_cientifico` varchar(120) DEFAULT NULL,
  `familia` varchar(80) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `ruta` varchar(300) NOT NULL,
  `orden` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `arboles`
--

INSERT INTO `arboles` (`id_arbol`, `nombre_comun`, `nombre_cientifico`, `familia`, `descripcion`, `ruta`, `orden`) VALUES
(1, 'Saman', 'Samanea saman', 'Fabaceae', 'Árbol grande y frondoso, muy característico del campus. Su copa ancha ofrece refugio y zonas de percha a numerosas aves, y en su interior se han registrado varias cavidades utilizadas para la anidación. Es uno de los recursos de hábitat más importantes del territorio universitario.', 'Imagenes/arboles/saman.jpg', 1),
(2, 'Camajón', 'Sterculia apetala', 'Malvaceae', 'Árbol de gran tamaño, notable por su tronco con contrafuertes y su copa extendida. Sus frutos son consumidos por varias aves frugívoras y sus ramas se emplean como perchas elevadas.', 'Imagenes/arboles/camajon.jpg', 2),
(3, 'Jero', 'Senegalia polyphylla', 'Fabaceae', 'Árbol espinoso de mediano porte. Produce semillas y vainas que sirven de alimento a los periquitos y pericos, los cuales lo usan también como percha y zona de forrajeo.', 'Imagenes/arboles/jero.jpg', 3),
(4, 'Mango', 'Mangifera indica', 'Anacardiaceae', 'Árbol frutal muy cultivado en el campus. Sus frutos carnosos son alimento de aves frugívoras y durante la floración atrae insectos, fuente de forrajeo para insectívoros.', 'Imagenes/arboles/mango.jpg', 4),
(5, 'Palma real', 'Roystonea regia', 'Arecaceae', 'Palmera alta y columnar muy presente en el campus. Sus hojas y copa ofrecen cavidades donde anidan aves como amazonas y guacamayos, y proporcionan perchas elevadas a rapaces como el chimachima.', 'Imagenes/arboles/palma-real.jpg', 5),
(6, 'Chiminango', 'Pithecellobium dulce', 'Fabaceae', 'Árbol espinoso de copa redondeada. Sirve como percha para varias aves y en su follaje se realizan labores de forrajeo. Algunas especies construyen nidos en sus ramas.', 'Imagenes/arboles/chiminango.jpg', 6),
(7, 'Grama', 'Poaceae sp.', 'Poaceae', 'Césped de las zonas verdes del campus. En él forrajean y se alimentan de semillas los semilleros y otras aves caminadoras, así como insectívoros que capturan artrópodos entre la hierba.', 'Imagenes/arboles/grama.jpg', 7),
(8, 'Ficus benjamina', 'Ficus benjamina', 'Moraceae', 'Árbol ornamental muy abundante. Sus pequeños frutos son consumidos por aves frugívoras y su densa copa se emplea como percha y como zona de forrajeo.', 'Imagenes/arboles/ficus-benjamina.jpg', 8),
(9, 'Ixora', 'Ixora coccinea', 'Rubiaceae', 'Arbusto ornamental de flores tubulares. Su néctar atrae a colibríes y mieleros, que lo utilizan como zona de forrajeo nectarívoro.', 'Imagenes/arboles/ixora.jpg', 9),
(10, 'Achira', 'Canna indica', 'Cannaceae', 'Planta herbácea con flores rojas o anaranjadas. Sus flores son visitadas por colibríes y mieleros que forrajean el néctar.', 'Imagenes/arboles/achira.jpg', 10),
(11, 'Oití', 'Licania tomentosa', 'Chrysobalanaceae', 'Árbol ornamental de copa densa, muy utilizado como percha por aves rapaces como el gavilán caminero.', 'Imagenes/arboles/oiti.jpg', 11),
(12, 'Naranja agria', 'Citrus × aurantium', 'Rutaceae', 'Árbol frutal cultivado en las zonas verdes. Sus frutos cítricos son consumidos por aves frugívoras y sus flores atraen insectos, fuente de alimento para insectívoros.', 'Imagenes/arboles/naranja-agria.jpg', 12),
(13, 'Marañón', 'Anacardium occidentale', 'Anacardiaceae', 'Árbol frutal presente en algunas zonas del campus. Su fruto (la \"marañón\") y el pedúnculo carnoso son alimento de aves frugívoras y granívoras.', 'Imagenes/arboles/maraon.jpg', 13),
(14, 'Urapo', 'Myrcianthes cf.', 'Myrtaceae', 'Árbol nativo de mediano porte, presente en algunas zonas verdes del campus. Ofrece refugio y zonas de percha.', 'Imagenes/arboles/urapo.jpg', 14),
(15, 'Buganvilla', 'Bougainvillea spectabilis', 'Nyctaginaceae', 'Arbusto trepador ornamental muy difundido. Sus diminutas flores tubulares son visitadas por aves nectarívoras y su follaje denso sirve de refugio a pequeños paseriformes.', 'Imagenes/arboles/buganvilla.jpg', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arboles_aves`
--

CREATE TABLE `arboles_aves` (
  `id_arbol` int(11) NOT NULL,
  `id_aves` int(11) NOT NULL,
  `usos` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `arboles_aves`
--

INSERT INTO `arboles_aves` (`id_arbol`, `id_aves`, `usos`) VALUES
(1, 1, 'Forrajeo, Percha, Anidación'),
(1, 13, 'Forrajeo, Anidación'),
(1, 20, 'Anidación'),
(2, 1, 'Alimentación (fruto), Forrajeo, Percha'),
(3, 12, 'Alimentación (semillas), Forrajeo, Percha'),
(4, 16, 'Alimentación (fruto), Forrajeo, Percha'),
(4, 21, 'Alimentación (fruto), Forrajeo'),
(5, 16, 'Anidación'),
(5, 17, 'Anidación'),
(5, 20, 'Percha'),
(6, 3, 'Percha'),
(6, 5, 'Percha, Forrajeo, Alimentación (artrópodos)'),
(6, 6, 'Forrajeo, Percha, Alimentación (artrópodos)'),
(6, 13, 'Forrajeo, Anidación'),
(6, 18, 'Percha'),
(6, 19, 'Percha'),
(6, 23, 'Forrajeo, Anidación'),
(6, 24, 'Forrajeo, Alimentación (artrópodos)'),
(6, 25, 'Forrajeo, Alimentación (néctar)'),
(7, 6, 'Forrajeo, Alimentación (semillas)'),
(7, 7, 'Forrajeo, Alimentación (semillas)'),
(7, 8, 'Forrajeo, Alimentación (semillas)'),
(7, 10, 'Forrajeo, Alimentación (restos de alimentos de origen humano)'),
(7, 19, 'Forrajeo, Alimentación (artrópodos)'),
(7, 22, 'Forrajeo, Alimentación (artrópodos)'),
(7, 26, 'Forrajeo, Alimentación (artrópodos)'),
(7, 27, 'Forrajeo, Alimentación (artrópodos)'),
(8, 9, 'Forrajeo, Alimentación (frutos)'),
(8, 11, 'Percha'),
(8, 13, 'Forrajeo, Alimentación (frutos)'),
(9, 4, 'Forrajeo, Alimentación (néctar)'),
(9, 25, 'Forrajeo, Alimentación (néctar)'),
(10, 4, 'Forrajeo, Alimentación (néctar)'),
(11, 14, 'Percha'),
(12, 1, 'Alimentación (fruto), Forrajeo'),
(12, 16, 'Alimentación (fruto), Forrajeo'),
(13, 1, 'Alimentación (fruto), Forrajeo'),
(13, 16, 'Alimentación (fruto), Forrajeo'),
(13, 24, 'Alimentación (fruto), Forrajeo'),
(14, 1, 'Alimentación (Flores), Percha'),
(14, 4, 'Alimentación (Néctar), Forrajeo '),
(14, 5, 'Forrajeo de insectos, Percha'),
(14, 9, 'Forrajeo de insectos, Percha'),
(14, 16, 'Alimentación (Flores), Percha'),
(14, 18, 'Forrajeo de insectos, Refugio'),
(14, 23, 'Forrajeo de insectos, Percha'),
(14, 24, 'Forrajeo, Alimentación'),
(14, 25, 'Alimentación (Néctar), Forrajeo '),
(15, 4, 'Alimentación (Néctar)'),
(15, 25, 'Alimentación (Néctar)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aves`
--

CREATE TABLE `aves` (
  `id_aves` int(11) NOT NULL,
  `nombre_ave` varchar(100) NOT NULL,
  `nombre_cientifico` varchar(100) NOT NULL,
  `genero_ave` varchar(100) NOT NULL,
  `taxonomia_ave` varchar(2000) NOT NULL,
  `morfologia_ave` varchar(2000) NOT NULL,
  `etologia_ave` varchar(2000) NOT NULL,
  `habitat_ave` varchar(500) NOT NULL,
  `foto_ave` varchar(600) NOT NULL,
  `foto2_ave` varchar(600) NOT NULL,
  `foto3_ave` varchar(600) NOT NULL,
  `foto4_ave` varchar(600) NOT NULL,
  `sonido_ave` varchar(600) NOT NULL,
  `simbolo_ave` varchar(600) NOT NULL,
  `orden_ave` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `aves`
--

INSERT INTO `aves` (`id_aves`, `nombre_ave`, `nombre_cientifico`, `genero_ave`, `taxonomia_ave`, `morfologia_ave`, `etologia_ave`, `habitat_ave`, `foto_ave`, `foto2_ave`, `foto3_ave`, `foto4_ave`, `sonido_ave`, `simbolo_ave`, `orden_ave`) VALUES
(1, 'Periquito de Barbilla Naranja', 'Brotogeris jugularis', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Psittaciformes, Familia: Psittacidae, Genero: Brotogeris, Especie: Brotogeris jugularis, Autor: MULLER, 1776', 'Mide 18-19 cm; pesa 53-65 g. Plumaje verde, con tonalidades amarillo verdosas - verde oliva en distintas partes del cuerpo. Presenta mancha naranja en la barbilla y un ligero tono azul en la coronilla y la parte baja del dorso. Las alas poseen plumas externas de color castaño oliváceo o bronce, mientras que las internas son amarillas. Tiene un anillo periocular blanco sin plumas, ojos oscuros y un pico corto de color amarillento opaco. Su cola es corta y puntiaguda, y no presenta diferencias físicas evidentes entre el macho y la hembra.', 'Especie activa, sociable y ruidosa. Se comunica constantemente mediante vocalizaciones agudas, especialmente durante el vuelo, la alimentación y el contacto con otros individuos. Busca su alimento en las copas de los árboles, donde consume frutos, semillas, flores y otras partes vegetales. Durante el forrajeo se desplaza con agilidad entre las ramas y utiliza su pico fuerte para cortar y manipular los alimentos. Para reproducirse forma parejas y construye su nido dentro de cavidades naturales de árboles, donde protege y alimenta a sus crías. Puede adaptarse a bosques secundarios, bordes de bosque, cultivos y zonas urbanas arboladas, manteniendo generalmente un comportamiento gregario.', 'Puedes encontrar esta ave en la zona de Rectoría y en la zona del CREAD.', 'Brotogeris jugularis.jpg', 'Brotogeris Jugularis2.jpg', 'Brotogeris jugularis3.jpg', 'Brotogeris jugularis4.jpg', 'https://www.youtube.com/shorts/XOTVMTx74Bo', 'LC.ico, Diurno.ico, Pareja.ico, Gregario.ico, Frugivoro.ico, Granivoro.ico, Zigodactilo.ico', 1),
(2, 'Carpintero habado', 'Melanerpes rubricapillus', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Piciformes, Familia: Picidae, Genero: Melanerpes, Especie: Melanerpes rubricapillus, Autor: Wagler, 1827', 'Mide 17-19 cm; pesa 40-55 g. Plumaje dorsal negro con barras blancas en las alas y el lomo. Corona y nuca rojas en el macho; en la hembra la corona es negra y solo la nuca es roja. Cara, garganta y partes inferiores de color beige pálido a blanco sucio, con el vientre rojizo característico (a veces poco visible). Lista superciliar y lista malar blancas bien definidas. Pico recto, fuerte, grisáceo. Ojos rojizos. Cola rígida y puntiaguda para apoyo al trepar. Patas cortas, grisáceas, con disposición zigodáctila.', 'Especie diurna, territorial y bastante ruidosa. Se comunica mediante llamadas agudas tipo \'kweek-kweek-kweek\' y tamborileos cortos sobre troncos secos. Forrajea trepando por troncos y ramas principales, picoteando la corteza para extraer insectos, larvas y hormigas; complementa con frutos y semillas. Anida en cavidades que excava en troncos muertos o palmeras; ambos sexos participan en la excavación, incubación y cuidado de las crías. Habita bordes de bosque, sabanas arboladas, potreros con árboles dispersos, parques y zonas urbanas arboladas.', 'Puedes encontrar esta ave en la zona del CREAD y en la zona de Aulas Orientales.', 'Melanerpes carolinus.jpg', 'Melanerpes carolinus2.jpg', '', '', 'https://www.youtube.com/shorts/Ks6g6FEFEUs', 'Preocupación menor, Actividad diurno, Solitario, En pareja, Insectívora, Zigodactilo', 16),
(3, 'Tangara de Verano', 'Piranga rubra', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Passeriformes, Familia: Cardinalidae, Genero: Piranga, Especie: Piranga rubra, Autor: LINNAEUS, 1758', 'Mide 15-17 cm; pesa 26-34 g. Cuerpo robusto, cabeza grande y un pico grueso, corto y ligeramente puntiagudo, de color amarillento pálido. El macho adulto posee un plumaje rojo intenso y uniforme en casi todo el cuerpo, incluidas las alas y la cola. La hembra presenta tonalidades amarillo oliváceas en la cabeza, el dorso y las alas, mientras que las partes inferiores son amarillas o amarillo anaranjadas. Tiene ojos oscuros y una cola de longitud media, ligeramente redondeada. Presenta un marcado dimorfismo sexual, ya que el macho y la hembra se diferencian claramente por la coloración de su plumaje.', 'Especie activa y de comportamiento discreto. Permanece principalmente en las copas y zonas medias de los árboles, se desplaza lentamente entre las ramas mientras busca alimento. Consume insectos, especialmente abejas, avispas, escarabajos, orugas y arañas, los cuales captura entre el follaje o mediante vuelos cortos. Antes de consumir abejas y avispas, suele golpearlas contra una rama para retirarles el aguijón; además, complementa su alimentación con diversos frutos. Durante la reproducción forma parejas y construye un nido en forma de copa sobre las ramas de los árboles, donde protege y alimenta a sus crías. Puede encontrarse en bosques, bordes de bosque, plantaciones y zonas arboladas.', 'Puedes encontrar esta ave en la zona Central de la UFPS y en la zona del CREAD', 'Piranga rubra.jpg', 'Piranga rubra2.jpg', '', '', 'https://www.youtube.com/shorts/w_vrgwY5FnA', 'LC.ico, Diurno.ico, Solitario.ico, Pareja.ico, Insectivoro.ico, Frugivoro.ico, Anisodactilo.ico', 5),
(4, 'Colibrí de Cola Rojiza', 'Amazilia tzacatl', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Apodiformes, Familia: Trochilidae, Subfamilia: Trochilinae, Tribu: Trochilini, Genero: Amazilia, Especie: Amazilia tzacatl, Autor: LA LLAVE, 1833', 'Mide 9-11 cm; pesa 5-5,5 g. Cabeza, dorso y las partes superiores de color verde brillante. Garganta y la parte superior del pecho poseen un tono verde iridiscente. La zona inferior del pecho es grisácea y el vientre presenta una tonalidad blanquecina. Alas alargadas y oscuras, adaptadas para movimientos rápidos durante el vuelo. La cola es principalmente rojiza o castaña, con bordes y puntas de color verde bronceado. Pico recto y delgado, rojizo en la base y negro hacia la punta.', 'Especie activa y ágil que suele defender con agresividad sus territorios de alimentación. Se alimenta principalmente del néctar de las flores, permaneciendo suspendida en el aire mientras introduce su pico. Consume pequeños insectos, los cuales captura durante el vuelo o recoge de las hojas y ramas. Vuela rápido y preciso, con frecuentes cambios de dirección para desplazarse entre las flores. Habita bordes de bosque, vegetación secundaria, cultivos, jardines y zonas urbanas con abundantes plantas. Emite vocalizaciones agudas y repetitivas para comunicarse y advertir la presencia de otros individuos. Durante la reproducción, la hembra construye un pequeño nido sobre ramas y se encarga del cuidado de las crías.', 'Esta ave la puedes encontrar en la zona del CREAD y en la zona de Aulas Orientales', 'Amazilia tzacatl.jpg', 'Amazilia tzacatl2.jpg', '', '', 'https://www.youtube.com/shorts/bYzG1CpwCYE', 'LC.ico, Diurno.ico, Solitario.ico, Pareja.ico, Insectivoro.ico, Nectivoro.ico, Anisodactilo.ico', 15),
(5, 'Tirano Tropical', 'Tyrannus melancholicus', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Passeriformes, Familia: Tyrannidae, Subfamilia: Tyranninae, Tribu: Tyrannini, Genero: Tyrannus, Especie: Tyrannus melancholicus, Autor: VIEILLOT, 1819', 'Mide 18-23 cm; pesa 32-43 g. Cabeza de color gris claro, con mejillas más oscuras y una pequeña mancha naranja rojiza oculta en la coronilla. Dorso gris oliváceo; alas pardas oscuras con bordes más claros en las plumas. La garganta es blanquecina, el pecho tiene una tonalidad gris olivácea y el abdomen es de color amarillo intenso. Pico negro, ancho, fuerte y ligeramente puntiagudo; cola larga, oscura y levemente bifurcada. Sus patas son cortas y oscuras; el macho y la hembra presentan una apariencia similar, sin diferencias externas evidentes.', 'Especie territorial; se comunica mediante vocalizaciones fuertes y frecuentes, especialmente durante la defensa del territorio y la reproducción. Busca alimento desde ramas, postes o cables expuestos, desde donde emprende vuelos cortos para capturar insectos en el aire. Durante la reproducción forma parejas y construye un nido abierto en forma de copa, donde ambos padres protegen y alimentan a sus crías. Se adapta a áreas abiertas, bordes de bosque, potreros, cultivos, parques y zonas urbanas arboladas, mostrando un comportamiento generalmente agresivo frente a intrusos.', 'Puedes encontrar esta ave en la zona de CREAD y en la zona de Aulas Orientales', 'Tyrannus melancholicus.jpg', 'Tyrannus melancholicus2.jpg', '', '', 'https://www.youtube.com/shorts/kFM_cwhLuxk', 'LC.ico, Diurno.ico, Solitario.ico, Pareja.ico, Insectivoro.ico, Frugivoro.ico, Anisodactilo.ico', 6),
(6, 'Pinzón Azafrán', 'Sicalis flaveola', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Passeriformes, Familia: Thraupidae, Subfamilia: Diglossinae, Genero: Sicalis, Especie: Sicalis flaveola, Autor: LINNAEUS, 1766', 'Mide 13,5-15 cm; pesa 13-23,4 g. El macho presenta un plumaje amarillo brillante, con tonalidades amarillo oliva en el dorso y los costados. La frente y la parte anterior de la coronilla son de color naranja intenso, mientras que sus ojos son oscuros. Las alas son pardas con bordes amarillentos en las plumas, la cola es corta, estrecha y de color pardo oscuro. Posee un pico corto, fuerte y cónico, de tonalidad grisácea, adaptado para romper y consumir semillas. La hembra es similar al macho, pero presenta colores más opacos y menos naranja en la frente; sus patas son cortas y rosadas.', 'Especie activa y sociable. Se comunica mediante cantos melodiosos y llamados frecuentes, especialmente durante la reproducción y el contacto con otros individuos. Busca alimento en el suelo, donde camina y salta entre pastizales para recoger semillas, granos y pequeños insectos. Durante el forrajeo se desplaza entre arbustos bajos y zonas abiertas con vegetación dispersa. Para reproducirse forma parejas y construye el nido dentro de cavidades de árboles, nidos abandonados o estructuras artificiales. Se adapta a sabanas, potreros, cultivos, bordes de caminos, parques y zonas urbanas, mostrando comportamiento territorial cerca del nido.', 'Puedes encontrar esta ave en la zona de Aulas Orientales', 'Sicalis flaveola.jpg', 'Sicalis flaveola2.jpg', '', '', 'https://www.youtube.com/shorts/ggoW2o5It8E', 'LC.ico, Diurno.ico, Pareja.ico, Gregario.ico, Granivoro.ico, Insectivoro.ico, Anisodactilo.ico', 7),
(7, 'Tortolita Rojiza', 'Columbina talpacoti', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Columbiformes, Familia: Columbidae, Subfamilia: Columbinae, Genero: Columbia, Especie: Columbina talpacoti, Autor: TEMMINK, 1810', 'Mide 17-18 cm; pesa 43-47 g. El macho presenta la cabeza y el cuello grisáceos, con el dorso y el pecho de color castaño rojizo. Las alas son rojizas y poseen pequeñas manchas negras en las plumas cobertoras; la cola es corta y oscura. La hembra presenta un plumaje pardo grisáceo más uniforme y menos contrastante que el del macho. Tiene ojos rojizos, pico corto, delgado y oscuro, adaptado principalmente para recoger y consumir semillas. Sus patas son cortas y rosadas, y posee un cuerpo compacto con alas redondeadas.', 'Se comunica mediante arrullos suaves y repetitivos, especialmente durante el cortejo y el contacto con otros individuos. Busca alimento caminando por el suelo, recoge semillas pequeñas, granos y algunos invertebrados. Durante el forrajeo se desplaza de manera pausada y, ante el peligro, emprende un vuelo rápido y directo hacia la vegetación cercana. Para reproducirse forma parejas y construye un nido sencillo de ramitas en arbustos, árboles pequeños o vegetación densa. Se adapta a pastizales, cultivos, jardines, parques, bordes de bosque y zonas urbanas, manteniendo generalmente un comportamiento tranquilo.', 'Puedes encontrar esta ave en la zona Central o en la zona del CREAD', 'Columbina talpacoti.jpg', '', '', '', 'https://www.youtube.com/shorts/MPfqGpWXFbM', 'LC.ico, Diurno.ico, Pareja.ico, Nucleo Familiar.ico, Granivoro.ico, Insectivoro.ico, Anisodactilo.ico', 19),
(8, 'Semillero Pardo', 'Asemospiza obscura', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Passeriformes, Familia: Thraupidae, Subfamilia: Coerebinae, Genero: Asemospiza, Especie: Asemospiza obscura, Autor: D\'ORBIGNY & LAFRESNAYE, 1837', 'Mide 11-12 cm; pesa 9-11 g. Plumaje uniforme de color pardo grisáceo, con el dorso ligeramente más oscuro. Las alas y la cola son pardas, mientras que el pecho y el abdomen poseen tonalidades más claras. En la cabeza presenta una ceja pálida poco marcada, una línea ocular oscura y ojos de color café oscuro. Su pico es corto y cónico, generalmente oscuro, con la base de la mandíbula inferior amarillenta. Tiene patas parduzcas y una cola corta; el macho y la hembra son similares, sin diferencias externas evidentes.', 'Se comunica mediante cantos cortos y suaves, especialmente durante el contacto entre individuos y la época reproductiva. Busca alimento en el suelo y entre la vegetación baja, donde consume principalmente semillas de pastos y hierbas. Durante el forrajeo se desplaza mediante pequeños saltos y movimientos rápidos entre arbustos, matorrales y claros. Forma pareja y construye un nido cerrado, elaborado con fibras vegetales y ubicado entre vegetación densa. Habita bordes de bosque, claros arbustivos, matorrales, jardines y ambientes intervenidos con abundante vegetación baja.', 'Puedes encontrar esta ave en la zona de Rectoría o en la zona de Aulas Orientales', 'Asemospiza obscura.jpg', 'Asemospiza obscura2.jpg', '', '', 'https://www.youtube.com/shorts/kMJWdU2nzno', 'LC.ico, Diurno.ico, Solitario.ico, Pareja.ico, Granivoro.ico, Insectivoro.ico, Anisodactilo.ico', 8),
(9, 'Sirirí Rayado', 'Myiodynastes maculatus', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Subclase: Neornithes, Infraclase: Neognathae, Superorden: Neoaves, Orden: Passeriformes, Suborden: Tyranni, Infraorden: Tyrannides, Familia: Tyrannidae, Subfamilia: Tyranninae, Tribu: Tyrannini, Genero: Myiodynastes, Especie: Myiodynastes maculatus, Autor: STATIUS MULLER, 1776', 'Mide 22-23 cm; pesa 43-46 g. Cabeza parda, con una ceja blanquecina, una franja oscura que atraviesa los ojos y una mancha amarilla oculta en la coronilla. El dorso es marrón oliváceo con estrías oscuras, mientras que las alas poseen bordes claros que resaltan sobre las plumas pardas. La garganta, el pecho y el abdomen son blanquecinos o amarillo pálido, cubiertos por numerosas líneas oscuras longitudinales. Tiene un pico largo, ancho, fuerte y puntiagudo de color oscuro, y ojos grandes de tonalidad café. Su cola es larga y parda con tonos rojizos; las patas son cortas y oscuras, y ambos sexos presentan una apariencia similar.', 'Se comunica mediante llamados fuertes y repetitivos, especialmente al amanecer, durante la reproducción y la defensa del nido. Busca alimento desde ramas elevadas, realiza vuelos cortos para capturar insectos en el aire o entre la vegetación. Durante la reproducción forma parejas y establece el nido en cavidades de árboles o lugares elevados; ambos padres protegen y alimentan a las crías. Habita bordes de bosque, bosques secundarios, áreas ribereñas, cultivos y zonas suburbanas arboladas, donde permanece principalmente en el dosel.', 'Puedes encontrar esta ave en la zona de Rectoría y en la zona del CREAD', 'Myiodynastes maculatus.jpg', 'Myiodynastes maculatus2.jpg', '', '', 'https://www.youtube.com/shorts/AR-x7LzGMDo', 'LC.ico, Diurno.ico, Solitario.ico, Pareja.ico, Frugivoro.ico, Insectivoro.ico, Anisodactilo.ico', 9),
(10, 'Paloma Bravía', 'Columba livia', 'Desconocido', 'Reino: Animalia, Subreino: Eumetazoa, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Subclase: Neornithes, Infraclase: Neognathea, Superorden: Neoaves, Granorden: Columbimorphae, Orden: Columbiformes, Familia: Columbidae, Subfamilia: Columbinae, Genero: Columba, Especie: Columba livia, Autor: GMELIN, 1789', 'Mide 30-35 cm; pesa 240-380 g. Cuerpo robusto, cabeza, pecho y dorso generalmente de color gris azulado. El cuello posee reflejos iridiscentes verdes, violetas o rojizos, visibles principalmente cuando recibe la luz. Alas grises y presentan dos franjas transversales negras; cola mediana, oscura y con una banda negra terminal. Ojos anaranjados o rojizos, pico corto y oscuro con una cera blanquecina en la base, patas cortas de color rosado o rojizo. Macho y hembra son similares, aunque el macho suele ser ligeramente más grande; las poblaciones urbanas pueden presentar gran variedad de colores y patrones.', 'Se comunica mediante arrullos suaves, movimientos de la cabeza y exhibiciones corporales, especialmente durante el cortejo y la defensa del espacio. Busca alimento caminando por el suelo, donde picotea semillas, granos, frutos y restos de alimentos dejados por las personas. Durante el forrajeo frecuenta plazas, parques, cultivos y otras áreas abiertas, y realiza vuelos rápidos para trasladarse entre los sitios de alimentación y descanso. Para reproducirse forma parejas y construye nidos sencillos con ramas y tallos sobre repisas, edificios, puentes o acantilados; ambos padres incuban y alimentan a las crías. Se adapta fácilmente a ambientes urbanos y rurales, y mantiene un comportamiento social, confiado y cercano a las actividades humanas.', 'Esta ave la podemos encontrar en la zona Central UFPS', 'Columba livía.jpg', '', '', '', 'https://www.youtube.com/shorts/qZLNo6RBuIA', 'LC.ico, Diurno.ico, Pareja.ico, Gregario.ico, Omnivoro.ico, Anisodactilo.ico', 20),
(11, 'Caracara Crestado', 'Caracara plancus', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Clase: Aves, Orden: Falconiformes, Familia: Falconidae, Genero: Caracara, Especie: Caracara plancus, Autor: Miller, 1777', 'Mide 49-58 cm; pesa 1.050-1.300 g. Presenta coronilla negra y ligeramente crestada. Cuello, garganta y mejillas son de color blanco. Pecho blanquecino con finas franjas oscuras; abdomen, dorso y las alas poseen una coloración parda oscura o negruzca. Cola larga y blanquecina, con líneas oscuras y una banda terminal ancha de color negro. Tiene piel facial desnuda de color anaranjado o rojizo y un pico fuerte, curvo y gris azulado, con la punta oscura. Patas son largas, fuertes y amarillo-anaranjadas; ambos sexos son similares, aunque la hembra suele ser ligeramente más grande.', 'Especie activa, territorial y oportunista. Busca alimento caminando por el suelo o volando a baja altura sobre áreas abiertas, donde localiza carroña y presas pequeñas. Su alimentación incluye animales muertos, insectos, reptiles, peces, huevos, aves y pequeños mamíferos; también puede robar alimento a otras aves. Se comunica mediante vocalizaciones fuertes y movimientos de la cabeza, principalmente durante la defensa del territorio y la reproducción. Forma parejas estables y construye nidos grandes con ramas en árboles o palmeras; ambos padres incuban y alimentan a las crías. Habita potreros, cultivos, matorrales y bordes de carreteras, mostrando gran adaptación a ambientes abiertos e intervenidos.', 'Esta ave la puedes encontrar en la zona de Aulas Orientales.', 'Caracara plancus cheriway.jpg', '', '', '', 'https://www.youtube.com/shorts/HK3qKTvBdeQ', 'LC.ico, Diurno.ico, Solitario.ico, Pareja.ico, Carnivoro.ico, Anisodactilo.ico', 22),
(12, 'Perico Cara Sucia', 'Eupsittula pertinax', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Psittaciformes, Familia: Psittacidae, Genero: Eupsittula, Especie: Eupsittula pertinax, Autor: LINNAEUS, 1758', 'Mide 23-28 cm; pesa 76-102 g. Plumaje verde, con tonalidades más claras y amarillentas en el pecho y abdomen. Frente, coronilla, mejillas y garganta presentan tonos amarillos, anaranjados, pardos u oliváceos. Alas verdes, con bordes y puntas azuladas en las plumas de vuelo, mientras que la cola es larga, estrecha y puntiaguda. Posee ojos oscuros rodeados por un anillo periocular claro y un pico corto, fuerte y curvo de color gris oscuro. Sus patas son cortas y grisáceas; el macho y la hembra presentan una apariencia similar, sin diferencias externas evidentes.', 'Especie sociable y ruidosa. Se comunica mediante vocalizaciones fuertes y agudas. Busca alimento entre las ramas y copas de los árboles, donde consume frutos, semillas, flores y brotes vegetales. Durante el forrajeo trepa con agilidad, utiliza el pico para manipular el alimento y se desplaza mediante vuelos rápidos y directos. Para reproducirse forma parejas y establece el nido principalmente en termiteros arbóreos, cavidades de árboles o palmeras. Habita bosques secos, sabanas, matorrales, cultivos y zonas urbanas arboladas, reuniéndose en grupos para alimentarse y descansar.', 'Esta ave se la puedes encontrar en la zona de Aulas Orientales', 'Eupsittula pertinax.jpg', 'Eupsittula pertinax2.jpg', '', '', 'https://www.youtube.com/shorts/0RX5FOOJbvY', 'LC.ico, Diurno.ico, Pareja.ico, Gregario.ico, Frugivoro.ico, Granivoro.ico, Zigodactilo.ico', 2),
(13, 'Carpintero Real', 'Dryocopus lineatus', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Subclase: Neornithes, Infraclase: Neognathae, Superorden: Neoaves, Orden: Piciformes, Familia: Picidae, Genero: Dryocopus, Especie: Dryocopus lineatus, Autor: LINNAEUS, 1766', 'Mide 30-36 cm; pesa 183-213 g. Plumaje principalmente negro, con una cresta prominente de color rojo intenso en la cabeza. Desde la base del pico posee líneas blancas que recorren los lados del cuello y se extienden hacia los hombros. El pecho y el abdomen son blanquecinos o amarillentos, con numerosas franjas transversales negras. Tiene ojos claros y un pico largo, recto, fuerte y puntiagudo, adaptado para perforar la madera. El macho presenta frente y línea malar rojas; en la hembra estas zonas son negras, y ambos poseen una cola larga, oscura y rígida.', 'Especie territorial. Se comunica mediante llamados fuertes, tamborileos y golpes sobre los troncos, especialmente para defender su territorio. Busca alimento trepando verticalmente por árboles, donde perfora la madera y explora la corteza con su pico. Consume principalmente hormigas, termitas, escarabajos y sus larvas, aunque complementa su dieta con frutos y semillas. Durante la reproducción forma parejas y ambos individuos excavan una cavidad en árboles muertos, donde incuban y alimentan a sus crías. Habita bosques, bordes de bosque y áreas arboladas abiertas, permaneciendo principalmente sobre troncos y ramas grandes.', 'Esta ave la podemos encontrar en la zona de Abanico', 'Dryocopus lineatus.jpg', 'Dryocopus lineatus2.jpg', '', '', 'https://www.youtube.com/shorts/2yWpu0RHhh8', 'LC.ico, Diurno.ico, Solitario.ico, Pareja.ico, Insectivoro.ico, Frugivoro.ico, Zigodactilo.ico', 17),
(14, 'Gavilán Caminero', 'Rupornis magnirostris', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Accipitriformes, Familia: Accipitridae, Genero: Rupornis, Especie: Rupornis magnirostris, Autor: GMELIN, 1788', 'Mide 31-41 cm; pesa 250-300 g. Cabeza grisácea, dorso de color marrón grisáceo, con variaciones según la subespecie. La garganta es clara, mientras que el pecho y abdomen poseen numerosas franjas transversales blancas y castaño rojizas. Alas son cortas y anchas, con tonos rojizos visibles durante el vuelo; la cola es larga y presenta cuatro o cinco bandas oscuras. Tiene ojos amarillos, un pico corto, fuerte y curvo, de color oscuro en la punta. Sus patas son amarillas, fuertes y poseen garras curvas; ambos sexos son similares, aunque la hembra suele ser más grande.', 'Se comunica mediante llamados fuertes, agudos y repetitivos, emitidos mientras permanece posada, vuela o defiende su territorio. Busca alimento desde árboles, postes y cercas, donde permanece vigilante antes de lanzarse rápidamente sobre sus presas. Consume insectos grandes, reptiles, anfibios, aves y pequeños mamíferos; también puede caminar por el suelo para capturarlos. Durante la reproducción forma parejas y construye un nido de ramas en árboles, donde protege agresivamente los huevos y las crías. Habita bordes de bosque, sabanas, potreros, cultivos, parques y zonas urbanas arboladas, mostrando gran adaptación a ambientes intervenidos.', 'Esta ave la podemos encontrar en la zona de Abanico y en la zona del CREAD', 'Rupornis magnirostris.jpg', 'Rupornis magnirostris2.jpg', '', '', 'https://www.youtube.com/shorts/qWHc0OQbbts', 'LC.ico, Diurno.ico, Solitario.ico, Pareja.ico, Carnivoro.ico, Anisodactilo.ico', 23),
(15, 'Buitre Negro', 'Coragyps atratus', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Clase: Aves, Orden: Cathartiformes, Familia: Cathartidae, Genero: Coragyps, Especie: Coragyps atratus, Autores: LE MAOUT, 1853 ; BECHSTEIN, 1793', 'Mide 56-74 cm; pesa 1.180-2.750 g. Cuerpo robusto cubierto por un plumaje negro, con ligeros reflejos brillantes en el dorso y las alas. Cabeza y parte superior del cuello carecen de plumas, poseen piel gris oscura o negra, rugosa y arrugada. Alas anchas, tienen manchas blancas en la base de las plumas primarias, visibles durante el vuelo. Ojos pardos, pico relativamente corto, fuerte y curvo, de tonalidad grisácea con la punta más clara. La cola es corta y casi cuadrada; sus patas son grisáceas y ambos sexos presentan una apariencia similar.', 'Suele observarse volando, descansando y alimentándose en grupos. Se comunica mediante gruñidos, siseos y movimientos corporales, ya que posee una capacidad de vocalización limitada. Busca alimento planeando sobre áreas abiertas y siguiendo a otros gallinazos hasta localizar carroña, basuras o restos orgánicos. Ocasionalmente consume huevos, animales pequeños, crías vulnerables y materia vegetal en descomposición. Durante la reproducción forma parejas monógamas y deposita sus huevos en cavidades, construcciones abandonadas o lugares protegidos, sin elaborar un nido complejo. Habita sabanas, potreros, bosques abiertos, basureros y zonas urbanas; suele descansar colectivamente en árboles altos o estructuras elevadas.', 'Esta ave la podemos encontrar en la zona de Aulas Orientales', 'Coragyps atratus.jpg', '', '', '', 'https://www.youtube.com/shorts/ioJoSCUME2k', 'LC.ico, Diurno.ico, Gregario.ico, Carroñero.ico, Anisodactilo.ico', 26),
(16, 'Loro real amazónico', 'Amazona ochrocephala', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Psittaciformes, Familia: Psittacidae, Genero: Amazona, Especie: Amazona ochrocephala, Autor: GMELIN, 1788', 'Mide 31-38 cm; pesa 380-500 g. Plumaje principalmente verde, con bordes oscuros en las plumas de la nuca, el dorso y el pecho. La frente y la parte anterior de la coronilla son amarillas, aunque la extensión de este color varía según la subespecie. Las alas son verdes, con tonalidades rojas en el doblez y la base de algunas plumas; la cola es corta, verde y casi cuadrada. Tiene ojos anaranjados rodeados por un anillo periocular blanco y un pico fuerte, curvo y gris oscuro, con zonas anaranjadas en la mandíbula superior. Sus patas son cortas y grisáceas; el macho y la hembra presentan una apariencia similar, sin diferencias externas evidentes.', 'Se comunica mediante chillidos, silbidos y llamados fuertes, especialmente durante el vuelo y el contacto con otros individuos. Busca alimento principalmente en las copas de los árboles. Durante el forrajeo trepa con agilidad y utiliza las patas, el pico y la lengua para sujetar, abrir y manipular los alimentos. Para reproducirse forma parejas monógamas y establece su nido dentro de cavidades de árboles, donde protege y alimenta a sus crías. Habita bosques tropicales, sabanas arboladas, manglares y zonas agrícolas, reuniéndose en grupos para alimentarse y descansar.', 'Esta ave la podemos encontrar en la zona de Rectoría.', 'Amazona ochrocephala.jpg', '', '', '', 'https://www.youtube.com/shorts/NVHC8DI1JIo', 'LC.ico, Diurno.ico, Pareja.ico, Frugivoro.ico, Granivoro.ico, Zigodactilo.ico', 3),
(17, 'Guacamayo Severo', 'Ara severus', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Psittaciformes, Familia: Psittacidae, Genero: Ara, Especie: Ara severus, Autor: LINNAEUS, 1758', 'Mide 46-51 cm; pesa 285-430 g. Plumaje verde, con tonalidades azuladas en la coronilla y en las plumas de vuelo. Frente, barbilla y algunas zonas cercanas al rostro poseen coloración castaña o marrón rojiza. Las alas muestran manchas rojas en los hombros y bordes azules. Cola larga, puntiaguda y de tonos rojizos con extremos azules. Piel facial blanca sin plumas, atravesada por finas líneas oscuras, ojos amarillentos y un pico negro, fuerte y curvo. Sus patas son cortas y grisáceas; el macho y la hembra presentan una apariencia similar, sin diferencias externas evidentes.', 'Se comunica mediante chillidos fuertes y ásperos cuando vuela, se alimenta o mantiene contacto con otros individuos. Busca alimento en las copas de los árboles. Durante el forrajeo trepa con agilidad y utiliza sus patas prensiles y su fuerte pico para sostener, abrir y manipular los alimentos. Para reproducirse forma parejas y establece el nido en cavidades de árboles, donde protege y alimenta a sus crías. Habita bosques húmedos y secundarios, palmares, sabanas arboladas, bordes de bosque y áreas intervenidas con árboles.', 'Esta ave la podemos encontrar en la zona del CREAD', 'Ara severus.jpg', '', '', '', 'https://www.youtube.com/shorts/vza4ZjQkRXk', 'LC.ico, Diurno.ico, Pareja.ico, Gregario.ico, Frugivoro.ico, Granivoro.ico, Zigodactilo.ico', 4),
(18, 'Cuco Ardilla', 'Piaya cayana', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Cuculiformes, Familia: Cuculidae, Genero: Piaya, Especie: Piaya cayana, Autor: LINNAEUS, 1766', 'Mide 43-46 cm; pesa 95-110 g. Presenta cabeza, cuello, dorso y las alas de color castaño rojizo, con la garganta ligeramente más clara. Pecho grisáceo y abdomen con tonalidad gris oscura o negruzca. Cola muy larga y escalonada; plumas centrales rojizas y las externas son negras con amplias puntas blancas. Ojos rojizos, anillo periocular amarillo o rojo. Pico corto, ligeramente curvo, de color amarillo verdoso. Sus patas son cortas y grisáceas; los juveniles presentan el pico gris, el iris pardo y menos manchas blancas en la cola.', 'Se comunica mediante silbidos y llamados fuertes, especialmente durante el contacto con otros individuos y la defensa de su espacio. Busca alimento desplazándose rápidamente por ramas, con movimientos similares a los de una ardilla, y realiza vuelos cortos entre árboles. Consume orugas, cigarras, saltamontes, avispas y frutos. Para reproducirse forma parejas y construye un nido en forma de taza con hojas y ramas, oculto entre la vegetación densa de árboles o arbustos. Habita bosques, bordes de bosque, matorrales, cultivos y zonas arboladas, donde permanece principalmente en los estratos medios y altos.', 'Esta ave la podemos encontrar en la zona de Abanico', 'Piaya Cayana.jpg', '', '', '', 'https://www.youtube.com/results?search_query=Cantode+piaya+cayana', 'LC.ico, Diurno.ico, Solitario.ico, Pareja.ico, Insectivoro.ico, Zigodactilo.ico', 25),
(19, 'Garrapatero Piquiliso', 'Crotophaga ani', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Cuculiformes, Familia: Cuculidae, Genero: Crotophaga, Especie: Crotophaga ani, Autor: LINNAEUS, 1758', 'Mide 33-36 cm; pesa 95-119 g. Plumaje completamente negro, con reflejos azulados, verdosos o bronceados visibles bajo la luz. Plumas del cuello, el pecho y la parte superior del dorso poseen bordes claros que producen una apariencia escamada. Ojos de color pardo oscuro y un pico negro, grande, alto, comprimido lateralmente y curvado hacia abajo. Alas cortas y redondeadas, cola larga, ancha, graduada y de color negro. Patas oscuras y relativamente fuertes; el macho y la hembra presentan una apariencia externa similar.', 'Se comunica mediante llamados fuertes y repetitivos, utilizados para mantener el contacto y alertar sobre posibles amenazas. Busca alimento caminando o saltando por el suelo y entre la vegetación baja, captura insectos y otros animales pequeños. Su alimentación incluye saltamontes, orugas, escarabajos, arañas, caracoles y lagartijas, complementada ocasionalmente con frutos y semillas. Durante la reproducción varias parejas pueden construir y utilizar un mismo nido comunal, colaborando en la incubación y el cuidado de las crías. Habita pastizales, sabanas, potreros, cultivos, matorrales y zonas intervenidas, donde se desplaza conjuntamente para alimentarse y descansar.', 'Esta ave la podemos encontrar en la zona de Aulas Orientales', 'Crotophaga ani.jpg', 'Crotophaga ani2.jpg', 'Crotophaga ani3.jpg', '', 'https://www.youtube.com/shorts/Ulhk9csgfXM', 'LC.ico, Diurno.ico, Pareja.ico, Gregario.ico, Omnivoro.ico, Insectivoro.ico, Zigodactilo.ico', 24),
(20, 'Chimachima', 'Daptrius chimachima', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Falconiformes, Familia: Falconidae, Genero: Daptrius, Especie: Daptrius chimachima, Autor: (SPIX, 1824) ; (VIEILLOT, 1816)', 'Mide 40-46 cm; pesa 277-364 g. Presenta cabeza, cuello, garganta, pecho y abdomen de color crema o amarillo pálido. Posee franja oscura detrás del ojo; el dorso y las alas son de color marrón oscuro o negruzco. Las alas muestran una mancha blanquecina visible durante el vuelo, mientras que la cola es larga, clara y atravesada por bandas oscuras. Tiene ojos pardos, piel facial desnuda amarillenta o rosada y un pico corto, fuerte y curvo, de color gris azulado. Sus patas son largas y gris verdosas; ambos sexos tienen plumaje similar, aunque la hembra suele ser más grande y pesada.', 'Se comunica mediante llamados fuertes, ásperos y repetitivos, emitidos desde lugares elevados o durante el vuelo. Busca alimento caminando por el suelo o vigilando desde árboles, postes y cercas, desde donde localiza carroña, insectos y pequeños vertebrados. Para reproducirse forma parejas y construye un nido de ramas en la parte alta de árboles o palmeras, donde protege y alimenta a sus crías. Habita sabanas, potreros, cultivos, humedales, bordes de ríos y carreteras, mostrando gran adaptación a ambientes abiertos e intervenidos.', 'Esta ave la podemos encontrar en la zona de Abanico y en la zona del CREAD', 'Daptrius chimachima3.jpg', 'Daptrius chimachima2.jpg', '', '', 'https://www.youtube.com/shorts/iZ3TEXp33gE', 'LC.ico, Diurno.ico, Solitario.ico, Pareja.ico, Omnivoro.ico, Anisodactilo.ico', 21),
(21, 'Eufonía Violácea', 'Euphonia violacea', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Passeriformes, Familia: Fringillidae, Genero: Euphonia, Especie: Euphonia violacea, Autor: LINNAEUS, 1758', 'Euphonia violacea mide entre 10 y 11,5 cm y pesa aproximadamente entre 14 y 16 g. El macho presenta la cabeza, la garganta, el dorso y las alas de color azul violáceo oscuro y brillante. Posee una mancha amarillo dorada en la frente, mientras que el pecho, el abdomen y las zonas inferiores son amarillos. La hembra tiene el dorso verde oliva y las partes inferiores amarillo verdosas, con una coloración menos llamativa. Tiene ojos oscuros y un pico corto, grueso y puntiagudo, de color negro o gris azulado. Su cola es corta y oscura, sus patas son pequeñas y grisáceas, y presenta un marcado dimorfismo sexual.', 'Euphonia violacea es una especie diurna, activa y ágil, que suele observarse sola, en pareja o en pequeños grupos familiares. Se comunica mediante llamados metálicos y cantos melodiosos variados, en los que puede imitar las vocalizaciones de otras aves. Busca alimento entre las ramas y el follaje, donde consume principalmente frutos pequeños, bayas y frutos de plantas parásitas. Durante el forrajeo se desplaza rápidamente entre los árboles y complementa su dieta con néctar y algunos insectos. Para reproducirse forma parejas y construye un nido cerrado de forma esférica, ubicado en cavidades, troncos o lugares protegidos por la vegetación. Habita bosques húmedos y secundarios, bordes de bosque, plantaciones, jardines y otras zonas arboladas con abundancia de frutos.', 'Esta ave la podemos encontrar en la zona Central', 'Euphonia violacea.jpg', 'Euphonia violacea2.jpg', 'Euphonia violacea3.jpg', '', 'https://www.youtube.com/shorts/QKp2_LGngpw', 'LC.ico, Diurno.ico, Pareja.ico, Gregario.ico, Frugivoro.ico, Anisodactilo.ico', 10),
(22, 'Tero', 'Vanellus chilensis', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Charadriiformes, Familia: Charadriidae, Genero: Vanellus, Especie: Vanellus chilensis, Autor: MOLINA, 1782', 'Mide 32-38 cm; pesa 280-425 g. Presenta cabeza y cuello grisáceos, con frente, garganta y pecho de color negro. El dorso y alas son pardo grisáceos, con reflejos verdes, bronceados y violáceos; el abdomen es blanco. Posee una cresta fina de plumas negras y espolones rojizos en las articulaciones de las alas, utilizados para defenderse. Tiene ojos rojos, pico recto y rojizo con la punta negra, y patas largas de color rosado o rojizo. Su cola es blanca con una banda negra; ambos sexos son similares, aunque la hembra suele tener los espolones más cortos.', 'Se comunica mediante llamados fuertes, agudos y repetitivos, especialmente cuando detecta amenazas cerca de su territorio o del nido. Busca alimento caminando por el suelo en pastizales y zonas húmedas, donde captura insectos, lombrices y otros pequeños invertebrados. Durante el forrajeo se desplaza mediante carreras cortas, se detiene para observar y picotea rápidamente a sus presas. Para reproducirse forma parejas y deposita sus huevos en una pequeña depresión construida directamente sobre el suelo. Defiende agresivamente sus huevos y crías mediante vuelos bajos, vocalizaciones y exhibiciones con las alas; habita potreros, cultivos, humedales, parques y áreas abiertas.', 'Esta ave podemos encontrarla en la zona de Aulas Orientales', 'Vanellus chilensis.jpg', 'Vanellus chilensis2.jpg', 'Vanellus chilensis3.jpg', '', 'https://www.youtube.com/shorts/lt_viD5Q7f8', 'LC.ico, Diurno.ico, Pareja.ico, Gregario.ico, Insectivoro.ico, Anisodactilo.ico', 27),
(23, 'Carpintero Pechipunteado', 'Colaptes punctigula', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Piciformes, Familia: Picidae, Genero: Colaptes, Especie: Colaptes punctigula, Autor: BODDAERT, 1783', 'Mide 18-21 cm; pesa 50-70 g. Presenta el dorso verde bronceado con barras oscuras, mientras que las alas son pardas con franjas más claras. El pecho y el abdomen son amarillo oliváceos, con pequeñas manchas negras y una tonalidad rojiza o anaranjada en la parte superior del pecho. Posee la frente negra, la nuca roja y una amplia franja blanca que se extiende alrededor del ojo hasta los lados del cuello. Tiene ojos castaño rojizos y un pico corto, recto, puntiagudo y de color negruzco; sus patas son amarillo verdosas. El macho presenta una franja malar roja, mientras que la hembra carece de ella y posee el rojo limitado a la parte posterior de la coronilla y la nuca.', 'Busca alimento trepando por troncos y ramas, aunque también baja al suelo para capturar hormigas y otros invertebrados. Obtiene sus presas picoteando o explorando las grietas de la corteza. Durante el forrajeo se desplaza por los estratos medios y altos de los árboles, sujetándose firmemente a los troncos. Para reproducirse forma parejas y excava cavidades en troncos de árboles muertos, generalmente a mediana o gran altura. Habita bosques secundarios, manglares, bordes de bosque, zonas abiertas arboladas y áreas urbanas con vegetación.', 'Esta ave la podemos encontrar en la zona de Aulas Orientales', 'Colaptes punctigula.jpg', 'Colaptes punctigula2.jpg', '', '', 'https://www.youtube.com/shorts/YdlGsrodoZQ', 'LC.ico, Diurno.ico, Solitario.ico, Pareja.ico, Insectivoro.ico, Anisodactilo.ico', 18),
(24, 'Azulejo', 'Thraupis episcopus', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Passeriformes, Familia: Thraupidae, Subfamilia: Thraupinae, Genero: Thraupis, Especie: Thraupis episcopus, Autor: LINNAEUS, 1766', 'Mide 16-18 cm; pesa entre 35 y 45 g. Presenta cabeza, cuello, pecho y abdomen de color gris azulado claro. El dorso es azul grisáceo, mientras que las alas y la cola exhiben tonalidades azul intenso. En los hombros presenta una mancha blanca o azul brillante. Posee ojos oscuros y un pico corto, grueso y ligeramente puntiagudo, de color gris oscuro o negruzco. Sus patas son cortas y grisáceas; ambos sexos son similares, aunque la hembra puede presentar tonos ligeramente más opacos.', 'Se comunica mediante llamados agudos, cantos suaves y chirriantes. Busca alimento entre los niveles medios y altos de los árboles. Durante el forrajeo se desplaza con agilidad entre ramas y follaje, y puede acercarse a jardines y comederos con frutas. Para reproducirse forma parejas y construye un nido profundo en forma de taza, ubicado entre ramas altas o estructuras protegidas. Habita bosques abiertos, cultivos, parques, jardines y zonas urbanas arboladas, mostrando gran adaptación a la presencia humana.', 'Esta ave la podemos encontrar en la zona del CREAD y en la zona Central', 'Thraupis episcopus.jpg', 'Thraupis episcopus3.jpg', '', '', 'https://www.youtube.com/shorts/ZFlAKbdeqYk', 'LC.ico, Diurno.ico, Pareja.ico, Gregario.ico, Frugivoro.ico, Anisodactilo.ico', 11),
(25, 'Mielero Común', 'Coereba flaveola', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Passeriformes, Familia: Thraupidae, Subfamilia: Coerebinae, Genero: Coereba, Especie: Coereba flaveola, Autor: (VIEILLOT, 1809); (LINNAEUS, 1758)', 'Mide 10-13 cm; pesa 5,5-19 g. Presenta cabeza y partes superiores de color gris oscuro o negruzco, con la coronilla negra. Posee una franja superciliar blanca muy marcada y una línea negra que atraviesa la zona de los ojos. Garganta grisácea o blanquecina, pecho, abdomen y rabadilla de color amarillo brillante. Tiene un pico negro, delgado, puntiagudo y curvado hacia abajo, con una pequeña zona rojiza en la comisura. Sus patas son delgadas y oscuras; el macho y la hembra son similares, mientras que los juveniles presentan colores más opacos.', 'Se comunica mediante cantos rápidos, agudos y chirriantes, emitidos con frecuencia mientras se desplaza y busca alimento. Visita flores para consumir néctar y también se alimenta de frutos pequeños, insectos, arañas y otros artrópodos. Durante el forrajeo salta entre las ramas, cuelga boca abajo y puede perforar la base de las flores para extraer el néctar. Construye un nido globular con fibras vegetales y entrada lateral; la hembra incuba y ambos padres alimentan a las crías. Habita bordes de bosque, matorrales, cultivos, parques y jardines, adaptándose fácilmente a zonas urbanas con flores abundantes.', 'Esta ave la podemos conseguir en la zona del CREAD', 'Coereba flaveola.jpg', '', '', '', 'https://www.youtube.com/shorts/8GvR_n8AAQQ', 'LC.ico, Diurno.ico, Pareja.ico, Gregario.ico, Nectivoro.ico, Anisodactilo.ico', 12),
(26, 'Picabuey', 'Machetornis rixosa', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Passeriformes, Familia: Tyrannidae, Genero: Machetornis, Especie: Machetornis rixosa, Autor: VIEILLOT, 1819', 'Mide 19-20 cm; pesa 29-40 g. Presenta cabeza grisácea u oliva, con una delgada franja oscura que atraviesa la zona de los ojos. Dorso y alas son de color pardo oliváceo, mientras que la garganta es más clara o amarillenta. Pecho y abdomen poseen una coloración amarilla; en la coronilla tiene plumas rojizas o anaranjadas que normalmente permanecen ocultas. Posee ojos pardo rojizos y un pico negro, recto, delgado y puntiagudo, adecuado para capturar insectos. Sus patas son negras, largas y delgadas; la cola es estrecha y ambos sexos presentan una apariencia externa similar.', 'Busca alimento caminando y corriendo por pastizales, potreros y otras áreas abiertas. Es frecuente verla cerca del ganado o posada sobre su lomo, aprovechando los insectos que los animales espantan al desplazarse. También vigila desde postes, cercas y ramas bajas, desde donde realiza vuelos cortos para atrapar presas. Para reproducirse forma parejas y construye un nido cerrado con fibras vegetales, ubicado en árboles, estructuras humanas o nidos abandonados. Habita bordes de humedales, parques y zonas urbanas, mostrando buena adaptación a ambientes intervenidos.', 'Esta ave la podemos encontrar en la zona del CREAD', 'Machetornis rixosa.jpg', 'Machetornis rixosa2.jpg', '', '', 'https://www.youtube.com/shorts/aMZgN8hJByY', 'LC.ico, Diurno.ico, Pareja.ico, Gregario.ico, Nectivoro.ico, Insectivoro.ico, Anisodactilo.ico', 13),
(27, 'Sinsonte Tropical', 'Mimus gilvus', 'Desconocido', 'Reino: Animalia, Filo: Chordata, Subfilo: Vertebrata, Clase: Aves, Orden: Passeriformes, Familia: Mimidae, Genero: Mimus, Especie: Mimus gilvus, Autor: VIEILLOT, 1808', 'Mimus gilvus, conocido como sinsonte tropical, mide aproximadamente 25 cm y pesa cerca de 54 g. Presenta la cabeza, el cuello y el dorso de color gris, mientras que el pecho y el abdomen son blanquecinos. Posee una ceja blanca marcada, una franja oscura que atraviesa el ojo y ojos de color amarillo. Las alas son oscuras, con dos franjas blancas y bordes claros en las plumas de vuelo. Tiene un pico negro, delgado y ligeramente curvado hacia abajo; su cola es larga, oscura y con puntas blancas. Sus patas son largas y oscuras; el macho y la hembra son similares, aunque los juveniles presentan tonos más pardos y opacos.', 'Se comunica mediante cantos variados, silbidos y llamados fuertes, especialmente durante el cortejo y la defensa de su territorio. Busca alimento caminando y corriendo por el suelo, entre pastizales y vegetación baja. Durante el forrajeo puede levantar y extender las alas para descubrir presas. Para reproducirse forma parejas y construye un nido en forma de taza entre arbustos densos; ambos padres protegen y alimentan a las crías. Habita sabanas, cultivos, parques, jardines y zonas urbanas abiertas, mostrando un comportamiento confiado y agresivo ante posibles amenazas.', 'Esta ave la podemos encontrar en la zona de Aulas Orientales y en la zona del CREAD', 'Mimus gilvus.jpg', 'Mimus gilvus2.jpg', '', '', 'https://www.youtube.com/shorts/JibZipLeOrk', 'LC.ico, Diurno.ico, Nucleo Familiar.ico, Pareja.ico, Insectivoro.ico, Anisodactilo.ico', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador_visitas`
--

CREATE TABLE `contador_visitas` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `contador_visitas`
--

INSERT INTO `contador_visitas` (`id`, `total`) VALUES
(1, 223);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `glosario`
--

CREATE TABLE `glosario` (
  `id_glosario` int(11) NOT NULL,
  `categoria` varchar(60) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `ruta` varchar(300) NOT NULL,
  `orden` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `glosario`
--

INSERT INTO `glosario` (`id_glosario`, `categoria`, `nombre`, `ruta`, `orden`) VALUES
(1, 'Alimentación', 'Artrópodo', 'Imagenes/glosario/alimentacion/artropodo.jpg', 1),
(2, 'Alimentación', 'Carnívoro', 'Imagenes/glosario/alimentacion/carnivoro.jpg', 2),
(3, 'Alimentación', 'Carroña', 'Imagenes/glosario/alimentacion/carronya.jpg', 3),
(4, 'Alimentación', 'Carroñero', 'Imagenes/glosario/alimentacion/carronyero.jpg', 4),
(5, 'Alimentación', 'Frugívoro', 'Imagenes/glosario/alimentacion/frugivoro.jpg', 5),
(6, 'Alimentación', 'Granívoro', 'Imagenes/glosario/alimentacion/granivoro.jpg', 6),
(7, 'Alimentación', 'Gremio alimentario', 'Imagenes/glosario/alimentacion/gremio-alimentario.jpg', 7),
(8, 'Alimentación', 'Insectívoro', 'Imagenes/glosario/alimentacion/insectivoro.jpg', 8),
(9, 'Alimentación', 'Invertebrado', 'Imagenes/glosario/alimentacion/invertebrado.jpg', 9),
(10, 'Alimentación', 'Larva', 'Imagenes/glosario/alimentacion/larva.jpg', 10),
(11, 'Alimentación', 'Nectarívoro', 'Imagenes/glosario/alimentacion/nectarivoro.jpg', 11),
(12, 'Alimentación', 'Néctar', 'Imagenes/glosario/alimentacion/nectar.jpg', 12),
(13, 'Alimentación', 'Omnívoro', 'Imagenes/glosario/alimentacion/omnivoro.jpg', 13),
(14, 'Alimentación', 'Presa', 'Imagenes/glosario/alimentacion/presa.jpg', 14),
(15, 'Alimentación', 'Vertebrado', 'Imagenes/glosario/alimentacion/vertebrado.jpg', 15),
(16, 'Anatomía', 'Abdomen', 'Imagenes/glosario/anatomia/abdomen.jpg', 1),
(17, 'Anatomía', 'Anillo periocular', 'Imagenes/glosario/anatomia/anillo-periocular.jpg', 2),
(18, 'Anatomía', 'Banda terminal', 'Imagenes/glosario/anatomia/banda-terminal.jpg', 3),
(19, 'Anatomía', 'Barrado', 'Imagenes/glosario/anatomia/barrado.jpg', 4),
(20, 'Anatomía', 'Cera', 'Imagenes/glosario/anatomia/cera.jpg', 5),
(21, 'Anatomía', 'Cola bifurcada', 'Imagenes/glosario/anatomia/cola-bifurcada.jpg', 6),
(22, 'Anatomía', 'Cola graduada', 'Imagenes/glosario/anatomia/cola-graduada.jpg', 7),
(23, 'Anatomía', 'Cola rígida', 'Imagenes/glosario/anatomia/cola-rigida.jpg', 8),
(24, 'Anatomía', 'Comisura del pico', 'Imagenes/glosario/anatomia/comisura-del-pico.jpg', 9),
(25, 'Anatomía', 'Coronilla', 'Imagenes/glosario/anatomia/coronilla.jpg', 10),
(26, 'Anatomía', 'Cresta', 'Imagenes/glosario/anatomia/cresta.jpg', 11),
(27, 'Anatomía', 'Dimorfismo sexual', 'Imagenes/glosario/anatomia/dimorfismo-sexual.jpg', 12),
(28, 'Anatomía', 'Dorso', 'Imagenes/glosario/anatomia/dorso.jpg', 13),
(29, 'Anatomía', 'Espolón', 'Imagenes/glosario/anatomia/espolon.jpg', 14),
(30, 'Anatomía', 'Estriado', 'Imagenes/glosario/anatomia/estriado.jpg', 15),
(31, 'Anatomía', 'Franja superciliar', 'Imagenes/glosario/anatomia/franja-superciliar.jpg', 16),
(32, 'Anatomía', 'Frente', 'Imagenes/glosario/anatomia/frente.jpg', 17),
(33, 'Anatomía', 'Garganta', 'Imagenes/glosario/anatomia/garganta.jpg', 18),
(34, 'Anatomía', 'Garras', 'Imagenes/glosario/anatomia/garras.jpg', 19),
(35, 'Anatomía', 'Iridiscente', 'Imagenes/glosario/anatomia/iridiscente.jpg', 20),
(36, 'Anatomía', 'Iris', 'Imagenes/glosario/anatomia/iris.jpg', 21),
(37, 'Anatomía', 'Línea malar', 'Imagenes/glosario/anatomia/linea-malar.jpg', 22),
(38, 'Anatomía', 'Mejilla', 'Imagenes/glosario/anatomia/mejilla.jpg', 23),
(39, 'Anatomía', 'Morfología', 'Imagenes/glosario/anatomia/morfologia.jpg', 24),
(40, 'Anatomía', 'Nuca', 'Imagenes/glosario/anatomia/nuca.jpg', 25),
(41, 'Anatomía', 'Oliváceo', 'Imagenes/glosario/anatomia/olivaceo.jpg', 26),
(42, 'Anatomía', 'Pardo', 'Imagenes/glosario/anatomia/pardo.jpg', 27),
(43, 'Anatomía', 'Patas prensiles', 'Imagenes/glosario/anatomia/patas-prensiles.jpg', 28),
(44, 'Anatomía', 'Pecho', 'Imagenes/glosario/anatomia/pecho.jpg', 29),
(45, 'Anatomía', 'Pico', 'Imagenes/glosario/anatomia/pico.jpg', 30),
(46, 'Anatomía', 'Piel facial desnuda', 'Imagenes/glosario/anatomia/piel-facial-desnuda.jpg', 31),
(47, 'Anatomía', 'Plumaje', 'Imagenes/glosario/anatomia/plumaje.jpg', 32),
(48, 'Anatomía', 'Plumas cobertoras', 'Imagenes/glosario/anatomia/plumas-cobertoras.jpg', 33),
(49, 'Anatomía', 'Plumas de vuelo', 'Imagenes/glosario/anatomia/plumas-de-vuelo.jpg', 34),
(50, 'Anatomía', 'Plumas primarias', 'Imagenes/glosario/anatomia/plumas-primarias.jpg', 35),
(51, 'Anatomía', 'Rabadilla', 'Imagenes/glosario/anatomia/rabadilla.jpg', 36),
(52, 'Comportamiento', 'Cavidad de nidificación', 'Imagenes/glosario/comportamiento/cavidad-de-nidificacion.jpg', 1),
(53, 'Comportamiento', 'Cortejo', 'Imagenes/glosario/comportamiento/cortejo.jpg', 2),
(54, 'Comportamiento', 'Cría', 'Imagenes/glosario/comportamiento/cria.jpg', 3),
(55, 'Comportamiento', 'Diurno', 'Imagenes/glosario/comportamiento/diurno.jpg', 4),
(56, 'Comportamiento', 'En pareja', 'Imagenes/glosario/comportamiento/en-pareja.jpg', 5),
(57, 'Comportamiento', 'Etología', 'Imagenes/glosario/comportamiento/etologia.jpg', 6),
(58, 'Comportamiento', 'Forrajeo', 'Imagenes/glosario/comportamiento/forrajeo.jpg', 7),
(59, 'Comportamiento', 'Gregario', 'Imagenes/glosario/comportamiento/gregario.jpg', 8),
(60, 'Comportamiento', 'Incubación', 'Imagenes/glosario/comportamiento/incubacion.jpg', 9),
(61, 'Comportamiento', 'Juvenil', 'Imagenes/glosario/comportamiento/juvenil.jpg', 10),
(62, 'Comportamiento', 'Monógamo', 'Imagenes/glosario/comportamiento/monogamo.jpg', 11),
(63, 'Comportamiento', 'Nido comunal', 'Imagenes/glosario/comportamiento/nido-comunal.jpg', 12),
(64, 'Comportamiento', 'Nido en forma de copa', 'Imagenes/glosario/comportamiento/nido-en-forma-de-copa.jpg', 13),
(65, 'Comportamiento', 'Nido globular', 'Imagenes/glosario/comportamiento/nido-globular.jpg', 14),
(66, 'Comportamiento', 'Núcleo familiar', 'Imagenes/glosario/comportamiento/nucleo-familiar.jpg', 15),
(67, 'Comportamiento', 'Oportunista', 'Imagenes/glosario/comportamiento/oportunista.jpg', 16),
(68, 'Comportamiento', 'Solitario', 'Imagenes/glosario/comportamiento/solitario.jpg', 17),
(69, 'Comportamiento', 'Tamborileo', 'Imagenes/glosario/comportamiento/tamborileo.jpg', 18),
(70, 'Comportamiento', 'Territorial', 'Imagenes/glosario/comportamiento/territorial.jpg', 19),
(71, 'Comportamiento', 'Vocalización', 'Imagenes/glosario/comportamiento/vocalizacion.jpg', 20),
(72, 'Conservación', 'Preocupación menor', 'Imagenes/glosario/conservacion/preocupacion-menor.jpg', 1),
(73, 'Hábitat', 'Arbóreo', 'Imagenes/glosario/habitat/arboreo.jpg', 1),
(74, 'Hábitat', 'Borde de bosque', 'Imagenes/glosario/habitat/borde-de-bosque.jpg', 4),
(75, 'Hábitat', 'Bosque secundario', 'Imagenes/glosario/habitat/bosque-secundario.jpg', 5),
(76, 'Hábitat', 'Copa del árbol', 'Imagenes/glosario/habitat/copa-del-arbol.jpg', 6),
(77, 'Hábitat', 'Distribución', 'Imagenes/glosario/habitat/distribucion.jpg', 7),
(78, 'Hábitat', 'Dosel', 'Imagenes/glosario/habitat/dosel.jpg', 8),
(79, 'Hábitat', 'Estrato', 'Imagenes/glosario/habitat/estrato.jpg', 9),
(80, 'Hábitat', 'Follaje', 'Imagenes/glosario/habitat/follaje.jpg', 10),
(81, 'Hábitat', 'Humedal', 'Imagenes/glosario/habitat/humedal.jpg', 11),
(82, 'Hábitat', 'Hábitat', 'Imagenes/glosario/habitat/habitat.jpg', 12),
(83, 'Hábitat', 'Manglar', 'Imagenes/glosario/habitat/manglar.jpg', 13),
(84, 'Hábitat', 'Matorral', 'Imagenes/glosario/habitat/matorral.jpg', 14),
(85, 'Hábitat', 'Nicho ecológico', 'Imagenes/glosario/habitat/nicho-ecologico.jpg', 15),
(86, 'Hábitat', 'Palmar', 'Imagenes/glosario/habitat/palmar.jpg', 16),
(87, 'Hábitat', 'Pastizal', 'Imagenes/glosario/habitat/pastizal.jpg', 17),
(88, 'Hábitat', 'Potrero', 'Imagenes/glosario/habitat/potrero.jpg', 18),
(89, 'Hábitat', 'Sabana', 'Imagenes/glosario/habitat/sabana.jpg', 19),
(90, 'Hábitat', 'Termitero arbóreo', 'Imagenes/glosario/habitat/termitero-arboreo.jpg', 20),
(91, 'Hábitat', 'Área intervenida', 'Imagenes/glosario/habitat/area-intervenida.jpg', 2),
(92, 'Hábitat', 'Área ribereña', 'Imagenes/glosario/habitat/area-riberena.jpg', 3),
(93, 'Taxonomía y clasificación', 'Clase', 'Imagenes/glosario/taxonomia%20y%20clasificacion/clase.jpg', 1),
(94, 'Taxonomía y clasificación', 'Especie', 'Imagenes/glosario/taxonomia%20y%20clasificacion/especie.jpg', 2),
(95, 'Taxonomía y clasificación', 'Familia', 'Imagenes/glosario/taxonomia%20y%20clasificacion/familia.jpg', 3),
(96, 'Taxonomía y clasificación', 'Filo', 'Imagenes/glosario/taxonomia%20y%20clasificacion/filo.jpg', 4),
(97, 'Taxonomía y clasificación', 'Género', 'Imagenes/glosario/taxonomia%20y%20clasificacion/genero.jpg', 5),
(98, 'Taxonomía y clasificación', 'Nombre científico', 'Imagenes/glosario/taxonomia%20y%20clasificacion/nombre-cientifico.jpg', 6),
(99, 'Taxonomía y clasificación', 'Nombre común', 'Imagenes/glosario/taxonomia%20y%20clasificacion/nombre-comun.jpg', 7),
(100, 'Taxonomía y clasificación', 'Nomenclatura binomial', 'Imagenes/glosario/taxonomia%20y%20clasificacion/nomenclatura-binomial.jpg', 8),
(101, 'Taxonomía y clasificación', 'Orden', 'Imagenes/glosario/taxonomia%20y%20clasificacion/orden.jpg', 9),
(102, 'Taxonomía y clasificación', 'Reino', 'Imagenes/glosario/taxonomia%20y%20clasificacion/reino.jpg', 10),
(103, 'Taxonomía y clasificación', 'Subespecie', 'Imagenes/glosario/taxonomia%20y%20clasificacion/subespecie.jpg', 11),
(104, 'Taxonomía y clasificación', 'Subfilo', 'Imagenes/glosario/taxonomia%20y%20clasificacion/subfilo.jpg', 12),
(105, 'Taxonomía y clasificación', 'Taxonomía', 'Imagenes/glosario/taxonomia%20y%20clasificacion/taxonomia.jpg', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitad`
--

CREATE TABLE `habitad` (
  `id_habitad` int(11) NOT NULL,
  `nombre_habitad` varchar(50) NOT NULL,
  `link_habitad` varchar(500) NOT NULL,
  `aves_habitad` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitad`
--

INSERT INTO `habitad` (`id_habitad`, `nombre_habitad`, `link_habitad`, `aves_habitad`) VALUES
(1, 'Rectoría', 'videos/Rectoria.mp4', '1,8,9,16'),
(2, 'CREAD', 'videos/CREAD.mp4', '1,2,3,4,5,7,9,14,17,20,24,25,26,27'),
(3, 'Abanico', 'videos/Abanico.mp4', '2,13,14,18,20'),
(4, 'Zona Central', 'videos/Zona Central.mp4', '3,7,10,21,24'),
(5, 'Aulas Orientales', 'videos/Aulas Orientales.mp4', '4,5,6,8,11,12,15,18,19,22,23,27'),
(6, 'Aulas Orientales', 'videos/Aulas Orientales2.mp4', '4,5,6,8,11,12,15,18,19,22,23,27'),
(7, 'Aulas Orientales', 'videos/Aulas Orientales3.mp4', '4,5,6,8,11,12,15,18,19,22,23,27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arboles`
--
ALTER TABLE `arboles`
  ADD PRIMARY KEY (`id_arbol`),
  ADD KEY `idx_orden` (`orden`);

--
-- Indices de la tabla `arboles_aves`
--
ALTER TABLE `arboles_aves`
  ADD PRIMARY KEY (`id_arbol`,`id_aves`),
  ADD KEY `idx_aves` (`id_aves`),
  ADD KEY `idx_arbol` (`id_arbol`);

--
-- Indices de la tabla `aves`
--
ALTER TABLE `aves`
  ADD PRIMARY KEY (`id_aves`);

--
-- Indices de la tabla `contador_visitas`
--
ALTER TABLE `contador_visitas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `glosario`
--
ALTER TABLE `glosario`
  ADD PRIMARY KEY (`id_glosario`),
  ADD KEY `idx_categoria` (`categoria`),
  ADD KEY `idx_orden` (`orden`);

--
-- Indices de la tabla `habitad`
--
ALTER TABLE `habitad`
  ADD PRIMARY KEY (`id_habitad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arboles`
--
ALTER TABLE `arboles`
  MODIFY `id_arbol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `aves`
--
ALTER TABLE `aves`
  MODIFY `id_aves` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `glosario`
--
ALTER TABLE `glosario`
  MODIFY `id_glosario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `habitad`
--
ALTER TABLE `habitad`
  MODIFY `id_habitad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `arboles_aves`
--
ALTER TABLE `arboles_aves`
  ADD CONSTRAINT `fk_aa_arbol` FOREIGN KEY (`id_arbol`) REFERENCES `arboles` (`id_arbol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_aa_aves` FOREIGN KEY (`id_aves`) REFERENCES `aves` (`id_aves`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
