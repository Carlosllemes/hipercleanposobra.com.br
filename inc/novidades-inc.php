<?php
$Read->ExeRead(TB_NOTICIA, "WHERE user_empresa = :emp AND noti_status = :stats AND noti_name = :nm", "emp=" . EMPRESA_CLIENTE . "&stats=2&nm={$lastCategory}");
if ($Read->getResult()):
  foreach ($Read->getResult() as $dados):
    extract($dados);
    ?>
    <div class="picture-legend picture-center">        
      <img src="<?= RAIZ . '/doutor/uploads/' . $noti_cover; ?>" title="<?= $noti_title; ?>" alt="<?= $noti_title; ?>"/>
      <strong>Imagem ilustrativa de <?= $noti_title; ?></strong>
    </div>
    
    <br class="clear"/>
    <div class="htmlchars">
      <?= $noti_content; ?>
    </div>

    <br class="clear"/>
    <i class="fa fa-calendar"></i> Publicado em: <?= date("d/m/Y", strtotime($noti_date)); ?>
    <br class="clear"/>
    <br class="clear"/>
    <?php include('inc/social-media.php'); ?>
    <div class="clear"></div> 

    <?php
  endforeach;
endif;
?>