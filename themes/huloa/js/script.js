(function($){
    $('.selectpicker').selectpicker();

    $(document).ready(function(){
        $('.navbar-nav > .dropdown').each(function(){
            var $main = $(this);
            $main.find('.dropdown-toggle-xp .caret').click(function(e){
                e.preventDefault();
                $(this).closest('.dropdown').toggleClass('dropdown-expanded');
                $(this).closest('.dropdown').find('.dropdown-menu-xp').slideToggle();
            });
        });

        $('.navbar-toggle').click(function(){
            $('body').toggleClass('show-nav');
        });

        $('.background-mobile-area, .navbar-toggle-inside').click(function(){
            $('.navbar-toggle').click();
        });


        //$('#top-bar select').wrap('<div class="custom-select"></div>');
    });

    $(document).on('DOMNodeInserted', '.views-exposed-form .shs-select', function (e) {
        if ($(e.target).hasClass('shs-select')) {
            $(this).addClass('form-control');
            $(this).parent().addClass('form-inline');
        }
    });

})(jQuery);
