<!DOCTYPE html>
<html>
  <head lang="<% $locale %>">
    <title><%TRANSLATE%>Page Not Found<%/TRANSLATE%></title>
    <style type="text/css">
      .error-message {
        background-color: #f3f3f3;
        border: 1px solid #ccc;
        width:400px;
        margin-left:auto;
        margin-right:auto;
        margin-top:100px;
        padding:10px;
        font-family:verdana;
      }
    </style>
  </head>
  <body>
    <div class="error-message">
      404. <%TRANSLATE 1="$url" escape="off"%>Sorry, we can't seem to find that page, click <a href="%1">here</a> to return to the homepage.<%/TRANSLATE%>
    </div>
  </body>
</html>
