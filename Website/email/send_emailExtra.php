<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "pap.niko2020@gmail.com";
$mail->Password   = "papniko123";

$mail->IsHTML(true);
$mail->AddAddress($_SESSION["email"], 'The Horde');
$mail->SetFrom("pap.niko2020@gmail.com", "from-name");
	// $mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
	// $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
$mail->Subject = "Thanks for registering to The Horde";
$content = "Welcome!<br>Thanks for registering to The Horde, you can now proceed to login, have fun!<br>The Horde Team";

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo 'Não foi possível enviar a mensagem.<br>';
	echo 'Erro: ' . $mail->ErrorInfo;
	// header("Location: http://aluno14738.damiaodegoes.pt/errorpage.php");
} else {
	header("Location: http://aluno14738.damiaodegoes.pt/register/register.php?error=0");
}