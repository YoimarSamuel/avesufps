

    <nav>
        <a href="index.php" class="logo-container">
            <img src="Imagenes/Logo-vertical2.png" alt="Logo AvianWorld" class="logo-img">
            <span class="logo-text">Catálogo de aves</span>
        </a>

        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <div class="nav-links" id="nav-links">
            <a href="index.php">Inicio</a>
            <a href="catalogo.php">Catálogo</a>
            <a href="habitad.php">Hábitats</a>
            <a href="arboles.php">Árboles</a>
            <a href="glosario.php">Glosario</a>
            <a href="#" class="btn-tutorial-nav" id="tutorial-nav-btn">Tutorial de avistamiento</a>
        </div>
    </nav>

<div id="tutorial-modal" class="tutorial-modal" role="dialog" aria-modal="true" aria-labelledby="tutorial-title">
    <div class="tutorial-modal-content">
        <button class="tutorial-close" aria-label="Cerrar tutorial">&times;</button>
        <video id="tutorial-video" class="tutorial-video" controls playsinline preload="metadata">
            <source src="videos/Presentacion.mp4" type="video/mp4">
            Tu navegador no soporta video HTML5.
        </video>
    </div>
</div>

<div id="thanks-overlay" class="thanks-overlay" aria-hidden="true">
    <img src="Imagenes/Gracias.png" alt="Gracias" class="thanks-img">
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('tutorial-modal');
    const openBtn = document.getElementById('tutorial-nav-btn');
    const closeBtn = modal?.querySelector('.tutorial-close');
    const video = modal?.querySelector('.tutorial-video');
    const thanksOverlay = document.getElementById('thanks-overlay');

    if (openBtn && modal) {
        openBtn.addEventListener('click', function(e) {
            e.preventDefault();
            modal.classList.add('active');
            if (video) {
                video.muted = false;
                video.volume = 1;
                video.currentTime = 0;
                video.play().catch(function() {});
            }
            document.body.style.overflow = 'hidden';
        });
    }

    function closeModal() {
        modal.classList.remove('active');
        if (video) {
            video.pause();
            video.muted = true;
            video.currentTime = 0;
        }
        document.body.style.overflow = '';
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    modal?.addEventListener('click', function(e) {
        if (e.target === modal) closeModal();
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal?.classList.contains('active')) {
            closeModal();
        }
    });

    // When video ends (no loop), close modal and show thanks image
    if (video) {
        video.addEventListener('ended', function() {
            closeModal();
            showThanks();
        });
    }

    function showThanks() {
        thanksOverlay.classList.add('active');
        // hide after 3 seconds with animation
        setTimeout(function() {
            thanksOverlay.classList.remove('active');
        }, 3000);
    }
});
</script>