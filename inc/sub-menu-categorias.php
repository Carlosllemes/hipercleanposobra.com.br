<?php
$Read = new Read;
$Read->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_parent IS NULL ORDER BY cat_order ASC", "emp=" . EMPRESA_CLIENTE . "&stats=2");
if ($Read->getResult()):
  $numMenuItem = 0;
  foreach ($Read->getResult() as $sessao):
    ?>
    <li class="dropdown">  
      <!--NÍVEL DA SESSÃO-->
      <?php
        // MENU BRASMODULOS
        if(isset($sigMenuIcons) && count($sigMenuIcons) > 0):
      ?>
      <a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($sessao['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $sessao['cat_title'] ?>">
        <i class="fa fa-<?=$sigMenuIcons[$numMenuItem++]?> fa-4x"></i> 
        <span class="d-block"><?= $sessao['cat_title'] ?></span>
      </a>
      <?php
        else:
      ?>
      <a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($sessao['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $sessao['cat_title'] ?>"><?= $sessao['cat_title'] ?></a>
      <?php
        // END MENU BRASMODULOS
        endif;
      ?>
      <?php
      $Read->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_parent = :id ORDER BY cat_date ASC", "emp=" . EMPRESA_CLIENTE . "&stats=2&id={$sessao['cat_id']}");
      if ($Read->getResult()):
        ?>
        <ul class="sub-menu">
          <?php foreach ($Read->getResult() as $categ): ?>
            <li class="dropdown">
              <!--//NÍVEL DA CATEGORIA-->
              <a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($categ['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $categ['cat_title'] ?>"><?= $categ['cat_title'] ?></a>
              <?php
              $Read->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_parent = :id ORDER BY cat_date ASC", "emp=" . EMPRESA_CLIENTE . "&stats=2&id={$categ['cat_id']}");
              if (!$Read->getResult()):
                ?>
                <ul class="sub-menu">
                  <?php
                  $itemCat = $categ['cat_id'];
                  include("inc/categorias-itens-inc.php");
                  ?>
                </ul>
              <?php else: ?>
                <ul class="sub-menu">
                  <?php foreach ($Read->getResult() as $subcateg): ?>
                    <li class="dropdown">
                      <!--//NÍVEL DA SUBCATEGORIA-->                      
                      <a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($subcateg['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $subcateg['cat_title'] ?>"><?= $subcateg['cat_title'] ?></a>

                      <?php //if (!Check::CatByName($lastCategory, EMPRESA_CLIENTE)): ?>
                      <!--//NÍVEL FINAL DO ITEM-->
                      <ul class="sub-menu-itens">
                        <?php
                        $itemCat = $subcateg['cat_id'];
                        include("inc/categorias-itens-inc.php");
                        ?>
                      </ul>
                      <?php //endif; ?>

                    </li>
                    <?php
                  endforeach;
                  $itemCat = $subcateg['cat_parent'];
                  include("inc/categorias-itens-inc.php");
                  ?>
                </ul>
              <?php endif; ?>
            </li>            
            <?php
          endforeach;
          $itemCat = $categ['cat_parent'];
          include("inc/categorias-itens-inc.php");
          ?>
        </ul>
        <?php 
          else:
           ?>
            <ul class="sub-menu">
              <?php
                $itemCat = $sessao['cat_id'];
                include("inc/categorias-itens-inc.php");
              ?>
            </ul>
      <?php endif; ?>   
    </li>
    <?php
  endforeach;
endif;
?>