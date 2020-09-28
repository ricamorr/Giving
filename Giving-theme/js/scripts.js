jQuery(document).ready( $ => {
        $('.site-header .menu-principal .menu').slicknav({
            label: '',
            appendTo: '.site-header'
        });
});

// Agrega posición fija en el header al hacer scroll
window.onscroll = () => {
    const scroll = window.scrollY;

    const headerNav = document.querySelector('.barra-navegacion');

    const documentBody = document.querySelector('body');

    //Si la cantidad de scroll es mayor a, agregar una clase
    if(scroll > 200) {
        headerNav.classList.add('fixed-top');
        documentBody.classList.add('ft-activo');
    } else {
        documentBody.classList.remove('ft-activo');
        headerNav.classList.remove('fixed-top');
    }
}