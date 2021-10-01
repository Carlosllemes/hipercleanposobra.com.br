<?php
$Read->ExeRead(TB_CLIENTE, "WHERE user_empresa = :emp AND cli_status = :st ORDER BY cli_date DESC", "emp=" . EMPRESA_CLIENTE . "&st=2");
if ($Read->getResult()):
  ?>
  <div class="clear"></div>
  <div id="owl-demo" class="owl-carousel owl-theme centralizar">
    <?php
    foreach ($Read->getResult() as $clientes):
      extract($clientes);
      ?>
      <div class="item">
        <?= Check::Image('doutor/uploads/' . $cli_cover, $cli_title, NULL, 150); ?>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="clear"></div>
  <?php
endif;
?>
