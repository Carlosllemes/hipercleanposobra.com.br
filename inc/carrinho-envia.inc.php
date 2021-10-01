<?php

// Verifico se foi feita a postagem do Captcha
if (isset($post['g-recaptcha-response']) && !empty($post['g-recaptcha-response'])):

  //Variaveis globais do site
  include ('inc/geral.php');

  /* Valido se a ação do usuário foi correta junto ao google passando o SITE KEY e a resposta do Captcha */
  $answer = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $post['g-recaptcha-response']));

  // Se a ação do usuário foi correta executo o restante do meu formulário
  if ($answer->success):

    $data = date("d/m/Y H:i:s");
  
    $produtos = null;
    foreach ($_SESSION['CARRINHO'] as $IDPRO => $PRODUCT):
      $produtos .= "<tr><td> Código: </td> <td> <strong> {$PRODUCT['prod_codigo']} </strong> </td></tr>";
      $produtos .= "<tr><td> Produto: </td> <td> <strong> {$PRODUCT['prod_title']} </strong> </td></tr>";
      $produtos .= "<tr><td> Valor unitário: </td> <td> <strong> R$ " . number_format($PRODUCT['prod_preco'], 2, ',', '.') . " </strong> </td></tr>";
      $produtos .= "<tr style='font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;border-top-width:1px;border-bottom-width:1px;vertical-align:top;text-align: center;'><td> Modelos: </td> <td> <strong>Quantidades:</strong> </td></tr>";
      foreach ($PRODUCT['modelos'] as $itens => $quantidade):
        $produtos .= "<tr><td> {$itens} </td> <td> <strong> {$quantidade} </strong> </td></tr>";
      endforeach;
      $produtos .= "<tr style='background: #eee; border-bottom:1px solid #ccc; padding: 2px; height:2px;'><td ></td><td></td></tr>";
    endforeach;
    $produtos .= "<tr><td><h1>Valor total R$ " . (isset($post['orc_total']) ? $post['orc_total'] : "0,00") . "</h1></td></tr>";

    //Atenticador do e-mail com SSL
    require_once('inc/contato/mail.send.php');

    //Armazena se houver um arquivo na variavel
    $file = ($post['anexo']['tmp_name'] ? $post['anexo'] : null);

    //Depois de setar os arquivos, remove do scopo de verificação e libera a memoria
    unset($post['g-recaptcha-response'], $post['anexo']);

    //Informações que serão gravadas no isereleads
    $recebenome = $post["orc_nome"];
    $recebemail = $post["orc_email"];
    $recebetelefone = $post["orc_telefone"];
    $recebecomo_conheceu = $post["orc_frase"];
    $recebemensagem = strip_tags(trim($post["orc_mensagem"]));

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
              
              {$produtos}
                
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


// ENVIO EMPRESA
    $mail->From = $EMAIL; // Remetente
    $mail->FromName = $post['orc_nome']; // Remetente nome
    $mail->Sender = $EMAIL; // Seu e-mail

    $mail->AddAddress($emailContato, $EMPRESA); // Destinatário principal
    //Se houver anexo
    if (isset($file) && !empty($file)):
      $mail->AddAttachment($file['tmp_name'], $file['name']); // Anexo
    endif;
    //$mail->AddCC('adm@site.com.br', 'Teste'); // Copia
    //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
    $mail->AddReplyTo($post['orc_email'], $post['orc_nome']); // Reply-to
    $mail->Subject = $EMPRESA . ': Contato pelo site'; // Assunto da mensagem
    $mail->Body = $corpo; // corpo da mensagem
    $mail->Send(); // Enviando o e-mail
    $mail->ClearAllRecipients(); // Limpando os destinatários
    $mail->ClearAttachments(); // Limpando anexos
    // ENVIO USUÁRIO
    $mail->From = $recebemail; // Remetente
    $mail->FromName = $EMPRESA; // Remetente nome
    $mail->Sender = $EMAIL; // Seu e-mail
    $mail->AddAddress($post['orc_email'], $post['orc_nome']); // Destinatário principal
    //Se houver anexo
    if (isset($file) && !empty($file)):
      $mail->AddAttachment($file['tmp_name'], $file['name']); // Anexo
    endif;
    $mail->Subject = $EMPRESA . ': Recebemos sua mensagem'; // Assunto da mensagem
    $mail->Body = $corpo; // corpo da mensagem
    $mail->Send(); // Enviando o e-mail
    $mail->ClearAllRecipients(); // Limpando os destinatários
    $mail->ClearAttachments(); // Limpando anexos			


    include ('inc/insercaoDeLeads.php');

    if (insereLeadNoSistema($idCliente, $recebenome, $recebemail, $recebetelefone, $recebemensagem, $recebecomo_conheceu, $corpo)):
      unset($_SESSION['CARRINHO']);
      echo '<script>'
      . '$(function () {';
      echo 'swal({
            title: "Tudo certo!",
            text: "Obrigado por entrar em contato, sua mensagem foi enviada com sucesso",
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
      echo 'swal("Opsss!", "Desculpe, mas houve um erro ao enviar a mensagem, por favor tente novamente.", "error");';
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