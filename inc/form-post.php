<?php
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($post) && isset($post['EnviaContato'])):

//Inclue o verificador de Spammers do formulário
include('inc/searchSpammer.inc.php');

//Armazena o reCapcha
$recapt = $post['g-recaptcha-response'];

//Remove o submit e o reCpatcha para validação de campos vazios
unset($post['EnviaContato'], $post['g-recaptcha-response']);
//Arquivos válidos que podem ser enviados
$MimeTypes = array(
'application/pdf',
'application/msword',
'application/vnd.ms-excel',
'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
'application/x-excel',
'application/x-msexcel',
'image/png',
'image/pjpeg',
'image/jpeg',
'image/jpg',
'image/pjpeg',
'image/gif'
);
//Verifica se os campos obrigatórios foram todos preenchidos

$post['nome'] = $post['nome'] == '' ? 'Não informado' : $post['nome'];
$post['email'] = $post['email'] == '' ? 'Não informado' : $post['email'];
$post['telefone'] = $post['telefone'] == '' ? 'Não informado' : $post['telefone'];
$post['como_nos_conheceu'] = $post['como_nos_conheceu'] == '' ? 'Não informado' : $post['como_nos_conheceu'];
$post['mensagem'] = $post['mensagem'] == '' ? 'Não informado' : $post['mensagem'];

if (in_array('', $post)):
echo '<script>'
. '$(function () {';
echo 'swal("Aviso!", "Campos com * são obrigatórios.", "info");';
echo '});'
. '</script>';
//Verifica se existem spammers nos campos do formulário
elseif (SearchSpammer($post)):

//Inclui o emailFake, que fará a notificação aos adms do site
include('inc/emailFake.inc.php');
//Verifica se existe anexo para envio e se o anexo está na lista do MimeTypes
elseif (isset($_FILES['anexo']) && !empty($_FILES['anexo']['tmp_name']) && !in_array($_FILES['anexo']['type'], $MimeTypes)):
echo '<script>'
. '$(function () {';
echo 'swal("Aviso!", "Escolha um arquivo válido para enviar como anexo da mensagem", "info");';
echo '});'
. '</script>';
else:
//Caso as condições sejam atendidas, o reCaptcha volta para o post e o anexo é adicionado ao post
$post['g-recaptcha-response'] = $recapt;
$post['anexo'] = ($_FILES['anexo']['tmp_name'] ? $_FILES['anexo'] : null);

//Arquivo que faz a verificação do reCaptcha e o envio dos e-mails
include('contato-envia.php');
endif;
endif;
?>