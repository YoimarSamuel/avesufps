<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

// If coming directly to index without loading animation, redirect to carga.php
if (!isset($_SESSION['loading_done'])) {
    header('Location: carga.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Imagenes/logo.png" type="image/png">
    <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C400%2C700%7CRoboto+Slab%3A400%2C700%7COpen+Sans%3A400%2C600&display=swap' media='all' />
    <title>Aves UFPS</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/footer.css">
</head>
<body>

    <?php include "includes/header.php" ?>

    <section class="hero">
        <div class="hero-content">
            <h1>Aves UFPS</h1>
            <p>Nuestra universidad está llena de vida, y este catálogo está diseñado para que conozcas la diversidad de aves presente en nuestra UFPS.
                Las aves de nuestro campus cumplen un papel fundamental en los ecosistemas. Aquí tienes la oportunidad de observar la gran variedad de especies que, al igual que nosotros, hacen de la UFPS su hogar.</p>
            <p>¡Ingresa, descubre y anímate!</p>
            <div class="cta-buttons">
                <a href="habitad.php" class="btn btn-primary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>
                    </svg>
                    Explorar hábitats
                </a>
                <a href="catalogo.php" class="btn btn-secondary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3h7v7H3zM14 3h7v7h-7zM3 14h7v7H3zM14 14h7v7h-7z"/>
                    </svg>
                    Ver Catálogo
                </a>
            </div>
        </div>

        
    </section>

    <?php include "includes/footer.php" ?>

    <script src="scripts/index.js"></script>
</body>
</html>
