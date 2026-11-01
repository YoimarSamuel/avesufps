/* =================================================================
   glosario.js  —  Modal lightbox para ver las ilustraciones grandes
   Funciona junto a glosario.php. Sin dependencias.
   ================================================================= */
(function () {
    'use strict';

    var modal     = document.getElementById('modal');
    if (!modal) return;

    var img       = document.getElementById('modalImg');
    var titulo    = document.getElementById('modalTitle');
    var catLabel  = document.getElementById('modalCat');
    var btnCerrar = document.getElementById('modalClose');
    var btnPrev   = document.getElementById('modalPrev');
    var btnNext   = document.getElementById('modalNext');

    var tarjetas  = Array.prototype.slice.call(document.querySelectorAll('.card'));
    if (!tarjetas.length) return;

    var idxActual = 0;

    function normalizarIndice(i) {
        var n = tarjetas.length;
        return n === 0 ? 0 : (i + n) % n;
    }

    function mostrarImagen() {
        var tarjeta = tarjetas[idxActual];
        if (!tarjeta) return;
        img.src = tarjeta.getAttribute('data-src') || '';
        img.alt = tarjeta.getAttribute('data-nombre') || '';
        titulo.textContent   = tarjeta.getAttribute('data-nombre') || '';
        catLabel.textContent = tarjeta.getAttribute('data-categoria') || '';
    }

    function abrir(indice) {
        idxActual = normalizarIndice(indice);
        mostrarImagen();
        modal.classList.add('active');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function cerrar() {
        modal.classList.remove('active');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        img.src = '';
    }

    function siguiente() { abrir(idxActual + 1); }
    function anterior()  { abrir(idxActual - 1); }

    /* ---------- Abrir desde las tarjetas ---------- */
    tarjetas.forEach(function (t, i) {
        t.addEventListener('click', function () { abrir(i); });
        t.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                abrir(i);
            }
        });
    });

    /* ---------- Controles del modal ---------- */
    if (btnCerrar) btnCerrar.addEventListener('click', cerrar);
    if (btnPrev)   btnPrev.addEventListener('click', anterior);
    if (btnNext)   btnNext.addEventListener('click', siguiente);

    // Cerrar al hacer click en el fondo (no en la imagen)
    modal.addEventListener('click', function (e) {
        if (e.target === modal) cerrar();
    });

    /* ---------- Teclado ---------- */
    document.addEventListener('keydown', function (e) {
        if (!modal.classList.contains('active')) return;
        switch (e.key) {
            case 'Escape':     cerrar();   break;
            case 'ArrowLeft':  anterior(); break;
            case 'ArrowRight': siguiente(); break;
        }
    });

})();
