<%strip%>

        <% if $_SYSTEM_MODE == 'DESIGN' %>
            <div class="sys_wrap_splt" id="<%$properties.id%>_splt" style="left:<%$properties.lw%>; ">&nbsp;</div>
            <div class="sys_wrap_spacer_splt">
        <% /if %>

        <style>
          .column_<% $widgetId %> {
            width: 100%;
            -moz-box-sizing:border-box;
            -webkit-box-sizing: border-box;
            box-sizing:border-box;
          }

          .column_<% $widgetId %>:after {
            content: "";
            display: table;
            clear: both;
          }

          .column_<% $widgetId %> .left {
            text-align: left;
            vertical-align: top;
            width: <% $properties.lw %>;
            padding: <% $properties.left_column.padding %>;
            float: left;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing:border-box;
          }

          .column_<% $widgetId %> .right {
            vertical-align: top;
            width: <% $properties.rw %>;
            padding: <% $properties.right_column.padding  %>;
            float: left;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
          }

          <% if _MOBILE %>
          @media only screen and (max-width: 950px) {
            #Left_<% $widgetId %>,  #Right_<% $widgetId %> {
              display: block;
              width: 100%;
              float: left;
              margin: 0;
              -moz-box-sizing: border-box;
              -webkit-box-sizing: border-box;
              box-sizing: border-box;
            }
          }
          <% /if %>
        </style>

        <div class="column_<% $widgetId %> column_divider" >
              <%region tagName="div" name="Left" description="" defaultHeight="150px" class="left" %>
              <%region tagName="div" name="Right" description="" defaultHeight="150px" class="right" %>
        </div>


        <% if $_SYSTEM_MODE == 'DESIGN' %>
            </div>
        <% /if %>


<%/strip%>
