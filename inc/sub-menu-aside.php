<?php 
$Read = new Read;
$Read->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_id = :cat ORDER BY cat_title, ABS(cat_title)", "emp=" . EMPRESA_CLIENTE . "&stats=2&cat=" . Check::CatByName($URL[0], EMPRESA_CLIENTE));
if ($Read->getResult()):
  foreach ($Read->getResult() as $categItem):
    ?>
    <h2><a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($categItem['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $categItem['cat_title'] ?>"><?= $categItem['cat_title'] ?></a></h2>
    <nav itemscope itemtype="https://schema.org/SiteNavigationElement">
      <ul class="sub-menu">
        <?php
        $Read->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_parent = :cat ORDER BY cat_title, ABS(cat_title)", "emp=" . EMPRESA_CLIENTE . "&stats=2&cat={$categItem['cat_id']}");
        if ($Read->getResult()):
          foreach ($Read->getResult() as $categ):
            ?>
            <li>
              <!--//NIVEL DA CATEGORIA-->
              <a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($categ['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $categ['cat_title'] ?>" class="aside-categ"><?= $categ['cat_title'] ?></a>
              <?php
              $Read->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_parent = :cat ORDER BY cat_title, ABS(cat_title)", "emp=" . EMPRESA_CLIENTE . "&stats=2&cat={$categ['cat_id']}");
              if ($Read->getResult()):
                ?>
                <ul class="sub-menu<?= (in_array($categ['cat_name'], $URL) ? ' first' : ''); ?>">
                  <?php
                  foreach ($Read->getResult() as $categSub):
                    ?>
                    <li>
                      <a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($categSub['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $categSub['cat_title'] ?>"><?= $categSub['cat_title'] ?></a>
                       <ul class="sub-menu<?= (Check::GetLastCategory($URL) == $categSub['cat_name'] ? ' first' : ''); ?>">
                        <?php
                        //NÍVEL DO ITEM FINAL
                        $itemCat = $categSub['cat_id'];
                        include("inc/categorias-itens-inc.php");
                        ?>
                      </ul> 
                    </li>
                    <?php
                  endforeach;
                  ?>
                </ul>
                <?php
              endif;
              ?>
            </li>
            <?php
            //NÍVEL DO ITEM FINAL
            $itemCat = $categ['cat_id'];
            include("inc/categorias-itens-inc.php");
          endforeach;
        endif;
        //NÍVEL DO ITEM FINAL
        $itemCat = $categItem['cat_id'];
        include("inc/categorias-itens-inc.php");
        ?>
      </ul>  
    </nav>      
    <?php
  endforeach;
endif;
?>