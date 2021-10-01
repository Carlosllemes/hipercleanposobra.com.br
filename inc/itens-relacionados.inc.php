<?php
$rand = str_replace('-', ' ', Check::GetLastCategory($URL));
$Read->ExeRead(TB_PRODUTO, "WHERE prod_status = :st AND prod_id != :id AND user_empresa = :emp AND (prod_description LIKE '%' :s '%' OR prod_content LIKE '%' :s '%') ORDER BY RAND() LIMIT 0,6", "st=2&id={$prod_id}&emp=" . EMPRESA_CLIENTE . "&s={$rand}");
if ($Read->getResult()):
  ?> 
  <div class="clear"></div>                       
  <div class="col-12">
    <div class="bloco">
      <h2 class="titulo"><i class="fa fa-star"></i> Quem viu <?= $prod_title; ?>, viu também</h2>
      <div class="owl-carousel owl-theme">
        <?php
        foreach ($Read->getResult() as $prod_home):
          extract($prod_home);
          ?>
          <div class="item">    
            <a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $prod_name; ?>" title="<?= $prod_title; ?>">
              <?= Check::Image('doutor/uploads/' . $prod_cover, $prod_title, null, 400, 250); ?>                                           
            </a>
            <h2><a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $prod_name; ?>" title="<?= $prod_title; ?>"><?= $prod_title; ?></a></h2>
          </div>
          <?php
        endforeach;
        ?>
      </div>
    </div>
  </div>
<?php endif; ?>