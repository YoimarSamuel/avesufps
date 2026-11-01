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
