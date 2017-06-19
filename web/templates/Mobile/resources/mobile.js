$(document).ready(function(){
    
    // Initiailze the menu toggle
    $("#ysm_menu_toggle").click(function(e){
        
        var parent = $('div.ysm_buttons');
        
        if(parent.hasClass('ysm_buttons_closed')){
            parent.removeClass('ysm_buttons_closed').addClass('ysm_buttons_open');
            $("#ysm_menu").slideDown(300, function(){
                parent.removeClass('ysm_buttons_closed').addClass('ysm_buttons_open');
                $("#ysm_menu").removeClass('closed').addClass('open')
            });
        }else{
            $("#ysm_menu").slideUp(300, function(){
                parent.removeClass('ysm_buttons_open').addClass('ysm_buttons_closed');
                $("#ysm_menu").removeClass('open').addClass('closed')
            });
        }
        
        e.preventDefault();
        return false;
        
    });
    
});