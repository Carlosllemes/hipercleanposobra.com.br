<?php
$h1     = 'Contato';
$title  = 'Contato';
$desc   = 'Entre em contato e envie sua mensagem pelo formulário e logo entraremos em contato. Qualquer dúvida estamos a disposição pelo email ou telefone';
$key    = '';
$var    = 'Contato';
include('inc/head.php');
?>
<link rel="stylesheet" href="<?=$url?>js/sweetalert/css/sweetalert.css"/>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="<?=$url?>js/sweetalert/js/sweetalert.min.js"></script>
<script src="<?=$url?>js/maskinput.js"></script>
<!--/Máscara dos campos-->
</head>
<body>
  <?php include('inc/topo.php'); ?>
  <main>
    <div class="content">
      <section>
        <?=$caminho?>
        <div class="wrapper">
          <h2>Fale com a <span class="title"> <?=$nomeSite?>:</span></h2>
          <!-- Map Cleanup -->
          <?php
          preg_match('/(?<=src=").*?(?=[\"])/', $mapa, $out);
          $mapa = $out[0];
          ?>
          <!-- End Map Cleanup -->
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
      <div class=" gap-50 p-0">
        <form enctype="multipart/form-data" method="post" class="form">
          <input placeholder="Nome *" type="text" name="nome" required/>
          <input placeholder="E-mail *" type="text" name="email" required/>
          <input placeholder="Telefone *" type="text" name="telefone" required/>
              <textarea placeholder="Mensagem *" name="mensagem" rows="5" required></textarea>
              <span class="obrigatorio">Os campos com * são obrigatórios</span>
              <div class="g-recaptcha" style="transform:scale(0.8);-webkit-transform:scale(0.8);transform-origin:0 0;-webkit-transform-origin:0 0;" data-sitekey="<?= $siteKey; ?>"></div>
              <input type="submit" name="EnviaContato" value="Enviar" class="ir">
            </form>
          </div>
        </div> <!-- end wrapper -->
      </section>
    </div> <!-- end content -->
  </main>
  <?php include('inc/footer.php');?>
  <script>
    <?include ('js/fake-select.js');?>
  </script>
  <script>
  $(function () {
    $('input[name="telefone"]').mask('(00) 90000-0000');
    $('input[name="CEP"]').mask('00000-000');
    $('input[name="CPF"]').mask('000.000.000-00');
    $('input[name="CNPJ"]').mask('00.000.000/0000-00');
  });
</script>
</body>
</html>