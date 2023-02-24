<?php
	session_start();
	
	//Incluir o ficheiro PHPMailerAutoload
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	require_once ("PHPMailer/src/PHPMailer.php");
	require_once ("PHPMailer/src/SMTP.php");
	require_once ("PHPMailer/src/Exception.php");
	
	$mail = new PHPMailer(true); 							//Iniciar a classe PHPMailer
	$mail->isSMTP();										//Define que a mensagem será SMTP
	$mail->Mailer ="smtp";
		
	//$mail->SMTPDebug = 3; 								//Fazer o debug da ligação para verificar os erros [só utilizado para teste]
	$mail->SMTPAuth = true; 								//Habilitamos a autenticação por SMTP
	$mail->SMTPSecure = 'tls'; 								//Definimos a criptografia a ser usada
	$mail->Port = 587; 										//porta para autenticação via tLs
	//$mail->SMTPSecure = 'ssl'; 							//Definimos a criptografia a ser usada
	//$mail->Port = 465; 									//porta para autenticação via ssl
	$mail->Host = 'smtp.gmail.com:587'; 					//Protocolo SMTP utilizado pelo Gmail
	$mail->Username = 'pap.niko2020@gmail.com';			//colocamos um conta ativa do gmail
	$mail->Password = 'papniko123'; 						//colocamos a senha definida para a conta gmail
	
	$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); // Desligar as opções de segurança

	
	//Definir o remetente #############################################################################################
	
	$mail->setFrom('pap.niko2020@gmail.com', "The Horde");			//Definir o email do remetente
	//$mail->addReplyTo('no-reply@gmail.com');				//Informar um email para o qual serão enviadas as respostas
		
	//Definir o destinatário ##########################################################################################
	
	$mail->addAddress($_SESSION["email"], 'The Horde');	//Adicionar um destinatário
	//$mail->addCC('email@gmail.com', 'Cópia');				//Informar o email para cópia com conhecimento [campo opcional]
	//$mail->addBCC('email@gmail.com', 'Cópia Oculta')		//Informar o email para cópia sem conhecimento [campo opcional]
		
	//Definir o assunto e corpo do email ###############################################################################
	$mail->IsHTML(true); 									// Define que o e-mail será enviado como HTML
	$mail -> CharSet = "UTF-8";
	$mail->Subject = "Email changed on The Horde";						//Assunto do email
	$mail->Body    = '<body style="color: white; text-align:center;">
	<table width="100%" border="0" cellspacing="0" cellpadding="20" background="http://aluno14738.damiaodegoes.pt/img/bg.png" style="background-repeat: no-repeat; background-position: top center; background-size: cover;">
		<tr>
			<td>
				<h1>Hello '. $_SESSION["username"] .' !</h1>
				<hr style="background-color: orange; height: 7px; border-color: black;">
				<p style="font-size: 1.5em; color: white">We want to notice you that your password was changed on our website. <br> If you changed it you can ignore this email safely, otherwise we hardly encourage you to verify your account.</p>
				<hr style="background-color: orange; height: 7px; border-color: black;">
				<p style="font-size: 1em">The Horde Team!</p>
			</td>
		</tr>
	</table>
	</body>';
	//$mail->AddAttachment('images/phpmailer.gif'); 		//Adicionar um anexo [campo opcional]
	
	//Validar o envio do email
	if(!$mail->send()) {
		echo 'Não foi possível enviar a mensagem.<br>';
		echo 'Erro: ' . $mail->ErrorInfo;
		header("Location:http://aluno14738.damiaodegoes.pt/index.php");
		
	} else {
		header("Location: http://aluno14738.damiaodegoes.pt/profile/profile.php?page=security&pwdC=1");
	}
	
?>


