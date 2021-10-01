<?php
include('../_app/Config.inc.php');
$vaga = filter_input(INPUT_GET, 'vaga', FILTER_VALIDATE_INT);
$Read = new Read;
$Read->ExeRead(TB_VAGA, "WHERE user_empresa = :emp AND vaga_status = :stats AND vaga_id = :id", "emp=" . EMPRESA_CLIENTE . "&stats=2&id={$vaga}");
if (!$Read->getResult()):
  ?>
  <h1>Desculpe mas a vaga está indisponível.</h1>
<?php else: $readVaga = $Read->getResult(); ?>
  <div class="htmlchars">
    <h1><?= $readVaga[0]['vaga_title']; ?></h1>
    <p>Vaga cadastrada em: <?= date("d/m/Y", strtotime($readVaga[0]['vaga_date'])); ?></p>
    <hr>
    <?= $readVaga[0]['vaga_content']; ?>
  </div>
<?php endif; ?>