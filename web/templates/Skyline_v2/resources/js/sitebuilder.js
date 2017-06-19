window.Yola = window.top.Yola;

// register all of the property handlers for this style
var bindProperyHandler = function(yph){

    yph.addPropertyHandler('site.logo.src', function(args){
        var heading = $("#sys_heading"),
            logoImage = $("#sys_heading img"),
            headingClass = "yola_hide_logo";

        if(typeof args.value == "string" && args.value !== ""){
            headingClass = "yola_show_logo";
        }

        heading.attr("class", headingClass);

        if(logoImage.attr("src") !== args.value) {
            logoImage.attr("src", args.value);
        }
    });

    yph.addPropertyHandler('site.tagline.text', function(args){
        var tagline = $(".yola_site_tagline"),
            taglineDisplay = "none";

        if(typeof args.value != "undefined" && args.value !== ""){
            taglineDisplay = "block";
        }

        tagline.css("display", taglineDisplay);
        tagline.html(args.value);
    });

    yph.addPropertyHandler('header.alignment', function(args){
        var header = $(".yola_inner_heading_wrap");
            header.removeClass("left");
            header.removeClass("top");
            header.removeClass("right");
            header.removeClass("bottom");
            header.addClass(args.value);

        if(args.value == "bottom") {
            $("#yola_heading_block").before($("#yola_nav_block"));
        } else {
            $("#yola_nav_block").before($("#yola_heading_block"));
        }
    });

};

Yola.namespace
    .async("Yola.propertyHandler")
    .then(bindProperyHandler)
    .done();

if($(".yola_site_tagline").length !== 0) {
    $(".yola_site_tagline").on("click.propertyChange", function(e){
        var controller = Yola.UI.page.getWindow().page;

        if(controller.editMode === false) {
            return false;
        }

        Yola.UI.page.editHeading();

        e.preventDefault();
        e.stopPropagation();
    });
}

new Yola.UI.page.decorators.edit(
    document.getElementById("yola_style_footer"),
    {
        topOffset: -25,
        focusable: false,
        minHeight: 20,
        minWidth:800,
        menu : [
            {
                text : _('Edit Footer Style'),
                click : function(e){
                    Yola.UI.leftGutter.open({src: '/ide/Yola/UI/styleDesigner/styleDesigner.html'});

                    e.preventDefault();
                    e.stopPropagation();
                }
            }
        ]
    }
);
