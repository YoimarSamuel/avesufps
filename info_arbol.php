<?php
/**
 * info_arbol.php
 * ------------------------------------------------------------------
 * Ficha individual de un árbol o planta del campus UFPS, con el estilo
 * visual de descripcion.php (la ficha técnica de un ave).
 *
 * Estructura:
 *   - Hero rojo con flechas ← / → (árbol anterior / siguiente) y el
 *     nombre común + científico del árbol.
 *   - Grid superior:
 *       · Galería (foto grande del árbol).
 *       · Tarjeta "Ficha botánica" con familia y clasificación.
 *   - Sección media "Descripción": descripción ecológica del árbol.
 *   - Sección inferior "Aves que utilizan este árbol": grid de aves
 *     que aparece en arboles_aves, cada una con sus chips de usos y
 *     enlace a descripcion.php (ficha técnica del ave).
 *
 * Codificación: UTF-8 (tildes, ñ, ×).
 * ------------------------------------------------------------------
 */

header('Content-Type: text/html; charset=utf-8');
include 'conexion.php';

mysqli_set_charset($conexion, "utf8mb4");

/* --------------------------------------------------------------
 * 1) Cargar el árbol solicitado.
 * -------------------------------------------------------------- */
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int) mysqli_real_escape_string($conexion, $_GET['id']);

    $q = "SELECT * FROM arboles WHERE id_arbol = $id";
    $res = mysqli_query($conexion, $q);
    $arbol = mysqli_fetch_assoc($res);

    if (!$arbol) {
        header("Location: arboles.php");
        exit();
    }
} else {
    header("Location: arboles.php");
    exit();
}

/* --------------------------------------------------------------
 * 2) Árbol anterior / siguiente (según el campo orden).
 * -------------------------------------------------------------- */
$orden_actual = (int) $arbol['orden'];

$res_prev = mysqli_query($conexion,
    "SELECT id_arbol FROM arboles
     WHERE orden < $orden_actual
     ORDER BY orden DESC LIMIT 1");
$arbol_prev = mysqli_fetch_assoc($res_prev);

$res_next = mysqli_query($conexion,
    "SELECT id_arbol FROM arboles
     WHERE orden > $orden_actual
     ORDER BY orden ASC LIMIT 1");
$arbol_next = mysqli_fetch_assoc($res_next);

/* --------------------------------------------------------------
 * 3) Aves que utilizan este árbol (relación N:M).
 * -------------------------------------------------------------- */
$aves = [];
$stmt = mysqli_prepare($conexion,
    "SELECT a.id_aves, a.nombre_ave, a.nombre_cientifico, a.foto_ave,
            r.usos
     FROM arboles_aves r
     JOIN aves a ON a.id_aves = r.id_aves
     WHERE r.id_arbol = ?
     ORDER BY a.id_aves ASC");
if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $r = mysqli_stmt_get_result($stmt);
    while ($f = mysqli_fetch_assoc($r)) {
        $aves[] = $f;
    }
    mysqli_stmt_close($stmt);
}

/* --------------------------------------------------------------
 * 4) Helpers (idénticos a los de descripcion.php).
 * -------------------------------------------------------------- */
function e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

function rutaFotoAve($foto) {
    if (empty($foto)) return 'Imagenes/aves/default.png';
    if (preg_match('~^(?:f|ht)tps?://~i', $foto)) return $foto;
    return 'Imagenes/aves/' . $foto;
}

function chipsUsos($usosStr) {
    $items = array_map('trim', explode(',', $usosStr));
    $html = '';
    foreach ($items as $u) {
        if ($u === '') continue;
        $html .= '<span class="convencion-item">'
               .  e(ucfirst(mb_strtolower($u, 'UTF-8')))
               .  '</span>';
    }
    return $html;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Imagenes/logo.png" type="image/png">
    <link rel='stylesheet' id='google-fonts-1-css'
          href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C400%2C700%7CRoboto+Slab%3A400%2C700%7COpen+Sans%3A400%2C600&display=swap'
          media='all' />
    <title><?php echo e($arbol['nombre_comun']); ?> - Aves UFPS</title>

    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/info_arbol.css">
    <link rel="stylesheet" href="styles/footer.css">
</head>
<body>

    <?php include "includes/header.php"; ?>

    <!-- ============== HERO ============== -->
    <header class="hero-ave">
        <?php if ($arbol_prev): ?>
            <a href="info_arbol.php?id=<?php echo (int)$arbol_prev['id_arbol']; ?>"
               class="hero-flecha" aria-label="Árbol anterior">&lsaquo;</a>
        <?php else: ?>
            <span class="hero-flecha disabled" aria-hidden="true">&lsaquo;</span>
        <?php endif; ?>

        <div class="hero-info">
            <h1><?php echo e($arbol['nombre_comun']); ?></h1>
            <span class="hero-cientifico">
                (<em><?php echo e($arbol['nombre_cientifico'] ?? ''); ?></em>)
            </span>
        </div>

        <?php if ($arbol_next): ?>
            <a href="info_arbol.php?id=<?php echo (int)$arbol_next['id_arbol']; ?>"
               class="hero-flecha" aria-label="Árbol siguiente">&rsaquo;</a>
        <?php else: ?>
            <span class="hero-flecha disabled" aria-hidden="true">&rsaquo;</span>
        <?php endif; ?>
    </header>

    <div class="contenedor-pagina">

        <!-- ============== GRID SUPERIOR: GALERÍA + FICHA BOTÁNICA ============== -->
        <div class="grid-superior">

            <!-- Galería -->
            <div class="tarjeta">
                <div class="galeria-imagen-principal">
                    <img id="mainBirdImg"
                         src="<?php echo e($arbol['ruta']); ?>"
                         alt="<?php echo e($arbol['nombre_comun']); ?>">
                    <span class="badge-ubicacion">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                             stroke="#fff" stroke-width="2.4" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M12 2l3 6h-3v6h3l-3 6-3-6h3V8H9z"/>
                        </svg>
                        UFPS - Cúcuta
                    </span>
                </div>
            </div>

            <!-- Ficha botánica -->
            <div class="tarjeta">
                <div class="cabecera-tarjeta">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                         stroke="#D30F23" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M12 2 C7 4, 4 9, 6 14 C8 13, 10 13, 12 14"/>
                        <path d="M12 2 C17 4, 20 9, 18 14 C16 13, 14 13, 12 14"/>
                        <path d="M12 14 L12 22"/>
                    </svg>
                    <h2>Ficha botánica</h2>
                </div>

                <ul class="lista-taxonomia">
                    <li>
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"
                             stroke="#D30F23" stroke-width="1.8" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M3 21V8l4-3 4 3v13"/>
                            <path d="M11 21v-6a4 4 0 0 1 4-4h3a3 3 0 0 1 3 3v7"/>
                            <path d="M3 21h18"/>
                        </svg>
                        <span class="clave">Familia:</span>
                        <span class="valor"><?php echo e($arbol['familia'] ?? 'No registrada'); ?></span>
                    </li>
                    <li>
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"
                             stroke="#D30F23" stroke-width="1.8" stroke-linecap="round"
                             stroke-linejoin="round">
                            <circle cx="9" cy="9" r="5"/>
                            <path d="M13 13l8 8"/>
                        </svg>
                        <span class="clave">Nombre común:</span>
                        <span class="valor"><?php echo e($arbol['nombre_comun']); ?></span>
                    </li>
                    <li>
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"
                             stroke="#D30F23" stroke-width="1.8" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M4 4h16v16H4z"/>
                            <path d="M8 8h8M8 12h8M8 16h5"/>
                        </svg>
                        <span class="clave">Científico:</span>
                        <span class="valor italica"><?php echo e($arbol['nombre_cientifico'] ?? ''); ?></span>
                    </li>
                </ul>

                <p class="fuente-tarjeta">
                    Fuente: observación directa en campo y documento
                    <em>Vegetación y recursos del hábitat</em>.
                </p>
            </div>
        </div>

        <!-- ============== SECCIÓN DESCRIPCIÓN ============== -->
        <div class="titulo-seccion">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none"
                 stroke="#D30F23" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round">
                <path d="M12 2 C7 4, 4 9, 6 14 C8 13, 10 13, 12 14"/>
                <path d="M12 2 C17 4, 20 9, 18 14 C16 13, 14 13, 12 14"/>
                <path d="M12 14 L12 22"/>
            </svg>
            <h2>Descripción ecológica</h2>
        </div>

        <div class="tarjeta">
            <p><?php echo e($arbol['descripcion'] ?? 'Sin descripción disponible.'); ?></p>
        </div>

        <!-- ============== AVES QUE UTILIZAN EL ÁRBOL ============== -->
        <div class="titulo-seccion">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none"
                 stroke="#D30F23" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round">
                <path d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
                <path d="M3 21c0-4 4-7 9-7s9 3 9 7"/>
            </svg>
            <h2>Aves que utilizan este árbol</h2>
        </div>

        <?php if (!empty($aves)): ?>
            <div class="grid-aves-arbol">
                <?php foreach ($aves as $ave):
                    $foto = rutaFotoAve($ave['foto_ave']);
                ?>
                    <div class="ave-card">
                        <div class="galeria-imagen-principal">
                            <img src="<?php echo e($foto); ?>"
                                 alt="<?php echo e($ave['nombre_ave']); ?>"
                                 class="ave-imagen">
                            <span class="badge-ubicacion">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none"
                                     stroke="#fff" stroke-width="2.4" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0Z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                                <?php echo e($arbol['nombre_comun']); ?>
                            </span>
                        </div>
                        <div class="ave-info">
                            <h3><?php echo e($ave['nombre_ave']); ?></h3>
                            <span class="nombre-cientifico"><?php echo e($ave['nombre_cientifico']); ?></span>
                            <div class="convenciones-container">
                                <h4>Usos que el ave da al árbol</h4>
                                <div class="lista-convenciones">
                                    <?php echo chipsUsos($ave['usos']); ?>
                                </div>
                            </div>
                            <a href="descripcion.php?id=<?php echo (int)$ave['id_aves']; ?>" class="btn-mas">
                                VER FICHA TÉCNICA
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="tarjeta" style="text-align:center;padding:40px;color:var(--gris-texto);">
                No hay aves registradas para este árbol en el documento
                <em>Vegetación y recursos del hábitat</em>.
            </div>
        <?php endif; ?>

    </div>

    <?php include "includes/footer.php"; ?>

    <script src="scripts/info_arbol.js"></script>
</body>
</html>
