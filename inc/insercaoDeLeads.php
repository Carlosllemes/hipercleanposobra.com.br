<?php

/**
 * <b>Responsável por gravar os leads via post</b>
 * @param type $cliente_id
 * @param type $nome
 * @param type $email
 * @param type $telefone
 * @param type $mensagem
 * @param type $como_nos_conheceu
 * @param type $corpo
 * @return boolean
 */
function insereLeadNoSistema($cliente_id = null, $nome = null, $email = null, $telefone = null, $mensagem = null, $como_nos_conheceu = null, $corpo = null) {
  //Lead padrão do banco
  $lead = array(
    'cliente_id' => $cliente_id,
    'nome' => $nome,
    'email' => $email,
    'telefone' => $telefone,
    'como_nos_conheceu' => (isset($como_nos_conheceu) && !empty($como_nos_conheceu) ? $como_nos_conheceu : 'Não informado'),
    'mensagem' => $mensagem,
    'jSon' => (isset($corpo) && !empty($corpo) ? $corpo : "Nulo"),
    'Hash' => openssl_encrypt("d640a8a4f9927b7ffa03126ced5f87155027870e", 'DES-EDE3-CBC', 'c17055ac4e99f9d95f4fc5a9edce2b45c6253d35', 0, '07bcc012')
  );

  //Envia os dados via cURL
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_URL, 'http://doutor.mpisistema.com.br/_cdn/remoto/leads.php');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $lead);
  $resposta = curl_exec($ch);
  curl_close($ch);

  //Resposta da requisição ao servidor
  if ($resposta === 'success'):
    return true;
  else:

    //Lista de administradores recebidas por requisição
    $administradores = str_replace(';', ',', $resposta);

    $emails = null;
    $to = explode(',', $administradores);
    foreach ($to as $key => $value):
      $emails .= 'Administrador ' . $key . ' <' . $value . '>, ';
    endforeach;

    include('inc/geral.php');

    $title = "Falha na gravação de Leads:" . $nomeSite;
    $headers = "MIME-Version: 1.0 \r\n"
        . "Content-type: text/html; charset=utf-8 \r\n"
        . "To: {$emails} \r\n"
        . "From: naoresponder@doutoresdaweb.com.br \r\n"
        . "Reply-To: naoresponder@doutoresdaweb.com.br \r\n"
        . "Date: " . date("Y/m/d H:i:s") . " \r\n"
        . "X-Mailer: PHP/" . phpversion() . " \r\n";

    $msg = "<html>
            <head>
             <title>{$title}</title>
            </head>
              <body>
                 ID: " . $lead['cliente_id'] . ", <br/>"
        . "Nome: " . $lead['nome'] . ", <br/>"
        . "E-mail: " . $lead['email'] . ", <br/>"
        . "Telefone: " . $lead['telefone'] . ", <br/>"
        . "Como nos conheceu: " . $lead['como_nos_conheceu'] . ", <br/>"
        . "Mensagem: " . $lead['mensagem'] .
        "</body>
          </html>";

    mail($administradores, $title, $msg, $headers);

    return false;

  endif;
}
