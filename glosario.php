<?php
/**
 * glosario.php
 * ------------------------------------------------------------------
 * Glosario ilustrado del catálogo de aves UFPS.
 * Diseño minimalista y profesional.
 * ------------------------------------------------------------------
 */

header('Content-Type: text/html; charset=utf-8');
include 'conexion.php';

mysqli_set_charset($conexion, "utf8mb4");

/* --------------------------------------------------------------
 * 1) Búsqueda por texto (?buscar=...)
 * -------------------------------------------------------------- */
$busqueda = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';

/* --------------------------------------------------------------
 * 2) Recuperar los términos del glosario aplicando la búsqueda.
 * -------------------------------------------------------------- */
$terminos = [];
$whereClauses = [];
$params = [];
$types = '';

if ($busqueda !== '') {
    $whereClauses[] = "(nombre LIKE ? OR categoria LIKE ?)";
    $like = "%$busqueda%";
    $params[] = $like;
    $params[] = $like;
    $types .= 'ss';
}

$whereSql = $whereClauses ? 'WHERE ' . implode(' AND ', $whereClauses) : '';

$sql = "SELECT id_glosario, categoria, nombre, ruta
        FROM glosario
        $whereSql
        ORDER BY categoria ASC, orden ASC, nombre ASC";

$stmt = mysqli_prepare($conexion, $sql);
if ($stmt) {
    if ($params) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    while ($fila = mysqli_fetch_assoc($res)) {
        $terminos[] = $fila;
    }
    mysqli_stmt_close($stmt);
}

/* --------------------------------------------------------------
 * 3) Helper para escapar salida HTML.
 * -------------------------------------------------------------- */function e($s) {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

/* --------------------------------------------------------------
 * 4) Agrupar términos por categoría para la vista.
 * -------------------------------------------------------------- */
$grupos = [];
foreach ($terminos as $t) {
    $grupos[$t['categoria']][] = $t;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glosario - Aves UFPS</title>
    <link rel="icon" href="Imagenes/logo.png" type="image/png">
    <link rel='stylesheet' id='google-fonts-1-css'
          href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C400%2C700%7CRoboto+Slab%3A400%2C700%7COpen+Sans%3A400%2C600&display=swap'
          media='all' />
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/glosario.css">
    <link rel="stylesheet" href="styles/footer.css">
</head>
<body>

    <?php include "includes/header.php"; ?>

    <header class="hero-catalogo">
        <div class="hero-info">
            <h1>Glosario</h1>
            <p>Términos y conceptos clave del catálogo de aves UFPS</p>

            <!-- Buscador -->
            <form action="" method="GET" class="caja-buscador" role="search">
                <div class="buscador-fila">
                    <label for="buscar" class="visually-hidden">Buscar término</label>
                    <input type="search"
                           id="buscar"
                           name="buscar"
                           class="input-buscar"
                           placeholder="Buscar término…"
                           value="<?php echo e($busqueda); ?>">
                    <button type="submit" class="btn-buscar" aria-label="Buscar">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
                    </button>
                </div>
            </form>
        </div>
    </header>

    <main class="glosario-main">
        <?php if (empty($grupos)): ?>
            <section class="empty-state">
                <p>No hay términos que coincidan con la búsqueda.</p>
            </section>
        <?php else: ?>
            <?php foreach ($grupos as $cat => $items): ?>
                <section class="category-section" id="cat-<?php echo md5($cat); ?>">
                    <header class="category-header">
                        <h2><?php echo e($cat); ?></h2>
                        <span class="category-count"><?php echo count($items); ?> términos</span>
                    </header>
                    <div class="grid-glosario">
                        <?php foreach ($items as $i => $t): ?>
                            <article class="card"
                                     tabindex="0"
                                     role="button"
                                     aria-label="Ver imagen de <?php echo e($t['nombre']); ?>"
                                     data-src="<?php echo e($t['ruta']); ?>"
                                     data-nombre="<?php echo e($t['nombre']); ?>"
                                     data-categoria="<?php echo e($t['categoria']); ?>">
                                <div class="card-media">
                                    <img loading="lazy"
                                         src="<?php echo e($t['ruta']); ?>"
                                         alt="<?php echo e($t['nombre']); ?>">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo e($t['nombre']); ?></h3>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>

    <!-- Modal Lightbox -->
    <div class="modal" id="modal" aria-hidden="true" role="dialog" aria-modal="true">
        <button class="modal-close" id="modalClose" aria-label="Cerrar">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
        </button>
        <button class="modal-nav modal-prev" id="modalPrev" aria-label="Anterior">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
        </button>
        <div class="modal-content">
            <img class="modal-img" id="modalImg" src="" alt="">
            <div class="modal-info">
                <span class="modal-cat" id="modalCat"></span>
                <h3 class="modal-title" id="modalTitle"></h3>
            </div>
        </div>
        <button class="modal-nav modal-next" id="modalNext" aria-label="Siguiente">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
        </button>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script>
        window.GLOSARIO_SEARCH = <?php echo json_encode($busqueda, JSON_UNESCAPED_UNICODE); ?>;
    </script>
    <script src="scripts/glosario.js"></script>
</body>
</html>