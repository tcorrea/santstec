<ul class="sys_navigation">
    <% foreach from=$navigation item=v name=menus %>
        <% if $v.isCurrent %>
        <li id="ys_menu_<% $smarty.foreach.menus.index %>"class="selected">
        <% else %>
        <li id="ys_menu_<% $smarty.foreach.menus.index %>">
        <% /if %>
            <a href="<% $v.href %>" title="<% $v.title %>"><% $v.name %></a>
        </li>
    <% /foreach %>
</ul>
<% if $submenutype == 'flyover' || $submenutype == 'flyover_vertical' %>
<script>
/* jshint ignore:start */
$(document).ready(function() {
    flyoutMenu.initFlyoutMenu(
        <% $navigationJSON %>
    , '<% $submenutype %>');
});
/* jshint ignore:end */
</script>
<% /if %>
