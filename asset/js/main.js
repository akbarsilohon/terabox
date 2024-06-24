document.addEventListener('DOMContentLoaded', function() {
    var menuItems = document.querySelectorAll('.flexMenu li');

    menuItems.forEach(function(item) {
        if (item.classList.contains('current-menu-item')) {
            item.classList.add('active');
            item.querySelector('.menu-link').classList.add('active');
        }
    });
});

const menuOpen = document.getElementById( 'btnOpen' );
const menuClose = document.getElementById( 'btnClose' );
const menuTarget = document.getElementById( 'flexbox' );

menuOpen.addEventListener( 'click', () => {
    menuTarget.classList.add( 'active' );
});
menuClose.addEventListener( 'click', () => {
    menuTarget.classList.remove( 'active' );
});