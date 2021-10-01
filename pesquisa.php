<?php
$s = urldecode($URL[1]);
$h1 = 'Pesquisa no site';
$title = 'Pesquisa';
$desc = 'Pesquisa no site por produtos comercializados. Veja esses e outros produtos comercializados. Dúvidas? Entre em contato conosco e fique por dentro de novidades.';
$key = '';
$var = 'Pesquisa de produtos';
include('inc/head.php');
?>
</head>
<body>
  <?php include('inc/topo.php'); ?>
  <div class="bg-breadcumb">
    <div class="wrapper">
      <?= $caminho ?>
      <h1><?= $h1 ?></h1>
    </div>
  </div>

  <div class="wrapper">
    <main>
      <div class="content">
        <section>
          <article class="full"> 
            <h2>Você pesquisou por: <?= $s; ?></h2>
            <?php
            
            include('inc/paginacao.inc.php');
            
            $Read->ExeRead(TB_PRODUTO, "WHERE prod_status = :st AND user_empresa = :emp AND (prod_title LIKE '%' :s '%' OR prod_description LIKE '%' :s '%' OR prod_content LIKE '%' :s '%') LIMIT :limit OFFSET :offset", "st=2&emp=" . EMPRESA_CLIENTE . "&s={$s}&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
            if (!$Read->getResult()):
              //Se não encontrar um produto pesquisará uma categoria relacionada
              $Read->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND (cat_title LIKE '%' :s '%' OR cat_description LIKE '%' :s '%' OR cat_content LIKE '%' :s '%') LIMIT :limit OFFSET :offset", "emp=" . EMPRESA_CLIENTE . "&stats=2&s={$s}&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
              if (!$Read->getResult()):
                WSErro("Desculpe, mas sua pesquisa para <b>{$s}</b> não retornou resultados. Talvez você queira utilizar outros termos! Você ainda pode usar nosso menu de navegação para encontrar o que procura!", WS_INFOR, null, "Resultado da pesquisa");
              else:
                ?>                          
                <ul class="thumb_pesquisa">
                  <?php
                  foreach ($Read->getResult() as $cat):
                    extract($cat);
                    ?>
                  <li class="col-4 col-12-sm">
                      <a rel="nofollow" href="<?= RAIZ . '/' . trim(Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $cat_name, '/'); ?>" title="<?= $cat_title; ?>">
                        <div class='superior'>
                        <?php
                        //Pega imagem para adicionar à categoria 
                        if (empty($cat_cover)):
                          $Read->ExeRead(TB_PRODUTO, "WHERE user_empresa = :emp AND prod_status = :stats AND FIND_IN_SET(:cat, cat_parent) ORDER BY prod_date DESC LIMIT 1", "emp=" . EMPRESA_CLIENTE . "&stats=2&cat={$cat_id}");
                          if ($Read->getResult()):
                            foreach ($Read->getResult() as $prod):
                              echo Check::Image('doutor/uploads/' . $prod['prod_cover'], $cat_title, null, 300, 300);
                            endforeach;
                          else:
                            echo Check::Image('doutor/uploads/images/default.png', $cat_title, null, 300, 300);
                          endif;
                        else:
                          echo Check::Image('doutor/uploads/' . $cat_cover, $cat_title, null, 300, 300);
                        endif;
                        ?>
                        </div>
                      </a>
                      <div class='base'>
                        <h2><a href="<?= RAIZ . '/' . trim(Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $cat_name, '/'); ?>" title="<?= $cat_title; ?>"><?= $cat_title; ?></a></h2>
                        
                        <a class="btn-site3" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $cat_name; ?>" title="<?= $cat_title; ?>">saiba mais <i class="fa fa-plus-square" aria-hidden="true"></i></a>
                      </div>
                    </li>
                  <?php endforeach; ?>                                        
                </ul> 
                <div class="clear"></div>
                <hr>
                <div class="pull-right">
                  <?php
                  //Paginação
                  $Pager->ExePaginator(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND (cat_title LIKE '%' :s '%' OR cat_description LIKE '%' :s '%' OR cat_content LIKE '%' :s '%')", "emp=" . EMPRESA_CLIENTE . "&stats=2&s={$s}");
                  echo $Pager->getPaginator();
                  ?>
                </div>
              <?php
              endif;
            else:
              ?>
              <ul class="thumb_pesquisa">
                <?php
                foreach ($Read->getResult() as $prod):
                  extract($prod);
                  ?>
                  <li class="col-4 col-12-sm">
                    <a href="<?= RAIZ . '/' . trim(Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $prod_name, '/'); ?>" title="<?= $prod_title; ?>">
                      <div class='superior'>
                        <?= Check::Image('doutor/uploads/' . $prod_cover, $prod_title, null, 270, 150) ?>
                      </div>
                    </a>
                    <div class='base'>
                      <h2><a href="<?= RAIZ . '/' . trim(Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $prod_name, '/'); ?>" title="<?= $prod_title; ?>"><?= $prod_title; ?></a></h2>
                      
                      <a href="<?= RAIZ . '/' . trim(Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $prod_name, '/'); ?>" title="<?= $prod_title; ?>" class="btn-site3">saiba mais <i class="fa fa-plus-square" aria-hidden="true"></i></a>
                    </div>
                  </li>
                  <?php
                endforeach;
                ?>
              </ul>
              <div class="clear"></div>
              <hr>
              <div class="pull-right">
                <?php
                //Paginação
                $Pager->ExePaginator(TB_PRODUTO, "WHERE prod_status = :st AND user_empresa = :emp AND (prod_title LIKE '%' :s '%' OR prod_description LIKE '%' :s '%' OR prod_content LIKE '%' :s '%')", "st=2&emp=" . EMPRESA_CLIENTE . "&s={$s}");
                echo $Pager->getPaginator();
                ?>
              </div>
            <?php endif; ?>

          </article>
        </section>
      </div>
    </main>
  </div>
  <?php include('inc/footer.php'); ?>
</body>
</html>