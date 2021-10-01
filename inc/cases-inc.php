<?php
$Read->ExeRead(TB_CASE, "WHERE user_empresa = :emp AND case_status = :stats AND case_name = :nm LIMIT 0, 8", "emp=" . EMPRESA_CLIENTE . "&stats=2&nm={$lastCategory}");
if ($Read->getResult()):
  foreach ($Read->getResult() as $dados):
    extract($dados);
    ?>    
    <div class="picture-full">
      <img src="<?= RAIZ . '/doutor/uploads/' . $case_cover; ?>" title="<?= $case_title; ?>" alt="<?= $case_title; ?>"/>
    </div>
    <br class="clear"/>
    <div class="htmlchars">
      <?= $case_content; ?>
    </div>

    <br class="clear"/>
    <br class="clear"/>

    <?php
    $Read->ExeRead(TB_GALLERY, "WHERE gallery_rel = :id AND user_empresa = :emp AND cat_parent = :cat", "id={$case_id}&emp=" . EMPRESA_CLIENTE . "&cat={$cat_parent}");
    if ($Read->getResult()):
      ?>
      <h3>Confira mais imagem:</h3>
      <ul class="gallery-blog">      
        <?php foreach ($Read->getResult() as $gallery): extract($gallery); ?>
          <li><a href="<?= RAIZ . '/doutor/uploads/' . $gallery_file; ?>" data-fancybox-group="group-img" class="lightbox" title="<?= $case_title; ?>"><?= Check::Image('doutor/uploads/' . $gallery_file, $case_title, null, 250, 150) ?></a></li>
        <?php endforeach; ?>
      </ul>
      <a class="fancybox" data-fancybox-group="group-img"></a>
    <?php endif; ?>

    <div class="htmlchars">
      <i class="fa fa-calendar"></i> <time datetime="<?= date("Y-m-d", strtotime($case_date)); ?>">Publicado em: <?= date("d/m/Y", strtotime($case_date)); ?></time>
    </div>

    <div class="clear"></div> 
    <?php include('inc/social-media.php'); ?>
    <div class="clear"></div>    

    <?php
  endforeach;
endif;
?>