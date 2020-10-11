(function($) {

    function setInitDropdownPosition() {
        $('.navbar-nav .dropdown-toggle').each(function() {
            let dropdown = $(this).parent();
            if (!dropdown.parent().hasClass('navbar-nav')) {
                if ($(window).width() >= 992) {
                    dropdown.removeClass('dropdown dropleft').addClass('dropright');
                } else {
                    dropdown.removeClass('dropleft dropright').addClass('dropdown');
                }
            }
        });
    }

    function setDropdownPosition(dropdownToggle) {
        if ($('.navbar-nav').data('detect-overflow')) {
            let dropdown = dropdownToggle.parent();
            let menu     = dropdownToggle.siblings('.dropdown-menu');
            if (!dropdown.parent().hasClass('navbar-nav')) {
                if (dropdown.is(':visible')) {
                    let windowEdge   = $(window).width();
                    let dropdownEdge = menu.offset().left + menu[0].scrollWidth;
                    if (dropdownEdge > windowEdge) {
                        dropdown.removeClass('dropdown dropright').addClass('dropleft');
                    }
                }
            }
        }
    }

    let toggleDropdown = function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).parent().toggleClass('show');
        $(this).siblings('.dropdown-menu').toggleClass('show');
        $(this).siblings('.dropdown-menu').find('.show').toggleClass('show');

        setDropdownPosition($(this));
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
            setInitDropdownPosition();
            if ($('.navbar-nav').data('hover') === true && $(window).width() >= 992) {
                unbindNavbar();
            }
        }, 250);
    });

})(jQuery);