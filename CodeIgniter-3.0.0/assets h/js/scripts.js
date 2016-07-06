
jQuery(document).ready(function() {
    
    /*
        Fullscreen background
    */
    $.backstretch("assets/img/backgrounds/1.jpg");
    
    $('#top-navbar-1').on('shown.bs.collapse', function(){
        $.backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function(){
        $.backstretch("resize");
    });
    
    /*
        Form validation
    */
    $('.registration-form input[type="text"], .registration-form input[type="email"], .registration-form input[type="password"], .registration-form textarea, .registration-form textarea.form-control').on('focus', function() {
        $(this).removeClass('input-error');
    });
    
    $('.registration-form').on('submit', function(e) {
        
        $(this).find('input[type="text"], input[type="email"], input[type="password"], textarea, textarea.form-control').each(function(){
            if( $(this).val() == "" ) {
                e.preventDefault();
                $(this).addClass('input-error');
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        
    });
    
    
});
