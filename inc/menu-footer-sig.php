<?php
$Read = new Read;
$Read->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_parent IS NULL ORDER BY cat_order ASC", "emp=" . EMPRESA_CLIENTE . "&stats=2");
if ($Read->getResult()):
  foreach ($Read->getResult() as $sessao):
    ?>
    <li>  
      <a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($sessao['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $sessao['cat_title'] ?>"><?= $sessao['cat_title'] ?></a>
  	</li>
  	<?php
  endforeach;
endif;
?>