<ul class="blog">   
  <?php
  $Read = new Read;
  $Read->ExeRead(TB_BLOG, "WHERE user_empresa = :emp AND blog_status = :stats ORDER BY blog_date DESC LIMIT 0, 4", "emp=" . EMPRESA_CLIENTE . "&stats=2");
  if ($Read->getResult()):
    foreach ($Read->getResult() as $dados):
      extract($dados);
      ?>
      <li class="blog-item">
        <div class="col_thumb col-4">
          <a rel="nofollow" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $cat_name; ?>" title="<?= $cat_title; ?>"><?php echo Check::Image('doutor/uploads/' . $blog_cover, $cat_title, null, 300, 300); ?></a>
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
