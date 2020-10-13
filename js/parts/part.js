(function($) {

    let navBreakPoint = 1200;

    $('.navbar-nav a[href="#"]').on('click', function(e) {
        e.preventDefault();
    });

    function copyParentLink() {
        if ($('.navbar-nav').data('copy-parent-link') === true) {
            if ($(window).width() >= navBreakPoint) {
                $('.copied-parent-link').remove();
            } else {
                $('.navbar-nav .dropdown-toggle').each(function() {
                    let menu = $(this).siblings('.dropdown-menu');
                    if ($(this).attr('href') != '#' && !menu.find('.copied-parent-link').length) {
                        let parentLinkWrapper = $('<li class="copied-parent-link"></li>');
                        let parentLink = $('<a></a>');
                        parentLink
                            .text($(this).text())
                            .attr('href', $(this).attr('href'));
                        if ($(this).attr('target')) {
                            parentLink.attr('target', $(this).attr('target'));
                        }
                        if ($(this).attr('rel')) {
                            parentLink.attr('rel', $(this).attr('rel'));
                        }
                        parentLinkWrapper.prepend(parentLink);
                        menu.prepend(parentLinkWrapper);
                    }
                });
            }
        }
    }

    function setInitDropdownPosition() {
        if ($(window).width() >= 992) {
            $('.navbar-nav .dropdown-menu').css({visibility: 'hidden', display: 'block'});
            $('.navbar-nav .dropdown-toggle').each(function() {
                let dropdown = $(this).parent();
                let menu     = $(this).siblings('.dropdown-menu');
                if (!dropdown.parent().hasClass('navbar-nav')) {
                    let windowEdge   = $(window).width();
                    let dropdownEdge = dropdown.offset().left + dropdown.outerWidth() + menu.outerWidth();
                    if ($('.navbar-nav').data('detect-overflow') === true && dropdownEdge > windowEdge) {
                        dropdown.removeClass('dropdown dropright').addClass('dropleft');
                    } else {
                        dropdown.removeClass('dropdown dropleft').addClass('dropright');
                    }
                }
            });
            $('.navbar-nav .dropdown-menu').css({display: '', visibility: ''});
        } else {
            $('.navbar-nav .dropdown-toggle').each(function() {
                $(this).parent().removeClass('dropleft dropright').addClass('dropdown');
            });
        }
    }

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
            setInitDropdownPosition();
            copyParentLink();
            resetNavbar();
            bindNavbar();
            if ($('.navbar-nav').data('hover') === true && $(window).width() >= navBreakPoint) {
                unbindNavbar();
            }
        }, 250);
    });


})(jQuery);