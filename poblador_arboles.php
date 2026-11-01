<?php
/**
 * poblador_arboles.php
 * ------------------------------------------------------------------
 * Script de un solo uso que:
 *   1) Lee las imágenes de Imagenes/arboles/.
 *   2) Inserta cada árbol con su nombre científico, familia y
 *      descripción breve (datos curados del documento
 *      "VEGETACIÓN Y RECURSOS DEL HÁBITAT.docx").
 *   3) Inserta en arboles_aves la relación árbol <-> ave junto
 *      con los usos (Forrajeo, Percha, Anidación, Alimentación...).
 *
 * USO:  http://localhost/aves-ufps/poblador_arboles.php
 * ------------------------------------------------------------------
 */

include 'conexion.php';
mysqli_set_charset($conexion, "utf8mb4");

/* --------------------------------------------------------------
 * 1) Catálogo completo de árboles y plantas (15).
 *    La ruta se compone a partir del nombre del archivo en disco.
 *
 *    Cada entrada tiene:
 *       'archivo'
 *       'comun'
 *       'cientifico'
 *       'familia'
 *       'descripcion'
 *    El orden refleja el del documento original.
 * -------------------------------------------------------------- */
$catalogo = [
    [
        'archivo'      => 'saman.jpg',
        'comun'        => 'Saman',
        'cientifico'   => 'Samanea saman',
        'familia'      => 'Fabaceae',
        'descripcion'  => 'Árbol grande y frondoso, muy característico del campus. '.
                           'Su copa ancha ofrece refugio y zonas de percha a numerosas aves, '.
                           'y en su interior se han registrado varias cavidades utilizadas '.
                           'para la anidación. Es uno de los recursos de hábitat más '.
                           'importantes del territorio universitario.',
    ],
    [
        'archivo'      => 'camajon.jpg',
        'comun'        => 'Camajón',
        'cientifico'   => 'Sterculia apetala',
        'familia'      => 'Malvaceae',
        'descripcion'  => 'Árbol de gran tamaño, notable por su tronco con contrafuertes y '.
                           'su copa extendida. Sus frutos son consumidos por varias aves '.
                           'frugívoras y sus ramas se emplean como perchas elevadas.',
    ],
    [
        'archivo'      => 'jero.jpg',
        'comun'        => 'Jero',
        'cientifico'   => 'Senegalia polyphylla',
        'familia'      => 'Fabaceae',
        'descripcion'  => 'Árbol espinoso de mediano porte. Produce semillas y vainas que '.
                           'sirven de alimento a los periquitos y pericos, los cuales '.
                           'lo usan también como percha y zona de forrajeo.',
    ],
    [
        'archivo'      => 'mango.jpg',
        'comun'        => 'Mango',
        'cientifico'   => 'Mangifera indica',
        'familia'      => 'Anacardiaceae',
        'descripcion'  => 'Árbol frutal muy cultivado en el campus. Sus frutos carnosos '.
                           'son alimento de aves frugívoras y durante la floración atrae '.
                           'insectos, fuente de forrajeo para insectívoros.',
    ],
    [
        'archivo'      => 'palma-real.jpg',
        'comun'        => 'Palma real',
        'cientifico'   => 'Roystonea regia',
        'familia'      => 'Arecaceae',
        'descripcion'  => 'Palmera alta y columnar muy presente en el campus. Sus '.
                           'hojas y copa ofrecen cavidades donde anidan aves como '.
                           'amazonas y guacamayos, y proporcionan perchas elevadas '.
                           'a rapaces como el chimachima.',
    ],
    [
        'archivo'      => 'chiminango.jpg',
        'comun'        => 'Chiminango',
        'cientifico'   => 'Pithecellobium dulce',
        'familia'      => 'Fabaceae',
        'descripcion'  => 'Árbol espinoso de copa redondeada. Sirve como percha '.
                           'para varias aves y en su follaje se realizan labores '.
                           'de forrajeo. Algunas especies construyen nidos en sus ramas.',
    ],
    [
        'archivo'      => 'grama.jpg',
        'comun'        => 'Grama',
        'cientifico'   => 'Poaceae sp.',
        'familia'      => 'Poaceae',
        'descripcion'  => 'Césped de las zonas verdes del campus. En él forrajean y '.
                           'se alimentan de semillas los semilleros y otras aves '.
                           'caminadoras, así como insectívoros que capturan '.
                           'artrópodos entre la hierba.',
    ],
    [
        'archivo'      => 'ficus-benjamina.jpg',
        'comun'        => 'Ficus benjamina',
        'cientifico'   => 'Ficus benjamina',
        'familia'      => 'Moraceae',
        'descripcion'  => 'Árbol ornamental muy abundante. Sus pequeños frutos son '.
                           'consumidos por aves frugívoras y su densa copa se emplea '.
                           'como percha y como zona de forrajeo.',
    ],
    [
        'archivo'      => 'ixora.jpg',
        'comun'        => 'Ixora',
        'cientifico'   => 'Ixora coccinea',
        'familia'      => 'Rubiaceae',
        'descripcion'  => 'Arbusto ornamental de flores tubulares. Su néctar atrae '.
                           'a colibríes y mieleros, que lo utilizan como zona de '.
                           'forrajeo nectarívoro.',
    ],
    [
        'archivo'      => 'achira.jpg',
        'comun'        => 'Achira',
        'cientifico'   => 'Canna indica',
        'familia'      => 'Cannaceae',
        'descripcion'  => 'Planta herbácea con flores rojas o anaranjadas. Sus flores '.
                           'son visitadas por colibríes y mieleros que forrajean '.
                           'el néctar.',
    ],
    [
        'archivo'      => 'oiti.jpg',
        'comun'        => 'Oití',
        'cientifico'   => 'Licania tomentosa',
        'familia'      => 'Chrysobalanaceae',
        'descripcion'  => 'Árbol ornamental de copa densa, muy utilizado como percha '.
                           'por aves rapaces como el gavilán caminero.',
    ],
    [
        'archivo'      => 'naranja-agria.jpg',
        'comun'        => 'Naranja agria',
        'cientifico'   => 'Citrus × aurantium',
        'familia'      => 'Rutaceae',
        'descripcion'  => 'Árbol frutal cultivado en las zonas verdes. Sus frutos '.
                           'cítricos son consumidos por aves frugívoras y sus flores '.
                           'atraen insectos, fuente de alimento para insectívoros.',
    ],
    [
        'archivo'      => 'maraon.jpg',
        'comun'        => 'Marañón',
        'cientifico'   => 'Anacardium occidentale',
        'familia'      => 'Anacardiaceae',
        'descripcion'  => 'Árbol frutal presente en algunas zonas del campus. Su '.
                           'fruto (la "marañón") y el pedúnculo carnoso son alimento '.
                           'de aves frugívoras y granívoras.',
    ],
    [
        'archivo'      => 'urapo.jpg',
        'comun'        => 'Urapo',
        'cientifico'   => 'Myrcianthes cf.',
        'familia'      => 'Myrtaceae',
        'descripcion'  => 'Árbol nativo de mediano porte, presente en algunas zonas '.
                           'verdes del campus. Ofrece refugio y zonas de percha.',
    ],
    [
        'archivo'      => 'buganvilla.jpg',
        'comun'        => 'Buganvilla',
        'cientifico'   => 'Bougainvillea spectabilis',
        'familia'      => 'Nyctaginaceae',
        'descripcion'  => 'Arbusto trepador ornamental muy difundido. Sus diminutas '.
                           'flores tubulares son visitadas por aves nectarívoras y '.
                           'su follaje denso sirve de refugio a pequeños paseriformes.',
    ],
];

/* --------------------------------------------------------------
 * 2) Mapa ave -> [ [archivo_arbol, usos], ... ]
 *    id_aves según aves_insert.sql (1..27, respetando saltos del original).
 *
 *    Los usos son cadenas tipo:
 *       Forrajeo / Percha / Anidación
 *       Alimentación (fruto) / Alimentación (semillas) / etc.
 *
 *    NOTA sobre MELANERPES RUBRICAPILLUS:
 *    El documento original menciona esta especie como usuaria del Ficus
 *    y del Chiminango. Esa especie NO está registrada en la tabla aves
 *    (sólo están Dryocopus lineatus = Carpintero Real, id 13, y
 *    Colaptes punctigula = Carpintero Pechipunteado, id 23). Para no
 *    inventar una relación falsa se omite esa cita espec\u0000ed00edfica.
 *
 *    NOTA sobre CORAGYPS ATRATUS (Buitre Negro, id 15) y COLUMBA LIVIA
 *    (Paloma Bravía, id 10):
 *    El documento sit\u0000fa al Buitre en un "balc\u0000f3n de aulas orientales"
 *    y a la Paloma en "suelo abierto / espacios abiertos". Ninguno usa
 *    un \u0000e1rbol como recurso de h\u0000e1bitat, por lo que se omiten de la
 *    relaci\u0000f3n \u0000e1rbol-ave (no aparece en ninguna ficha de \u0000e1rbol).
 * -------------------------------------------------------------- */
$aves_map = [
    // 1  Periquito de Barbilla Naranja  (Brotogeris jugularis)
    1  => [['saman.jpg',                                'Forrajeo, Percha, Anidación'],
           ['camajon.jpg',                             'Alimentación (fruto), Forrajeo, Percha']],
    // 12 Perico Cara Sucia              (Eupsittula pertinax)
    12 => [['jero.jpg',                                 'Alimentación (semillas), Forrajeo, Percha']],
    // 16 Amazona de Corona Amarilla     (Amazona ochrocephala)
    16 => [['mango.jpg',                                'Alimentación (fruto), Forrajeo, Percha'],
           ['palma-real.jpg',                          'Anidación']],
    // 17 Guacamayo Severo               (Ara severus)
    17 => [['palma-real.jpg',                           'Anidación']],
    // 3  Tangara de Verano              (Piranga rubra)
    3  => [['chiminango.jpg',                           'Percha']],
    // 5  Tirano Tropical                (Tyrannus melancholicus)
    5  => [['chiminango.jpg',                           'Percha, Forrajeo, Alimentación (artrópodos)']],
    // 6  Pinzón Azafrán                 (Sicalis flaveola)
    6  => [['grama.jpg',                                'Forrajeo, Alimentación (semillas)'],
           ['chiminango.jpg',                           'Forrajeo, Percha, Alimentación (artrópodos)']],
    // 8  Semillero Pardo                (Asemospiza obscura)
    8  => [['grama.jpg',                                'Forrajeo, Alimentación (semillas)']],
    // 9  Sirirí Rayado                   (Myiodynastes maculatus)
    9  => [['ficus-benjamina.jpg',                     'Forrajeo, Alimentación (frutos)']],
    // 21 Eufonía Violácea                (Euphonia violacea)
    21 => [['mango.jpg',                                'Alimentación (fruto), Forrajeo']],
    // 24 Azulejo                         (Thraupis episcopus)
    24 => [['chiminango.jpg',                           'Forrajeo, Alimentación (artrópodos)']],
    // 25 Mielero Común                   (Coereba flaveola)
    25 => [['chiminango.jpg',                           'Forrajeo, Alimentación (néctar)'],
           ['ixora.jpg',                                'Forrajeo, Alimentación (néctar)']],
    // 26 Picabuey                        (Machetornis rixosa)
    26 => [['grama.jpg',                                'Forrajeo, Alimentación (artrópodos)']],
    // 27 Sinsonte Tropical               (Mimus gilvus)
    27 => [['grama.jpg',                                'Forrajeo, Alimentación (artrópodos)']],
    // 4  Colibrí de Cola Rojiza          (Amazilia tzacatl)
    4  => [['ixora.jpg',                                'Forrajeo, Alimentación (néctar)'],
           ['achira.jpg',                               'Forrajeo, Alimentación (néctar)']],
    // 13 Carpintero Real                 (Dryocopus lineatus)
    //    En el doc solo se asocia al Saman (DRYOCOPUS LINEATUS).
    13 => [['saman.jpg',                                'Forrajeo, Anidación']],
    // 23 Carpintero Pechipunteado        (Colaptes punctigula)
    23 => [['chiminango.jpg',                           'Forrajeo, Anidación']],
    // 7  Tortolita Rojiza                 (Columbina talpacoti)
    7  => [['grama.jpg',                                'Forrajeo, Alimentación (semillas)']],
    // 20 Chimachima                       (Daptrius chimachima)
    20 => [['saman.jpg',                                 'Anidación'],
           ['palma-real.jpg',                           'Percha']],
    // 11 Caracara Crestado                (Caracara plancus)
    11 => [['ficus-benjamina.jpg',                      'Percha']],
    // 14 Gavilán Caminero                 (Rupornis magnirostris)
    14 => [['oiti.jpg',                                 'Percha']],
    // 19 Garrapatero Piquiliso            (Crotophaga ani)
    19 => [['chiminango.jpg',                           'Percha'],
           ['grama.jpg',                                'Forrajeo, Alimentación (artrópodos)']],
    // 18 Cuco Ardilla                      (Piaya cayana)
    18 => [['chiminango.jpg',                           'Percha']],
    // 22 Tero                              (Vanellus chilensis)
    22 => [['grama.jpg',                                'Forrajeo, Alimentación (artrópodos)']],
];

/* Otros árboles que aparecieron con foto pero no se mencionan en el doc
 * (naranja-agria, marañón, urapo, buganvilla) los dejamos sin relaciones
 * para no inventar datos. Aparecerán con su ficha descriptiva pero el
 * bloque "Aves que utilizan este árbol" mostrará el mensaje vacío.
 *
 * El script no rompe si algún árbol no tiene relaciones.
 */

/* --------------------------------------------------------------
 * 3) Construcción de un índice "archivo => id_arbol" tras insertar.
 * -------------------------------------------------------------- */
mysqli_query($conexion, "SET FOREIGN_KEY_CHECKS = 0");
mysqli_query($conexion, "TRUNCATE TABLE arboles_aves");
mysqli_query($conexion, "TRUNCATE TABLE arboles");
mysqli_query($conexion, "SET FOREIGN_KEY_CHECKS = 1");

$stmtArbol = mysqli_prepare($conexion,
    "INSERT INTO arboles
        (nombre_comun, nombre_cientifico, familia, descripcion, ruta, orden)
     VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmtArbol, 'sssssi',
    $comun, $cientifico, $familia, $descripcion, $ruta, $orden);

$ordenArbol = 1;
$archivo_a_id = [];

foreach ($catalogo as $c) {
    $comun       = $c['comun'];
    $cientifico  = $c['cientifico'];
    $familia     = $c['familia'];
    $descripcion = $c['descripcion'];
    $ruta        = 'Imagenes/arboles/' . rawurlencode($c['archivo']);
    $orden       = $ordenArbol;

    mysqli_stmt_execute($stmtArbol);
    $inserted_id = mysqli_insert_id($conexion);
    $archivo_a_id[$c['archivo']] = $inserted_id;

    $ordenArbol++;
}
mysqli_stmt_close($stmtArbol);

/* --------------------------------------------------------------
 * 4) Inserción de las relaciones arboles_aves.
 *    Se usa el índice $archivo_a_id para localizar el id_arbol.
 * -------------------------------------------------------------- */
$stmtRel = mysqli_prepare($conexion,
    "INSERT INTO arboles_aves (id_arbol, id_aves, usos) VALUES (?, ?, ?)
     ON DUPLICATE KEY UPDATE usos = VALUES(usos)");
mysqli_stmt_bind_param($stmtRel, 'iis', $id_arbol, $id_aves, $usos);

$totalRel = 0;
foreach ($aves_map as $id_aves => $listaArboles) {
    foreach ($listaArboles as [$archivo, $usosStr]) {
        if (!isset($archivo_a_id[$archivo])) {
            // árbol no está en el catálogo; lo saltamos silenciosamente
            continue;
        }
        $id_arbol = $archivo_a_id[$archivo];
        $usos     = $usosStr;
        mysqli_stmt_execute($stmtRel);
        $totalRel++;
    }
}
mysqli_stmt_close($stmtRel);

/* --------------------------------------------------------------
 * 5) Resumen final.
 * -------------------------------------------------------------- */
header('Content-Type: text/html; charset=utf-8');

$no_arboles = (int)mysqli_fetch_assoc(
    mysqli_query($conexion, "SELECT COUNT(*) n FROM arboles"))['n'];
$no_relaciones = (int)mysqli_fetch_assoc(
    mysqli_query($conexion, "SELECT COUNT(*) n FROM arboles_aves"))['n'];

echo "<!DOCTYPE html><html lang='es'><head><meta charset='UTF-8'>"
   . "<title>Poblador de árboles</title>"
   . "<style>
        body{font-family:'Roboto Slab',serif;max-width:920px;margin:40px auto;padding:0 24px;color:#1F1B1C;line-height:1.6}
        h1{color:#D30F23;border-bottom:3px solid #D30F23;padding-bottom:8px}
        .ok{background:#F2F0F1;border-left:5px solid #D30F23;padding:14px 18px;border-radius:8px;margin:18px 0;font-size:1.1rem}
        a.btn{display:inline-block;margin-top:18px;background:linear-gradient(135deg,#A30B1B,#D30F23);color:#fff;padding:12px 22px;border-radius:10px;text-decoration:none;font-weight:700}
      </style></head><body>";

echo "<h1>Poblador de árboles</h1>";
echo "<div class='ok'>Árboles insertados: <strong>$no_arboles</strong> · "
   . "Relaciones ave-árbol: <strong>$no_relaciones</strong></div>";

// Listado resumido
$res = mysqli_query($conexion,
   "SELECT a.id_arbol, a.nombre_comun, a.nombre_cientifico, a.familia,
           COUNT(r.id_aves) AS n_aves
    FROM arboles a
    LEFT JOIN arboles_aves r ON r.id_arbol = a.id_arbol
    GROUP BY a.id_arbol
    ORDER BY a.orden");
echo "<table style='width:100%;border-collapse:collapse;font-size:.88rem;margin-top:14px'>";
echo "<tr style='background:#A30B1B;color:#fff'>"
   . "<th style='padding:8px;text-align:left'>#</th>"
   . "<th style='padding:8px;text-align:left'>Nombre común</th>"
   . "<th style='padding:8px;text-align:left'>Nombre científico</th>"
   . "<th style='padding:8px;text-align:left'>Familia</th>"
   . "<th style='padding:8px;text-align:right'>Aves</th></tr>";
$row_alt = 0;
while ($fila = mysqli_fetch_assoc($res)) {
    $bg = ($row_alt++ % 2) ? '#F2F0F1' : '#ffffff';
    echo "<tr style='background:$bg'>";
    echo "<td style='padding:6px 10px'>" . (int)$fila['id_arbol'] . "</td>";
    echo "<td style='padding:6px 10px'>" . htmlspecialchars($fila['nombre_comun'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td style='padding:6px 10px;font-style:italic'>" . htmlspecialchars($fila['nombre_cientifico'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td style='padding:6px 10px'>" . htmlspecialchars($fila['familia'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td style='padding:6px 10px;text-align:right'>" . (int)$fila['n_aves'] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a class='btn' href='arboles.php'>Ver módulo de árboles</a>";
echo "</body></html>";
?>
