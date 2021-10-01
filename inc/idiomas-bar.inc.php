<?php if (WIDGET_LANG): ?>
  <div class="col-<?= (WIDGET_CART ? '4' : '7'); ?> col-12-sm">  
    <?php
    $ReadIdiomas = new Read;
    $ReadIdiomas->ExeRead(TB_EMP, "WHERE empresa_idioma_status != :st AND empresa_id != :id AND ( empresa_id = :lang OR empresa_parent = :lang ) ORDER BY empresa_idioma_name ASC", "st=3&id=" . EMPRESA_MASTER . "&lang=" . EMPRESA_CLIENTE);
    $reademp = $ReadIdiomas->getResult();
    $reademp = (!empty($reademp[0]['empresa_parent']) ? $reademp[0]['empresa_parent'] : EMPRESA_CLIENTE);
    $ReadIdiomas->ExeRead(TB_EMP, "WHERE empresa_idioma_status != :st AND empresa_id != :id AND empresa_id = :sess OR ( empresa_idioma_status != :st AND empresa_id != :id AND (empresa_id = :principal OR empresa_parent = :principal)) ORDER BY empresa_idioma_name ASC", "st=3&id=" . EMPRESA_MASTER . "&sess=" . EMPRESA_CLIENTE . "&principal={$reademp}");
    if ($ReadIdiomas->getResult()):
      ?>
      <ul class="idiomas">
        <?php
        foreach ($ReadIdiomas->getResult() as $idiomas):
          if ($idiomas['empresa_idioma_sg'] != explode('.', $_SERVER['HTTP_HOST'])[0]):
            ?>
            <li><a href="<?= $_SERVER['REQUEST_SCHEME'] . '://' . Check::GetIdiomaUrl($idiomas['empresa_idioma_sg']) . '/' . WEBROOT; ?>" title="<?= $idiomas['empresa_idioma_name']; ?>" data-id="<?= $idiomas['empresa_id']; ?>" class="j_setIdiomaCli"><?= Check::GetIdioma($idiomas['empresa_idioma']); ?></a></li>
              <?php
            endif;            
          endforeach;
          ?>
      </ul>
    <?php endif; ?>
  </div>
  <?php
endif;

Check::GetIdiomaUrl('www');

?>
