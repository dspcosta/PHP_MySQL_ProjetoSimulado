<?php

session_start();


$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

require_once("PHPMailer.php");
require_once("SMTP.php");
require_once("Exception.php");



$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'simulado@gmail.com';
$mail->Password = 'senhasimulada';


$mail->setFrom('simulado@gmail.com', 'Daniel');
$mail->addAddress('simulado@gmail.com'); 
$mail->Subject = 'E-mail de contato da loja!';
$mail->msgHTML("<html>De: {$nome} <br> Email: {$email} <br> Mensagem: {$mensagem} <br></html>");
$mail->AltBody ="de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}"; #alternativa.
#$mail->addAttachment(""); Caso tivesse um attachment para enviar.

if ($mail->Send()) {
    $_SESSION['success'] = "Mensagem enviada com sucesso!";
    header("Location: index.php");

} else {
    $_SESSION['danger'] = "Erro ao enviar a mensagem" . $mail->ErrorInfo;
    header("Location: contato.php");
    
}

die();


