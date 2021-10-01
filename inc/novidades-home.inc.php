<div class="clear"></div>
<?php
$Read->ExeRead(TB_NOTICIA, "WHERE user_empresa = :emp AND noti_status = :st ORDER BY noti_date DESC LIMIT 0,2", "emp=" . EMPRESA_CLIENTE . "&st=2");
if (!$Read->getResult()):
  WSErro("Desculpe, nenhum produto foi encontrado, volte mais tarde", WS_INFOR, null, "Aviso!");
else:
  ?>                        
  <h2>Últimas notícias</h2>
  <ul class="blog">
    <?php
    foreach ($Read->getResult() as $noti_home):
      extract($noti_home);
      ?>
      <li class="blog-item">
        <div class="col-12">
          <h2><a href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $noti_name; ?>" title="<?= $noti_title; ?>"><?= $noti_title; ?></a></h2>
          <p><?= Check::Words($noti_description, 15); ?></p>
          <p><small><i class="fa fa-calendar"></i> Publicado em: <?= date("d/m/Y", strtotime($noti_date)); ?></small> <a rel="nofollow" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $noti_name; ?>" title="<?= $noti_title; ?>"><i class="fa fa-plus"></i> veja mais</a></p>
        </div>
      </li> 
      <?php
    endforeach;
    ?>
  </ul>
<?php endif; ?>
<div class="clear"></div>
<hr>

