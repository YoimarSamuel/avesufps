<?php
include 'conexion.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conexion, $_GET['id']);

    $query = "SELECT * FROM aves WHERE id_aves = '$id'";
    $resultado = mysqli_query($conexion, $query);
    $ave = mysqli_fetch_array($resultado);

    if (!$ave) {
        header("Location: catalogo.php");
        exit();
    }
    
} else {
    header("Location: catalogo.php");
    exit();
}

function obtenerRutaImagen($ruta) {
    if (empty($ruta)) {
        return "Imagenes/aves/default.png"; 
    }
    if (!preg_match("~^(?:f|ht)tps?://~i", $ruta)) {
        return "Imagenes/aves/" . $ruta;
    }
    return $ruta;
}

function extraerTaxonomia($tax_str) {
    $claves = ['Reino','Filo','Subfilo','Clase','Orden','Familia','Genero','Especie'];
    $datos = [];
    foreach ($claves as $c) {
        if (preg_match('/\b' . preg_quote($c, '/') . '\s*:\s*([^,]+)/i', $tax_str, $m)) {
            $datos[$c] = trim($m[1]);
        }
    }
    return $datos;
}

$taxonomia = extraerTaxonomia($ave['taxonomia_ave']);

$orden_actual = isset($ave['orden_ave']) ? (int)$ave['orden_ave'] : 0;

$query_prev = "SELECT id_aves FROM aves WHERE orden_ave < '$orden_actual' ORDER BY orden_ave DESC LIMIT 1";
$res_prev = mysqli_query($conexion, $query_prev);
$ave_prev = mysqli_fetch_assoc($res_prev);

$query_next = "SELECT id_aves FROM aves WHERE orden_ave > '$orden_actual' ORDER BY orden_ave ASC LIMIT 1";
$res_next = mysqli_query($conexion, $query_next);
$ave_next = mysqli_fetch_assoc($res_next);

// Zona / hábitat del ave (para el video del nicho)
$zona_nombre = 'Zona UFPS';
$zona_video  = '';
$zona_id     = '';
$query_zona = "SELECT h.id_habitad, h.nombre_habitad, h.link_habitad FROM habitad h
               WHERE FIND_IN_SET('$id', REPLACE(h.aves_habitad, ' ', '')) > 0
               ORDER BY h.id_habitad ASC LIMIT 1";
$res_zona = mysqli_query($conexion, $query_zona);
if ($res_zona && $zona = mysqli_fetch_assoc($res_zona)) {
    $zona_nombre = 'Zona ' . $zona['nombre_habitad'];
    $zona_video  = $zona['link_habitad'];
    $zona_id     = $zona['id_habitad'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Imagenes/logo.png" type="image/png">
    <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C400%2C700%7CRoboto+Slab%3A400%2C700%7COpen+Sans%3A400%2C600&display=swap' media='all' />
    <title><?php echo $ave['nombre_ave']; ?> - Catálogo de Aves UFPS</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/descripcion.css">
    <link rel="stylesheet" href="styles/footer.css">
</head>
<body>

    <?php include "includes/header.php" ?>

    <header class="hero-ave">
        <?php if ($ave_prev): ?>
            <a href="descripcion.php?id=<?php echo $ave_prev['id_aves']; ?>" class="hero-flecha">&lsaquo;</a>
        <?php else: ?>
            <span class="hero-flecha disabled">&lsaquo;</span>
        <?php endif; ?>

        <div class="hero-info">
            <h1><?php echo $ave['nombre_ave']; ?></h1>
            <span class="hero-cientifico">
                (<em><?php echo $ave['nombre_cientifico']; ?></em>)
            </span>
        </div>

        <?php if ($ave_next): ?>
            <a href="descripcion.php?id=<?php echo $ave_next['id_aves']; ?>" class="hero-flecha">&rsaquo;</a>
        <?php else: ?>
            <span class="hero-flecha disabled">&rsaquo;</span>
        <?php endif; ?>
    </header>

    <div class="contenedor-pagina">
        <div class="grid-superior">

            <!-- Galería -->

            <div class="tarjeta">
                <div class="galeria-imagen-principal">
                    <img id="mainBirdImg" src="<?php echo obtenerRutaImagen($ave['foto_ave']); ?>" alt="<?php echo $ave['nombre_ave']; ?>">
                    <span class="badge-ubicacion">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>
                        </svg>
                        UFPS - Cúcuta
                    </span>
                </div>
                <div class="galeria-miniaturas">
                    <img src="<?php echo obtenerRutaImagen($ave['foto_ave']); ?>" onclick="changeImage(this.src)" alt="Foto 1">
                    <?php if(!empty($ave['foto2_ave'])): ?>
                        <img src="<?php echo obtenerRutaImagen($ave['foto2_ave']); ?>" onclick="changeImage(this.src)" alt="Foto 2">
                    <?php endif; ?>
                    <?php if(!empty($ave['foto3_ave'])): ?>
                        <img src="<?php echo obtenerRutaImagen($ave['foto3_ave']); ?>" onclick="changeImage(this.src)" alt="Foto 3">
                    <?php endif; ?>
                    <?php if(!empty($ave['foto4_ave'])): ?>
                        <img src="<?php echo obtenerRutaImagen($ave['foto4_ave']); ?>" onclick="changeImage(this.src)" alt="Foto 4">
                    <?php endif; ?>
                </div>
            </div>

            <!-- Taxonomía -->

            <div class="tarjeta">
                <div class="cabecera-tarjeta">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#D30F23" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                    <h2>Taxonomía</h2>
                </div>

                <ul class="lista-taxonomia">
                    <?php
                    $iconos_tax = [
                        'Reino'   => '<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3.5"/><path d="M3 12h18M12 3c2.5 2.6 2.5 15.4 0 18M12 3c-2.5 2.6-2.5 15.4 0 18"/>',
                        'Filo'    => '<path d="M6 3v18M6 3l4 4M6 7l4 4M6 11l4 4M6 15l4 4"/><path d="M18 3v18M18 3l-4 4M18 7l-4 4M18 11l-4 4M18 15l-4 4"/>',
                        'Subfilo' => '<path d="M12 3v18"/><path d="M8 7l8 4M8 11l8 4M8 15l8 4"/>',
                        'Clase'   => '<path d="M12 3 3 7l9 4 9-4-9-4Z"/><path d="M3 12l9 4 9-4"/><path d="M3 17l9 4 9-4"/>',
                        'Orden'   => '<path d="M8 6h13M8 12h13M8 18h13"/><path d="M3 6h.01M3 12h.01M3 18h.01"/>',
                        'Familia' => '<path d="M3 21V8l4-3 4 3v13"/><path d="M11 21v-6a4 4 0 0 1 4-4h3a3 3 0 0 1 3 3v7"/><path d="M3 21h18"/>',
                        'Genero'  => '<path d="M12 3v18M4 7l8-4 8 4"/><path d="M8 7v14M16 7v14"/>',
                        'Especie' => '<path d="M12 2a4 4 0 0 0-4 4v12a4 4 0 0 0 8 0V6a4 4 0 0 0-4-4Z"/><path d="M8 11h8"/>',
                    ];
                    $etiquetas_tax = [
                        'Reino' => 'Reino', 'Filo' => 'Filo', 'Subfilo' => 'Subfilo', 'Clase' => 'Clase',
                        'Orden' => 'Orden', 'Familia' => 'Familia', 'Genero' => 'Género', 'Especie' => 'Especie'
                    ];
                    $i = 0;
                    foreach ($taxonomia as $clave => $valor):
                        $i++;
                        $icono = isset($iconos_tax[$clave]) ? $iconos_tax[$clave] : $iconos_tax['Especie'];
                        $italica = ($clave == 'Especie');
                        $etiqueta = isset($etiquetas_tax[$clave]) ? $etiquetas_tax[$clave] : $clave;
                    ?>
                        <li>
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#D30F23" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?php echo $icono; ?></svg>
                            <span class="clave"><?php echo $etiqueta; ?>:</span>
                            <span class="valor<?php echo $italica ? ' italica' : ''; ?>"><?php echo htmlspecialchars($valor); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="controles">
                    <button id="btnReproductor" class="btn-pildora btn-audio" onclick="gestionarCanto('<?php echo $ave['sonido_ave']; ?>')">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 5L6 9H2v6h4l5 4V5z"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/>
                        </svg>
                        Vocalización
                    </button>
                </div>

                <div class="convenciones-container">
                    <h4>Información extra</h4>
                    <?php
                    $convenciones = explode(',', $ave['simbolo_ave']);
                    foreach ($convenciones as $item) {
                        $nombre_limpio = trim($item);
                        if (!empty($nombre_limpio)) {
                            $nombre_sin_extension = preg_replace('/\.ico$/i', '', $nombre_limpio);
                            $ruta_logo = "Logos/" . $nombre_limpio;
                            echo '<span class="convencion-item">';
                            if (file_exists($ruta_logo)) {
                                echo '<img src="' . $ruta_logo . '" alt="' . htmlspecialchars($nombre_sin_extension) . '" class="icono-convencion">';
                            } else {
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#d30f23" viewBox="0 0 256 256">
                                        <path d="M223.68,66.15,135.68,18a15.94,15.94,0,0,0-15.36,0l-88,48.18a16,16,0,0,0-8.32,14v95.64a16,16,0,0,0,8.32,14l88,48.17a15.88,15.88,0,0,0,15.36,0l88-48.17a16,16,0,0,0,8.32-14V80.18A16,16,0,0,0,223.68,66.15ZM168,152v50.09l-32,17.52V132.74l80-43.8v32l-43.84,24A8,8,0,0,0,168,152Zm-84.16-7L40,121v-32l80,43.8v86.87L88,202.09V152A8,8,0,0,0,83.84,145Zm-.7-88.41,41,22.45a8,8,0,0,0,7.68,0l41-22.45,34.48,18.87L128,118.88,48.66,75.44ZM128,32h0l28.2,15.44L128,62.89,99.8,47.45ZM40,139.22l32,17.52v36.59L40,175.82Zm144,54.11V156.74l32-17.52v36.6Z"></path>
                                      </svg>';
                            }
                            echo ' ' . htmlspecialchars($nombre_sin_extension) . '</span>';
                        }
                    }
                    ?>
                </div>

                <p class="fuente-tarjeta">Fuente: Información taxonómica complementada de BirdLife International (2024). Registro en UFPS: Trabajo de campo de la investigación, 2026.</p>
            </div>
        </div>

        <!-- ================= SECCION MEDIA: DISTRIBUCION ================= -->
        <div class="titulo-seccion">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#D30F23" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>
            </svg>
            <h2>Distribución y Hábitat</h2>
        </div>

        <div class="tarjeta-habitat">
            <div class="habitat-izq">
                <div class="habitat-nicho">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#D30F23" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="4" width="20" height="16" rx="3"/><path d="M10 9l6 3-6 3V9Z" fill="#D30F23" stroke="none"/>
                    </svg>
                    <span>Video del Nicho</span>
                </div>
                <p class="habitat-zona">
                    <?php
                    $zona_labels = [
                        1 => 'Rectoría (Z1)',
                        2 => 'CREAD (Z2)',
                        3 => 'Abanico (Z3)',
                        4 => 'Zona Central (Z4)',
                        5 => 'Aulas Orientales (Z5)',
                        6 => 'Aulas Orientales (Z5)',
                        7 => 'Aulas Orientales (Z5)',
                    ];
                    echo isset($zona_labels[$zona_id]) ? htmlspecialchars($zona_labels[$zona_id]) : htmlspecialchars($zona_nombre);
                    ?> &mdash; UFPS
                </p>
                <p class="habitat-descripcion"><?php echo $ave['habitat_ave']; ?></p>
                <a href="habitad.php?habitad=<?php echo urlencode($zona_id); ?>" class="btn-ubicacion">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>
                    </svg>
                    Ver ubicación
                </a>
                <p class="fuente-tarjeta" style="margin-top:10px;">Fuente de la distribución en campus: Trabajo de campo de la investigación, 2026. Información general de hábitat: BirdLife International (2024).</p>
            </div>
            <div class="habitat-der">
                <?php if (!empty($zona_video)): ?>
                    <video id="zonaVideo" src="<?php echo htmlspecialchars($zona_video); ?>" loop muted playsinline preload="metadata"></video>
                    <div class="play-overlay" id="playOverlay" onclick="toggleVideoZona()">
                        <div class="play-boton">
                            <svg width="30" height="30" viewBox="0 0 24 24" fill="#fff">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                    </div>
                <?php else: ?>
                    <div style="display:flex;align-items:center;justify-content:center;height:100%;color:#999;font-size:0.9rem;">Video no disponible</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- ================= SECCION INFERIOR ================= -->
        <div class="grid-inferior">
            <div class="tarjeta descripcion-tarjeta">
                <div class="cabecera-tarjeta">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#D30F23" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="7"/><path d="M21 21l-4.35-4.35"/>
                    </svg>
                    <h2>Descripción Morfológica</h2>
                </div>
                <p><?php echo $ave['morfologia_ave']; ?></p>
                <p class="fuente-tarjeta">Fuente: Descripción morfológica complementada de BirdLife International (2024). Observaciones en campo: Trabajo de campo de la investigación, 2026.</p>
            </div>

            <div class="tarjeta descripcion-tarjeta">
                <div class="cabecera-tarjeta">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#D30F23" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="9"/>
                        <circle cx="12" cy="12" r="2.5"/>
                        <path d="M12 9.5V6M12 18v-3M5 12h3M16 12h3"/>
                        <circle cx="8.5" cy="8.5" r="1"/><circle cx="15.5" cy="8.5" r="1"/>
                        <circle cx="8.5" cy="15.5" r="1"/><circle cx="15.5" cy="15.5" r="1"/>
                    </svg>
                    <h2>Descripción Etológica</h2>
                </div>
                <p><?php echo $ave['etologia_ave']; ?></p>
                <p class="fuente-tarjeta">Fuente: Información etológica complementada de BirdLife International (2024). Conductas observadas en campo: Trabajo de campo de la investigación, 2026.</p>
            </div>
        </div>

        <div id="reproductor-invisible" style="display:none;"></div>
    </div>

    <?php include "includes/footer.php" ?>

    <script src="scripts/descripcion.js"></script>

</body>
</html>