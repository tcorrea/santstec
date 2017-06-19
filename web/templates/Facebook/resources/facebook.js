
$(document).ready(function(){
    
    var more = "" +
    "<li id='more-link'>" + 
        "<a href='#'>" + 
            "<strong>" + MORE_TEXT + "</strong>" +
        "</a>" + 
    "</li>";
    
    $("#ysf_menu > ul").append(more);
    
    var width = $("#ysf_menu").outerWidth() - $("#more-link").outerWidth() - 30;
    
    $("#more-link").remove();
    
    $("#ysf_menu > ul > li").each(function(){
        if(width - $(this).outerWidth() < 0){
            if($('#ysf_fly_menu').length == 0){
                $("#ysf_menu").after("<div id='ysf_fly_menu'><ul></ul></div>")
            }
            $('#ysf_fly_menu ul').append($(this).detach());
        }else{
            width = width - $(this).outerWidth();
        }
    });
    
    if($("#ysf_fly_menu").length > 0){
        
        $("#ysf_menu > ul").append(more);
        
        $("#more-link a").click(function(){
            
            if($("#ysf_fly_menu:visible").length == 0){
                
                $("#ysf_fly_menu").css({
                    top : -9999,
                    left: -9999
                });
                
                var top = $(this).offset().top + $(this).outerHeight();
                var left = $(this).offset().left;
                
                if($("#ysf_fly_menu").outerWidth() + left > document.body.offsetWidth){
                    left = document.body.offsetWidth - $("#ysf_fly_menu").outerWidth();
                }
                
                $("#ysf_fly_menu").css({
                    top : top + 6,
                    left: left
                }).show();
                
            }else{
                $("#ysf_fly_menu").hide();
            }
            
            return false;
            
        });
        
    }
    
    
    
    
});