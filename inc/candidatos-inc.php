<?php
include('inc/geral.php');
require_once 'inc/contato/mail.send.php';

// MENSAGEM
$corpo = "
<html>
<body>
<table width='680' border='0' cellspacing='8'>
<tr> <td> NOME </td><td> <strong> {$post['cand_nome']} </strong> </td> </tr>
<tr> <td> E-MAIL </td><td> <strong> {$post['cand_email']} </strong> </td>	</tr>
<tr> <td> TELEFONE </td><td> <strong> {$post['cand_telefone']} </strong> </td> </tr>
<tr> <td> ÁREA</td><td> <strong> {$post['cand_vaga']} </strong> </td>	</tr>
<tr> <td> ESTÁGIO</td><td> <strong> {$post['cand_estagio']} </strong> </td>	</tr>			
<tr> <td> CARGO </td><td> <strong> {$post['cand_cargo']} </strong> </td>	</tr>
<tr> <td> &nbsp; </td><td> &nbsp; </td> </tr>
</table>
</body>
</html> ";

// ENVIO EMPRESA
$mail->From = $EMAIL; // Remetente
$mail->FromName = $post['cand_nome']; // Remetente nome
$mail->Sender = $EMAIL; // Seu e-mail
$mail->AddAddress($emailContato, $EMPRESA); // Destinatário principal
$mail->AddAttachment($post['cand_file']); // Anexo
$mail->AddReplyTo($post['cand_email'], $post['cand_nome']); // Reply-to
$mail->Subject = $EMPRESA . ': Currículo recebido pelo site'; // Assunto da mensagem
$mail->Body = $corpo; // corpo da mensagem
$enviaEmp = $mail->Send(); // Enviando o e-mail
$mail->ClearAllRecipients(); // Limpando os destinatários

// ENVIO USUÁRIO
$mail->From = $recebemail; // Remetente
$mail->FromName = $EMPRESA; // Remetente nome
$mail->Sender = $EMAIL; // Seu e-mail
$mail->AddAddress($post['cand_email'], $post['cand_nome']); // Destinatário principal
$mail->AddAttachment($post['cand_file']);
$mail->Subject = $EMPRESA . ': Recebemos sua mensagem'; // Assunto da mensagem
$mail->Body = $corpo; // corpo da mensagem
$mail->Send(); // Enviando o e-mail
$mail->ClearAllRecipients(); // Limpando os destinatários
$mail->ClearAttachments(); // Limpando anexos					

if ($enviaEmp):
  $mensagem = "Enviado com Sucesso";
else:
  $mensagem = "Não Enviado";
endif;
echo "<script> alert('$mensagem'); location.href='{$url}'; </script>";
