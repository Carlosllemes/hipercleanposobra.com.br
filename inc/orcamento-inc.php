<?php

include('inc/geral.php');
require_once('inc/contato/mail.send.php');

unset($post['user_empresa']);

$corpo = null;

// MENSAGEM
$corpo .= '
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;border:none;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
.tg .tg-baqh{text-align:center;vertical-align:top;font-size:12px;padding:0px}
.tg .tg-yw4l{vertical-align:top}
.tg .tg-b7b8{background-color:#f9f9f9;vertical-align:top}
</style>
';
$corpo .= '<h1>Solicitação de orçamento</h1>';
$corpo .= '<p>Confira os dados do orçamento abaixo</p>';
$corpo .= '<table class="tg">';

foreach ($post as $key => $value):
  if (!empty($value) && isset($key)):
    $corpo .= '<tr><td class="tg-yw4l">' . strtoupper(str_replace("orc_", "", $key)) . '</td><td class="tg-b7b8"><strong>{$post[$key]}</strong></td></tr>';
  endif;
endforeach;

$corpo .= '<tr><td class="tg-baqh" colspan="2"><hr></td></tr>';
$corpo .= '<tr><td class="tg-baqh" colspan="2"><img src="' . RAIZ . '/imagens/logo.png" title="' . SITE_NAME . '" alt="' . SITE_NAME . '"></td></tr>';
$corpo .= '<tr><td class="tg-baqh" colspan="2">Mensagem enviada em: ' . date("d/m/Y H:i:s") . '</td></tr>';
$corpo .= '<tr><td class="tg-baqh" colspan="2"><a href="' . RAIZ . '" target="_blank" title="' . SITE_NAME . '">' . HTACCESS . '</a></td></tr>';

$corpo .= '</table>';

// CASO TENHA ANEXO
if (isset($post['orc_anexo']) && $post['orc_anexo']['size'] > 0):
  $nomes = $_FILES['anexo']['name'];
// Recebo o nome do arquivo
  $nome_temp = $_FILES['anexo']['tmp_name'];
// Recebe o nome do endereços temporário
  $tamanho = $_FILES['anexo']['size'];
// Recebe o tamanho do arquivo
  $meudiretorio = "inc/contato/arquivos_temporarios/";
// Aqui você define onde o arquivo será armazenado temporário
  move_uploaded_file($nome_temp, $meudiretorio . $nomes);
//Move o arquivo temporário
endif;


// ENVIO EMPRESA
//$emailContato = "rafael.lima.doutoresdaweb@gmail.com";

$mail->From = $EMAIL; // Remetente
$mail->FromName = $post['orc_nome']; // Remetente nome
$mail->Sender = $emailContato; // Seu e-mail
$mail->AddAddress($emailContato, $EMPRESA); // Destinatário principal

$mail->AddAttachment($meudiretorio . $nomes); // Anexo
//$mail->AddCC('contato@doutoresdaweb.com.br', 'Contato'); // Copia
//$mail->AddBCC('naoresponder@doutoresdaweb.com.br', 'Fulano da Silva'); // Cópia Oculta

$mail->AddReplyTo($post['orc_email'], $post['orc_nome']); // Reply-to
$mail->Subject = $EMPRESA . ': Solicitação de orçamento do site'; // Assunto da mensagem
$mail->Body = $corpo; // corpo da mensagem

$envioEmp = $mail->Send(); // Enviando o e-mail
$mail->ClearAllRecipients(); // Limpando os destinatários
$mail->ClearAttachments(); // Limpando anexos
// ENVIO USUÁRIO
$mail->From = $recebemail; // Remetente
$mail->FromName = $EMPRESA; // Remetente nome
$mail->AddAddress($post['orc_email'], $post['orc_nome']); // Destinatário principal

$mail->AddAttachment($meudiretorio . $nomes); // Anexo
//$mail->AddCC('contato@doutoresdaweb.com.br', 'Contato'); // Copia
//$mail->AddBCC('naoresponder@doutoresdaweb.com.br', 'Fulano da Silva'); // Cópia Oculta

$mail->Subject = $EMPRESA . ': Recebemos seu pedido de orçamento'; // Assunto da mensagem
$mail->Body = $corpo; // corpo da mensagem

$envioUsu = $mail->Send(); // Enviando o e-mail
$mail->ClearAllRecipients(); // Limpando os destinatários
$mail->ClearAttachments(); // Limpando anexos					

include('inc/insercaoDeLeads.php');

if (insereLeadNoSistema($idCliente, $recebenome, $recebemail, $recebetelefone, $recebemensagem)):
  $mensagem = "Obrigado, sua mensagem foi enviada com sucesso!";
else:
  $mensagem = "Opss! Houve um erro e sua mensagem não pode ser enviada, por favor entre em contato conosco no telefone: " . $ddd . $fone;
endif;

echo "<script> alert('$mensagem'); location.href='" . RAIZ . "'; </script>";
