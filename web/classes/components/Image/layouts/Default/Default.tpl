<%strip%>

    <%if $properties.link.href && $system.mode != 'DESIGN' %>
        <a href="<%$properties.link.href%>"
            <%if $properties.title%> title="<%$properties.title%>"<%/if%>
            <%if $properties.link.target %> target="<%$properties.link.target%>" <%/if%>
            >
    <%/if%>
        <% if $system.mode == 'DESIGN'%>
           <span style='display:block;position:relative'>
               <span id="<%$properties.id%>_upload_text" style='<% if $src != '' %>display:none;<% else %>display:block;<% /if %>position:absolute;left:0;bottom:5px;width:100%;background:#333;color:#fff;border-top:1px solid #000;border-bottom:1px solid #000;'>
                   <div style='padding:5px 10px;font-family:Arial;font-size:13px;'><%TRANSLATE%>Double click to upload a photo<%/TRANSLATE%></div>
               </span>
               <img id="<%$properties.id%>_img" src="<%$src|default:'classes/components/Image/resources/image_placeholder.jpg'|anticache %>" <%if $properties.alt%> alt="<%$properties.alt%>" <%/if%> style='width:<%$properties.imgwidth%>; border:none;'/>
           </span>
        <% else %>
            <% if $src %>
                <style>
                  #<%$properties.id%>_img {
                    -moz-box-sizing: border-box;
                    -webkit-box-sizing: border-box;
                    box-sizing: border-box;
                    width: <%$properties.imgwidth%>;
                    border:none;
                    max-width: 100%;
                    height: auto;
                  }

                </style>
                <img id="<%$properties.id%>_img" src="<%$src|anticache %>" <%if $properties.alt%> alt="<%$properties.alt%>" <%/if%> />
            <% /if %>
        <% /if %>
    <%if $properties.link.href && $system.mode != 'DESIGN' %>
        </a>
    <%/if%>
<%/strip%>
