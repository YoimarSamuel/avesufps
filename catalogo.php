<?php 
include 'conexion.php'; 

$where = "";
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
    $busqueda = mysqli_real_escape_string($conexion, $_GET['buscar']);
    $where = " WHERE nombre_ave LIKE '%$busqueda%' OR nombre_cientifico LIKE '%$busqueda%'";
}

$query = "SELECT * FROM aves" . $where . " ORDER BY orden_ave ASC";
$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Aves</title>
    <link rel="icon" href="Imagenes/logo.png" type="image/png">
    <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C400%2C700%7CRoboto+Slab%3A400%2C700%7COpen+Sans%3A400%2C600&display=swap' media='all' />
    
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/catalogo.css">
    <link rel="stylesheet" href="styles/footer.css">
</head>
<body>

    <?php include "includes/header.php" ?>

    <header class="hero-catalogo">
        <div class="hero-info">
            <form action="" method="GET" class="caja-buscador">
                <input type="text" name="buscar" class="input-buscar" placeholder="Buscar ave..." value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                <button type="submit" class="btn-buscar">Buscar</button>
            </form>
        </div>
    </header>

    <div class="contenedor-pagina">
        <main class="contenedor-aves">
            
            <?php if (mysqli_num_rows($resultado) === 0): ?>
                <div class="sin-resultados">
                    No se encontraron aves para
                    «<strong><?php echo htmlspecialchars($_GET['buscar'] ?? '', ENT_QUOTES, 'UTF-8'); ?></strong>».
                </div>
            <?php else: ?>
            <?php 
            while($ave = mysqli_fetch_array($resultado)) { 
            ?>
                <div class="ave-card">
                    <?php 
                        $foto = $ave['foto_ave']; 
                        
                        if (!preg_match("~^(?:f|ht)tps?://~i", $foto)) {
                            $foto = "Imagenes/aves/" . $foto; 
                        }
                    ?>
                    <div class="galeria-imagen-principal">
                        <img src="<?php echo $foto; ?>" alt="<?php echo $ave['nombre_ave']; ?>" class="ave-imagen">
                        <span class="badge-catalogo">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>
                            </svg>
                            UFPS - Cúcuta
                        </span>
                    </div>
                    <div class="ave-info">
                        <h2><?php echo $ave['nombre_ave']; ?></h2>
                        <span class="nombre-cientifico">(<em><?php echo $ave['nombre_cientifico']; ?></em>)</span>
                        
                        <a href="descripcion.php?id=<?php echo $ave['id_aves']; ?>" class="btn-mas">VER FICHA TÉCNICA</a>
                    </div>
                </div>
            <?php 
            } 
            ?>
            <?php endif; ?>

        </main>

    </div>

    <?php include "includes/footer.php" ?>

    <script src="scripts/catalogo.js"></script>
</body>
</html>
