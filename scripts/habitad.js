(function(){
    var slides   = Array.from(document.querySelectorAll('.carrusel-slide'));
    var prevBtn  = document.querySelector('.carrusel-flecha.prev');
    var nextBtn  = document.querySelector('.carrusel-flecha.next');

    if (!slides.length) return;

    var total    = slides.length;
    var idx      = parseInt(document.body.getAttribute('data-indice-inicial') || '0', 10);
    var animando = false;
    var todosVideos = [];

    function actualizarIndicadores() {
        document.querySelectorAll('.carrusel-indicador').forEach(function(d) { d.classList.remove('active'); });
        document.querySelectorAll('.carrusel-indicador[data-goto="' + idx + '"]').forEach(function(d) { d.classList.add('active'); });
    }

    function cambiarVideo(indice) {
        todosVideos.forEach(function(item) {
            var v = item.el;
            if (item.indice === indice) {
                v.muted = true;
                v.setAttribute('muted', '');
                v.loop = true;
                v.currentTime = 0;
                var play = v.play();
                if (play && typeof play.catch === 'function') play.catch(function(){});
            } else {
                try { v.pause(); } catch(e) {}
                v.currentTime = 0;
            }
        });
    }

    function show(index) {
        if (index === idx || animando) return;
        animando = true;

        var anterior = slides[idx];
        var siguiente = slides[index];

        siguiente.style.display = 'block';
        siguiente.offsetHeight;
        siguiente.style.opacity = '0';
        siguiente.style.transition = 'opacity 0.6s ease';
        siguiente.style.opacity = '1';
        siguiente.classList.add('active');

        window.scrollTo({ top: 0, behavior: 'smooth' });

        idx = index;
        cambiarVideo(idx);
        actualizarIndicadores();

        anterior.classList.remove('active');
        anterior.style.opacity = '0';
        setTimeout(function() {
            if (!anterior.classList.contains('active')) anterior.style.display = 'none';
        }, 650);

        setTimeout(function(){ animando = false; }, 700);
    }

    function goPrev() { if (idx > 0) show(idx - 1); }
    function goNext() { if (idx < total - 1) show(idx + 1); }

    if (prevBtn) prevBtn.addEventListener('click', goPrev);
    if (nextBtn) nextBtn.addEventListener('click', goNext);

    document.addEventListener('click', function(e) {
        var dot = e.target.closest('.carrusel-indicador');
        if (!dot) return;
        var target = parseInt(dot.getAttribute('data-goto'), 10);
        if (target === idx) return;
        show(target);
    });

    document.addEventListener('keydown', function(e) {
        if (e.code === 'ArrowLeft')  { e.preventDefault(); goPrev(); }
        if (e.code === 'ArrowRight') { e.preventDefault(); goNext(); }
    });

    slides.forEach(function(slide, i) {
        var v = slide.querySelector('.habitat-video');
        if (v) {
            v.muted = true;
            v.setAttribute('muted', '');
            v.loop = true;
            todosVideos.push({ el: v, indice: i });
            if (i === idx) {
                var play = v.play();
                if (play && typeof play.catch === 'function') play.catch(function(){});
            } else {
                v.load();
            }
        }
    });

    actualizarIndicadores();
})();
