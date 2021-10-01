<?php

//header('Content-Type: text/html; charset=utf-8');
function SearchSpammer($ArrayPost) {

  $verify = array('Hash' => openssl_encrypt("d640a8a4f9927b7ffa03126ced5f87155027870e", 'DES-EDE3-CBC', 'c17055ac4e99f9d95f4fc5a9edce2b45c6253d35', 0, '07bcc012'));

//Envia os dados via cURL
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_URL, 'http://doutor.mpisistema.com.br/_cdn/remoto/blacklist.php');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $verify);
  $resposta = curl_exec($ch);
  curl_close($ch);

  $JSon = json_decode(str_replace("'", '"', $resposta), true);

  //Se não houver JSon carregar lista padrão
  if (empty($JSon) || ($resposta === false)):
    $ArrayPalavras = array(
      "reclameaqui",
      "wordpress.com",
      "986718198",
      "José Paulo Pereira",
      "Soluções industriais",
      "Ideal Trends",
      "Doutores da web",
      "Soluções industriais",
      "Busca Cliente"
    );
  else:
    $ArrayPalavras = $JSon['Lista'];
  endif;
    
  //Trata palavras para ser interpretadas pela função
  $palavras = array_map('strtolower', $ArrayPalavras);
  $palavras = array_map('trim', $palavras);
  $palavras = array_map('strip_tags', $palavras);

  $post = array_map('strtolower', $ArrayPost);
  $post = array_map('trim', $post);
  $post = array_map('strip_tags', $post);

  //Array de resultados diferentes de falso encontrou o spammer
  $resultados = array();

  //Varre post e varre palavras restritas
  foreach ($palavras as $key => $value):
    foreach ($post as $chave => $valores):
      $resultados[] = stripos($valores, $value);
    endforeach;
  endforeach;

  //Varre o resultado e retorna true se o resultado for diferente de false
  foreach ($resultados as $Id => $bool):
    if ($bool !== false):
      return true;
      break;
    endif;
  endforeach;
}

/**
 * <b>Instruções de uso</b>
 * Para projetos antigos que não possuem reCaptcha
 * -Remover o action do formulário e substituir adicionar o script acima do formulário na mesma página
 * de contato.
 */
//$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//include('inc/searchSpammer.inc.php');
//if (SearchSpammer($post)):
//Encontrou Spam
//  include('inc/emailFake.inc.php');
//else:
//Não encontrou Spam
//  include('contato-envia.php');
//endif;

/**
 * <b>Instruções de uso</b>
 * Para projeto novos que possuem o reCaptcha
 * -Adicionar a include da função searchSpammer após a variavel $post 
 * e abaixo adicionar o elseif após o primeiro if() ou substituir trechos do script abaixo
 */
//include('inc/searchSpammer.inc.php');
//if (in_array('', $post)):
//  echo "<script> alert('Campos com * são obrigatórios.');</script>";
//elseif (SearchSpammer($post)):
//  include('inc/emailFake.inc.php');
//else:
//  $post['g-recaptcha-response'] = $recapt;
//  include('contato-envia.php');
//endif; 