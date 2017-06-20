<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>SantsTec - Envio de email</title>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="imagens/favicon.ico">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<?php 

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$comments = $_POST['comments'];
	
	$message = "<strong>Nome: </strong>".$nome;
	$message .= "<br><strong>Email: </strong>".$email;
	$message .= "<br><strong>Mensagem: </strong>".$comments;

	$to = "santstec@santstec.com.br";
	$subject = "Contato pelo site";

	$headers 	= "Content-Type:text/html; charset=utf-8\n";
	$headers .= "From: santstec.com.br<santstec@santstec.com.br>\n";
	$headers .= "X-Sender: <>\n";
	$headers .= "X-Mailer: PHP v".phpversion()."\n";
	$headers .= "X-IP: ".$_SERVER['REMOTE_ADDR']."\n";
	$headers .= "Return-Path: <santstec@santstec.com.br>\n";
	$headers .= "MINE-Version: 1.0\n";

	if(mail($to, $subject, $message, $headers)){
		echo "<div class='container'>
		Email enviado com sucesso! <a href='/'>Voltar</a>
		</div>";
	}else{
		echo "
		<div class='container'>
		Erro no envio do email. Tente novamente mais tarde ou entre em contato pelo email: santstec@santstec.com.<br>
		<a href='/'>Voltar</a>
		</div>
		";
	}
	?>
</body>
</html>