var player;
var estaReproduciendo = false;

function gestionarCanto(enlace) {
    var boton = document.getElementById('btnReproductor');

    if (estaReproduciendo) {
        player.pauseVideo();
        boton.innerHTML = 'Escuchar Canto';
        estaReproduciendo = false;
    } else {
        var videoId = "";
        if (enlace.includes('shorts/')) {
            videoId = enlace.split('shorts/')[1].split('?')[0];
        } else if (enlace.includes('v=')) {
            videoId = enlace.split('v=')[1].split('&')[0];
        }

        if (videoId) {
            if (player && typeof player.loadVideoById === "function") {
                player.loadVideoById(videoId);
                player.playVideo();
            } else {
                player = new YT.Player('reproductor-invisible', {
                    height: '0',
                    width: '0',
                    videoId: videoId,
                    playerVars: { 'autoplay': 1, 'controls': 0 },
                    events: {
                        'onReady': function(event) { event.target.playVideo(); },
                        'onStateChange': onPlayerStateChange
                    }
                });
            }
            boton.innerHTML = 'Parar Canto';
            estaReproduciendo = true;
        }
    }
}

function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {
        document.getElementById('btnReproductor').innerHTML = 'Escuchar Canto';
        estaReproduciendo = false;
    }
}

var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function changeImage(src) {
    document.getElementById('mainBirdImg').src = src;
}

var videoZona = document.getElementById('zonaVideo');
var playOverlay = document.getElementById('playOverlay');

function toggleVideoZona() {
    if (!videoZona) return;
    if (videoZona.paused) {
        videoZona.play();
        if (playOverlay) playOverlay.classList.add('oculto');
    } else {
        videoZona.pause();
        if (playOverlay) playOverlay.classList.remove('oculto');
    }
}

if (videoZona) {
    videoZona.addEventListener('click', toggleVideoZona);
    videoZona.addEventListener('pause', function() {
        if (playOverlay) playOverlay.classList.remove('oculto');
    });
}

var menu = document.querySelector('#mobile-menu');
var menuLinks = document.querySelector('#nav-links');
if (menu && menuLinks) {
    menu.addEventListener('click', function() {
        menu.classList.toggle('is-active');
        menuLinks.classList.toggle('active');
    });
    document.querySelectorAll('.nav-links a').forEach(function(n) {
        n.addEventListener('click', function() {
            menu.classList.remove('is-active');
            menuLinks.classList.remove('active');
        });
    });
}
