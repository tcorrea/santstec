<% if !empty($topLevelNavEntry.children) %>
<ul>
    <% foreach from=$topLevelNavEntry.children item=v %>
        <% if $v.isCurrent %>
        <li class="selected">
        <% else %>
        <li>
        <% /if %>
            <a href="<% $v.href %>" title="<% $v.title %>"><% $v.name %></a>
        </li>
    <% /foreach %>
</ul>
<% /if %>
