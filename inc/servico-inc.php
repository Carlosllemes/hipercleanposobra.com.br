<?php
$Read->ExeRead(TB_SERVICO, "WHERE user_empresa = :emp AND serv_status = :stats AND serv_name = :nm", "emp=" . EMPRESA_CLIENTE . "&stats=2&nm={$lastCategory}");
if (!$Read->getResult()):
  WSErro("Desculpe, mas não foi encontrando o conteúdo relacionado a esta página, volte mais tarde", WS_INFOR, null, "Aviso!");
else:
  foreach ($Read->getResult() as $dados):
    extract($dados);
    ?>
    <div class="picture-full">        
      <img src="<?= RAIZ . '/doutor/uploads/' . $serv_cover; ?>" title="<?= $serv_title; ?>" alt="<?= $serv_title; ?>"/>            
    </div>
    <?php
    $Read->ExeRead(TB_GALLERY, "WHERE gallery_rel = :id AND user_empresa = :emp AND cat_parent = :cat", "id={$serv_id}&emp=" . EMPRESA_CLIENTE . "&cat={$cat_parent}");
    if ($Read->getResult()):
      ?>
      <br class="clear"/>
      <hr>
      <ul class="gallery-blog">            
        <?php foreach ($Read->getResult() as $gallery): extract($gallery); ?>
          <li><a href="<?= RAIZ . '/doutor/uploads/' . $gallery_file; ?>" data-fancybox-group="group-img" class="lightbox" title="<?= $serv_title; ?>"><?= Check::Image('doutor/uploads/' . $gallery_file, null, $serv_title, 300, 300) ?></a></li>
        <?php endforeach; ?>
      </ul>
      <a class="fancybox" data-fancybox-group="group-img"></a>
    <?php endif; ?>

    <br class="clear"/>
    <hr>

    <div class="htmlchars">
      <?= $serv_content; ?>
    </div>

    <br class="clear"/>    
    <hr>

    <?php if ($url_relation != 0): ?>
      <div class="catalogo">            
        <h3>Confira também</h3>
        <?php
        $Read = new Read;
        $url_relation = explode(',', $url_relation);
        foreach ($url_relation as $urlsr):
          $Read->ExeRead(TB_DOWNLOAD, "WHERE dow_id = :id AND user_empresa = :emp", "id={$urlsr}&emp=" . EMPRESA_CLIENTE);
          if ($Read->getResult()):
            foreach ($Read->getResult() as $downs):
              ?>       
              <a href="<?= RAIZ . "/doutor/uploads/" . $downs['dow_file']; ?>" title="<?= $downs['dow_title'] . ' - ' . $prod_title; ?>" class="btn" target="_blank"><?= $downs['dow_title']; ?></a>                
              <?php
            endforeach;
          endif;
        endforeach;
        ?>
      </div>
    <?php endif; ?>

    <br class="clear"/>
    <?php
  endforeach;
endif;
?>