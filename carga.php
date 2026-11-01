<?php
session_start();
$_SESSION['loading_done'] = true;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cargando...</title>
<link rel="icon" href="Imagenes/logo.png" type="image/png">
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    overflow: hidden;
    background: #fff;
}
.preloader {
    position: fixed;
    inset: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background: white;
}
.brand {
    position: relative;
    width: 100%;
    height: 100%;
}
.logo {
    position: absolute;
    left: 50%;
    top: 50%;
    width: 20vw;
    max-width: 240px;
}
.logo img {
    width: 100%;
    display: block;
}
.texto {
    position: absolute;
    left: 50%;
    top: 50%;
    width: 60vw;
    max-width: 850px;
}
.texto img {
    width: 90%;
    display: block;
    margin: 0 auto;
}
</style>
</head>
<body>

<div class="preloader">
    <div class="brand">
        <div class="logo">
            <img src="Imagenes/logo.png" alt="">
        </div>
        <div class="texto">
            <img src="Imagenes/texto.png" alt="">
        </div>
    </div>
</div>

<script>
const logo = document.querySelector('.logo');
const texto = document.querySelector('.texto');

const logoWidth = logo.offsetWidth;
const textoWidth = texto.offsetWidth;

const gap = Math.max(20, window.innerWidth * 0.02);

const desplazamientoLogo = (textoWidth + gap) / 2;   
const desplazamientoTexto = (logoWidth + gap) / 2;    

const textoXInicial = desplazamientoTexto + desplazamientoLogo;
const textoXFinal = desplazamientoTexto;

// configuracion salida inicial
gsap.set(logo, {
    scale: 0,
    opacity: 0,
    xPercent: -50,
    x: 0,
    yPercent: -50
});
gsap.set(texto, {
    opacity: 0,
    xPercent: -50,
    x: textoXInicial,
    yPercent: -50
});

// Timeline
const tl = gsap.timeline({
    onComplete: function() {
        window.location.href = 'index.php';
    }
});

// 1. Logo aparece (escala y opacidad)
tl.to(logo, {
    scale: 1,
    opacity: 1,
    duration: 0.5,
    ease: "expo.out"
})
// 2. pausa
.to({}, { duration: 0.2 })
// 3. movimiento del logo a la izquierda
.to(logo, {
    x: -desplazamientoLogo,
    duration: 0.5,
    ease: "power3.inOut"
}, "-=0.1")
// 4. Texto: se mueve sincronizado con el logo
.to(texto, {
    x: textoXFinal,
    duration: 0.5,
    ease: "power3.inOut"
}, "<") // empieza al mismo tiempo que el movimiento del logo
// 5. texto: aparecer
.to(texto, {
    opacity: 1,
    filter: "blur(0px)",
    duration: 0.8,
    ease: "power3.out"
}, "<"); // empieza al mismo tiempo
</script>

</body>
</html>