const menu = document.querySelector('#mobile-menu');
const menuLinks = document.querySelector('#nav-links');

if (menu && menuLinks) {
    menu.addEventListener('click', function() {
        menu.classList.toggle('is-active');
        menuLinks.classList.toggle('active');
    });

    document.querySelectorAll('.nav-links a').forEach(n => n.addEventListener('click', () => {
        menu.classList.remove('is-active');
        menuLinks.classList.remove('active');
    }));
}
