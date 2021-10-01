<?php
if (!$Read):
  $Read = new Read;
endif;

/**
 * <b>Montagem do breadcrumb</b>
 * Pegar urls amigaveis e titulo dessas urls
 */
//Variavel que vai receber os itens filhos (categoria)
$arrBreadcrump = array();

if (isset($URL) && !in_array('', $URL)):
  //Armazena sempre o ultimo item da url
  $lastCategory = end($URL);

  foreach ($URL as $paginas => $value):
    if (!empty($value)):
      $Read->ExeRead(TB_CATEGORIA, "WHERE cat_name = :nm AND cat_status = :st AND user_empresa = :emp", "nm={$value}&st=2&emp=" . EMPRESA_CLIENTE);
      if ($Read->getResult()):       
        $itemSessao = $Read->getResult();
        $arrBreadcrump[] = array('titulo' => $itemSessao[0]['cat_title'], 'url' => $itemSessao[0]['cat_name'], 'parent' => $itemSessao[0]['cat_id']);
      endif;

      $Read->ExeRead(TB_DOWNLOAD, "WHERE dow_name = :nm AND user_empresa = :emp", "nm={$value}&emp=" . EMPRESA_CLIENTE);
      if ($Read->getResult()):
        $itemName = $Read->getResult();
        $arrBreadcrump[] = array('titulo' => $itemName[0]['dow_title'], 'url' => $itemName[0]['dow_name'], 'parent' => $itemName[0]['cat_parent']);
      endif;
    endif;
  endforeach;

endif;

include('inc/head.php');
?>

</head>
<body>

  <?php include('inc/topo.php'); ?>

  <div class="wrapper">

    <main>
      <div class="content">
        <section>
          <!-- Breadcrump -->
          <?php Check::SetBreadcrumb($arrBreadcrump); ?> 
          <h1><?php Check::SetTitulo($arrBreadcrump, $URL); ?></h1>

          <?php include('inc/social-media.php'); ?>

          <div class="clear"></div> 
          <article <?php
          if (count($URL) == 1): echo 'class="full"';
          endif;
          ?>>
              <?php
              $categ = Check::CatByName($lastCategory, EMPRESA_CLIENTE);

              //ARMAZENA A CAPA DE CADA SESSÃO
              $capas = new Read;
              $capas->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_id = :id ORDER BY cat_date DESC", "emp=" . EMPRESA_CLIENTE . "&stats=2&id={$categ}");
              $capas = $capas->getResult();
              $capas = $capas[0];

              $Read->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_parent = :parent ORDER BY cat_date DESC", "emp=" . EMPRESA_CLIENTE . "&stats=2&parent={$categ}");
              if (!$Read->getResult()):
                //Dados para categoria pai
                $Read->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_id = :parent ORDER BY cat_date DESC", "emp=" . EMPRESA_CLIENTE . "&stats=2&parent={$categ}");
                if ($Read->getResult()):
                  ?>
                <div class="picture-full">        
                  <?php
                  if (isset($capas['cat_cover'])):
                    ?>
                    <img src="<?= RAIZ . '/doutor/uploads/' . $capas['cat_cover']; ?>" title="<?= $capas['cat_title']; ?>" alt="<?= $capas['cat_title']; ?>"/>                      
                    <?php
                  endif;
                  ?>
                </div> 
                <br class="clear"/>
                <div class="htmlchars">
                  <?= $capas['cat_content']; ?>
                </div>                                       
                <?php
              endif;
              ?>
              <br class="clear"/>
              <hr>
              <ul class="downloads">                    
                <?php
                $Read->ExeRead(TB_DOWNLOAD, "WHERE user_empresa = :emp AND cat_parent = :cat AND dow_status = :stats ORDER BY dow_date DESC", "emp=" . EMPRESA_CLIENTE . "&cat={$categ}&stats=2");
                if ($Read->getResult()):
                  foreach ($Read->getResult() as $dow):
                    extract($dow);
                    ?>
                    <li id="<?= $dow_name; ?>">
                      <a href="<?= BASE . '/uploads/' . $dow_file; ?>" title="<?= $dow_title; ?>" target="_blank">
                        <i class="fa fa-file-pdf-o"></i>
                        <h2><?= $dow_title; ?></h2>
                      </a>
                      <p><?= Check::Words($dow_description, 10); ?></p>
                    </li> 
                    <?php
                  endforeach;
                endif;
                ?>
              </ul>
            <?php else: ?>     
              <div class="picture-full">        
                <?php
                if (isset($capas['cat_cover'])):
                  ?>
                  <img src="<?= RAIZ . '/doutor/uploads/' . $capas['cat_cover']; ?>" title="<?= $capas['cat_title']; ?>" alt="<?= $capas['cat_title']; ?>"/>                      
                  <?php
                endif;
                ?>
              </div> 
              <br class="clear"/>
              <div class="htmlchars">
                <?= $capas['cat_content']; ?>
              </div>
              <br class="clear"/>
              <hr/>
              <ul class="downloads">                    
                <?php
                foreach ($Read->getResult() as $load):
                  extract($load);
                  ?>
                  <li>
                    <a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $cat_name; ?>" title="<?= $cat_title; ?>">
                      <i class="fa fa-file-archive-o"></i>
                      <h2><?= $cat_title; ?></h2>                        
                    </a>
                    <p><?= Check::Words($cat_description, 10); ?></p>
                  </li>  
                  <?php
                endforeach;
                $Read->ExeRead(TB_DOWNLOAD, "WHERE cat_parent = :cat AND user_empresa = :emp", "cat={$categ}&emp=" . EMPRESA_CLIENTE);
                if ($Read->getResult()):
                  foreach ($Read->getResult() as $download):
                    extract($download);
                    ?>
                    <li id="<?= $dow_name; ?>">
                      <a href="<?= BASE . '/uploads/' . $dow_file; ?>" title="<?= $dow_title; ?>" target="_blank">
                        <i class="fa fa-file-pdf-o"></i>
                        <h2><?= $dow_title; ?></h2>
                      </a>
                      <p><?= Check::Words($dow_description, 10); ?></p>
                    </li> 
                    <?php
                  endforeach;
                endif;
                ?>
              </ul>
            <?php endif; ?>
          </article>  
          <?php include('inc/aside.php'); ?>
        </section>
      </div>
    </main>
  </div><!-- .wrapper -->
  <?php include('inc/footer.php'); ?>
</body>
</html>