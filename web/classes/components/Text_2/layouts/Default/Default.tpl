<style type="text/css">
    div.sys_text_widget img.float-left{float:left;margin:10px 15px 10px 0;}
    div.sys_text_widget img.float-right{position:relative;margin:10px 0 10px 15px;}
    div.sys_text_widget img{margin:4px;}
    div.sys_text_widget {
        overflow: hidden;
        margin: 0;
        padding: 0;
        color: <% $properties.color %>;
        font: <% $properties.font %>;
        background-color: <% $properties.backgroundColor %>;
    }
</style>


<%if $safeMode eq true && $system.mode == "DESIGN" %>

    <style type="text/css">
        div.yola_safe{position:relative;height:100px;text-align:center;}
        div.yola_safe div.yola_tl{position:absolute;top:10px;left:10px;}
        div.yola_safe div.yola_tr{position:absolute;top:10px;right:10px;}
        div.yola_safe div.yola_bl{position:absolute;bottom:10px;left:10px;}
        div.yola_safe div.yola_br{position:absolute;bottom:10px;right:10px;}
        div.yola_safe span.yola_text{display:inline-block;padding:10px 0 10px 40px;margin:33px 0 0 0;}
    </style>
    <div class="yola_safe">
        <span class="yola_text" style="background:url(/components/system/Text_2/icons/32x32.png) center left no-repeat;"><%TRANSLATE%>Text Widget<%/TRANSLATE%></span>
        <div class="yola_tl"><%TRANSLATE%>Safe Mode<%/TRANSLATE%></div>
        <div class="yola_tr"><%TRANSLATE%>Safe Mode<%/TRANSLATE%></div>
        <div class="yola_bl"><%TRANSLATE%>Safe Mode<%/TRANSLATE%></div>
        <div class="yola_br"><%TRANSLATE%>Safe Mode<%/TRANSLATE%></div>
    </div>

<%else%>

    <%strip%>
        <div id="<% $properties.id %>_sys_txt" systemElement="true" class="sys_txt sys_text_widget new-text-widget">
            <% if $system.mode == "DESIGN"%>
                <div id="<% $properties.id %>_sys_txt_frm_div"><% $text %></div>
                <div style="clear:both"></div>
            <% elseif !$isDefault%>
                <% $text %>
            <% /if %>
        </div>
    <%/strip%>

<%/if%>
