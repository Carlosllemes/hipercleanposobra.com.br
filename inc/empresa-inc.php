<?php
$Read->ExeRead(TB_QUEMSOMOS, "WHERE user_empresa = :emp AND quem_status = :stats AND quem_name = :nm", "emp=" . EMPRESA_CLIENTE . "&stats=2&nm={$lastCategory}");
if (!$Read->getResult()):
WSErro("Desculpe, mas não foi encontrando o conteúdo relacionado a esta página, volte mais tarde", WS_INFOR, null, "Aviso!");
else:
    foreach ($Read->getResult() as $dados):
        extract($dados);
        $Read->ExeRead(TB_GALLERY, "WHERE gallery_rel = :id AND user_empresa = :emp AND cat_parent = :cat", "id={$quem_id}&emp=" . EMPRESA_CLIENTE . "&cat={$cat_parent}");
        ?>
        <div class="picture-legend picture-center">        
            <img src="<?= RAIZ . '/doutor/uploads/' . $quem_cover; ?>" title="<?= $quem_title; ?>" alt="<?= $quem_title; ?>" class="picture-left"/>
            <strong>Imagem ilustrativa de <?= $quem_title; ?></strong>
        </div>     

        <div class="htmlchars">
            <?= $quem_content; ?>
        </div>

        <br class="clear"/>
        <ul class="gallery">
            <?php foreach ($Read->getResult() as $gallery): extract($gallery); ?>
                <li><a href="<?= RAIZ . '/doutor/uploads/' . $gallery_file; ?>" class="lightbox" title="<?= $quem_title; ?>"><?= Check::Image('doutor/uploads/' . $gallery_file, null, $quem_title, 110, 130) ?></a></li>
            <?php endforeach; ?>
        </ul>
        <br class="clear"/>
        <br class="clear"/>
        <?php include('inc/social-media.php'); ?>
        <div class="clear"></div> 
        <?php
    endforeach;
endif;
?>