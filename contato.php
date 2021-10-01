<?php
$h1     = 'Contato';
$title  = 'Contato';
$desc   = 'Entre em contato e envie sua mensagem pelo formulário e logo entraremos em contato. Qualquer dúvida estamos a disposição pelo email ou telefone';
$key    = '';
$var    = 'Contato';

include('inc/head.php');
?>
<!--Google ReCaptcha V2-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<!--/Google ReCaptcha V2-->
<!--SweetAlert Modal-->
<link rel="stylesheet" href="<?= $url; ?>/js/sweetalert/css/sweetalert.css"/>
<script src="<?= $url; ?>/js/sweetalert/js/sweetalert.min.js"></script>
<!--/SweetAlert Modal-->
<!--Máscara dos campos-->
<script src="<?= $url; ?>/js/maskinput.js"></script>
<script>
$(function () {
$('input[name="telefone"]').mask('(99) 99999-9999');
});
</script>
<!--/Máscara dos campos-->
</head>
<body>
<?php include('inc/topo.php'); ?>
<div class="content">
  <section>
    <?= $caminhoBreadClientes?>
    <main class="wrapper">
      <div class="container contact">
          <img class="fwidth" src="<?=$url?>imagens/banner-contato.png" alt="<?=$h1?>" title="<?=$h1?>">

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

          <div class="form col-4">
            <form enctype="multipart/form-data" method="post">
              <label for="nome">Nome: <span>*</span> </label>
              <input onKeyUp="UcWords(this)" type="text" name="nome" value="<?php
              if (isset($post['nome'])): echo $post['nome'];
              endif;
              ?>" id="nome" required/>
              <label for="email">E-mail: <span>*</span> </label>
              <input onKeyUp="minusculas(this)" type="text" name="email" value="<?php
              if (isset($post['email'])): echo $post['email'];
              endif;
              ?>" id="email" required/>
              <label for="tel">Telefone: <span>*</span> </label>
              <input type="text" name="telefone" value="<?php
              if (isset($post['telefone'])): echo $post['telefone'];
              endif;
              ?>" id="tel" required/>
              <!--                 <label for="anexo">Anexo:</label>
              <input type="file" name="anexo" id="anexo"/> -->
              <!-- <label>Como nos conheceu?: <span>*</span> </label>
              <select name="como_nos_conheceu" required>
                <option value="">-- Selecione --</option>
                <option  value="Busca do Google">Busca do Google</option>
                <option  value="Outros Buscadores">Outros Buscadores</option>
                <option  value="Links patrocinados">Links patrocinados</option>
                <option  value="Outros Anúncios">Outros Anúncios</option>
                <option  value="Facebook">Facebook</option>
                <option  value="Twitter">Twitter</option>
                <option  value="Google+">Google+</option>
                <option  value="Indicação">Indicação</option>
                <option  value="Outros">Outros</option>
              </select> -->
              <label>Mensagem: <span>*</span> </label>
              <textarea name="mensagem" rows="5" required><?php
              if (isset($post['mensagem'])): echo $post['mensagem'];
              endif;
              ?></textarea>
              <div class="g-recaptcha" style="transform:scale(0.8);-webkit-transform:scale(0.8);transform-origin:0 0;-webkit-transform-origin:0 0;" data-sitekey="<?= $siteKey; ?>"></div>
              <span class="bt-submit">
                <input type="submit" name="EnviaContato" value="Enviar" class="ir" />
              </span>
            </form>
            <span class="obrigatorio">Os campos com * são obrigatórios</span>
          </div>
          
            <div class="col-4 contact-form">
                
            <strong><?= $rua . " - " . $bairro . " - " . $cidade . " - " . $UF . " - <br> " . $cep ?></strong><br><br>
            <?php
              foreach ($fone as $key => $value) {
                echo "<i class=\"fa fa-$value[2]\"></i> <strong>$value[0] $value[1]</strong><br><br>";
              }
            ?>
            <strong><i class="fa fa-envelope"></i> <?= $emailContato ?></strong><br><br>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14618.160093755778!2d-46.74152004531246!3d-23.6566385358991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce517bdefd64f9%3A0x9679cf297960140a!2sR.%20Jo%C3%A3o%20Fernandes%20Camisa%20Nova%20J%C3%BAnior%2C%20854%20-%20Jardim%20S%C3%A3o%20Lu%C3%ADs%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2005844-000!5e0!3m2!1spt-BR!2sbr!4v1589648989361!5m2!1spt-BR!2sbr" style=" width:100%; height:400px; border:0;" ></iframe>
            </div>
            <div class="contact-form col-4">
               <strong><?= $rua2 . " - " . $bairro2 . " - " . $cidade2 . " - " . $UF2 . " - <br>" . $cep2 ?></strong><br><br>
            <?php
              foreach ($fone as $key => $value) {
                echo "<i class=\"fa fa-$value[2]\"></i> <strong>$value[0] $value[1]</strong><br><br>";
              }
            ?>
            <strong><i class="fa fa-envelope"></i> <?= $emailContato ?></strong><br><br>
             <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14618.160097768085!2d-46.74152!3d-23.6566385!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce517bdefd64f9%3A0x9679cf297960140a!2sR.%20Jo%C3%A3o%20Fernandes%20Camisa%20Nova%20J%C3%BAnior%2C%20854%20-%20Jardim%20S%C3%A3o%20Lu%C3%ADs%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2005844-000!5e0!3m2!1spt-BR!2sbr!4v1589649427839!5m2!1spt-BR!2sbr" style=" width:100%; height:400px; border:0;" ></iframe> 
            </div>
        </div>
      </section>
    </div>
  </main>
</div>
<?php include('inc/footer.php');?>
</body>
</html>