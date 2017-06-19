<% if $header.googleWebmaster.enabled %>
  <meta name="google-site-verification" content="<% $header.googleWebmaster.content|escape %>" />
<% /if %>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<% if $header.base_url %>
  <base href="<% $header.base_url %>" />
<% /if %>

<% $header.crawlTrigger %>

<title><% $header.pageTitle|escape %></title>

<% foreach from=$header.dns_prefetch_urls item=url %>
  <link rel="dns-prefetch" href="<% $url %>">
<% /foreach %>

<% if $header.rss.enabled %>
  <link rel="alternate" type="application/rss+xml" title="<% $header.pageTitle|escape %> RSS feed" href="<% $header.rss.url %>" />
<% /if %>

<meta name="description" content="<% $header.meta.description|escape %>" />
<meta name="keywords" content="<% $header.meta.keywords|escape %>" />

<% if $header.favicon%>
  <link href="<% $header.favicon|escape %>" rel="shortcut icon" type="image/x-icon" />
  <link href="<% $header.favicon|escape %>" rel="icon" type="image/x-icon" />
<% /if %>

<% if $header.customTracking.enabled %>
  <!-- Start of user defined header tracking codes -->
  <% $header.customTracking.content %>
  <!-- End of user defined header tracking codes -->
<% /if %>

<% if $header.defaultCss.enabled %>
  <style type="text/css" id="styleCSS">
    <% $header.defaultCss.content %>
  </style>
<% /if %>

<% if $header.cssOverrides.enabled %>
  <style id="yola-user-css-overrides" type="text/css">
    <% $header.cssOverrides.content %>
  </style>
<% /if %>

<script src="//ajax.googleapis.com/ajax/libs/webfont/1.4.2/webfont.js" type="text/javascript"></script>

<% if $header.styleDesigner.enabled %>
  <% if $header.styleDesigner.fonts %>
    <style type="text/css">
      @import url("//fonts.googleapis.com/css?family=<% $header.styleDesigner.fonts %>");
    </style>
  <% /if %>

  <style type="text/css" id="styleOverrides">
    <% include file=$header.siteStylePath %>
  </style>

  <% if $smarty.const._SYSTEM_MODE == 'DESIGN' %>
    <script id="styleTemplate" type="text/x-handlebars-template">
      <% include file=$header.templateCssPath templatemode='DESIGN' %>
      <% include file=$header.siteStylePath templatemode='DESIGN' %>
    </script>
  <% /if %>
<% /if %>

<% if $header.legacyFonts.enabled %>
  <style id="yola-css-fonts-overrides" type="text/css">
    <% $header.legacyFonts.fonts %>
  </style>
<% /if %>


<% foreach from=$header.dynamicCssComponents item=component %>
  /* CSS for <% $component.className %> component (<% $component.propertiesId %>) */
  <style type="text/css">
    <% $component.styleTemplate %>
  </style>
<% /foreach %>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">window.jQuery || document.write('<script src="<% '/components/bower_components/jquery/dist/jquery.js'|anticache %>"><\/script>')</script>
<link rel="stylesheet" type="text/css" href="<% 'classes/commons/resources/flyoutmenu/flyoutmenu.css'|anticache %>" />
<script type="text/javascript" src="<% 'classes/commons/resources/flyoutmenu/flyoutmenu.js'|anticache %>"></script>
<link rel="stylesheet" type="text/css" href="<% 'classes/commons/resources/global/global.css'|anticache %>" />

<script type="text/javascript">
  var swRegisterManager = {
    goals: [],
    add: function(swGoalRegister) {
      this.goals.push(swGoalRegister);
    },
    registerGoals: function() {
      while(this.goals.length) {
        this.goals.shift().call();
      }
    }
  };

  window.swPostRegister = swRegisterManager.registerGoals.bind(swRegisterManager);
</script>

<% foreach from=$header.component_classes item=component_class %>
  <% $component_class.css_include %>
  <% $component_class.header_tpl %>
<% /foreach %>
