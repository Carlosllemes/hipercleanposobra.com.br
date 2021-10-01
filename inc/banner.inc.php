<?php if (WD_BANNER): ?>
  <div class="slider-wrapper theme-default">
    <?php
    $Read->ExeRead(TB_BANNER, "WHERE user_empresa = :emp AND sl_status = :stats ORDER BY sl_date DESC", "emp=" . EMPRESA_CLIENTE . "&stats=2");
    if (!$Read->getResult()):
      ?>
      <div class="sliderDefault">
        <h1><?= SITE_SUBNAME; ?></h1>
        <p class="tagline"><?= SITE_DESC; ?></p>
        <p><a href="<?= RAIZ; ?>/empresa" title="Leia mais sobre - <?= SITE_NAME; ?>" class="btn azul">Conheça nossos serviços</a></p>
      </div>
      <?php
    else:
      ?>  
      <div id="slider" class="nivoSlider">  
        <?php
        foreach ($Read->getResult() as $dados):
          extract($dados);
          ?>   
          <a href="<?= RAIZ . '/' . $sl_url; ?>" title="<?= $sl_title; ?>">
            <img src="<?= RAIZ; ?>/doutor/uploads/<?= $sl_file; ?>" title="<?= $sl_description; ?>" alt="<?= $sl_description; ?>" />
          </a>
          <?php
        endforeach;
        ?>
      </div>
    <?php
    endif;
    ?>
  </div>
<?php else: ?>
  <div class="sliderDefault">
    <h1><?= SITE_SUBNAME; ?></h1>
    <p class="tagline"><?= SITE_DESC; ?></p>
    <p><a href="<?= RAIZ; ?>/empresa" title="Leia mais sobre - <?= SITE_NAME; ?>" class="btn azul">Conheça nossos serviços</a></p>
  </div>
<?php endif; ?>