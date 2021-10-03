<ul class="gallery">
  <?php

    $imagens = glob("imagens/informacoes/".$urlPagina."-{,[0-9]}[0-9].jpg", GLOB_BRACE);
    foreach ($imagens as $key => $imagem) {
    ?>

      <li>
        <a href="<?=$url.$imagem?>" data-fancybox="group1" class="lightbox" title="<?=$h1?>" data-caption="<?=$h1?>">
          <img src="<?=$url.'inc/scripts/thumbs.php?w=120&amp;h=120&amp;imagem='.$url.$imagem?>" alt="<?=$h1?>" title="<?=$h1?>" itemprop="image" />
        </a>
      </li>

    <?php
    }

  ?>
</ul>