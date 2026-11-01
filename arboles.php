<?php
/**
 * arboles.php
 * ------------------------------------------------------------------
 * Catálogo de árboles y plantas del campus UFPS (estilo catálogo de aves).
 * Cada tarjeta muestra la foto del árbol, su nombre común y científico,
 * y un botón "Ver Ficha" que lleva a info_arbol.php?id=ID con el detalle
 * y las aves que lo utilizan.
 *
 * Identidad visual: paleta roja + blancos, Roboto Slab (igual que el sitio).
 * Codificación: UTF-8 (tildes, ñ, ×).
 * ------------------------------------------------------------------
 */

header('Content-Type: text/html; charset=utf-8');
include 'conexion.php';

mysqli_set_charset($conexion, "utf8mb4");

/* --------------------------------------------------------------
 * 1) Búsqueda por nombre (común o científico).
 * -------------------------------------------------------------- */
$where = "";
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
    $busqueda = mysqli_real_escape_string($conexion, $_GET['buscar']);
    $where = " WHERE nombre_comun LIKE '%$busqueda%'
               OR nombre_cientifico LIKE '%$busqueda%'
               OR familia LIKE '%$busqueda%' ";
}

/* --------------------------------------------------------------
 * 2) Listado de árboles, ordenados por el campo orden.
 *    Cuando se busca, omitimos el orden para que coincida por relevancia.
 * -------------------------------------------------------------- */
$query = "SELECT id_arbol, nombre_comun, nombre_cientifico, familia, ruta
          FROM arboles" . $where . "
          ORDER BY orden ASC, id_arbol ASC";
$resultado = mysqli_query($conexion, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Árboles y recursos - Aves UFPS</title>
    <link rel="icon" href="Imagenes/logo.png" type="image/png">
    <link rel='stylesheet' id='google-fonts-1-css'
          href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C400%2C700%7CRoboto+Slab%3A400%2C700%7COpen+Sans%3A400%2C600&display=swap'
          media='all' />

    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/arboles.css">
    <link rel="stylesheet" href="styles/footer.css">
</head>
<body>

    <?php include "includes/header.php"; ?>

    <header class="hero-catalogo">
        <div class="hero-info">
            <form action="" method="GET" class="caja-buscador">
                <input type="text" name="buscar" class="input-buscar"
                       placeholder="Buscar árbol o planta..."
                       value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                <button type="submit" class="btn-buscar">Buscar</button>
            </form>
        </div>
    </header>

    <div class="contenedor-pagina">

        <main class="contenedor-aves">
            <?php if (mysqli_num_rows($resultado) === 0): ?>
                <div class="sin-resultados">
                    No se encontraron árboles para
                    «<strong><?php echo htmlspecialchars($_GET['buscar'] ?? '', ENT_QUOTES, 'UTF-8'); ?></strong>».
                </div>
            <?php else: ?>
                <?php while ($arbol = mysqli_fetch_assoc($resultado)): ?>
                    <div class="ave-card">
                        <div class="galeria-imagen-principal">
                            <img src="<?php echo htmlspecialchars($arbol['ruta'], ENT_QUOTES, 'UTF-8'); ?>"
                                 alt="<?php echo htmlspecialchars($arbol['nombre_comun'], ENT_QUOTES, 'UTF-8'); ?>"
                                 class="ave-imagen">
                            <span class="badge-catalogo">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none"
                                     stroke="#fff" stroke-width="2.4" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path d="M12 2l3 6h-3v6h3l-3 6-3-6h3V8H9z"/>
                                </svg>
                                UFPS - Cúcuta
                            </span>
                        </div>
                        <div class="ave-info">
                            <h2><?php echo htmlspecialchars($arbol['nombre_comun'], ENT_QUOTES, 'UTF-8'); ?></h2>
                            <span class="nombre-cientifico">(<em>
                                <?php echo htmlspecialchars($arbol['nombre_cientifico'] ?? '', ENT_QUOTES, 'UTF-8'); ?></em>)
                            </span>
                            <a href="info_arbol.php?id=<?php echo (int)$arbol['id_arbol']; ?>" class="btn-mas">
                                VER FICHA DEL ÁRBOL
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </main>

    </div>

    <?php include "includes/footer.php"; ?>

    <script src="scripts/arboles.js"></script>
</body>
</html>
