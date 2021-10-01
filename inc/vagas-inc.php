<?php
$Read->ExeRead(TB_VAGA, "WHERE user_empresa = :emp AND vaga_status = :stats", "emp=" . EMPRESA_CLIENTE . "&stats=2");
if (!$Read->getREsult()):
  ?>
  <div class="col-12 col-m-12 work-we">
    <p>Nenhuma vaga disponível no momento.</p>
  </div>
  <?php
else:
  foreach ($Read->getResult() as $vaga):
    extract($vaga);
    ?>
    <div class="col-12 col-m-12 work-we">
      <h3><?= $vaga_title; ?></h3>
      <p><?= Check::Words($vaga_content, 20); ?></p>                          
      <a class="j_modalAll fancybox.ajax" href="<?= RAIZ; ?>/inc/vaga-det&vaga=<?= $vaga_id; ?>" title="<?= $vaga_title; ?>"><i class="fa fa-plus-circle"></i> Ver detalhes da vaga</a>      
    </div>
    <?php
  endforeach;
endif;
?>               

<script type="text/javascript">
  $(document).ready(function () {
    $(".j_modalAll").fancybox({
      maxWidth: 800,
      maxHeight: 600,
      fitToView: false,
      width: '70%',
      height: '70%',
      autoSize: false,
      closeClick: false,
      openEffect: 'none',
      closeEffect: 'none'
    });
  });
</script>
<br class="clear"/>