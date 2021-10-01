<?php
$Read->ExeRead(TB_PRODUTO, "WHERE user_empresa = :emp AND prod_status = :st ORDER BY prod_date DESC LIMIT 0,4", "emp=" . EMPRESA_CLIENTE . "&st=2");
if ($Read->getResult()):
  ?> 
<div class="clear"></div>                       
  <h2>Confira a nossa linha de produtos</h2>
  <ul class="thumbnails">
    <?php
    foreach ($Read->getResult() as $prod_home):
      extract($prod_home);
      ?>
      <li>
        <a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $prod_name; ?>" title="<?= $prod_title; ?>">
          <?= Check::Image('doutor/uploads/' . $prod_cover, $prod_title, null, 300, 300); ?>                                           
        </a>
        <h2><a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $prod_name; ?>" title="<?= $prod_title; ?>"><?= $prod_title; ?></a></h2>
        <?php if (!empty($prod_preco) && $prod_preco != 0.00): ?>
          <div class="thumb-preco">
            <?php if (!empty($prod_preco_old) && $prod_preco_old != 0.00): ?>
              <h3>De: R$ <?= number_format($prod_preco_old, 2, ',', '.'); ?></h3>
            <?php endif; ?>
            <h4>Valor R$ <?= number_format($prod_preco, 2, ',', '.'); ?></h4>
          </div>
        <?php endif; ?>
      </li>
      <?php
    endforeach;
    ?>
  </ul>
<?php endif; ?>

