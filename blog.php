<?php
if (!$Read):
  $Read = new Read;
endif;

/**
 * <b>Montagem do breadcrumb</b>
 * Pegar urls amigaveis e titulo dessas urls
 */
//Variavel que vai receber as categorias, itens filhos (categoria) e item final.
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

      $Read->ExeRead(TB_BLOG, "WHERE blog_name = :nm AND user_empresa = :emp", "nm={$value}&emp=" . EMPRESA_CLIENTE);
      if ($Read->getResult()):
        $itemName = $Read->getResult();
        $arrBreadcrump[] = array('titulo' => $itemName[0]['blog_title'], 'url' => $itemName[0]['blog_name'], 'parent' => $itemName[0]['cat_parent']);
      endif;
    endif;
  endforeach;

endif;

include('inc/head.php');
include('inc/fancy.php');
?>

</head>
<body>
  <?php include('inc/topo.php'); ?>
  <div class="wrapper">

    <main>
      <div class="content">
        <section itemid="<?= RAIZ; ?>/blog" itemscope itemtype="http://schema.org/LiveBlogPosting">
          <!-- Breadcrump -->
          <?php Check::SetBreadcrumb($arrBreadcrump); ?> 
          <h1><?php Check::SetTitulo($arrBreadcrump, $URL); ?> </h1>

          <?php include('inc/social-media.php'); ?>
          <div class="clear"></div>

          <article <?php
          if (count($URL) == 1): echo 'class="full"';
          endif;
          ?>>
              <?php
              $categ = Check::CatByName($lastCategory, EMPRESA_CLIENTE);
              if (!$categ):
                require 'inc/blog-inc.php';
              else:
                $Read->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_parent = :parent ORDER BY cat_date DESC", "emp=" . EMPRESA_CLIENTE . "&stats=2&parent={$categ}");
                if (!$Read->getResult()):

                  //Dados para categoria pai
                  $Read->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_id = :parent ORDER BY cat_date DESC", "emp=" . EMPRESA_CLIENTE . "&stats=2&parent={$categ}");
                  if (!$Read->getResult()):
                    WSErro("Desculpe, mas não foi encontrando o conteúdo relacionado a esta página, volte mais tarde", WS_INFOR, null, "Aviso!");
                  else:
                    $category = $Read->getResult();
                    $category = $category[0];
                    ?>
                  <div class="picture-full">        
                    <?php if (isset($category['cat_cover'])): ?>
                      <img src="<?= RAIZ . '/doutor/uploads/' . $category['cat_cover']; ?>" title="<?= $category['cat_title']; ?>" alt="<?= $category['cat_title']; ?>"/>                      
                      <?php
                    else:
                      $Read->ExeRead(TB_BLOG, "WHERE user_empresa = :emp AND blog_status = :stats AND cat_parent = :id ORDER BY blog_date DESC LIMIT 1", "emp=" . EMPRESA_CLIENTE . "&stats=2&id={$category['cat_id']}");
                      $join = $Read->getResult();
                      if ($Read->getResult()):
                        ?>
                        <img src="<?= RAIZ . '/doutor/uploads/' . $join[0]['blog_cover']; ?>" title="<?= $category['cat_title']; ?>" alt="<?= $category['cat_title']; ?>"/>                      
                        <?php
                      endif;
                    endif;
                    ?>
                  </div>  
                  <br class="clear"/>
                  <div class="htmlchars">
                    <?= $category['cat_content']; ?>
                  </div>                                        
                <?php
                endif;
                ?>
                <br class="clear"/>
                <hr>
                <ul class="blog">                    
                  <?php
                  $Read->ExeRead(TB_BLOG, "WHERE user_empresa = :emp AND cat_parent = :cat AND blog_status = :stats ORDER BY blog_date DESC", "emp=" . EMPRESA_CLIENTE . "&cat={$categ}&stats=2");
                  if ($Read->getResult()):
                    foreach ($Read->getResult() as $blog):
                      extract($blog);
                      ?>
                      <li class="blog-item blog-item-large"> 
                        <div class="col_thumb-large col-4">
                          <a rel="nofollow" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $blog_name; ?>" title="<?= $blog_title; ?>">
                            <?= Check::Image('doutor/uploads/' . $blog_cover, $blog_title, null, 300, 300) ?>
                          </a>
                        </div>

                        <div class="col-8">
                          <h2><a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $blog_name; ?>" title="<?= $blog_title; ?>"><?= $blog_title; ?></a></h2>
                          <small><i class="fa fa-calendar"></i> Publicado em: <?= date("d/m/Y", strtotime($blog_date)); ?></small>
                          <p><?= Check::Words($blog_content, 25); ?></p>
                          <p><a rel="nofollow" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $blog_name; ?>" title="<?= $blog_title; ?>"><i class="fa fa-plus"></i> veja mais</a></p>
                        </div>
                      </li> 
                      <?php
                    endforeach;
                  endif;
                  ?>
                </ul>
              <?php else: ?>                        
                <ul class="blog">                    
                  <?php
                  foreach ($Read->getResult() as $cat):
                    extract($cat);
                    ?>
                    <li class="blog-item">
                      <div class="col_thumb col-4">
                        <a rel="nofollow" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $cat_name; ?>" title="<?= $cat_title; ?>">
                          <?php
                          //Pega imagem para adicionar à categoria       
                          $Read->ExeRead(TB_BLOG, "WHERE user_empresa = :emp AND blog_status = :stats AND cat_parent = :parent ORDER BY blog_date DESC LIMIT 1", "emp=" . EMPRESA_CLIENTE . "&stats=2&parent={$cat_id}");
                          if ($Read->getResult()):
                            foreach ($Read->getResult() as $blog):
                              echo Check::Image('doutor/uploads/' . $blog['blog_cover'], $cat_title, null, 300, 300);
                            endforeach;
                          else:
                            echo Check::Image('doutor/images/default.png', $cat_title, null, 300, 300);
                          endif;
                          ?>                                           
                        </a>
                      </div>
                      <div class="col-8">
                        <h2><a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $cat_name; ?>" title="<?= $cat_title; ?>"><?= $cat_title; ?></a></h2>
                        <p><?= $cat_description; ?> <a rel="nofollow" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $cat_name; ?>" title="<?= $cat_title; ?>"><i class="fa fa-plus"></i> veja mais</a></p>
                      </div>
                    </li> 
                    <?php
                  endforeach;
                  $Read->ExeRead(TB_BLOG, "WHERE cat_parent = :cat AND user_empresa = :emp", "cat={$categ}&emp=" . EMPRESA_CLIENTE);
                  if ($Read->getResult()):
                    foreach ($Read->getResult() as $blog):
                      extract($blog);
                      ?>
                      <li class="blog-item">
                        <div class="col_thumb col-4">                          
                          <a rel="nofollow" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $blog_name; ?>" title="<?= $blog_title; ?>">
                            <?= Check::Image('doutor/uploads/' . $blog_cover, $blog_title, null, 300, 300); ?>                                           
                          </a>
                        </div>
                        <div class="col-8">
                          <h2><a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $blog_name; ?>" title="<?= $blog_title; ?>"><?= $blog_title; ?></a></h2>
                          <p><?= $blog_description; ?> <a rel="nofollow" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $blog_name; ?>" title="<?= $blog_title; ?>"><i class="fa fa-plus"></i> veja mais</a></p>
                        </div>
                      </li> 
                      <?php
                    endforeach;
                  endif;
                  ?>
                </ul>
              <?php
              endif;
            endif;
            ?>
          </article>         
          <?php include('inc/aside.php'); ?>
        </section>
      </div>
    </main>

  </div><!-- .wrapper -->

  <?php include('inc/footer.php'); ?>

</body>
</html>