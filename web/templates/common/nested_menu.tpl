<ul>
  <% foreach from=$navigation item=v %>
    <% if $v.isCurrent %>
    <li class="selected">
    <% else %>
    <li>
    <% /if %>
      <a href="<% $v.href %>" title="<% $v.title %>"><% $v.name %></a>
    </li>
    <% if $v.isCurrent && !empty($v.children) %>
    <li class="submenu">
      <ul>
        <% foreach from=$v.children item=sub %>
          <% if $sub.isCurrent %>
          <li class="selected">
          <% else %>
          <li>
          <% /if %>
            <a href="<% $sub.href %>" title="<% $sub.title %>"><% $sub.name %></a>
          </li>   
        <% /foreach %>
      </ul>
    </li>
    <% /if %>
  <% /foreach %>
</ul>
