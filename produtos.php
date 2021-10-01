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
$Read->ExeRead(TB_CATEGORIA, "WHERE cat_name = :nm AND user_empresa = :emp", "nm={$value}&emp=" . EMPRESA_CLIENTE);
if ($Read->getResult()):
$itemSessao = $Read->getResult();
$arrBreadcrump[] = array('titulo' => $itemSessao[0]['cat_title'], 'url' => $itemSessao[0]['cat_name'], 'parent' => $itemSessao[0]['cat_id']);
endif;
$Read->ExeRead(TB_PRODUTO, "WHERE prod_name = :nm AND user_empresa = :emp", "nm={$value}&emp=" . EMPRESA_CLIENTE);
if ($Read->getResult()):
$itemName = $Read->getResult();
$arrBreadcrump[] = array('titulo' => $itemName[0]['prod_title'], 'url' => $itemName[0]['prod_name'], 'parent' => $itemName[0]['cat_parent']);
endif;
endif;
endforeach;
endif;
include('inc/head.php');
include('inc/fancy.php');
?>
<!-- Owl Stylesheets -->
<link rel="stylesheet" href="<?= BASE; ?>/_cdn/widgets/carousel/css/owl.carousel.css"/>
<link rel="stylesheet" href="<?= BASE; ?>/_cdn/widgets/carousel/css/owl.theme.default.css"/>
<script src="<?= BASE; ?>/_cdn/widgets/carousel/js/owl.carousel.js"></script>
<script>
$(function () {
//Inicia o Carousel com a classe responsiva
$('.owl-carousel').owlCarousel({
loop: false,
margin: 5,
autoplay: true,
autoplayTimeout: 3000,
autoplayHoverPause: true,
responsiveClass: true,
responsive: {
0: {
items: 1,
nav: true
},
600: {
items: 3,
nav: true
},
1000: {
//          items: 4,
nav: true,
loop: false,
margin: 5
}
}
});
});
</script>
<!--/ Owl Stylesheets -->
</head>
<body>
<?php include('inc/topo.php'); ?>
<div class="wrapper">
  <main>
    <div class="content">
      <section itemscope itemtype="https://schema.org/Products">
        <!-- Breadcrump -->
        <?php Check::SetBreadcrumb($arrBreadcrump); ?>
        <h1 class="title"><?php Check::SetTitulo($arrBreadcrump, $URL); ?> </h1>
        <?php include('inc/social-media.php'); ?>
        <div class="clear"></div>
        <article <?php
          if (count($URL) == 1): echo 'class="full"';
          endif;
          ?>>
          <?php
          $categ = Check::CatByName($lastCategory, EMPRESA_CLIENTE);
          if (!$categ):
          require 'inc/produto-inc.php';
          else:
          //PÁGINAÇÃO
          include('inc/paginacao.inc.php');
          //PÁGINAÇÃO
          
          $Read->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_parent = :parent ORDER BY cat_date DESC LIMIT :limit OFFSET :offset", "emp=" . EMPRESA_CLIENTE . "&stats=2&parent={$categ}&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
          if (!$Read->getResult()):
          //Dados para categoria pai
          $Read->ExeRead(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_id = :parent ORDER BY cat_date DESC LIMIT :limit OFFSET :offset", "emp=" . EMPRESA_CLIENTE . "&stats=2&parent={$categ}&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
          if ($Read->getResult()):
          $category = $category[0];
          ?>
          <?php if (!empty($category['cat_cover'])): ?>
          <div class="picture-full">
            <img src="<?= RAIZ . '/doutor/uploads/' . $category['cat_cover']; ?>" title="<?= $category['cat_title']; ?>" alt="<?= $category['cat_title']; ?>"/>
          </div>
          <?php endif; ?>
          <div class="htmlchars">
            <?= $category['cat_content']; ?>
          </div>
          <?php
          endif; ?>
          <ul class="thumbnails">
            <?php
            $Read->ExeRead(TB_PRODUTO, "WHERE user_empresa = :emp AND FIND_IN_SET(:cat, cat_parent) AND prod_status = :stats ORDER BY ABS(prod_title) ASC LIMIT :limit OFFSET :offset", "emp=" . EMPRESA_CLIENTE . "&cat={$categ}&stats=2&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
            if ($Read->getResult()):
            foreach ($Read->getResult() as $prod):
            extract($prod);
            ?>
            <li>
              <a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $prod_name; ?>" title="<?= $prod_title; ?>">
                <?= Check::Image('doutor/uploads/' . $prod_cover, $prod_title, null, 300, 300) ?>
              </a>
              <h2><a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $prod_name; ?>" title="<?= $prod_title; ?>"><?= $prod_title; ?></a></h2>
              <?php if (!empty($prod_preco) && $prod_preco != 0.00): ?>
              <div class="thumb-preco">
                <?php if (!empty($prod_preco_old) && $prod_preco_old != 0.00): ?>
                <h3>De: R$ <?= $prod_preco_old; ?></h3>
                <?php endif; ?>
                <h4>Valor R$ <?= $prod_preco; ?></h4>
              </div>
              <?php endif; ?>
            </li>
            <?php
            endforeach;
            endif;
            ?>
          </ul>
          <div class="clear"></div>
          <hr>
          <div class="pull-right">
            <?php
            //Paginação
            $Pager->ExePaginator(TB_PRODUTO, "WHERE user_empresa = :emp AND FIND_IN_SET(:cat, cat_parent) AND prod_status = :stats", "emp=" . EMPRESA_CLIENTE . "&cat={$categ}&stats=2");
            echo $Pager->getPaginator();
            ?>
          </div>
          <?php
          else:
          $lerCat = new Read;
          $lerCat->ExeRead(TB_CATEGORIA, "WHERE cat_id = :id AND user_empresa = :emp", "id={$Read->getResult()[0]['cat_parent']}&emp=".EMPRESA_CLIENTE);
          if($lerCat->getResult()){
          $categPai = $lerCat->getResult()[0];
          ?>
          <div class="htmlchars">
            <?= $categPai['cat_content']; ?>
          </div>
          <?php
          }
          ?>
          <ul class="thumbnails">
            <?php
            foreach ($Read->getResult() as $cat):
            extract($cat);
            ?>
            <li><a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $cat_name; ?>" title="<?= $cat_title; ?>">
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
            </a>
            <h2><a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $cat_name; ?>" title="<?= $cat_title; ?>"><?= $cat_title; ?></a></h2>
          </li>
          <?php
          endforeach;
          $Read->ExeRead(TB_PRODUTO, "WHERE FIND_IN_SET(:cat, cat_parent) AND prod_status = :st AND user_empresa = :emp ORDER BY ABS(prod_title) ASC LIMIT :limit OFFSET :offset", "cat={$categ}&st=2&emp=" . EMPRESA_CLIENTE . "&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
          if ($Read->getResult()):
          foreach ($Read->getResult() as $produto):
          extract($produto);
          ?>
          <li>
            <a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $prod_name; ?>" title="<?= $prod_title; ?>">
              <?= Check::Image('doutor/uploads/' . $prod_cover, $prod_title, null, 300, 300); ?>
            </a>
            <h2><a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $prod_name; ?>" title="<?= $prod_title; ?>"><?= $prod_title; ?></a></h2>
            <?php if (!empty($prod['prod_preco']) && $prod['prod_preco'] != 0.00): ?>
            <div class="thumb-preco">
              <?php if (!empty($prod['prod_preco_old']) && $prod['prod_preco_old'] != 0.00): ?>
              <h3>De: R$ <?= $prod['prod_preco_old']; ?></h3>
              <?php endif; ?>
              <h4>Valor R$ <?= $prod['prod_preco']; ?></h4>
            </div>
            <?php endif; ?>
          </li>
          <?php
          endforeach;
          endif;
          ?>
        </ul>
        <div class="clear"></div>
        <hr>
        <div class="pull-right">
          <?php
          //Paginação
          $Pager->ExePaginator(TB_CATEGORIA, "WHERE user_empresa = :emp AND cat_status = :stats AND cat_parent = :parent ORDER BY cat_date DESC", "emp=" . EMPRESA_CLIENTE . "&stats=2&parent={$categ}");
          echo $Pager->getPaginator();
          ?>
        </div>
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