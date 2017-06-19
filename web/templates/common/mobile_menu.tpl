<ul class="mob_menu_list">
  <% foreach from=$navigation item=v name=menus %>
    <li class="<% if $v.isCurrent %>selected<% /if %>">
      <a href="<% $v.href %>" title="<% $v.title %>"><% $v.name %></a>
      <% if !empty($v.children) %>
        <svg class="mob_more_toggle" x="0px" y="0px" height="24" width="24" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
          <circle cx="12" cy="12" r="11" stroke-width="1.5" fill="none" />
          <line class="down_arrow" x1="5" y1="10" x2="12" y2="17" stroke-width="2" />
          <line class="down_arrow" x1="12" y1="17" x2="19" y2="10" stroke-width="2" />
          <line class="up_arrow" x1="5" y1="15" x2="12" y2="8" stroke-width="2" />
          <line class="up_arrow" x1="12" y1="8" x2="19" y2="15" stroke-width="2" />
        </svg>
        <ul class="mob_submenu_list">
          <% foreach from=$v.children item=sub %>
            <li>
              <a class="mob_submenu_items" href="<% $sub.href %>" title="<% $sub.title %>"><% $sub.name %></a>
            </li>
          <% /foreach %>
        </ul>
        <% /if %>
    </li>
  <% /foreach %>
</ul>
