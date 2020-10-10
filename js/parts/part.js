(function($) {

    let toggleDropdown = function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).parent().toggleClass('show');
        $(this).siblings('.dropdown-menu').toggleClass('show');
        $(this).siblings('.dropdown-menu').find('.show').toggleClass('show');
    };

    let closeDropdown = function(e) {
        let container = $('.navbar-nav > .dropdown');
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.find('.show').toggleClass('show');
        }
    };

    function bindNavbar() {
        $('.dropdown-toggle').bind('click', toggleDropdown);
        $(document).bind('mouseup', closeDropdown);
    }

    function unbindNavbar() {
        $('.dropdown-toggle').unbind('click', toggleDropdown);
        $(document).unbind('mouseup', closeDropdown);
    }

    function resetNavbar() {
        unbindNavbar();
        $('.navbar-nav').find('.show').removeClass('show');
    }

    let resizeTimer;
    $(window).on('load resize orientationchange', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            resetNavbar();
            bindNavbar();
            if ($('.navbar-nav').data('hover') === true && $(window).width() >= 992) {
                unbindNavbar();
            }
        }, 250);
    });


})(jQuery);