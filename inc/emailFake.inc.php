<?php

// Verifico se foi feita a postagem do Captcha
if (isset($post['g-recaptcha-response']) && !empty($post['g-recaptcha-response'])):

  include('inc/geral.php');

  /* Valido se a ação do usuário foi correta junto ao google passando o SITE KEY e a resposta do Captcha */
  $answer = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $post['g-recaptcha-response']));

  // Se a ação do usuário foi correta executo o restante do meu formulário
  if ($answer->success):


    $Administradores = file_get_contents("http://doutor.mpisistema.com.br/_cdn/remoto/notify.json");
    $Administradores = json_decode($Administradores, true);

    $recebenome = $post["nome"];
    $recebemail = $post["email"];
    $recebetelefone = $post["telefone"];
    $recebecomo_conheceu = $post["como_nos_conheceu"];
    $recebemensagem = strip_tags(trim($post["mensagem"]));

// MENSAGEM 
    $corpo = null;
    $corpo .= "<table style='border-collapse:collapse;border-spacing:0;border-color:#761919'>
              <tr>
                <th style='font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;border-top-width:1px;border-bottom-width:1px;vertical-align:top;text-align: center;' colspan='2'>
                  <a href='{$url}' title='{$nomeSite}'><img src='{$url}/imagens/logo.png' width='300' title='{$nomeSite}' alt='{$nomeSite}'></a>
                </th>
              </tr>
              
              <tr>
                <th style='font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;border-top-width:1px;border-bottom-width:1px;vertical-align:top;text-align: center;' colspan='2'>
                  Mensagem recebida de {$recebenome}, via formulário do site.
                </th>
              </tr>
              
              <tr>";
    foreach ($post as $key => $value):
      $corpo .= "<tr>
              <td style='font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;background-color:#f9f9f9;border-top-width:1px;border-bottom-width:1px;vertical-align:top;border-right:1px solid #ccc;'>
                <b>" . strtoupper(str_replace(array('_', '-'), ' ', $key)) . ": </b>
              </td>
              <td style='font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f9f9f9;border-top-width:1px;border-bottom-width:1px;vertical-align:top'>
                {$value}
              </td>
              </tr>";
    endforeach;
    $corpo .= "</tr>   
              <tr>
                <td style='text-align:center;font-family:Arial, sans-serif;font-size:9px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;border-top-width:1px;border-bottom-width:1px;text-align:center;vertical-align:top' colspan='2'>
                  Mensagem automática enviada por - {$nomeSite} em " . date('d/m/Y H:i:s') . "
                </td>
              </tr>
              <tr>
                <td style='text-align:center;font-family:Arial, sans-serif;font-size:9px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;border-top-width:1px;border-bottom-width:1px;text-align:center;vertical-align:top' colspan='2'>
                  <a href='{$url}' title='{$nomeSite}'>{$url}</a>
                </td>
              </tr>
            </table>";


    foreach ($Administradores['Emails'] as $cont => $emails):
      
      require_once('inc/contato/mail.send.php');
      
      // ENVIO EMPRESA FAKE
      $mail->From = $EMAIL; // Remetente
      $mail->FromName = $post['nome']; // Remetente nome
      $mail->Sender = $EMAIL; // Seu e-mail

      $mail->AddAddress($emails, $EMPRESA); // Destinatário principal
      //Se houver anexo
      //if ($file['anexo']['size'] > 0):
        //$mail->AddAttachment($file['anexo']['tmp_name'], $file['anexo']['name']); // Anexo
      //endif;
      $mail->AddReplyTo($post['email'], $post['nome']); // Reply-to
      $mail->Subject = $EMPRESA . ': Notificação de Spammer'; // Assunto da mensagem
      $mail->Body = $corpo; // corpo da mensagem
      $mail->Send(); // Enviando o e-mail

      $mail->ClearAllRecipients(); // Limpando os destinatários
      //$mail->ClearAttachments(); // Limpando anexos
      
    endforeach;

    include('insercaoDeLeads.php');

//Envia o Lead para ID da doutores da web
    if (insereLeadNoSistema(29, $recebenome, $recebemail, $recebetelefone, $recebemensagem, $recebecomo_conheceu, $corpo)):
      echo '<script>'
      . '$(function () {';
      echo 'swal({
            title: "Tudo certo!",
            text: "Obrigado por entrar em contato, sua mensagem foi enviada.",
            type: "success",
            showCancelButton: false,
            confirmButtonClass: "btn-success",
            confirmButtonText: "Ok",
            closeOnConfirm: true
          }, function () {
            location.href = "' . $url . '";            
          });';
      echo '});'
      . '</script>';
    else:
      echo '<script>'
      . '$(function () {';
      echo 'swal("Opsss!", "Desculpe, mas houve um erro ao enviar a mesangem, por favor tente novamente.", "error");';
      echo '});'
      . '</script>';
    endif;

  else:

    echo '<script>'
    . '$(function () {';
    echo 'swal("Opsss!", "Desculpe, mas não foi possível verificar o reCaptcha, tente novamente.", "error");';
    echo '});'
    . '</script>';

  endif;

else:

  echo '<script>'
  . '$(function () {';
  echo 'swal("Opsss!", "Confirme que não é um robô e marque o reCaptcha.", "error");';
  echo '});'
  . '</script>';
  
endif;
