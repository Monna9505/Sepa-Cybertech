$(document).ready(function() {
    let hamburger = $('.mobile__header__wrapper .hamburger');
    $('.mobile__header__wrapper .mobile__links').hide();
    
    if (hamburger.length > 0) {
        hamburger.on('click', function() {
            $('.mobile__links').slideToggle();
        });
    }
});