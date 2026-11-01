<?php 
include 'conexion.php'; 

// Obtener todos los hábitats
$query_habitads = "SELECT * FROM habitad ORDER BY id_habitad ASC";
$resultado_habitads = mysqli_query($conexion, $query_habitads);

// Almacenar todos los datos en arrays para el carrusel
$habitads = [];
$aves_por_habitad = [];

if (mysqli_num_rows($resultado_habitads) > 0) {
    while($habitad = mysqli_fetch_array($resultado_habitads)) {
        $id_habitad     = $habitad['id_habitad'];
        $nombre_habitad = $habitad['nombre_habitad'];
        $link_video     = $habitad['link_habitad'];
        $aves_ids_str   = trim($habitad['aves_habitad']);

        $ids_array = array_values(array_filter(array_map('intval', explode(',', $aves_ids_str))));
        $ids_limpios = implode(',', $ids_array);

        $aves_data = [];
        if (!empty($ids_limpios)) {
            $query_aves = "SELECT * FROM aves WHERE id_aves IN ($ids_limpios) ORDER BY FIELD(id_aves, $ids_limpios)";
            $resultado_aves = mysqli_query($conexion, $query_aves);
            if ($resultado_aves && mysqli_num_rows($resultado_aves) > 0) {
                while($ave = mysqli_fetch_array($resultado_aves)) {
                    $aves_data[] = $ave;
                }
            }
        }

        $habitads[] = array(
            'id' => $id_habitad,
            'nombre' => $nombre_habitad,
            'video' => $link_video,
            'aves' => $aves_data
        );
    }
}

// Índice inicial del carrusel (por defecto 0, o el hábitat solicitado por ?habitad=ID)
$indice_inicial = 0;
if (isset($_GET['habitad']) && !empty($_GET['habitad'])) {
    $habitad_objetivo = intval($_GET['habitad']);
    foreach ($habitads as $pos => $h) {
        if ($h['id'] == $habitad_objetivo) {
            $indice_inicial = $pos;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprende - Hábitats y Aves</title>
    <link rel="icon" href="Imagenes/logo.png" type="image/png">
    <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C400%2C700%7CRoboto+Slab%3A400%2C700%7COpen+Sans%3A400%2C600&display=swap' media='all' />

    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/habitad.css">
    <link rel="stylesheet" href="styles/footer.css">
</head>
<body data-indice-inicial="<?php echo (int)$indice_inicial; ?>">

    <?php include "includes/header.php" ?>

    <div class="contenedor-pagina">

        <?php if (empty($habitads)): ?>
            <div class="sin-aves" style="max-width:1200px;margin:0 auto 80px auto;">
                No hay hábitats registrados.
            </div>
        <?php else: ?>
            <?php 
            $total = count($habitads);
            for ($i = 0; $i < $total; $i++): 
                $hab = $habitads[$i];
            ?>
                <div class="carrusel-slide<?php echo $i === $indice_inicial ? ' active' : ''; ?>"
                     data-index="<?php echo $i; ?>">

                    <!-- Video -->
                    <div class="video-stage">
                        <div class="video-container">
                            <video class="habitat-video"
                                   id="video-<?php echo $hab['id']; ?>"
                                   data-src="<?php echo htmlspecialchars($hab['video'], ENT_QUOTES, 'UTF-8'); ?>"
                                   loop muted playsinline preload="auto"
                                   onerror="this.parentNode.querySelector('.video-fallback').style.display='flex'; this.style.display='none';">
                                <source src="<?php echo htmlspecialchars($hab['video'], ENT_QUOTES, 'UTF-8'); ?>" type="video/mp4">
                            </video>
                            <div id="video-fallback-<?php echo $hab['id']; ?>" class="video-fallback" style="display:none;">
                                <div class="video-fallback-content">
                                    <div class="video-fallback-icono">&#9888;</div>
                                    <h3>Video no disponible</h3>
                                    <p>El video de este hábitat no se puede reproducir.<br>
                                       Prueba recodificando el archivo a H.264 (MP4).</p>
                                </div>
                            </div>
                        </div>
                        <div class="video-overlay-title">
                            <h2 class="habitat-titulo">
                                <?php
                                $nombres_zonas = [
                                    1 => 'Rectoría <span class="zona-badge">Z1</span>',
                                    2 => 'CREAD <span class="zona-badge">Z2</span>',
                                    3 => 'Abanico <span class="zona-badge">Z3</span>',
                                    4 => 'Zona Central <span class="zona-badge">Z4</span>',
                                ];
                                if ($hab['id'] >= 5 && $hab['id'] <= 7) {
                                    echo 'Aulas Orientales <span class="zona-badge">Z5</span>';
                                } elseif (isset($nombres_zonas[$hab['id']])) {
                                    echo $nombres_zonas[$hab['id']];
                                } else {
                                    echo htmlspecialchars($hab['nombre']);
                                }
                                ?>
                            </h2>
                        </div>
                    </div>

                    <!-- Aves -->
                    <div class="contenido-aves-wrap">
                        <h3 class="aves-titulo">Aves de este hábitat</h3>

                        <?php if (!empty($hab['aves'])): ?>
                            <div class="contenedor-aves">
                                <?php foreach ($hab['aves'] as $ave): 
                                    $foto = $ave['foto_ave']; 
                                    if (!preg_match("~^(?:f|ht)tps?://~i", $foto)) {
                                        $foto = "Imagenes/aves/" . $foto; 
                                    }
                                ?>
                                    <div class="ave-card">
                                        <div class="galeria-imagen-principal">
                                            <img src="<?php echo htmlspecialchars($foto); ?>"
                                                 alt="<?php echo htmlspecialchars($ave['nombre_ave']); ?>"
                                                 class="ave-imagen">
                                            <span class="badge-habitat">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>
                                                </svg>
                                                UFPS - Cúcuta
                                            </span>
                                        </div>
                                        <div class="ave-info">
                                            <h2><?php echo htmlspecialchars($ave['nombre_ave']); ?></h2>
                                            <span class="nombre-cientifico">(<em><?php echo htmlspecialchars($ave['nombre_cientifico']); ?></em>)</span>
                                            <a href="descripcion.php?id=<?php echo $ave['id_aves']; ?>" class="btn-mas">
                                                VER FICHA TÉCNICA
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="sin-aves">No hay aves registradas para este hábitat.</div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endfor; ?>

        <?php endif; ?>

    </div><!-- /.contenedor-pagina -->

    <?php if (!empty($habitads)): ?>
    <!-- Flechas de navegación -->
    <button class="carrusel-flecha prev" aria-label="Hábitat anterior">&#10094;</button>
    <button class="carrusel-flecha next" aria-label="Hábitat siguiente">&#10095;</button>
    <?php endif; ?>

    <?php include 'includes/footer.php' ?>

    <script src="scripts/habitad.js"></script>
</body>
</html>
