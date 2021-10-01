<?php
$h1 = "Carrinho";
$title = $h1;
$desc = "Carrinho - Lista de itens do orçamento de produtos comercializados. Entre em contato para solicitar um orçamento. Clique aqui e conheça nossa linha de produtos.";
$key = "carrinho, produtos, orçamento";

$pagInterna = "Carrinho";
$urlPagInterna = "carrinho";

include('inc/head.php');
?>
<!--Google ReCaptcha V2-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<!--/Google ReCaptcha V2-->

<!--SweetAlert Modal-->
<link rel="stylesheet" href="<?= $url; ?>js/sweetalert/css/sweetalert.css"/>
<script src="<?= $url; ?>js/sweetalert/js/sweetalert.min.js"></script>
<!--/SweetAlert Modal-->

<!--Máscara dos campos-->
<script src="<?= $url; ?>js/maskinput.js"></script>
<script>
  $(function () {
    $('input[name="orc_telefone"]').mask('(99) 99999-9999');
    $('input[name="orc_frase"]').mask('99999-999');
  });
</script>
<!--/Máscara dos campos-->
</head>
<body>
  <?php include('inc/topo.php'); ?>
  <div class="wrapper">
    <main>
      <div class="content" itemscope itemtype="https://schema.org/Product">
        <section>
          <?= $caminho ?>
          <h1><?= $h1 ?></h1>
          <article class="full" style="box-sizing: border-box; font-size: 14px;">
                            <?php
                $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if (isset($post) && isset($post['enviar_orc'])):

                  $post['user_empresa'] = EMPRESA_CLIENTE;

                  //Inclue o verificador de Spammers do formulário
                  include('inc/searchSpammer.inc.php');

                  //Armazena o reCapcha
                  $recapt = $post['g-recaptcha-response'];

                  //Remove o submit e o reCpatcha para validação de campos vazios
                  unset($post['enviar_orc'], $post['g-recaptcha-response']);

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
                    $Contact = new Orcamento($post);
                    $error = $Contact->getError();
                    var_dump($post);
                    if (!$Contact->getResult()):
                      WSErro($error[0], $error[1]);
                    else:
                    //Caso as condições sejam atendidas, o reCaptcha volta para o post e o anexo é adicionado ao post
                    $post['g-recaptcha-response'] = $recapt;                    
                      include("inc/carrinho-envia.inc.php");
                    endif;
                  endif;
                endif;
                ?>   
            <div class="clear"></div>            
            
            <h2>Confira abaixo os itens de seus carrinho de orçamento.</h2>
            <?php if (count($_SESSION['CARRINHO']) == 0): ?>
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Opss!!</h3>
                </div>
                <div class="panel-body">Desculpe, mas não existem produtos no carrinho de orçamento.</div>
              </div>
              <br class="clear"/>
              <br class="clear"/>
              <button class="btn_orc" onclick="location = '<?= RAIZ; ?>/produtos'">Voltar para produtos</button>
              <br class="clear"/>
              <br class="clear"/>
              <br class="clear"/>
              <br class="clear"/>
              <?php
            else:
              ?>
              <div class="col-12 j_carrinho">                                
                <div class="col-2" style="background: #2172b3; color: #FFF;">Código</div>
                <div class="col-6" style="background: #2172b3; color: #FFF;">Produto</div>
                <div class="col-2" style="background: #2172b3; color: #FFF;">Preço unitário</div>
                <div class="col-2" style="background: #2172b3; color: #FFF; text-align: center;">Remover</div>              

                <div class="clear"></div>
                <?php foreach ($_SESSION['CARRINHO'] as $id => $value): ?>
                  <div id="<?= $id; ?>">                                        
                    <div class="col-2" style="background: #ccc; color: #111;"><?= (!empty($value['prod_codigo']) ? $value['prod_codigo'] : 'Cod-001'); ?></div>
                    <div class="col-6" style="background: #ccc; color: #111;"><?= Check::Words($value['prod_title'], 8); ?></div>                
                    <div class="col-2" style="background: #ccc; color: #111;">R$ <?= $value['prod_preco']; ?></div>                
                    <div class="col-2" style="background: #ccc; text-align: center; color: #D2413A; "><i class="fa fa-close j_removeCart" tabindex="<?= $id; ?>" title="Remover produto"></i><input type="hidden" class="j_base" value="<?= BASE; ?>"/></div>
                    <div class="col-12">
                      <div class="col-12" style="background: #eee;">Modelos:</div>
                      <?php foreach ($value['modelos'] as $itens => $qtd): ?>
                        <div id="<?= $id . $itens; ?>">
                          <div class="col-3" style="border-left: 1px solid #eee; border-bottom: 1px solid #eee;"><?= $itens; ?></div>
                          <div class="col-3" style="border-right: 1px solid #ccc; border-bottom: 1px solid #eee;">Qtd. <input type="text" name="prod_qtd" value="<?= $qtd; ?>" class="qtdCart j_qtdCart" data-qtd="<?= $id; ?>" title="<?= $itens; ?>"/> <button class="btn_none j_removeItemCart" data-qtd="<?= $id; ?>" title="Remover item <?= $itens; ?>" value="<?= $itens; ?>"><i class="fa fa-close"></i></button></div>
                        </div>
                      <?php endforeach; ?>
                    </div>                
                  </div>                
                  <div class="clear"></div>                
                <?php endforeach; ?>
              </div>
              <div class="clear"></div>
              <div class="htmlchars">
                <hr>
                <div class="col-12">
                  Valor total do orçamento: <b>R$ <span class="j_totalValor"></span></b>
                </div>
                <div class="clear"></div>
                <hr>
                <div class="col-12">
                  <button class="btn_orc" onclick="location = '<?= RAIZ; ?>/produtos'"><i class="fa fa-shopping-cart"></i> Continuar comprando</button>
                  <button class="btn_orc j_solicitar"><i class="fa fa-envelope"></i> Solicitar orçamento</button>                    
                </div> 
                <!-- FORM -->
  
                <div class="col-12">
                  <form method="post" class="formulario j_formulario">
                    <div class="col-4"><label>Nome:</label></div><div class="col-8"><input type="text" name="orc_nome" placeholder="Digite seu nome" required value="<?php
                      if (isset($post['orc_nome'])): echo $post['orc_nome'];
                      endif;
                      ?>"/></div>
                    <div class="clear"></div>
                    <div class="col-4"><label>E-mail:</label></div><div class="col-8"><input type="text" name="orc_email" placeholder="Digite seu e-mail" required value="<?php
                      if (isset($post['orc_email'])): echo $post['orc_email'];
                      endif;
                      ?>"/></div>
                    <div class="clear"></div>
                    <div class="col-4"><label>Telefone:</label></div><div class="col-8"><input type="text" name="orc_telefone" placeholder="Digite seu telefone com DDD" required value="<?php
                      if (isset($post['orc_telefone'])): echo $post['orc_telefone'];
                      endif;
                      ?>"/></div>                                    
                    <div class="clear"></div>
                    <div class="col-4"><label>CEP:</label></div><div class="col-8"><input type="text" name="orc_frase" placeholder="Digite seu CEP" required value="<?php
                      if (isset($post['orc_frase'])): echo $post['orc_frase'];
                      endif;
                      ?>"/></div>                                    
                    <div class="clear"></div>
                    <div class="col-4"><label>Mensagem:</label></div><div class="col-8"><textarea name="orc_mensagem" placeholder="Coloque aqui qualquer observação que queira nos enviar" rows="4"><?php
                        if (isset($post['orc_mensagem'])): echo $post['orc_mensagem'];
                        endif;
                        ?></textarea></div>
                    <div class="clear"></div>
                    <div class="col-4"></div>
                    <div class="col-4">
                      <div class="g-recaptcha" data-sitekey="<?= $siteKey; ?>"></div>                      
                    </div>
                    <div class="col-4">                      
                      <input class="btn_enviar" name="enviar_orc" type="submit" value="Enviar"/>
                    </div>
                  </form>
                </div>
              </div>

              <br class="clear"/>
              <br class="clear"/>

            <?php endif; ?>
          </article>

          <br class="clear">

        </section>
      </div>
    </main>
  </div><!-- .wrapper -->
  <?php include('inc/footer.php'); ?>
</body>
</html>