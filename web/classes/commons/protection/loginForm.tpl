<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <title><%TRANSLATE%>Password<%/TRANSLATE%></title>
  <style type="text/css">

    body{
      font-family: Helvetica,Arial,sans-serif;
      text-align:center;
      background:#eee;
    }

    div.wrap{
      width:600px;
      margin:100px auto 0 auto;
      text-align:left;
      background:#fff;
      padding:35px 55px;
      border:1px solid #aaa;
    }

    p.inputTitle{
      margin-bottom:0;
      padding-bottom:2px;
      font-size:90%;
    }

    p.input{
      margin:0;
      padding:0;
    }

    h2{
      color:#c44;
    }

    form{
      margin:40px 0 0 0;
      padding:0;
    }

  </style>

</head>
<body>

  <div class="wrap">

    <h2><%TRANSLATE%>This is a password protected page.<%/TRANSLATE%></h2>

    <% if isset($msg) %>
      <p style="color:#c44;"><% $msg %></p>
    <% else %>
      <p><%TRANSLATE%>Please enter your login and password below.<%/TRANSLATE%></p>
    <% /if %>


    <form id="sys_siteloginform" action="" method="post">

      <p class="inputTitle"><%TRANSLATE%>Login<%/TRANSLATE%>:</p>

      <p class="input"><input type="text" name="username" /></p>

      <p class="inputTitle"><%TRANSLATE%>Password:<%/TRANSLATE%></p>

      <p class="input"><input type="password" name="password" /></p>

      <p><input type="submit" value="<%TRANSLATE%>Submit<%/TRANSLATE%>" /></p>

    </form>

  </div>

</body>
</html>
