$(document).ready(function() {
    if ($(window).width() > 992) {
        $(window).scroll(function() {
            if ($(this).scrollTop() > $('#logo-header').height()) {
                $('#navbar-top').addClass("fixed-top");
                $('#logo-header').css('margin-bottom', $('#navbar-top').outerHeight(true) + 'px');
            } else {
                $('#navbar-top').removeClass("fixed-top");
                $('#logo-header').css('margin-bottom', '0');
            }
        });
    }


    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
      if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
      }
      var $subMenu = $(this).next('.dropdown-menu');
      $subMenu.toggleClass('show');


      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass('show');
      });


      return false;
    });
});
