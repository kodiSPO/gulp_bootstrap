/* fixed header */
$(window).on('load scroll', function() {
    let scroll = $(window).scrollTop();
    let wpbarH = $('#wpadminbar').outerHeight() || 0;
    if (scroll > (0 + wpbarH)) {
        $('.header:not(.fixed)').addClass('fixed');
    } else {
        $('.header.fixed').removeClass('fixed');
    }
    $('.header:hidden').show();
});
