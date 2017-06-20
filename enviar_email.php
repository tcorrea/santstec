<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
		echo "Email enviado com sucesso! <a href='/'>Voltar</a>";
	}else{
		echo "Erro no envio do email. Tente novamente mais tarde ou entre em contato pelo email: santstec@santstec.com.<br>
		<a href='/'>Voltar</a>";
	}

	
	
	

	?>
</body>
</html>