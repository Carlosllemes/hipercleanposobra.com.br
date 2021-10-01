<?php
if (!$Read):
  $Read = new Read;
endif;

//Get dados da home
if (!empty($URL[0])):
  $Read->ExeRead(TB_HOME, "WHERE user_empresa = :emp", "emp=" . EMPRESA_CLIENTE);
  $itemSessao = $Read->getResult();
  extract($itemSessao[0]);
endif;

$h1 = $home_title;
$title = 'Home';
$desc = $home_description;
$key = $home_keywords;

include('inc/head.php');
include('inc/fancy.php');
?>
<!-- #####CAROUSEL PRECISA DE:##### -->
<script async src="<?= $url ?>js/owl.carousel.js" type="text/javascript"></script>
<script async src="<?= $url ?>js/slide-carousel.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?= $url ?>css/owl.carousel.css">
<link rel="stylesheet" href="<?= $url ?>css/owl.theme.css">
<!-- FIM CAROUSEL -->
</head>
<body>
  <?php
  include('inc/topo.php');
  include('inc/banner.inc.php');
  ?>

  <main>
    <div class="content">
      <section>
        <?php
        if ($home_status != 2):
          echo "<h1>Esta página está em manutenção, volte mais tarde.</h1>";
        else:
          ?>
          <div class="wrapper">
            <h1 class="title"><?= $home_title; ?></h1>   
            <div class="clear"></div>
          </div>

          <?= $home_content; ?>          

          <?php Check::SetAtributosInc($attr_id); ?>

          <div class="clear"></div>
          <div class="wrapper">
            <?php include('inc/social-media.php'); ?>
          </div>        

        <?php endif; ?>

      </section>  
    </div>
  </main>    

  <?php include('inc/footer.php'); ?>
  <!-- #####NIVO-SLIDER PRECISA DE:##### -->
  <link rel="stylesheet" href="<?= $url ?>nivo/nivo-slider.css" type="text/css" media="screen" />
  <script async type="text/javascript" src="<?= $url ?>nivo/jquery.nivo.slider.js"></script>
  <!-- FIM NIVO -->
  <script type="text/javascript">
    $(window).load(function () {
      $('#slider').nivoSlider();
    });
  </script>
</body>
</html>