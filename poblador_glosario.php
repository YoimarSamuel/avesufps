<?php
/**
 * poblador_glosario.php
 * ------------------------------------------------------------------
 * Script de un solo uso:Lee las carpetas de Imagenes/glosario/<categoria>,
 * normaliza el nombre visible de cada imagen (sustituye guiones por
 * espacios, añade tildes y eñe según la RAE y deja la primera palabra
 * en mayúscula) e inserta los registros en la tabla glosario.
 *
 * USO:  http://localhost/aves-ufps/poblador_glosario.php
 *       (solo una vez; al final muestra un resumen del volcado)
 * ------------------------------------------------------------------
 */

include 'conexion.php';

mysqli_set_charset($conexion, "utf8mb4");

/* --------------------------------------------------------------
 * 1) Diccionario de sustitución RAE.
 *    Clave   = forma sin tilde que aparece en el nombre del archivo.
 *    Valor   = forma correcta según la RAE (con tilde / ñ).
 *    Se aplica a palabras individuales (en minúsculas).
 * -------------------------------------------------------------- */
$diccionarioRae = [
    /* --- a / con tilde o diéresis --- */
    'alimentacion' => 'alimentación',
    'anatomia'     => 'anatomía',
    'arboreo'      => 'arbóreo',
    'arbol'        => 'árbol',
    'area'         => 'área',
    'artropodo'    => 'artrópodo',
    /* --- c --- */
    'carnivoro'    => 'carnívoro',
    'carronya'     => 'carroña',
    'carronyero'   => 'carroñero',
    'categoria'    => 'categoría',
    'cientifico'   => 'científico',
    'clasificacion'=> 'clasificación',
    'comun'        => 'común',
    'conservacion' => 'conservación',
    'cria'         => 'cría',
    'cucuta'       => 'cúcuta',
    /* --- e --- */
    'ecologico'    => 'ecológico',
    'espolon'      => 'espolón',
    'etologia'     => 'etología',
    /* --- f --- */
    'frugivoro'    => 'frugívoro',
    /* --- g --- */
    'genero'       => 'género',
    'granivoro'    => 'granívoro',
    /* --- i --- */
    'incubacion'   => 'incubación',
    'insectivoro'  => 'insectívoro',
    'intervenida'  => 'intervenida',
    /* --- m --- */
    'monogamo'     => 'monógamo',
    'morfologia'   => 'morfología',
    /* --- n --- */
    'nectar'       => 'néctar',
    'nectarivoro'  => 'nectarívoro',
    'nidificacion' => 'nidificación',
    'nomenclatura' => 'nomenclatura',
    'nucleo'       => 'núcleo',
    /* --- o --- */
    'olivaceo'     => 'oliváceo',
    'omnivoro'     => 'omnívoro',
    /* --- p --- */
    'preocupacion' => 'preocupación',
    'periodo'      => 'período',
    /* --- r --- */
    'rigida'       => 'rígida',
    'riberena'     => 'ribereña',
    /* --- t --- */
    'taxonomia'    => 'taxonomía',
    'termino'      => 'término',
    /* --- l --- */
    'linea'        => 'línea',
    /* --- d --- */
    'distribucion' => 'distribución',
    /* --- h --- */
    'habitat'      => 'hábitat',
    /* --- v --- */
    'vocalizacion' => 'vocalización',
    /* --- La palabra "sabana" se mantiene SIN tilde (sabana = llanura)
           y no se incluye en el diccionario para dejarla igual. --- */
];

/* --------------------------------------------------------------
 * 2) Mapa carpeta -> nombre visible de la categoría.
 * -------------------------------------------------------------- */
$categorias = [
    'alimentacion'             => 'Alimentación',
    'anatomia'                 => 'Anatomía',
    'comportamiento'           => 'Comportamiento',
    'conservacion'             => 'Conservación',
    'habitat'                  => 'Hábitat',
    'taxonomia y clasificacion'=> 'Taxonomía y clasificación',
];

/* --------------------------------------------------------------
 * 3) Función de normalización de un nombre de archivo a la RAE.
 *    - Quita la extensión .jpg
 *    - Reemplaza guiones por espacios (admite guion medio y bajo)
 *    - Aplica el diccionario RAE palabra por palabra
 *    - Pasa la primera letra de la frase a mayúscula (estilo título RAE)
 * -------------------------------------------------------------- */
function normalizarNombreRae(string $archivo, array $diccionario): string {
    // 1. Quitar extensión
    $base = preg_replace('/\.[^.]+$/', '', $archivo);
    // 2. Reemplazar separadores (-, _, .) por un espacio simple
    $base = preg_replace('/[-_.]+/', ' ', $base);
    // 3. Pasar todo a minúsculas y recortar
    $base = mb_strtolower(trim($base), 'UTF-8');
    // 4. Trocear en palabras
    $palabras = preg_split('/\s+/', $base);
    // 5. Sustituir cada palabra por su forma RAE (si existe en el diccionario)
    $norm = [];
    foreach ($palabras as $p) {
        if ($p === '') continue;
        $norm[] = $diccionario[$p] ?? $p; // si no está, se deja igual
    }
    // 6. Unir y capitalizar la primera letra de la frase (estilo título RAE español)
    $frase = implode(' ', $norm);
    $frase = mb_convert_case($frase, MB_CASE_TITLE, 'UTF-8');
    // 7. La primera palabra en mayúscula; el resto en minúscula,
    //    salvo nombres propios detectables. Aquí optamos por estilo oración:
    //    sólo la primera letra mayúscula.
    if ($frase !== '') {
        $first = mb_substr($frase, 0, 1, 'UTF-8');
        $rest  = mb_substr($frase, 1, null, 'UTF-8');
        $frase = mb_strtoupper($first, 'UTF-8') . mb_strtolower($rest, 'UTF-8');
    }
    return $frase;
}

/* --------------------------------------------------------------
 * 4) Limpieza previa de la tabla.
 * -------------------------------------------------------------- */
mysqli_query($conexion, "TRUNCATE TABLE glosario");

/* --------------------------------------------------------------
 * 5) Recorrido de carpetas y volcado.
 * -------------------------------------------------------------- */
$baseDir   = __DIR__ . DIRECTORY_SEPARATOR . 'Imagenes' . DIRECTORY_SEPARATOR . 'glosario';
$relBase   = 'Imagenes/glosario'; // prefijo de la ruta guardada en BD
$total     = 0;
$reporte   = [];

// Sentencia preparada:  INSERT INTO glosario (categoria, nombre, ruta, orden) VALUES (?,?,?,?)
$stmt = mysqli_prepare($conexion,
    "INSERT INTO glosario (categoria, nombre, ruta, orden) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    die("No se pudo preparar la consulta: " . mysqli_error($conexion));
}
mysqli_stmt_bind_param($stmt, 'sssi', $cat_vis, $nombre_vis, $ruta_vis, $orden_vis);

foreach ($categorias as $carpeta => $cat_vis) {
    $dir = $baseDir . DIRECTORY_SEPARATOR . $carpeta;
    if (!is_dir($dir)) {
        $reporte[] = "Carpeta no encontrada: $dir";
        continue;
    }

    // Listar imágenes (.jpg, .jpeg, .png, .webp)
    $archivos = [];
    foreach (scandir($dir) as $f) {
        if ($f === '.' || $f === '..') continue;
        $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg','jpeg','png','webp'], true)) {
            $archivos[] = $f;
        }
    }

    // Orden alfabético por nombre ya normalizado
    usort($archivos, function($a, $b) use ($diccionarioRae) {
        return strcmp(
            mb_strtolower(normalizarNombreRae($a, $diccionarioRae), 'UTF-8'),
            mb_strtolower(normalizarNombreRae($b, $diccionarioRae), 'UTF-8')
        );
    });

    $orden = 1;
    foreach ($archivos as $archivo) {
        $nombre_vis = normalizarNombreRae($archivo, $diccionarioRae);
        // Construir la ruta relativa guardada en BD
        $ruta_vis = $relBase . '/' . rawurlencode($carpeta) . '/' . rawurlencode($archivo);
        $orden_vis = $orden;

        mysqli_stmt_execute($stmt);
        $total++;
        $reporte[] = sprintf("[%s] %2d. %-30s  ->  %s",
            $cat_vis, $orden, $nombre_vis, $ruta_vis);
        $orden++;
    }
}
mysqli_stmt_close($stmt);

/* --------------------------------------------------------------
 * 6) Resumen final.
 * -------------------------------------------------------------- */
header('Content-Type: text/html; charset=utf-8');
echo "<!DOCTYPE html><html lang='es'><head><meta charset='UTF-8'>"
   . "<title>Poblador del glosario</title>"
   . "<style>
        body{font-family:'Roboto Slab',serif;max-width:920px;margin:40px auto;padding:0 24px;color:#1F1B1C;line-height:1.6}
        h1{color:#D30F23;border-bottom:3px solid #D30F23;padding-bottom:8px}
        .ok{background:#F2F0F1;border-left:5px solid #D30F23;padding:14px 18px;border-radius:8px;margin:18px 0;font-size:1.1rem}
        pre{background:#1F1B1C;color:#F2F0F1;padding:18px;border-radius:8px;overflow:auto;font-size:.85rem;line-height:1.4}
        a.btn{display:inline-block;margin-top:18px;background:linear-gradient(135deg,#A30B1B,#D30F23);color:#fff;padding:12px 22px;border-radius:10px;text-decoration:none;font-weight:700}
      </style></head><body>";

echo "<h1>Poblador del glosario</h1>";
echo "<div class='ok'>Registros insertados: <strong>$total</strong></div>";
echo "<pre>" . htmlspecialchars(implode("\n", $reporte), ENT_QUOTES, 'UTF-8') . "</pre>";
echo "<a class='btn' href='glosario.php'>Ver glosario</a>";
echo "</body></html>";
?>
